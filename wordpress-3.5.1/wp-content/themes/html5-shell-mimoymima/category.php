<?php get_header(); ?>

<?php // to disable this sidebar on a page by page basis just add a custom field to your page or post of disableSidebarLeft = true
	$disableSidebarLeft = get_post_meta($post->ID, 'disableSidebarLeft', $single = true);
	if ($disableSidebarLeft !== 'true') { get_sidebar('SidebarLeft'); }
?>

<!--BEGIN: Content-->
<div id="content" class="clear-fix" role="main">
	
	<?php if (have_posts()) : ?>
		
		<h1>Posts in <?php the_category(', ') ?></h1>

		<?php while (have_posts()) : the_post(); ?>

			<!--BEGIN: Post-->
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<header>
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title='Click to read: "<?php strip_tags(the_title()); ?>"'><?php the_title(); ?></a></h2>
					<p class="post-date"><?php the_time('F jS, Y') ?> &#8212; <?php the_category(', ') ?></p>
				</header>
				
				<div class="entry">
					<?php the_excerpt("Continue reading &rarr;"); ?>
				</div>
								
				<!--BEGIN: Post Meta Data-->
				<footer class="post-meta-data">
					<ul class="horiz-list">
						<li><?php the_time('F jS, Y') ?> by <?php the_author() ?></li>
						<li class="add-comment"><?php comments_popup_link('Share Your Comments', '1 Comment', '% Comments'); ?></li>
						<li><?php edit_post_link('[Edit]', '<small>', '</small>'); ?></li>
						<li><div class="utw"><?php if(function_exists ('UTW_ShowTagsForCurrentPost')) {UTW_ShowTagsForCurrentPost("commalist","",0); } ?></div></li>
				</footer>
				<!--END: Post Meta Data-->
			
			</article>
			<!--END: Post-->
				
		<?php endwhile; ?>

			<div class="navigation">
				<?php posts_nav_link('&nbsp;','<div class="alignleft">&laquo; Previous Page</div>','<div class="alignright">Next Page &raquo;</div>') ?>
			</div>
			
		<?php else : //ERROR: nothing was found ?>

			<h2>No posts were found :(</h2>

	<?php endif; ?>

</div>
<!--END: Content-->

<?php // look to see if we've disabled sidebar in a custom field, if not show it
	$disableSidebarRight = get_post_meta($post->ID, 'disableSidebarRight', $single = true);
	if ($disableSidebarRight !== 'true') { get_sidebar('SidebarRight'); }
?>

<?php get_footer(); ?>