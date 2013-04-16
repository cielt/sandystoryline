<?php
// Template Name: Galleria Gallery Page
// added by clt - for CB gallery embeds
/**
*
* @package progression
* @since progression 1.0
*/

get_header('gallery'); ?>


</div><!-- close .width-container -->
	<?php while ( have_posts() ) : the_post(); ?>
<div id="highlight-container">
	<div class="width-container clearfix">
		
	</div>
</div><!-- close #highlight-container -->
<div class="width-container clearfix">

<!-- GALLERIA -->	
	<div id="wrapper-galleria" class="content-container">

			<!-- when last feed grabbed -->	
		     <div id="status" class=""></div>
		<div id="wrapper-content">
			<div id="wrapper-gallery">
				<div id="galleria" class="clearfix"></div>
				<div id="ssl-loader"></div>
			</div>
		</div>
				
		</div><!-- close .content-container -->

<?php endwhile; // end of the loop. ?>

	</div>
	<script type="text/javascript" charset="utf-8" src="<?php echo (get_stylesheet_directory_uri().'/js/sandy-gallery.js') ?>"></script>

<?php get_footer('gallery'); ?>