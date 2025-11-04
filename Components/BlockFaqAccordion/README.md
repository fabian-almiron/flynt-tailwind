# Block: FAQ Accordion

An accessible accordion component for displaying Frequently Asked Questions.

## Features

- **Title & Subtitle**: Optional header section with support link
- **Repeater Field**: Add unlimited FAQ items
- **Open by Default**: Option to have specific items open on page load
- **Accessible**: Proper ARIA attributes and keyboard navigation
- **Animated Icons**: Plus/minus icons that rotate on open/close
- **Responsive**: Works on all screen sizes

## Fields

### Content Tab
- **Title**: Main heading (default: "Frequently Asked Questions")
- **Subtitle**: Optional subtitle text with support for inline links
- **Support Link**: Optional link that appears in the subtitle
- **FAQ Items** (Repeater):
  - Question (text, required)
  - Answer (WYSIWYG, required)
  - Open by Default (true/false)

### Options Tab
- **Theme**: Light/dark theme selection

## Usage

The accordion automatically handles opening/closing of items. Only one item can be open at a time. Users can click the question or the icon to toggle the accordion.

## Accessibility

- Proper ARIA labels and expanded states
- Keyboard accessible
- Focus indicators
- Semantic HTML structure

