<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?php echo esc_url(lotus_nav_lotus()); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php $cta = lotus_header_cta(); ?>
  <header class="site-header">
    <div class="container header-inner">
      <a class="brand" href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo esc_url(lotus_nav_lotus()); ?>" alt="<?php echo esc_attr(lotus_option('brand_small', 'Lótus Terapias')); ?>">
        <span><small><?php echo esc_html(lotus_option('brand_small', 'Lótus Terapias')); ?></small><?php echo esc_html(lotus_option('brand_name', 'Ieda Lima')); ?></span>
      </a>
      <button class="nav-toggle" aria-label="Abrir menu" aria-expanded="false" type="button">
        <span></span><span></span><span></span>
      </button>
      <nav class="site-nav" id="site-nav" aria-label="Principal">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'site-nav-list',
            'fallback_cb'    => 'lotus_fallback_menu',
        ]);
        ?>
        <a class="btn btn-primary btn-sm" href="<?php echo esc_url(lotus_wa_url($cta['text'])); ?>" target="_blank" rel="noopener"><?php echo esc_html($cta['label']); ?></a>
      </nav>
    </div>
  </header>
