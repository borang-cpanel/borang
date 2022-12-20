<?php  use yii\helpers\Url;

$baseUrl = Url::base();
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $baseUrl ?>/" class="brand-link">
        <img src="<?=$baseUrl ?>/images/pori-sidebar.png"  class="brand-image " style="opacity: .8">
        <span>&nbsp;</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="color:white">
            <?php if (Yii::$app->user->identity): ?>
                Hello, <?= Yii::$app->user->identity->username;?>
            <?php endif?>
        </div>

        <nav class="mt-2">
            <?php if (Yii::$app->user->identity):?>
            <?=
                \hail812\adminlte\widgets\Menu::widget([
                    'items' => [
                        ['label' => 'Institution', 'icon' => 'tachometer-alt', 'url' => ['institution/index']],
                        ['label' => 'Equipment', 'icon' => 'tachometer-alt', 'url' => ['institution/machine']],
                        ['label' => 'Brachyterapy', 'icon' => 'tachometer-alt', 'url' => ['institution/brachyterapy']],
                        ['label' => 'Staff', 'icon' => 'tachometer-alt', 'url' => ['institution/staff']],
                        ['label' => 'Patients Profile', 'icon' => 'tachometer-alt', 'url' => ['institution/patient']],
                        ['label' => 'Waiting List', 'icon' => 'tachometer-alt', 'url' => ['institution/waiting-list']],
                        ['label' => 'Statistics', 'icon' => 'tachometer-alt', 'url' => ['institution/stats']],
                    ],
                ]);
            ?>
            <?php else: ?>
            <?=
                \hail812\adminlte\widgets\Menu::widget([
                    'items' => [
                        ['label' => 'Login', 'icon' => 'tachometer-alt', 'url' => ['user/security/login']],
                    ],
                ]);
            ?>
            <?php endif ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>