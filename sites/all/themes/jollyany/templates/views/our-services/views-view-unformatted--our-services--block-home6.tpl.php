<div class="container">
    <div class="services-one padding-top text-center">
        <?php $i = 1; foreach ($rows as $id => $row): ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 <?php if ($i % 4 == 1) { echo 'first'; } elseif ($i % 4 == 0) { echo 'last'; } ?>">
                <?php print $row; ?>
            </div>
        <?php $i++; endforeach; ?>
        <div class="clearfix"></div>
    </div>
</div>
<div class="clearfix"></div>