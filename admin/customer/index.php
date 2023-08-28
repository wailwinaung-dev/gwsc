<?php
include('../../helpers/FLUSH.php');
include('../../database/model/CustomersTable.php');

$customersTable = new CustomersTable();
$customers = $customersTable->getAll();

?>

<?php 
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>

<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Customers</h2> 
        <a href="add.php" class="btn btn-success">+ New Customer</a>
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
                    <th scope="col">View Count</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $key => $customer) : ?>
                    <tr>
                        <th scope="row"><?= $key +1 ?></th>
                        <td><?= $customer['first_name'] . ' ' . $customer['sur_name'] ?></td>
                        <td><?= $customer['email'] ?></td>
                        <td><?= $customer['phone'] ?></td>
                        <td><?= $customer['address'] ?></td>
                        <td><?= $customer['view_count'] ?></td>
                     
                        <td>
                            <a href="edit.php?id=<?= $customer['id'] ?>" class="text-warning">Edit</a> | 
                            <a 
                                href="/gwsc/actions/admin/customer/delete.php?id=<?= $customer['id'] ?>" 
                                class="text-danger" 
                                onclick="return confirm('Are you sure to delete #<?= $customer['first_name'] . ' ' . $customer['sur_name'] ?>')"
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