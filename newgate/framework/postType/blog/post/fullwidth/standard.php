<?php
/**
 * @package WordPress
 * @subpackage Newgate
 * @since Newgate 1.0
 * 
 * Blog Post Full Width Standard Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsms_post_featured_image_show = get_post_meta(get_the_ID(), 'cmsms_post_featured_image_show', true);

?>

<!--_________________________ Start Standard Article _________________________ -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php cmsms_post_date('post', 'post'); ?>
		<div class="ovh">
			<?php 
				cmsms_heading_nolink(get_the_ID(), 'post', true) . "\n";
				
				cmsms_meta('post', 'post');
				
				if (!post_password_required()) {
					cmsms_comments('post');
				} 
			?>
		</div>
	</header>
	<?php 
		if (!post_password_required()) {
			if (has_post_thumbnail() && $cmsms_post_featured_image_show == 'true') {
				cmsms_thumb(get_the_ID(), 'full-thumb', false, 'img_' . get_the_ID(), true, false, true, true, false);
			}
		}
	?>
	<footer class="entry-meta">
		<?php 
			echo '<div class="entry-content">' . "\n";
			
			the_content();
			
			wp_link_pages(array( 
				'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . __('Pages', 'cmsmasters') . ':</strong>', 
				'after' => '</div>' . "\n", 
				'link_before' => ' [ ', 
				'link_after' => ' ] ' 
			));
			
			echo "\t\t" . '</div>' . "\n";
			
			cmsms_content_composer(get_the_ID());
			
			cmsms_tags(get_the_ID(), 'post', 'post');
		?>
	</footer>
</article>
<!--_________________________ Finish Standard Article _________________________ -->
