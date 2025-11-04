# 🎨 Canopy Icon System Reference

This document provides a complete reference of all available icons in the Canopy theme. Use these icon IDs in your mega menu configuration, components, and templates.

## 📖 How to Use Icons

### In Mega Menu (ACF)
When configuring mega menu items, use the **Icon ID** in the "Icon" field:
```
person-person
misc-misc-gear
files-file-document
```

### In Twig Templates
```twig
{{ icon('person-person', 'small') }}
{{ icon('misc-misc-gear', 'medium') }}
{{ icon('files-file-document', 'large') }}
```

### Icon Sizes
- `small` - 20px × 20px (default for mega menu)
- `medium` - 24px × 24px
- `large` - 32px × 32px

---

## 🔍 Icon Categories

### 👤 People & Users
Perfect for client management, user accounts, and team features.

| Icon ID | Description |
|---------|-------------|
| `person-person` | Basic person icon |
| `person-person-small` | Small person icon |
| `person-person-add` | Add person |
| `person-person-remove` | Remove person |
| `person-person-checkmark` | Person with checkmark |
| `person-person-arrow-right` | Person with arrow |
| `person-person-details` | Person details |
| `person-person-key` | Person with key |
| `person-person-lock` | Person with lock |
| `person-person-monitor` | Person with monitor |
| `person-person-people` | Multiple people |
| `person-person-resend` | Resend to person |
| `person-person-switch-account` | Switch account |
| `person-person-x` | Person with X |
| `person-person-client-request` | Client request |
| `person-client-details` | Client details |
| `misc-misc-individual-client` | Individual client |
| `misc-misc-client-group` | Client group |

### 📁 Files & Documents
Essential for document management and file operations.

| Icon ID | Description |
|---------|-------------|
| `files-file` | Basic file |
| `files-file-document` | Document file |
| `files-file-pdf` | PDF file |
| `files-file-image` | Image file |
| `files-file-video` | Video file |
| `files-file-audio` | Audio file |
| `files-file-spreadsheet` | Spreadsheet |
| `files-file-presentation` | Presentation |
| `files-file-code` | Code file |
| `files-file-zip` | ZIP file |
| `files-file-link` | File link |
| `files-file-gear` | File settings |
| `files-file-right` | File with arrow |
| `files-file-statement` | Statement file |
| `files-files` | Multiple files |
| `files-files-filled` | Multiple files (filled) |

### 📂 Folders & Organization
For organizing content and managing folder structures.

| Icon ID | Description |
|---------|-------------|
| `folders-folder` | Basic folder |
| `folders-folder-open` | Open folder |
| `folders-folder-open-filled` | Open folder (filled) |
| `folders-folder-add` | Add folder |
| `folders-folder-duplicate` | Duplicate folder |
| `folders-folder-person` | Person folder |
| `folders-folder-right` | Folder with arrow |
| `folders-folder-up` | Folder up |
| `folders-folder-zip` | ZIP folder |
| `folders-folder-logo` | Folder with logo |
| `folders-folder-c` | Folder C |
| `folders-folder-clock-closed` | Folder with clock (closed) |
| `folders-folder-clock-open` | Folder with clock (open) |
| `folders-folder-expand-all` | Expand all folders |
| `folders-folder-add-template` | Add template folder |

### 💰 Billing & Finance
For payment processing, invoicing, and financial features.

| Icon ID | Description |
|---------|-------------|
| `billing-billing-credit-card` | Credit card |
| `billing-billing-invoice` | Invoice |
| `billing-billing-check` | Check payment |
| `billing-billing-bank` | Bank |
| `billing-billing-visa` | Visa card |
| `billing-billing-mastercard` | Mastercard |
| `billing-billing-amex` | American Express |
| `billing-billing-discover` | Discover card |
| `billing-billing-circle-open` | Billing circle |
| `billing-billing-circle-open-dash` | Billing circle with dash |
| `billing-billing-square-open` | Billing square |
| `billing-billing-document-arrows` | Document with arrows |
| `billing-billing-dollar-arrows` | Dollar with arrows |
| `billing-billing-hand-coins` | Hand with coins |
| `billing-billing-hand-payments` | Hand with payments |
| `misc-misc-money-bag` | Money bag |

