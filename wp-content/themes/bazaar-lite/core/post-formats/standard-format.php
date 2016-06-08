<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */
	
	do_action('bazaarlite_before_content');
	do_action('bazaarlite_thumbnail', 'bazaar-lite-thumbnail','on'); 

?>

<div class="post-article">

	<?php do_action('bazaarlite_after_content','post'); ?>

</div>