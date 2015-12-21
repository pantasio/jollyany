<div class="ch-item">	
    <div class="ch-info-wrap">
        <div class="ch-info">
            <div class="ch-info-front">
                <i class="fa <?php print render($content['field_icon']); ?> fa-4x"></i>
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="ch-info-back">
                <h3>RESULTS</h3>
                <?php print $node->body['und'][0]['summary']; ?>
            </div>
        </div>
    </div>
</div>