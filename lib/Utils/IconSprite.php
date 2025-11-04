<?php

namespace Flynt\Utils;

/**
 * Icon Sprite Generator and Helper
 *
 * Generates SVG sprites from icon directories and provides helper functions
 * for using icons throughout the site.
 */
class IconSprite
{
    /**
     * Cache of generated sprites.
     *
     * @var array
     */
    private static $sprites = [];

    /**
     * Map of icon IDs to their file paths.
     *
     * @var array
     */
    private static $iconMap = [];

    /**
     * Generate SVG sprite from a directory of SVG files
     *
     * @param string $directory Path to directory containing SVG files.
     * @param string $spriteId Unique identifier for this sprite.
     * @param boolean $recursive Whether to search subdirectories.
     * @return string SVG sprite content
     */
    public static function generateSprite(string $directory, string $spriteId, bool $recursive = true): string
    {
        if (isset(self::$sprites[$spriteId])) {
            return self::$sprites[$spriteId];
        }

        $icons = self::collectIcons($directory, $recursive);
        $sprite = self::buildSprite($icons, $spriteId);

        self::$sprites[$spriteId] = $sprite;
        return $sprite;
    }

    /**
     * Collect all SVG files from directory.
     *
     * @param string $directory The directory to search.
     * @param boolean $recursive Whether to search recursively.
     * @return array Array of collected icons.
     */
    private static function collectIcons(string $directory, bool $recursive = true): array
    {
        $icons = [];

        if (!is_dir($directory)) {
            return $icons;
        }

        $iterator = $recursive
            ? new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory))
            : new \DirectoryIterator($directory);

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'svg') {
                $content = file_get_contents($file->getPathname());
                if ($content) {
                    $iconId = self::generateIconId($file, $directory);
                    $cleanContent = self::cleanSvgContent($content);
                    $icons[$iconId] = $cleanContent;
                }
            }
        }

        return $icons;
    }

    /**
     * Generate unique icon ID from file path.
     *
     * @param \SplFileInfo $file The file to generate ID for.
     * @param string $baseDirectory The base directory path.
     * @return string The generated icon ID.
     */
    private static function generateIconId(\SplFileInfo $file, string $baseDirectory): string
    {
        $relativePath = str_replace($baseDirectory . '/', '', $file->getPathname());
        $iconId = str_replace(['/', '.svg'], ['-', ''], $relativePath);
        return $iconId;
    }

    /**
     * Clean SVG content for sprite usage.
     *
     * @param string $content The SVG content to clean.
     * @return array Array with 'content' and 'viewBox' keys.
     */
    private static function cleanSvgContent(string $content): array
    {
        // Remove XML declaration.
        $content = preg_replace('/<\?xml[^>]*\?>/', '', $content);

        // Extract content between <svg> tags.
        if (preg_match('/<svg[^>]*>(.*?)<\/svg>/s', $content, $matches)) {
            $svgContent = $matches[1];

            // Extract viewBox from original SVG.
            $viewBox = '';
            if (preg_match('/viewBox="([^"]*)"/', $content, $viewBoxMatch)) {
                $viewBox = $viewBoxMatch[1];
            } else {
                // Try to extract width/height and create viewBox.
                $width = preg_match('/width="([^"]*)"/', $content, $widthMatch) ? $widthMatch[1] : '24';
                $height = preg_match('/height="([^"]*)"/', $content, $heightMatch) ? $heightMatch[1] : '24';
                $viewBox = "0 0 $width $height";
            }

            return [
                'content' => trim($svgContent),
                'viewBox' => $viewBox
            ];
        }

        return [
            'content' => '',
            'viewBox' => '0 0 24 24'
        ];
    }

    /**
     * Build SVG sprite from icons array.
     *
     * @param array $icons Array of icon data.
     * @param string $spriteId The sprite identifier.
     * @return string The built SVG sprite.
     */
    private static function buildSprite(array $icons, string $spriteId): string
    {
        $symbols = [];

        foreach ($icons as $iconId => $iconData) {
            $symbols[] = sprintf(
                '<symbol id="%s" viewBox="%s">%s</symbol>',
                $iconId,
                $iconData['viewBox'],
                $iconData['content']
            );

            // Store icon mapping.
            self::$iconMap[$spriteId][$iconId] = [
                'viewBox' => $iconData['viewBox'],
                'sprite' => $spriteId
            ];
        }

        return sprintf(
            '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">%s</svg>',
            implode('', $symbols)
        );
    }

    /**
     * Get icon HTML.
     *
     * @param string $iconId Icon identifier.
     * @param array $attributes Additional HTML attributes.
     * @return string The icon HTML.
     */
    public static function getIcon(string $iconId, array $attributes = []): string
    {
        // Find which sprite contains this icon.
        $spriteId = null;
        $iconData = null;

        foreach (self::$iconMap as $sprite => $icons) {
            if (isset($icons[$iconId])) {
                $spriteId = $sprite;
                $iconData = $icons[$iconId];
                break;
            }
        }

        if (!$iconData) {
            return "<!-- Icon '$iconId' not found -->";
        }

        // Default attributes.
        $defaultAttributes = [
            'class' => 'icon',
            'width' => '24',
            'height' => '24',
            'aria-hidden' => 'true'
        ];

        $attributes = array_merge($defaultAttributes, $attributes);

        // Build attributes string.
        $attributeString = '';
        foreach ($attributes as $key => $value) {
            $attributeString .= sprintf(' %s="%s"', $key, \esc_attr($value));
        }

        return sprintf(
            '<svg%s viewBox="%s"><use href="#%s"></use></svg>',
            $attributeString,
            $iconData['viewBox'],
            $iconId
        );
    }

    /**
     * Get all available icons for a sprite.
     *
     * @param string $spriteId The sprite identifier.
     * @return array Array of available icons.
     */
    public static function getAvailableIcons(string $spriteId = null): array
    {
        if ($spriteId) {
            return isset(self::$iconMap[$spriteId]) ? array_keys(self::$iconMap[$spriteId]) : [];
        }

        $allIcons = [];
        foreach (self::$iconMap as $sprite => $icons) {
            $allIcons[$sprite] = array_keys($icons);
        }

        return $allIcons;
    }

    /**
     * Initialize sprites (call this in your theme).
     *
     * @param array $config Sprite configuration.
     */
    public static function init(array $config = []): void
    {
        $defaultConfig = [
            'icons' => [
                'directory' => \get_template_directory() . '/assets/icons',
                'sprite_id' => 'icons',
                'recursive' => true
            ],
            'large-icons' => [
                'directory' => \get_template_directory() . '/assets/large-icons',
                'sprite_id' => 'large-icons',
                'recursive' => false
            ]
        ];

        $config = array_merge($defaultConfig, $config);

        foreach ($config as $spriteConfig) {
            self::generateSprite(
                $spriteConfig['directory'],
                $spriteConfig['sprite_id'],
                $spriteConfig['recursive']
            );
        }
    }

    /**
     * Output all sprites (call this in your template).
     */
    public static function outputSprites(): void
    {
        foreach (self::$sprites as $sprite) {
            echo $sprite;
        }
    }
}
