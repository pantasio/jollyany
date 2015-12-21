<?php 
	global $image_default; 
	if(isset($row->field_field_image[0])) {
		$image_default = file_create_url($row->field_field_image[0]['rendered']['#item']['uri']);
	}
?>
<a class="rsImg" data-rsbigimg="<?php print $image_default;?>" href="<?php print $image_default;?>" data-rsw="835" data-rsh="615">
	<img alt="" class="rsTmb" src="<?php print $image_default;?>" height="75" width="96">
</a>
