# Icon System Documentation

A comprehensive SVG sprite-based icon system for the Flynt theme, providing efficient icon management and usage throughout your WordPress site.

## 🎯 Features

- **SVG Sprite System**: Optimized SVG sprites for better performance
- **Two Icon Types**: Regular icons (24x24) and large icons (illustrations)
- **Automatic Generation**: Build scripts to generate sprites from source files
- **Twig Integration**: Easy-to-use Twig functions
- **PHP Helpers**: WordPress-friendly PHP functions
- **CSS Framework**: Pre-built styles and utility classes
- **Development Tools**: Icon manifest and debugging helpers

## 📁 Directory Structure

```
assets/
├── icons/                    # Regular icons (24x24, organized by category)
│   ├── add/
│   ├── checkmarks/
│   ├── arrows/
│   └── ...
├── large-icons/             # Large icons/illustrations
│   ├── calculator.svg
│   ├── handshake.svg
│   └── ...
└── styles/
    └── _icons.scss          # Icon system styles

dist/                        # Generated files
├── icons-sprite.svg         # Regular icons sprite
├── large-icons-sprite.svg   # Large icons sprite
└── icon-manifest.json      # Development manifest

lib/Utils/
└── IconSprite.php          # Core sprite generation class

inc/
└── iconSprite.php          # WordPress integration

Components/
└── IconExample/            # Example component showing usage
```

## 🚀 Quick Start

### 1. Build Icons

Generate the sprite files:

```bash
npm run build:icons
```

Or watch for changes during development:

```bash
npm run build:icons:watch
```

### 2. Basic Usage in Twig

```twig
{# Simple icon #}
{{ icon('add-small') }}

{# Icon with custom attributes #}
{{ icon('checkmark-large', {
  class: 'icon icon--primary icon--large',
  'aria-label': 'Success'
}) }}

{# Large icon #}
{{ icon('calculator', {class: 'large-icon large-icon--medium'}) }}
```

### 3. Basic Usage in PHP

```php
// Simple icon
echo get_icon('add-small');

// Icon with attributes
echo get_icon('checkmark-large', [
    'class' => 'icon icon--success',
    'aria-label' => 'Complete'
]);

// Sized icon helper
echo get_icon_sized('settings', 'large', ['class' => 'icon icon--interactive']);
```

## 🎨 Styling System

### Icon Sizes

```scss
.icon--small    // 14px
.icon--medium   // 24px (default)
.icon--large    // 32px
.icon--xl       // 48px
```

### Icon Colors

```scss
.icon--primary     // Theme primary color
.icon--secondary   // Theme secondary color
.icon--accent      // Theme accent color
.icon--success     // Green
.icon--warning     // Orange
.icon--error       // Red
.icon--info        // Blue
.icon--white       // White
.icon--black       // Black
```

### Interactive States

```scss
.icon--interactive  // Hover effects and cursor pointer
.icon--spin        // Spinning animation
.icon--pulse       // Pulsing animation
.icon--bounce      // Bouncing animation
```

## 🧩 Components

### Icon Button

```twig
<button class="icon-button icon-button--primary">
  {{ icon('add-small') }}
  Add Item
</button>
```

### Icon with Text

```twig
<div class="icon-text">
  {{ icon('checkmark-circle-filled-small', {class: 'icon icon--success'}) }}
  <span>Task completed</span>
</div>
```

### Icon List

```twig
<ul class="icon-list">
  <li class="icon-list__item">
    <div class="icon-list__icon">
      {{ icon('shield-1', {class: 'icon icon--primary'}) }}
    </div>
    <div class="icon-list__content">
      <strong>Security</strong>
      <p>Your data is protected.</p>
    </div>
  </li>
</ul>
```

## 🔧 Available Functions

### Twig Functions

| Function | Description | Example |
|----------|-------------|---------|
| `icon(id, attributes)` | Render an icon | `{{ icon('add-small') }}` |
| `get_available_icons(sprite)` | Get list of available icons | `{{ get_available_icons('icons') }}` |

### PHP Functions

