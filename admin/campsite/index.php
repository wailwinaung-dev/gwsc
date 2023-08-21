<?php
include('../../helpers/FLUSH.php');
include('../../database/model/CampsitesTable.php');

$campsiteTable = new CampsitesTable();
$campsites = $campsiteTable->getAll();

?>

<?php 
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>

<div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="h3">Campsites</h1>

    <a href="add.php" class="btn btn-success">+ New Campsite</a>
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
            <th scope="col">Location</th>
            <th scope="col">Created</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($campsites as $key => $campsite) : ?>
            <tr>
                <th scope="row"><?= $key +1 ?></th>
                <td><?= $campsite['name'] ?></td>
                <td><?= $campsite['location'] ?></td>
                <td><?= $campsite['created_at'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $campsite['id'] ?>" class="text-warning">Edit</a> | 
                    <a 
                        href="/gwsc/actions/admin/campsite/delete.php?id=<?= $campsite['id'] ?>" 
                        class="text-danger" 
                        onclick="return confirm('Are you sure to delete #<?= $campsite['name'] ?>')"
                    >
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
        
<?php 
    include("../../layout/admin/footer.php");
?>