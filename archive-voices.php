<?php get_header(); ?>
<main class="l-main">
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
          <?php if (have_posts()) : ?>
            <div class="p-recruit__voice-wrap">
              <?php while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink() ?>" class="c-voice">
                  <div class="c-voice__text-area">
                    <?php if (get_field('staff_name')) { ?>
                      <h3 class="c-voice__title"><?php echo get_field('staff_division'); ?> <span class="c-voice__name"><?php echo get_field('staff_name'); ?>さん</span></h3>
                    <?php } ?>
                    <?php if (get_field('staff_text')) { ?>
                      <div class="c-voice__body">
                        <p class="c-voice__text"><?php echo get_field('staff_text'); ?></p>
                      </div>
                    <?php } ?>

                  </div>
                  <div class="c-voice__img-area">
                    <div class="c-voice__img">
                      <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                      <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="No Image">
                      <?php endif; ?>
                    </div>
                  </div>
                </a>
              <?php endwhile; ?>
            </div>
          <?php else : ?>
            <p class="fadeshow">更新情報はありません</p>
          <?php endif; ?>

          <div class="p-news__pagination">
            <nav class="c-pagination">
              <ul class="page-numbers">

                <?php if (wp_is_mobile()) : ?>
                  <?php
                  global $query;
                  echo paginate_links(array(
                    'mid_size'      => 1, // 現在ページの左右に表示するページ番号の数
                    'format' => '/page/%#%',
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
                    'format' => '/page/%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages,
                    'prev_text' => '',
                    'next_text' => '',
                    'type' => 'list'
                  ));
                  ?>
                <?php endif; ?>
              </ul>
            </nav>
          </div>
          </section>

          <?php get_sidebar('recruit'); ?>

        </div>
      </div>
    </div>
  </div>

  <?php get_template_part('parts/parts-info'); ?>
  <?php get_footer(); ?>