<?php

namespace Flynt\Components\NavigationMain;

use Flynt\Utils\Asset;
use Flynt\Utils\Options;
use Timber\Timber;

add_action('init', function (): void {
    register_nav_menus([
        'navigation_main' => __('Navigation Main', 'flynt')
    ]);
});

add_filter('Flynt/addComponentData?name=NavigationMain', function (array $data): array {
    $data['menu'] = Timber::get_menu('navigation_main') ?? Timber::get_pages_menu();
    $data['logo'] = [
        'src' => get_theme_mod('custom_logo') ? wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') : Asset::requireUrl('assets/images/logo.svg'),
        'alt' => get_bloginfo('name')
    ];

    // Add mega menu data from ACF options
    $acfData = get_field('megaMenuColumns', 'option');

    // If ACF data is empty, use fallback data
    if (empty($acfData)) {
        $data['megaMenuColumns'] = [
            [
                'title' => 'UNCLUNK YOUR FIRM',
                'triggerMenuItem' => 'Solutions',
                'columnColor' => '#F8F9FA',
                'textColor' => '#333333',
                'items' => [
                    [
                        'icon' => 'person-person',
                        'title' => 'Why Canopy?',
                        'description' => 'All-in-one Practice Management for the firm you\'ve always wanted.',
                        'url' => '/why-canopy',
                        'featured' => false
                    ],
                ],
            ],
            [
                'title' => 'SOLUTIONS',
                'triggerMenuItem' => 'Solutions',
                'columnColor' => '#F8F9FA',
                'textColor' => '#333333',
                'items' => [
                    [
                        'icon' => 'person-person-key',
                        'title' => 'Private Equity-Backed Firms',
                        'description' => 'Make the most of your client relationships',
                        'url' => '/private-equity-firms',
                        'featured' => false
                    ],
                    [
                        'icon' => 'misc-misc-gear',
                        'title' => 'Future-Focused Firms',
                        'description' => 'Canopy Workflow helps you focus your time on the right things',
                        'url' => '/future-focused-firms',
                        'featured' => false
                    ],
                ],
            ],
            [
                'title' => 'FOR EVERY FIRM',
                'triggerMenuItem' => 'Solutions',
                'columnColor' => '#F8F9FA',
                'textColor' => '#333333',
                'items' => [
                    [
                        'icon' => 'ai-ai-sparkle',
                        'title' => 'AI-Optimized Firms',
                        'description' => 'Canopy Workflow helps you focus your time on the right things',
                        'url' => '/ai-optimized-firms',
                        'featured' => false
                    ],
                    [
                        'icon' => 'misc-misc-database',
                        'title' => 'Data-Driven Firm Management',
                        'description' => 'Canopy Workflow helps you focus your time on the right things',
                        'url' => '/data-driven-management',
                        'featured' => true
                    ],
                ],
            ],
        ];
    } else {
        $data['megaMenuColumns'] = $acfData;
    }
    $data['actionButtons'] = get_field('actionButtons', 'option') ?: [
        [
            'text' => 'LOG IN',
            'url' => '/login',
            'style' => 'text'
        ],
        [
            'text' => 'TAKE A TOUR',
            'url' => '/tour',
            'style' => 'outline'
        ],
        [
            'text' => 'GET A DEMO',
            'url' => '/demo',
            'style' => 'primary'
        ],
    ];
    $data['labels'] = get_field('labels', 'option') ?: ['ariaLabel' => 'Main Navigation'];

    return $data;
});

