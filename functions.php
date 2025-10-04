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
    'name'          => '制作実績一覧',   // メニューや見出しに表示される
    'singular_name' => '制作実績',
    'add_new'       => '新規追加',
    'add_new_item'  => '制作実績を追加',
    'edit_item'     => '制作実績を編集',
    'new_item'      => '新しい制作実績',
    'view_item'     => '制作実績を表示',
    'search_items'  => '制作実績を検索',
    'not_found'     => '制作実績はありません',
    'not_found_in_trash' => 'ゴミ箱に制作実績はありません',
    'all_items'     => '制作実績一覧',
    'menu_name'     => '制作実績一覧',   // サイドメニュー表記
    'name_admin_bar'=> '制作実績',
  ),
  'public' => true,
  'has_archive' => true,
  'menu_position' => 5,
  'menu_icon' => 'dashicons-portfolio',
  'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
  'rewrite' => array('slug' => 'works'),
  'taxonomies' => array('work_category'),
));
}
add_action('init', 'fuji_register_post_types');

// 制作実績カテゴリーを登録
function fuji_register_taxonomies() {
  register_taxonomy('work_category', 'works', array(
    'labels' => array(
      'name' => '制作実績カテゴリー',
      'singular_name' => '制作実績カテゴリー',
    ),
    'hierarchical' => true, // trueにすると通常のカテゴリ型
    'show_admin_column' => true,
    'show_ui' => true, // ★管理画面に表示
    'show_in_menu' => true, // ★左メニューに表示
    'rewrite' => array('slug' => 'work-category'),
  ));
}
add_action('init', 'fuji_register_taxonomies');

//アイキャッチon
//add_theme_support('post-thumbnails');
//制作実績のページのアイキャッチトリミング
//add_image_size('work-thumb', 1600, 900, true); // 16:9でトリミング
//add_image_size('work-card', 600, 338, true);   // 16:9でトリミング
add_action('after_setup_theme', function () {
  add_theme_support('post-thumbnails');
  add_image_size('work-thumb', 1600, 900, true); // 個別ページの16:9
  add_image_size('work-card', 600, 338, true);   // 関連カードの16:9
});

// OGPタグを出力する関数
function fuji_output_ogp_tags() {
  if (is_singular()) {
    global $post;

    // タイトル
    $og_title = get_the_title($post->ID);
    // URL
    $og_url = get_permalink($post->ID);

    // 本文から説明文を生成（120文字）
    if ( is_singular('works')){
    	$lead  = get_field('work_overview', $post->ID);
    	$desc  = $lead ?: wp_trim_words(strip_tags($post->post_content), 120);
    	$og_description = $desc;
    	
    }
    else {
    	$content = strip_tags( get_the_content(null, false, $post->ID) );
    	$content = trim( preg_replace('/\s+/', ' ', $content) );
    	$og_description = mb_substr($content, 0, 120);
    	if (mb_strlen($content) > 120) $og_description .= '...';
    }

    // アイキャッチ or デフォルト
    if (has_post_thumbnail($post->ID)) {
      if ( is_singular('works') ){
      	$og_image = get_the_post_thumbnail_url($post->ID, 'work-thumb');
      }
      else {
      	$og_image = get_the_post_thumbnail_url($post->ID, 'large');
      }
    } else {
      $og_image = get_template_directory_uri() . '/assets/img/ogp-default.png';
    }

  }
  else {
    // トップ・アーカイブ
    $og_title = get_bloginfo('name');
    $og_url = home_url();
    $og_description = get_bloginfo('description');
    $og_image = get_template_directory_uri() . '/assets/img/ogp-default.png';
  }

  ?>
  <!-- OGP -->
  <meta property="og:title" content="<?php echo esc_attr($og_title); ?>">
  <meta property="og:description" content="<?php echo esc_attr($og_description); ?>">
  <meta property="og:type" content="<?php echo is_singular() ? 'article' : 'website'; ?>">
  <meta property="og:url" content="<?php echo esc_url($og_url); ?>">
  <meta property="og:image" content="<?php echo esc_url($og_image); ?>">
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">

  <!-- Twitterカード -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo esc_attr($og_title); ?>">
  <meta name="twitter:description" content="<?php echo esc_attr($og_description); ?>">
  <meta name="twitter:image" content="<?php echo esc_url($og_image); ?>">
  <?php
}
add_action('wp_head', 'fuji_output_ogp_tags');

