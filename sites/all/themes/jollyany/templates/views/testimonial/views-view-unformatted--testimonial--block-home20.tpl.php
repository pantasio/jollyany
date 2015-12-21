<?php global $theme_root; ?>
<section id="one-parallax" class="parallax" style="background-image: url('<?php echo $theme_root; ?>/demos/parallax_02.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <div class="overlay">
        <div class="container">
            <div class="testimonial-widget">
                <div id="owl-testimonial" class="owl-carousel">
                    <?php foreach ($rows as $id => $row): ?>
                        <?php print $row; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>