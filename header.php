<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <!-- meta情報 -->
  <!-- <title></title>
  <meta name="description" content="">
  <meta name="keywords" content=""> -->
  <!-- ogp -->
  <!-- <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content=""> -->
  <!-- ファビコン -->
  <link rel="shortcut icon" type="image/x-icon" href="">
  <!-- fontawesome -->
  <!-- <script src="https://kit.fontawesome.com/39d42e1acb.js" crossorigin="anonymous"></script> -->
  <!-- Googleフォント -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400..900&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- css -->
  <!-- <link rel="stylesheet" href="<?php echo esc_url(home_url()); ?>/assets/js/splide/splide.min.css">
  <link rel="stylesheet" href="<?php echo esc_url(home_url()); ?>/assets/css/style.css"> -->
  <script>
    console.log("")
  </script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <?php if (is_front_page()) : ?>
    <header id="header" class="l-header l-header--transparent js-header">
    <?php else : ?>
      <header id="header" class="l-header js-header">
      <?php endif; ?>

      <div class="l-header__inner">
        <!-- ロゴ -->
        <?php if (is_front_page()) : ?>
          <h1 class="l-header__logo">
          <?php else : ?>
            <div class="l-header__logo">
            <?php endif; ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
              <span class="l-header__logo">
                <img class="l-header__logo-img l-header__logo-img--white" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/common/logo-white.svg" alt="BAIRY" width="152" height="38">
                <img class="l-header__logo-img l-header__logo-img--black" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/common/logo-black.svg" alt="BAIRY" width="152" height="38">
              </span>
            </a>
            <?php if (is_front_page()) : ?>
          </h1>
        <?php else : ?>
      </div>
    <?php endif; ?>

    <!-- ヘッダーナビ -->
    <div class="l-header__container">
      <nav class="p-header-nav">
        <ul class="p-header-nav__list">
          <li class="p-header-nav__item">
            <a class="p-header-nav__link" href="<?php echo esc_url(home_url('/')); ?>">ホーム</a>
          </li>
          <li class="p-header-nav__item">
            <?php
            $href = is_front_page()
              ? '#business'
              : home_url('/#business');
            ?>
            <a class="p-header-nav__link" href="<?php echo esc_url($href); ?>">事業案内</a>
          </li>
          <li class="p-header-nav__item">
            <a class="p-header-nav__link" href="<?php echo esc_url(home_url('/corporate-sales/')); ?>">事業部紹介</a>
          </li>
          <li class="p-header-nav__item">
            <a class="p-header-nav__link" href="<?php echo esc_url(home_url('/company/')); ?>">会社概要</a>
          </li>
          <li class="p-header-nav__item">
            <a class="p-header-nav__link" href="<?php echo esc_url(home_url('/recruit/')); ?>">採用情報</a>
          </li>
          <li class="p-header-nav__item">
            <a class="p-header-nav__link" href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a>
          </li>
          <li class="p-header-nav__item">
            <a class="p-header-nav__link" href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a>
          </li>
        </ul>
      </nav>
      <div class="c-search l-header__search">
        <script async src="https://cse.google.com/cse.js?cx=6757d19abf2304aeb">
        </script>
        <div class="gcse-search"></div>
      </div>
    </div>
    <!-- ハンバーガーメニュー -->
    <button class="c-hamburger-btn js-header-btn" aria-label="メニューボタン" aria-expanded="false">
      <p class="c-hamburger-btn__text">MENU</p>
      <span class="c-hamburger-btn__inner">
        <span class="c-hamburger-btn__line"></span>
        <span class="c-hamburger-btn__line"></span>
        <span class="c-hamburger-btn__line"></span>
      </span>
    </button>
    </div>

    <!-- ハンバーガーメニュー内ナビ -->
    <nav class="p-sub-nav" aria-hidden="true">
      <div class="l-inner p-sub-nav__inner">
        <ul class="p-sub-nav__list">
          <li class="p-sub-nav__item">
            <p class="p-sub-nav__title"><a class="p-sub-nav__link" href="<?php echo esc_url(home_url('/')); ?>">ホーム</a></p>
          </li>
          <li class="p-sub-nav__item">
            <?php
            $href = is_front_page()
              ? '#business'
              : home_url('/#business');
            ?>
            <p class="p-sub-nav__title">
              <a class="p-sub-nav__link" href="<?php echo esc_url($href); ?>">事業案内</a>
            </p>
          </li>

          <li class="p-sub-nav__item">
            <p class="p-sub-nav__title"><a class="p-sub-nav__link" href="<?php echo esc_url(home_url('/corporate-sales/')); ?>">事業部紹介</a></p>
          </li>
          <li class="p-sub-nav__item">
            <p class="p-sub-nav__title"><a class="p-sub-nav__link" href="<?php echo esc_url(home_url('/company/')); ?>">会社概要</a></p>
          </li>
          <li class="p-sub-nav__item">
            <p class="p-sub-nav__title"><a class="p-sub-nav__link" href="<?php echo esc_url(home_url('/recruit/')); ?>">採用情報</a></p>
          </li>
          <li class="p-sub-nav__item">
            <p class="p-sub-nav__title"><a class="p-sub-nav__link" href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ</a></p>
          </li>
        </ul>
        <div class="p-sub-nav__btn-wrap">
          <a href="" target="_blank" rel="noopener noreferrer" class="p-sub-nav__btn p-sub-nav__btn--border">製品情報サイト BAIRY</a>
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="p-sub-nav__btn">お問い合わせ</a>
        </div>

      </div>
    </nav>
      </header>

      <?php if (is_front_page()) : ?>
        <main class="l-main l-main--top">
        <?php else : ?>
          <main class="l-main">
          <?php endif; ?>