//プライバシーページのOGP
function fuji_soho_add_privacy_policy_ogp() {
  if (is_page('privacy-policy')) {
    ?>
    <!-- OGP for Privacy Policy -->
    <meta property="og:title" content="プライバシーポリシー | fuji-soho" />
    <meta property="og:description" content="fuji-soho のプライバシーポリシーページです。個人情報の取り扱いについてご説明します。" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>" />
    <meta property="og:site_name" content="fuji-soho" />
    <meta property="og:image" content="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/ogp-default.png" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="プライバシーポリシー | fuji-soho" />
    <meta name="twitter:description" content="fuji-soho のプライバシーポリシーページです。個人情報の取り扱いについてご説明します。" />
    <meta name="twitter:image" content="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/ogp-default.png" />
    <?php
  }
}
add_action('wp_head', 'fuji_soho_add_privacy_policy_ogp');

// パンくずリスト出力関数
function fuji_breadcrumb() {
  global $post;
  echo '<nav class="breadcrumb" aria-label="パンくずリスト">';
  echo '<a href="' . home_url() . '">
  <span class="breadcrumb-icon" aria-hidden="true">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
      <path d="M3 9l9-7 9 7"></path>
      <path d="M9 22V12h6v10"></path>
    </svg>
  </span>
  Home
</a> &gt; ';

  if (is_single()) {
    $categories = get_the_category($post->ID);
    if ($categories) {
      $cat = $categories[0];
      echo '<a href="' . get_category_link($cat->term_id) . '">' . $cat->name . '</a> &gt; ';
    }
    echo '<span>' . get_the_title() . '</span>';
  } elseif (is_page()) {
    if ($post->post_parent) {
      $parent = get_post($post->post_parent);
      echo '<a href="' . get_permalink($parent) . '">' . get_the_title($parent) . '</a> &gt; ';
    }
    echo '<span>' . get_the_title() . '</span>';
  } elseif (is_category()) {
    echo '<span>' . single_cat_title('', false) . '</span>';
  } elseif (is_archive()) {
    echo '<span>' . post_type_archive_title('', false) . '</span>';
  } elseif (is_search()) {
    echo '<span>検索結果: ' . get_search_query() . '</span>';
  }
  echo '</nav>';
}

