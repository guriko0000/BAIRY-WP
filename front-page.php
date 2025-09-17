  <?php get_header(); ?>
  <section id="mv" class="p-mv">
    <div class="p-mv__inner">
      <div class="p-mv__video-wrap">
        <video class="p-mv__video" rel="preload" as="video" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/movie/mv_video.mp4" autoplay loop muted></video>
        <div class="p-mv__text-area">
          <p class="p-mv__title">
            <span class="text-wrapper"><span class="text">テクノロジーで、</span></span><br>
            <span class="text-wrapper"><span class="text">願いを現実に。</span></span>
          </p>
          <p class="p-mv__text">
            <span class="text-wrapper">
              <span class="text">私たちは、技術と創造力で<br class="u-onliy-sp">お客様の課題を解決し、<br>
                社会に価値を提供する企業です。</span>
            </span>
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="p-top-news js-fadeUp-inView">
    <div class="l-inner">
      <div class="p-top-news__container js-fadeUp">
        <div class="p-top-news__inner">
          <div class="p-top-news__head">
            <h2 class="p-top-news__title">News</h2>
            <a href="<?php echo esc_url(home_url()); ?>/news/" class="p-top-news__link">一覧を見る<span class="p-top-news__link-icon"></span></a>
          </div>
          <?php
          $args = array(
            'post_type' => 'post', //カスタム投稿タイプを指定
            'posts_per_page' => 3, //表示する記事数
            'paged' => $paged,
            'no_found_rows' => true,
          );
          $query = new WP_Query($args); //サブループを変数に格納
          ?>

          <?php if ($query->have_posts()) : ?>
            <ul class="p-top-news__list">
              <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li class="p-top-news__item">
                  <a href="<?php the_permalink() ?>">
                    <div class="p-top-news__item-thumb-wrap">
                      <figure class="p-top-news__item-thumb">
                        <?php
                        if (has_post_thumbnail()) {
                          echo wp_get_attachment_image(
                            get_post_thumbnail_id(),
                            'news-archive-thumb',
                            false,
                            [
                              'class'    => '',
                              'loading'  => 'lazy',
                              'decoding' => 'async',
                            ]
                          );
                        } else {
                          echo '<img src="' . get_template_directory_uri() . '/assets/img/common/noimage.png" alt="No Image" loading="lazy">';
                        }
                        ?>
                      </figure>
                    </div>
                    <div class="p-top-news__item-body">
                      <span class="p-top-news__item-time"><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time></span>
                      <p class="p-top-news__item-title"><?php the_title(); ?></p>
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
      </div>
    </div>
  </section>

  <section id="business" class="p-top-business">
    <div class="p-top-business__main js-fadeUp-inView2">
      <div class="l-inner">
        <div class="p-top-business__content">
          <div class="p-top-business__text-area">
            <hgroup class="c-primary-title js-wipeAnimation">
              <h2 class="c-primary-title__ja">事業内容</h2>
              <span class="c-primary-title__en">Our Business</span>
            </hgroup>
            <div class="js-fadeUp">
              <p class="p-top-business__text">私たちBAIRYは、ネットワーク機器と最新テクノロジーを駆使し、中小企業の課題解決を支援するプロフェッショナルです。技術と提案力で、ビジネスの成長と変革を力強くサポートします。</p>
              <!-- <div class="p-top-business__btn">
                  <a href="" class="c-btn">事業内容を詳しく見る<span class="c-btn__icon"></span></a>
                </div> -->
            </div>
          </div>
          <div class="p-top-business__slider">
            <div class="c-loop js-fadeUp">
              <div class="c-loop__inner">
                <div class="c-loop__list c-loop__list--01">
                  <div class="c-loop__item"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slider_img01.jpg" alt="" width="309" height="504" loading="lazy"></div>
                  <div class="c-loop__item"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slider_img02.jpg" alt="" width="309" height="504" loading="lazy"></div>
                  <div class="c-loop__item"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slider_img03.jpg" alt="" width="309" height="504" loading="lazy"></div>
                  <div class="c-loop__item"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slider_img04.jpg" alt="" width="309" height="504" loading="lazy"></div>
                  <div class="c-loop__item"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slider_img05.jpg" alt="" width="309" height="504" loading="lazy"></div>
                  <div class="c-loop__item"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slider_img06.jpg" alt="" width="309" height="504" loading="lazy"></div>
                </div>
                <div class="c-loop__list c-loop__list--02">
                  <div class="c-loop__item"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slider_img01.jpg" alt="" width="309" height="504" loading="lazy"></div>
                  <div class="c-loop__item"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slider_img02.jpg" alt="" width="309" height="504" loading="lazy"></div>
                  <div class="c-loop__item"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slider_img03.jpg" alt="" width="309" height="504" loading="lazy"></div>
                  <div class="c-loop__item"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slider_img04.jpg" alt="" width="309" height="504" loading="lazy"></div>
                  <div class="c-loop__item"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slider_img05.jpg" alt="" width="309" height="504" loading="lazy"></div>
                  <div class="c-loop__item"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/slider_img06.jpg" alt="" width="309" height="504" loading="lazy"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="p-top-business__division js-fadeUp-inView">
      <div class="l-inner">
        <div class="js-wipeAnimation">
          <hgroup class="p-top-business__division-title">
            <h3 class="ja">事業部</h3>
            <p class="en">Division</p>
          </hgroup>
        </div>
        <div class="p-top-business__division-container l-grid l-grid--col2 js-fadeUp">
          <div class="c-media">
            <a href="<?php echo esc_url(home_url()); ?>/corporate-sales/">
              <div class="c-media__inner">
                <div class="c-media__img-wrap">
                  <figure class="c-media__img">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/division_img01.jpg" alt="" width="226" height="114" loading="lazy">
                  </figure>
                </div>
                <div class="c-media__body">
                  <hgroup class="c-media__title">
                    <h4 class="ja">法人営業部</h4>
                    <span class="en">sales</span>
                  </hgroup>
                  <p class="c-media__text">複合機、防犯カメラなどのOA機器の販売をはじめとし、オフィス家具、ダミーテキストダミーテキス</p>
                </div>
              </div>
              <span class="c-media__icon"></span>
            </a>
          </div>
          <div class="c-media">
            <a href="<?php echo esc_url(home_url()); ?>/product-division/">
              <div class="c-media__inner">
                <div class="c-media__img-wrap">
                  <figure class="c-media__img">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/division_img02.jpg" alt="" width="226" height="114" loading="lazy">
                  </figure>
                </div>
                <div class="c-media__body">
                  <hgroup class="c-media__title">
                    <h4 class="ja">プロダクト事業部</h4>
                    <span class="en">product</span>
                  </hgroup>
                  <p class="c-media__text">マーケットのニーズを見据えた、企業向けのさまざまな製品の企画・開発・設計・販売をしている</p>
                </div>
              </div>
              <span class="c-media__icon"></span>
            </a>
          </div>
          <div class="c-media">
            <a href="<?php echo esc_url(home_url()); ?>/management-department/">
              <div class="c-media__inner">
                <div class="c-media__img-wrap">
                  <figure class="c-media__img">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/division_img03.jpg" alt="" width="226" height="114" loading="lazy">
                  </figure>
                </div>
                <div class="c-media__body">
                  <hgroup class="c-media__title">
                    <h4 class="ja">管理部</h4>
                    <span class="en">management</span>
                  </hgroup>
                  <p class="c-media__text">お客様からの注文やエンドユーザー様からのご注文を請け、倉庫内の在庫の有無を確認後、必要に応じて発</p>
                </div>
              </div>
              <span class="c-media__icon"></span>
            </a>
          </div>
          <div class="c-media">
            <a href="<?php echo esc_url(home_url()); ?>/system-department/">
              <div class="c-media__inner">
                <div class="c-media__img-wrap">
                  <figure class="c-media__img">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/division_img04.jpg" alt="" width="226" height="114" loading="lazy">
                  </figure>
                </div>
                <div class="c-media__body">
                  <hgroup class="c-media__title">
                    <h4 class="ja">情通システム部</h4>
                    <span class="en">system</span>
                  </hgroup>
                  <p class="c-media__text">お客様と入念な打ち合わせの後、監視したいポイントがしっかり映るように取り付けます。建物への防水処</p>
                </div>
              </div>
              <span class="c-media__icon"></span>
            </a>
          </div>
        </div>
      </div>
    </section>
  </section>

  <div class="p-bg">
    <div class="p-bg__img-wrap">
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/bg_img.jpg" class="p-bg__img" alt="" width="1600" height="448" loading="lazy">
    </div>
  </div>

  <section class="p-top-company js-fadeUp-inView">
    <div class="l-inner">
      <div class="p-top-company__container">
        <div class="p-top-company__text-area">
          <hgroup class="c-primary-title js-wipeAnimation">
            <h2 class="c-primary-title__ja">会社情報</h2>
            <span class="c-primary-title__en">Company</span>
          </hgroup>
          <p class="p-top-company__text js-fadeUp">私たちは通信機器やITソリューションを通じて、お客様一人ひとりに寄り添い、課題の本質を見極めたうえで、最適な手段で解決へ導くことを大切にしています。</p>
          <div class="p-top-company__btn js-fadeUp">
            <a href="<?php echo esc_url(home_url()); ?>/company/" class="c-btn">会社情報を詳しく見る<span class="c-btn__icon"></span></a>
          </div>
        </div>
        <div class="p-top-company__link-area js-fadeUp">
          <ul class="p-top-company__list">
            <li class="p-top-company__item">
              <a href="<?php echo esc_url(home_url()); ?>/company/#greeting">
                <div class="p-top-company__item-img">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/company_img01.jpg" alt="" width="261" height="164" loading="lazy">
                </div>
                <p class="p-top-company__item-text">社長挨拶<span class="icon"></span></p>
              </a>
            </li>
            <li class="p-top-company__item">
              <a href="<?php echo esc_url(home_url()); ?>/company/#about">
                <div class="p-top-company__item-img">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/company_img02.jpg" alt="" width="261" height="164" loading="lazy">
                </div>
                <p class="p-top-company__item-text">会社概要<span class="icon"></span></p>
              </a>
            </li>
            <li class="p-top-company__item">
              <a href="<?php echo esc_url(home_url()); ?>/company/#history">
                <div class="p-top-company__item-img">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/company_img03.jpg" alt="" width="261" height="164" loading="lazy">
                </div>
                <p class="p-top-company__item-text">沿革<span class="icon"></span></p>
              </a>
            </li>
            <li class="p-top-company__item">
              <a href="<?php echo esc_url(home_url()); ?>/company/#office">
                <div class="p-top-company__item-img">
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/company_img04.jpg" alt="" width="261" height="164" loading="lazy">
                </div>
                <p class="p-top-company__item-text">事業所<span class="icon"></span></p>
              </a>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </section>

  <div class="js-fadeUp-inView">
    <section class="p-top-recruit js-fadeUp">
      <div class="l-inner">
        <div class="p-top-recruit__content">
          <div class="p-top-recruit__text-area">
            <h2 class="p-top-recruit__title">Recruit</h2>
            <p class="p-top-recruit__lead">あなたの一歩が、未来を創る。</p>
            <div class="p-top-recruit__text-wrap">
              <p class="p-top-recruit__text">共にに成長し、挑戦を楽しめる仲間を積極的に募集しています。<br>年齢・性別・経験を問わず、一人ひとりの個性や強みを活かしながら活躍できる職場環境を整えています。</p>
              <p class="p-top-recruit__text">私たちと一緒に、可能性を広げていきませんか？</p>
            </div>
            <div class="p-top-recruit__btn-wrap">
              <a href="<?php echo esc_url(home_url()); ?>/recruit/" class="p-top-recruit__btn">採用情報へ<span class="p-top-recruit__btn-icon"></span></a>
            </div>
          </div>

          <div class="p-top-recruit__slider-area">
            <section class="splide" aria-label="新卒インタビュースライダー">
              <div class="splide__track">
                <?php
                $args = array(
                  'post_type' => 'voices', //カスタム投稿タイプを指定
                  'posts_per_page' => 3, //表示する記事数
                  'paged' => $paged,
                  'no_found_rows' => true,
                );
                $query = new WP_Query($args); //サブループを変数に格納
                ?>
                <?php if ($query->have_posts()) : ?>
                  <ul class="splide__list">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                      <li class="splide__slide c-card">
                        <a href="<?php the_permalink() ?>">
                          <div class="c-card__head">
                            <?php if (get_field('staff_name')) { ?>
                              <p class="c-card__name"><?php echo get_field('staff_division'); ?>　<?php echo get_field('staff_name'); ?>さん</p>
                            <?php } ?>
                            <div class="c-card__img">
                              <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                              <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="No Image">
                              <?php endif; ?>
                            </div>
                          </div>
                          <div class="c-card__body">
                            <p class="c-card__text"><?php the_title(); ?></p>
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
              <!-- 現在地表示用のバーを実装 -->
              <div class="splide__bottom">
                <div class="my-carousel-progress">
                  <div class="my-carousel-progress-bar"></div>
                </div>
                <div class="splide__arrows"></div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </section>
  </div>

  <section class="p-top-updates js-fadeUp-inView">
    <div class="l-inner">
      <div class="p-top-updates__head">
        <hgroup class="c-primary-title c-primary-title--small js-wipeAnimation">
          <h2 class="c-primary-title__ja">最新情報</h2>
          <span class="c-primary-title__en">News & Updates</span>
        </hgroup>

        <ul class="p-top-updates__cate-wrap js-fadeUp">
          <li data-filter="all" class="is-active p-top-updates__cate">すべて</li>
          <?php
          $args = array(
            'taxonomy'   => 'category',
            'hide_empty' => false,
            'orderby'    => 'description', // ← ディスクリプション順に並べる
            'order'      => 'ASC',
          );
          $categories = get_terms($args);

          if (!empty($categories) && !is_wp_error($categories)) {
            foreach ($categories as $cat) {
              echo '<li data-filter="' . esc_attr($cat->slug) . '" class="p-top-updates__cate">'
                . esc_html($cat->name)
                . '</li>';
            }
          }
          ?>
        </ul>

      </div>


      <?php
      $args = array(
        'post_type' => 'post', //カスタム投稿タイプを指定
        'posts_per_page' => 50, //表示する記事数
        'paged' => $paged,
        'no_found_rows' => true,
      );
      $query = new WP_Query($args); //サブループを変数に格納
      ?>

      <?php if ($query->have_posts()) : ?>
        <ul class="l-grid l-grid--cards p-top-updates__list js-fadeUp">
          <?php while ($query->have_posts()) : $query->the_post(); ?>

            <?php
            $slugs = wp_get_post_terms(get_the_ID(), 'category', array('fields' => 'slugs'));

            $data_category = (! is_wp_error($slugs) && ! empty($slugs))
              ? implode(' ', $slugs)
              : '';
            ?>

            <li class="c-news p-top-updates__item" data-category="<?php echo esc_attr($data_category); ?>">
              <a href="<?php the_permalink() ?>">
                <figure class="c-news__thumb">
                  <?php
                  if (has_post_thumbnail()) {
                    echo wp_get_attachment_image(
                      get_post_thumbnail_id(),
                      'news-archive-thumb',
                      false,
                      [
                        'class'    => '',
                        'loading'  => 'lazy',
                        'decoding' => 'async',
                      ]
                    );
                  } else {
                    echo '<img src="' . get_template_directory_uri() . '/assets/img/common/noimage.png" alt="No Image" loading="lazy">';
                  }
                  ?>
                </figure>
                <div class="c-news__body">
                  <span class="c-news__date"><time datetime="<?php echo get_the_date('Y-m-d') ?>"><?php echo get_the_date('Y.m.d') ?></time></span>
                  <h3 class="c-news__title"><?php the_title(); ?></h3>
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
      <?php endif;
      wp_reset_postdata(); ?>


      <!-- <ul class="l-grid l-grid--cards p-top-updates__list js-fadeUp">
          <li class="c-news p-top-updates__item" data-category="news">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news01/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">G.W.期間中の営業日のお知らせ</h3>
                <p class="c-news__text">お知らせ1内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="event">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news02/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb02.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">協賛ユニフォームを頂きました！</h3>
                <p class="c-news__text">イベント1内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="product">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news03/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb03.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">WS1000・BF1000発売開始について</h3>
                <p class="c-news__text">製品情報1内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="news">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news01/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb04.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">新年のご挨拶</h3>
                <p class="c-news__text">お知らせ2内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="news">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news02/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">お知らせ3内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="blog">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news03/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">ブログ1内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="blog">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news01/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">ブログ2内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="event">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news02/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">イベント2内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="event">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news03/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">イベント3内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="product">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news01/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">製品情報2内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="product">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news02/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">製品情報3内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="event">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news03/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">イベント4内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="blog">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news01/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">ブログ3内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="blog">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news01/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">ブログ4内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="news">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news01/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">お知らせ4内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="news">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news01/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">お知らせ5内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="news">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news01/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">お知らせ6内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="event">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news01/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">イベント4内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="product">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news01/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">製品情報4内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
          <li class="c-news p-top-updates__item" data-category="blog">
            <a href="<?php echo esc_url(home_url()); ?>/news/single-news01/">
              <figure class="c-news__thumb">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
              </figure>
              <div class="c-news__body">
                <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                <h3 class="c-news__title">タイトルタイトル</h3>
                <p class="c-news__text">ブログ6内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
              </div>
            </a>
          </li>
        </ul> -->
      <div class="p-top-updates__btn js-fadeUp">
        <a href="<?php echo esc_url(home_url()); ?>/news/" class="c-btn">記事一覧を見る<span class="c-btn__icon"></span></a>
      </div>
    </div>
  </section>

  <?php get_template_part('parts/parts-info'); ?>
  <?php get_footer(); ?>