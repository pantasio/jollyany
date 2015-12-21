<div class="container">
    <div class="blog-masonry">
        <?php
        $count_row = 1;
        foreach ($rows as $id => $row):
            ?>
            <div class="col-lg-4 <?php
                 if ($count_row % 3 == 1) {
                     echo 'first';
                 } elseif ($count_row % 3 == 0) {
                     echo 'last';
                 }
                 ?>">
                     <?php print $row; ?>
            </div>
            <?php
            $count_row++;
        endforeach;
        ?>
    </div>
</div>