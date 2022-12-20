<?php 
use \yii\helpers\Html;
?>

<p>Silahkan pilih jenis periode yang diinginkan :</p>
<ol class="period">
    <li><?= Html::a('Monthly', ['externa-monthly/index','fid'=>$fid]) ?></li>
    <li><?= Html::a('3 Monthly', ['externa-3-monthly/index','fid'=>$fid, 'type'=>'3 Monthly']) ?></li>
    <li><?= Html::a('6 Monthly', ['externa-6-monthly/index','fid'=>$fid, 'type'=>'6 Monthly']) ?></li>
    <li><?= Html::a('Yearly', ['externa-yearly/index','fid'=>$fid, 'type'=>'Yearly']) ?></li>
</ol>
<style>
    ol {list-style:none;}
    ol.period li{background:#fff;padding:5px 20px;margin-bottom:10px;width:200px;border:1px solid #ddd;}
</style>