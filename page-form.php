<?php get_header(); ?>
<section class="p-under-mv">
  <div class="l-inner">
    <hgroup class="p-under-mv__title">
      <h1 class="ja">採用情報</h1>
      <span class="en">Recruit</span>
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
    <div class="c-choice">
      <div class="c-choice__head">
        <h2 class="c-choice__main-title">選択中の求人</h2>
        <?php
        $post_id = filter_input(INPUT_GET, 'post_id', FILTER_VALIDATE_INT);

        if ($post_id) :
          // タイトル
          $post_title = get_the_title($post_id);
        ?>
          <p class="c-choice__title"> <?php echo esc_html($post_title); ?></p>

          <?php
          // 概要（ACF: recruit_extract）
          $summary = get_field('recruit_extract', $post_id);
          if (!empty($summary)) :
          ?>
            <p class="c-choice__text"><?php echo esc_html($summary); ?></p>
          <?php endif; ?>
      </div>

      <div class="c-choice__bottom">
        <ul class="c-choice__tag-list">
          <?php
          $taxonomies = [
            'jobs-type'   => '業種',
            'jobs-salary' => '給与',
            'jobs-area'   => '勤務地',
          ];

          foreach ($taxonomies as $tx => $label) {
            $terms = get_the_terms($post_id, $tx);
            if (is_wp_error($terms) || empty($terms)) {
              continue;
            }
            foreach ($terms as $term) {
              echo '<li class="c-choice__tag-item">';
              echo '<span class="c-choice__tag">' . esc_html($label) . '</span>';
              echo '<span class="c-choice__tag-text">' . esc_html($term->name) . '</span>';
              echo '</li>';
            }
          }
          ?>
        </ul>
      </div>
    <?php endif; ?>
    </div>

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