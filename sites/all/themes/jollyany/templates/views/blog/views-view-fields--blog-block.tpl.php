<?php 
	global $image_default; 
	if(isset($row->field_field_image[0])) {
		$image_default = file_create_url($row->field_field_image[0]['rendered']['#item']['uri']);
	}
?>
<li>
    <a href="<?php echo drupal_lookup_path('alias',"node/".$row->nid); ?>"><img width="70" height="70" src="<?php print $image_default;?>" alt="" /><?php print $row->node_title; ?></a>
    <a class="readmore" href="<?php echo drupal_lookup_path('alias',"node/".$row->nid); ?>"><?php print format_date($row->node_created, 'custom', 'F d, Y'); ?></a>
	<span><i class="fa fa-comment"></i> <a href="<?php echo drupal_lookup_path('alias',"node/".$row->nid); ?>#comments"><?php print $fields['comment_count']->content; ?> Comment<?php if ($fields['comment_count']->content> 0 && $fields['comment_count']->content != "1" ) { echo "s"; } ?></a></span>
</li>