<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\authclient\widgets\AuthChoice;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
  <!DOCTYPE html>
  <html lang="<?= Yii::$app->language ?>">
    <head>
      <meta charset="<?= Yii::$app->charset ?>"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
      <title><?= Html::encode($this->title) ?></title>
      <link href='https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,400italic,700italic,700|Playfair+Display:400,400italic,700,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <?php $this->head() ?>
    </head>
    <body <?php if  (array_key_exists('BodyclassesBehavior',Yii::$app->controller->getBehaviors() )){ echo 'class=" '.  Yii::$app->controller->getBodyclasses(). '"';} ?>>
      <?php $this->beginBody() ?>
        <div class="wrap">
          <?php
            if (!Yii::$app->user->isGuest){
              $displayname = (Yii::$app->user->identity->displayName) ? Yii::$app->user->identity->displayName : Yii::$app->user->identity->username;
              $img  = (Yii::$app->user->identity->image) ? HTML::img(Yii::$app->user->identity->image) : '';
            }
            NavBar::begin([
              'brandLabel' => 'My Company',
              'brandUrl' => Yii::$app->homeUrl,
              'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
              ],
            ]);
            $items = [
              10 => [
                'label' => 'Home',
                'url' => ['/site/index']
              ],
              20 => [
                'label' => 'About',
                'url' => ['/site/about']
              ],
              30 => [
                'label' => 'Contact',
                'url' => ['/site/contact']
              ],
            ];
            if (Yii::$app->user->isGuest){
              $items[40] = "<li id='authclients'>" . yii\authclient\widgets\AuthChoice::widget(['baseAuthUrl' => ['site/auth'],'popupMode' => true,]) . "</li>";
            } else {
              $items[15] = [
                'label' => Yii::t('app','Events'),
                'url' => ['/event']
              ];
              $items[40] = [
                'label' => $img . ' Logout (' . $displayname . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post'],
                'options' => ['id' => 'login'],
              ];
            }
            echo Nav::widget([
              'options' => ['class' => 'navbar-nav navbar-right'],
              'items' => $items,
              'encodeLabels' => FALSE,
            ]);
            NavBar::end();
          ?>
          <div class="container">	
            <?= Breadcrumbs::widget([
              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
          </div><!-- /#container-->
        </div><!-- /#wrap-->

        <footer class="footer">
          <div class="container">
            <p class="pull-left">&copy; Samuele Saorin <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
          </div>
        </footer>
      <?php $this->endBody() ?>
    </body>
  </html>
<?php $this->endPage() ?>
