<?php
$children = wp_list_pages('sort_column=menu_order&title_li=&child_of='.$post->ID.'&echo=0');
$page_parent = $post->post_parent; //18 = explore
$header_html = "";
$parents = array_reverse(get_post_ancestors($post->ID));
$top_parent = get_page($parents[0]);
//echo $top_parent->post_name;



if ($top_parent->ID != $post->ID){
	echo('<a class="link-top" href="'.get_page_link($top_parent->ID).'">'. '&larr; All Stories' .'</a>');
	if ($page_parent == 18) { 
		//borough / state page -- list children, if any
		if($children){ ?>
			<ul class="filter-children">
				<?php echo $children; ?>
			</ul>
			<?php } 
			//just the header 
			$header_html = "<h1 class='page-title'>". get_the_title($post->ID) . "</h1>";

		} else { 
			//neighborhood page -- list siblings 
			$siblings = wp_list_pages('sort_column=menu_order&title_li=&child_of='.$post->post_parent.'&depth=3&echo=0');
			?>
			<ul class="filter-children">
				<?php echo $siblings; ?>
			</ul>
			<?php
			$header_html = "<h1 class='page-title'>". '<a href="'. get_page_link($post->post_parent). '">' . get_the_title($post->post_parent) ."</a></h1>"; 
		}
	} else {
		//explore page
		get_template_part( 'child-page', 'navigation' );
		echo("<h1 class='page-title'>" . get_the_title($post->ID) ."</h1>"); 
	}
	echo($header_html);
?>