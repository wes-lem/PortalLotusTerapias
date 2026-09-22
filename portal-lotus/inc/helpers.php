<?php
if (!defined('ABSPATH')) {
    exit;
}

function lotus_option($name, $default = '')
{
    $value = get_option('lotus_' . $name, $default);
    if ($value === false || $value === '') {
        return $default;
    }
    return $value;
}

function lotus_field($name, $default = '', $post_id = null)
{
    if ($post_id === null) {
        $post_id = get_queried_object_id();
        if (!$post_id) {
            $post_id = get_the_ID();
        }
    }

    if (function_exists('get_field')) {
        $value = get_field($name, $post_id);
        if ($value !== null && $value !== false && $value !== '') {
            return $value;
        }
    }

    $meta = get_post_meta($post_id, $name, true);
    if ($meta !== '' && $meta !== false) {
        return $meta;
    }

    return $default;
}

function lotus_bool($name, $default = true, $post_id = null)
{
    if ($post_id === null) {
        $post_id = get_queried_object_id();
        if (!$post_id) {
            $post_id = get_the_ID();
        }
    }

    if ($post_id && metadata_exists('post', $post_id, $name)) {
        $meta = get_post_meta($post_id, $name, true);
        if (is_bool($meta)) {
            return $meta;
        }
        return in_array(strtolower((string) $meta), ['1', 'true', 'sim', 'yes'], true);
    }

    return (bool) $default;
}

function lotus_img_url($field, $fallback_file, $post_id = null)
{
    $value = lotus_field($field, '', $post_id);

    if (is_array($value) && !empty($value['url'])) {
        return $value['url'];
    }
    if (is_numeric($value)) {
        $url = wp_get_attachment_image_url((int) $value, 'full');
        if ($url) {
            return $url;
        }
    }
    if (is_string($value) && $value !== '' && (strpos($value, 'http://') === 0 || strpos($value, 'https://') === 0)) {
        return $value;
    }

    return LOTUS_URI . '/assets/img/' . ltrim($fallback_file, '/');
}

function lotus_brand_logo()
{
    $custom = lotus_option('logo_id');
    if ($custom) {
        $url = wp_get_attachment_image_url((int) $custom, 'full');
        if ($url) {
            return $url;
        }
    }
    if (function_exists('has_custom_logo') && has_custom_logo()) {
        $id = get_theme_mod('custom_logo');
        $url = wp_get_attachment_image_url((int) $id, 'full');
        if ($url) {
            return $url;
        }
    }
    return LOTUS_URI . '/assets/img/logo.png';
}

function lotus_nav_lotus()
{
    $id = lotus_option('nav_lotus_id');
    if ($id) {
        $url = wp_get_attachment_image_url((int) $id, 'full');
        if ($url) {
            return $url;
        }
    }
    return LOTUS_URI . '/assets/img/lotus-icon.png';
}

function lotus_wa_number()
{
    return preg_replace('/\D+/', '', lotus_option('whatsapp', '5585987960987'));
}

function lotus_wa_url($text = '')
{
    $url = 'https://wa.me/' . lotus_wa_number();
    if ($text !== '') {
        $url .= '?text=' . rawurlencode($text);
    }
    return $url;
}

function lotus_mail_url()
{
    $email = lotus_option('email', 'portallotusterapias@gmail.com');
    return 'https://mail.google.com/mail/?view=cm&fs=1&to=' . rawurlencode($email);
}

function lotus_txt($field, $default = '', $post_id = null)
{
    return wp_kses_post(lotus_field($field, $default, $post_id));
}

function lotus_plain($field, $default = '', $post_id = null)
{
    return esc_html(lotus_field($field, $default, $post_id));
}

function lotus_page_url($slug)
{
    $page = get_page_by_path($slug);
    if ($page) {
        return get_permalink($page);
    }
    return home_url('/' . $slug . '/');
}

function lotus_fallback_menu()
{
    $items = [
        ['inicio', 'Início', is_front_page()],
        ['caderno', 'Caderno', is_page('caderno')],
        ['clube', 'Clube', is_page('clube')],
        ['mentoria', 'Mentoria', is_page('mentoria')],
        ['sobre', 'Sobre', is_page('sobre')],
    ];
    echo '<ul class="site-nav-list">';
    foreach ($items as $item) {
        $url = $item[0] === 'inicio' ? home_url('/') : lotus_page_url($item[0]);
        $class = $item[2] ? ' class="menu-item current-menu-item"' : ' class="menu-item"';
        $active = $item[2] ? ' class="is-active"' : '';
        printf(
            '<li%s><a href="%s"%s>%s</a></li>',
            $class,
            esc_url($url),
            $active,
            esc_html($item[1])
        );
    }
    echo '</ul>';
}

function lotus_paras($field, $default = '', $post_id = null)
{
    echo wpautop(wp_kses_post(lotus_field($field, $default, $post_id)));
}

function lotus_list($field, $defaults, $class = 'check-list', $tag = 'ul', $post_id = null)
{
    $raw = lotus_field($field, implode("\n", $defaults), $post_id);
    $lines = preg_split('/\r\n|\r|\n/', (string) $raw);
    echo '<' . $tag . ' class="' . esc_attr($class) . '">';
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '') {
            continue;
        }
        echo '<li>' . wp_kses_post($line) . '</li>';
    }
    echo '</' . $tag . '>';
}

function lotus_header_cta()
{
    if (is_page('caderno')) {
        return [
            'label' => lotus_option('cta_caderno_label', 'Quero o caderno'),
            'text'  => lotus_option('wa_caderno', 'Olá! Tenho interesse no Caderno terapêutico.'),
        ];
    }
    if (is_page('clube')) {
        return [
            'label' => lotus_option('cta_clube_label', 'Entrar no clube'),
            'text'  => lotus_option('wa_clube', 'Olá! Quero entrar no Clube para mulheres.'),
        ];
    }
    if (is_page('mentoria')) {
        return [
            'label' => lotus_option('cta_mentoria_label', 'Pedir proposta'),
            'text'  => lotus_option('wa_mentoria', 'Olá! Quero uma proposta de mentoria para minha empresa.'),
        ];
    }
    if (is_page('sobre')) {
        return [
            'label' => lotus_option('cta_sobre_label', 'Agendar consulta'),
            'text'  => lotus_option('wa_sobre', 'Olá! Gostaria de conhecer o Portal Lótus Terapias.'),
        ];
    }
    return [
        'label' => lotus_option('cta_home_label', 'Agendar consulta'),
        'text'  => lotus_option('wa_consulta', 'Olá! Gostaria de agendar uma consulta no Portal Lótus Terapias.'),
    ];
}

function lotus_phone_display()
{
    return lotus_option('phone_display', '(+55) 85 98796-0987');
}
