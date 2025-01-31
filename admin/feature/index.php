<?php
include('../../helpers/FLUSH.php');
include('../../database/model/FeaturesTable.php');

$featureTable = new FeaturesTable();
$features = $featureTable->getAll();

?>

<?php 
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>

<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Features</h2> 
        <a href="add.php" class="btn btn-success">+ New Feature</a>
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
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($features as $key => $feature) : ?>
                    <tr>
                        <th scope="row"><?= $key +1 ?></th>
                        <td><?= $feature['name'] ?></td>
                        <td><?= $feature['description'] ?></td>
                        <td>
                            <img src="../../actions/photos/features/<?= $feature['image'] ?>" alt="" width="200px">
                        </td>
                        <td>
                            <a href="edit.php?id=<?= $feature['id'] ?>" class="text-warning">Edit</a> | 
                            <a 
                                href="/gwsc/actions/admin/feature/delete.php?id=<?= $feature['id'] ?>" 
                                class="text-danger" 
                                onclick="return confirm('Are you sure to delete #<?= $feature['name'] ?>')"
                            >
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if(count($features) < 1): ?>
            <h3 class="text-center">No Data...</h3>
        <?php endif; ?>
    </div>
</main>

<?php 
    include("../../layout/admin/footer.php");
?>