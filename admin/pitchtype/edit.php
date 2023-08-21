
<?php 
    include(__DIR__ . "/../../helpers/FLUSH.php");
    include(__DIR__ . "/../../layout/admin/header.php");
    include(__DIR__ . "/../../layout/admin/navbar.php");
    include(__DIR__ . "/../../layout/admin/sidebar.php");
    include(__DIR__ . "/../../database/model/PitchTypesTable.php");

    $id = $_GET['id'];//pitch type id
    $pitchTypesTable = new PitchTypesTable();
    $pitchType = $pitchTypesTable->findById($id);
?>

<h1 class="h3 mb-3">Edit New Pitch Type</h1>
<?php if(FLUSH::check('error')): ?>
    <div class="alert alert-warning">
        <?= FLUSH::message('error') ?>
    </div>
<?php endif; ?>
<form action="../../actions/admin/pitchtype/update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $pitchType['id'] ?>" >
    <input type="type" name="name" class="form-control mb-2" placeholder="Enter Name" value="<?= $pitchType['name'] ?>" required>
    <button type="submit" class="btn btn-lg btn-primary">
        Submit
    </button>
</form>
<br>
<a href="index.php">Back</a>
<?php 
    include("../../layout/admin/footer.php");
?>