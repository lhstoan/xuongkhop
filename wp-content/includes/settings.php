<?php
/* ========================================================================= */
/* ============================ DEFAULT SETTING ============================ */
// Increase limit upload file
@ini_set( 'upload_max_size', '64M' );
@ini_set( 'post_max_size', '64M' );
@ini_set( 'max_execution_time', '300' );

// Allow Post Thumbnail
add_theme_support( 'post-thumbnails' );

// Allow Post Excerpt
add_post_type_support( 'page', 'excerpt' );
/* ============== /////////////////////////////////////////// ============== */
/* ========================================================================= */




/* ========================================================================= */
/* =========================== ADMIN SLUG COLUMN =========================== */

// Only run plugin in the admin
if (is_admin()) :
    class WPAdminSlugColumn {

        /**
        * Constructor for WPAdminSlugColumn Class
        */
        function __construct() {
            add_action( 'current_screen',             array( $this, 'WPASC_post_type' ) );
            add_filter( 'manage_posts_columns',       array( $this, 'WPASC_posts' ) );
            add_action( 'manage_posts_custom_column', array( $this, 'WPASC_posts_data' ), 10, 2 );
            add_filter( 'manage_pages_columns',       array( $this, 'WPASC_posts' ) );
            add_action( 'manage_pages_custom_column', array( $this, 'WPASC_posts_data' ), 10, 2 );
        }

        /**
         * Returns an object that includes the current screen's post type
         *
         * @see https://developer.wordpress.org/reference/functions/get_current_screen/
         */
        function WPASC_post_type() {
            return get_current_screen()->post_type;
        }

        /**
         * Adds Slug column to Posts list column
         *
         * @param array $defaults An array of column names
         */
        function WPASC_posts( $defaults ) {
            $defaults['wpasc-slug'] = __( 'URL Path', 'admin-slug-column' );
            return $defaults;
        }

        /**
         * Gets the post info from get_post function and displays the slug and/or path
         *
         * @param string $column_name Name of the column
         * @param int    $id          post id
         *
         * @see https://developer.wordpress.org/reference/functions/get_post/
         */
        function WPASC_posts_data( $column_name, $id ) {
            if ( $column_name == 'wpasc-slug' ) {
                $post_info        = get_post( $id, 'string', 'display' );
                $post_status      = $post_info->post_status;
                $draft_slug_names = array( '%pagename%', '%postname%' );

                if ( 'draft' === $post_status || 'pending' === $post_status || 'future' === $post_status ) {
                    // unpublished status don't technically a slug yet so we have to use another function
                    $post_draft_url_array = get_sample_permalink( $id );
                    // grab the sample url path from the array and remove host and scheme
                    $post_draft_url_pre = str_replace( get_home_url(), '', $post_draft_url_array[0] );
                    // swap the draft %pagename% or %postname% holder with the sample permalink
                    $post_slug = str_replace( $draft_slug_names, $post_draft_url_array[1], $post_draft_url_pre );
                    // fyi: mb decoding is already done for us by the get_sample_permalink() array [1]
                    // now that we have the actual url path, because it's a draft lets make it gray
                    $post_slug = '<span style="color: #999;">' . $post_slug . '</span>';
                } else {
                    // for published and everything else just use the post name and remove host and scheme
                    $post_slug = str_replace( get_home_url(), '', get_permalink( $id ) );
                    // decode for multibyte character support
                    $post_slug = esc_html( urldecode( $post_slug ) );
                }

                // output the slug
                echo $post_slug;
            }
        }

    }


    $WPAdminSlugColumn = new WPAdminSlugColumn();
endif;
/* ============== /////////////////////////////////////////// ============== */
/* ========================================================================= */





/* ========================================================================= */
/* ========================= CURRENT TEMPLATE FILE ========================= */
new Show_Template_File_Name();

class Show_Template_File_Name {
    
    public $debug_info = [];

    public function __construct() {
        // add_action( 'wp_footer', array( $this, 'get_included_files_at_footr' ) );

        add_action( 'admin_bar_menu', array( &$this, 'show_template_file_name_on_top' ), 9999 );
        add_action( 'wp_enqueue_scripts', array( &$this, 'add_current_template_stylesheet' ), 9999 );
        add_action( 'wp_enqueue_scripts', array( &$this, 'add_current_template_js' ), 9999 );
    }

