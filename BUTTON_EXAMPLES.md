# Button System Usage Examples

Quick reference for using the Canopy button system in your components.

## 🚀 Quick Examples

### Basic HTML Usage

```html
<!-- Solid Buttons -->
<button class="btn btn--primary">Try For Free</button>
<button class="btn btn--secondary">Try For Free</button>
<button class="btn btn--success">Schedule Demo</button>
<button class="btn btn--dark">Try For Free</button>
<button class="btn btn--light">Try For Free</button>

<!-- Ghost Buttons -->
<button class="btn btn--ghost btn--primary">Get A Demo</button>
<button class="btn btn--ghost btn--secondary">Get A Demo</button>
<button class="btn btn--ghost btn--dark">Get A Demo</button>

<!-- Button Sizes -->
<button class="btn btn--primary btn--small">Small</button>
<button class="btn btn--primary">Default</button>
<button class="btn btn--primary btn--large">Large</button>
<button class="btn btn--secondary btn--xl">Big Button</button>

<!-- Special Buttons -->
<button class="btn btn--dark btn--animated">Start Workflow Tour</button>
<button class="btn btn--primary btn--loading">Loading...</button>
<button class="btn btn--primary" disabled>Disabled</button>
```

### Twig Macro Usage

```twig
{% import 'templates/_macros/buttons.twig' as buttons %}

<!-- Basic buttons -->
{{ buttons.primary('Try For Free', '/signup') }}
{{ buttons.secondary('Learn More', '/about') }}
{{ buttons.ghost('Get Demo', '/demo', 'primary') }}

<!-- Buttons with icons -->
{{ buttons.withIcon('Add New', 'add-add-small', '/add', 'primary', 'left') }}
{{ buttons.withIcon('Download', 'arrows-arrow-open-down', '/download', 'secondary', 'right') }}

<!-- Progressive forms -->
{{ buttons.progressive("What's your work email?", 'Get Started', 'success') }}
{{ buttons.progressive("What's your work email?", null, 'dark') }}

<!-- CTA buttons -->
{{ buttons.cta('Start Free Trial', '/signup', 'xl', 'primary', true) }}
```

### Progressive Form Examples

```html
<!-- Light Background -->
<div class="progressiveForm progressiveForm--light">
  <input type="email" placeholder="What's your work email?" class="progressiveForm__input">
  <button class="btn btn--success btn--progressive progressiveForm__button">
    Get Started
  </button>
</div>

<!-- Dark Background -->
<div class="progressiveForm progressiveForm--dark">
  <input type="email" placeholder="What's your work email?" class="progressiveForm__input">
  <button class="btn btn--light btn--progressive progressiveForm__button">
    <svg class="icon">...</svg>
  </button>
</div>

<!-- Minimal Style -->
<div class="progressiveForm progressiveForm--minimal">
  <input type="email" placeholder="What's your work email?" class="progressiveForm__input">
  <button class="btn btn--primary btn--progressive progressiveForm__button">
    <svg class="icon">...</svg>
  </button>
</div>
```

## 🎯 Matching Your Design

Based on your design image, here are the exact implementations:

### Solid Buttons Row
```html
<button class="btn btn--success">TRY FOR FREE</button>
<button class="btn btn--secondary">TRY FOR FREE</button>
<button class="btn btn--primary">SCHEDULE DEMO</button>
<button class="btn btn--dark">TRY FOR FREE</button>
<button class="btn btn--light">TRY FOR FREE</button>
```

### Ghost Buttons Row
```html
<button class="btn btn--ghost btn--secondary">GET A DEMO</button>
<button class="btn btn--ghost btn--dark">GET A DEMO</button>
<button class="btn btn--ghost btn--light">GET A DEMO</button>
```

### Big Button (Pricing Page)
```html
<button class="btn btn--secondary btn--xl">GET A DEMO</button>
```

### Animated Button (Interactive Tour)
```html
<button class="btn btn--dark btn--animated">START WORKFLOW TOUR</button>
```

### Progressive Form Fields
```html
<!-- Light variant -->
<div class="progressiveForm progressiveForm--light">
  <input type="email" placeholder="What's your work email?" class="progressiveForm__input">
  <button class="btn btn--success progressiveForm__button">GET STARTED</button>
</div>

<!-- Dark variant -->
<div class="progressiveForm progressiveForm--dark">
  <input type="email" placeholder="What's your work email?" class="progressiveForm__input">
  <button class="btn btn--light progressiveForm__button">
    {{ icon('arrows-arrow-open-right', {class: 'icon'}) }}
  </button>
</div>

<!-- Minimal variant -->
<div class="progressiveForm progressiveForm--minimal">
  <input type="email" placeholder="What's your work email?" class="progressiveForm__input">
  <button class="btn btn--primary progressiveForm__button">
    {{ icon('arrows-arrow-open-right', {class: 'icon'}) }}
  </button>
</div>
```

## 🎨 Color Reference

Your buttons use these exact Canopy brand colors:

- **Primary (Aqua)**: `#0BE6C7`
- **Secondary (Canopy Blue)**: `#2B48FF`
- **Success (Green Aqua)**: `#0BE6C7`
- **Dark (Charcoal)**: `#222225`
- **Light**: Adapts to current theme

## 📱 Responsive Behavior

All buttons automatically adapt to mobile:
- Smaller padding on mobile devices
- Button groups stack vertically
- Progressive forms stack on very small screens
- Touch-friendly 44px minimum height

## ♿ Accessibility Built-in

- Keyboard navigation support
- Focus indicators
- Screen reader friendly
- High contrast mode support
- Reduced motion preferences
- Proper ARIA attributes

Your button system is ready to use! 🚀
