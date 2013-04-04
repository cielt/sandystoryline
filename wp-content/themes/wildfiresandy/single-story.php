<?php wp_head(); ?>
<style type="text/css">
header, .sf-menu ul, .sf-menu ul ul, .sf-menu ul ul ul { background-color:#020000; }
#highlight-container { background-color:#ffffff; }
#main, body #main {background-color:#aeadac; }
.content-container { background-color:#ffffff; }
body, footer {background-color:#000000;}
#footer-widgets {background-color:#000000; }
.button, input.submit, input.wpcf7-submit, #respond input#submit {background-color:#1f83bc}
a.progression-red {background:#1f83bc}

body {color:#777777;}
.sf-menu a, .sf-menu a:hover, .sf-menu a:visited, header .social-icons a  {color:#1f83bc; }
h1.page-title { color:#2f2f2f; }
a, h3 a:hover, .content-container a:hover h4, .content-container a:hover h6.post-type-header {color:#facb4b; }
a:hover {color:#facb4b;}
h1, h2, h3, h4, h5, h6, h3 a {color:#2f2f2f; }
#sidebar h5 {color:#444444; }
footer {color:#cbcbcb; }
footer h1, footer h2, footer h3, footer h4, footer h5, footer h6, footer a {color:#ffffff;}
footer a:hover {color:#facb4b;}
body .button, body a.button, input.submit, input.wpcf7-submit, #respond input#submit {color:#ffffff;  }

	html { margin-top: 28px !important; }
	* html body { margin-top: 28px !important; }

body #logo img {max-width:270px;}
		body, .sf-menu li.sfHover li a, .sf-menu li.sfHover li a:visited, .sf-menu li.sfHover li li a, .sf-menu li.sfHover li li a:visited, .sf-menu li.sfHover li li li a, .sf-menu li.sfHover li li li a:visited, .sf-menu li.sfHover li li li li a, .sf-menu li.sfHover li li li li a:visited { font-family:"Open Sans", Helvetica, Arial, Sans-Serif;}
		.sf-menu a, .button, input.submit, h5, .featured-text, .twitter-text, ul.filter-children li a, input.wpcf7-submit, #respond input#submit, #page-nav a, .twitter-post blockquote.twitter-tweet p a {font-family: 'LeagueGothicRegular', sans-serif; }
		h2, h3, h4, h6, .twitter-time-stamp, .tag-cloud, .blog-post-details, .pagination a, .twitter-post blockquote.twitter-tweet a {font-family: 'LeagueGothicRegular', sans-serif; }
		.flex-caption, h1 {font-family: 'LeagueGothicRegular', sans-serif; }
		.sf-menu a {padding-top:48.5px; padding-bottom:42.5px;}  
		.sf-menu li:hover ul, .sf-menu li.sfHover ul {top:106px;} 
					/* -------------------- HEADER -------------------- */
#sticky-navigation-spacer {
	padding-top: 106px;
}




/* =HEADER 
---------------------------------------------------------- */
h1.page-title, h1.page-title a {
	color: #000;
	font-size: 36pt;
	margin-bottom: 0;
	padding-bottom:0;
}

h1.page-title.margin-b { margin-bottom: 25px; }

h1.page-title a:hover { color: #facb4b; }

h3.gallery-type { text-transform: uppercase; font-size: 21pt; 
	margin: 0 0 15px;
}




/* =MEDIA / RESPONSIVE 
---------------------------------------------------------- */
@media only screen and (min-width: 959px) and (max-width: 1140px) {
	.bar-controls { width: 584px; }
 	.bar-controls .social-icons { display: none; } /* 886 */
	
}


@media only screen and (min-width: 768px) and (max-width: 959px) { 
	.bar-controls { width: 460px; }
	.bar-controls .social-icons { display: none; }
	.sf-menu a, .sf-menu a:visited {
	font-size: 16pt; font-weight: normal;
}
.bar-controls .sf-menu a {padding:48px 8px 42px 8px; }  

}

@media only screen and (max-width: 767px) {
	header { padding-top: 20px; }	
	.width-25, .width-75 { width: 100%; float: none; text-align: center; line-height: normal; margin: 0 0 15px; }
	table.scaffold { height: auto; }
	table.scaffold td { text-align: center; }
	.wrapper-callouts h3 { font-size: 35pt; padding: 0; text-align: center; }
	.callout.col-3 { display: block; width: 100%; float: none; margin: 0; }
	.bar-controls { width: auto; float: none; margin: 0; }
	.bar-controls .wrapper-nav, .bar-controls .social-icons { display: block; width: 100%; float: none; clear: both; }
	
}				
#sticky-navigation-spacer {padding-top:106px;}	
</style>
<div id="main" class="site-main">
	<div class="width-container">
<?php while ( have_posts() ) : the_post(); ?>

</div><!-- close .width-container -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php // get story data
		//$location = get_post_meta( $post->ID, 'locations', true );
				$location_specific = get_post_meta( $post->ID, 'STORY_location_specific', true );
				$storydate = get_post_meta( $post->ID, 'STORY_date', true );
				$storycontributor = get_post_meta( $post->ID, 'STORY_contributor', true );
				$storyteller = get_post_meta( $post->ID, 'STORY_storyteller', true );
				$theme = get_post_meta( $post->ID, 'STORY_theme', true );
				
				//taxonomy
				$story_locations = get_the_term_list( $post->ID, 'locations', '', ', ', '' );
				$story_themes = get_the_term_list( $post->ID, 'themes', '', ', ', '' );
				
				//media
				$audio_files = rwmb_meta( 'STORY_audio', 'type=file' );
				$story_images = rwmb_meta( 'STORY_images', 'type=image' );
        		
		?>
	<div id="marquee-container">
		<div class="width-container clearfix">
			<div class="frame-feature-photo">
				<?php 
					foreach ( $story_images as $image ){
					    echo "<img src='{$image['full_url']}' alt='{$image['alt']}' />";
				}?>
			</div>
			<!-- audio player -->
			<!-- MEDIA -->
			<?php foreach ( $audio_files as $info ) {
					echo "<div class='player' audiosrc=\"{$info['url']}\" width='640' height='30'></div>";
				}?>
			
	</div>


</div><!-- close #highlight-container -->
<div class="width-container">

	<div class="content-container">
		<div class="container-spacing clearfix">
			<?php
			$header_html = "<h1 class='page-title margin-b'>" . get_the_title($post->ID) ."</h1>"; 
			echo($header_html);
			?>
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
					<tr><td>By</td><td><?php echo $storyteller[0]; ?></td></tr>
					<tr><td>Date</td><td><?php echo mysql2date('F j, Y', $storydate); ?></td></tr>
					<tr><td>Specific Location</td><td><?php echo $location_specific; ?></td></tr>
					<tr><td>Location(s)</td><td><?php echo $story_locations; ?></td></tr>
					<tr><td>Themes</td><td><?php echo $story_themes; ?></td></tr>
				</table>
			</div><!-- /#sidebar -->	
	
			</div><!-- /.content-container-spacing -->
			
		</div><!-- close .content-container -->
	</div><!-- /post-<?php the_ID(); ?> -->
<?php endwhile; // end of the loop. ?>


<div class="clearfix"></div>
</div><!-- close .width-container -->
</div><!-- close #main -->
