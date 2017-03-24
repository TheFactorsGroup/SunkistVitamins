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
?>

<!-- Begin Easy Locator Store Locator Service //-->
<script type="text/javascript" src="https://www.easylocator.net/api/embedIframe/skv-<?= ICL_LANGUAGE_CODE ?>-responsive/controller/search/function/map3/template/template3_1"></script><div id="EasyLocatorWrapper"></div>
<!-- End Easy Locator Store Locator Service //-->

<br><br>

<?php
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





    	<!-- Begin Easy Locator Store Locator Service //-->
		<!--<script type="text/javascript" src="//www.easylocator.net/api/embedIframe/skv-<?= ICL_LANGUAGE_CODE ?>-responsive/controller/search/function/map3/template/template3_1"></script><div id="EasyLocatorWrapper"></div>-->
		<!-- End Easy Locator Store Locator Service //-->


<?php 
get_footer();