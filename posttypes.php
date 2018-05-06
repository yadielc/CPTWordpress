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
    $args = array(
      'public' => true,
      'label'  => 'Testimonials'
    );
    register_post_type( 'testimonial', $args );
}
add_action( 'init', 'my_custom_posttypes' );
