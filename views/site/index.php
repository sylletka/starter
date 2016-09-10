<?php

/* @var $this yii\web\View */

$this->title = 'Home';

?>
<?php $settings = Yii::$app->settings; ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3"><?= $settings->get('Site.name') ?></h1>
    <p class="lead"><?= $settings->get('Site.description') ?></p>
  </div>
</div>
