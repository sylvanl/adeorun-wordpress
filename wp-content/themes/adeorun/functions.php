<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');

    // Add excerpt to pages
    add_post_type_support( 'page', 'excerpt' );
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    wp_enqueue_script('jquery');

    wp_register_script('materializeCDN', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js', array(), '1.0.0'); // materializeCDN
    wp_enqueue_script('materializeCDN'); // Enqueue it!
}

// Load HTML5 Blank conditional scripts
// function html5blank_conditional_scripts()
// {
//     if (is_page('pagenamehere')) {
//         wp_register_script('theme', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
//         wp_enqueue_script('theme'); // Enqueue it!
//     }
// }

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!

    wp_register_style('theme', get_template_directory_uri() . '/style/materialize.css', array(), '1.0', 'all');
    wp_enqueue_style('theme'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Footer area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Footer area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 3
    register_sidebar(array(
        'name' => __('Footer area 3', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-3',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 4
    register_sidebar(array(
        'name' => __('Footer area 4', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-4',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Add Admin bar
function remove_admin_bar()
{
    return true;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/


function create_post_type_html5()
{

  // CPT: Documentation
    register_post_type('Documentation', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Documentation', 'Documentation'), // Rename these to suit
            'singular_name' => __('Documentation', 'Documentation'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Ajouter une nouvelle documentation', 'html5blank'),
            'edit' => __('Editer', 'html5blank'),
            'edit_item' => __('Editer la documentation', 'html5blank'),
            'new_item' => __('Nouvelle documentation', 'html5blank'),
            'view' => __('Voir la documentation', 'html5blank'),
            'view_item' => __('Voir la documentation', 'html5blank'),
            'search_items' => __('Chercher la documentation', 'html5blank'),
            'not_found' => __("Il n'y a pas de documentation", 'html5blank'),
            'not_found_in_trash' => __('Pas de documentation trouvée dans la corbeille', 'html5blank')
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'menu_position' => 3,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'comments'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true // Allows export in Tools > Export
    ));

// CPT: Outils
    register_post_type('Outils', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Outils', 'Outils'), // Rename these to suit
            'singular_name' => __('Outils', 'Outils'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Ajouter un nouvel outil', 'html5blank'),
            'edit' => __('Editer', 'html5blank'),
            'edit_item' => __('Editer les outils', 'html5blank'),
            'new_item' => __('Nouvel outil', 'html5blank'),
            'view' => __('Voir les outils', 'html5blank'),
            'view_item' => __("Voir l'outil", 'html5blank'),
            'search_items' => __('Chercher dans les outils', 'html5blank'),
            'not_found' => __("Il n'y a pas d'outils", 'html5blank'),
            'not_found_in_trash' => __("Pas d'outils trouvés dans la corbeille", 'html5blank')
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'menu_position' => 5,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true
    ));

    // CPT: Evenements
        register_post_type('Evenements', // Register Custom Post Type
            array(
            'labels' => array(
                'name' => __('Evenements', 'Evenements'), // Rename these to suit
                'singular_name' => __('Evenement', 'Evenements'),
                'add_new' => __('Ajouter', 'html5blank'),
                'add_new_item' => __('Ajouter un évènement', 'html5blank'),
                'edit' => __('Editer', 'html5blank'),
                'edit_item' => __("Editer l'évènement", 'html5blank'),
                'new_item' => __('Nouvel évènement', 'html5blank'),
                'view' => __('Voir les évènements', 'html5blank'),
                'view_item' => __("Voir l'évènement", 'html5blank'),
                'search_items' => __('Chercher dans les évènements', 'html5blank'),
                'not_found' => __("Il n'y a pas d'évènements", 'html5blank'),
                'not_found_in_trash' => __("Pas d'évènements trouvés dans la corbeille", 'html5blank')
            ),
            'public' => true,
            'show_ui' => true,
            'menu_position' => 5,
            'show_in_rest' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true
        ));
}

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

/*------------------------------------*\
	Options page (ACF)
\*------------------------------------*/

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Paramètres du thème',
		'menu_title'	=> 'Paramètres',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Paramètres du header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
		'page_title' 	=> 'Paramètres du blog',
		'menu_title'	=> 'Blog',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Paramètres du footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
}

// CPT: Outils






//========================= Tags for Documentation Custom Type ===========================//

//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
function documentation_tags_taxonomy() {
// Labels part for the GUI

  $documentation_tags = array(
    'name' => _x( 'Documentation Tags', 'documentation' ),
    'singular_name' => _x( 'Documentation Tag', 'documentation' ),
    'search_items' =>  __( 'Search Documentation Tags' ),
    'popular_items' => __( 'Popular Documentation Tags' ),
    'all_items' => __( 'All Documentation Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Documentation Tag' ),
    'update_item' => __( 'Update Documentation Tag' ),
    'add_new_item' => __( 'Add New Documentation Tag' ),
    'new_item_name' => __( 'New Documentation Tag Name' ),
    'separate_items_with_commas' => __( 'Separate Documentation tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove Documentation tags' ),
    'choose_from_most_used' => __( 'Choose from the most used Documentation tags' ),
    'menu_name' => __( 'Documentation Tags' ),
  );

// Now register the non-hierarchical taxonomy like tag. . Replace the parameter portfolios withing the array by the name of your custom post type.
  register_taxonomy('documentation_tags','documentation',array(
    'hierarchical' => true,
    'labels' => $documentation_tags,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'documentation_tags' ),
  ));
}
add_action( 'init', 'documentation_tags_taxonomy', 0 );




//========================= Tags for Outils Custom Type ===========================//

//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
function outil_tags_taxonomy() {
// Labels part for the GUI

  $outil_tags = array(
    'name' => _x( 'Catégories outil', 'outil' ),
    'singular_name' => _x( 'Catégorie outil', 'outil' ),
    'search_items' =>  __( 'Chercher des catégories' ),
    'popular_items' => __( 'Catégories populaires' ),
    'all_items' => __( 'Toutes les catégories' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editer la catégorie' ),
    'update_item' => __( 'Mettre à jour' ),
    'add_new_item' => __( 'Ajouter une catégorie' ),
    'new_item_name' => __( 'Nouvelle documentation sur la catégorie' ),
    'separate_items_with_commas' => __( 'Séparer les catégories avec des virgules' ),
    'add_or_remove_items' => __( 'Ajouter ou retirer des catégories' ),
    'choose_from_most_used' => __( 'Choisir parmi les plus utilisées' ),
    'menu_name' => __( 'Catégories Outil' ),
  );

// Now register the non-hierarchical taxonomy like tag. . Replace the parameter portfolios withing the array by the name of your custom post type.
  register_taxonomy('outil_tags','outil',array(
    'hierarchical' => true,
    'labels' => $outil_tags,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'outil_tags' ),
  ));
}
add_action( 'init', 'outil_tags_taxonomy', 0 );



//========================= Tags for Evenements Custom Type ===========================//

//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
function evenement_tags_taxonomy() {
// Labels part for the GUI

  $evenement_tags = array(
    'name' => _x( "Types d'évènement", 'evenements' ),
    'singular_name' => _x( 'Type événement', 'evenements' ),
    'search_items' =>  __( "Chercher des types d'événements" ),
    'popular_items' => __( "Types d'évènement populaires" ),
    'all_items' => __( "Toutes les types d'évènement" ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editer la catégorie' ),
    'update_item' => __( 'Mettre à jour' ),
    'add_new_item' => __( 'Ajouter une catégorie' ),
    'new_item_name' => __( 'Nouvelle documentation sur la catégorie' ),
    'separate_items_with_commas' => __( 'Séparer les catégories avec des virgules' ),
    'add_or_remove_items' => __( 'Ajouter ou retirer des catégories' ),
    'choose_from_most_used' => __( 'Choisir parmi les plus utilisées' ),
    'menu_name' => __( "Types d'évènement" ),
  );

// Now register the non-hierarchical taxonomy like tag. . Replace the parameter portfolios withing the array by the name of your custom post type.
  register_taxonomy('evenement_tags','evenements',array(
    'hierarchical' => true,
    'labels' => $evenement_tags,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'evenement_tags' ),
  ));
}
add_action( 'init', 'evenement_tags_taxonomy', 0 );


// Test Gravity Form: Repeater field
// Adjust your form ID
add_filter( 'gform_form_post_get_meta_2', 'add_my_field' );
function add_my_field( $form ) {

    // Create a Single Line text field for the team member's name
    $name = GF_Fields::create( array(
        'type'   => 'text',
        'id'     => 1001, // The Field ID must be unique on the form
        'formId' => $form['id'],
        'label'  => 'Nom du circuit',
        'pageNumber'  => 1, // Ensure this is correct
    ) );

    // Create an email field for the team member's email address
    $distance = GF_Fields::create( array(
        'type'   => 'number',
        'id'     => 1001, // The Field ID must be unique on the form
        'formId' => $form['id'],
        'label'  => 'Distance (en km)',
        'pageNumber'  => 1, // Ensure this is correct
    ) );

    // Create an email field for the team member's email address
    $price = GF_Fields::create( array(
        'type'   => 'number',
        'id'     => 1002, // The Field ID must be unique on the form
        'formId' => $form['id'],
        'label'  => "Prix d'inscrption",
        'pageNumber'  => 3, // Ensure this is correct
    ) );

    // Create an email field for the team member's email address
    $runners = GF_Fields::create( array(
        'type'   => 'number',
        'id'     => 1003, // The Field ID must be unique on the form
        'description' => 'Laisser vide si illimité',
        'formId' => $form['id'],
        'label'  => 'Nombre de coureurs maximum',
        'pageNumber'  => 1, // Ensure this is correct
    ) );

    // Create an email field for the team member's email address
    $infos = GF_Fields::create( array(
        'type'   => 'text',
        'id'     => 1004, // The Field ID must be unique on the form
        'formId' => $form['id'],
        'label'  => 'Informations diverses',
        'pageNumber'  => 1, // Ensure this is correct
    ) );

    // Create a repeater for the team members and add the name and email fields as the fields to display inside the repeater.
    $circuit = GF_Fields::create( array(
        'type'             => 'repeater',
        'description'      => '',
        'id'               => 1010, // The Field ID must be unique on the form
        'formId'           => $form['id'],
        'addButtonText'    => 'Ajouter un circuit', // Optional
        'removeButtonText' => 'Retirer un circuit', // Optional
        'pageNumber'       => 1, // Ensure this is correct
        'fields'           => array( $name, $distance, $price, $runners, $infos ), // Add the fields here.
    ) );

    $form['fields'][] = $circuit;

    return $form;
}

// Remove the field before the form is saved. Adjust your form ID
add_filter( 'gform_form_update_meta_2', 'remove_my_field', 10, 3 );
function remove_my_field( $form_meta, $form_id, $meta_name ) {

    if ( $meta_name == 'display_meta' ) {
        // Remove the Repeater field: ID 1010
        $form_meta['fields'] = wp_list_filter( $form_meta['fields'], array( 'id' => 1010 ), 'NOT' );
    }

    return $form_meta;
}
