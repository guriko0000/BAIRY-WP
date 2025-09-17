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

if ( is_front_page() ) {
  wp_enqueue_script('toppage', get_theme_file_uri('/assets/js/top.js'), ['splied'], '', true);
  }

  wp_enqueue_script('allpage', get_theme_file_uri('/assets/js/common.js'), [], '', true);
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
    $query->set('posts_per_page', '16');
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
    $query->set('posts_per_page', 2);
  }

  // カテゴリーページの場合
  elseif ($query->is_category()) {
    $query->set('posts_per_page', 10);
  }

  // アーカイブページの場合
  elseif ($query->is_archive()) {
    $query->set('posts_per_page', 10);
  }

    //採用情報アーカイブ
  if ( $query->is_post_type_archive('jobs') ) {
    $query->set( 'posts_per_page', '2' );
  }
}

add_action('pre_get_posts', 'customize_query_display');

/* --------------------------------------------
 * taxonomyページの表示件数を設定
 * -------------------------------------------- */
function  my_pre_get_posts2( $query ) {
  if ( is_admin() || ! $query->is_main_query() )
  return;

  if($query->is_tax('jobs-type')){
    $query->set('posts_per_page',1);// 7件
  }
  elseif($query->is_tax('jobs-salary')){
    $query->set('posts_per_page',7);// 7件
  }
  elseif($query->is_tax('jobs-area')){
    $query->set('posts_per_page',7);// 7件
  }
  elseif($query->is_tax('works-cate')){
    $query->set('posts_per_page',27);// 27件
  }
}

add_action('pre_get_posts','my_pre_get_posts2');


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
	add_theme_support('post-thumbnails', ['post','jobs','voices',]);
}
add_action('after_setup_theme', 'setup_post_thumnails');


/* --------------------------------------------
 * お知らせ投稿サムネイルサイズ
 * -------------------------------------------- */
add_image_size('news-archive-thumb', 540, 344, true); 
add_image_size('news-single-thumb', 890, 570, true); 

/* --------------------------------------------
 * カスタム投稿タイプ【採用情報】
 * -------------------------------------------- */
function cpt_register_jobs(){
	$args = [
		'label' => '採用情報',
		'labels' => [
			'singular_name' => '採用情報',
			'edit_item' => '採用情報を編集',
			'add_new_item' => '新規採用情報を追加',
		],
		'public' => true, //カスタム投稿タイプを一般に公開するかどうか
		'show_in_rest' => true, //REST APIにカスタム投稿タイプを含めるかどうか → カスタム投稿タイプでブロックエディタを使うならtrue
		'has_archive' => true, //アーカイブページを持つかどうか
    'rewrite' => ['slug' => 'jobs', 'with_front' => false], // 一覧URL: /jobs/
		'delete_with_user' => false, //ユーザーを削除した後、コンテンツも削除するかどうか
		'exclude_from_search' => false, //検索から除外するかどうか
		'hierarchical' => false, //階層化するかどうか
		'query_var' => true, //クエリパラメーターを使えるようにする → プレビュー画面を使うためにはtrue
		'menu_position' => 5, //管理画面に表示するメニューの位置
		'supports' => [
			'title', 'editor', 'thumbnail', 'custom-fields'
		], //カスタム投稿タイプがサポートする機能
	];
	register_post_type('jobs', $args);
}
add_action('init', 'cpt_register_jobs');

//  * ターム（業種）【採用情報】
function tax_register_jobs_type(){
	$args = [
		'label' => '業種',
		'labels' => [
			'singular_name' => '業種',
			'edit_item' => '業種を編集',
			'add_new_item' => '新規業種を追加'
		],
		'hierarchical' => true, //階層化するかどうか（カテゴリー的に使うならtrue、タグ的に使うならfalse）
		'query_var' => true, //クエリパラメーターを使えるようにする
		'show_in_rest' => true, //REST APIにカスタムタクソノミーを含めるかどうか、グーテンベルクのブロックエディターで分類を使用するにはtrue
	];
	register_taxonomy('jobs-type', 'jobs', $args);
}
add_action('init', 'tax_register_jobs_type');

