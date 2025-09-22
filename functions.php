<?php

function post_has_archive($args, $post_type)
{
  if ('post' == $post_type) {
    $args['rewrite'] = true;
    $args['has_archive'] = 'blog'; //URLとして使いたい文字列
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// 制作実績のカスタム投稿タイプを登録
function fuji_register_post_types() {
  register_post_type('works', array(
    'labels' => array(
      'name'          => '制作実績',
      'singular_name' => '制作実績',
      'add_new'       => '新規追加',
      'add_new_item'  => '制作実績を追加',
      'edit_item'     => '制作実績を編集',
      'new_item'      => '新しい制作実績',
      'view_item'     => '制作実績を表示',
      'search_items'  => '制作実績を検索',
      'not_found'     => '制作実績はありません',
    ),
    'public' => true,
    'has_archive' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-portfolio',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    'rewrite' => array('slug' => 'works'),
  ));
}
add_action('init', 'fuji_register_post_types');

//アイキャッチ
add_theme_support('post-thumbnails');
