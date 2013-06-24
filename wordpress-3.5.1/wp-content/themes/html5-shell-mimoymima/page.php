<?php get_header(); ?>

<?php // look to see if we've disabled sidebar in a custom field, if not show it
	$disableSidebarLeft = get_post_meta($post->ID, 'disableSidebarLeft', $single = true);
	if ($disableSidebarLeft !== 'true') { get_sidebar('SidebarLeft'); }
?>

<!--BEGIN: Content-->
<div id="content" class="page" role="main">
	
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<!--BEGIN: Post-->
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<header>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title='Click to read: "<?php strip_tags(the_title()); ?>"'><?php the_title(); ?></a></h1>
					<time datetime="<?php the_time('c'); ?>" pubdate="pubdate"><?php the_time('F jS, Y'); ?></time>
					<p>by <?php the_author() ?></p>
				</header>
				
				<div class="entry">
					<?php the_content("Continue reading " . the_title('', '', false)); ?>
				</div>
						
			</article>
			<!--END: Post-->

		<?php endwhile; ?>
		
			<?php wp_link_pages(); //this allows for multi-page posts ?>

			<div class="navigation">
				<?php posts_nav_link('&nbsp;','<div class="alignleft">&laquo; Previous Page</div>','<div class="alignright">Next Page &raquo;</div>') ?>
			</div>
			
		<?php else : // ERROR: nothing found ?>

			<h2>No posts were found :(</h2>

	<?php endif; ?>

</div>
<!--END: Content-->

<?php // look to see if we've disabled sidebar in a custom field, if not show it
	$disableSidebarRight = get_post_meta($post->ID, 'disableSidebarRight', $single = true);
	if ($disableSidebarRight !== 'true') { get_sidebar('SidebarRight'); }
?>

<?php get_footer(); ?>