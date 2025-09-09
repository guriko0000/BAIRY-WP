<?php

/* --------------------------------------------
 * scriptとcssを読み込む
 * -------------------------------------------- */
function my_theme_scripts(){

  wp_enqueue_style('spliide-css', get_theme_file_uri('/assets/js/splide/splide.min.css'));
  wp_enqueue_style('css', get_theme_file_uri('/assets/css/style.css'), ['spliide-css'], '1.0');
  wp_enqueue_style('custom-css', get_theme_file_uri('/assets/css/custom.css'), ['css'], '1.0');

  wp_enqueue_script('og_jquery', 'https://code.jquery.com/jquery-3.5.1.js', [], '3.5.1', true);
  wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js', ['og_jquery'], '', true);
  wp_enqueue_script('ScrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', ['gsap'], '', true);
  wp_enqueue_script('splied', get_theme_file_uri('/assets/js/splide/splide.min.js'), ['ScrollTrigger'], '', true);
  wp_enqueue_script('toppage', get_theme_file_uri('/assets/js/top.js'), ['splied'], '', true);
  wp_enqueue_script('allpage', get_theme_file_uri('/assets/js/common.js'), ['toppage'], '', true);
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

/* --------------------------------------------
 * トップページの投稿表示数変更
 * -------------------------------------------- */
function change_set_post($query)
{
  // 管理画面、メインクエリー以外には設定しない
  if (is_admin() || !$query->is_main_query()) {
    return;
  }
  //トップページの場合
  if ($query->is_front_page()) {
    $query->set('posts_per_page', '3');
    return;
  }
}
add_action('pre_get_posts', 'change_set_post');


/* --------------------------------------------
 * トップページ以外の投稿表示数変更
 * -------------------------------------------- */
function customize_query_display($query)
{
  if (is_admin() || !$query->is_main_query()) {
    return;
  }

  // ホームページの場合
  if ($query->is_home()) {
    $query->set('posts_per_page', 20);
  }

  // カテゴリーページの場合
  elseif ($query->is_category()) {
    $query->set('posts_per_page', 20);
  }

  // アーカイブページの場合
  elseif ($query->is_archive()) {
    $query->set('posts_per_page', 20);
  }
}

add_action('pre_get_posts', 'customize_query_display');


/* --------------------------------------------
 * デフォルト投稿の一覧ページ作成
 * -------------------------------------------- */
function post_has_archive($args, $post_type){
	if('post' == $post_type){
		$args['label'] = 'お知らせ';
	}
	return $args;
}
add_filter('register_post_type_args','post_has_archive',10,2);


/* --------------------------------------------
 * アイキャッチ画像を有効化
 * -------------------------------------------- */
function setup_post_thumnails(){
	add_theme_support('post-thumbnails', ['post','blog','faq','works',]);
}
add_action('after_setup_theme', 'setup_post_thumnails');


/* --------------------------------------------
 * 画像UP時デフォで画質90％になる設定を解除
 * -------------------------------------------- */
add_filter('jpeg_quality', function ($arg) {
  return 100;
  });


  /* --------------------------------------------
 * メディア画像を縮小させない
 * -------------------------------------------- */
add_filter("big_image_size_threshold", "__return_false");


/* --------------------------------------------
 * WordPressの情報を非表示にする
 * -------------------------------------------- */
remove_action('wp_head', 'wp_generator');// WordPressのバージョン
remove_action('wp_head', 'wp_shortlink_wp_head');// 短縮URLのlink
remove_action('wp_head', 'wlwmanifest_link');// ブログエディターのマニフェストファイル
remove_action('wp_head', 'rsd_link');// 外部から編集するためのAPI
remove_action('wp_head', 'feed_links_extra', 3);// フィードへのリンク
remove_action('wp_head', 'print_emoji_detection_script', 7);// 絵文字に関するJavaScript
remove_action('wp_head', 'rel_canonical');// カノニカル
remove_action('wp_print_styles', 'print_emoji_styles');// 絵文字に関するCSS
remove_action('admin_print_scripts', 'print_emoji_detection_script');// 絵文字に関するJavaScript
remove_action('admin_print_styles', 'print_emoji_styles');// 絵文字に関するCSS


/* --------------------------------------------
 * Contact Form 7の自動pタグ無効
 * -------------------------------------------- */
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
} 