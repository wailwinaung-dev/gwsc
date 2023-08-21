<?php

include(__DIR__ . "/../../helpers/FLUSH.php");
include(__DIR__ . "/../../database/model/PitchTypesTable.php");
include(__DIR__ . "/../../database/model/CampsitesTable.php");
include(__DIR__ . "/../../database/model/AttractionsTable.php");
include(__DIR__ . "/../../database/model/FeaturesTable.php");

$pitchtypesTable = new PitchTypesTable();
$pitchtypes = $pitchtypesTable->getAll();

$campsitesTable = new CampsitesTable();
$campsites = $campsitesTable->getAll();

$featuresTable = new FeaturesTable();
$features = $featuresTable->getAll();

$attractionsTable = new AttractionsTable();
$attractions = $attractionsTable->getAll();
// var_dump($pitchtypes);
?>

<?php 
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>

    <h1 class="h3">Add New Package</h1>
    <?php if(FLUSH::check('error')): ?>
        <div class="alert alert-warning">
            <?= FLUSH::message('error') ?>
        </div>
    <?php endif; ?>
    <form action="../../actions/admin/package/create.php" method="post" enctype="multipart/form-data">

        <input type="type" name="name" class="form-control mb-2" placeholder="Enter Name" required>

        <textarea class="form-control mb-2" name="description" rows="3" placeholder="Enter Description"></textarea>

        <input type="number" name="price" class="form-control mb-2" placeholder="Enter Price" min="0" required>

        <input type="file" class="form-control-file mb-2" name="image" accept="image/*">
        
        <textarea class="form-control mb-2" name="location" rows="3" placeholder="Enter Location" required></textarea>

        <select class="form-control mb-2" name="pitch_type_id">
            <?php foreach ($pitchtypes as $pitchtype): ?>
                <option value="<?= $pitchtype['id'] ?>"><?= $pitchtype['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <select class="form-control mb-2" name="campsite_id">
            <?php foreach ($campsites as $campsite): ?>
                <option value="<?= $campsite['id'] ?>"><?= $campsite['name'] ?></option>
            <?php endforeach; ?>
        </select>
        
        <select class="form-control mb-2" name="feature_ids[]" multiple>
            <?php foreach ($features as $feature): ?>
                <option value="<?= $feature['id'] ?>"><?= $feature['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <select class="form-control mb-2" name="attraction_ids[]" multiple>
            <?php foreach ($attractions as $attraction): ?>
                <option value="<?= $attraction['id'] ?>"><?= $attraction['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="w-100 btn btn-lg btn-primary">
            Submit
        </button>
    </form>
    <br>
    <a href="index.php">Back</a>

<?php 
    include("../../layout/admin/footer.php");
?>