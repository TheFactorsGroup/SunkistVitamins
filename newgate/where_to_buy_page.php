<?php
/**
 * @package WordPress
 * @subpackage Newgate
 * @since Newgate 1.0
 * 
 * Template Name: Where to buy
 * Created by CMSMasters
 * 
 */


get_header();


$cmsms_layout = get_post_meta(get_the_ID(), 'cmsms_layout', true);

if (!$cmsms_layout) {
    $cmsms_layout = 'r_sidebar';
}


echo '<!--_________________________ Start Content _________________________ -->' . "\n";

if ($cmsms_layout == 'r_sidebar') {
	echo '<section id="content" role="main">' . "\n\t";
} elseif ($cmsms_layout == 'l_sidebar') {
	echo '<section id="content" class="fr" role="main">' . "\n\t";
} else {
	echo '<section id="middle_content" role="main">' . "\n\t";
}


echo '<div class="entry">' . "\n\t";

if (have_posts()) : the_post();
	if (has_post_thumbnail()) {
		if (has_post_thumbnail()) {
			if ($cmsms_layout == 'r_sidebar' || $cmsms_layout == 'l_sidebar') {
				echo '<div class="cmsms_media">' . "\n\t";
				
				cmsms_thumb(get_the_ID(), 'post-thumbnail', false, 'img_' . get_the_ID(), true, false, true, true, false);
				
				echo "\r" . '</div>';
			} else {
				echo '<div class="cmsms_media">' . "\n\t";
				
				cmsms_thumb(get_the_ID(), 'full-thumb', false, 'img_' . get_the_ID(), true, false, true, true, false);
				
				echo "\r" . '</div>';
			}
		}
	}
	
	the_content();
	
	wp_link_pages(array( 
		'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . __('Pages', 'cmsmasters') . ':</strong>', 
		'after' => '</div>' . "\n", 
		'link_before' => ' [ ', 
		'link_after' => ' ] ' 
	));
	
	cmsms_content_composer(get_the_ID());
endif;

echo '<div id="map-canvas"></div>'; 

echo '<h2>'.get_field( 'retailers_title' ).'</h2>'; 
// Logo block section 

$retailer_args = array(
	'post_type' 		=> 'retailers',
	'posts_per_page' 	=> 50,
	'orderby'			=> 'title',
	'order'				=> 'ASC',
);
$retailers = new WP_Query( $retailer_args );
if ( $retailers->have_posts() ) : 
	while ( $retailers->have_posts() ): $retailers->the_post();
		echo '<div class="logo-block">';
			echo '<a href="'.get_field( 'retailer_link' ).'" target="'.get_field( 'link_target' ).'">';
				echo get_the_post_thumbnail( get_the_ID(), 'thumbnail', array( 'class' => 'aligncenter' ) );
				the_title(); 
			echo '</a>'; 
		echo '</div>';
	endwhile; wp_reset_postdata(); 
endif; 
echo '</div>' . "\n";
	
comments_template();

echo '</section>' . "\n" . 
'<!-- _________________________ Finish Content _________________________ -->' . "\n\n";


if ($cmsms_layout == 'r_sidebar') {
	echo "\n" . '<!-- _________________________ Start Sidebar _________________________ -->' . "\n" . 
	'<section id="sidebar" role="complementary">' . "\n";
	
	get_sidebar();
	
	echo "\n" . '</section>' . "\n" . 
	'<!-- _________________________ Finish Sidebar _________________________ -->' . "\n";
} elseif ($cmsms_layout == 'l_sidebar') {
	echo "\n" . '<!-- _________________________ Start Sidebar _________________________ -->' . "\n" . 
	'<section id="sidebar" class="fl" role="complementary">' . "\n";
	
	get_sidebar();
	
	echo "\n" . '</section>' . "\n" . 
	'<!-- _________________________ Finish Sidebar _________________________ -->' . "\n";
}
?>
<?php 
	if(ICL_LANGUAGE_CODE == 'fr-ca'){
		$map_url = get_stylesheet_directory_uri().'/maps-fr/'; 
	}else{
		$map_url = get_stylesheet_directory_uri().'/maps/'; 
	}
?>
<script>

jQuery(document).ready(function($){
	map();
});

function map(){

	mapSize();
	
	jQuery(window).resize(function() {
		mapSize();
	});
	
	function mapSize(){
		var window = jQuery(window).width();
		var container = jQuery('.entry').width()
		console.log(container);
		if (container >= 848){
			loadMap('map-900');
		} else if (container > 800 && container <= 847){ 
			loadMap('map-800');
		} else if (container > 623 && container <= 819){ 
			loadMap('map-600');
		} else if (container > 460 && container <= 622){ 
			loadMap('map-480');
		} else {
			loadMap('map-320');
		}
	}
	
	function loadMap(size){
		var map_url = "<?php echo $map_url; ?>";
		var map_query = "?<?php echo $_SERVER['QUERY_STRING']; ?>";
		if (size=='map-900' && !jQuery("#map-canvas").hasClass('map-900')){
			jQuery("#map-canvas").load( map_url+"map-900.php"+map_query);
			jQuery("#map-canvas").removeClass();
			jQuery("#map-canvas").addClass('map-900');
		}
		
		if (size=='map-800' && !jQuery("#map-canvas").hasClass('map-800')){
			jQuery("#map-canvas").load( map_url+"map-800.php"+map_query);
			jQuery("#map-canvas").removeClass();
			jQuery("#map-canvas").addClass('map-800');
		}

		if (size=='map-600' && !jQuery("#map-canvas").hasClass('map-600')){
			jQuery("#map-canvas").load( map_url+"map-600.php"+map_query);
			jQuery("#map-canvas").removeClass();
			jQuery("#map-canvas").addClass('map-600');
		}

		if (size=='map-480' && !jQuery("#map-canvas").hasClass('map-480')){
			jQuery("#map-canvas").load( map_url+"map-480.php"+map_query);
			jQuery("#map-canvas").removeClass();
			jQuery("#map-canvas").addClass('map-480');
		}

				
		if (size=='map-320' && !jQuery("#map-canvas").hasClass('map-320')){
			jQuery("#map-canvas").load( map_url+"map-320.php"+map_query);
			jQuery("#map-canvas").removeClass();
			jQuery("#map-canvas").addClass('map-320');
		}
	}

}

</script>
<?php 
get_footer();