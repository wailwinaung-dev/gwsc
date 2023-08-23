
<?php 
    include(__DIR__ . "/../../helpers/FLUSH.php");
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php");
    include(__DIR__ . "/../../database/model/CampsitesTable.php");
    $id = $_GET['id'];//campsite id
    $campsitesTable = new CampsitesTable();
    $campsite = $campsitesTable->findById($id);
?>

<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Edit Campsite</h2> 
    </div>

    <div class="form-container">
        <?php if(FLUSH::check('error')): ?>
            <div class="alert alert-warning">
                <?= FLUSH::message('error') ?>
            </div>
        <?php endif; ?>
        <form action="../../actions/admin/campsite/update.php" method="post">
            <input type="hidden" name="id" value="<?= $campsite['id'] ?>"/>
            <input type="type" name="name" class="form-control" placeholder="Enter Name" value="<?= $campsite['name'] ?>" required>
            <textarea name="location" class="form-control" rows="6" placeholder="Enter Location" require><?= $campsite['location'] ?></textarea>
            <button type="submit" class="btn btn-lg btn-primary">
                Submit
            </button>
        </form>
    </div>
</main>

<?php 
    include("../../layout/admin/footer.php");
?>