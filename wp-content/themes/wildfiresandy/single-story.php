<?php wp_head(); ?>

<div id="main" class="site-main">
	<?php while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php // get story data
		
		$story_contributor = get_field('story_contributor');
		$story_date = get_field('story_date');
		
		//taxonomies
		$story_locations = get_the_terms( $post->ID, 'locations', '', ', ', '' );
		$story_locations_linked = get_the_term_list( $post->ID, 'locations', '', ', ', '' );
		$story_themes = get_the_term_list( $post->ID, 'themes', '', ', ', '' );
		$story_media = get_the_term_list( $post->ID, 'media_types', '', ', ', '' );
		$story_tags = get_the_term_list( $post->ID, 'post_tag', '', ', ', '' );
		
		//media
		$story_audio = get_field('story_audio'); //file object
		$story_image_single = get_field('story_image_single'); //image object
		$story_video = get_field('story_video'); 
		
		//arrays to strings
		if ( $story_locations && ! is_wp_error( $story_locations ) ) {
				$story_locations_links = array();
			foreach ( $story_locations as $story_location ) {
			$story_locations_links[] = $story_location->name;
		}
						
		$location_string = join( ", ", $story_locations_links );
		} 


        		
	?>	
	<!-- STORY info : title, author, location -->
	<div id="sticky-header-spacer"></div>
	<div id="header-story" class="sticky-header">
		<div class="width-container clearfix">
			<div class="container-spacing clearfix">
			<?php $header_html = "<h1 class='page-title story-title'>" . get_the_title($post->ID) ."</h1>";
			 	$header_html .= "<div class='story-deets'><span class='author'>By ". $story_contributor ."</span>, <span class='story-location'>". $story_locations_linked ."</span> <date class='story-date'>" . mysql2date('F j, Y', $story_date) . "</date></div>";
				echo($header_html);
			?>
			</div>
		</div>
	</div>

	<div id="marquee-container">
		<div class="width-container clearfix">
			<!-- image -->	
			<?php 
				if($story_image_single){  
					//display image
					echo('<div class="frame-feature-photo"><img src="' . ($story_image_single['url']) .'" /></div>');
				}
			?>
	
			<!-- audio player -->
			<?php if ( $story_audio) {
				echo "<div class='player' audiosrc='". $story_audio['url'] ."' width='640' height='30'></div>";
			}?>	
	</div>


</div><!-- close #highlight-container -->
<div class="width-container">

	<div class="content-container">
		<div class="container-spacing clearfix">
			
			<!-- CONTENT -->
			<div class="grid3columnbig" id="container-sidebar">
			<?php $cc = get_the_content(); if($cc != '') { ?>

				<?php the_content(); ?>

				<?php } ?>
			</div><!-- /#container-sidebar -->
			<div class="grid3column lastcolumn" id="sidebar">
				<!-- PREV - NEXT NAV -->			
				<div id="series-nav" class="clearfix" style="padding: 0 0 20px;">
					<div class="controls ctrls-left"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr; %title</span>') ); ?></div>
					<div class="controls ctrls-right"><?php next_post_link( '%link', __( '<span class="meta-nav">%title &rarr;</span>') ); ?></div>
				
				</div><!-- /#series-nav -->
			
				<table id="story-meta">
					<tr><td>Themes</td><td><?php echo $story_themes; ?></td></tr>
					<tr><td>Media</td><td><?php echo $story_media; ?></td></tr>
					<tr><td>Tags</td><td><?php echo $story_tags; ?></td></tr>
				</table>

			</div><!-- /#sidebar -->	
			</div><!-- /.content-container-spacing -->	
		<div class="container-spacing clearfix">	
			<!-- CONTROL BAR -->	
			<div id="controls" class="clearfix">
				<a href="<?php echo get_page_link(20); ?>">Submit a Story</a>
			</div>	
		</div><!-- /.content-container-spacing -->	
		</div><!-- close .content-container -->
	</div><!-- /post-<?php the_ID(); ?> -->
<?php endwhile; // end of the loop. ?>

<div class="clearfix"></div>
</div><!-- close .width-container -->
</div><!-- close #main -->