<?php ob_start(); ?>


<div class="container jumbotron err404"><img class="img404" src="public/img/sea-otter-1772039_1280.jpg"></div>

<?php $content = ob_get_clean();
require('template.php'); ?>
