<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<?php get_template_part('head'); ?>
	<body <?php body_class(moumou_get_lang()); ?>>
		<div class="page.php">
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
			
				<div class="container">
					<div class="row no-gutters">
					
						<div class="col-sm-1">
							<?php get_sidebar(); ?>
						</div>
						<div class="col-sm-10">

							<article id="main-article" >
							
								<?php if (have_posts()): ?>
								<?php while (have_posts()): the_post(); ?>
									<section id="<?php echo get_post()->post_name; ?>" <?php post_class(); ?> >
										<header>
											<?php the_title(); ?>
										</header>
										<div class="content-section">
											<?php the_content(); ?>
										</div>
									</section>
								<?php endwhile; ?>
								<?php endif; ?>
							
							</article>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
			<?php get_footer(); ?>
			
		</div>
		<?php wp_footer(); ?>
	</body>
</html>