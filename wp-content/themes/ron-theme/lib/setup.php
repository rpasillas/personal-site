<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

if ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/CMB2/init.php';
}


/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage'),
    'footer_navigation' => __('Footer Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  //add_editor_style(Assets\asset_path('styles/editor.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Footer Left', 'sage'),
    'id'            => 'sidebar-footer-1',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer Right', 'sage'),
    'id'            => 'sidebar-footer-3',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page(),
    is_page(),
    is_home(),
    is_single(),
  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);


function projects_custom_post_type() { 
  register_post_type( 'projects',
    array( 'labels' => array(
      'name' => 'Portfolio',
      'singular_name' => 'Portfolio Post',
      'all_items' => 'All Portfolio Posts',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Portfolio Post',
      'edit' => 'Edit',
      'edit_item' => 'Edit Portfolio Post',
      'new_item' => 'New Portfolio Post',
      'view_item' => 'View Portfolio Post',
      'search_items' => 'Search Portfolio Post',
      'not_found' =>  'Nothing found in the Database.',
      'not_found_in_trash' => 'Nothing found in Trash',
      'parent_item_colon' => ''
      ),
      'description' => 'Ron\'s portfolio of work.',
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 8,
      'menu_icon' => 'dashicons-portfolio',
      'rewrite' => array( 'slug' => 'projects', 'with_front' => false ),
      'has_archive' => 'projects',
      'capability_type' => 'post',
      'hierarchical' => false,
      'supports' => array( 'title', 'editor', 'thumbnail', 'sticky', 'excerpt')
    )
  );
  
  // register_taxonomy_for_object_type( 'category', 'projects' );
  register_taxonomy_for_object_type( 'post_tag', 'projects' );  
}
  
add_action( 'init', __NAMESPACE__ . '\\projects_custom_post_type');

register_taxonomy( 'project_tax', 
  array('projects'), 
  array('hierarchical' => true,
    'labels' => array(
      'name' => 'Project Categories',
      'singular_name' => 'Project Category',
      'search_items' =>  'Search Project Categories',
      'all_items' => 'All Project Categories',
      'parent_item' => 'Parent Project Category',
      'parent_item_colon' => 'Parent Project Category:',
      'edit_item' => 'Edit Project Category',
      'update_item' => 'Update Project Category',
      'add_new_item' => 'Add New Project Category',
      'new_item_name' => 'New Project Category Name'
    ),
    'show_admin_column' => true, 
    'show_ui' => true,
    'query_var' => true,
   // 'rewrite' => array( 'slug' => 'custom-slug' ),
  )
);

register_taxonomy( 'client_tax', 
  array('projects'), 
  array('hierarchical' => true,
    'labels' => array(
      'name' => 'Clients',
      'singular_name' => 'Client',
      'search_items' =>  'Search Clients',
      'all_items' => 'All Clients',
      'parent_item' => 'Parent Client',
      'parent_item_colon' => 'Parent Client:',
      'edit_item' => 'Edit Client',
      'update_item' => 'Update Client',
      'add_new_item' => 'Add New Client',
      'new_item_name' => 'New Client Name'
    ),
    'show_admin_column' => true, 
    'show_ui' => true,
    'query_var' => true,
   // 'rewrite' => array( 'slug' => 'custom-slug' ),
  )
);


/**
 * DIFFERENT BASE FILE FOR
 * HOME & PROJECTS CPT
 **/
add_filter('sage/wrap_base', __NAMESPACE__ . '\\sage_wrap_custom_base'); 
function sage_wrap_custom_base($templates) {
 
  $cpt = get_post_type(); // Get the current post type
  if ($cpt && is_singular($cpt) ) {
     array_unshift($templates, 'base-' . $cpt . '.php'); // Shift the template to the front of the array
  }

  if( is_front_page() ){
    array_unshift($templates, 'base-home.php');
  }

  return $templates; // Return our modified array with base-$cpt.php at the front of the queue
}




add_action( 'cmb2_admin_init',  __NAMESPACE__ . '\\project_metaboxes' );
function project_metaboxes() {
  $prefix = 'rp_proj_';


  $cmb_demo = new_cmb2_box( array(
    'id'            => $prefix . 'metabox',
    'title'         => 'Project Details',
    'object_types'  => array( 'projects' ), // Post type
  ) );

  $cmb_demo->add_field( array(
    'name' => 'Poster Image',
    'desc' => 'Upload an image or enter a URL.',
    'id'   => $prefix . '_poster_image',
    'type' => 'file',
  ) );

  $cmb_demo->add_field( array(
    'name' => 'Secondary',
    'desc' => 'Upload an image or enter a URL.',
    'id'   => $prefix . '_secondary_image',
    'type' => 'file',
  ) );


  $cmb_demo->add_field( array(
    'name'       => 'Project Link',
    'desc'       => 'Full URL to the project.',
    'id'         => $prefix . 'link',
    'type'       => 'text',
  ) );

  $cmb_demo->add_field( array(
    'name'       => 'Project Snippet',
    'desc'       => 'The little snippet that goes next to the title, like, A WordPress Site.',
    'id'         => $prefix . 'snippet',
    'type'       => 'text',
  ) );
  
  $cmb_demo->add_field( array(
    'name'       => 'Via',
    'desc'       => 'Typically the agency name the work was done through.',
    'id'         => $prefix . 'via',
    'type'       => 'text',
  ) );

  $cmb_demo->add_field( array(
    'name'       => 'Role',
    'desc'       => 'The role I performed on this project.',
    'id'         => $prefix . 'role',
    'type'       => 'text',
  ) );
  
  $cmb_demo->add_field( array(
    'name'       => 'Tools',
    'desc'       => 'Tools used on this project.',
    'id'         => $prefix . 'tools',
    'type'       => 'textarea_small',
  ) );
}


add_action( 'cmb2_admin_init',  __NAMESPACE__ . '\\theme_options' );
function theme_options() {
  $option_key = 'rp_options_';

  $cmb_options = new_cmb2_box( array(
    'id'       => $option_key . 'page',
    'title'    => 'Theme Options',
    'icon_url' => 'dashicons-palmtree',
    'show_on'  => array(
      'options-page' => $option_key,
    ),
  ) );
  
  $cmb_options->add_field( array(
    'name'       => 'Twitter Profile',
    'desc'       => 'Twitter URL',
    'id'         => $prefix . 'twitter',
    'type'       => 'text',
  ) );

  $cmb_options->add_field( array(
    'name'       => 'LinkedIn Profile',
    'desc'       => 'LinkedIn URL',
    'id'         => $prefix . 'linedin',
    'type'       => 'text',
  ) );

  $cmb_options->add_field( array(
    'name'       => 'GitHug Profile',
    'desc'       => 'GitHug URL',
    'id'         => $prefix . 'github',
    'type'       => 'text',
  ) );
}

function modify_read_more_link( $more ){
  global $post;
  return '&hellip;</p> <a href="' . get_permalink( $post->ID ) . '" class="read-more-link">Read</a>';
}
add_action('excerpt_more', __NAMESPACE__ . '\\modify_read_more_link');


function excerpt_length( $length ){
  return 20;
}
add_action('excerpt_length', __NAMESPACE__ . '\\excerpt_length');



//apply_filters('max_srcset_image_width', 3200, [3200,1000]);




function do_ga_analytics(){
   echo "<script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-26659910-1', 'auto');
          ga('send', 'pageview');
        </script>";
}
add_action('wp_head', __NAMESPACE__ . '\\do_ga_analytics');