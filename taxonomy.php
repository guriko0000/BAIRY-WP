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
              <meta property="position" content="1"></span>
            <span class="c-breadcrumb__icon"></span>
            <span property="itemListElement" typeof="ListItem">
              <span property="name" class="post post-page current-item">採用情報</span>
              <meta property="url" content="">
              <meta property="position" content="2"></span>
          </div>
        </div>
      </div>
    </section>

    <div class="p-recruit">
      <div class="l-section l-section--full">
        <div class="l-inner">
          <div class="l-post">
            <section class="p-recruit__archive l-post__main">

            <?php if(have_posts()) : ?>
            <ul class="p-recruit__archive-list">
              <?php while(have_posts()) :the_post(); ?>
                <li class="c-recruit">
                  <a href="<?php the_permalink() ?>">
                    <h2 class="c-recruit__title"><?php the_title(); ?></h2>
                    <div class="c-recruit__body">
                      <p class="c-recruit__text">サーバー/UTM/セキュリティカメラ等を主力製品としている自社プライベートブランド「Bairy」の拡大・販促を目的に、販売代理店の</p>
                      <div class="c-recruit__tag-wrap">

                      <?php
                        // まとめて処理したいタクソノミーを配列で指定
                        $taxonomies = array('jobs-type', 'jobs-salary', 'jobs-area');

                        foreach ($taxonomies as $taxonomy) {
                            $terms = get_the_terms($post->ID, $taxonomy);
                            if (!empty($terms) && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    echo '<span class="c-recruit__tag ' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</span>';
                                }
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
                  <p class="fadeshow">採用情報はありません</p>
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
                  <div class="p-recruit__pagination">
                    <nav class="c-pagination">
                      <?php echo $pagination_links; ?>
                    </nav>
                  </div>
                <?php endif; ?>

              <!-- <div class="p-recruit__pagination">
                <nav class="c-pagination">
                  <ul class="page-numbers">
                    <li><a class="prev page-numbers" href=""></a></li>
                    <li><a class="page-numbers" href="">1</a></li>
                    <li><span aria-current="page" class="page-numbers current">2</span></li>
                    <li><a class="page-numbers" href="">3</a></li>
                    <li><a class="page-numbers" href="">4</a></li>
                    <li><a class="next page-numbers" href=""></a></li>
                  </ul>
                </nav>
              </div> -->
            </section>

            <?php get_sidebar('recruit'); ?>

          </div>
        </div>
      </div>
    </div>

<?php get_template_part('parts/parts-info'); ?>
<?php get_footer(); ?>