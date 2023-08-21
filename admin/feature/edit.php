
<?php 
    include(__DIR__ . "/../../helpers/FLUSH.php");
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php");
    include(__DIR__ . '/../../database/model/FeaturesTable.php');

    $id = $_GET['id'];//feature id
    $featuresTable = new FeaturesTable();
    $feature = $featuresTable->findById($id);
?>

<h1 class="h3 mb-3">Edit New Feature</h1>
<?php if(FLUSH::check('error')): ?>
    <div class="alert alert-warning">
        <?= FLUSH::message('error') ?>
    </div>
<?php endif; ?>
<form action="../../actions/admin/feature/update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $feature['id'] ?>">
    <input type="type" name="name" class="form-control mb-2" placeholder="Enter Name" value="<?= $feature['name'] ?>" required>
    <textarea class="form-control mb-2" name="description" rows="3" placeholder="Enter Description"><?= $feature['description'] ?></textarea>
    <input type="file" class="form-control-file mb-2" name="image" accept="image/*">
    <img src="../../actions/photos/features/<?= $feature['image'] ?>" alt="" class="mb-2" width="200px">
    <br>
    <button type="submit" class="btn btn-lg btn-primary">
        Submit
    </button>
</form>
<br>
<a href="index.php">Back</a>

<?php 
    include("../../layout/admin/footer.php");
?>