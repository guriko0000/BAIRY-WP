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
          <meta property="position" content="1">
        </span>
        <span class="c-breadcrumb__icon"></span>
        <span property="itemListElement" typeof="ListItem">
          <span property="name" class="post post-page current-item">採用情報</span>
          <meta property="url" content="">
          <meta property="position" content="2">
        </span>
      </div>
    </div>
  </div>
</section>

<div class="p-recruit">
  <div class="p-recruit__intro">
    <div class="l-inner">
      <div class="p-recruit__intro-container">
        <p class="p-recruit__intro-text">現在、全国への事業拡大を進める中で、私たちとともに成長し、挑戦を楽しめる仲間を積極的に募集しています。年齢・性別・経験を問わず、一人ひとりの個性や強みを活かしながら活躍できる職場環境を整えており、未経験からスタートした社員も多数在籍し、第一線で活躍しています。</p>
        <p class="p-recruit__intro-text">「お客様に本当に必要とされるサービスを届けたい」「チームで目標を達成するやりがいを感じたい」——そんな想いを持った方にこそ、当社のフィールドは最適です。あなたの一歩が、会社の未来をつくります。</p>
        <p class="p-recruit__intro-text">私たちと一緒に、通信業界の可能性を広げていきませんか？</p>
      </div>
    </div>
  </div>
  <nav class="c-page-nav c-page-nav--inpage l-inner" aria-label="ページ内リンク">
    <ul class="c-page-nav__list">
      <li class="c-page-nav__item"><a class="c-page-nav__btn" href="#positions">現在募集中の職種<span class="c-page-nav__btn-icon"></span></a></li>
      <li class="c-page-nav__item"><a class="c-page-nav__btn" href="#attractiveness">弊社の魅力<span class="c-page-nav__btn-icon"></span></a></li>
      <li class="c-page-nav__item"><a class="c-page-nav__btn" href="#voice">社員の声<span class="c-page-nav__btn-icon"></span></a></li>
      <li class="c-page-nav__item"><a class="c-page-nav__btn" href="#benefits">福利厚生<span class="c-page-nav__btn-icon"></span></a></li>
    </ul>
  </nav>

  <section id="positions" class="l-section l-section--first">
    <div class="l-inner">
      <hgroup class="c-secondary-title">
        <h2 class="c-secondary-title__ja">現在募集中の職種</h2>
        <span class="c-secondary-title__en">Positions</span>
      </hgroup>
      <div class="p-recruit__type-wrap">
        <section class="p-recruit__type">
          <h3 class="c-line-title">営業系</h3>
          <?php
          $args = array(
            'post_type'      => 'jobs',
            'posts_per_page' => 2,
            'paged'          => $paged,
            'no_found_rows'  => true,
            'tax_query'      => array(
              array(
                'taxonomy' => 'jobs-type',
                'field'    => 'slug',
                'terms'    => 'sales', // （配列もOK）
              ),
            ),
          );
          $query = new WP_Query($args); //サブループを変数に格納
          ?>

          <?php if ($query->have_posts()) : ?>
            <ul class="p-recruit__type-list l-grid l-grid--col2">
              <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li class="c-recruit">
                  <a href="<?php the_permalink() ?>">
                    <h4 class="c-recruit__title"><?php the_title(); ?></h4>
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
            <p class="fadeshow u-mt30">採用情報はありません</p>
          <?php endif;
          wp_reset_postdata(); ?>
          <div class="p-recruit__type-btn">
            <a href="<?php echo esc_url(home_url()); ?>/jobs/jobs-type/sales/" class="c-btn">営業系の募集一覧を見る<span class="c-btn__icon"></span></a>
          </div>
        </section>
        <section class="p-recruit__type">
          <h3 class="c-line-title">技術系</h3>
          <?php
          $args = array(
            'post_type'      => 'jobs',
            'posts_per_page' => 2,
            'paged'          => $paged,
            'no_found_rows'  => true,
            'tax_query'      => array(
              array(
                'taxonomy' => 'jobs-type',
                'field'    => 'slug',
                'terms'    => 'technology', // 指定するターム（配列もOK）
              ),
            ),
          );
          $query = new WP_Query($args); //サブループを変数に格納
          ?>

          <?php if ($query->have_posts()) : ?>
            <ul class="p-recruit__type-list l-grid l-grid--col2">
              <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li class="c-recruit">
                  <a href="<?php the_permalink() ?>">
                    <h4 class="c-recruit__title"><?php the_title(); ?></h4>
                    <div class="c-recruit__body">
                      <p class="c-recruit__text">サーバー/UTM/セキュリティカメラ等を主力製品としている自社プライベートブランド「Bairy」の拡大・販促を目的に、販売代理店の</p>
                      <div class="c-recruit__tag-wrap">

                        <?php
                        // まとめて処理したいタクソノミーを配列で指定
                        $taxonomies = array('jobs-type', 'jobs-area', 'jobs-feature');

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
            <p class="fadeshow u-mt30">採用情報はありません</p>
          <?php endif;
          wp_reset_postdata(); ?>
          <div class="p-recruit__type-btn">
            <a href="<?php echo esc_url(home_url()); ?>/jobs/jobs-type/technology/" class="c-btn">技術系系の募集一覧を見る<span class="c-btn__icon"></span></a>
          </div>
        </section>
        <section class="p-recruit__type">
          <h3 class="c-line-title">事務・その他</h3>
          <?php
          $args = array(
            'post_type'      => 'jobs',
            'posts_per_page' => 2,
            'paged'          => $paged,
            'no_found_rows'  => true,
            'tax_query'      => array(
              array(
                'taxonomy' => 'jobs-type',
                'field'    => 'slug',
                'terms'    => 'office', // 指定するターム（配列もOK）
              ),
            ),
          );
          $query = new WP_Query($args); //サブループを変数に格納
          ?>

          <?php if ($query->have_posts()) : ?>
            <ul class="p-recruit__type-list l-grid l-grid--col2">
              <?php while ($query->have_posts()) : $query->the_post(); ?>
                <li class="c-recruit">
                  <a href="<?php the_permalink() ?>">
                    <h4 class="c-recruit__title"><?php the_title(); ?></h4>
                    <div class="c-recruit__body">
                      <p class="c-recruit__text">サーバー/UTM/セキュリティカメラ等を主力製品としている自社プライベートブランド「Bairy」の拡大・販促を目的に、販売代理店の</p>
                      <div class="c-recruit__tag-wrap">

                        <?php
                        // まとめて処理したいタクソノミーを配列で指定
                        $taxonomies = array('jobs-type', 'jobs-area', 'jobs-feature');

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
            <p class="fadeshow u-mt30">採用情報はありません</p>
          <?php endif;
          wp_reset_postdata(); ?>
          <div class="p-recruit__type-btn">
            <a href="<?php echo esc_url(home_url()); ?>/jobs/jobs-type//office-other/" class="c-btn">事務・その他の募集一覧を見る<span class="c-btn__icon"></span></a>
          </div>
        </section>
      </div>
    </div>
  </section>

  <section id="attractiveness" class="p-recruit__attract l-section">
    <div class="l-inner">
      <div class="p-recruit__attract-container">
        <hgroup class="c-secondary-title">
          <h2 class="c-secondary-title__ja">BAIRYの魅力</h2>
          <span class="c-secondary-title__en">Attractiveness</span>
        </hgroup>
        <div class="p-recruit__attract-media">
          <div class="p-recruit__media-text-area">
            <p class="p-recruit__media-text">株式会社ブロードアピールは、柔軟な発想力とスピード感を武器に、常に時代のニーズに応えるサービスを提供してきました。</p>
            <p class="p-recruit__media-text">社員一人ひとりの意見を大切にするフラットな組織風土のもと、若手からベテランまでが自分らしく活躍できる環境が整っています。</p>
            <p class="p-recruit__media-text">また、部門を越えて連携するカルチャーが根付いており、部署間の垣根を越えたコミュニケーションが活発なのも特徴です。</p>
            <p class="p-recruit__media-text">「挑戦する人を応援する」という企業文化の中で、新たな価値をともに生み出していける仲間を歓迎しています。</p>
          </div>
          <div class="p-recruit__media-video-area">
            <div class="p-recruit__media-video">
              <!-- <picture>
                  <source media="(min-width: 768px)" srcset="/assets/img/under/attractiveness_img.png" width="367" height="275">
                  <source media="(max-width: 767px)" srcset="/assets/img/under/attractiveness_img-sp.png" width="300" height="208">
                  <img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/under/attractiveness_img.png" alt="" width="367" height="275" loading="lazy">
                </picture> -->
              <video src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/movie/mv_video.mp4" poster="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/under/attractiveness_img.png" controls></video>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="voice" class="p-recruit__voice">
    <div class="l-inner l-inner--s">
      <hgroup class="c-secondary-title">
        <h2 class="c-secondary-title__ja">社員の声</h2>
        <span class="c-secondary-title__en">Voice</span>
      </hgroup>

      <?php
      $args = array(
        'post_type' => 'voices', //カスタム投稿タイプを指定
        'posts_per_page' => 2, //表示する記事数
        'paged' => $paged,
        'no_found_rows' => true,
      );
      $query = new WP_Query($args); //サブループを変数に格納
      ?>

      <?php if ($query->have_posts()) : ?>
        <div class="p-recruit__voice-wrap">
          <?php while ($query->have_posts()) : $query->the_post(); ?>
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
      <?php endif;
      wp_reset_postdata(); ?>

      <!-- <a href="<?php echo esc_url(home_url()); ?>/voice/" class="c-voice">
              <div class="c-voice__text-area">
                <h3 class="c-voice__title">法人営業部 <span class="c-voice__name">Tさん</span></h3>
                <div class="c-voice__body">
                  <p class="c-voice__text">前職は生命保険の営業。そんなTさんが新たな挑戦の場に選んだのが、ブロードアピールの法人営業部でした。<br>「この人にお願いしたい」――お客様からのその一言を原動力に、日々やりがいを感じながら働いています。<br>Tさんが語る、社内の雰囲気や仕事の魅力、そしてこれから仲間になる方へのメッセージとは？<br>“営業って、こんなに面白い”と思える、リアルな声をお届けします。</p>
                </div>
              </div>
              <div class="c-voice__img-area">
                <div class="c-voice__img">
                  <img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/under/voice_img02.jpg" alt="" width="300" height="219" loading="lazy">
                </div>
              </div>
            </a>
          </div> -->
      <div class="p-recruit__voice-btn">
        <a href="<?php echo esc_url(home_url()); ?>/voices/" class="c-btn c-btn--larg">社員の声をもっと見る<span class="c-btn__icon"></span></a>
      </div>
    </div>
  </section>

  <section id="benefits" class="p-recruit__benefits u-bg-blue">
    <div class="l-inner">
      <hgroup class="c-secondary-title">
        <h2 class="c-secondary-title__ja">福利厚生</h2>
        <span class="c-secondary-title__en">Benefits</span>
      </hgroup>
      <div class="p-recruit__benefits-intro">
        <h3 class="p-recruit__benefits-title">社員の働きやすさを重視</h3>
        <div class="p-recruit__benefits-body">
          <p class="p-recruit__benefits-text">株式会社ブロードアピールでは、社員一人ひとりが安心して長く働ける環境づくりに力を入れています。</p>
          <p class="p-recruit__benefits-text">働く時間も、プライベートも大切にできるよう、制度の充実と柔軟な働き方をサポートしています。</p>
        </div>
      </div>

      <section class="p-recruit__benefits-sec">
        <h3 class="p-recruit__benefits-sec-title">休日休暇</h3>
        <ul class="p-recruit__benefits-list c-benefits">
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
        </ul>
      </section>
      <section class="p-recruit__benefits-sec">
        <h3 class="p-recruit__benefits-sec-title">社会保険</h3>
        <ul class="p-recruit__benefits-list c-benefits">
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
        </ul>
      </section>
      <section class="p-recruit__benefits-sec">
        <h3 class="p-recruit__benefits-sec-title">諸手当</h3>
        <ul class="p-recruit__benefits-list c-benefits">
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
        </ul>
      </section>
      <section class="p-recruit__benefits-sec">
        <h3 class="p-recruit__benefits-sec-title">各種制度</h3>
        <ul class="p-recruit__benefits-list c-benefits">
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
          <li class="c-benefits__item">
            <div class="c-benefits__head">
              <h4 class="c-benefits__title">年間休日XXX日</h4>
              <span class="c-benefits__icon"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/assets/img/icon/benefits_icon01.svg" alt="" width="45" height="45" loading="lazy"></span>
            </div>
            <p class="c-benefits__text">完全週休二日制・<br>GW・年末年始等</p>
          </li>
        </ul>
      </section>
    </div>
  </section>
</div>

<?php get_template_part('parts/parts-info'); ?>
<?php get_footer(); ?>