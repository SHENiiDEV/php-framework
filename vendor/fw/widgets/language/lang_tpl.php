<?php foreach ($this->languages as $k => $v):?>
        <div class="col-md-4 col-sm-4 col-xs-12 language"><a href="/language/change?lang=<?php echo $k; ?>" class="language btn btn-primary btn-block"><?php echo $v['title']; ?></a></div>
<?php endforeach; ?>