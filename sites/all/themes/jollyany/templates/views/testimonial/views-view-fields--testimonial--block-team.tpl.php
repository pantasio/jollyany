<div class="entry">
    <img class="img-responsive" src="<?php print file_create_url($row->field_field_image[0]['rendered']['#item']['uri']);?>" alt="">
</div><!-- end entry -->
<h3><?php echo $fields['field_client']->content; ?> <span>|</span> <small><?php echo $fields['field_company']->content; ?></small></h3>
<?php echo $fields['body']->content; ?>
