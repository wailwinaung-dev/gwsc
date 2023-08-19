<?php

include('../../helpers/FLUSH.php');
include('../../database/model/PitchTypesTable.php');

$pitchTypeTable = new PitchTypesTable();
$pitchTypes = $pitchTypeTable->getAll();

?>

<?php 
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>

<div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="h3">Pitch Types</h1>

    <a href="add.php" class="btn btn-success">+ New Pitch Types</a>
</div>
<?php if (FLUSH::check('success')) : ?>
<div class="alert alert-success">
    <?= FLUSH::message('success') ?>
</div>
<?php endif ?>


<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">created</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pitchTypes as $key => $pitchTypes) : ?>
            <tr>
                <th scope="row"><?= $key +1 ?></th>
                <td><?= $pitchTypes['name'] ?></td>
                <td><?= $pitchTypes['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php 
    include("../../layout/admin/footer.php");
?>