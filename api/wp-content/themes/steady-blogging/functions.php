<?php
/**
 * steady Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package steady Lite
 */

if ( ! function_exists( 'steady_blogging_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function steady_blogging_setup() {
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on steady, use a find and replace
	 * to change 'steady-blogging' to the name of your theme in all the template files.
	 */
    load_theme_textdomain( 'steady-blogging', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true );
	add_image_size( 'steady-blogging-related', 200, 125, true ); //related

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'steady-blogging' ),
   ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
   ) );

	// Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'steady_blogging_custom_background_args', array(
    'default-color' => '#eee',
    'default-image' => '',
    ) ) );
}
endif;
add_action( 'after_setup_theme', 'steady_blogging_setup' );

function steady_blogging_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'steady_blogging_content_width', 678 );
}
add_action( 'after_setup_theme', 'steady_blogging_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function steady_blogging_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'steady-blogging' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
   ) );
}
add_action( 'widgets_init', 'steady_blogging_widgets_init' );

function steady_blogging_custom_sidebar() {
  $sidebar = 'sidebar';
  return $sidebar;
}

/**
 * Enqueue scripts and styles.
 */
function steady_blogging_scripts() {
	wp_enqueue_style( 'steady-blogging-style', get_stylesheet_uri() );
	$handle = 'steady-blogging-style';
  wp_enqueue_script( 'steady-blogging-customscripts-jquery', get_template_directory_uri() . '/js/customscripts.js',array('jquery'),'',true); 
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'steady_blogging_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/*
 * Excerpt
 */
function steady_blogging_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function steady_blogging_new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'steady_blogging_new_excerpt_more');
/*
 * Google Fonts
 */
function steady_blogging_fonts_url() {
  $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Monda, translate this to 'off'. Do not translate
    * into your own language.
    */
    $monda = _x( 'on', 'Monda font: on or off', 'steady-blogging' );

    if ( 'off' !== $monda ) {
      $font_families = array();

      if ( 'off' !== $monda ) {
        $font_families[] = urldecode('Roboto:300,400,500,700,900');
      }

      $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
            //'subset' => urlencode( 'latin,latin-ext' ),
        );

      $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
  }

  function steady_blogging_scripts_styles() {
    wp_enqueue_style( 'steady-blogging-fonts', steady_blogging_fonts_url(), array(), null );
  }
  add_action( 'wp_enqueue_scripts', 'steady_blogging_scripts_styles' );

/**
 * WP Mega Menu Plugin Support
 */
function steady_blogging_megamenu_parent_element( $selector ) {
  return '.primary-navigation .container';
}
add_filter( 'wpmm_container_selector', 'steady_blogging_megamenu_parent_element' );


/**
 * Post Layout for Archives
 */
if ( ! function_exists( 'steady_blogging_archive_post' ) ) {
    /**
     * Display a post of specific layout.
     * 
     * @param string $layout
     */
    function steady_blogging_archive_post( $layout = '' ) { 
     ?>
     <article class="post excerpt">

       <?php if ( has_post_thumbnail() ) { ?>
       <div class="post-blogs-container-thumbnails">
         <?php } else { ?>
         <div class="post-blogs-container">
           <?php } ?>

           <?php if ( empty($steady_blogging_full_posts) ) : ?>


           <?php if ( has_post_thumbnail() ) { ?>
           <div class="featured-thumbnail-container">
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" id="featured-thumbnail">
              <?php the_post_thumbnail('full'); ?>
           </a>
         </div>
         <div class="thumbnail-post-content">
          <?php } else { ?>
          <div class="nothumbnail-post-content">
            <?php } ?>


            <h2 class="title">
              <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a> 
            </h2>

            <span class="entry-meta">
              <?php echo esc_attr(get_the_date()); ?>
              <?php
              if ( is_sticky() && is_home() && ! is_paged() ) {
                printf( ' / <span class="sticky-text">%s</span>', esc_html( 'Sticky', 'steady-blogging' ) );
              } ?>
            </span>
            <div class="post-content">
              <?php echo esc_html(get_the_excerpt()); ?>
            </div>
          <?php else : ?>
        </div>
      </div>
    <?php endif; ?>

</article>
<?php }
}
