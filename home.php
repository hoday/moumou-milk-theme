<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<?php get_template_part('head'); ?>
	<body <?php body_class(moumou_get_lang()); ?>>
		<div class="home.php">
		</div>
		<div id="main-wrapper" class="flex-container">
		
			<?php get_header(); ?>
			
			<div id="main-content" class="flex-middle">
			
				<div id="heroimg" class="heroimg heroimg-haslogo <?php echo (is_front_page() ? 'heroimg-frontpage' : ''); ?>" style="background-image:url(<?php header_image(); ?>)">
					<div class="heroimg-logo-wrapper">
					<?php
						if (function_exists('the_custom_logo')) {
							the_custom_logo();
						}
					?>	
					</div>					
				</div>

				<article id="main-article"class="content-section-padding">
				
					<?php if (have_posts()): ?>
					<?php while (have_posts()): the_post(); ?>
						<section id="<?php echo get_post()->post_name; ?>" <?php post_class(); ?>>
							<div class="post-thumbnail post-col-0">
								<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'title' => 'Feature image']); ?>
							</div>
							<div class="post-text post-col-1">
								<header>
									<?php the_title(); ?>
								</header>
								<div class="post-date">
									<?php the_time( get_option( 'date_format' ) ); ?>
								</div>
								<div class="content-section">
									<?php the_content(); ?>
								</div>
							</div>
							<div class="post-col-2">
							
							</div>
						</section>
					<?php endwhile; ?>
					<?php endif; ?>
				
					<div id="archive-navlink-container">
						<div id="archive-navlink-prev">
							<?php previous_posts_link('<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/prev.svg" />' ); ?> 
						</div>
						<div  id="archive-navlink-next">							
							<?php next_posts_link('<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/next.svg" />' ); ?> 
						</div>
					</div>							
				
				</article>
				
			</div>
			
			<?php get_footer(); ?>
			
		</div>
		<?php wp_footer(); ?>
	</body>
</html>