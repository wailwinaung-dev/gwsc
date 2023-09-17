<!-- <?php
// include("./helpers/AUTH.php");
include __DIR__ . '/database/model/ReviewsTable.php';
include(__DIR__ . '/database/model/PackagesTable.php');

$packagesTable = new PackagesTable();
$packages = $packagesTable->getFive();

$reviewsTable = new ReviewsTable();
$reviews = $reviewsTable->getByRating(5);
var_dump($reviews);

// exit;
// $auth = Auth::check();
// var_dump($auth);
?>

<h1>This is HomePage.</h1>
<a href="actions/logout.php"
class="text-danger">Logout</a> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="./asset/css/information.css" rel="stylesheet"> -->
    <!-- <link href="./asset/css/common.css" rel="stylesheet"> -->
    <link href="./asset/css/common.css" rel="stylesheet">
    <link href="./asset/css/home.css" rel="stylesheet">

    <?php include(__DIR__ . '/layout/header-link.php') ?>
    <script src="/gwsc/asset/js/home.js" defer></script>
    <link href="./asset/css/information.css" rel="stylesheet">
</head>

<body>
    <?php include "./layout/navbar.php" ?>
    <div class="hero-image">
        <p class='hero-text'>
            Welcome From GWSC Camping Website.
            Ready for adventures for you to get ultimate experience.
        </p>
    </div>
    <main class="container">
        <div class="search-card ">
            <form method="post" action="availability.php" class="search-box center">
                <input type="text" class="search-input" placeholder="Search by Pitch Name" name="search-text"
                    value="<?= $_POST['search-text'] ?? '' ?>">
                <button type="submit" class="search-button">Search</button>
            </form>
        </div>
        <div class="">
            <h2 class="intro-title">
                Avaliable Packages
            </h2>
            <div class="card-container">
                <ul class="pitch-list">
                    <!-- Loop through your array of campsite packages -->
                    <?php foreach ($packages as $package): ?>
                        <li class="pitch-item">
                            <div class="card">
                                <img src="./actions//photos/packages/<?= $package['image'] ?>"
                                    alt="<?= $package['name'] ?>">
                                <div class="pitch-content">
                                    <h2>
                                        <?= $package['name'] ?>
                                    </h2>
                                    <p class="price">$
                                        <?php echo $package['price']; ?>
                                    </p>
                                    <p><strong>Campsite:</strong>
                                        <?php echo $package['campsite_name']; ?>
                                    </p>
                                    <p><strong>Pitch Type:</strong>
                                        <?php echo $package['pitch_type_name']; ?>
                                    </p>
                                </div>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="">
                <h2 class="intro-title">
                    Reviews
                </h2>
                <!-- Slideshow container -->
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <?php foreach ($reviews as $review): ?>
                        <div class="mySlides fade">
                            <div class="slidecard-container">
                                <div class="review-card">
                                    <img src="/gwsc/asset/images/logo-girl.png" />
                                    <div class="text-center">
                                        <h2>
                                            <?= $review['customer_name'] ?>
                                        </h2>
                                        <p>
                                            <?= $review['message'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                    <?php for ($i = 0; $i < count($reviews); $i++): ?>
                        <span class="dot" onclick="currentSlide(<?= $i ?>)"></span>
                    <?php endfor ?>
                </div>
            </div>
    </main>
    <?php include "./layout/footer.php" ?>
</body>

</html>