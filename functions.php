<?php

// show array organizedly starts
function showr($vvv)
{
    print("<pre>" . print_r($vvv, true) . "</pre>");
}

// show array organizedly ends


// get feature image field starts
function theme_setup()
{
    add_theme_support('post-thumbnails');
}
add_action('init', 'theme_setup');

// get feature image field ends


// Make Custom post type setting in menu WP starts
function create_posttype()
{
    register_post_type(
        'services',
        array(
            'labels' => array(
                'name' => __('services'),
                'singular_name' => __('Services')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'services'),
        )
    );
    register_post_type(
        'publish',
        array(
            'labels' => array(
                'name' => __('publish'),
                'singular_name' => __('Publish')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'publish'),
        )
    );
}
add_action('init', 'create_posttype');
// Make Custom post type setting in menu WP ends


// Add neccessary field to CPT Services starts
function cw_post_type_services()
{
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        'post-formats', // post formats
    );
    $labels = array(
        'name' => _x('サービス', 'plural'),
        'singular_name' => _x('Post Services', 'singular'),
        'menu_name' => _x('Post Services', 'admin menu'),
        'name_admin_bar' => _x('services', 'admin bar'),
        'add_new' => _x('Add New', 'add new'),
        'add_new_item' => __('Add New services'),
        'new_item' => __('New services'),
        'edit_item' => __('Edit services'),
        'view_item' => __('View services'),
        'all_items' => __('All services'),
        'search_items' => __('Search services'),
        'not_found' => __('No services found.'),
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'services'),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5
    );
    register_post_type('services', $args);
}
add_action('init', 'cw_post_type_services');
// Add neccessary field to CPT Services ends


// Add neccessary field to CPT Publish starts
function cw_post_type_publish()
{
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        'post-formats', // post formats
    );
    $labels = array(
        'name' => _x('出版物', 'plural'),
        'singular_name' => _x('Post Publish', 'singular'),
        'menu_name' => _x('Post Publish', 'admin menu'),
        'name_admin_bar' => _x('publish', 'admin bar'),
        'add_new' => _x('Add New', 'add new'),
        'add_new_item' => __('Add New publish'),
        'new_item' => __('New publish'),
        'edit_item' => __('Edit publish'),
        'view_item' => __('View publish'),
        'all_items' => __('All publish'),
        'search_items' => __('Search publish'),
        'not_found' => __('No publish found.'),
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'publish'),
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5
    );
    register_post_type('publish', $args);
}
add_action('init', 'cw_post_type_publish');
// Add neccessary field to CPT Publish ends


function my_validation_rule($Validation)
{
    $Validation->set_rule('電話番号', 'tel', array(
        'message' => '電話番号の形式ではありません。'
    ));
    return $Validation;
}
add_filter('mwform_validation_mw-wp-form-461', 'my_validation_rule');


/**
 * Add custom taxonomies
 */
function add_custom_taxonomies()
{
    // Add new "Locations" taxonomy to Posts
    register_taxonomy('service-taxonomy', 'services', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels' => array(
            'name' => _x('Service-taxonomy', 'taxonomy general name'),
            'singular_name' => _x('Service-taxonomy', 'taxonomy singular name'),
            'search_items' =>  __('Search Service-taxonomy'),
            'all_items' => __('All Service-taxonomy'),
            'parent_item' => __('Parent Service-taxonomy'),
            'parent_item_colon' => __('Parent Service-taxonomy:'),
            'edit_item' => __('Edit Service-taxonomy'),
            'update_item' => __('Update Service-taxonomy'),
            'add_new_item' => __('Add New Service-taxonomy'),
            'new_item_name' => __('New Service-taxonomy Name'),
            'menu_name' => __('Service-taxonomy'),
        ),
        // Control the slugs used for this taxonomy
        'rewrite' => array(
            'slug' => 'service-taxonomy', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
    ));
}
add_action('init', 'add_custom_taxonomies', 0);


function x_filter_by_category($query)
{
    if ($query->is_home() && $query->is_main_query() && isset($_GET['checkbox'])) {
        $query->set('cat', implode(',', $_GET['checkbox']));
    }
}
add_action('pre_get_posts', 'x_filter_by_category');
if (!function_exists('mytheme_scripts')) {
    function mytheme_scripts()
    {
        wp_deregister_script('jquery'); // deregisters the default WordPress jQuery  
        wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"), false);
        wp_enqueue_script('jquery');
        wp_enqueue_script('themes', get_template_directory_uri() . '/assets/js/themes.js', array('jquery'));
        wp_localize_script(
            'themes',
            'ajax_object',
            array(
                'ajaxurl' => admin_url('admin-ajax.php'),
            )
        );
    }
}
add_action('wp_ajax_call_post', 'call_post_init');
add_action('wp_ajax_nopriv_call_post', 'call_post_init');
function call_post_init()
{
    // Getting the ajax data:
    // An array of keys("name")/values of each "checked" checkbox
    $meta_query = array('relation' => 'AND');
    $choices = $_POST['choices'];
    foreach ($choices as $Key => $Value) {
        if (count($Value)) {
            foreach ($Value as $Inkey => $Invalue) {
                $meta_query[] = array('taxonomy' => $Key, 'field' => 'term_id', 'terms' => (int) $Invalue, 'include_children' => true);
            }
        }
    }
    $args = array(
        'post_type' => 'services',
        'tax_query' => $meta_query,
        'posts_per_page' => -1
    );

    $query = new WP_Query($args);
    // showr($query);
    // showr($meta_query);
    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            get_template_part('template-parts/content-filter', $args);
        endwhile;
        wp_reset_query();
    else :
        wp_send_json([$query->posts]);
    endif;
    die();
}


// set meta for each page
function codeastrology_meta_description()
{
    global $post;
    if (is_singular()) {
        $des_post = strip_tags($post->post_content);
        $des_post = strip_shortcodes($post->post_content);
        $des_post = str_replace(array("\n", "\r", "\t"), ' ', $des_post);
        $des_post = mb_substr($des_post, 0, 300, 'utf8');
        echo '<meta name="description" content="' . $des_post . '" />' . "\n";
    }
    if (is_home()) {
        echo '<meta name="description" content="' . get_bloginfo("description") . '" />' . "\n";
    }
    if (is_category()) {
        $des_cat = strip_tags(category_description());
        echo '<meta name="description" content="' . $des_cat . '" />' . "\n";
    }
}
add_action('wp_head', 'codeastrology_meta_description');