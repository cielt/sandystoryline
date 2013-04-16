<?php
// Template Name: Galleria Gallery Page
// added by clt - for CB gallery embeds
/**
*
* @package progression
* @since progression 1.0
*/

get_header('gallery'); ?>
<style type="text/css" media="screen">
	#wrapper-page #wrapper-content { position: relative; z-index: 1; }
	#wrapper-page h1 { font-size: 1.8em; margin: 0 auto 24px; position: relative; }
	#wrapper-gallery { width: 100%; height: 480px; }
	#galleria { width: 100%; height: 100%; margin: 0 auto 24px; display: none; position: relative; z-index: 3; }
	#wrapper-page #status, #wrapper-page #news { 
		position: fixed; z-index: 9; top: 24px; right: 0; width: 320px; padding: 12px; font-size: 10pt; 
		background-color: #f26222; color: #fff; 
	}	
	#wrapper-page #news { top: 88px; background-color: #000; padding: 12px; width: 48px; }
	
	#ssl-loader { 
		width:100%; height:100%; margin:0; position:absolute; left:0; top:0; color:#fff; 
		text-align:center; z-index:4; 		
		display:none; background:#000 url(<?php echo (get_stylesheet_directory_uri().'/js/galleria/themes/azur/loader-ssl.gif') ?> no-repeat center center; filter: alpha(opacity=48); 
		-moz-opacity:0.48; opacity:0.48; line-height:150px; border-radius:6px }
	
	#wrapper-content #loader img { vertical-align: middle; margin: 20% auto; }
</style>


</div><!-- close .width-container -->
	<?php while ( have_posts() ) : the_post(); ?>
<div id="highlight-container">
	<div class="width-container clearfix">
		
	</div>
</div><!-- close #highlight-container -->
<div class="width-container clearfix">

<!-- GALLERIA -->	
	<div id="wrapper-galleria" class="content-container">
			<div class="container-spacing clearfix">
				<!-- when last feed grabbed -->	
		     <div id="status" class=""></div>
		<div id="wrapper-content">
			<div id="wrapper-gallery">
				<div id="galleria" class="clearfix"></div>
				<div id="ssl-loader"></div>
			</div>
		</div>
				
			</div><!-- close .content-container-spacing -->
		</div><!-- close .content-container -->

<?php endwhile; // end of the loop. ?>

	</div>
	<script type="text/javascript" charset="utf-8" src="<?php echo (get_stylesheet_directory_uri().'/js/sandy-gallery.js') ?>"></script>

<?php get_footer(); ?>