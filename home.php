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
                  <li class="c-news" data-category="news">
                    <a href="<?php the_permalink(); ?>">
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
                        <p class="c-news__text">お知らせ1内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
                      </div>
                    </a>
                  </li>
                <?php endwhile; ?>
              </ul>
            <?php else : ?>
              <p class="fadeshow">更新情報はありません</p>
            <?php endif; ?>

            <div class="p-news__pagination">
              <nav class="c-pagination">
                <ul class="page-numbers">

      <?php if ( wp_is_mobile() ) : ?>
        <?php
          global $query;
          echo paginate_links(array(
              'mid_size'      => 1, // 現在ページの左右に表示するページ番号の数
              'format' => '/page/%#%' ,
              'current' => max(1, get_query_var('paged')),
              'total' => $wp_query->max_num_pages,
              'prev_text' => '',
              'next_text' => '',
              'type' => 'list'
          ));
        ?>
      <?php else: ?>
        <?php
          global $query;
          echo paginate_links(array(
              'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
              'format' => '/page/%#%' ,
              'current' => max(1, get_query_var('paged')),
              'total' => $wp_query->max_num_pages,
              'prev_text' => '',
              'next_text' => '',
              'type' => 'list'
          ));
        ?>
      <?php endif; ?>

                  <!-- <li><a class="prev page-numbers" href=""></a></li>
                  <li><a class="page-numbers" href="">1</a></li>
                  <li><span aria-current="page" class="page-numbers current">2</span></li>
                  <li><a class="page-numbers" href="">3</a></li>
                  <li><a class="page-numbers" href="">4</a></li>
                  <li><a class="next page-numbers" href=""></a></li> -->
                </ul>
              </nav>
            </div>
          </section>

          <?php get_sidebar('post'); ?>

        </div>
      </div>
    </div>
  </div>

  <section class="p-info">
    <div class="l-inner">
      <div class="p-info__container">
        <div class="p-info__head">
          <hgroup class="p-info__title">
            <h2 class="ja">お問い合わせ</h2>
            <span class="en">Contact</span>
          </hgroup>
          <p class="p-info__text">製品の詳細や導入に関するご相談を承っております。<br>お気軽にお問合せフォームよりご連絡ください。</p>
        </div>
        <div class="p-info__body">
          <div class="p-info__tel">
            <a href="tel:03-0000-0000" class="p-info__tel-link">03-0000-0000</a>
            <p class="p-info__tel-text">営業時間／平日9:00〜18:00</p>
          </div>
          <div class="p-info__btn">
            <a href="/contact/" class="c-white-btn">メールでのお問合せ<span class="c-white-btn__icon"></span></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>