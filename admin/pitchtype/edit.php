
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

<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Edit Pitch Type</h2> 
    </div>

    <div class="form-container">
        <?php if(FLUSH::check('error')): ?>
            <div class="alert alert-warning">
                <?= FLUSH::message('error') ?>
            </div>
        <?php endif; ?>
        <form action="../../actions/admin/pitchtype/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $pitchType['id'] ?>" >
            <input type="type" name="name" class="form-control" placeholder="Enter Name" value="<?= $pitchType['name'] ?>" required>
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    <div class="form-container">
</main>

<?php 
    include("../../layout/admin/footer.php");
?>