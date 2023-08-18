<?php
session_start();
include('../../helpers/FLUSH.php');
include('../../database/model/PackagesTable.php');

$packagesTable = new PackagesTable();
$packages = $packagesTable->getAll();

echo "<pre>";
var_dump($packages);
echo "</pre>";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1 class="h3 mb-3">Features</h1>
        <?php if (FLUSH::check('success')) : ?>
            <div class="alert alert-success">
                <?= FLUSH::message('success') ?>
            </div>
        <?php endif ?>

        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($features as $key => $feature) : ?>
                        <tr>
                            <th scope="row"><?= $key +1 ?></th>
                            <td><?= $feature['name'] ?></td>
                            <td><?= $feature['description'] ?></td>
                            <td><?= $feature['image'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
</body>

</html>``