### ⚙️ Settings & Configuration
For system settings, preferences, and configuration options.

| Icon ID | Description |
|---------|-------------|
| `misc-misc-gear` | Settings gear |
| `misc-misc-page-settings` | Page settings |
| `misc-misc-card-gears` | Card with gears |
| `files-file-gear` | File settings |

### 📧 Communication
For messaging, email, and communication features.

| Icon ID | Description |
|---------|-------------|
| `communication-communication-envelope` | Email envelope |
| `communication-communication-envelope-small` | Small envelope |
| `communication-communication-envelope-add` | Add envelope |
| `communication-communication-envelope-remove` | Remove envelope |
| `communication-communication-inbox` | Inbox |
| `communication-communication-chat-bubble` | Chat bubble |
| `communication-communication-chat-bubble-unread` | Unread chat |
| `communication-communication-chat-bubbles` | Multiple chat bubbles |
| `communication-communication-phone` | Phone |
| `communication-communication-mobile-phone` | Mobile phone |
| `communication-communication-video` | Video call |
| `communication-communication-paper-airplane` | Send message |
| `communication-communication-megaphone` | Megaphone |
| `communication-communication-signature` | Signature |
| `communication-communication-signature-pen` | Signature pen |
| `communication-communication-letter-front` | Letter front |
| `communication-communication-letter-back` | Letter back |
| `communication-communication-initials` | Initials |
| `communication-communication-email-template` | Email template |

### 📋 Tasks & Organization
For task management, organization, and workflow features.

| Icon ID | Description |
|---------|-------------|
| `organize-organize-boards` | Boards view |
| `organize-organize-grid` | Grid view |
| `organize-organize-rows` | Rows view |
| `organize-organize-tiles` | Tiles view |
| `organize-organize-sidebar` | Sidebar |
| `organize-organize-tag` | Tag |
| `organize-organize-template` | Template |
| `organize-organize-template-add` | Add template |
| `communication-communication-clipboard` | Clipboard |
| `communication-communication-clipboard-check` | Clipboard with check |
| `communication-communication-clipboard-x` | Clipboard with X |
| `misc-misc-organizer` | Organizer |

### ✅ Actions & Status
For checkmarks, alerts, and action indicators.

| Icon ID | Description |
|---------|-------------|
| `checkmarks-checkmark-large` | Large checkmark |
| `checkmarks-checkmark-small` | Small checkmark |
| `checkmarks-checkmark-circle-filled-large` | Filled circle checkmark (large) |
| `checkmarks-checkmark-circle-filled-small` | Filled circle checkmark (small) |
| `checkmarks-checkmark-circle-open-large` | Open circle checkmark (large) |
| `checkmarks-checkmark-circle-open-small` | Open circle checkmark (small) |
| `checkmarks-checkmark-circle-arrows` | Checkmark with arrows |
| `checkmarks-checkmark-box-plus` | Checkbox plus |
| `checkmarks-checkmark-line-badge` | Line badge checkmark |
| `checkmarks-checkmark-line-square` | Line square checkmark |

### ⚠️ Alerts & Notifications
For warnings, errors, and important notifications.

| Icon ID | Description |
|---------|-------------|
| `alert-alert-exclamation` | Exclamation |
| `alert-alert-triangle-filled-large` | Filled triangle alert (large) |
| `alert-alert-triangle-filled-small` | Filled triangle alert (small) |
| `alert-alert-triangle-open-large` | Open triangle alert (large) |
| `alert-urgent-filled-large` | Urgent filled (large) |
| `alert-urgent-filled-small` | Urgent filled (small) |
| `alert-urgent-open-large` | Urgent open (large) |
| `alert-urgent-open-small` | Urgent open (small) |
| `misc-misc-bell` | Bell notification |
| `misc-misc-bell-small` | Small bell |

