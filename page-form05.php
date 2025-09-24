<?php get_header(); ?>
<section class="p-under-mv">
  <div class="l-inner">
    <hgroup class="p-under-mv__title">
      <h1 class="ja">お問い合わせ</h1>
      <span class="en">Contact</span>
    </hgroup>
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>
</section>

<section class="p-form l-section l-section--full">
  <div class="l-inner">
    <div class="c-form">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </div>
</section>

<?php get_template_part('parts/parts-info'); ?>
<?php get_footer(); ?>