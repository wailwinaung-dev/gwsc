
<?php 
    include(__DIR__ . "/../../helpers/FLUSH.php");
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>

<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Add New Admin</h2> 
    </div>
    <div class="form-container">
        <?php if(FLUSH::check('error')): ?>
            <div class="alert alert-warning">
                <?= FLUSH::message('error') ?>
            </div>
        <?php endif; ?>
        <form action="../../actions/admin/admin/create.php" method="post" enctype="multipart/form-data">
            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
            <input type="text" name="sur_name" class="form-control" placeholder="Sur Name" required>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="text" name="phone" class="form-control" placeholder="Phone" required>
            <input type="text" name="position" class="form-control" placeholder="Position" required>
            <textarea name="address" rows="5" class="form-control" placeholder="Address" required></textarea>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
</main>

<?php 
    include("../../layout/admin/footer.php");
?>