<?php

namespace Flynt\Components\BlockFaqAccordion;

use Flynt\FieldVariables;

function getACFLayout(): array
{
    return [
        'name' => 'blockFaqAccordion',
        'label' => __('Block: FAQ Accordion', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'Frequently Asked Questions',
            ],
            [
                'label' => __('Subtitle', 'flynt'),
                'name' => 'subtitle',
                'type' => 'textarea',
                'rows' => 2,
                'instructions' => __('Optional subtitle text (e.g., "Can\'t find the answer you are looking for? Reach out to our support team.")', 'flynt'),
            ],
            [
                'label' => __('Support Link', 'flynt'),
                'name' => 'supportLink',
                'type' => 'link',
                'instructions' => __('Optional link in the subtitle (e.g., link to support team)', 'flynt'),
                'return_format' => 'array',
            ],
            [
                'label' => __('FAQ Items', 'flynt'),
                'name' => 'faqItems',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'block',
                'button_label' => __('Add FAQ Item', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Question', 'flynt'),
                        'name' => 'question',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'label' => __('Answer', 'flynt'),
                        'name' => 'answer',
                        'type' => 'wysiwyg',
                        'required' => 1,
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                    ],
                    [
                        'label' => __('Open by Default', 'flynt'),
                        'name' => 'openByDefault',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1,
                    ]
                ]
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
                    FieldVariables\getTheme()
                ]
            ]
        ]
    ];
}

