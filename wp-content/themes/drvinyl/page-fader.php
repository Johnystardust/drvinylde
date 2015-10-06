<?php
	/*
		Template name: Fader
	*/
	get_header("fader");
	
	if(have_posts()) {
		while(have_posts()) {
			the_post();
				
				?>
				<div id="content">
					<h1><?php the_title(); ?></h1>
					<!-- intro-content -->
					<div class="intro-content">
						<?php
							the_content();
						?>
					</div>
				</div>
				
			<?php
		}
	}
	get_footer();
?>