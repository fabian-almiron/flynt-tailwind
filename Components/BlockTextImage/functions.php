<?php

namespace Flynt\Components\BlockTextImage;

use Flynt\FieldVariables;

function getACFLayout(): array
{
    return [
        'name' => 'blockTextImage',
        'label' => __('Block: Text & Image', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Layout', 'flynt'),
                'name' => 'layout',
                'type' => 'button_group',
                'default_value' => 'imageRight',
                'choices' => [
                    'imageLeft' => sprintf('<i class=\'dashicons dashicons-align-left\' title=\'%1$s\'></i>', __('Image Left', 'flynt')),
                    'imageRight' => sprintf('<i class=\'dashicons dashicons-align-right\' title=\'%1$s\'></i>', __('Image Right', 'flynt'))
                ]
            ],
            [
                'label' => __('Pre-title', 'flynt'),
                'name' => 'preTitle',
                'type' => 'text',
                'instructions' => __('Small text above the main title (optional)', 'flynt'),
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'delay' => 0,
                'media_upload' => 0,
                'required' => 1,
                'toolbar' => 'basic',
            ],
            [
                'label' => __('Bullet List', 'flynt'),
                'name' => 'bulletList',
                'type' => 'repeater',
                'instructions' => __('Optional bullet list with icons', 'flynt'),
                'layout' => 'table',
                'button_label' => __('Add Item', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Text', 'flynt'),
                        'name' => 'text',
                        'type' => 'text',
                        'required' => 1,
                    ]
                ]
            ],
            [
                'label' => __('Button', 'flynt'),
                'name' => 'button',
                'type' => 'link',
                'instructions' => __('Optional button (leave empty to hide)', 'flynt'),
                'return_format' => 'array',
            ],
            [
                'label' => __('Image', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG, WebP.', 'flynt'),
                'name' => 'image',
                'type' => 'image',
                'preview_size' => 'medium',
                'required' => 1,
                'mime_types' => 'jpg,jpeg,png,svg,webp',
            ],
            [
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    [
                        'label' => __('Background Color', 'flynt'),
                        'name' => 'backgroundColor',
                        'type' => 'color_picker',
                        'default_value' => '#ffffff',
                    ],
                    [
                        'label' => __('Text Color', 'flynt'),
                        'name' => 'textColor',
                        'type' => 'color_picker',
                        'default_value' => '#222225',
                    ],
                    FieldVariables\getTheme()
                ]
            ]
        ]
    ];
}

