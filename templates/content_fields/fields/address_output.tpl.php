<?php if ($listing->locations): ?>
<div class="w2dc_field w2dc_field_output_block w2dc_field_output_block_<? echo $content_field->id; ?>">
	<?php if ($content_field->icon_image): ?>
		<img class="w2dc_field_icon" src="<?php echo W2DC_RESOURCES_URL; ?>images/content_fields_icons/<?php echo $content_field->icon_image; ?>" />
	<?php endif; ?>
	<?php if (!$content_field->is_hide_name): ?>
	<span class="w2dc_field_name"><?php echo $content_field->name?>:</span>
	<?php endif; ?>
	<?php foreach ($listing->locations AS $location): ?>
		<?php //if ($location->selected_location): ?>
		<address class="w2dc_location">
			<?php echo $location->getWholeAddress(); ?>
		</address>
		<?php //endif; ?>
	<?php endforeach; ?>
</div>
<?php endif; ?>