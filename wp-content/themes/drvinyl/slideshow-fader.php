<?php if(get_field('fader')): ?>
<div id="fader">

	<div class="images">
	<?php while(the_repeater_field('fader')): ?>
		<img src="<?=crop_url(get_sub_field('image'), 790, 295, "")?>" alt="" class="image" />
	<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>