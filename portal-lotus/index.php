<?php
get_header();
?>
<main>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section class="section section-ivory">
      <div class="container">
        <div class="section-head">
          <h1><?php the_title(); ?></h1>
          <div class="gold-line"></div>
        </div>
        <?php the_content(); ?>
      </div>
    </section>
  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
