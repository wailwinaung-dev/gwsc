
<?php 
    include(__DIR__ . "/../../helpers/FLUSH.php");
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php");
    include(__DIR__ . "/../../database/model/AdminsTable.php");

    $id = $_GET['id'];
    $adminsTable = new AdminsTable();
    $admin = $adminsTable->findById($id)
?>

<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Edit Admin</h2> 
    </div>
    <div class="form-container">
        <?php if(FLUSH::check('error')): ?>
            <div class="alert alert-warning">
                <?= FLUSH::message('error') ?>
            </div>
        <?php endif; ?>
        <form action="../../actions/admin/admin/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $admin['id'] ?>">
            <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?= $admin['first_name'] ?>" required>
            <input type="text" name="sur_name" class="form-control" placeholder="Sur Name" value="<?= $admin['sur_name'] ?>" required>
            <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $admin['email'] ?>" required>
            <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?= $admin['phone'] ?>" required>
            <input type="text" name="position" class="form-control" placeholder="Position" value="<?= $admin['position'] ?>" required>
            <textarea name="address" rows="5" class="form-control" placeholder="Address" required><?= $admin['address'] ?></textarea>
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
</main>

<?php 
    include("../../layout/admin/footer.php");
?>