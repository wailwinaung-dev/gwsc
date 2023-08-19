
<?php 
    include(__DIR__ . "/../../helpers/FLUSH.php");
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>

<h1 class="h3 mb-3">Add New Pitch Type</h1>
<?php if(FLUSH::check('error')): ?>
    <div class="alert alert-warning">
        <?= FLUSH::message('error') ?>
    </div>
<?php endif; ?>
<form action="../../actions/admin/pitchtype/create.php" method="post" enctype="multipart/form-data">
    
    <input type="type" name="name" class="form-control mb-2" placeholder="Enter Name" required>
    <button type="submit" class="w-100 btn btn-lg btn-primary">
        Submit
    </button>
</form>
<br>
<a href="index.php">Back</a>
<?php 
    include("../../layout/admin/footer.php");
?>