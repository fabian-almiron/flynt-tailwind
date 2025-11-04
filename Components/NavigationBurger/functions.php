<?php

namespace Flynt\Components\NavigationBurger;

use Flynt\Utils\Asset;
use Flynt\Utils\Options;
use Timber\Timber;

add_action('init', function (): void {
    register_nav_menus([
        'navigation_burger' => __('Navigation Burger', 'flynt')
    ]);
});

add_filter('Flynt/addComponentData?name=NavigationBurger', function (array $data): array {
    $data['menu'] = Timber::get_menu('navigation_burger') ?? Timber::get_pages_menu();
    $data['logo'] = [
        'src' => get_theme_mod('custom_logo') ? wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') : Asset::requireUrl('assets/images/logo.svg'),
        'alt' => get_bloginfo('name')
    ];

    return $data;
});

Options::addTranslatable('NavigationBurger', [
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
            [
                'label' => __('Toggle Menu', 'flynt'),
                'name' => 'toggleMenu',
                'type' => 'text',
                'default_value' => __('Toggle Menu', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
        ],
    ],
]);
