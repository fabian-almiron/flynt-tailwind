# Canopy Button System Documentation

A comprehensive button system that matches your design specifications with solid buttons, ghost buttons, progressive forms, and special interactive elements.

## 🎯 Button Types

### Solid Buttons
Primary action buttons with full background colors:

```html
<!-- Primary (Aqua) -->
<button class="btn btn--primary">Try For Free</button>

<!-- Secondary (Canopy Blue) -->
<button class="btn btn--secondary">Try For Free</button>

<!-- Success (Green variant of aqua) -->
<button class="btn btn--success">Schedule Demo</button>

<!-- Dark -->
<button class="btn btn--dark">Try For Free</button>

<!-- Light -->
<button class="btn btn--light">Try For Free</button>
```

### Ghost Buttons
Outline buttons that fill on hover:

```html
<!-- Primary Ghost -->
<button class="btn btn--ghost btn--primary">Get A Demo</button>

<!-- Secondary Ghost -->
<button class="btn btn--ghost btn--secondary">Get A Demo</button>

<!-- Dark Ghost -->
<button class="btn btn--ghost btn--dark">Get A Demo</button>
```

## 📏 Button Sizes

```html
<!-- Small -->
<button class="btn btn--primary btn--small">Small Button</button>

<!-- Default (no size class needed) -->
<button class="btn btn--primary">Default Button</button>

<!-- Large -->
<button class="btn btn--primary btn--large">Large Button</button>

<!-- Extra Large (Big Button for pricing pages) -->
<button class="btn btn--secondary btn--xl">Get A Demo</button>
```

## ✨ Special Button Variants

### Animated Button
```html
<button class="btn btn--dark btn--animated">Start Workflow Tour</button>
```

### Loading Button
```html
<button class="btn btn--primary btn--loading">Loading...</button>
```

### Progressive Button (with arrow)
```html
<button class="btn btn--primary btn--progressive">Get Started</button>
```

### Disabled Button
```html
<button class="btn btn--primary" disabled>Disabled Button</button>
```

## 🔗 Buttons with Icons

```html
<!-- Icon + Text -->
<button class="btn btn--primary">
  {{ icon('add-add-small', {class: 'icon'}) }}
  Add New
</button>

<!-- Text + Icon -->
<button class="btn btn--secondary">
  Download
  {{ icon('arrows-arrow-open-down', {class: 'icon'}) }}
</button>

<!-- Icon Only -->
<button class="btn btn--ghost btn--primary">
  {{ icon('communication-communication-envelope', {class: 'icon'}) }}
</button>
```

## 📝 Progressive Form Fields

Interactive form fields that match your design:

### Light Background
```html
<div class="progressiveForm progressiveForm--light">
  <input type="email" placeholder="What's your work email?" class="progressiveForm__input">
  <button class="btn btn--success btn--progressive progressiveForm__button">
    Get Started
  </button>
</div>
```

### Dark Background
```html
<div class="progressiveForm progressiveForm--dark">
  <input type="email" placeholder="What's your work email?" class="progressiveForm__input">
  <button class="btn btn--light btn--progressive progressiveForm__button">
    {{ icon('arrows-arrow-open-right', {class: 'icon'}) }}
  </button>
</div>
```

### Minimal Style
```html
<div class="progressiveForm progressiveForm--minimal">
  <input type="email" placeholder="What's your work email?" class="progressiveForm__input">
  <button class="btn btn--primary btn--progressive progressiveForm__button">
    {{ icon('arrows-arrow-open-right', {class: 'icon'}) }}
  </button>
</div>
```

## 👥 Button Groups

### Standard Group
```html
<div class="btn-group">
  <button class="btn btn--ghost btn--primary">Cancel</button>
  <button class="btn btn--primary">Save</button>
</div>
```

### Attached Group
```html
<div class="btn-group btn-group--attached">
  <button class="btn btn--ghost btn--secondary">Previous</button>
  <button class="btn btn--secondary">Next</button>
</div>
```

### Vertical Group
```html
<div class="btn-group btn-group--vertical">
  <button class="btn btn--primary">Option 1</button>
  <button class="btn btn--ghost btn--primary">Option 2</button>
</div>
```

## 🎨 Twig Macros

For easier usage in templates, import the button macros:

```twig
{% import 'templates/_macros/buttons.twig' as buttons %}
```

### Basic Buttons
```twig
{# Primary button #}
{{ buttons.primary('Try For Free', '/signup') }}

{# Secondary button #}
{{ buttons.secondary('Learn More', '/about') }}

{# Ghost button #}
{{ buttons.ghost('Get Demo', '/demo', 'primary') }}
```

