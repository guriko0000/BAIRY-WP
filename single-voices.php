<?php get_header(); ?>
<section class="p-under-mv">
  <div class="l-inner">
    <div class="p-under-mv__title">
      <p class="ja">採用情報</p>
      <span class="en">Recruit</span>
    </div>
    <?php get_template_part('parts/breadcrumb'); ?>
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
          <div class="p-person__box">
            <dl class="p-person__head">
              <?php
              $field1 = get_field('staff_division');
              $field2 = get_field('staff_name');

              if ($field1 || $field2) : ?>
                <div class="p-person__head-row">
                  <dt class="p-person__head-title">Name</dt>
                  <dd class="p-person__head-data p-person__head-data--name">
                    <?php if ($field1) : ?>
                      <?php echo esc_html($field1); ?>
                      <?php endif; ?>　<?php if ($field2) : ?>
                      <?php echo esc_html($field2); ?>さん<?php endif; ?>
                  </dd>
                </div>
              <?php endif; ?>
              <?php if (get_field('staff_position')) { ?>
                <div class="p-person__head-row">
                  <dt class="p-person__head-title">position</dt>
                  <dd class="p-person__head-data"><?php echo get_field('staff_position'); ?></dd>
                </div>
              <?php } ?>
            </dl>
            <?php if (get_field('staff_text')) { ?>
              <div class="p-person__box-body">
                <p class="p-person__box-text"><?php echo get_field('staff_text'); ?></p>
              </div>
            <?php } ?>
          </div>

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