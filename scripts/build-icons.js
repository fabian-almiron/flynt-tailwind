#!/usr/bin/env node

/**
 * Icon Sprite Builder
 *
 * This script generates SVG sprites from icon directories and creates
 * a manifest file for development reference.
 */

import fs from 'fs'
import path from 'path'
import { fileURLToPath } from 'url'

const __filename = fileURLToPath(import.meta.url)
const __dirname = path.dirname(__filename)
const themeRoot = path.resolve(__dirname, '..')

// Configuration
const config = {
  icons: {
    inputDir: path.join(themeRoot, 'assets/icons'),
    outputFile: path.join(themeRoot, 'dist/icons-sprite.svg'),
    spriteId: 'icons',
    recursive: true
  },
  largeIcons: {
    inputDir: path.join(themeRoot, 'assets/large-icons'),
    outputFile: path.join(themeRoot, 'dist/large-icons-sprite.svg'),
    spriteId: 'large-icons',
    recursive: false
  },
  manifestFile: path.join(themeRoot, 'dist/icon-manifest.json')
}

/**
 * Recursively collect SVG files from directory
 */
function collectSvgFiles (dir, recursive = true, basePath = '') {
  const files = []

  if (!fs.existsSync(dir)) {
    console.warn(`Directory not found: ${dir}`)
    return files
  }

  const items = fs.readdirSync(dir)

  for (const item of items) {
    const fullPath = path.join(dir, item)
    const stat = fs.statSync(fullPath)

    if (stat.isDirectory() && recursive) {
      const subPath = basePath ? `${basePath}-${item}` : item
      files.push(...collectSvgFiles(fullPath, recursive, subPath))
    } else if (stat.isFile() && path.extname(item) === '.svg') {
      const iconId = basePath ? `${basePath}-${path.basename(item, '.svg')}` : path.basename(item, '.svg')
      files.push({
        id: iconId,
        path: fullPath,
        relativePath: path.relative(dir, fullPath)
      })
    }
  }

  return files
}

/**
 * Clean SVG content for sprite usage
 */
function cleanSvgContent (content) {
  // Remove XML declaration
  content = content.replace(/<\?xml[^>]*\?>/g, '')

  // Extract viewBox
  let viewBox = '0 0 24 24'
  const viewBoxMatch = content.match(/viewBox="([^"]*)"/)
  if (viewBoxMatch) {
    viewBox = viewBoxMatch[1]
  } else {
    // Try to extract width/height
    const widthMatch = content.match(/width="([^"]*)"/)
    const heightMatch = content.match(/height="([^"]*)"/)
    if (widthMatch && heightMatch) {
      const width = parseFloat(widthMatch[1])
      const height = parseFloat(heightMatch[1])
      viewBox = `0 0 ${width} ${height}`
    }
  }

  // Extract content between <svg> tags
  const svgMatch = content.match(/<svg[^>]*>(.*?)<\/svg>/s)
  const svgContent = svgMatch ? svgMatch[1].trim() : ''

  return {
    content: svgContent,
    viewBox
  }
}

/**
 * Generate SVG sprite
 */
function generateSprite (files, spriteId) {
  const symbols = []
  const manifest = {}

  for (const file of files) {
    try {
      const content = fs.readFileSync(file.path, 'utf8')
      const cleaned = cleanSvgContent(content)

      symbols.push(`<symbol id="${file.id}" viewBox="${cleaned.viewBox}">${cleaned.content}</symbol>`)

      manifest[file.id] = {
        viewBox: cleaned.viewBox,
        sprite: spriteId,
        source: file.relativePath
      }

      console.log(`✓ Processed: ${file.id}`)
    } catch (error) {
      console.error(`✗ Error processing ${file.path}:`, error.message)
    }
  }

  const sprite = `<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">${symbols.join('')}</svg>`

  return { sprite, manifest }
}

/**
 * Ensure directory exists
 */
function ensureDir (filePath) {
  const dir = path.dirname(filePath)
  if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true })
  }
}

/**
 * Main build function
 */
function buildSprites () {
  console.log('🎨 Building icon sprites...\n')

  const allManifests = {}

  // Process each sprite configuration
  for (const [name, spriteConfig] of Object.entries(config)) {
    if (name === 'manifestFile') continue

    console.log(`📁 Processing ${name}...`)

    const files = collectSvgFiles(
      spriteConfig.inputDir,
      spriteConfig.recursive
    )

    if (files.length === 0) {
      console.warn(`⚠️  No SVG files found in ${spriteConfig.inputDir}`)
      continue
    }

    console.log(`📊 Found ${files.length} SVG files`)

    const { sprite, manifest } = generateSprite(files, spriteConfig.spriteId)

    // Write sprite file
    ensureDir(spriteConfig.outputFile)
    fs.writeFileSync(spriteConfig.outputFile, sprite)
    console.log(`✅ Sprite saved: ${spriteConfig.outputFile}`)

    // Add to combined manifest
    allManifests[spriteConfig.spriteId] = manifest

    console.log('')
  }

  // Write combined manifest
  ensureDir(config.manifestFile)
  fs.writeFileSync(config.manifestFile, JSON.stringify(allManifests, null, 2))
  console.log(`📋 Manifest saved: ${config.manifestFile}`)

  // Summary
  const totalIcons = Object.values(allManifests).reduce((sum, manifest) => sum + Object.keys(manifest).length, 0)
  console.log(`\n🎉 Build complete! Generated ${totalIcons} icons across ${Object.keys(allManifests).length} sprites.`)
}

/**
 * Watch mode
 */
function watchMode () {
  console.log('👀 Watching for changes...')

  const watchDirs = [config.icons.inputDir, config.largeIcons.inputDir]

  for (const dir of watchDirs) {
    if (fs.existsSync(dir)) {
      fs.watch(dir, { recursive: true }, (eventType, filename) => {
        if (filename && filename.endsWith('.svg')) {
          console.log(`🔄 Detected change in ${filename}, rebuilding...`)
          buildSprites()
        }
      })
    }
  }
}

// CLI handling
const args = process.argv.slice(2)
const isWatch = args.includes('--watch') || args.includes('-w')

try {
  buildSprites()

  if (isWatch) {
    watchMode()
  }
} catch (error) {
  console.error('❌ Build failed:', error.message)
  process.exit(1)
}
