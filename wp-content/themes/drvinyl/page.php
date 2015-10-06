<?php
	/*
	
	*/
	get_header();
	
	if(have_posts()) {
		while(have_posts()) {
			the_post();
			
				if(get_field("slide_start")) {
					?><script type="text/javascript">$(document).ready(function() { $("#<?=get_field("slide_start")?>").fadeIn(200); });</script><?php
				} else {
					?><script type="text/javascript">$(document).ready(function() { $(".slide:first").fadeIn(200); });</script><?php
				}
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
				
				<?php if(get_field('images')): ?>
				<script type="text/javascript">
				$(document).ready(function() {
					$("#slideshow").show();
				});
				</script>
				<?php endif; ?>
			<?php
		}
	}
	get_footer();
?>