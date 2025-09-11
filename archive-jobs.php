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

            <?php
              $args = array(
                'post_type' => 'jobs',//カスタム投稿タイプを指定
                'posts_per_page' => 3,//表示する記事数
                'paged' => $paged,
                'no_found_rows' => true,
              );
              $query = new WP_Query($args);//サブループを変数に格納
            ?>

            <?php if ( $query->have_posts() ) : ?>
            <ul class="p-recruit__archive-list">
              <?php while ( $query->have_posts() ) : $query->the_post();?>
                <li class="c-recruit">
                  <a href="<?php the_permalink() ?>">
                    <h2 class="c-recruit__title"><?php the_title(); ?></h2>
                    <div class="c-recruit__body">
                      <p class="c-recruit__text">サーバー/UTM/セキュリティカメラ等を主力製品としている自社プライベートブランド「Bairy」の拡大・販促を目的に、販売代理店の</p>
                      <div class="c-recruit__tag-wrap">
                        <!-- <span class="c-recruit__tag">営業</span>
                        <span class="c-recruit__tag">500万円 ～ 700万円</span>
                        <span class="c-recruit__tag">東京オフィス</span> -->
                        <?php
                          $terms = get_the_terms($post->ID, 'jobs-type');
                          if(!empty($terms)){
                          foreach ($terms as $term) {
                            echo '<span class="c-recruit__tag ' .  $term->slug . '">' . $term->name . '</span>';
                          }
                          }
                        ?>

                        <?php
                          $terms = get_the_terms($post->ID, 'jobs-salary');
                          if(!empty($terms)){
                          foreach ($terms as $term) {
                            echo '<span class="c-recruit__tag ' .  $term->slug . '">' . $term->name . '</span>';
                          }
                          }
                        ?>
                        
                        <?php
                          $terms = get_the_terms($post->ID, 'jobs-area');
                          if(!empty($terms)){
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
                <?php endif; wp_reset_postdata(); ?>

              <!-- <ul class="p-recruit__archive-list">
                <li class="c-recruit">
                  <a href="/recruit-jobs/single-jobs/">
                    <h2 class="c-recruit__title">【リーダー候補】自社PBの販売代理店向け営業</h2>
                    <div class="c-recruit__body">
                      <p class="c-recruit__text">サーバー/UTM/セキュリティカメラ等を主力製品としている自社プライベートブランド「Bairy」の拡大・販促を目的に、販売代理店の</p>
                      <div class="c-recruit__tag-wrap">
                        <span class="c-recruit__tag">営業</span>
                        <span class="c-recruit__tag">500万円 ～ 700万円</span>
                        <span class="c-recruit__tag">東京オフィス</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="c-recruit">
                  <a href="/recruit-jobs/single-jobs/">
                    <h2 class="c-recruit__title">【リーダー候補】自社PBの販売代理店向け営業</h2>
                    <div class="c-recruit__body">
                      <p class="c-recruit__text">サーバー/UTM/セキュリティカメラ等を主力製品としている自社プライベートブランド「Bairy」の拡大・販促を目的に、販売代理店の</p>
                      <div class="c-recruit__tag-wrap">
                        <span class="c-recruit__tag">営業</span>
                        <span class="c-recruit__tag">500万円 ～ 700万円</span>
                        <span class="c-recruit__tag">東京オフィス</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="c-recruit">
                  <a href="/recruit-jobs/single-jobs/">
                    <h2 class="c-recruit__title">【リーダー候補】自社PBの販売代理店向け営業</h2>
                    <div class="c-recruit__body">
                      <p class="c-recruit__text">サーバー/UTM/セキュリティカメラ等を主力製品としている自社プライベートブランド「Bairy」の拡大・販促を目的に、販売代理店の</p>
                      <div class="c-recruit__tag-wrap">
                        <span class="c-recruit__tag">営業</span>
                        <span class="c-recruit__tag">500万円 ～ 700万円</span>
                        <span class="c-recruit__tag">東京オフィス</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="c-recruit">
                  <a href="/recruit-jobs/single-jobs/">
                    <h2 class="c-recruit__title">【リーダー候補】自社PBの販売代理店向け営業</h2>
                    <div class="c-recruit__body">
                      <p class="c-recruit__text">サーバー/UTM/セキュリティカメラ等を主力製品としている自社プライベートブランド「Bairy」の拡大・販促を目的に、販売代理店の</p>
                      <div class="c-recruit__tag-wrap">
                        <span class="c-recruit__tag">営業</span>
                        <span class="c-recruit__tag">500万円 ～ 700万円</span>
                        <span class="c-recruit__tag">東京オフィス</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="c-recruit">
                  <a href="/recruit-jobs/single-jobs/">
                    <h2 class="c-recruit__title">【リーダー候補】自社PBの販売代理店向け営業</h2>
                    <div class="c-recruit__body">
                      <p class="c-recruit__text">サーバー/UTM/セキュリティカメラ等を主力製品としている自社プライベートブランド「Bairy」の拡大・販促を目的に、販売代理店の</p>
                      <div class="c-recruit__tag-wrap">
                        <span class="c-recruit__tag">営業</span>
                        <span class="c-recruit__tag">500万円 ～ 700万円</span>
                        <span class="c-recruit__tag">東京オフィス</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="c-recruit">
                  <a href="/recruit-jobs/single-jobs/">
                    <h2 class="c-recruit__title">【リーダー候補】自社PBの販売代理店向け営業</h2>
                    <div class="c-recruit__body">
                      <p class="c-recruit__text">サーバー/UTM/セキュリティカメラ等を主力製品としている自社プライベートブランド「Bairy」の拡大・販促を目的に、販売代理店の</p>
                      <div class="c-recruit__tag-wrap">
                        <span class="c-recruit__tag">営業</span>
                        <span class="c-recruit__tag">500万円 ～ 700万円</span>
                        <span class="c-recruit__tag">東京オフィス</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="c-recruit">
                  <a href="/recruit-jobs/single-jobs/">
                    <h2 class="c-recruit__title">【リーダー候補】自社PBの販売代理店向け営業</h2>
                    <div class="c-recruit__body">
                      <p class="c-recruit__text">サーバー/UTM/セキュリティカメラ等を主力製品としている自社プライベートブランド「Bairy」の拡大・販促を目的に、販売代理店の</p>
                      <div class="c-recruit__tag-wrap">
                        <span class="c-recruit__tag">営業</span>
                        <span class="c-recruit__tag">500万円 ～ 700万円</span>
                        <span class="c-recruit__tag">東京オフィス</span>
                      </div>
                    </div>
                  </a>
                </li>

              </ul> -->

              <div class="p-recruit__pagination">
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
              </div>
            </section>

            <?php get_sidebar('recruit'); ?>

          </div>
        </div>
      </div>
    </div>

<?php get_template_part('parts/parts-info'); ?>
<?php get_footer(); ?>