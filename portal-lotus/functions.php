<?php
/**
 * Portal Lótus — tema WordPress
 */

if (!defined('ABSPATH')) {
    exit;
}

define('LOTUS_VERSION', '1.0.2');
define('LOTUS_DIR', get_template_directory());
define('LOTUS_URI', get_template_directory_uri());

require_once LOTUS_DIR . '/inc/helpers.php';
require_once LOTUS_DIR . '/inc/options.php';
require_once LOTUS_DIR . '/inc/acf-fields.php';
require_once LOTUS_DIR . '/inc/setup-pages.php';

function lotus_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 80,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    register_nav_menus([
        'primary' => 'Menu principal',
    ]);
}
add_action('after_setup_theme', 'lotus_setup');

function lotus_assets()
{
    wp_enqueue_style(
        'lotus-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500&family=Source+Sans+3:ital,wght@0,400;0,500;0,600;1,400&display=swap',
        [],
        null
    );
    wp_enqueue_style('lotus-theme', LOTUS_URI . '/assets/css/styles.css', ['lotus-fonts'], LOTUS_VERSION);
    wp_enqueue_style('lotus-wp', LOTUS_URI . '/assets/css/wp.css', ['lotus-theme'], LOTUS_VERSION);
    wp_enqueue_script('lotus-main', LOTUS_URI . '/assets/js/main.js', [], LOTUS_VERSION, true);
}
add_action('wp_enqueue_scripts', 'lotus_assets');

function lotus_document_title($parts)
{
    if (is_front_page()) {
        $parts['title'] = 'Portal Lótus Terapias';
        $parts['tagline'] = 'Ieda Lima · Psicóloga & terapeuta';
    }
    return $parts;
}
add_filter('document_title_parts', 'lotus_document_title');

function lotus_admin_notice_acf()
{
    if (!current_user_can('install_plugins')) {
        return;
    }
    if (function_exists('acf_add_local_field_group')) {
        return;
    }
    $screen = function_exists('get_current_screen') ? get_current_screen() : null;
    if (!$screen || $screen->base !== 'themes') {
        return;
    }
    echo '<div class="notice notice-warning"><p><strong>Portal Lótus:</strong> instale o plugin gratuito <em>Advanced Custom Fields</em> para a Ieda editar textos e fotos com rótulos em português. Sem o plugin, o site continua no ar com o conteúdo padrão.</p></div>';
}
add_action('admin_notices', 'lotus_admin_notice_acf');
