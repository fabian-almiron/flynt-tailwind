# Canopy Theme System Documentation

A comprehensive theme system with light/dark modes, brand colors, and dynamic switching capabilities for the Flynt WordPress theme.

## 🎨 Brand Colors

### Primary Palette
```scss
$charcoal:    #222225  // Main dark color
$canopy-blue: #2B48FF  // Primary brand blue
$cool-gray:   #F1F3F7  // Light background
$aqua:        #0BE6C7  // Primary brand aqua
$pure-white:  #FFFFFF  // Pure white
```

### Secondary Palette
```scss
$aqua-2:      #10C9CD  // Secondary aqua
$blue-2:      #217FE9  // Secondary blue
$dark-blue:   #0E2998  // Dark blue variant
$dark-aqua:   #096A89  // Dark aqua variant
$warm-gray:   #EFF0ED  // Warm background
$medium-gray: #797986  // Text muted
$true-black:  #000000  // True black
```

## 🌓 Theme Modes

### Default Theme (Light)
- **Background**: Pure white with cool gray sections
- **Text**: Charcoal for high readability
- **Primary**: Aqua for CTAs and highlights
- **Secondary**: Canopy blue for secondary actions

### Light Theme
- **Background**: Cool gray with warm gray sections
- **Text**: Charcoal with better contrast
- **Primary**: Dark aqua for better contrast
- **Secondary**: Dark blue for secondary actions

### Dark Theme
- **Background**: Charcoal with black sections
- **Text**: Pure white for high contrast
- **Primary**: Bright aqua for visibility
- **Secondary**: Light blue for secondary actions

## 🎯 CSS Custom Properties

### Core Colors
```css
--color-primary          /* Main brand color */
--color-primary-dark     /* Darker variant */
--color-primary-light    /* Lighter variant */
--color-secondary        /* Secondary brand color */
--color-secondary-dark   /* Darker variant */
--color-secondary-light  /* Lighter variant */
--color-accent           /* Accent color (usually primary) */
```

### Background Colors
```css
--color-background           /* Main background */
--color-background-secondary /* Secondary background */
--color-background-tertiary  /* Tertiary background */
```

### Text Colors
```css
--color-text         /* Primary text */
--color-text-muted   /* Muted text */
--color-text-inverse /* Inverse text (for dark backgrounds) */
```

### Semantic Colors
```css
--color-success  /* Success states */
--color-warning  /* Warning states */
--color-error    /* Error states */
--color-info     /* Info states */
```

### Border Colors
```css
--color-border           /* Primary borders */
--color-border-secondary /* Secondary borders */
```

## 🔧 Theme Implementation

### Component Theme Support

Components can use theme modes by adding the `data-theme` attribute:

```twig
<flynt-component name="MyComponent" {{ options.theme ? 'data-theme="' ~ options.theme ~ '"' }}>
  <!-- Component content -->
</flynt-component>
```

### ACF Field Integration

Use the theme field helper in your component functions:

```php
use function Flynt\FieldVariables\getTheme;

function getACFLayout()
{
    return [
        'name' => 'myComponent',
        'label' => 'My Component',
        'sub_fields' => [
            getTheme(), // Adds theme selection dropdown
            // ... other fields
        ]
    ];
}
```

## 🎨 Color Utility Classes

### Background Colors
```css
.bg-primary     /* Primary background */
.bg-secondary   /* Secondary background */
.bg-accent      /* Accent background */
.bg-success     /* Success background */
.bg-warning     /* Warning background */
.bg-error       /* Error background */
.bg-light       /* Light background */
.bg-dark        /* Dark background */
.bg-white       /* White background */
```

### Text Colors
```css
.text-primary   /* Primary text color */
.text-secondary /* Secondary text color */
.text-accent    /* Accent text color */
.text-success   /* Success text color */
.text-warning   /* Warning text color */
.text-error     /* Error text color */
.text-muted     /* Muted text color */
.text-inverse   /* Inverse text color */
```

### Border Colors
```css
.border-primary   /* Primary border */
.border-secondary /* Secondary border */
.border-accent    /* Accent border */
.border-light     /* Light border */
.border-dark      /* Dark border */
```

## 🌈 Brand-Specific Components

### Canopy Gradients
```css
.canopy-gradient         /* Primary to secondary gradient */
.canopy-gradient-reverse /* Secondary to primary gradient */
.canopy-gradient-subtle  /* Subtle background gradient */
```

