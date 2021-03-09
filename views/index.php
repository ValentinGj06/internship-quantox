<?php use thecodeholic\phpmvc\Application;
                use app\models\User;
                $model = new User();

            if (Application::isGuest()): ?>
<h1>Welcome <?php echo $name ?></h1>
            <?php else: ?>

<h1><?= "Welcome ". Application::$app->user->getDisplayName()." (".Application::$app->user->getDisplayType().")" ?></h1>

            <?php endif; ?>
