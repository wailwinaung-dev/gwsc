
<?php 

    include(__DIR__ . "/../../helpers/FLUSH.php");
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php");
    include(__DIR__ . "/../../database/model/AttractionsTable.php");

    $id = $_GET['id'];//attraction id
    $attractionsTable = new AttractionsTable();
    $attraction = $attractionsTable->findById($id);
?>
<h1 class="h3 mb-3">Add New Attraction</h1>
<?php if(FLUSH::check('error')): ?>
    <div class="alert alert-warning">
        <?= FLUSH::message('error') ?>
    </div>
<?php endif; ?>
<form action="../../actions/admin/attraction/update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $attraction['id'] ?>">
    <input type="type" name="name" class="form-control mb-2" placeholder="Enter Name" value="<?= $attraction['name'] ?>" required>
    <textarea class="form-control mb-2" name="description" rows="3" placeholder="Enter Description"><?= $attraction['description'] ?></textarea>
    <textarea class="form-control mb-2" name="location" rows="3" placeholder="Enter Location"><?= $attraction['location'] ?></textarea>    
    <input type="file" class="form-control-file mb-2" name="image" accept="image/*">
    <button type="submit" class="btn btn-lg btn-primary">
        Submit
    </button>
</form>
<br>
<a href="index.php">Back</a>
<?php 
    include("../../layout/admin/footer.php");
?>