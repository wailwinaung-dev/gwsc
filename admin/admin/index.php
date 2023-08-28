<?php
include('../../helpers/FLUSH.php');
include('../../database/model/AdminsTable.php');

$adminsTable = new AdminsTable();
$admins = $adminsTable->getAll();

?>

<?php 
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>

<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Admins</h2> 
        <a href="add.php" class="btn btn-success">+ New Admin</a>
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
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Position</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $key => $admin) : ?>
                    <tr>
                        <th scope="row"><?= $key +1 ?></th>
                        <td><?= $admin['first_name'] . ' ' . $admin['sur_name'] ?></td>
                        <td><?= $admin['email'] ?></td>
                        <td><?= $admin['phone'] ?></td>
                        <td><?= $admin['address'] ?></td>
                        <td><?= $admin['position'] ?></td>
                     
                        <td>
                            <a href="edit.php?id=<?= $admin['id'] ?>" class="text-warning">Edit</a> | 
                            <a 
                                href="/gwsc/actions/admin/admin/delete.php?id=<?= $admin['id'] ?>" 
                                class="text-danger" 
                                onclick="return confirm('Are you sure to delete #<?= $admin['first_name'] . ' ' . $admin['sur_name'] ?>')"
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