| Function | Description | Example |
|----------|-------------|---------|
| `get_icon($id, $attributes)` | Get icon HTML | `get_icon('add-small')` |
| `the_icon($id, $attributes)` | Echo icon HTML | `the_icon('add-small')` |
| `get_icon_sized($id, $size, $attributes)` | Get sized icon | `get_icon_sized('settings', 'large')` |
| `the_icon_sized($id, $size, $attributes)` | Echo sized icon | `the_icon_sized('settings', 'large')` |

## 📋 Icon Categories

### Regular Icons (`@icons/`)

- **add/** - Plus and add icons
- **ai/** - AI and sparkle icons
- **alert/** - Warning and alert icons
- **arrow-functions/** - Functional arrows (undo, redo, etc.)
- **arrows/** - Directional arrows
- **billing/** - Payment and billing icons
- **caret/** - Small directional indicators
- **checkmarks/** - Check and success icons
- **close/** - Close and X icons
- **communication/** - Chat, mail, phone icons
- **crud/** - Create, read, update, delete icons
- **file-preview/** - File preview controls
- **files/** - File type icons
- **folders/** - Folder icons
- **form/** - Form elements
- **help/** - Help and question icons
- **information/** - Info icons
- **misc/** - Miscellaneous icons
- **organize/** - Organization and sorting
- **person/** - User and person icons
- **remove/** - Delete and remove icons
- **rich-text-editor/** - Text editing icons
- **shapes/** - Basic shapes

### Large Icons (`@large-icons/`)

Illustrations and complex icons for features, landing pages, and marketing content.

## 🛠 Development

### Adding New Icons

1. Add SVG files to the appropriate directory:
   - Regular icons: `assets/icons/[category]/`
   - Large icons: `assets/large-icons/`

2. Rebuild sprites:
   ```bash
   npm run build:icons
   ```

3. Use in templates:
   ```twig
   {{ icon('your-new-icon') }}
   ```

### Icon Naming Convention

- Use kebab-case: `arrow-open-right`
- Include size when relevant: `add-small`, `add-large`
- Include style when relevant: `checkmark-circle-filled`
- Category prefixes are added automatically: `add/small.svg` becomes `add-small`

### Customizing Styles

Override or extend the icon styles in your component SCSS:

```scss
.my-component {
  .icon {
    &--custom {
      color: #custom-color;
      transform: rotate(45deg);
    }
  }
}
```

### Performance Tips

1. **Sprite Loading**: Sprites are loaded once and cached by the browser
2. **Icon Reuse**: Each icon can be used multiple times with no additional HTTP requests
3. **CSS Optimization**: Use CSS classes for styling instead of inline styles
4. **Lazy Loading**: Large icons can be lazy-loaded if needed

## 🐛 Debugging

### View Available Icons

In development mode (WP_DEBUG = true), use the IconExample component to see all available icons:

```twig
{% set availableIcons = get_available_icons() %}
{% for spriteId, icons in availableIcons %}
  <h3>{{ spriteId }} ({{ icons|length }} icons)</h3>
  {% for iconId in icons %}
    {{ icon(iconId) }} {{ iconId }}
  {% endfor %}
{% endfor %}
```

### Check Icon Manifest

The generated `dist/icon-manifest.json` contains all icon metadata:

```json
{
  "icons": {
    "add-small": {
      "viewBox": "0 0 24 24",
      "sprite": "icons",
      "source": "add/add-small.svg"
    }
  }
}
```

## 🔄 Build Process

The build process:

1. Scans icon directories
2. Cleans SVG content (removes XML declarations, extracts viewBox)
3. Generates sprite files with `<symbol>` elements
4. Creates manifest file for development
5. Integrates with main build process

### Build Commands

```bash
npm run build:icons          # Build sprites once
npm run build:icons:watch    # Watch for changes
npm run build               # Full build (includes icons)
```

## 🎯 Best Practices

1. **Consistent Sizing**: Use the provided size classes
2. **Semantic Usage**: Choose icons that match their meaning
3. **Accessibility**: Add `aria-label` for important icons
4. **Performance**: Reuse icons instead of creating duplicates
5. **Organization**: Keep icons organized in logical categories
6. **Testing**: Test icons across different browsers and devices

## 🤝 Contributing

When adding new icons:

1. Ensure SVGs are optimized and clean
2. Follow naming conventions
3. Add to appropriate category
4. Update documentation if needed
5. Test in multiple contexts

## 📝 License

This icon system is part of the Flynt theme and follows the same MIT license.
