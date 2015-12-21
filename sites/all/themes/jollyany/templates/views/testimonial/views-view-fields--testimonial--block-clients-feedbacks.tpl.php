<div class="testimonial-wrap">
    <?php echo $fields['body']->content; ?>
</div>
<div class="media">
    <img src="<?php print file_create_url($row->field_field_image[0]['rendered']['#item']['uri']); ?>" alt="" class="img-circle img-responsive">
</div><!-- end entry -->
<div class="testimonial-names">
    <h3><?php echo $fields['field_client']->content; ?></h3>
    <span class="readmore"><?php echo $fields['field_regency']->content; ?> (<?php echo $fields['field_company']->content; ?>)</span>
</div><!-- end testimonial-names -->