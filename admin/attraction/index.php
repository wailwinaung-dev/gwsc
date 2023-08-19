<?php

include('../../helpers/FLUSH.php');
include('../../database/model/AttractionsTable.php');

$attractionTable = new AttractionsTable();
$attractions = $attractionTable->getAll();

?>

<?php 
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>

<div class="d-flex justify-content-between align-items-center mb-2">
    <h1 class="h3">Attractions</h1>

    <a href="add.php" class="btn btn-success">+ New Attraction</a>
</div>
<?php if (FLUSH::check('success')) : ?>
    <div class="alert alert-success">
        <?= FLUSH::message('success') ?>
    </div>
<?php endif ?>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Location</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attractions as $key => $attraction) : ?>
                <tr>
                    <th scope="row"><?= $key +1 ?></th>
                    <td><?= $attraction['name'] ?></td>
                    <td><?= $attraction['description'] ?></td>
                    <td><?= $attraction['location'] ?></td>
                    <td><?= $attraction['image'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php 
    include("../../layout/admin/footer.php");
?>