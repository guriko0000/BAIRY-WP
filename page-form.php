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

<div class="p-recruit l-section l-section--full">
  <div class="l-inner">
    <div class="c-choice">
      <div class="c-choice__head">
        <p class="c-choice__title">選択中の求人</p>
        <p class="c-choice__title">【リーダー候補】自社PBの販売代理店向け営業</p>
        <p class="c-choice__text">説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。説明が入ります。</p>
      </div>
      <div class="c-choice__bottom">
        <ul class="c-choice__tag-list">
          <li class="c-choice__tag-item">
            <span class="c-choice__tag">業種</span>
            <span class="c-choice__tag-text">代理店営業</span>
          </li>
          <li class="c-choice__tag-item">
            <span class="c-choice__tag">給与</span>
            <span class="c-choice__tag-text">月給000,000 - 000.000円</span>
          </li>
          <li class="c-choice__tag-item">
            <span class="c-choice__tag">勤務地</span>
            <span class="c-choice__tag-text">福岡県</span>
          </li>
        </ul>
      </div>



      <p>test</p>
<?php
$post_id = filter_input(INPUT_GET, 'post_id', FILTER_VALIDATE_INT);

if ($post_id) {
  // タイトル
  $post_title = get_the_title($post_id);
  echo '<h3>問い合わせ内容: ' . esc_html($post_title) . '</h3>';

  // 概要（ACF: recruit_summary）— タイトルの直下に表示
  $summary = get_field('recruit_summary', $post_id);
  if (!empty($summary)) {
    echo '<p class="recruit-summary">' . esc_html($summary) . '</p>';
  }

  // 表示したいタクソノミー一覧（スラッグ => 表示ラベル）
  $taxonomies = [
    'jobs-type'   => '募集区分',
    'jobs-salary' => '給与',
    'jobs-area'   => '地域',
  ];

  foreach ($taxonomies as $tx => $label) {
    $terms = get_the_terms($post_id, $tx);
    if (is_wp_error($terms) || empty($terms)) {
      continue;
    }
    foreach ($terms as $term) {
      echo '<div>';
      echo '<span class="cate">' . esc_html($label) . '</span>';
      echo '<span class="text">' . esc_html($term->name) . '</span>';
      echo '</div>';
    }
  }
}
?>

    </div>



    <div class="c-form">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>

  </div>
</div>

<?php get_template_part('parts/parts-info'); ?>
<?php get_footer(); ?>