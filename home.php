<?php get_header(); ?>
<main class="l-main">
  <section class="p-under-mv">
    <div class="l-inner">
      <hgroup class="p-under-mv__title">
        <h1 class="ja">最新情報</h1>
        <span class="en">Article</span>
      </hgroup>
      <div class="p-under-mv__breadcrumb">
        <div class="c-breadcrumb">
          <span property="itemListElement" typeof="ListItem">
            <a property="item" typeof="WebPage" title="Go to tokyo-clinic." href="" class="home"><span property="name">ホーム</span></a>
            <meta property="position" content="1">
          </span>
          <span class="c-breadcrumb__icon"></span>
          <span property="itemListElement" typeof="ListItem">
            <span property="name" class="post post-page current-item">最新情報</span>
            <meta property="url" content="">
            <meta property="position" content="2">
          </span>
        </div>
      </div>
    </div>
  </section>

  <div class="p-news">
    <div class="l-section l-section--full">
      <div class="l-inner">
        <div class="l-post">
          <section class="p-news__archive l-post__main">
            <?php if (have_posts()) : ?>
              <ul class="p-news__list">
                <?php while (have_posts()) : the_post(); ?>
                  <li class="c-news">
                    <a href="<?php the_permalink(); ?>">

                    <!-- 件数&期間(通常投稿) -->
                    <?php
                      $last_post_ids = array();
                      $lastposts = get_posts('posts_per_page=2'); // NEWを付ける最新記事の件数
                      foreach($lastposts as $lastpost) {
                        $last_post_ids[] = $lastpost->ID;
                      }
                    ?>
                    <?php
                      $days = 31; // NEWを付ける最新記事の期間(日数)
                      $today = date_i18n('U');
                      $entry = get_the_time('U');
                      $term = date('U',($today - $entry)) / 86400 ;
                      if( $days > $term ){
                        ?>
                        <?php if ( in_array( $post->ID, $last_post_ids ) ) : ?>
                        <span class="c-news__new-tag">NEW</span>
                        <?php endif; ?>
                        <?php
                      }
                    ?>

                      <figure class="c-news__thumb">
                        <?php if (has_post_thumbnail()) : ?>
                          <?php the_post_thumbnail(); ?>
                        <?php else : ?>
                          <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/common/noimage.png')); ?>">
                        <?php endif; ?>
                      </figure>
                      <div class="c-news__body">
                        <div class="c-news__meta">
                          <span class="c-news__date"><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time></span>
                          <div class="c-news__tag-wrap">
                            <?php
                            $terms = get_the_terms($post->ID, 'category');
                            if (!empty($terms)) {
                              foreach ($terms as $term) {
                                echo '<span class="c-news__tag ' .  $term->slug . '">' . $term->name . '</span>';
                              }
                            }
                            ?>
                          </div>
                        </div>
                        <h2 class="c-news__title"><?php the_title(); ?></h2>
                        <?php if( get_field('news_extract') ) { ?>
                        <p class="c-news__text"><?php echo get_field('news_extract'); ?></p>
                        <?php } ?>
                      </div>
                    </a>
                  </li>
                <?php endwhile; ?>
              </ul>
            <?php else : ?>
              <p class="fadeshow">更新情報はありません</p>
            <?php endif; ?>


                <?php
                  global $query;
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
                  <div class="p-news__pagination">
                    <nav class="c-pagination">
                      <?php echo $pagination_links; ?>
                    </nav>
                  </div>
                <?php endif; ?>

                  <!-- <li><a class="prev page-numbers" href=""></a></li>
                  <li><a class="page-numbers" href="">1</a></li>
                  <li><span aria-current="page" class="page-numbers current">2</span></li>
                  <li><a class="page-numbers" href="">3</a></li>
                  <li><a class="page-numbers" href="">4</a></li>
                  <li><a class="next page-numbers" href=""></a></li>
                </ul>
              </nav>
            </div> -->
          </section>

          <?php get_sidebar('post'); ?>

        </div>
      </div>
    </div>
  </div>

<?php get_template_part('parts/parts-info'); ?>
<?php get_footer(); ?>