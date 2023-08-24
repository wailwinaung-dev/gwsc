
<?php 
    include(__DIR__ . "/../../helpers/FLUSH.php");
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php");
    include(__DIR__ . "/../../database/model/CustomersTable.php");

    $id = $_GET['id'];
    $customersTable = new CustomersTable();
    $customer = $customersTable->findById($id)
?>

<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Edit Customer</h2> 
    </div>
    <div class="form-container">
        <?php if(FLUSH::check('error')): ?>
            <div class="alert alert-warning">
                <?= FLUSH::message('error') ?>
            </div>
        <?php endif; ?>
        <form action="../../actions/admin/customer/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $customer['id'] ?>">
            <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?= $customer['first_name'] ?>" required>
            <input type="text" name="sur_name" class="form-control" placeholder="Sur Name" value="<?= $customer['sur_name'] ?>" required>
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $customer['email'] ?>" required>
            <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?= $customer['phone'] ?>" required>
            <textarea name="address" rows="5" class="form-control" placeholder="Address" required><?= $customer['address'] ?></textarea>
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
</main>

<?php 
    include("../../layout/admin/footer.php");
?>