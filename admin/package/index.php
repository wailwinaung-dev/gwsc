<?php
include('../../helpers/FLUSH.php');
include('../../database/model/PackagesTable.php');

$packagesTable = new PackagesTable();
$packages = $packagesTable->getAll();

// echo "<pre>";
// var_dump($packages);
// echo "</pre>";

?>

<?php 
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>
<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Packages</h2> 
        <a href="add.php" class="btn btn-success">+ New Package</a>
    </div>
    <?php if (FLUSH::check('success')) : ?>
        <div class="alert alert-success">
            <?= FLUSH::message('success') ?>
        </div>
    <?php endif ?>
    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Pitch Type</th>
                    <th scope="col">Campsite</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($packages as $key => $package) : ?>
                    <tr>
                        <th scope="row"><?= $key +1 ?></th>
                        <td><?= $package['name'] ?></td>
                        <td><?= $package['price'] ?></td>
                        <td><?= $package['image'] ?></td>
                        <td><?= $package['pitch_type_name'] ?></td>
                        <td><?= $package['campsite_name'] ?></td>
                        <td><?= $package['status'] ? 'Enabled' : 'Disabled' ?></td>
                        <td>
                        <a href="view.php?id=<?= $package['id'] ?>" class="text-primary">View</a> | 
                        <a href="edit.php?id=<?= $package['id'] ?>" class="text-warning">Edit</a> | 
                        <a 
                            href="/gwsc/actions/admin/package/delete.php?id=<?= $package['id'] ?>" 
                            class="text-danger" 
                            onclick="return confirm('Are you sure to delete #<?= $package['name'] ?>')"
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