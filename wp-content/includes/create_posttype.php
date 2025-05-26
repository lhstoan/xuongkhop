<?php
/*======================/Create post type - Start /=============================*/
function prefix_register_all() {

  /* ========================================================================= */
    $name = "Artists";
    $singular_name = "Artists";
    $menu_name = "Artists";
    $name_admin_bar = "Artists";
    $all_items = "All Items";
    $add_new = "Add New";
    $add_new_item = "Add New Item";
    $edit_item = "Edit Item";
    $new_item = "New Item";
    $view_item = "View Item";
    $search_items = "Search Items";
    $not_found = "No items found.";
    $not_found_in_trash = "No items found in Trash.";
    $parent_item_colon = "Parent Items:";
  

  register_post_type(
    'artists',
    array(
      'labels' => array(
        'name' => __( $name, 'text_domain' ),
        'singular_name' => __( $singular_name, 'text_domain' ),
        'menu_name' => __( $menu_name, 'text_domain' ),
        'name_admin_bar' => __( $name_admin_bar, 'text_domain' ),
        'all_items' => __( $all_items, 'text_domain' ),
        'add_new' => _x( $add_new, 'artists', 'text_domain' ),
        'add_new_item' => __( $add_new_item, 'text_domain' ),
        'edit_item' => __( $edit_item, 'text_domain' ),
        'new_item' => __( $new_item, 'text_domain' ),
        'view_item' => __( $view_item, 'text_domain' ),
        'search_items' => __( $search_items, 'text_domain' ),
        'not_found' => __( $not_found, 'text_domain' ),
        'not_found_in_trash' => __( $not_found_in_trash, 'text_domain' ),
        'parent_item_colon' => __( $parent_item_colon, 'text_domain' )
      ),
      'public' => true,
      'menu_position' => 20,
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions'
      ),
      'has_archive' => true,
      'menu_icon' => 'dashicons-welcome-write-blog'
    )
  );

  /* ========================================================================= */

    $name = "Playlists";
    $singular_name = "Playlists";
    $menu_name = "Playlists";
    $name_admin_bar = "Playlists";
    $all_items = "All Items";
    $add_new = "Add New";
    $add_new_item = "Add New Item";
    $edit_item = "Edit Item";
    $new_item = "New Item";
    $view_item = "View Item";
    $search_items = "Search Items";
    $not_found = "No items found.";
    $not_found_in_trash = "No items found in Trash.";
    $parent_item_colon = "Parent Items:";
  
  register_post_type(
    'playlists',
    array(
      'labels' => array(
        'name' => __( $name, 'text_domain' ),
        'singular_name' => __( $singular_name, 'text_domain' ),
        'menu_name' => __( $menu_name, 'text_domain' ),
        'name_admin_bar' => __( $name_admin_bar, 'text_domain' ),
        'all_items' => __( $all_items, 'text_domain' ),
        'add_new' => _x( $add_new, 'playlists', 'text_domain' ),
        'add_new_item' => __( $add_new_item, 'text_domain' ),
        'edit_item' => __( $edit_item, 'text_domain' ),
        'new_item' => __( $new_item, 'text_domain' ),
        'view_item' => __( $view_item, 'text_domain' ),
        'search_items' => __( $search_items, 'text_domain' ),
        'not_found' => __( $not_found, 'text_domain' ),
        'not_found_in_trash' => __( $not_found_in_trash, 'text_domain' ),
        'parent_item_colon' => __( $parent_item_colon, 'text_domain' )
      ),
      'public' => true,
      'menu_position' => 20,
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'revisions'
      ),
      'has_archive' => true,
      'menu_icon' => 'dashicons-welcome-write-blog'
    )
  );


}

add_action( 'init', 'prefix_register_all', 0 );


function prefix_flush_rewrite_rules() {
  flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'prefix_flush_rewrite_rules' );


/* change color for icon menu admin */
function replace_admin_menu_icons_css() {
  ?>
<style>
#adminmenu #menu-posts, #adminmenu #menu-comments {
display: none;
}

		/*#adminmenu #menu-posts-blog div.wp-menu-image::before,
		#adminmenu #menu-posts-blog div.wp-menu-name {
			color: #f0f300;
		}*/
</style>
<?php
}
add_action( 'admin_head', 'replace_admin_menu_icons_css' );
