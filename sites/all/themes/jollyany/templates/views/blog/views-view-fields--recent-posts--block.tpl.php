<?php 
	global $image_default; 
	if(isset($row->field_field_image[0])) {
		$image_default = file_create_url($row->field_field_image[0]['rendered']['#item']['uri']);
	}
?>
<li>
	<a href="<?php echo drupal_lookup_path('alias',"node/".$row->nid); ?>">
		<img width="81" height="69" class="img-rounded" src="<?php print $image_default; ?>" alt="">
	</a>
</li>