<?php

include(__DIR__ . "/../../helpers/FLUSH.php");
include(__DIR__ . "/../../database/model/PitchTypesTable.php");
include(__DIR__ . "/../../database/model/CampsitesTable.php");
include(__DIR__ . "/../../database/model/AttractionsTable.php");
include(__DIR__ . "/../../database/model/FeaturesTable.php");
include(__DIR__ . "/../../database/model/PackagesTable.php");

$package_id = $_GET['id'];
$packagesTable = new PackagesTable();
$package = $packagesTable->findById($package_id);
$feature_ids = explode(',', $package['feature_ids']);//array of features ids in package
$attraction_ids = explode(',', $package['attraction_ids']);//array of attractions ids in package

// var_dump($package);
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

    <h1 class="h3">Edit New Package</h1>
    <?php if(FLUSH::check('error')): ?>
        <div class="alert alert-warning">
            <?= FLUSH::message('error') ?>
        </div>
    <?php endif; ?>
    <form action="../../actions/admin/package/update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $package['id'] ?>" >
        <input type="type" name="name" class="form-control mb-2" placeholder="Enter Name" value="<?= $package['name'] ?>" required>

        <textarea class="form-control mb-2" name="description" rows="3" placeholder="Enter Description"><?= $package['description'] ?></textarea>

        <input type="number" name="price" class="form-control mb-2" placeholder="Enter Price" min="0" value="<?= $package['price'] ?>" required>

        <input type="file" class="form-control-file mb-2" name="image" accept="image/*" value="D:/xampp/htdocs/gwsc/actions/photos/packages/<?= $package['image'] ?>">
        <img src="../../actions/photos/packages/<?= $package['image'] ?>" alt="" class="mb-2" width="300px">

        <textarea class="form-control mb-2" name="location" rows="3" placeholder="Enter Location" required><?= $package['location'] ?></textarea>

        <select class="form-control mb-2" name="pitch_type_id">
            <?php foreach ($pitchtypes as $pitchtype): ?>
                <option value="<?= $pitchtype['id'] ?>" <?= $pitchtype['id'] == $package['pitch_type_id'] ? 'selected' : '' ?>>
                    <?= $pitchtype['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select class="form-control mb-2" name="campsite_id">
            <?php foreach ($campsites as $campsite): ?>
                <option value="<?= $campsite['id'] ?>" <?= $campsite['id'] == $package['campsite_id'] ? 'selected' : '' ?>>
                    <?= $campsite['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <select class="form-control mb-2" name="feature_ids[]" multiple>
            <?php foreach ($features as $feature): ?>
                <option 
                    value="<?= $feature['id'] ?>" 
                    <?= in_array($feature['id'], $feature_ids) ? 'selected' : '' ?>
                >
                    <?= $feature['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select class="form-control mb-2" name="attraction_ids[]" multiple>
            <?php foreach ($attractions as $attraction): ?>
                <option 
                    value="<?= $attraction['id'] ?>" 
                    <?= in_array($attraction['id'], $attraction_ids) ? 'selected' : '' ?>
                >
                    <?= $attraction['name'] ?>
                </option>
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