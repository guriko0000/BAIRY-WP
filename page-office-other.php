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

            <?php
    // 固定ページでのページネーション対策（paged / page 両対応）
    $paged = get_query_var('paged') ?: ( get_query_var('page') ?: 1 );

    $args = array(
      'post_type'      => 'jobs',
      'posts_per_page' => 2,
      'paged'          => $paged,
      'tax_query'      => array(
        array(
          'taxonomy' => 'jobs-type',
          'field'    => 'slug',
          'terms'    => array('office', 'other'),
          'operator' => 'IN',
        ),
      ),
    );
    $jobs = new WP_Query($args);
    ?>

          <?php if ( $jobs->have_posts() ) : ?>
            <ul class="p-recruit__archive-list">
              <?php while ( $jobs->have_posts() ) : $jobs->the_post(); ?>
                <li class="c-recruit">
                  <a href="<?php the_permalink() ?>">
                    <h2 class="c-recruit__title"><?php the_title(); ?></h2>
                    <div class="c-recruit__body">
                      <?php if (get_field('recruit_extract')) { ?>
                        <p class="c-recruit__text"><?php echo get_field('recruit_extract'); ?></p>
                      <?php } ?>
                      <div class="c-recruit__tag-wrap">
                        <?php
                        $terms = get_the_terms($post->ID, 'jobs-type');
                        if (!empty($terms)) {
                          foreach ($terms as $term) {
                            echo '<span class="c-recruit__tag ' .  $term->slug . '">' . $term->name . '</span>';
                          }
                        }
                        ?>

                        <?php
                        $terms = get_the_terms($post->ID, 'jobs-salary');
                        if (!empty($terms)) {
                          foreach ($terms as $term) {
                            echo '<span class="c-recruit__tag ' .  $term->slug . '">' . $term->name . '</span>';
                          }
                        }
                        ?>

                        <?php
                        $terms = get_the_terms($post->ID, 'jobs-area');
                        if (!empty($terms)) {
                          foreach ($terms as $term) {
                            echo '<span class="c-recruit__tag ' .  $term->slug . '">' . $term->name . '</span>';
                          }
                        }
                        ?>

                      </div>
                    </div>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php else : ?>
            <p class="fadeshow">更新情報はありません</p>
          <?php endif;
          wp_reset_postdata(); ?>

          <?php
          $pagination_links = paginate_links(array(
            'mid_size'      => 4,
            'format'        => 'page/%#%',
            'current'       => max(1, get_query_var('paged')),
            'total'         => $jobs->max_num_pages,
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