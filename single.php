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
              <meta property="position" content="1"></span>
            <span class="c-breadcrumb__icon"></span>
            <span property="itemListElement" typeof="ListItem">
              <a property="item" typeof="WebPage" title="Go to company." href="/business/" class="home"><span property="name">最新情報</span></a>
              <meta property="position" content="2"></span>
            <span class="c-breadcrumb__icon"></span>
            <span property="itemListElement" typeof="ListItem">
              <span property="name" class="post post-page current-item">製品情報</span>
              <meta property="url" content="/corporate-sales/">
              <meta property="position" content="3"></span>
          </div>
        </div>
      </div>
    </section>
    <div class="p-news l-section l-section--full">
      <div class="l-inner">
        <div class="l-post">
          <article class="p-news__single l-post__main">
            <div class="p-article-head p-article-head--news">
              <h1 class="p-article-head__title"><?php the_title(); ?></h1>
              <div class="p-article-head__bottom">
                <time datetime="<?php echo get_the_date('Y-m-d') ?>" class="p-article-head__time"><?php echo get_the_date('Y.m.d') ?></time>
                <!-- <div class="c-tags c-tags--larg c-tags--blue">
                  <span class="c-tags__item">500万円 ～ 700万円</span>
                  <span class="c-tags__item">東京オフィス</span>
                </div> -->
                <div class="c-tags c-tags--larg c-tags--blue">
                  <?php
                  $terms = get_the_terms($post->ID, 'category');
                  if (!empty($terms)) {
                    foreach ($terms as $term) {
                      echo '<span class="c-tags__item ' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</span>';
                    }
                  }
                  ?>
                </div>
              </div>
              <figure class="p-article-head__thumb">
                <!-- <img src="/assets/img/under/single-news_thumb01.png" alt="" width="834" height="557"> -->
                <?php the_post_thumbnail('full', array('class' => '')); ?>
              </figure>

              <!-- <?php the_post_thumbnail('full', array('class' => 'p-article-head__thumb')); ?> -->
            </div>
            <div class="p-post-news">
              <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                  <?php the_content(); ?>
                <?php endwhile; ?>
              <?php endif; ?>

              <div class="c-block-product">
                <dl>
                  <div class="c-block-product__row">
                    <dt>製品名</dt>
                    <dd>BAIRY WS1000/BF1000</dd>
                  </div>
                  <div class="c-block-product__row">
                    <dt>発売開始日</dt>
                    <dd>2025年1月7日（火曜日）10:00より</dd>
                  </div>
                  <div class="c-block-product__row">
                    <dt>製品ページ</dt>
                    <dd>
                      <p>WS1000　<a href="https://bairy.jp/ap/">https:/bairy.jp/ap/</a></p>
                      <p>WS1000　<a href="https://bairy.jp/ap/">https:/bairy.jp/ap/</a></p>
                    </dd>
                  </div>
                  <div class="c-block-product__row">
                    <dt>製品のお問い合わせ</dt>
                    <dd>株式会社ブロードアピール　プロダクト事業部<br>
                      TEL 092-980-5757（平日9:00～18:00、土日祝休み）</dd>
                  </div>
                </dl>
              </div>
            </div>

            <div class="c-pager p-news__pager">
              <div class="c-pager__item c-pager__next">
                <a class="c-pager__link" href="/post/123">
                  <div class="c-pager__thumbwrap">
                    <figure class="c-pager__thumb">
                      <img width="150" height="150" src="/assets/img/top/news_thumb02.png" alt="">
                    </figure>
                  </div>
                  <div class="c-pager__meta">
                    <p class="c-pager__label">← 次の記事</p>
                    <p class="c-pager__title">協賛ユニフォームを頂きました！ダミーテキストダミーテキスト</p>
                  </div>
                </a>
              </div>

              <div class="c-pager__item c-pager__prev">
                <a class="c-pager__link" href="/post/45">
                  <div class="c-pager__meta">
                    <p class="c-pager__label">前の記事 →</p>
                    <p class="c-pager__title">新年のご挨拶ダミーテキストダミーテキストダミーテキスト</p>
                  </div>
                  <div class="c-pager__thumbwrap">
                    <figure class="c-pager__thumb">
                      <img width="150" height="150" src="/assets/img/top/news_thumb04.png" alt="">
                    </figure>
                  </div>
                </a>
              </div>
            </div>

          </article>
          <?php get_sidebar('post'); ?>
        </div>
      </div>
      <section class="p-news__recommend l-section">
        <div class="l-inner">
          <hgroup class="c-secondary-title">
            <h2 class="c-secondary-title__ja">関連記事</h2>
            <span class="c-secondary-title__en">Recommend</span>
          </hgroup>
          <ul class="l-grid l-grid--cards p-news__recommend-list">
            <li class="c-news" data-category="news">
              <a href="/news/single-news01/">
                <figure class="c-news__thumb">
                  <img src="/assets/img/top/news_thumb01.png" alt="" width="270" height="172" loading="lazy">
                </figure>
                <div class="c-news__body">
                  <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                  <h3 class="c-news__title">G.W.期間中の営業日のお知らせ</h3>
                  <p class="c-news__text">お知らせ1内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
                </div>
              </a>
            </li>
            <li class="c-news" data-category="news">
              <a href="/news/single-news01/">
                <figure class="c-news__thumb">
                  <img src="/assets/img/top/news_thumb02.png" alt="" width="270" height="172" loading="lazy">
                </figure>
                <div class="c-news__body">
                  <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                  <h3 class="c-news__title">協賛ユニフォームを頂きました！</h3>
                  <p class="c-news__text">お知らせ1内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
                </div>
              </a>
            </li>
            <li class="c-news" data-category="news">
              <a href="/news/single-news01/">
                <figure class="c-news__thumb">
                  <img src="/assets/img/top/news_thumb03.png" alt="" width="270" height="172" loading="lazy">
                </figure>
                <div class="c-news__body">
                  <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                  <h3 class="c-news__title">WS1000・BF1000発売開始について</h3>
                  <p class="c-news__text">お知らせ1内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
                </div>
              </a>
            </li>
            <li class="c-news" data-category="news">
              <a href="/news/single-news01/">
                <figure class="c-news__thumb">
                  <img src="/assets/img/top/news_thumb04.png" alt="" width="270" height="172" loading="lazy">
                </figure>
                <div class="c-news__body">
                  <span class="c-news__date"><time datetime="2025-04-10">2025.04.10</time></span>
                  <h3 class="c-news__title">新年のご挨拶</h3>
                  <p class="c-news__text">お知らせ1内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。内容の抜粋が入ります。</p>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </section>
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
<?php get_footer(); ?>