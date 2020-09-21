<?php
/**
 * tino functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tino
 */

if ( ! function_exists( 'tino_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tino_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on tino, use a find and replace
		 * to change 'tino' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tino', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'tino' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'tino_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'tino_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tino_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'tino_content_width', 640 );
}
add_action( 'after_setup_theme', 'tino_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tino_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tino' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tino_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tino_scripts() {
	wp_enqueue_style( 'tino-style', get_stylesheet_uri() );
	wp_enqueue_style( 'tino-min-css', get_template_directory_uri() . '/assets/css/main.min.css' );

	wp_enqueue_script( 'tino-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'tino-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'tino-main-min', get_template_directory_uri() . '/assets/js/main.min.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tino_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if( is_admin() && ! class_exists('Term_Meta_Image') ){

    add_action( 'admin_init', 'Term_Meta_Image_init' );
    function Term_Meta_Image_init(){
        $GLOBALS['Term_Meta_Image'] = new Term_Meta_Image();
    }

    class Term_Meta_Image {

        static $taxes = [];
        static $meta_key = '_thumbnail_id';
        static $attach_term_meta_key = 'img_term';
        static $add_img_url = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkAQMAAABKLAcXAAAABlBMVEUAAAC7u7s37rVJAAAAAXRSTlMAQObYZgAAACJJREFUOMtjGAV0BvL/G0YMr/4/CDwY0rzBFJ704o0CWgMAvyaRh+c6m54AAAAASUVORK5CYII=';

        public function __construct(){
            // once
            if( isset($GLOBALS['Term_Meta_Image']) )
                return $GLOBALS['Term_Meta_Image'];

            $taxes = self::$taxes ? self::$taxes : get_taxonomies( [ 'public' =>true ], 'names' );

            foreach( $taxes as $taxname ){
                add_action( "{$taxname}_add_form_fields",   [ $this, 'add_term_image' ],     10, 2 );
                add_action( "{$taxname}_edit_form_fields",  [ $this, 'update_term_image' ],  10, 2 );
                add_action( "created_{$taxname}",           [ $this, 'save_term_image' ],    10, 2 );
                add_action( "edited_{$taxname}",            [ $this, 'updated_term_image' ], 10, 2 );

                add_filter( "manage_edit-{$taxname}_columns",  [ $this, 'add_image_column' ] );
                add_filter( "manage_{$taxname}_custom_column", [ $this, 'fill_image_column' ], 10, 3 );
            }
        }

        public function add_term_image( $taxonomy ){
            wp_enqueue_media();

            add_action('admin_print_footer_scripts', [ $this, 'add_script' ], 99 );
            $this->css();
            ?>
            <div class="form-field term-group">
                <label><?php _e('Image', 'default'); ?></label>
                <div class="term__image__wrapper">
                    <a class="termeta_img_button" href="#">
                        <img src="<?php echo self::$add_img_url ?>" alt="">
                    </a>
                    <input type="button" class="button button-secondary termeta_img_remove" value="<?php _e( 'Remove', 'default' ); ?>" />
                </div>

                <input type="hidden" id="term_imgid" name="term_imgid" value="">
            </div>
            <?php
        }

        public function update_term_image( $term, $taxonomy ){
            wp_enqueue_media();

            add_action('admin_print_footer_scripts', [ $this, 'add_script' ], 99 );

            $image_id = get_term_meta( $term->term_id, self::$meta_key, true );
            $image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'thumbnail' ) : self::$add_img_url;
            $this->css();
            ?>
            <tr class="form-field term-group-wrap">
                <th scope="row"><?php _e( 'Image', 'default' ); ?></th>
                <td>
                    <div class="term__image__wrapper">
                        <a class="termeta_img_button" href="#">
                            <?php echo '<img src="'. $image_url .'" alt="">'; ?>
                        </a>
                        <input type="button" class="button button-secondary termeta_img_remove" value="<?php _e( 'Remove', 'default' ); ?>" />
                    </div>

                    <input type="hidden" id="term_imgid" name="term_imgid" value="<?php echo $image_id; ?>">
                </td>
            </tr>
            <?php
        }

        public function css(){
            ?>
            <style>
                .termeta_img_button{ display:inline-block; margin-right:1em; }
                .termeta_img_button img{ display:block; float:left; margin:0; padding:0; min-width:100px; max-width:150px; height:auto; background:rgba(0,0,0,.07); }
                .termeta_img_button:hover img{ opacity:.8; }
                .termeta_img_button:after{ content:''; display:table; clear:both; }
            </style>
            <?php
        }

        public function add_script(){

            $title = __('Featured Image', 'default');
            $button_txt = __('Set featured image', 'default');
            ?>
            <script>
                jQuery(document).ready(function($){
                    var frame,
                        $imgwrap = $('.term__image__wrapper'),
                        $imgid   = $('#term_imgid');

                    $('.termeta_img_button').click( function(ev){
                        ev.preventDefault();

                        if( frame ){ frame.open(); return; }

                        frame = wp.media.frames.questImgAdd = wp.media({
                            states: [
                                new wp.media.controller.Library({
                                    title:    '<?php echo $title ?>',
                                    library:   wp.media.query({ type: 'image' }),
                                    multiple: false,
                                    //date:   false
                                })
                            ],
                            button: {
                                text: '<?php echo $button_txt ?>',
                            }
                        });

                        frame.on('select', function(){
                            var selected = frame.state().get('selection').first().toJSON();
                            if( selected ){
                                $imgid.val( selected.id );
                                $imgwrap.find('img').attr('src', selected.sizes.thumbnail.url );
                            }
                        } );

                        frame.on('open', function(){
                            if( $imgid.val() ) frame.state().get('selection').add( wp.media.attachment( $imgid.val() ) );
                        });

                        frame.open();
                    });

                    $('.termeta_img_remove').click(function(){
                        $imgid.val('');
                        $imgwrap.find('img').attr('src','<?php echo self::$add_img_url ?>');
                    });
                });
            </script>

            <?php
        }

        public function add_image_column( $columns ){
            add_action( 'admin_notices', function(){
                echo '<style>.column-image{ width:50px; text-align:center; }</style>';
            });

            return array_slice( $columns, 0, 1 ) + [ 'image' =>'' ] + $columns;
        }

        public function fill_image_column( $string, $column_name, $term_id ){

            if( 'image' === $column_name && $image_id = get_term_meta( $term_id, self::$meta_key, 1 ) ){
                $string = '<img src="'. wp_get_attachment_image_url( $image_id, 'thumbnail' ) .'" width="50" height="50" alt="" style="border-radius:4px;" />';
            }

            return $string;
        }

        public function save_term_image( $term_id, $tt_id ){
            if( isset($_POST['term_imgid']) && $attach_id = (int) $_POST['term_imgid'] ){
                update_term_meta( $term_id,   self::$meta_key,             $attach_id );
                update_post_meta( $attach_id, self::$attach_term_meta_key, $term_id );
            }
        }

        public function updated_term_image( $term_id, $tt_id ){
            if( ! isset($_POST['term_imgid']) )
                return;

            $cur_term_attach_id = (int) get_term_meta( $term_id, self::$meta_key, 1 );

            if( $attach_id = (int) $_POST['term_imgid'] ){
                update_term_meta( $term_id,   self::$meta_key,             $attach_id );
                update_post_meta( $attach_id, self::$attach_term_meta_key, $term_id );

                if( $cur_term_attach_id != $attach_id )
                    wp_delete_attachment( $cur_term_attach_id );
            }
            else {
                if( $cur_term_attach_id )
                    wp_delete_attachment( $cur_term_attach_id );

                delete_term_meta( $term_id, self::$meta_key );
            }
        }

    }

}

function tino_posted_on() {

    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'F j, Y' ) ),
        esc_html( get_the_date('F j, Y') ),
        esc_attr( get_the_modified_date( 'F j, Y' ) ),
        esc_html( get_the_modified_date('F j, Y') )
    );

    $posted_on = sprintf('%s',
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span>';

}

register_nav_menus(array(
    'first column' => 'Первая колонка',
    'second column' => 'Вторая колонка',
    'third column' => 'Третья колонка',
    'forth column' => 'Четвертая колонка',
    'menu-lang' => 'Меню языков'
));

add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
function my_wp_nav_menu_args( $args='' ){
    $args['container'] = '';
    return $args;
}
function my_acf_init() {

    acf_update_setting('google_api_key', 'AIzaSyDTvL7Pzl7b6WUhtOZQiQg_tM-Zdp1PXrg');
}

add_action('acf/init', 'my_acf_init');


add_filter( 'get_search_form', 'my_search_form' );
function my_search_form( $form ) {

    $form = '
	<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
		<span class="icon-search"></span><input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Поиск"/>
	</form>';

    return $form;
}

function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID))
        return true;
    return false;
}
show_admin_bar(false);