Options::addTranslatable('NavigationMain', [
    [
        'label' => __('Action Buttons', 'flynt'),
        'name' => 'buttonsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => __('Navigation Buttons', 'flynt'),
        'name' => 'actionButtons',
        'type' => 'repeater',
        'sub_fields' => [
            [
                'label' => __('Button Text', 'flynt'),
                'name' => 'text',
                'type' => 'text',
                'required' => 1,
                'wrapper' => [
                    'width' => '30',
                ],
            ],
            [
                'label' => __('Button URL', 'flynt'),
                'name' => 'url',
                'type' => 'url',
                'required' => 1,
                'wrapper' => [
                    'width' => '40',
                ],
            ],
            [
                'label' => __('Button Style', 'flynt'),
                'name' => 'style',
                'type' => 'select',
                'choices' => [
                    'text' => __('Text Link', 'flynt'),
                    'outline' => __('Outline Button', 'flynt'),
                    'primary' => __('Primary Button', 'flynt'),
                ],
                'default_value' => 'text',
                'wrapper' => [
                    'width' => '30',
                ],
            ],
        ],
        'min' => 0,
        'max' => 5,
        'layout' => 'table',
        'button_label' => __('Add Button', 'flynt'),
        'default_value' => [
            [
                'text' => 'LOG IN',
                'url' => '/login',
                'style' => 'text'
            ],
            [
                'text' => 'TAKE A TOUR',
                'url' => '/tour',
                'style' => 'outline'
            ],
            [
                'text' => 'GET A DEMO',
                'url' => '/demo',
                'style' => 'primary'
            ],
        ],
    ],
    [
        'label' => __('Mega Menu', 'flynt'),
        'name' => 'megaMenuTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => __('Mega Menu Columns', 'flynt'),
        'name' => 'megaMenuColumns',
        'type' => 'repeater',
        'sub_fields' => [
            [
                'label' => __('Column Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 1,
                'wrapper' => [
                    'width' => '25',
                ],
            ],
            [
                'label' => __('Trigger Menu Item', 'flynt'),
                'name' => 'triggerMenuItem',
                'type' => 'text',
                'instructions' => __('Enter the exact menu item text that should trigger this mega menu (e.g., "Product", "Solutions")', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '25',
                ],
            ],
            [
                'label' => __('Column Color', 'flynt'),
                'name' => 'columnColor',
                'type' => 'color_picker',
                'default_value' => '#F8F9FA',
                'wrapper' => [
                    'width' => '25',
                ],
            ],
            [
                'label' => __('Text Color', 'flynt'),
                'name' => 'textColor',
                'type' => 'color_picker',
                'default_value' => '#333333',
                'wrapper' => [
                    'width' => '25',
                ],
            ],
            [
                'label' => __('Menu Items', 'flynt'),
                'name' => 'items',
                'type' => 'repeater',
                'sub_fields' => [
                    [
                        'label' => __('Icon', 'flynt'),
                        'name' => 'icon',
                        'type' => 'text',
                        'instructions' => __('Enter icon ID (e.g., "person-person", "misc-misc-gear")', 'flynt'),
                        'wrapper' => [
                            'width' => '20',
                        ],
                    ],
                    [
                        'label' => __('Title', 'flynt'),
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => [
                            'width' => '30',
                        ],
                    ],
                    [
                        'label' => __('Description', 'flynt'),
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 2,
                        'wrapper' => [
                            'width' => '30',
                        ],
                    ],
                    [
                        'label' => __('URL', 'flynt'),
                        'name' => 'url',
                        'type' => 'url',
                        'required' => 1,
                        'wrapper' => [
                            'width' => '15',
                        ],
                    ],
                    [
                        'label' => __('Featured', 'flynt'),
                        'name' => 'featured',
                        'type' => 'true_false',
                        'instructions' => __('Highlight this item with a special background', 'flynt'),
                        'default_value' => 0,
                        'wrapper' => [
                            'width' => '15',
                        ],
                    ],
                ],
                'min' => 1,
                'max' => 10,
                'layout' => 'table',
                'button_label' => __('Add Menu Item', 'flynt'),
            ],
        ],
        'min' => 0,
        'max' => 6,
        'layout' => 'row',
        'button_label' => __('Add Mega Menu Column', 'flynt'),
        'default_value' => [
            // Solutions Mega Menu - Column 1: UNCLUNK YOUR FIRM
            [
                'title' => 'UNCLUNK YOUR FIRM',
                'triggerMenuItem' => 'Solutions',
                'columnColor' => '#F8F9FA',
                'textColor' => '#333333',
                'items' => [
                    [
                        'icon' => 'person-person',
                        'title' => 'Why Canopy?',
                        'description' => 'All-in-one Practice Management for the firm you\'ve always wanted.',
                        'url' => '/why-canopy'
                    ],
                ],
            ],
            // Solutions Mega Menu - Column 2: SOLUTIONS
            [
                'title' => 'SOLUTIONS',
                'triggerMenuItem' => 'Solutions',
                'columnColor' => '#F8F9FA',
                'textColor' => '#333333',
                'items' => [
                    [
                        'icon' => 'person-person-key',
                        'title' => 'Private Equity-Backed Firms',
                        'description' => 'Make the most of your client relationships',
                        'url' => '/private-equity-firms'
                    ],
                    [
                        'icon' => 'misc-misc-gear',
                        'title' => 'Future-Focused Firms',
                        'description' => 'Canopy Workflow helps you focus your time on the right things',
                        'url' => '/future-focused-firms'
                    ],
                    [
                        'icon' => 'misc-misc-chart',
                        'title' => 'Practice Optimization',
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                        'url' => '/practice-optimization'
                    ],
                ],
            ],
            // Solutions Mega Menu - Column 3: FOR EVERY FIRM
            [
                'title' => 'FOR EVERY FIRM',
                'triggerMenuItem' => 'Solutions',
                'columnColor' => '#F8F9FA',
                'textColor' => '#333333',
                'items' => [
                    [
                        'icon' => 'ai-ai-sparkle',
                        'title' => 'AI-Optimized Firms',
                        'description' => 'Canopy Workflow helps you focus your time on the right things',
                        'url' => '/ai-optimized-firms'
                    ],
                    [
                        'icon' => 'misc-misc-database',
                        'title' => 'Data-Driven Firm Management',
                        'description' => 'Canopy Workflow helps you focus your time on the right things',
                        'url' => '/data-driven-management',
                        'featured' => true
                    ],
                    [
                        'icon' => 'communication-communication-chat',
                        'title' => 'Communication & Collaboration',
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                        'url' => '/communication-collaboration'
                    ],
                    [
                        'icon' => 'person-person',
                        'title' => 'Large Firms',
                        'description' => 'Make the most of your client relationships',
                        'url' => '/large-firms'
                    ],
                    [
                        'icon' => 'misc-misc-gear',
                        'title' => 'Mid-Sized Firms',
                        'description' => 'Canopy Workflow helps you focus your time on the right things',
                        'url' => '/mid-sized-firms'
                    ],
                    [
                        'icon' => 'misc-misc-house',
                        'title' => 'Small Firms',
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                        'url' => '/small-firms'
                    ],
                ],
            ],
            // Product Mega Menu - Column 1: CLIENTS (keeping existing)
            [
                'title' => 'CLIENTS',
                'triggerMenuItem' => 'Product',
                'columnColor' => '#F8F9FA',
                'textColor' => '#333333',
                'items' => [
                    [
                        'icon' => 'person-person',
                        'title' => 'Client Engagement',
                        'description' => '',
                        'url' => '/client-engagement'
                    ],
                    [
                        'icon' => 'misc-misc-house',
                        'title' => 'Client Portal',
                        'description' => '',
                        'url' => '/client-portal'
                    ],
                    [
                        'icon' => 'misc-misc-gear',
                        'title' => 'CRM',
                        'description' => '',
                        'url' => '/crm'
                    ],
                ],
            ],
            // Product Mega Menu - Column 2: WORK (keeping existing)
            [
                'title' => 'WORK',
                'triggerMenuItem' => 'Product',
                'columnColor' => '#F8F9FA',
                'textColor' => '#333333',
                'items' => [
                    [
                        'icon' => 'misc-misc-gear',
                        'title' => 'Workflow Automation',
                        'description' => '',
                        'url' => '/workflow-automation'
                    ],
                    [
                        'icon' => 'files-file-document',
                        'title' => 'Document Management',
                        'description' => '',
                        'url' => '/document-management'
                    ],
                ],
            ],
        ],
    ],
    [
        'label' => __('Labels', 'flynt'),
        'name' => 'labelsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => '',
        'name' => 'labels',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('Aria Label', 'flynt'),
                'name' => 'ariaLabel',
                'type' => 'text',
                'default_value' => __('Main Navigation', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
        ],
    ],
]);
