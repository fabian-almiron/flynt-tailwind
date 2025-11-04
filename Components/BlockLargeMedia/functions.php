<?php

namespace Flynt\Components\BlockLargeMedia;

use Timber\Timber;

add_filter('Flynt/addComponentData?name=BlockLargeMedia', function ($data) {
    // Process Wistia video URL if provided
    if (!empty($data['videoUrl'])) {
        $data['videoId'] = extractWistiaId($data['videoUrl']);
    }

    return $data;
});

function extractWistiaId($url)
{
    // Extract Wistia video ID from various URL formats
    // Format: https://fast.wistia.net/embed/iframe/VIDEO_ID
    // Format: https://ACCOUNT.wistia.com/medias/VIDEO_ID
    
    $patterns = [
        '/wistia\.net\/embed\/iframe\/([a-zA-Z0-9]+)/',
        '/wistia\.com\/medias\/([a-zA-Z0-9]+)/',
        '/wistia\.net\/medias\/([a-zA-Z0-9]+)/',
    ];

    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
    }

    // If no pattern matches, assume the string itself is the video ID
    return $url;
}

function getACFLayout()
{
    return [
        'name' => 'blockLargeMedia',
        'label' => 'Block: Large Media',
        'sub_fields' => [
            [
                'label' => 'General',
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => 'Heading',
                'name' => 'heading',
                'type' => 'text',
                'instructions' => 'Optional heading for the media block.',
            ],
            [
                'label' => 'Content',
                'name' => 'content',
                'type' => 'wysiwyg',
                'instructions' => 'Optional description text for the media block.',
                'media_upload' => 0,
                'toolbar' => 'basic',
            ],
            [
                'label' => 'Media Type',
                'name' => 'mediaType',
                'type' => 'select',
                'required' => 1,
                'choices' => [
                    'image' => 'Image',
                    'video' => 'Video (Wistia)'
                ],
                'default_value' => 'image',
                'instructions' => 'Select the type of media to display.',
            ],
            [
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'required' => 0,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'instructions' => 'Upload a large image (recommended for product screenshots or featured images).',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'mediaType',
                            'operator' => '==',
                            'value' => 'image'
                        ]
                    ]
                ]
            ],
            [
                'label' => 'Mobile Image',
                'name' => 'mobileImage',
                'type' => 'image',
                'required' => 0,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'instructions' => 'Optional mobile-optimized image. If provided, this will replace the desktop image on mobile devices.',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'mediaType',
                            'operator' => '==',
                            'value' => 'image'
                        ]
                    ]
                ]
            ],
            [
                'label' => 'Video URL',
                'name' => 'videoUrl',
                'type' => 'url',
                'required' => 0,
                'instructions' => 'Enter the Wistia video URL or video ID.',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'mediaType',
                            'operator' => '==',
                            'value' => 'video'
                        ]
                    ]
                ]
            ],
            [
                'label' => 'Video Poster Image',
                'name' => 'videoPoster',
                'type' => 'image',
                'required' => 0,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'instructions' => 'Optional poster/thumbnail image for the video. Displays before playback. If not provided, Wistia default thumbnail will be used.',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'mediaType',
                            'operator' => '==',
                            'value' => 'video'
                        ]
                    ]
                ]
            ],
            [
                'label' => 'Fallback Image',
                'name' => 'fallbackImage',
                'type' => 'image',
                'required' => 0,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'instructions' => 'Fallback image to display if video fails to load or for users without JavaScript.',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'mediaType',
                            'operator' => '==',
                            'value' => 'video'
                        ]
                    ]
                ]
            ],
            [
                'label' => 'Mobile Video Behavior',
                'name' => 'mobileVideoBehavior',
                'type' => 'select',
                'choices' => [
                    'video' => 'Show Video',
                    'poster' => 'Show Poster Image Only',
                    'fallback' => 'Show Fallback Image'
                ],
                'default_value' => 'video',
                'instructions' => 'Choose how the video displays on mobile devices.',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'mediaType',
                            'operator' => '==',
                            'value' => 'video'
                        ]
                    ]
                ]
            ],
            [
                'label' => 'Options',
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => 'Background Color',
                'name' => 'backgroundColor',
                'type' => 'select',
                'choices' => [
                    'white' => 'White',
                    'gray-light' => 'Light Gray',
                    'gray' => 'Gray',
                    'primary' => 'Primary Color',
                ],
                'default_value' => 'white',
            ],
            [
                'label' => 'Content Width',
                'name' => 'contentWidth',
                'type' => 'select',
                'choices' => [
                    'default' => 'Default',
                    'wide' => 'Wide',
                    'full' => 'Full Width',
                ],
                'default_value' => 'default',
            ],
        ]
    ];
}

