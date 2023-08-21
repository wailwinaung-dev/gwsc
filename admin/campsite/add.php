

<?php 
    include(__DIR__ . "/../../helpers/FLUSH.php");
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>

<h1 class="h3 mb-3">Add New Campsite</h1>
<?php if(FLUSH::check('error')): ?>
    <div class="alert alert-warning">
        <?= FLUSH::message('error') ?>
    </div>
<?php endif; ?>
<form action="../../actions/admin/campsite/create.php" method="post" enctype="multipart/form-data">
    <input type="type" name="name" class="form-control mb-2" placeholder="Enter Name" required>
    <!-- <input type="type" name="location" class="form-control mb-2" placeholder="Enter Location" required> -->
    <textarea name="location" class="form-control mb-2" placeholder="Enter Location" require></textarea>
    <button type="submit" class="btn btn-lg btn-primary">
        Submit
    </button>
</form>
<br>
<a href="index.php">Back</a>

<?php 
    include("../../layout/admin/footer.php");
?>