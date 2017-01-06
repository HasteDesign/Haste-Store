<?php
/**
 * Custom template tags for Odin.
 *
 * @package Odin
 * @since 2.2.0
 */

if ( ! function_exists( 'odin_classes_page_full' ) ) {

	/**
	 * Classes page full.
	 *
	 * @since 2.2.0
	 *
	 * @return string Classes name.
	 */
	function odin_classes_page_full() {

		if ( is_woocommerce() ) {
			return 'col-md-12';
		} else {
			return 'col-md-8 col-md-offset-2';
		}
	}
}

if ( ! function_exists( 'odin_classes_page_sidebar' ) ) {

	/**
	 * Classes page with sidebar.
	 *
	 * @since 2.2.0
	 *
	 * @return string Classes name.
	 */
	function odin_classes_page_sidebar() {
		return 'col-md-8';
	}
}

if ( ! function_exists( 'odin_classes_page_sidebar_aside' ) ) {

	/**
	 * Classes aside of page with sidebar.
	 *
	 * @since 2.2.0
	 *
	 * @return string Classes name.
	 */
	function odin_classes_page_sidebar_aside() {
		return 'col-md-3 col-md-offset-1 hidden-xs hidden-print widget-area';
	}
}

if ( ! function_exists( 'odin_posted_on' ) ) {

	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 *
	 * @since 2.2.0
	 */
	function odin_posted_on() {
		if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span class="featured-post">' . __( 'Sticky', 'haste-store' ) . ' </span>';
		}

		// Set up and print post meta information.
		echo '<span class="entry-date meta">';
		echo '<time class="entry-date meta" datetime="'. esc_attr( get_the_date( 'c' ) ) .'">' . esc_html( get_the_date( 'd/m/Y' ) ) . '</time>';
		echo '</span>';

		if ( true == get_theme_mod( 'display_post_author', true ) ) :
			if ( !is_single() ) :
				echo '<span class="byline meta">' . __( 'by', 'haste-store' ) . '<span class="author vcard"> ';
				echo '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . get_the_author() . '</a></span></span>';
			endif;
		endif;

		if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) :
			echo '<span class="cat-links meta">'. __( 'Posted in:', 'haste-store' ) . ' ' . get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'haste-store' ) ) . '</span>';
		endif;

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			echo '<span class="comments-link meta">' . comments_popup_link( __( 'Leave a comment', 'haste-store' ), __( '1 Comment', 'haste-store' ), __( '% Comments', 'haste-store' ) ) . '</span>';
		endif;

	}
}

if ( ! function_exists( 'odin_paging_nav' ) ) {

	/**
	 * Print HTML with meta information for the current post-date/time and author.
	 *
	 * @since 2.2.0
	 */
	function odin_paging_nav() {
		$mid  = 2;     // Total of items that will show along with the current page.
		$end  = 1;     // Total of items displayed for the last few pages.
		$show = false; // Show all items.

		echo odin_pagination( $mid, $end, false );
	}
}

if ( ! function_exists( 'odin_the_custom_logo' ) ) {

	/**
	 * Displays the optional custom logo.
	 *
	 * Does nothing if the custom logo is not available.
	 *
	 * @since Odin 2.2.10
	 */
	function odin_the_custom_logo() {
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
