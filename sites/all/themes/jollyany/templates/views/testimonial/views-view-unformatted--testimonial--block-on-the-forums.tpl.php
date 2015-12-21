<div class="widget">
    <h3>ON THE FORUMS</h3>
    <div id="owl-testimonial-widget" class="owl-carousel padding-top">
        <?php foreach ($rows as $id => $row): ?>
            <div class="testimonial-carousel text-center">
                <?php print $row; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>