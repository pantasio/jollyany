<div class="widget">
    <h3>CLIENTS FEEDBACK'S</h3>
    <div id="owl-testimonial-widget" class="owl-carousel">
        <?php foreach ($rows as $id => $row): ?>
            <div class="testimonial-carousel text-center">
                <?php print $row; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>