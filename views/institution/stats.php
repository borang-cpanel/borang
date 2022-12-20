<h3>Statistic </h3>


<table class="table table-bordered">
<tr class="blue">
    <th rowspan="2">INSTITUTION</th>
    <th colspan="4">MACHINE</th>
    <th colspan="5">SUPPORT</th>
    <th colspan="2">HR</th>
    <th colspan="4">PATIENT</th>
    <th colspan="3">WAITING LIST</th>
</tr>

<tr>
    <th>Brachytherapy</th>
    <th>LINAC</th>
    <th>TOMOTHERAPY</th>
    <th>COBALT</th>

    <th>Simulator</th>
    <th>CT Simulator</th>
    <th>Dosimeter</th>
    <th>Surveymeter</th>
    <th>UPS</th>

    <th>Doctor</th>
    <th>Staff</th>

    <th>Externa</th>
    <th>2D</th>
    <th>3D</th>
    <th>Total Pasien</th>

    <th>Externa</th>
    <th>Brachytherapy</th>

</tr>
<?php foreach ($dataProvider->models as $model): ?>
<tr>
    <td><?= $model->name ?></td>
    <?php $stats = $model->getYearlyStats($year); ?>

    <td><?= $stats['brachytherapy'] ?></td>
    <td><?= $stats['linac'] ?></td>
    <td><?= $stats['tomo'] ?></td>
    <td><?= $stats['cobalt'] ?></td>

    <td><?= $stats['simulator'] ?></td>
    <td><?= $stats['ctsimulator'] ?></td>
    <td><?= $stats['dosimeter'] ?></td>
    <td><?= $stats['surveymeter'] ?></td>
    <td><?= $stats['ups'] ?></td>

    <td><?= $stats['doctor'] ?></td>
    <td><?= $stats['staff'] ?></td>
    

    <td><?= $stats['patient_externa'] ?></td>
    <td><?= $stats['patient_interna_2d'] ?></td>
    <td><?= $stats['patient_interna_3d'] ?></td>
    <td><?= $stats['patient'] ?></td>

    <td><?= $stats['waiting_externa'] ?></td>
    <td><?= $stats['waiting_brachytherapy'] ?></td>

</tr>
<?php endforeach; ?>
</table>
<style>
    th{text-align:center;}
    tr.blue th{background-color:#007bff;color:#eee;}
    th{background-color:#f2f2f2}
.content-wrapper > .content{overflow:auto;}
</style>