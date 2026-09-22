<?php
if (!defined('ABSPATH')) {
    exit;
}

function lotus_setup_pages()
{
    $pages = [
        [
            'title'    => 'Início',
            'slug'     => 'inicio',
            'template' => '',
        ],
        [
            'title'    => 'Caderno Terapêutico',
            'slug'     => 'caderno',
            'template' => 'page-templates/caderno.php',
        ],
        [
            'title'    => 'Clube de Autocuidado',
            'slug'     => 'clube',
            'template' => 'page-templates/clube.php',
        ],
        [
            'title'    => 'Mentoria Individual',
            'slug'     => 'mentoria',
            'template' => 'page-templates/mentoria.php',
        ],
        [
            'title'    => 'Sobre',
            'slug'     => 'sobre',
            'template' => 'page-templates/sobre.php',
        ],
    ];

    $created = [];

    foreach ($pages as $item) {
        $existing = get_page_by_path($item['slug']);
        if ($existing) {
            $created[$item['slug']] = (int) $existing->ID;
            if ($item['template'] !== '') {
                update_post_meta($existing->ID, '_wp_page_template', $item['template']);
            }
            continue;
        }

        $id = wp_insert_post([
            'post_title'   => $item['title'],
            'post_name'    => $item['slug'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ]);

        if (is_wp_error($id) || !$id) {
            continue;
        }

        if ($item['template'] !== '') {
            update_post_meta($id, '_wp_page_template', $item['template']);
        }

        $created[$item['slug']] = (int) $id;
    }

    if (!empty($created['inicio'])) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $created['inicio']);
    }

    $menu_name = 'Menu principal';
    $menu = wp_get_nav_menu_object($menu_name);
    if (!$menu) {
        $menu_id = wp_create_nav_menu($menu_name);
    } else {
        $menu_id = (int) $menu->term_id;
    }

    if ($menu_id && !is_wp_error($menu_id)) {
        $existing_items = wp_get_nav_menu_items($menu_id);
        if (empty($existing_items)) {
            $order = 1;
            $map = [
                'inicio'   => 'Início',
                'caderno'  => 'Caderno',
                'clube'    => 'Clube',
                'mentoria' => 'Mentoria',
                'sobre'    => 'Sobre',
            ];
            foreach ($map as $slug => $label) {
                if (empty($created[$slug])) {
                    continue;
                }
                wp_update_nav_menu_item($menu_id, 0, [
                    'menu-item-title'     => $label,
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $created[$slug],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                    'menu-item-position'  => $order,
                ]);
                $order++;
            }
        }

        $locations = get_theme_mod('nav_menu_locations');
        if (!is_array($locations)) {
            $locations = [];
        }
        $locations['primary'] = (int) $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }

    flush_rewrite_rules();
}
add_action('after_switch_theme', 'lotus_setup_pages');
