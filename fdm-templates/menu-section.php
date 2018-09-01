<div class="fdm-addon-section-col-wrapper">

	<div class="fdm-addon-section-col-0">

		<div class="fdm-addon-item-image" >
			<?php 

				global $_wp_additional_image_sizes;
				$thumb_width = $_wp_additional_image_sizes['fdm-item-thumb-cover']['width'];
				$thumb_height = $_wp_additional_image_sizes['fdm-item-thumb-cover']['height'];

				//$svg_width = 229; // for clippedimgmilk
				//$svg_height  = 224;

				//$svg_width = 227; // for clippedimgsoftcream
				//$svg_height  = 269;  	

				$svg_width = 242; // for clippedimgbread
				$svg_height  = 186;  	
				
				$scale_factor = max($svg_height/$thumb_height, $svg_width/$thumb_width);

				$scaled_width  = $thumb_width  * $scale_factor;
				$scaled_height = $thumb_height * $scale_factor;

				error_log("thumb width: ".$thumb_width);
				error_log("thumb height: ".$thumb_height);
				
				error_log("svg width: ".$svg_width);
				error_log("svg height: ".$svg_height);			
				
				error_log("scaled width: ".$scaled_width);
				error_log("scaled height: ".$scaled_height);
				
				
				

			?>	

		<?php include('clippedimgbread.svg'); ?>
		</div>	
	
	</div>
	
	<div class="fdm-addon-section-col-1">

		<ul <?php echo fdm_format_classes( $this->classes ); ?>>
			<li class="fdm-section-header">
				<h3>
					<span class="title-hasbgimages">
						<?php echo $this->title; ?>
						<span class="title-back-img"></span>
					</span>
				</h3>

				<?php if ( $this->description ) : ?>
				<div class="fdm-addon-section-desc">
					<?php echo $this->description; ?></div>
				<?php endif; ?>

			</li>
			<?php echo $this->print_items(); ?>
			<?php /*added below*/ ?>
			<?php echo $this->prices(); ?>
		

		</ul>

	</div>
	<div class="fdm-addon-section-col-2">
		
	</div>

</div>
