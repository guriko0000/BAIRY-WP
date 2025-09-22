<?php get_header(); ?>
<section class="p-under-mv">
  <div class="l-inner">
    <div class="p-under-mv__title">
      <p class="ja">最新情報</p>
      <span class="en">Article</span>
    </div>
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>
</section>
<div class="p-news l-section l-section--full">
  <div class="l-inner">
    <div class="l-post">
      <article class="p-news__single l-post__main">
        <div class="p-article-head p-article-head--news">
          <h1 class="p-article-head__title"><?php the_title(); ?></h1>
          <div class="p-article-head__bottom">
            <time datetime="<?php echo get_the_date('Y-m-d') ?>" class="p-article-head__time"><?php echo get_the_date('Y.m.d') ?></time>
            <div class="c-tags c-tags--larg c-tags--blue">
              <?php
              $terms = get_the_terms($post->ID, 'category');
              if (!empty($terms)) {
                foreach ($terms as $term) {
                  echo '<span class="c-tags__item ' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</span>';
                }
              }
              ?>
            </div>
          </div>
          <figure class="p-article-head__thumb">
            <?php the_post_thumbnail('full', array('class' => '')); ?>
          </figure>
        </div>
        <div class="p-post-news">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>

<div class="c-pager p-news__pager">
  <?php
  // 次の記事
  $next_post = get_next_post();
  if ($next_post): ?>
    <div class="c-pager__item c-pager__next">
      <a class="c-pager__link" href="<?php echo get_permalink($next_post->ID); ?>">
        <div class="c-pager__thumbwrap">
          <figure class="c-pager__thumb">
            <?php
            if (has_post_thumbnail($next_post->ID)) {
              echo get_the_post_thumbnail($next_post->ID, 'thumbnail');
            } else {
              echo '<img src="' . get_template_directory_uri() . '/assets/img/common/noimage.png" alt="No Image">';
            }
            ?>
          </figure>
        </div>
        <div class="c-pager__meta">
          <p class="c-pager__label">← 次の記事</p>
          <p class="c-pager__title"><?php echo esc_html(get_the_title($next_post->ID)); ?></p>
        </div>
      </a>
    </div>
  <?php endif; ?>

  <?php
  // 前の記事
  $prev_post = get_previous_post();
  if ($prev_post): ?>
    <div class="c-pager__item c-pager__prev">
      <a class="c-pager__link" href="<?php echo get_permalink($prev_post->ID); ?>">
        <div class="c-pager__meta">
          <p class="c-pager__label">前の記事 →</p>
          <p class="c-pager__title"><?php echo esc_html(get_the_title($prev_post->ID)); ?></p>
        </div>
        <div class="c-pager__thumbwrap">
          <figure class="c-pager__thumb">
            <?php
            if (has_post_thumbnail($prev_post->ID)) {
              echo get_the_post_thumbnail($prev_post->ID, 'thumbnail');
            } else {
              echo '<img src="' . get_template_directory_uri() . '/assets/img/common/noimage.png" alt="No Image">';
            }
            ?>
          </figure>
        </div>
      </a>
    </div>
  <?php endif; ?>
</div>



      </article>
      <?php get_sidebar('post'); ?>
    </div>
  </div>
  <section class="p-news__recommend l-section">
    <div class="l-inner">
      <hgroup class="c-secondary-title">
        <h2 class="c-secondary-title__ja">関連記事</h2>
        <span class="c-secondary-title__en">Recommend</span>
      </hgroup>
      <?php
      $catkwds = array();

      if (has_category()) {
        $cats = get_the_category();
        foreach ($cats as $cat) {
          $catkwds[] = (int) $cat->term_id;
        }
      }

      $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'post__not_in'   => array(get_the_ID()),
      );

      // カテゴリがあるときだけ関連付け
      if (! empty($catkwds)) {
        $args['category__in'] = $catkwds;
      }

      $the_query = new WP_Query($args);
      ?>

      <?php if ($the_query->have_posts()) : ?>
        <ul class="l-grid l-grid--cards p-news__recommend-list">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="c-news">
              <a href="<?php the_permalink(); ?>">

                <?php
                // NEWバッジ（直近2件 & 31日以内）
                $last_post_ids = wp_list_pluck(get_posts(array('posts_per_page' => 2, 'fields' => 'ids')), 0);
                $days   = 31;
                $today  = (int) date_i18n('U');
                $entry  = (int) get_the_time('U');
                $term_d = ($today - $entry) / 86400;

                if ($term_d < $days && in_array(get_the_ID(), $last_post_ids, true)) : ?>
                  <span class="c-news__new-tag">NEW</span>
                <?php endif; ?>

                <figure class="c-news__thumb">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/common/noimage.png')); ?>" alt="">
                  <?php endif; ?>
                </figure>

                <div class="c-news__body">
                  <div class="c-news__meta">
                    <span class="c-news__date"><time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time></span>
                    <div class="c-news__tag-wrap">
                      <?php
                      $terms = get_the_terms(get_the_ID(), 'category');
                      if (! empty($terms) && ! is_wp_error($terms)) {
                        foreach ($terms as $term) {
                          echo '<span class="c-news__tag ' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</span>';
                        }
                      }
                      ?>
                    </div>
                  </div>
                  <h2 class="c-news__title"><?php the_title(); ?></h2>
                  <?php if (get_field('news_extract')) : ?>
                    <p class="c-news__text"><?php echo esc_html(get_field('news_extract')); ?></p>
                  <?php endif; ?>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php else : ?>
        <p class="fadeshow">更新情報はありません</p>
      <?php endif;
      wp_reset_postdata(); ?>

    </div>
  </section>
</div>
<?php get_template_part('parts/parts-info'); ?>
<?php get_footer(); ?>