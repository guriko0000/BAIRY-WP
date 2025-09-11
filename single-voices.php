<?php get_header(); ?>
<section class="p-under-mv">
  <div class="l-inner">
    <div class="p-under-mv__title">
      <p class="ja">最新情報</p>
      <span class="en">Article</span>
    </div>
    <div class="p-under-mv__breadcrumb">
      <div class="c-breadcrumb">
        <span property="itemListElement" typeof="ListItem">
          <a property="item" typeof="WebPage" title="Go to home." href="/" class="home"><span property="name">ホーム</span></a>
          <meta property="position" content="1">
        </span>
        <span class="c-breadcrumb__icon"></span>
        <span property="itemListElement" typeof="ListItem">
          <a property="item" typeof="WebPage" title="Go to company." href="/business/" class="home"><span property="name">最新情報</span></a>
          <meta property="position" content="2">
        </span>
        <span class="c-breadcrumb__icon"></span>
        <span property="itemListElement" typeof="ListItem">
          <span property="name" class="post post-page current-item">製品情報</span>
          <meta property="url" content="/corporate-sales/">
          <meta property="position" content="3">
        </span>
      </div>
    </div>
  </div>
</section>
<div class="l-section l-section--full">
  <div class="l-inner">
    <div class="l-post">
      <article class="p-person l-post__main">
        <div class="p-person__title__head">
          <h1 class="p-person__title"><?php the_title(); ?></h1>
          <figure class="p-person__main-img">
            <!-- <img src="/assets/img/under/single-news_thumb01.png" alt="" width="834" height="557"> -->
            <?php the_post_thumbnail('full', array('class' => '')); ?>
          </figure>

        </div>
        <div class="p-post-news">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>

      </article>
      <?php get_sidebar('recruit'); ?>
    </div>
  </div>
</div>

<section class="p-recruit-info">
  <div class="l-inner">
    <h2 class="p-recruit-info__title">あなたの挑戦が、未来を作る</h2>
    <div class="p-recruit-info__btn-wrap">
      <a href="" class="c-white-btn c-white-btn--larg">営業職の求人を見る<span class="c-white-btn__icon"></span></a>
      <a href="" class="c-white-btn c-white-btn--larg">すべての求人を見る<span class="c-white-btn__icon"></span></a>
    </div>
  </div>
</section>

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

<?php get_template_part('parts/parts-info'); ?>
<?php get_footer(); ?>