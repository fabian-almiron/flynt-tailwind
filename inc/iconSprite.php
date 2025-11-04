<?php

/**
 * Icon Sprite Integration for Flynt Theme
 *
 * This file integrates pre-built icon sprites with WordPress and Twig
 */


/**
 * Load icon manifest and sprite data
 */
function get_icon_manifest()
{
    static $manifest = null;

    if ($manifest === null) {
        $manifest_path = get_template_directory() . '/dist/icon-manifest.json';

        if (file_exists($manifest_path)) {
            $content = file_get_contents($manifest_path);
            $manifest = json_decode($content, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $manifest = ['icons' => []];
            }
        } else {
            $manifest = ['icons' => []];
        }
    }

    return $manifest;
}

/**
 * Add icon sprites to footer
 */
add_action('wp_footer', function () {
    $sprite_files = [
        get_template_directory() . '/dist/icons-sprite.svg',
        get_template_directory() . '/dist/large-icons-sprite.svg'
    ];

    foreach ($sprite_files as $sprite_file) {
        if (file_exists($sprite_file)) {
            echo file_get_contents($sprite_file);
        }
    }
}, 1);

/**
 * Add Twig functions for icon usage
 */
add_filter('timber/twig', function ($twig) {
    // Add icon function
    $twig->addFunction(new \Twig\TwigFunction('icon', function ($iconId, $size = 'medium', $attributes = []) {
        // Handle legacy calls where second parameter might be attributes array
        if (is_array($size)) {
            $attributes = $size;
            $size = 'medium';
        }

        // Convert size to attributes
        $sizeAttributes = [];
        switch ($size) {
            case 'small':
                $sizeAttributes = ['width' => '20', 'height' => '20'];
                break;
            case 'large':
                $sizeAttributes = ['width' => '32', 'height' => '32'];
                break;
            case 'medium':
            default:
                $sizeAttributes = ['width' => '24', 'height' => '24'];
                break;
        }

        // Merge size attributes with custom attributes
        $attributes = array_merge($sizeAttributes, $attributes);

        return new \Twig\Markup(get_icon($iconId, $attributes), 'UTF-8');
    }));

    // Add function to get available icons (useful for development)
    $twig->addFunction(new \Twig\TwigFunction('get_available_icons', function ($spriteId = null) {
        return get_available_icons($spriteId);
    }));

    return $twig;
});

/**
 * Get available icons from manifest
 *
 * @param string $spriteId
 * @return array
 */
function get_available_icons($spriteId = null)
{
    $manifest = get_icon_manifest();

    if (!isset($manifest['icons'])) {
        return [];
    }

    if ($spriteId === null) {
        // Return all icons
        return array_keys($manifest['icons']);
    }

    // Filter by sprite type
    $filtered_icons = [];
    foreach ($manifest['icons'] as $iconId => $iconData) {
        if (isset($iconData['sprite']) && $iconData['sprite'] === $spriteId) {
            $filtered_icons[] = $iconId;
        }
    }

    return $filtered_icons;
}

/**
 * PHP helper function for use in templates
 *
 * @param string $iconId
 * @param array $attributes
 * @return string
 */
function get_icon($iconId, $attributes = [])
{
    $manifest = get_icon_manifest();

    // Check if icon exists
    if (empty($manifest['icons']) || !isset($manifest['icons'][$iconId])) {
        return '';
    }

    $iconData = $manifest['icons'][$iconId];

    // Default attributes
    $defaultAttributes = [
        'class' => 'icon',
        'width' => '24',
        'height' => '24',
        'aria-hidden' => 'true'
    ];

    $attributes = array_merge($defaultAttributes, $attributes);

    // Build attributes string
    $attributeString = '';
    foreach ($attributes as $key => $value) {
        $attributeString .= sprintf(' %s="%s"', $key, esc_attr($value));
    }

    return sprintf(
        '<svg%s viewBox="%s"><use href="#%s"></use></svg>',
        $attributeString,
        $iconData['viewBox'],
        $iconId
    );
}

/**
 * Echo icon helper
 *
 * @param string $iconId
 * @param array $attributes
 */
function the_icon($iconId, $attributes = [])
{
    echo get_icon($iconId, $attributes);
}

/**
 * Get icon with specific size classes
 *
 * @param string $iconId
 * @param string $size (small, medium, large, xl)
 * @param array $attributes
 * @return string
 */
function get_icon_sized($iconId, $size = 'medium', $attributes = [])
{
    $sizeClasses = [
        'small' => 'icon--small',
        'medium' => 'icon--medium',
        'large' => 'icon--large',
        'xl' => 'icon--xl'
    ];

    $class = isset($attributes['class']) ? $attributes['class'] : 'icon';
    if (isset($sizeClasses[$size])) {
        $class .= ' ' . $sizeClasses[$size];
    }

    $attributes['class'] = $class;

    return get_icon($iconId, $attributes);
}

/**
 * Echo sized icon helper
 *
 * @param string $iconId
 * @param string $size
 * @param array $attributes
 */
function the_icon_sized($iconId, $size = 'medium', $attributes = [])
{
    echo get_icon_sized($iconId, $size, $attributes);
}
