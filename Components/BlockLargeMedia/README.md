# Block Large Media

A flexible media block component that supports large images or embedded Wistia videos. Ideal for showcasing product screenshots, featured content, or video demonstrations.

## Features

### Media Types
- **Image**: Upload high-quality images for product screenshots or featured visuals
- **Video**: Embed Wistia videos with full playback controls

### Image Support
- Desktop image upload
- Optional mobile-specific image (replaces desktop image on mobile devices)
- Automatic responsive sizing
- Alt text support for accessibility
- Lazy loading for performance

### Video Support
- Wistia video embedding via URL or video ID
- Optional custom poster/thumbnail image
- Fallback image for no-JS scenarios or load failures
- Configurable mobile behavior:
  - Show video (default)
  - Show poster image only
  - Show fallback image
- Responsive video embedding with 16:9 aspect ratio
- Accessible video controls

### Content
- Optional heading
- Optional description text (WYSIWYG)
- Centered header layout

### Layout Options
- Background color selection (white, light gray, gray, primary)
- Content width options (default, wide, full width)
- Responsive padding and spacing

## Accessibility

### Images
- All images require alt text input
- Proper semantic HTML structure
- Lazy loading for better performance

### Videos
- ARIA labels for video player region
- Keyboard-accessible playback controls (via Wistia player)
- Fallback content for users without JavaScript
- Optional poster images for preview

## Use Cases

- Large product screenshots
- Featured video content
- Hero media sections
- Case study visuals
- Tutorial videos with context

## Technical Details

### Media Type Selection
The component uses a selectable media type field that dynamically shows/hides relevant fields:
- Selecting "Image" shows image upload fields
- Selecting "Video" shows video URL and related video fields

### Wistia Integration
The component automatically:
- Extracts video IDs from various Wistia URL formats
- Loads the Wistia player asynchronously
- Applies responsive video embedding
- Supports custom poster images via inline styles

### Mobile Image Handling
When a mobile image is provided:
- Desktop image is hidden below 768px viewport width
- Mobile image displays only on mobile devices
- Maintains proper aspect ratios and responsive behavior

### Mobile Video Behavior
Three options for video display on mobile:
1. **Show Video**: Full video player with controls (default)
2. **Show Poster Image**: Static poster image only, no video
3. **Show Fallback Image**: Alternative image for mobile contexts

## Layout Adaptation

The component automatically adapts spacing and layout based on:
- Selected content width
- Presence of heading/content
- Media type selection
- Viewport size

No blank space is left when optional fields are empty.

