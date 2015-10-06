<?php if(get_field('images')): ?>
<div id="slideshow" style="display: none;">
			
	<?php $i = 1; ?>
	<?php while(the_repeater_field('images')): ?>
		<div class="slideshow-image" id="slideshow-<?=$i?>">
			<img src="<?php the_sub_field('image'); ?>" alt="" class="image" />
		</div>
		<?php $i++; ?>
	<?php endwhile; ?>
	
	<ul>
		<?php $i = 1; ?>
		<?php while(the_repeater_field('images')): ?>
			<li><a href="#" rel="slideshow-<?=$i?>" class="toggle-slideshow"><?=$i?></a></li>
			<?php $i++; ?>
		<?php endwhile; ?>
	</ul>

</div>
<?php endif; ?>