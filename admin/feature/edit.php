
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

<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Edit Feature</h2> 
    </div>

    <div class="form-container">
        <?php if(FLUSH::check('error')): ?>
            <div class="alert alert-warning">
                <?= FLUSH::message('error') ?>
            </div>
        <?php endif; ?>
        <form action="../../actions/admin/feature/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $feature['id'] ?>">
            <input type="type" name="name" class="form-control" placeholder="Enter Name" value="<?= $feature['name'] ?>" required>
            <textarea class="form-control" name="description" rows="3" placeholder="Enter Description"><?= $feature['description'] ?></textarea>
            <input type="file" class="form-control" name="image" id="file" accept="image/*">
            <img src="../../actions/photos/features/<?= $feature['image'] ?>" alt="" width="200px" id="image">
            <br>
            <button type="submit" class="btn btn-lg btn-primary">
                Submit
            </button>
        </form>
    </div>
</main>

<?php 
    include("../../layout/admin/footer.php");
?>