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
<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Add New Package</h2> 
    </div>

    <div class="form-container">
        <?php if(FLUSH::check('error')): ?>
            <div class="alert alert-warning">
                <?= FLUSH::message('error') ?>
            </div>
        <?php endif; ?>
        <form action="../../actions/admin/package/create.php" method="post" enctype="multipart/form-data">
    
            <input type="type" name="name" class="form-control" placeholder="Enter Name" required>
    
            <textarea class="form-control" name="description" rows="3" placeholder="Enter Description"></textarea>
    
            <input type="number" name="price" class="form-control" placeholder="Enter Price" min="0" required>
    
            <input type="file" class="form-control" name="image" accept="image/*">
            
            <textarea class="form-control" name="location" rows="3" placeholder="Enter Location" required></textarea>
    
            <select class="form-control" name="pitch_type_id">
                <?php foreach ($pitchtypes as $pitchtype): ?>
                    <option value="<?= $pitchtype['id'] ?>"><?= $pitchtype['name'] ?></option>
                <?php endforeach; ?>
            </select>
    
            <select class="form-control" name="campsite_id">
                <?php foreach ($campsites as $campsite): ?>
                    <option value="<?= $campsite['id'] ?>"><?= $campsite['name'] ?></option>
                <?php endforeach; ?>
            </select>
            
            <select class="form-control" name="feature_ids[]" multiple>
                <?php foreach ($features as $feature): ?>
                    <option value="<?= $feature['id'] ?>"><?= $feature['name'] ?></option>
                <?php endforeach; ?>
            </select>
    
            <select class="form-control" name="attraction_ids[]" multiple>
                <?php foreach ($attractions as $attraction): ?>
                    <option value="<?= $attraction['id'] ?>"><?= $attraction['name'] ?></option>
                <?php endforeach; ?>
            </select>
    
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
</main>
<?php 
    include("../../layout/admin/footer.php");
?>