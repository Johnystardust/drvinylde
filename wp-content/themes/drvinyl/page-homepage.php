<?php
	/*
		Template name: Homepage
	*/
	get_header("homepage");
	
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
					<h1> Welkom bij Dr. Vinyl Nederland </h1>
					<!-- intro-content -->
					<div class="intro-content">
						<?php
							the_content();
						?>
					</div>
					<!-- heading -->
					<div class="heading">
						<h2>Nieuws</h2>
					</div>
					<!-- list-news -->
					<ul class="news">
						<?php
							$args = array(
								'post_type' => "post",
								'showposts' => 3
							);
							
							$news = new WP_Query($args);
							
							if($news->have_posts()) {
								while($news->have_posts()) {
									$news->the_post();
									?>
									<li>
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<span class="theme"><?php the_field("theme")?></span>
										<?php
											the_excerpt();
										?>
									</li>
									<?php
								}
							}
						?>
					</ul>
					<!-- headeing -->
					<? /*
					<div class="heading">
						<h2>Tevreden klanten van Dr. Vinyl</h2>
					</div>
					<!-- product-list -->
					<ul class="product-list">
						<li><span><em><a href="#"><img src="<?=get_bloginfo("template_url")?>/images/ico1.gif" width="93" height="48" alt="image description" /></a></em></span></li>
						<li><span><em><a href="#"><img src="<?=get_bloginfo("template_url")?>/images/ico2.gif" width="46" height="46" alt="image description" /></a></em></span></li>
						<li><span><em><a href="#"><img src="<?=get_bloginfo("template_url")?>/images/ico3.gif" width="103" height="30" alt="image description" /></a></em></span></li>
						<li><span><em><a href="#"><img src="<?=get_bloginfo("template_url")?>/images/ico4.gif" width="65" height="38" alt="image description" /></a></em></span></li>
					</ul>
					<!-- product-list -->
					<ul class="product-list">
						<li><span><em><a href="#"><img src="<?=get_bloginfo("template_url")?>/images/ico8.gif" width="40" height="40" alt="image description" /></a></em></span></li>
						<li><span><em><a href="#"><img src="<?=get_bloginfo("template_url")?>/images/ico7.gif" width="82" height="46" alt="image description" /></a></em></span></li>
						<li><span><em><a href="#"><img src="<?=get_bloginfo("template_url")?>/images/ico6.gif" width="74" height="16" alt="image description" /></a></em></span></li>
						<li><span><em><a href="#"><img src="<?=get_bloginfo("template_url")?>/images/ico5.gif" width="103" height="26" alt="image description" /></a></em></span></li>
					</ul>
					*/ ?>
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