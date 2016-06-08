<?php $shortname = "sell_theme"; ?>
<footer id="footer">
	<div class="footer_widgets_cont">
		<div class="container">
			<div class="footer_widget_col">
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 1') ) : ?>
				<?php endif; ?>
			</div> <!-- //footer_widget_col -->
			<div class="footer_widget_col">
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 2') ) : ?>
				<?php endif; ?>
			</div> <!-- //footer_widget_col -->
			<div class="footer_widget_col footer_widget_col_last">
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget 3') ) : ?>
				<?php endif; ?>
			</div> <!-- //footer_widget_col -->		
			<div class="clear"></div>
		</div> <!-- //container -->
	</div> <!-- //footer_widgets_cont -->
	<div class="footer_social">
	
	<?php if(get_option($shortname.'_facebook_link','') != '') { ?>
			<a href="<?php echo get_option($shortname.'_facebook_link',''); ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook-icon.png" alt="facebook" /></a>
		<?php } ?>
		<?php if(get_option($shortname.'_twitter_link','') != '') { ?>
			<a href="<?php echo get_option($shortname.'_twitter_link',''); ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter-icon.png" alt="twitter" /></a>
		<?php } ?>
		<?php if(get_option($shortname.'_linkedin_link','') != '') { ?>
			<a href="<?php echo get_option($shortname.'_linkedin_link',''); ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/linkedin-icon.png" alt="linkedin" /></a>
		<?php } ?>
		
		<?php if(get_option($shortname.'_google_plus_link','') != '') { ?>
			<a href="<?php echo get_option($shortname.'_google_plus_link',''); ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/google-plus-icon.png" alt="google plus" /></a>
		<?php } ?>
		<?php if(get_option($shortname.'_picasa_link','') != '') { ?>
			<a href="<?php echo get_option($shortname.'_picasa_link',''); ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/picasa-icon.png" alt="social" /></a>
		<?php } ?>
		<?php if(get_option($shortname.'_pinterest_link','') != '') { ?>
			<a href="<?php echo get_option($shortname.'_pinterest_link',''); ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/pinterest-icon.png" alt="pinterest" /></a>
		<?php } ?>
		<?php if(get_option($shortname.'_youtube_link','') != '') { ?>
			<a href="<?php echo get_option($shortname.'_youtube_link',''); ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/youtube-icon.png" alt="youtube" /></a>
		<?php } ?>
		<?php if(get_option($shortname.'_vimeo_link','') != '') { ?>
			<a href="<?php echo get_option($shortname.'_vimeo_link',''); ?>" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vimeo-icon.png" alt="vimeo" /></a>
		<?php } ?>
		
		
		
		<div class="clear"></div>
	</div><!--//footer_social-->
	© 2015 All Rights Reserved. Developed by <a href="http://dessign.net">Dessign.net</a></div>
</footer><!--//footer-->
<?php wp_footer(); ?>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/scripts.js"></script>
</body>
</html>