### 🏠 General & Miscellaneous
Common icons for various purposes.

| Icon ID | Description |
|---------|-------------|
| `misc-misc-house` | House/Home |
| `misc-misc-calendar` | Calendar |
| `misc-misc-clock` | Clock |
| `misc-misc-clock-back` | Clock back |
| `misc-misc-timer` | Timer |
| `misc-misc-alarm-clock` | Alarm clock |
| `misc-misc-globe` | Globe |
| `misc-misc-map-pin` | Map pin |
| `misc-misc-magnifying-glass` | Search/Magnifying glass |
| `misc-misc-magnifying-glass-small` | Small magnifying glass |
| `misc-misc-link` | Link |
| `misc-broken-link` | Broken link |
| `misc-misc-image` | Image |
| `misc-misc-camera` | Camera |
| `misc-misc-printer` | Printer |
| `misc-misc-calculator` | Calculator |
| `misc-misc-bright-calculator` | Bright calculator |
| `misc-misc-briefcase` | Briefcase |
| `misc-misc-buildings` | Buildings |
| `misc-misc-buildings-add` | Add buildings |
| `misc-misc-car` | Car |
| `misc-misc-hand` | Hand |
| `misc-misc-paintbrush` | Paintbrush |
| `misc-misc-pencil-paintbrush` | Pencil paintbrush |

### 🔒 Security & Privacy
For security features, permissions, and privacy controls.

| Icon ID | Description |
|---------|-------------|
| `misc-misc-padlock` | Locked padlock |
| `misc-misc-padlock-unlocked` | Unlocked padlock |
| `misc-misc-kba-shield` | KBA shield |
| `misc-misc-open-eye` | Open eye (visible) |
| `misc-misc-closed-eye` | Closed eye (hidden) |
| `person-person-key` | Person with key |
| `person-person-lock` | Person with lock |

### ➕ Add/Remove Actions
For adding, removing, and modifying content.

| Icon ID | Description |
|---------|-------------|
| `add-add-large` | Large add/plus |
| `add-add-small` | Small add/plus |
| `add-add-circle-filled` | Filled circle add |
| `add-add-circle-open` | Open circle add |
| `remove-remove-minus` | Minus/subtract |
| `remove-remove-circle-filled-small` | Filled circle remove (small) |
| `remove-remove-circle-open-large` | Open circle remove (large) |
| `remove-remove-circle-open-small` | Open circle remove (small) |
| `close-close-large` | Large close/X |
| `close-close-small` | Small close/X |
| `close-close-circle-filled` | Filled circle close |
| `close-close-circle-open` | Open circle close |

### 🔄 Arrows & Navigation
For navigation, directions, and flow indicators.

| Icon ID | Description |
|---------|-------------|
| `arrows-arrow-line-up` | Line arrow up |
| `arrows-arrow-line-down` | Line arrow down |
| `arrows-arrow-line-left` | Line arrow left |
| `arrows-arrow-line-right` | Line arrow right |
| `arrows-arrow-open-up` | Open arrow up |
| `arrows-arrow-open-down` | Open arrow down |
| `arrows-arrow-open-left` | Open arrow left |
| `arrows-arrow-open-right` | Open arrow right |
| `arrows-arrow-drag-left` | Drag arrow left |
| `arrows-arrow-drag-right` | Drag arrow right |
| `caret-caret-large-up` | Large caret up |
| `caret-caret-large-down` | Large caret down |
| `caret-caret-large-left` | Large caret left |
| `caret-caret-large-right` | Large caret right |
| `caret-caret-small-up` | Small caret up |
| `caret-caret-small-down` | Small caret down |
| `caret-caret-small-left` | Small caret left |
| `caret-caret-small-right` | Small caret right |

### 🤖 AI & Automation
For AI features and automated processes.

