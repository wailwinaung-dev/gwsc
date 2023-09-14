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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./asset/css/information.css" rel="stylesheet">
    <link href="./asset/css/navbar.css" rel="stylesheet">
    <link href="./asset/css/footer.css" rel="stylesheet">

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
        <?php foreach ($packages as $package) : ?>
            <div class="card">
                <img src="./actions/photos/packages/<?php echo $package['image']; ?>" alt="<?php echo $package['name']; ?>">
                <!-- Embed the location iframe -->
                <iframe class="location-iframe" src="<?php echo $package['location']; ?>"></iframe>
                <h2><?php echo $package['name']; ?></h2>
                <p><?php echo $package['description']; ?></p>
                <p class="price">$<?php echo $package['price']; ?></p>
                <p><strong>Location:</strong> <?php echo $package['campsite_name']; ?></p>
                <p><strong>Pitch Type:</strong> <?php echo $package['pitch_type_name']; ?></p>

                <!-- Display features -->
                <p><strong>Features:</strong>
                |
                <?php foreach (json_decode($package['features'], true) as $feature) : ?>
                    <span class="features"><?php echo $feature['name']; ?></span> |
                <?php endforeach; ?>
                
                </p>
                <!-- Display attractions -->
                <p><strong>Attractions:</strong>
                |
                <?php foreach (json_decode($package['attractions'], true) as $attraction) : ?>
                   <span><?php echo $attraction['name']; ?></span> |
                <?php endforeach; ?>
                
                </p>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include(__DIR__ . '/layout/footer.php') ?>
</body>

</html>