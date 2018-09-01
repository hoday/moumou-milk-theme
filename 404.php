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
							
								<div id="content-404">
								<?php _e('<strong>Error: </strong>The page could not be found.', 'moumoucow'); ?>
								</div>
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