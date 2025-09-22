<?php get_header(); ?>
<section class="p-under-mv">
  <div class="l-inner">
    <hgroup class="p-under-mv__title">
      <h1 class="ja">採用情報</h1>
      <span class="en">Recruit</span>
    </hgroup>
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>
</section>

<div class="p-recruit">
  <div class="l-section l-section--full">
    <div class="l-inner">
      <div class="l-post">
        <section class="p-recruit__archive l-post__main">
          <?php if (have_posts()) : ?>
            <ul class="p-recruit__archive-list">
              <?php while (have_posts()) : the_post(); ?>
                <li class="c-recruit">
                  <a href="<?php the_permalink() ?>">
                    <h2 class="c-recruit__title"><?php the_title(); ?></h2>
                    <div class="c-recruit__body">
                      <?php if (get_field('recruit_extract')) { ?>
                        <p class="c-recruit__text"><?php echo get_field('recruit_extract'); ?></p>
                      <?php } ?>

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
                        <div class="c-recruit__tag-wrap">
                          <?php foreach ($items as $text) :
                            if ($text === null) continue; ?>
                            <span class="c-recruit__tag"><?php echo $text; ?></span>
                          <?php endforeach; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </a>
                <?php endwhile; ?>
            </ul>
          <?php else : ?>
            <p class="fadeshow">更新情報はありません</p>
          <?php endif; ?>

          <?php
          global $wp_query;
          $pagination_links = paginate_links(array(
            'mid_size'      => 4,
            'format'        => 'page/%#%',
            'current'       => max(1, get_query_var('paged')),
            'total'         => $wp_query->max_num_pages,
            'prev_text'     => '',
            'next_text'     => '',
            'type'          => 'list'
          ));

          if ($pagination_links) : ?>
            <div class="p-recruit__pagination">
              <nav class="c-pagination">
                <?php echo $pagination_links; ?>
              </nav>
            </div>
          <?php endif; ?>
        </section>

        <?php get_sidebar('recruit'); ?>

      </div>
    </div>
  </div>
</div>

<?php get_template_part('parts/parts-info'); ?>
<?php get_footer(); ?>