<?php get_header(); ?>
<section class="p-under-mv">
  <div class="l-inner">
    <div class="p-under-mv__title">
      <p class="ja">採用情報</p>
      <span class="en">Recruit</span>
    </div>
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>
</section>

<div class="p-recruit">
  <div class="l-section l-section--full">
    <div class="l-inner">
      <div class="l-post">
        <article class="p-recruit__single l-post__main">
          <div class="p-article-head">
            <h1 class="p-article-head__title"><?php the_title(); ?></h1>
            <div class="p-article-head__bottom">
              <?php
              $tax_list = ['jobs-type', 'jobs-salary', 'jobs-area'];

              $items = [];

              foreach ($tax_list as $tx) {
                $terms = get_the_terms(get_the_ID(), $tx);

                if (!is_wp_error($terms) && !empty($terms)) {
                  $names = array_map(function ($t) {
                    return $t->name;
                  }, $terms);

                  $items[] = esc_html(implode('、', $names));
                } else {
                  $items[] = null;
                }
              }
              // 1つ以上中身がある場合のみ出力
              if (array_filter($items)) : ?>
                <div class="c-tags c-tags--larg">
                  <?php foreach ($items as $text) :
                    if ($text === null) continue; ?>
                    <span class="c-tags__item"><?php echo $text; ?></span>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

            </div>
          </div>
          <div class="p-post-recruit">
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>

          <div class="p-recruit__single-btn">
            <a href="<?php echo home_url('/recruit/form?post_id=' . get_the_ID()); ?>" class="c-btn">この求人に応募する<span class="c-btn__icon"></span></a>
          </div>
        </article>
        <?php get_sidebar('recruit'); ?>
      </div>
    </div>
  </div>
  <?php
  $posts = get_field('recommend_recruit');
  if ($posts && is_array($posts) && count($posts) > 0) :
  ?>
    <section class="p-recruit-recommend">
      <div class="l-inner">
        <hgroup class="c-secondary-title">
          <h2 class="c-secondary-title__ja">あなたへのおすすめ</h2>
          <span class="c-secondary-title__en">Recommend</span>
        </hgroup>

        <ul class="l-grid l-grid--col2">
          <?php
          if ($posts && is_array($posts)) :
            foreach ($posts as $post_id) :
              // ★公開記事のみ表示
              if (get_post_status($post_id) !== 'publish') {
                continue;
              }

              $post = get_post($post_id);
              if ($post) :
                setup_postdata($post);
                $permalink = get_permalink($post_id);
                $title     = get_the_title($post_id);
          ?>
                <li class="c-recruit">
                  <a href="<?php echo esc_url($permalink); ?>">
                    <h3 class="c-recruit__title"><?php echo esc_html($title); ?></h3>
                    <div class="c-recruit__body">
                      <p class="c-recruit__text">
                        <?php
                        $extract = get_field('recruit_extract', $post_id);
                        if ($extract) {
                          echo esc_html($extract);
                        }
                        ?>
                      </p>

                      <?php
                      $tax_list = ['jobs-type', 'jobs-salary', 'jobs-area'];
                      $items = [];

                      foreach ($tax_list as $tx) {
                        $terms = get_the_terms($post_id, $tx); // ← $post_id を明示
                        if (! is_wp_error($terms) && ! empty($terms)) {
                          $names = array_map(function ($t) {
                            return $t->name;
                          }, $terms);
                          $items[] = esc_html(implode('、', $names));
                        }
                      }

                      if (array_filter($items)) : ?>
                        <div class="c-recruit__tag-wrap">
                          <?php foreach ($items as $text) :
                            if ($text === null) continue; ?>
                            <span class="c-recruit__tag"><?php echo $text; ?></span>
                          <?php endforeach; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </a>
                </li>
          <?php
              endif; // $post
            endforeach;
            wp_reset_postdata(); // ← ループ後に一度だけ
          endif;
          ?>
        </ul>

      </div>
    </section>
  <?php endif; ?>

</div>

<?php get_template_part('parts/parts-info'); ?>
<?php get_footer(); ?>