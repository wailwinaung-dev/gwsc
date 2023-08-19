<?php

session_start();
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

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .wrap {
            width: 100%;
            max-width: 400px;
            margin: 40px auto;
        }
    </style>
</head>

<body>
    <div class="wrap text-center">
        <h1 class="h3 mb-3">Add New Package</h1>
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

            <input type="type" name="location" class="form-control mb-2" placeholder="Enter Location" required>

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
    </div>
</body>

</html>