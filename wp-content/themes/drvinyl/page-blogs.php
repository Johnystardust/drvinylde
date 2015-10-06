<?php
	/*
		Template name: Blog archief
	*/
	get_header("fader");
	
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
					
					<?php
						$blogs = new WP_Query(array('paged' => $paged, "post_type" => "post", "showposts" => 5 ));
	  
				
						if($blogs->have_posts()) {
							while($blogs->have_posts()) {
								$blogs->the_post();
									
								?>
								<div class="post">
									<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
									<div class="entry-meta">
										<?=date("d") ?> <?=dutch_month(date("n"))?> <?=date("Y")?>
									</div>
									<div class="intro-content">
										<?php the_excerpt(); ?>
									</div>
								</div>
								<?php
							}
						}
						
					?>
					
					<div class="pagination">
					
						<?php wp_pagenavi(array(
							'query' => $blogs   
						)); 
						
						wp_reset_query();?>
					
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