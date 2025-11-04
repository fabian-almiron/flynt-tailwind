# Development Setup Guide

Complete setup guide for the Canopy theme development environment with SSL support.

## 🚀 Quick Start

### 1. SSL Certificate Setup (One-time)

Run the automated setup script:
```bash
./setup-ssl.sh
```

Or follow the manual steps below.

### 2. Start Development Server

```bash
npm run dev
```

The server will now run with HTTPS support at:
- **HTTPS**: https://localhost:5173/
- **HTTP**: http://localhost:5173/ (fallback)

## 🔐 Manual SSL Setup

### Prerequisites

1. **Install mkcert** (if not already installed):
   ```bash
   brew install mkcert
   ```

2. **Accept Xcode License** (if prompted):
   ```bash
   sudo xcodebuild -license accept
   ```

### Step-by-Step Setup

1. **Install Local CA Certificate**:
   ```bash
   mkcert -install
   ```

2. **Generate SSL Certificates**:
   ```bash
   mkdir -p ssl-certs
   cd ssl-certs
   mkcert getcanopy.local localhost 127.0.0.1 ::1
   cd ..
   ```

3. **Create Environment File**:
   Create a `.env` file in the theme root with:
   ```env
   # SSL Certificate paths
   VITE_DEV_SERVER_KEY=/Users/mac/Local Sites/getcanopy/app/public/wp-content/themes/flynt/ssl-certs/getcanopy.local+3-key.pem
   VITE_DEV_SERVER_CERT=/Users/mac/Local Sites/getcanopy/app/public/wp-content/themes/flynt/ssl-certs/getcanopy.local+3.pem
   
   # App URL
   APP_URL=https://getcanopy.local
   
   # Development settings
   NODE_ENV=development
   VITE_DEV_MODE=true
   ```

## 🛠️ Development Commands

### Build Commands
```bash
npm run build              # Full production build
npm run build:icons        # Build icon sprites only
npm run build:icons:watch  # Watch icon changes
```

### Development Commands
```bash
npm run dev                # Start HTTPS dev server
npm run watch              # Build and watch for changes
npm run serve              # Alternative dev server command
```

### Linting Commands
```bash
npm run lint               # Run all linters
npm run lint:scripts       # Lint JavaScript
npm run lint:styles        # Lint SCSS
npm run lint:php           # Lint PHP
npm run lintFix            # Fix all linting issues
```

## 🎨 Theme System

### Icon System
- **391 icons** available across 2 sprite files
- Use `{{ icon('icon-name') }}` in Twig templates
- Use `get_icon('icon-name')` in PHP
- Icons automatically adapt to theme colors

### Color System
- **Brand colors** defined in `_variables.scss`
- **CSS custom properties** for dynamic theming
- **Light/Dark modes** with automatic switching
- **Theme switcher component** available

### Theme Modes
- **Default**: Clean white background
- **Light**: Cool gray background with enhanced contrast
- **Dark**: Charcoal background with bright, accessible colors

## 📁 Project Structure

```
flynt/
├── assets/
│   ├── icons/              # Regular icons (24x24)
│   ├── large-icons/        # Large illustrations
│   ├── styles/
│   │   ├── _variables.scss # Brand colors & CSS custom properties
│   │   ├── _colors.scss    # Color utility classes
│   │   └── _icons.scss     # Icon system styles
│   └── scripts/
├── Components/
│   └── IconExample/        # Icon showcase
├── dist/                   # Built assets
│   ├── icons-sprite.svg    # Regular icons sprite
│   ├── large-icons-sprite.svg # Large icons sprite
│   └── icon-manifest.json # Development manifest
├── ssl-certs/              # SSL certificates
└── lib/Utils/
    └── IconSprite.php      # Icon sprite generator
```

## 🌐 Local Development URLs

- **WordPress Site**: https://getcanopy.local
- **Vite Dev Server**: https://localhost:5173/
- **Assets**: Served from Vite dev server with HMR

## 🔧 Troubleshooting

### SSL Certificate Issues

**Problem**: Browser shows "Not Secure" or certificate warnings
**Solution**: 
```bash
mkcert -install  # Reinstall local CA
```

**Problem**: Certificate expired
**Solution**: 
```bash
./setup-ssl.sh  # Regenerate certificates
```

### Development Server Issues

**Problem**: Vite server won't start with HTTPS
**Solution**: 
1. Check `.env` file paths are correct
2. Verify certificates exist in `ssl-certs/` directory
3. Ensure file permissions are correct

**Problem**: Assets not loading in WordPress
**Solution**: 
1. Verify `APP_URL` in `.env` matches your Local by Flywheel URL
2. Check WordPress site is running
3. Ensure Vite dev server is running

### Icon System Issues

**Problem**: Icons not displaying
**Solution**: 
```bash
npm run build:icons  # Rebuild icon sprites
```

**Problem**: New icons not appearing
**Solution**: 
1. Add SVG files to `assets/icons/` or `assets/large-icons/`
2. Run `npm run build:icons`
3. Use correct icon ID in templates

### Theme System Issues

**Problem**: Theme colors not changing
**Solution**: 
1. Check CSS custom properties are defined
2. Verify `data-theme` attribute is set
3. Clear browser cache

## 📋 Development Checklist

### Initial Setup
- [ ] Install mkcert and generate certificates
- [ ] Create `.env` file with correct paths
- [ ] Run `npm install` to install dependencies
- [ ] Start development server with `npm run dev`
- [ ] Verify HTTPS is working at https://localhost:5173/

### Before Committing
- [ ] Run `npm run lint` and fix any issues
- [ ] Build icons with `npm run build:icons`
- [ ] Test theme switching functionality
- [ ] Verify all icons display correctly
- [ ] Test responsive design
- [ ] Check accessibility (contrast, keyboard navigation)

### Production Deployment
- [ ] Run `npm run build` for production assets
- [ ] Verify all sprites are generated
- [ ] Test theme system in production
- [ ] Validate icon system performance

## 🎯 Performance Tips

1. **Icon System**: Icons are loaded once as sprites, reducing HTTP requests
2. **Theme System**: Uses CSS custom properties for instant theme switching
3. **Development**: Vite provides fast HMR for rapid development
4. **Build Process**: Optimized production builds with asset minification

## 🆘 Getting Help

1. **Check the logs**: Look at browser console and terminal output
2. **Verify setup**: Run through this guide step by step
3. **Clear cache**: Sometimes browser cache causes issues
4. **Restart services**: Stop and restart both WordPress and Vite dev server

## 🎉 You're Ready!

Your development environment is now set up with:
- ✅ HTTPS support for secure local development
- ✅ 391 icons in an optimized sprite system
- ✅ Complete brand color system with light/dark themes
- ✅ Theme switcher component with multiple UI options
- ✅ Hot module replacement for fast development
- ✅ Comprehensive linting and build tools

Happy coding! 🚀
