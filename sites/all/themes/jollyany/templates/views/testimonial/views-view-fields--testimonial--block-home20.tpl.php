<div class="testimonial">
    <img width="131" height="131" src="<?php print file_create_url($row->field_field_image[0]['rendered']['#item']['uri']);?>" class="img-circle img-thumbnail" alt="">
    <?php echo $fields['body']->content; ?>
    <h3><?php echo $fields['field_client']->content; ?> - <?php echo $fields['field_regency']->content; ?> (<?php echo $fields['field_company']->content; ?>)</h3>
</div><!-- end tweet -->