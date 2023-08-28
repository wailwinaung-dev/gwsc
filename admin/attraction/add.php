
<?php 

    include(__DIR__ . "/../../helpers/FLUSH.php");
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>
<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Add New Attraction</h2> 
    </div>

    <div class="form-container">
        <?php if(FLUSH::check('error')): ?>
            <div class="alert alert-warning">
                <?= FLUSH::message('error') ?>
            </div>
        <?php endif; ?>
        <form action="../../actions/admin/attraction/create.php" method="post" enctype="multipart/form-data">
            <input type="type" name="name" class="form-control" placeholder="Enter Name" required>
            <textarea class="form-control" name="description" rows="3" placeholder="Enter Description"></textarea>
            <input type="type" name="location" class="form-control" placeholder="Enter Location" required>
            <input type="file" class="form-control" name="image" accept="image/*">
            <button type="submit" class="w-100 btn btn-lg btn-primary">
                Submit
            </button>
        </form>
    </div>
</main>
<?php 
    include("../../layout/admin/footer.php");
?>