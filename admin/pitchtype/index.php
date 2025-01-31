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

<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Pitch Types</h2> 
        <a href="add.php" class="btn btn-success">+ New Pitch Types</a>
    </div>

    <?php if (FLUSH::check('success')) : ?>
    <div class="alert alert-success">
        <?= FLUSH::message('success') ?>
    </div>
    <?php endif ?>

    <?php if (FLUSH::check('error')) : ?>
    <div class="alert alert-danger">
        <?= FLUSH::message('error') ?>
    </div>
    <?php endif ?>
    
    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">created</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pitchTypes as $key => $pitchTypes) : ?>
                    <tr>
                        <th scope="row"><?= $key +1 ?></th>
                        <td><?= $pitchTypes['name'] ?></td>
                        <td><?= $pitchTypes['created_at'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $pitchTypes['id'] ?>" class="text-warning">
                                Edit
                            </a> |
                            <a 
                                href="/gwsc/actions/admin/pitchType/delete.php?id=<?= $pitchTypes['id'] ?>" 
                                class="text-danger" 
                                onclick="return confirm('Are you sure to delete #<?= $pitchTypes['name'] ?>')"
                            >
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php 
    include("../../layout/admin/footer.php");
?>