### Buttons with Icons
```twig
{# Icon on left #}
{{ buttons.withIcon('Add New', 'add-add-small', '/add', 'primary', 'left') }}

{# Icon on right #}
{{ buttons.withIcon('Download', 'arrows-arrow-open-down', '/download', 'secondary', 'right') }}
```

### Progressive Forms
```twig
{# Light background #}
{{ buttons.progressive("What's your work email?", 'Get Started', 'success') }}

{# Dark background #}
{{ buttons.progressive("What's your work email?", null, 'dark') }}
```

### Button Groups
```twig
{{ buttons.group([
  {text: 'Cancel', variant: 'primary', ghost: true},
  {text: 'Save', variant: 'primary', url: '/save'}
], true) }}
```

### CTA Buttons
```twig
{# Large animated CTA #}
{{ buttons.cta('Start Free Trial', '/signup', 'xl', 'primary', true) }}
```

## 🎯 CSS Custom Properties

Customize button appearance using CSS variables:

```css
.btn {
  --btn-padding-x: 1.5rem;
  --btn-padding-y: 0.75rem;
  --btn-font-size: 0.875rem;
  --btn-font-weight: 600;
  --btn-border-radius: 2rem;
  --btn-border-width: 2px;
  --btn-transition: all 0.2s ease;
}
```

## 🌓 Theme Support

Buttons automatically adapt to light/dark themes:

```html
<!-- These will adapt to the current theme -->
<div data-theme="light">
  <button class="btn btn--primary">Primary</button>
  <button class="btn btn--light">Light</button>
</div>

<div data-theme="dark">
  <button class="btn btn--primary">Primary</button>
  <button class="btn btn--light">Light</button>
</div>
```

## 📱 Responsive Design

Buttons automatically adapt to mobile screens:

- Smaller padding on mobile devices
- Button groups stack vertically on mobile
- Progressive forms stack on very small screens
- Touch-friendly minimum height (44px)

## ♿ Accessibility Features

- **Keyboard Navigation**: Full keyboard support
- **Focus Indicators**: Clear focus outlines
- **Screen Readers**: Proper ARIA attributes
- **High Contrast**: Supports high contrast mode
- **Reduced Motion**: Respects motion preferences
- **Minimum Size**: 44px minimum touch target

## 🎨 Brand Colors

Buttons use your Canopy brand colors:

- **Primary**: `#0BE6C7` (Aqua)
- **Secondary**: `#2B48FF` (Canopy Blue)
- **Success**: `#0BE6C7` (Aqua variant)
- **Dark**: `#222225` (Charcoal)
- **Light**: Adapts to theme background colors

## 🔧 Customization

### Creating Custom Button Variants

```scss
.btn--custom {
  background-color: #your-color;
  border-color: #your-color;
  color: white;

  &:hover {
    background-color: #your-darker-color;
    border-color: #your-darker-color;
    transform: translateY(-1px);
  }
}
```

### Custom Progressive Form Styles

```scss
.progressiveForm--custom {
  background-color: #your-bg-color;
  border: 2px solid #your-border-color;
  color: #your-text-color;

  &:focus-within {
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(11, 230, 199, 0.1);
  }
}
```

## 🚀 Performance

- **CSS-only animations** for smooth performance
- **Minimal JavaScript** required (only for interactive features)
- **Optimized selectors** for fast rendering
- **Efficient hover states** using CSS transforms

## 📋 Best Practices

### Usage Guidelines

1. **Primary buttons** for main actions (1 per section)
2. **Secondary buttons** for secondary actions
3. **Ghost buttons** for less important actions
4. **Progressive forms** for email capture
5. **Button groups** for related actions

### Accessibility Guidelines

1. Use descriptive button text
2. Add `aria-label` for icon-only buttons
3. Ensure sufficient color contrast
4. Test with keyboard navigation
5. Provide loading states for async actions

### Performance Guidelines

1. Avoid excessive button animations
2. Use CSS transforms for smooth hover effects
3. Minimize DOM manipulation
4. Test on mobile devices

## 🎉 Examples

See the `ButtonShowcase` component for complete examples of all button types and usage patterns.

## 🔍 Troubleshooting

### Common Issues

**Buttons not styling correctly**
- Ensure you're importing the button styles
- Check for CSS specificity conflicts
- Verify class names are correct

**Progressive forms not working**
- Check that all required classes are applied
- Ensure proper HTML structure
- Verify JavaScript is loaded (if needed)

**Icons not displaying in buttons**
- Ensure icon sprites are built (`npm run build:icons`)
- Check icon ID is correct
- Verify icon system is loaded

Your button system is now ready to use throughout your Canopy theme! 🚀
