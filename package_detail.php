<?php
session_start();
include(__DIR__ . '/database/model/PackagesTable.php');
$packagesTable = new PackagesTable();
$package = $packagesTable->findById($_GET['id']);
// var_dump($package);
$attractions = json_decode($package['attractions']);
$features = json_decode($package['features']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Detail</title>
    <?php include(__DIR__ . '/layout/header-link.php') ?>
    <link rel="stylesheet" href="./asset/css/package_detail.css">
</head>

<body>
    <?php include(__DIR__ . '/layout/navbar.php') ?>
    <main class="main-container">

        <div class="row">
            <div class="left">
                <img width="100%" src="./actions/photos/packages/<?= $package['image'] ?>" alt="<?= $package['name'] ?>">
            </div>
            <div class="right">
                <h3>
                    <?= $package['name'] ?>
                </h3>
                <p>
                    <?= $package['description'] ?>
                </p>
                <p>
                    Price: <b>$ <?= $package['price'] ?></b>
                </p>
                <p>
                    Pitch Type: <b><?= $package['pitch_type_name'] ?></b>
                </p>
                <p>
                    Campsite: <b><?= $package['campsite_name'] ?></b>
                </p>

                <p>
                    Features: <b class="text-primary"> |
                        <?php foreach ($features as $key => $feature) : ?>
                            <?= $feature->name ?> |
                        <?php endforeach; ?>
                    </b>
                </p>

                <p>
                    Local Attractions: <b class="text-primary"> |
                        <?php foreach ($attractions as $key => $attraction) : ?>
                            <?= $attraction->name ?> |
                        <?php endforeach; ?>
                    </b>
                </p>
                
                <?php if(isset($_SESSION['customer'])): ?>
                <div>
                    <a href="edit.php?id=<?= $package['id'] ?>" class="btn btn-success">Booking</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="iframe-container">
            <iframe src="<?= $package['location'] ?>" frameborder="0"></iframe>
        </div>
    </main>
    <?php include(__DIR__ . '/layout/footer.php') ?>

</body>

</html>