| Icon ID | Description |
|---------|-------------|
| `ai-sparkle-filled` | Filled sparkle (AI) |
| `ai-sparkle-outline` | Outline sparkle (AI) |
| `ai-document-sparkle` | Document with AI |
| `ai-document-money-sparkle` | Document money with AI |
| `ai-folder-open-sparkle` | Folder with AI |
| `ai-text-input-sparkle` | Text input with AI |
| `ai-clipboard-sparkle` | Clipboard with AI |
| `ai-blocks-sparkle` | Blocks with AI |
| `ai-pages-sparkle` | Pages with AI |
| `ai-crud-pencil-ai` | Edit with AI |

---

## 📊 Large Icons (Hero/Feature Icons)

These are larger, more detailed icons perfect for hero sections, feature highlights, and prominent UI elements.

### Business & Professional
- `calculator` - Calculator
- `calculator-graph` - Calculator with graph
- `presentation` - Presentation
- `handshake` - Handshake
- `employees` - Employees
- `gear` - Settings
- `tools` - Tools

### Communication & Support
- `chat-1` - Chat bubble
- `chat-2` - Chat conversation
- `chat-question` - Chat with question
- `mail` - Mail
- `mail-open` - Open mail
- `phone-1` - Phone
- `phone-call` - Phone call
- `phone-message` - Phone with message
- `message` - Message

### Documents & Data
- `document-1` - Single document
- `document-3` - Multiple documents
- `document-long` - Long document
- `documents` - Document stack
- `documents-2` - Document pair
- `folder` - Folder
- `folder-2` - Folder variant
- `file-box` - File storage box

### Financial & Business
- `money` - Money/Currency
- `credit-card` - Credit card
- `payment` - Payment
- `receipt` - Receipt
- `pie-chart` - Pie chart
- `pie-chart-money` - Pie chart with money
- `graph` - Graph/Analytics

### Technology & Digital
- `desktop-2` - Desktop computer
- `desktop-document` - Desktop with document
- `ai-laptop` - Laptop with AI
- `ai-person` - Person with AI
- `video` - Video
- `link` - Link/Connection

---

## 💡 Usage Tips

### Mega Menu Best Practices
1. **Use consistent icon families** - Stick to similar styles (e.g., all `person-*` icons for user features)
2. **Match icons to content** - Choose icons that clearly represent the linked content
3. **Consider hierarchy** - Use more detailed icons for important features
4. **Test visibility** - Ensure icons are clear at small sizes

### Common Icon Combinations for Mega Menu
```
CLIENTS Column:
- person-person (Client Engagement)
- misc-misc-house (Client Portal)
- misc-misc-gear (CRM)
- person-person-people (Smart Intake)
- communication-communication-chat-bubble (Engagements & Proposals)

WORK Column:
- arrow-functions-af-refresh (Workflow Automation)
- files-file-document (Document Management)
- communication-communication-signature (Transcripts & Notices)
- misc-misc-scales (Tax Resolution)
- communication-communication-signature-pen (eSignatures)

REVENUE Column:
- billing-billing-credit-card (Billing)
- misc-misc-clock (Time & Expense Management)
- billing-billing-hand-payments (Payments)
- misc-misc-bar-graph (Insights)

PRACTICE Column:
- misc-misc-buildings (Firm-Wide Operating System)
- organize-organize-template (Templates)
- misc-misc-canopy-mark (Canopy AI)
- misc-misc-kba-shield (Security)
```

### Icon Naming Convention
Icons follow this pattern: `{category}-{subcategory}-{name}`
- `person-person-add` = Person category, person subcategory, add action
- `misc-misc-gear` = Miscellaneous category, misc subcategory, gear icon
- `files-file-document` = Files category, file subcategory, document type

---

## 🔧 Technical Notes

- **Total Icons**: 391 icons across 2 sprite files
- **Format**: SVG sprites for optimal performance
- **Sizes**: Scalable vector graphics, optimized for web
- **Loading**: Icons are loaded via sprite system for fast rendering
- **Accessibility**: All icons include proper viewBox attributes for screen readers

---

*Last updated: Generated from icon manifest - includes all available icons in the Canopy theme system.*