//  * ターム（給与）【採用情報】
function tax_register_jobs_salary(){
	$args = [
		'label' => '給与',
		'labels' => [
			'singular_name' => '給与',
			'edit_item' => '給与を編集',
			'add_new_item' => '新規給与を追加'
		],
		'hierarchical' => true, //階層化するかどうか（カテゴリー的に使うならtrue、タグ的に使うならfalse）
		'query_var' => true, //クエリパラメーターを使えるようにする
		'show_in_rest' => true, //REST APIにカスタムタクソノミーを含めるかどうか、グーテンベルクのブロックエディターで分類を使用するにはtrue    
	];
	register_taxonomy('jobs-salary', 'jobs', $args);
}
add_action('init', 'tax_register_jobs_salary');

//  * ターム（勤務地）【採用情報】
function tax_register_jobs_area(){
	$args = [
		'label' => '勤務地',
		'labels' => [
			'singular_name' => '勤務地',
			'edit_item' => '勤務地を編集',
			'add_new_item' => '新規勤務地を追加'
		],
		'hierarchical' => true, //階層化するかどうか（カテゴリー的に使うならtrue、タグ的に使うならfalse）
		'query_var' => true, //クエリパラメーターを使えるようにする
		'show_in_rest' => true //REST APIにカスタムタクソノミーを含めるかどうか、グーテンベルクのブロックエディターで分類を使用するにはtrue
	];
	register_taxonomy('jobs-area', 'jobs', $args);
}
add_action('init', 'tax_register_jobs_area');


/* --------------------------------------------
 * シングルを /jobs/{ID}/ にする
 * -------------------------------------------- */
// add_filter('post_type_link', function($permalink, $post){
//   if ($post->post_type === 'jobs') {
//     // 詳細URLを /jobs/{ID}/ に固定
//     return home_url( user_trailingslashit('jobs/' . $post->ID) );
//   }
//   return $permalink;
// }, 10, 2);

// add_action('init', function(){
//   // /jobs/123/ → post_type=jobs のID=123へ解決
//   add_rewrite_rule(
//     '^jobs/([0-9]+)/?$',
//     'index.php?post_type=jobs&p=$matches[1]',
//     'top'
//   );
// });


/* --------------------------------------------
 * カスタム投稿タイプ【社員の声】
 * -------------------------------------------- */
function cpt_register_voices(){
	$args = [
		'label' => '社員の声',
		'labels' => [
			'singular_name' => '社員の声',
			'edit_item' => '社員の声を編集',
			'add_new_item' => '新規社員の声を追加'
		],

		'public' => true, //カスタム投稿タイプを一般に公開するかどうか
		'show_in_rest' => true, //REST APIにカスタム投稿タイプを含めるかどうか → カスタム投稿タイプでブロックエディタを使うならtrue
		'has_archive' => true, //アーカイブページを持つかどうか
    'rewrite' => ['slug' => 'voices', 'with_front' => false],
		'delete_with_user' => false, //ユーザーを削除した後、コンテンツも削除するかどうか
		'exclude_from_search' => false, //検索から除外するかどうか
		'hierarchical' => false, //階層化するかどうか
		'query_var' => true, //クエリパラメーターを使えるようにする → プレビュー画面を使うためにはtrue
		'menu_position' => 5, //管理画面に表示するメニューの位置
		'supports' => [
			'title', 'editor', 'thumbnail', 'custom-fields'
		], //カスタム投稿タイプがサポートする機能
	];
	register_post_type('voices', $args);
}
add_action('init', 'cpt_register_voices');

//  * ターム（業種）【社員の声】
function tax_register_voices_type(){
	$args = [
		'label' => '社員の声業種',
		'labels' => [
			'singular_name' => '社員の声業種',
			'edit_item' => '社員の声業種を編集',
			'add_new_item' => '新規社員の声業種を追加'
		],
		'hierarchical' => true, //階層化するかどうか（カテゴリー的に使うならtrue、タグ的に使うならfalse）
		'query_var' => true, //クエリパラメーターを使えるようにする
		'show_in_rest' => true //REST APIにカスタムタクソノミーを含めるかどうか、グーテンベルクのブロックエディターで分類を使用するにはtrue
	];
	register_taxonomy('voices-type', 'voices', $args);
}
add_action('init', 'tax_register_voices_type');


/* --------------------------------------------
 * シングルを /voices/{ID}/ にする
 * -------------------------------------------- */