    public function show_template_file_name_on_top( $wp_admin_bar ) {

        if ( is_admin() || ! is_super_admin() ) {
            return;
        }

        global $template;

        $template_file_name     = basename( $template );
        $template_relative_path = str_replace( ABSPATH . 'wp-content/', '', $template );

        $current_theme      = wp_get_theme();
        $current_theme_name = $current_theme->Name;
        $parent_theme_name  = '';

        if ( is_child_theme() ) {
            $child_theme_name  = __( 'Theme name: ', 'show-current-template' )
                    . $current_theme_name;
            $parent_theme_name = $current_theme->parent()->Name;
            $parent_theme_name = ' (' . $parent_theme_name
                    . __( "'s child", 'show-current-template' ) . ')';
            $parent_or_child   = $child_theme_name . $parent_theme_name;
        } else {
            $parent_or_child = __( 'Theme name: ', 'show-current-template' )
                    . $current_theme_name . ' (' . __( 'NOT a child theme', 'show-current-template' ) . ')';
        }

        $included_files = get_included_files();

        sort( $included_files );
        $included_files_list = '';
        foreach ( $included_files as $filename ) {
            if ( strstr( $filename, 'themes' ) ) {
                $filepath = strstr( $filename, 'themes' );
                if ( $template_relative_path === $filepath ) {
                    $included_files_list .= '';
                } else {
                    $included_files_list .= '<li>' . "$filepath" . '</li>';
                }
            }
        }

        global $wp_admin_bar;
        $args = array(
            'id'    => 'show_template_file_name_on_top',
            'title' => __( 'Template:', 'show-current-template' )
            . '<span class="show-template-name"> ' . $template_file_name . '</span>',
        );

        $wp_admin_bar->add_node( $args );

        $wp_admin_bar->add_menu(
            array(
                'parent' => 'show_template_file_name_on_top',
                'id'     => 'template_relative_path',
                'title'  => __( 'Template relative path:', 'show-current-template' )
                . '<span class="show-template-name"> ' . $template_relative_path . '</span>',
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'parent' => 'show_template_file_name_on_top',
                'id'     => 'is_child_theme',
                'title'  => $parent_or_child,
            )
        );

        $wp_admin_bar->add_menu(
            array(
                'parent' => 'show_template_file_name_on_top',
                'id'     => 'included_files_path',
                'title'  => __( 'Also, below template files are included:', 'show-current-template' )
                . '<br /><ul id="included-files-list">'
                . $included_files_list
                . '</ul>',
            )
        );
    }

    public function get_included_files_at_footr() {

        if ( is_admin() || ! is_super_admin() ) {
            return;
        }

        $included_files = get_included_files();
        global $template;

        $template_relative_path = str_replace( ABSPATH . 'wp-content/', '', $template );

        sort( $included_files );
        $included_files_list = '';
        foreach ( $included_files as $filename ) {
            if ( strstr( $filename, 'themes' . DIRECTORY_SEPARATOR ) ) {
                $filepath = strstr( $filename, 'themes' );
                if ( $template_relative_path === $filepath ) {
                    $included_files_list .= '';
                } else {
                    $included_files_list .= '<li>' . "$filepath" . '</li>';
                }
            }
        }
        $included_files_format = '<ol id="included-files-fie-on-wp-footer">'
                . '%s'
                . '</ol>';
        $included_files_html = sprintf( $included_files_format, $included_files_list );
        echo wp_kses_post( $included_files_html );
    }

    public function add_current_template_stylesheet() {

        if ( is_admin() || ! is_super_admin() ) {
            return;
        }

        $wp_version = get_bloginfo( 'version' );

        if ( $wp_version >= '3.8' ) {
            $is_older_than_3_8 = '';
        } else {
            $is_older_than_3_8 = '-old';
        }

        // $stylesheet_path = plugins_url( 'css/style' . $is_older_than_3_8 . '.css', __FILE__ );
        // wp_register_style( 'current-template-style', $stylesheet_path, array(), WPSCT_VERSION );
        // wp_enqueue_style( 'current-template-style' );
    }
    public function add_current_template_js() {

        if ( is_admin() || ! is_super_admin() || ! is_admin_bar_showing() ) {
            return;
        }

        $wp_version = get_bloginfo( 'version' );

        if ( $wp_version >= '5.4' ) {
            // $js_path = plugins_url( 'assets/js/replace.js', __FILE__ );
            // wp_register_script( 'current-template-js', $js_path, array( 'jquery' ), WPSCT_VERSION, true );
            // wp_enqueue_script( 'current-template-js' );
        } else {
            return;
        }
    }
}
/* ============== /////////////////////////////////////////// ============== */
/* ========================================================================= */


/* ========================================================================= */
/* ================== REMOVE VISUAL EDITOR FOR MW-WP-FORM ================== */
add_filter( 'user_can_richedit', 'remove_visual_editor_for_form' );
function remove_visual_editor_for_form($can) {
    $current_screen = get_current_screen();
    if($current_screen->id === "mw-wp-form")
        return false;
    return $can;
}
/* ============== /////////////////////////////////////////// ============== */
/* ========================================================================= */


/*************************************************
//管理画面の投稿一覧にPV数とサムネイル画像を表示
**************************************************/
function manage_posts_columns($columns) {
    $columns['thumbnail'] = 'サムネイル';
    return $columns;
}
function add_column($column_name, $post_id) {
    //サムネイル呼び出し
    if ( $column_name == 'thumbnail') {
        $thumb = get_the_post_thumbnail($post_id, array(80,80), 'thumbnail');
    }
    //表示する
    if ( isset($stitle) && $stitle ) {
        echo esc_attr($stitle);
    }
    else if ( isset($thumb) && $thumb ) {
        echo $thumb;
    }else if(isset($thumb) && !$thumb ) {
        echo __('<div class="noimage"></div>');}
}
// add_filter( 'manage_posts_columns', 'manage_posts_columns' );
// add_action( 'manage_posts_custom_column', 'add_column', 10, 2 );
?>