<?php get_header(); ?>
    <section class="p-under-mv">
      <div class="l-inner">
        <div class="p-under-mv__title">
          <p class="ja">採用情報</p>
          <span class="en">Recruit</span>
        </div>
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
            <article class="p-recruit__single l-post__main">
              <div class="p-article-head">
                <h1 class="p-article-head__title"><?php the_title(); ?></h1>
                <div class="p-article-head__bottom">
                  <div class="c-tags c-tags--larg">
                    <span class="c-tags__item">営業</span>
                    <span class="c-tags__item">500万円 ～ 700万円</span>
                    <span class="c-tags__item">東京オフィス</span>
                  </div>
                  <!-- <div class="p-article-head__cate-wrap">
                  <?php
                  $terms = get_the_terms($post->ID, 'category');
                  if (!empty($terms)) {
                    foreach ($terms as $term) {
                      echo '<span class="p-article-head__cate ' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</span>';
                    }
                  }
                  ?>
                </div> -->
                </div>
              </div>
              <div class="p-post-recruit">
                <?php if (have_posts()) : ?>
                  <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                  <?php endwhile; ?>
                <?php endif; ?>
              </div>

              <div class="p-recruit__single-btn">
                <a href="" class="c-btn">この求人に応募する<span class="c-btn__icon"></span></a>
              </div>
            </article>
            <?php get_sidebar('recruit'); ?>
          </div>
        </div>
      </div>
      <section class="p-recruit-recommend">
        <div class="l-inner">
          <hgroup class="c-secondary-title">
            <h2 class="c-secondary-title__ja">あなたへのおすすめ</h2>
            <span class="c-secondary-title__en">Recommend</span>
          </hgroup>
          <ul class="l-grid l-grid--col2">
            <li class="c-recruit">
              <a href="">
                <h3 class="c-recruit__title">【リーダー候補】自社PBの販売代理店向け営業</h3>
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
              <a href="">
                <h3 class="c-recruit__title">【リーダー候補】自社PBの販売代理店向け営業</h3>
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
          </ul>
        </div>
      </section>
    </div>

<?php get_template_part('parts/parts-info'); ?>
<?php get_footer(); ?>