// add_filter('post_type_link', function($permalink, $post){
//   if ($post->post_type === 'voices') {
//     // 詳細URLを /voices/{ID}/ に固定
//     return home_url( user_trailingslashit('voices/' . $post->ID) );
//   }
//   return $permalink;
// }, 10, 2);

// add_action('init', function(){
//   // /voices/123/ → post_type=voices のID=123へ解決
//   add_rewrite_rule(
//     '^voices/([0-9]+)/?$',
//     'index.php?post_type=voices&p=$matches[1]',
//     'top'
//   );
// });



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
 * snowmonkey form投稿タイトル取得
 * -------------------------------------------- */
add_filter(
	'snow_monkey_forms/control/attributes',
	function( $attributes ) {
		if ( isset( $attributes['name'] ) && 'title' === $attributes['name'] ) {
			$post_id = filter_input(INPUT_GET, 'post_id', FILTER_VALIDATE_INT);

			if ( ! is_null( $post_id ) ) {
				$attributes['value'] = get_the_title( $post_id );
			}
		}
		return $attributes;
	}
);


/* --------------------------------------------
 * ACFブロック
 * -------------------------------------------- */
if ( function_exists( 'acf_custom_block_add' ) ) {
	add_action( 'acf/init', 'acf_custom_block_add' );
}

/**
 * カスタムブロックカテゴリーの登録
 */
add_filter('block_categories_all', function ($categories) {
  $new_category = [
      'slug' => 'custom-layout-category',
      'title' => 'ACFブロック',
  ];
  
  // Insert the new category at the second position
  array_splice($categories, 1, 0, [$new_category]);
  
  return $categories;
});



/**
 * カスタムブロックの登録
 */
function acf_custom_block_add() {

  if ( function_exists( 'acf_register_block_type' ) ) {

    
  /* 社員プロフィール*/
  acf_register_block_type(
    array(
    'name'            => 'staff-profile', 
    'title'           => __( '社員プロフィール' ), 
    'description'     => __( '社員プロフィールです。' ), 
    'render_template' => 'acf-blocks/acf-block/staff-profile-block.php', 
    'category'        => 'custom-layout-category',
    'icon'            => 'media-default', 
    'keywords'        => array( '社員プロフィール' ), 
    'enqueue_style'   => get_template_directory_uri() . '/assets/css/acf-block.css',
    'mode'            => 'auto', //どのエリアにブロック入力欄を表示させるか
    )
);

  /* インタビューブロック*/
  acf_register_block_type(
    array(
    'name'            => 'interview', 
    'title'           => __( 'インタビュー' ), 
    'description'     => __( 'インタビューです。' ), 
    'render_template' => 'acf-blocks/acf-block/interview-block.php', 
    'category'        => 'custom-layout-category',
    'icon'            => 'media-default', 
    'keywords'        => array( 'インタビュー' ), 
    'enqueue_style'   => get_template_directory_uri() . '/assets/css/acf-block.css',
    'mode'            => 'auto', //どのエリアにブロック入力欄を表示させるか
    )
);

  
  /* ボタンセンターブロック*/
  acf_register_block_type(
    array(
    'name'            => 'btn-center-block', 
    'title'           => __( 'ボタン(センター)' ), 
    'description'     => __( 'ボタン(センター)です。' ), 
    'render_template' => 'acf-blocks/acf-block/btn-center-block.php', 
    'category'        => 'custom-layout-category',
    'icon'            => 'button', 
    'keywords'        => array( 'ボタン','ボタンセンター' ), 
    'enqueue_style'   => get_template_directory_uri() . '/assets/css/acf-block.css',
    'mode'            => 'auto', //どのエリアにブロック入力欄を表示させるか
    )
);


  /* 吹き出しコメント*/
  acf_register_block_type(
    array(
    'name'            => 'message-block', 
    'title'           => __( '吹き出しメッセージ' ), 
    'description'     => __( '吹き出しメッセージです。' ), 
    'render_template' => 'acf-blocks/acf-block/message-block.php', 
    'category'        => 'custom-layout-category',
    'icon'            => 'button', 
    'keywords'        => array( '吹き出し','メッセージ','吹き出しメッセージ' ), 
    'enqueue_style'   => get_template_directory_uri() . '/assets/css/acf-block.css',
    'mode'            => 'auto', //どのエリアにブロック入力欄を表示させるか
    )
);
  




  }
}