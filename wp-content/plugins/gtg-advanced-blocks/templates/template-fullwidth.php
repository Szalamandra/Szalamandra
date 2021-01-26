<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Full Width
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package gutengeek
 * @since v.1.0.5
 */

get_header();

while ( have_posts() ) : the_post();
	the_content();
endwhile; // End of the loop.

get_footer();