### Canopy Buttons
```css
.btn-canopy           /* Primary button style */
.btn-canopy-outline   /* Outlined button style */
.btn-canopy-secondary /* Secondary button style */
```

### Status Indicators
```css
.status-active   /* Active status */
.status-pending  /* Pending status */
.status-inactive /* Inactive status */
.status-error    /* Error status */
```

## 🎯 Icon System Integration

Icons automatically adapt to theme colors:

```twig
{# Icons inherit current theme colors #}
{{ icon('checkmark-large', {class: 'icon icon--primary'}) }}
{{ icon('alert-triangle', {class: 'icon icon--warning'}) }}
{{ icon('close-small', {class: 'icon icon--error'}) }}

{# Theme-aware icon buttons #}
<button class="icon-button icon-button--primary">
  {{ icon('add-small') }}
  Add Item
</button>
```

## 📱 Responsive & Accessibility

### Responsive Design
- Theme switchers adapt to mobile screens
- Color swatches stack appropriately
- Touch-friendly button sizes

### Accessibility Features
- High contrast mode support
- Reduced motion preferences
- Proper ARIA labels and roles
- Keyboard navigation support
- Screen reader friendly

### System Integration
- Respects `prefers-color-scheme`
- Automatic theme switching based on system preference
- Persistent theme selection via localStorage
- Meta theme-color updates for mobile browsers

## 🔄 Theme Persistence

The theme system automatically:
1. **Detects system preference** on first visit
2. **Stores user choice** in localStorage
3. **Applies theme immediately** on page load
4. **Syncs across tabs** when theme changes
5. **Falls back gracefully** if localStorage unavailable

## 🎨 Customization

### Adding New Themes

1. **Define colors in variables**:
```scss
[data-theme="custom"] {
  --color-primary: #your-color;
  --color-background: #your-bg;
  // ... other properties
}
```

2. **Add to theme field options**:
```php
// In inc/fieldVariables.php
'choices' => [
    '' => __('(none)', 'flynt'),
    'light' => __('Light', 'flynt'),
    'dark' => __('Dark', 'flynt'),
    'custom' => __('Custom', 'flynt'), // Add this
],
```

3. **Update theme switcher**:
```javascript
// Add custom theme to switcher options
themeSwitcher.setTheme('custom');
```

### Brand Color Variations

Create variations for specific use cases:

```scss
// Seasonal themes
[data-theme="winter"] {
  --color-primary: #4A90E2;
  --color-accent: #7ED321;
}

// High contrast theme
[data-theme="high-contrast"] {
  --color-primary: #000000;
  --color-background: #FFFFFF;
  --color-border: #000000;
}
```

## 🚀 Performance

### Optimizations
- **CSS Custom Properties** for instant theme switching
- **No JavaScript required** for basic theme display
- **Minimal CSS overhead** with shared base styles
- **Efficient sprite system** for icons
- **Cached theme preferences** in localStorage

### Best Practices
1. Use CSS custom properties for all themeable values
2. Avoid hardcoded colors in component styles
3. Test all themes for contrast and readability
4. Provide fallback colors for older browsers
5. Use semantic color names rather than specific hues

## 🐛 Debugging

### Theme Inspector
Add this to your templates for debugging:

```twig
{% if constant('WP_DEBUG') %}
<div class="theme-debug">
  <h3>Current Theme: <span data-current-theme></span></h3>
  <div class="color-samples">
    <div style="background: var(--color-primary)">Primary</div>
    <div style="background: var(--color-secondary)">Secondary</div>
    <div style="background: var(--color-background)">Background</div>
  </div>
</div>
{% endif %}
```

### Console Debugging
```javascript
// Check current theme state
console.log('Theme:', window.themeSwitcher.getCurrentTheme());
console.log('Is Dark:', window.themeSwitcher.isDark());

// Monitor theme changes
document.addEventListener('themechange', (e) => {
  console.log('Theme changed:', e.detail);
});
```

## 📋 Checklist

When implementing themes:

- [ ] Define all color variables
- [ ] Test light and dark modes
- [ ] Verify contrast ratios (WCAG AA)
- [ ] Test with system preferences
- [ ] Validate localStorage persistence
- [ ] Check mobile theme-color meta tag
- [ ] Test keyboard navigation
- [ ] Verify screen reader compatibility
- [ ] Test with reduced motion preferences
- [ ] Validate print styles

## 🎉 Examples

See the `IconExample` component for a complete demonstration of:
- Theme switcher implementations
- Color showcases across themes
- Icon integration with themes
- Responsive theme behavior

The theme system is now fully integrated and ready for production use!
