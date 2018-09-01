<div id="fb-root"></div>

<header id="main-header" class="flex-top">
		
<nav id="main-nav" class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-brand">
		<?php the_custom_logo(); ?>	
	</div>

	<?php wp_nav_menu(array(
		'menu_class' => 'navbar-nav mr-auto', 
		'container' => 'div', 
		'container_class' => 'collapse navbar-collapse', 
		'container_id' => 'navbarSupportedContent',
		'before' => '<span class="nav-link">',
		'after' => '</span>',
		)); 
	?>
	
</nav>


</header>
