<?php
	/*
		Template name: Service
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
					
					<div class="service-large">
						<a href="#" class="spot groningen" rel="groningen"></a>
						<a href="#" class="spot leeuwarden" rel="leeuwarden"></a>
						<a href="#" class="spot assen" rel="assen"></a>
						<a href="#" class="spot flevoland" rel="flevoland"></a>
						<a href="#" class="spot zwolle" rel="zwolle"></a>
						<a href="#" class="spot arnhem" rel="arnhem"></a>
						<a href="#" class="spot amersfoort" rel="amersfoort"></a>
						<a href="#" class="spot amsterdam" rel="amsterdam"></a>
					        <a href="#" class="spot rotterdam" rel="rotterdam"></a>
						<a href="#" class="spot denbosch" rel="denbosch"></a>
						<a href="#" class="spot zeeland" rel="zeeland"></a>
						<a href="#" class="spot limburg" rel="limburg"></a>
					</div>
						
					<div class="box">
									
						<div class="servicepoints service-groningen">
							<h1>Dr. Vinyl <br /> <span>Groningen</span></h1>
							<address>
								<img src="<?=get_bloginfo("template_url")?>/images/locatie.jpg" alt="" style="float: left; margin: 0px 10px 10px 0px;" />
								<span>Contactpersoon:</span> <em>Marc Roose</em>
								<span>Telefoon:</span> <em>033 25 83 815</em> 
								<span>Mobiel:</span> <em>06 52 313 699</em>
								<span>E-mail:</span> <em><a href="mailto:info@drvinyl.nl">info@ drvinyl.nl</a></em>
								<span>Regio:</span> <em>Groningen</em>
								<span>Adres:</span> <em>Bel voor de mogelijkheden van ons mobiele servicepunt</em>
							</address>
						</div>
						
						<div class="servicepoints service-leeuwarden">
							<h1>Dr. Vinyl <br /> <span>Friesland</span></h1>
							<address>
								<img src="<?=get_bloginfo("template_url")?>/images/locatie.jpg" alt="" style="float: left; margin: 0px 10px 10px 0px;" />
								<span>Contactpersoon:</span> <em>Marc Roose</em>
								<span>Telefoon:</span> <em>033 25 83 815</em> 
								<span>Mobiel:</span> <em>06 52 313 699</em>
								<span>E-mail:</span> <em><a href="mailto:info@drvinyl.nl">info@ drvinyl.nl</a></em>
								<span>Regio:</span> <em>Friesland</em>
								<span>Adres:</span> <em>Bel voor de mogelijkheden van ons mobiele servicepunt</em>
							</address>
						</div>
						
						<div class="servicepoints service-assen">
							<h1>Dr. Vinyl <br /> <span>Drenthe</span></h1>
							<address>
								<img src="<?=get_bloginfo("template_url")?>/images/locatie.jpg" alt="" style="float: left; margin: 0px 10px 10px 0px;" />
								<span>Contactpersoon:</span> <em>Marc Roose</em>
								<span>Telefoon:</span> <em>033 25 83 815</em> 
								<span>Mobiel:</span> <em>06 52 313 699</em>
								<span>E-mail:</span> <em><a href="mailto:info@drvinyl.nl">info@ drvinyl.nl</a></em>
								<span>Regio:</span> <em>Drenthe</em>
								<span>Adres:</span> <em>Bel voor de mogelijkheden van ons mobiele servicepunt</em>
							</address>
						</div>
						
						<div class="servicepoints service-flevoland">
							<h1>Dr. Vinyl <br /> <span>Flevoland</span></h1>
							<address>
								<img src="<?=get_bloginfo("template_url")?>/images/locatie.jpg" alt="" style="float: left; margin: 0px 10px 10px 0px;" />
								<span>Contactpersoon:</span> <em>Marc Roose</em>
								<span>Telefoon:</span> <em>033 25 83 815</em> 
								<span>Mobiel:</span> <em>06 52 313 699</em>
								<span>E-mail:</span> <em><a href="mailto:info@drvinyl.nl">info@ drvinyl.nl</a></em>
								<span>Adres:</span> <em>Mobiel Servicepunt</em>
								<span>Regio:</span> <em>Flevoland</em>
							</address>
						</div>
						
						<div class="servicepoints service-zwolle">
							<h1>Dr. Vinyl <br /> <span>Overijssel</span></h1>
							<address>
								<img src="<?=get_bloginfo("template_url")?>/images/locatie.jpg" alt="" style="float: left; margin: 0px 10px 10px 0px;" />
								<span>Contactpersoon:</span> <em>Marc Roose</em>
								<span>Telefoon:</span> <em>033 25 83 815</em> 
								<span>Mobiel:</span> <em>06 52 313 699</em>
								<span>E-mail:</span> <em><a href="mailto:info@drvinyl.nl">info@ drvinyl.nl</a></em>
								<span>Regio:</span> <em>Overijssel</em>
								<span>Adres:</span> <em>Bel voor de mogelijkheden van ons mobiele servicepunt</em>
							</address>
						</div>
						
						<div class="servicepoints service-arnhem">
							<h1>Dr. Vinyl <br /> <span>Gelderland</span></h1>
							<address>
								<img src="<?=get_bloginfo("template_url")?>/images/locatie.jpg" alt="" style="float: left; margin: 0px 10px 10px 0px;" />
								<span>Contactpersoon:</span> <em>Marc Roose</em>
								<span>Telefoon:</span> <em>033 25 83 815</em> 
								<span>Mobiel:</span> <em>06 52 313 699</em>
								<span>E-mail:</span> <em><a href="mailto:info@drvinyl.nl">info@ drvinyl.nl</a></em>
								<span>Adres:</span> <em>Mobiel Servicepunt</em>
								<span>Regio:</span> <em>Gelderland</em>
							</address>
						</div>
						
						
						<div class="servicepoints service-amersfoort">
							<h1>Dr. Vinyl <br /> <span>Midden Nederland</span></h1>
							<address>
								<img src="<?=get_bloginfo("template_url")?>/images/locatie.jpg" alt="" style="float: left; margin: 0px 10px 10px 0px;" />
								<span>Contactpersoon:</span> <em>Marc Roose</em>
								<span>Telefoon:</span> <em>033 25 83 815</em> 
								<span>Mobiel:</span> <em>06 52 313 699</em>
								<span>E-mail:</span> <em><a href="mailto:info@drvinyl.nl">info@ drvinyl.nl</a></em>
								<span>Adres:</span> <em>Drs. W. van Royenstraat 16 3871 AN  Hoevelaken (Alleen op afspraak)</em>
								<span>Regio:</span> <em>Midden Nederland</em>
							</address>
						</div>
						
						
						<div class="servicepoints service-amsterdam">
							<h1>Dr. Vinyl <br /> <span>Noord-Holland</span></h1>
							<address>
								<img src="<?=get_bloginfo("template_url")?>/images/locatie.jpg" alt="" style="float: left; margin: 0px 10px 10px 0px;" />
								<span>Contactpersoon:</span> <em>Marc Roose</em>
								<span>Telefoon:</span> <em>033 25 83 815</em> 
								<span>Mobiel:</span> <em>06 52 313 699</em>
								<span>E-mail:</span> <em><a href="mailto:info@drvinyl.nl">info@ drvinyl.nl</a></em>
								<span>Adres:</span> <em>Mobiel Servicepunt</em>
								<span>Regio:</span> <em>Noord- Holland</em>
							</address>
						</div>
						
						
						<div class="servicepoints service-rotterdam">
							<h1>Dr. Vinyl <br /> <span>Zuid- Holland</span></h1>
							<address>
								<img src="<?=get_bloginfo("template_url")?>/images/locatie-fixed.jpg" alt="" style="float: left; margin: 0px 10px 10px 0px;" />
								<span>Contactpersoon:</span> <em>Ali Himmit</em>
								<span>Mobiel:</span> <em>06 22 789 351</em>
								<span>E-mail:</span> <em><a href="mailto:dordrecht@drvinyl.nl">dordrecht@ drvinyl.nl</a></em>
								<span>Adres:</span> <em>Mobiel Servicepunt</em>
								<span>Regio:</span> <em>Zuid- Holland</em>
							</address>
						</div>
						
						<div class="servicepoints service-denbosch">
							<h1>Dr. Vinyl <br /> <span>Noord- Brabant</span></h1>
							<address>
								<img src="<?=get_bloginfo("template_url")?>/images/locatie-fixed.jpg" alt="" style="float: left; margin: 0px 10px 10px 0px;" />
								<span>Contactpersoon:</span> <em>Anton Pelle</em>
								<span>Mobiel:</span> <em>06 30 023 153</em>
								<span>E-mail:</span> <em><a href="mailto:pelle@drvinyl.nl">pelle@ drvinyl.nl</a></em>
								<span>Adres:</span> <em>Mobiel Servicepunt</em>
								<span>Regio:</span> <em>Noord- Brabant</em>
							</address>
						</div>
						
					
						<div class="servicepoints service-zeeland">
							<h1>Dr. Vinyl <br /> <span>Zeeland</span></h1>
							<address>
								<img src="<?=get_bloginfo("template_url")?>/images/locatie-fixed.jpg" alt="" style="float: left; margin: 0px 10px 10px 0px;" />
								<span>Contactpersoon:</span> <em>Anton Pelle</em>
								<span>Mobiel:</span> <em>06 30 023 153</em>
								<span>E-mail:</span> <em><a href="mailto:pelle@drvinyl.nl">pelle@ drvinyl.nl</a></em>
								<span>Adres:</span> <em>Mobiel Servicepunt</em>
								<span>Regio:</span> <em>Zeeland</em>
							</address>
						</div>
						
						<div class="servicepoints service-limburg">
							<h1>Dr. Vinyl <br /> <span>Limburg</span></h1>
							<address>
								<img src="<?=get_bloginfo("template_url")?>/images/locatie-fixed.jpg" alt="" style="float: left; margin: 0px 10px 10px 0px;" />
								<span>Contactpersoon:</span> <em>Anton Pelle</em>
								<span>Mobiel:</span> <em>06 30 023 153</em>
								<span>E-mail:</span> <em><a href="mailto:pelle@drvinyl.nl">pelle@ drvinyl.nl</a></em>
								<span>Adres:</span> <em>Mobiel Servicepunt</em>
								<span>Regio:</span> <em>Limburg</em>
							</address>
						</div>
						
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