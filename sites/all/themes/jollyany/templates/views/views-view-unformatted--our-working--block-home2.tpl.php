<?php global $theme_root; ?>
<section id="one-parallax" class="parallax" style="background-image: url('<?php echo $theme_root; ?>/demos/parallax_06.jpg');" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
    <div class="overlay">
        <div class="container">
            <div class="general-title">
                <h2>Our Working Process</h2>
                <hr>
                <p class="lead">These is the team behind Jollyany Agency</p>
            </div>

            <div class="custom-services">
                <?php
                $i = 1;
                foreach ($rows as $id => $row):
                    ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 <?php
                         if ($i == 1) {
                             echo 'first';
                         } elseif ($i == 4) {
                             echo 'last';
                         }
                         ?>">
                             <?php print $row; ?>                                
                    </div>
                    <?php
                    $i++;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>