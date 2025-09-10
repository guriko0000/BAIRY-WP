<?php get_header(); ?>
    <section class="p-under-mv">
      <div class="l-inner">
        <hgroup class="p-under-mv__title">
          <h1 class="ja">お問い合わせ</h1>
          <span class="en">Contact</span>
        </hgroup>
        <div class="p-under-mv__breadcrumb">
          <div class="c-breadcrumb">
            <span property="itemListElement" typeof="ListItem">
              <a property="item" typeof="WebPage" title="Go to tokyo-clinic." href="<?php echo esc_url(home_url()); ?>/" class="home"><span property="name">ホーム</span></a>
              <meta property="position" content="1"></span>
            <span class="c-breadcrumb__icon"></span>
            <span property="itemListElement" typeof="ListItem">
              <span property="name" class="post post-page current-item">お問い合わせ</span>
              <meta property="url" content="">
              <meta property="position" content="2"></span>
          </div>
        </div>
      </div>
    </section>

    <section class="p-contact l-section l-section--full">
      <div class="l-inner">
        <div class="c-progress">
          <ul class="c-progress__list">
            <li class="c-progress__item active">
              <p class="c-progress__text">お問い合わせ<br>内容選択</p>
            </li>
            <li class="c-progress__item">
              <p class="c-progress__text">詳細入力</p>
            </li>
            <li class="c-progress__item">
              <p class="c-progress__text">入力内容確認</p>
            </li>
          </ul>
        </div>

        <h2 class="p-contact__title">お問い合わせ内容を選択してください</h2>
        <div class="p-contact__type">
          <ul class="p-contact__list l-grid l-grid--col2">
            <li class="p-contact__item">
              <a href="<?php echo esc_url(home_url()); ?>/contact/form01/">
                <span class="p-contact__item-num">01</span>
                <div class="p-contact__item-body">
                  <h3 class="p-contact__item-title">製品についてのお問合せ</h3>
                  <p class="p-contact__item-text">製品の使い方、不具合レポート、設定の変更などはこちら</p>
                </div>
              </a>
            </li>
            <li class="p-contact__item">
              <a href="<?php echo esc_url(home_url()); ?>/contact/form02/">
                <span class="p-contact__item-num">02</span>
                <div class="p-contact__item-body">
                  <h3 class="p-contact__item-title">製品の購入に関するお問合せ</h3>
                  <p class="p-contact__item-text">複合機、ビジネスフォン、セキュリティカメラなどの自社での導入を検討している方</p>
                </div>
              </a>
            </li>
            <li class="p-contact__item">
              <a href="<?php echo esc_url(home_url()); ?>/contact/form03/">
                <span class="p-contact__item-num">03</span>
                <div class="p-contact__item-body">
                  <h3 class="p-contact__item-title">代理店契約に関するお問合せ</h3>
                  <p class="p-contact__item-text">BAIRY製品の貴社での取り扱いを検討されている会社様</p>
                </div>
              </a>
            </li>
            <li class="p-contact__item">
              <a href="<?php echo esc_url(home_url()); ?>/contact/form04/">
                <span class="p-contact__item-num">04</span>
                <div class="p-contact__item-body">
                  <h3 class="p-contact__item-title">施工・設置に関するお問合せ</h3>
                  <p class="p-contact__item-text">工事の依頼、設置に関するご質問などはこちら</p>
                </div>
              </a>
            </li>
            <li class="p-contact__item">
              <a href="<?php echo esc_url(home_url()); ?>/contact/form05/">
                <span class="p-contact__item-num">05</span>
                <div class="p-contact__item-body">
                  <h3 class="p-contact__item-title">その他のご質問</h3>
                  <p class="p-contact__item-text">上記以外のお問い合わせはこちらを選択してください</p>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </section>
<?php get_footer(); ?>