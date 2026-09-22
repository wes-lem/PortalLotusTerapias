<?php
if (!defined('ABSPATH')) {
    exit;
}

function lotus_register_options()
{
    $fields = [
        'lotus_brand_small'       => 'sanitize_text_field',
        'lotus_brand_name'        => 'sanitize_text_field',
        'lotus_tagline'           => 'sanitize_text_field',
        'lotus_footer_blurb'      => 'sanitize_textarea_field',
        'lotus_whatsapp'          => 'sanitize_text_field',
        'lotus_phone_display'     => 'sanitize_text_field',
        'lotus_email'             => 'sanitize_email',
        'lotus_wa_consulta'       => 'sanitize_textarea_field',
        'lotus_wa_caderno'        => 'sanitize_textarea_field',
        'lotus_wa_clube'          => 'sanitize_textarea_field',
        'lotus_wa_mentoria'       => 'sanitize_textarea_field',
        'lotus_wa_sobre'          => 'sanitize_textarea_field',
        'lotus_cta_home_label'    => 'sanitize_text_field',
        'lotus_cta_caderno_label' => 'sanitize_text_field',
        'lotus_cta_clube_label'   => 'sanitize_text_field',
        'lotus_cta_mentoria_label'=> 'sanitize_text_field',
        'lotus_cta_sobre_label'   => 'sanitize_text_field',
        'lotus_logo_id'           => 'absint',
        'lotus_nav_lotus_id'      => 'absint',
    ];

    foreach ($fields as $name => $cb) {
        register_setting('lotus_options', $name, ['sanitize_callback' => $cb]);
    }

    add_settings_section('lotus_main', 'Identidade e contato', '__return_false', 'lotus-options');

    $ui = [
        ['lotus_brand_small', 'Linha pequena da marca', 'text', 'Lótus Terapias'],
        ['lotus_brand_name', 'Nome no menu', 'text', 'Ieda Lima'],
        ['lotus_tagline', 'Linha da terapeuta', 'text', 'Ieda Lima · Psicóloga & terapeuta'],
        ['lotus_footer_blurb', 'Texto do rodapé', 'textarea', 'Ieda Lima · Psicóloga & terapeuta. Cuidado para acolher corpo, mente e emoções.'],
        ['lotus_whatsapp', 'WhatsApp (com DDI, só números)', 'text', '5585987960987'],
        ['lotus_phone_display', 'Telefone visível', 'text', '(+55) 85 98796-0987'],
        ['lotus_email', 'E-mail', 'text', 'portallotusterapias@gmail.com'],
        ['lotus_cta_home_label', 'Botão do menu — Início', 'text', 'Agendar consulta'],
        ['lotus_wa_consulta', 'Texto WhatsApp — consulta', 'textarea', 'Olá! Gostaria de agendar uma consulta no Portal Lótus Terapias.'],
        ['lotus_cta_caderno_label', 'Botão do menu — Caderno', 'text', 'Quero o caderno'],
        ['lotus_wa_caderno', 'Texto WhatsApp — Caderno', 'textarea', 'Olá! Tenho interesse no Caderno terapêutico.'],
        ['lotus_cta_clube_label', 'Botão do menu — Clube', 'text', 'Entrar no clube'],
        ['lotus_wa_clube', 'Texto WhatsApp — Clube', 'textarea', 'Olá! Quero entrar no Clube para mulheres.'],
        ['lotus_cta_mentoria_label', 'Botão do menu — Mentoria', 'text', 'Pedir proposta'],
        ['lotus_wa_mentoria', 'Texto WhatsApp — Mentoria', 'textarea', 'Olá! Quero uma proposta de mentoria para minha empresa.'],
        ['lotus_cta_sobre_label', 'Botão do menu — Sobre', 'text', 'Agendar consulta'],
        ['lotus_wa_sobre', 'Texto WhatsApp — Sobre', 'textarea', 'Olá! Gostaria de conhecer o Portal Lótus Terapias.'],
        ['lotus_logo_id', 'Logo / lótus do menu (ID da mídia)', 'media', ''],
        ['lotus_nav_lotus_id', 'Lótus extra (ID da mídia)', 'media', ''],
    ];

    foreach ($ui as $row) {
        add_settings_field($row[0], $row[1], $row[2] === 'textarea' ? 'lotus_field_textarea' : ($row[2] === 'media' ? 'lotus_field_media' : 'lotus_field_text'), 'lotus-options', 'lotus_main', ['name' => $row[0], 'default' => $row[3]]);
    }
}
add_action('admin_init', 'lotus_register_options');