// JSON-LD パンくずリスト
function fuji_breadcrumb_jsonld() {
  if (is_single() || is_page()) {
    global $post;
    $breadcrumbs = array();
    $position = 1;

    // Home
    $breadcrumbs[] = array(
      "@type" => "ListItem",
      "position" => $position++,
      "name" => "Home",
      "item" => home_url()
    );

    // カテゴリー（投稿の場合）
    if (is_single() && get_post_type() === 'post') {
      $categories = get_the_category($post->ID);
      if ($categories) {
        $cat = $categories[0];
        $breadcrumbs[] = array(
          "@type" => "ListItem",
          "position" => $position++,
          "name" => $cat->name,
          "item" => get_category_link($cat->term_id)
        );
      }
    }

    // 制作実績（カスタム投稿タイプ "works" の場合）
    if (is_singular('works') || is_post_type_archive('works')) {
        $breadcrumbs[] = array(
          "@type" => "ListItem",
          "position" => $position++,
          "name" => "制作実績一覧",  // ← 表示名を変更
          "item" => get_post_type_archive_link('works')
        );
    }

    // 最後に現在の記事
    $breadcrumbs[] = array(
      "@type" => "ListItem",
      "position" => $position++,
      "name" => get_the_title($post->ID),
      "item" => get_permalink($post->ID)
    );

    // JSON-LD 出力
    $jsonld = array(
      "@context" => "https://schema.org",
      "@type" => "BreadcrumbList",
      "itemListElement" => $breadcrumbs
    );

    echo '<script type="application/ld+json">' . wp_json_encode($jsonld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
  }
}
add_action('wp_head', 'fuji_breadcrumb_jsonld');

//ハニーポッド
function custom_honeypot_validation($result, $tag) {
  $tag = new WPCF7_FormTag($tag);
  $name = $tag->name;

  if ($name == 'hp-check-name') { // ← フィールド名を変更
    $value = isset($_POST[$name]) ? trim($_POST[$name]) : '';
    if ($value !== '') {
      $result->invalidate($tag, "入力に誤りがあります。");
    }
  }
  return $result;
}
add_filter('wpcf7_validate_text', 'custom_honeypot_validation', 10, 2);
add_filter('wpcf7_validate_text*', 'custom_honeypot_validation', 10, 2);

// 制作実績
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_work_detail',
    'title' => '制作実績詳細情報',
    'fields' => array(
        array(
            'key' => 'field_work_overview',
            'label' => '概要',
            'name' => 'work_overview',
            'type' => 'textarea',
            'instructions' => '制作実績のリード文（100文字程度）',
            'rows' => 3,
        ),
        array(
            'key' => 'field_work_challenges',
            'label' => '課題',
            'name' => 'work_challenges',
            'type' => 'textarea',
            'instructions' => '案件の課題や背景',
            'rows' => 4,
        ),
        array(
            'key' => 'field_work_solution',
            'label' => '解決アプローチ',
            'name' => 'work_solution',
            'type' => 'textarea',
            'instructions' => '課題に対してどう取り組んだか',
            'rows' => 4,
        ),
        array(
            'key' => 'field_work_result',
            'label' => '成果',
            'name' => 'work_result',
            'type' => 'textarea',
            'instructions' => '成果や効果（定量/定性どちらでもOK）',
            'rows' => 4,
        ),
        array(
            'key' => 'field_work_period',
            'label' => '制作期間',
            'name' => 'work_period',
            'type' => 'text',
            'instructions' => '例: 2025年1月〜3月（約3ヶ月）',
        ),
        array(
            'key' => 'field_work_scope',
            'label' => '担当範囲',
            'name' => 'work_scope',
            'type' => 'checkbox',
            'choices' => array(
                'requirements' => '要件定義',
                'frontend' => 'フロントエンド',
                'backend' => 'バックエンド',
                'infra' => 'インフラ',
                'design' => '設計/アーキテクチャ',
                'pm' => 'プロジェクト管理',
                'other' => 'その他',
            ),
            'layout' => 'vertical',
        ),
        array(
            'key' => 'field_work_tech',
            'label' => '使用技術',
            'name' => 'work_tech',
            'type' => 'checkbox',
            'choices' => array(
                'react' => 'React',
                'ts' => 'TypeScript',
                'nextjs' => 'Next.js',
                'node' => 'Node.js',
                'laravel' => 'PHP / Laravel',
                'wordpress' => 'WordPress',
                'aws' => 'AWS',
                'gcp' => 'GCP',
                'docker' => 'Docker',
                'mysql' => 'Mysql/MariaDB',
                'apache' => 'Apache',
                'git' => 'Git',
                'other' => 'その他',
            ),
            'layout' => 'vertical',
            'allow_custom' => 1, // ユーザーが自由に追加可
        ),
        
        array(
            'key' => 'field_work_pickup',
            'label' => 'ピックアップ',
            'name' => 'pickup',
            'type' => 'true_false',
            'instructions' => 'トップページや一覧で優先的に表示する場合はチェックしてください',
            'message' => 'トップに固定表示する',
            'default_value' => 0,
            'ui' => 1, // チェックボックスをトグル風に
        ),
        
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'works',
            ),
        ),
    ),
));

endif;

//タイトルの自動挿入
add_theme_support( 'title-tag' );

