<?php
/**
 * Custom template tags for Haste Store.
 *
 * @package Haste Store
 * @since 2.2.0
 */

if ( ! function_exists( 'haste_store_classes_page_full' ) ) {

	/**
	 * Classes page full.
	 *
	 * @since 2.2.0
	 *
	 * @return string Classes name.
	 */
	function haste_store_classes_page_full() {
    	if ( ( is_woocommerce_activated() && is_woocommerce() ) || is_front_page() ) {
    		return 'col-md-12';
    	} else {
        	return 'col-md-10 col-md-offset-1';
        }
	}
}

if ( ! function_exists( 'haste_store_classes_page_sidebar' ) ) {

	/**
	 * Classes page with sidebar.
	 *
	 * @since 2.2.0
	 *
	 * @return string Classes name.
	 */
	function haste_store_classes_page_sidebar() {
		return 'col-md-8';
	}
}

if ( ! function_exists( 'haste_store_classes_page_sidebar_aside' ) ) {

	/**
	 * Classes aside of page with sidebar.
	 *
	 * @since 2.2.0
	 *
	 * @return string Classes name.
	 */
	function haste_store_classes_page_sidebar_aside() {
		return 'col-md-3 offset-md-1 hidden-xs hidden-print widget-area';
	}
}

if ( ! function_exists( 'haste_store_posted_on' ) ) {

	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 *
	 * @since 2.2.0
	 */
	function haste_store_posted_on() {
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span class="featured-post">' . __( 'Sticky', 'haste-store' ) . ' </span>';
		}

		if ( true == get_theme_mod( 'display_post_date', true ) ) :
			// Set up and print post meta information.
			echo '<span class="entry-date meta">';
			echo '<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <time class="entry-date meta" datetime="'. esc_attr( get_the_date( 'c' ) ) .'">' . esc_html( get_the_date() ) . '</time>';
			echo '</span>';
		endif;

		if ( true == get_theme_mod( 'display_post_author', true ) ) :
			if ( !is_single() ) :
				echo '<span class="byline meta"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="sr-only">' . __( 'by', 'haste-store' ) . '</span><span class="author vcard"> ';
				echo '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . get_the_author() . '</a></span></span>';
			endif;
		endif;

		if ( true == get_theme_mod( 'display_post_category', true ) ) :
			if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) :
				echo '<span class="cat-links meta">';
				echo '<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> ';
				echo '<span class="sr-only">'. __( 'Posted in:', 'haste-store' ) . '</span> ' . get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'haste-store' ) ) . '</span></span>';
			endif;
		endif;

		if ( true == get_theme_mod( 'display_post_comments_link', true ) ) :
			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
				echo '<span class="comments-link meta">';
				echo '<span class="glyphicon glyphicon-comment" aria-hidden="true"></span> ';
				echo comments_popup_link( __( 'Leave a comment', 'haste-store' ), __( '1 Comment', 'haste-store' ), __( '% Comments', 'haste-store' ) );
				echo '</span>';
			endif;
		endif;

	}
}

if ( ! function_exists( 'haste_store_paging_nav' ) ) {

	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 *
	 * @since 2.2.0
	 */
	function haste_store_paging_nav() {
		$mid  = 2;     // Total of items that will show along with the current page.
		$end  = 1;     // Total of items displayed for the last few pages.
		$show = false; // Show all items.

		echo haste_store_pagination( $mid, $end, false );
	}
}

if ( ! function_exists( 'haste_store_the_custom_logo' ) ) {

	/**
	 * Displays the optional custom logo.
	 *
	 * Does nothing if the custom logo is not available.
	 *
	 * @since Haste Starter 1.0.0
	 */
	function haste_store_the_custom_logo() {
		$custom_logo = get_theme_mod( 'custom_logo' );

		if ( function_exists( 'the_custom_logo' ) && !empty( $custom_logo ) ) {
			the_custom_logo();
		}
		else {
			echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">';
			bloginfo( 'name' );
			echo '</a>';
		}
	}
}
