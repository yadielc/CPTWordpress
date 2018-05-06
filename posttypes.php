<?php
/**
 * Plugin Name: Yadiel's Custom Post Types and Taxonomies
 * Plugin URI: http://yadielcabrera.com
 * Description: A simple plugin that adds custom post types and taxonomies
 * Version: 0.1
 * Author: Yadiel Cabrera
 * Author URI: http://yadielcabrera.com
 * License: GPL2
 */

/*  Copyright 2018  Yadiel Cabrera  (email : ysites@gmail.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function my_custom_posttypes() {
  $labels = array(
      'name'               => 'Testimonials',
      'singular_name'      => 'Testimonial',
      'menu_name'          => 'Testimonials',
      'name_admin_bar'     => 'Testimonial',
      'add_new'            => 'Add New',
      'add_new_item'       => 'Add New Testimonial',
      'new_item'           => 'New Testimonial',
      'edit_item'          => 'Edit Testimonial',
      'view_item'          => 'View Testimonial',
      'all_items'          => 'All Testimonials',
      'search_items'       => 'Search Testimonials',
      'parent_item_colon'  => 'Parent Testimonials:',
      'not_found'          => 'No testimonials found.',
      'not_found_in_trash' => 'No testimonials found in Trash.',
  );

  $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'menu_icon'          => 'dashicons-id-alt',
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'testimonials' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array( 'title', 'editor', 'thumbnail' ),
      'show_in_rest'       => true


  );
    register_post_type( 'testimonial', $args );
}
add_action( 'init', 'my_custom_posttypes' );

function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry,
    // when you add a post of this CPT.
    my_custom_posttypes();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );
