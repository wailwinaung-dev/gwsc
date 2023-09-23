<?php
include __DIR__ . '/database/model/AttractionsTable.php';
$table = new AttractionsTable();

$variable = $table->getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Attraction</title>
    <?php include(__DIR__ . '/layout/header-link.php') ?>
    <link rel="stylesheet" href="./asset/css/common.css" />
    <link rel="stylesheet" href="./asset/css/localAttraction.css" />
</head>

<body>
    <?php include(__DIR__ . '/layout/navbar.php') ?>
    <div class="hero-image">
        <div class="hero-text">
            <h1 style="font-size:50px">Discover Local Attractions</h1>
        </div>
    </div>
    <div class="main-container">

        <?php foreach ($variable as $local) : ?>
            <div class="card">
                <img src=<?= "./actions/photos/attractions/" . $local['image'] ?> />
                <article>
                    <h2><?= $local['name'] ?></h2>
                    <p><?= $local["description"] ?></p>
                </article>
                <iframe src="<?= $local["location"] ?>" title=""></iframe>
            </div>
        <?php endforeach ?>

    </div>
    <?php include(__DIR__ . '/layout/footer.php') ?>
</body>

</html>