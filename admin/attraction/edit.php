
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
<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Edit Attraction</h2> 
    </div>

    <div class="form-container">
        <?php if(FLUSH::check('error')): ?>
            <div class="alert alert-warning">
                <?= FLUSH::message('error') ?>
            </div>
        <?php endif; ?>
        <form action="../../actions/admin/attraction/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $attraction['id'] ?>">
            <input type="type" name="name" class="form-control" placeholder="Enter Name" value="<?= $attraction['name'] ?>" required>
            <textarea class="form-control" name="description" rows="3" placeholder="Enter Description"><?= $attraction['description'] ?></textarea>
            <textarea class="form-control" name="location" rows="3" placeholder="Enter Location"><?= $attraction['location'] ?></textarea>    
            <input type="file" class="form-control" name="image" accept="image/*">
            <img src="../../actions/photos/attractions/<?= $attraction['image'] ?>" alt="" width="300px">
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