function lotus_options_menu()
{
    add_menu_page(
        'Portal Lótus',
        'Portal Lótus',
        'edit_pages',
        'lotus-options',
        'lotus_options_page',
        'dashicons-heart',
        3
    );
}
add_action('admin_menu', 'lotus_options_menu');

function lotus_field_text($args)
{
    $name = $args['name'];
    $default = isset($args['default']) ? $args['default'] : '';
    $value = get_option($name, $default);
    printf(
        '<input type="text" class="regular-text" name="%s" value="%s" />',
        esc_attr($name),
        esc_attr($value)
    );
}

function lotus_field_textarea($args)
{
    $name = $args['name'];
    $default = isset($args['default']) ? $args['default'] : '';
    $value = get_option($name, $default);
    printf(
        '<textarea class="large-text" rows="3" name="%s">%s</textarea>',
        esc_attr($name),
        esc_textarea($value)
    );
}

function lotus_field_media($args)
{
    $name = $args['name'];
    $value = (int) get_option($name, 0);
    printf(
        '<input type="number" class="small-text" name="%s" value="%s" min="0" /> <span class="description">Abra Mídia, clique na imagem e copie o ID.</span>',
        esc_attr($name),
        esc_attr($value)
    );
}

function lotus_options_page()
{
    if (!current_user_can('edit_pages')) {
        return;
    }
    echo '<div class="wrap"><h1>Portal Lótus — dados do site</h1>';
    echo '<p>Estes dados aparecem no menu, rodapé e botões de WhatsApp/e-mail. Textos e fotos de cada página ficam em <strong>Páginas</strong>.</p>';
    echo '<form method="post" action="options.php">';
    settings_fields('lotus_options');
    do_settings_sections('lotus-options');
    submit_button('Salvar');
    echo '</form></div>';
}

function lotus_seed_options()
{
    $defaults = [
        'lotus_brand_small'        => 'Lótus Terapias',
        'lotus_brand_name'         => 'Ieda Lima',
        'lotus_tagline'            => 'Ieda Lima · Psicóloga & terapeuta',
        'lotus_footer_blurb'       => 'Ieda Lima · Psicóloga & terapeuta. Cuidado para acolher corpo, mente e emoções.',
        'lotus_whatsapp'           => '5585987960987',
        'lotus_phone_display'      => '(+55) 85 98796-0987',
        'lotus_email'              => 'portallotusterapias@gmail.com',
        'lotus_wa_consulta'        => 'Olá! Gostaria de agendar uma consulta no Portal Lótus Terapias.',
        'lotus_wa_caderno'         => 'Olá! Tenho interesse no Caderno terapêutico.',
        'lotus_wa_clube'           => 'Olá! Quero entrar no Clube para mulheres.',
        'lotus_wa_mentoria'        => 'Olá! Quero uma proposta de mentoria para minha empresa.',
        'lotus_wa_sobre'           => 'Olá! Gostaria de conhecer o Portal Lótus Terapias.',
        'lotus_cta_home_label'     => 'Agendar consulta',
        'lotus_cta_caderno_label'  => 'Quero o caderno',
        'lotus_cta_clube_label'    => 'Entrar no clube',
        'lotus_cta_mentoria_label' => 'Pedir proposta',
        'lotus_cta_sobre_label'    => 'Agendar consulta',
    ];
    foreach ($defaults as $key => $value) {
        if (get_option($key, '') === '') {
            add_option($key, $value);
        }
    }
}
add_action('after_switch_theme', 'lotus_seed_options');
