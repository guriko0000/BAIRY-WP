<?php get_header(); ?>
<section class="p-under-mv">
  <div class="l-inner">
    <hgroup class="p-under-mv__title">
      <h1 class="ja">採用応募フォーム</h1>
      <span class="en">Recruit</span>
    </hgroup>
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>
</section>

<section class="p-form l-section l-section--full">
  <div class="l-inner">
    <?php
    $post_id = filter_input(INPUT_GET, 'post_id', FILTER_VALIDATE_INT);

    // 投稿が存在して公開状態のときだけ表示
    if ($post_id && get_post_status($post_id)) :
      $post_title = get_the_title($post_id);
      $summary    = get_field('recruit_extract', $post_id);
      $taxonomies = [
        'jobs-type'   => '業種',
        'jobs-salary' => '給与',
        'jobs-area'   => '勤務地',
      ];
    ?>
      <div class="c-choice">
        <div class="c-choice__head">
          <h2 class="c-choice__main-title">選択中の求人</h2>
          <?php if ($post_title) : ?>
            <p class="c-choice__title"><?php echo esc_html($post_title); ?></p>
          <?php endif; ?>

          <?php if (!empty($summary)) : ?>
            <p class="c-choice__text"><?php echo esc_html($summary); ?></p>
          <?php endif; ?>
        </div>

        <div class="c-choice__bottom">
          <ul class="c-choice__tag-list">
            <?php foreach ($taxonomies as $tx => $label) :
              $terms = get_the_terms($post_id, $tx);
              if (is_wp_error($terms) || empty($terms)) {
                continue;
              }
              foreach ($terms as $term) : ?>
                <li class="c-choice__tag-item">
                  <span class="c-choice__tag"><?php echo esc_html($label); ?></span>
                  <span class="c-choice__tag-text"><?php echo esc_html($term->name); ?></span>
                </li>
            <?php endforeach;
            endforeach; ?>
          </ul>
        </div>
      </div>
    <?php endif;
    ?>


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