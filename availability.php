<?php
include(__DIR__ . '/database/model/PackagesTable.php');
$packagesTable = new PackagesTable();
$packages = $packagesTable->getAll();
// echo '<pre>';
// var_dump($packages);
// echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitch Types & Availability</title>
    <?php include(__DIR__ . '/layout/header-link.php') ?>
    <link href="./asset/css/availability.css" rel="stylesheet">

</head>

<body>
    <?php include(__DIR__ . '/layout/navbar.php') ?>
    <div class="hero-image">
        <div class="hero-text">
            <h1 style="font-size:50px">Pitch Types & Availability</h1>
        </div>
    </div>
    <div class="container">
        <h1 class="search-text">
            <span style="color: #00a3f8;">S</span>
            <span style="color: #ff3139;">e</span>
            <span style="color: #ff9e00;">a</span>
            <span style="color: #00aa37;">r</span>
            <span style="color: #00a3f8;">c</span>
            <span style="color: #ff3139;">h</span>
        </h1>

        <div class="search-box">
            <form method="post" >
                <input type="text" class="search-input" placeholder="Search by Pitch Name">
                <button type="submit" class="search-button">Search</button>
            </form>
        </div>
        <ul class="pitch-list">
            <?php foreach ($packages as $key => $package) : ?>
                <li class="pitch-item">
                    <img src="./actions//photos/packages/<?= $package['image'] ?>" alt="<?= $package['name'] ?>">
                    <div class="pitch-content">
                        <h2><?= $package['name'] ?></h2>
                        <p class="price">$<?php echo $package['price']; ?></p>
                        <p><strong>Campsite:</strong> <?php echo $package['campsite_name']; ?></p>
                        <p><strong>Pitch Type:</strong> <?php echo $package['pitch_type_name']; ?></p>
                        <button class="btn">View Detail <i class="fa fa-angle-double-right"></i></button>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <?php include(__DIR__ . '/layout/footer.php') ?>
</body>

</html>