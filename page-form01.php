<?php get_header(); ?>
<section class="p-under-mv">
  <div class="l-inner">
    <hgroup class="p-under-mv__title">
      <h1 class="ja">お問い合わせ</h1>
      <span class="en">Contact</span>
    </hgroup>
    <div class="p-under-mv__breadcrumb">
      <div class="c-breadcrumb">
        <span property="itemListElement" typeof="ListItem">
          <a property="item" typeof="WebPage" title="Go to tokyo-clinic." href="" class="home"><span property="name">ホーム</span></a>
          <meta property="position" content="1">
        </span>
        <span class="c-breadcrumb__icon"></span>
        <span property="itemListElement" typeof="ListItem">
          <span property="name" class="post post-page current-item">採用情報</span>
          <meta property="url" content="">
          <meta property="position" content="2">
        </span>
      </div>
    </div>
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