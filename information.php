<?php
include(__DIR__ . '/database/model/PackagesTable.php');
$packagesTable = new PackagesTable();
$packages = $packagesTable->getAll();
// echo '<pre>';
// var_dump($packages);
// echo '</pre>';
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include(__DIR__ . '/layout/header-link.php') ?>
    <link href="./asset/css/information.css" rel="stylesheet">
    <title>Information</title>

</head>

<body>
    <?php include(__DIR__ . '/layout/navbar.php') ?>
    <div class="hero-image">
        <div class="hero-text">
            <h1 style="font-size:50px">Discover Pitches Information</h1>
        </div>
    </div>
    <!-- Container for the grid of campsite packages -->
    <div class="card-container">
        <!-- Loop through your array of campsite packages -->
        <?php foreach ($packages as $package): ?>
            <div class="card">
                <img src="./actions/photos/packages/<?php echo $package['image']; ?>" alt="<?php echo $package['name']; ?>"
                    style="max-height:250px;">
                <!-- Embed the location iframe -->
                <iframe class="location-iframe" src="<?php echo $package['location']; ?>"></iframe>
                <h2>
                    <?php echo $package['name']; ?>
                </h2>
                <?php if (strlen($package['description']) <= 100): ?>
                    <p>
                        <?= substr($package['description'], 0, 100) ?>
                    </p>
                <?php else: ?>
                    <p>
                        <?= substr($package['description'], 0, 100) . "..." ?>
                    </p>
                <?php endif ?>
                <p class="price">$
                    <?php echo $package['price']; ?>
                </p>
                <p><strong>Campsite:</strong>
                    <?php echo $package['campsite_name']; ?>
                </p>
                <p><strong>Pitch Type:</strong>
                    <?php echo $package['pitch_type_name']; ?>
                </p>

                <!-- Display features -->
                <p><strong>Features:</strong>
                    |
                    <?php #foreach (json_decode($package['features'], true) as $feature): ?>
                    <span class="features">
                        <?= $package['features'] ?>
                    </span> |
                    <?php #endforeach; ?>

                </p>
                <!-- Display attractions -->
                <p><strong>Attractions:</strong>
                    |
                    <?php #foreach (json_decode($package['attractions'], true) as $attraction): ?>
                    <span>
                        <?= $package['attractions'] ?> |
                    </span> |
                    <?php #endforeach; ?>

                </p>
                <a href="package_detail.php?id=<?= $package['id'] ?>" class="btn">View Detail <i
                        class="fa fa-angle-double-right"></i></a>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include(__DIR__ . '/layout/footer.php') ?>
</body>

</html>