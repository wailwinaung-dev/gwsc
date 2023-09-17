<?php 
    include(__DIR__ . '/database/model/FeaturesTable.php');
    $table = new FeaturesTable();
    $features = $table->getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features</title>
    <?php include(__DIR__ . '/layout/header-link.php') ?>
    <link href="./asset/css/common.css" rel="stylesheet">
    <link href="./asset/css/feature.css" rel="stylesheet">
    
</head>

<body>
    <?php include "./layout/navbar.php" ?>
    <div class="hero-image">
        <div class='hero-text'>
            <h1 style="font-size:50px">Features</h1>
        </div>
    </div>
    <main class="container">
        <h2 class="title">The Most Avaliable Features in each camp sites.</h2>
        <div class="card-container">
            <?php foreach($features as $feature) : ?>
            <!--- start of the card -->
            <div class="card">
                <img src=<?= "/gwsc/actions/photos/features/".$feature['image'] ?> alt="<?php echo "Free Wifi" ?>">
                <!-- Embed the location iframe -->
                <h2>
                    <?php echo htmlspecialchars($feature['name']) ?>
                </h2>
                <p>
                    <?php echo htmlspecialchars($feature['description']); ?>
                </p>
                </p>
            </div>
            
            <!-- #end fo card-->
            <?php endforeach ?>
        </div>
    </main>
    <?php include "./layout/footer.php" ?>
</body>

</html>