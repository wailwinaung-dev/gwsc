<?php
include_once(__DIR__ . '/database/model/ReviewsTable.php');
include_once(__DIR__ . '/database/model/PackagesTable.php');
include_once(__DIR__ . '/database/model/FeaturesTable.php');
$packagesTable = new PackagesTable();
$packages = $packagesTable->getFive();

$reviewsTable = new ReviewsTable();
$reviews = $reviewsTable->getByRating(5);

$featuresTable = new FeaturesTable();
$features = $featuresTable->getAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <?php include(__DIR__ . '/layout/header-link.php') ?>

</head>

<body id="home">
    <?php include "./layout/navbar.php" ?>

    <div class="banner">
        <div class="banner-text">
            <h1>Welcome From GWSC Website</h1>
            <p>Discover What You're Looking For</p>
        </div>
        <div class="search-container">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search...">
                <button type="submit" class="search-button">Search</button>
            </div>
        </div>
    </div>

    <div class="pitch-type">
        <h4>Our Pitch Types</h4>
        <div class="row mt-5 row-gap-5">
            <div class="col">
                <svg class="tent text-danger" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="tent"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                    <g class="fa-duotone-group">
                        <path class="fa-secondary" fill="currentColor"
                            d="M269.4 5.961C280.5-1.987 295.5-1.987 306.6 5.961L530.6 165.1C538 171.2 542.8 179.4 543.8 188.5L575.8 476.5C576.8 485.5 573.9 494.6 567.8 501.3C561.8 508.1 553.1 512 544 512H448L288 256V512H32C22.9 512 14.23 508.1 8.156 501.3C2.086 494.6-.8093 485.5 .1958 476.5L32.2 188.5C33.2 179.4 38 171.2 45.4 165.1L269.4 5.961z">
                        </path>
                        <path class="fa-primary" fill="currentColor" d="M448 512H288V256L448 512z"></path>
                    </g>
                </svg><!-- <i class="text-danger fa-duotone fa-tent"></i> -->
                <p class="fs-5">Tent Pitches</p>
            </div>
            <div class="col">
                <svg class="caravan text-warning" aria-hidden="true" focusable="false" data-prefix="fad"
                    data-icon="caravan" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                    data-fa-i2svg="">
                    <g class="fa-duotone-group">
                        <path class="fa-secondary" fill="currentColor"
                            d="M64 160C64 142.3 78.33 128 96 128H224C241.7 128 256 142.3 256 160V224C256 241.7 241.7 256 224 256H96C78.33 256 64 241.7 64 224V160zM320 160C320 142.3 334.3 128 352 128H416C433.7 128 448 142.3 448 160V224H416C407.2 224 400 231.2 400 240C400 248.8 407.2 256 416 256H448V352H348.8C341.2 337 331.4 323.3 320 311.2V160zM112 432C112 387.8 147.8 352 192 352C236.2 352 272 387.8 272 432C272 476.2 236.2 512 192 512C147.8 512 112 476.2 112 432z">
                        </path>
                        <path class="fa-primary" fill="currentColor"
                            d="M0 112C0 67.82 35.82 32 80 32H416C504.4 32 576 103.6 576 192V352H608C625.7 352 640 366.3 640 384C640 401.7 625.7 416 608 416H302.9C295.1 361.7 248.4 320 192 320C135.6 320 88.9 361.7 81.13 416H80C35.82 416 0 380.2 0 336V112zM448 352V160C448 142.3 433.7 128 416 128H352C334.3 128 320 142.3 320 160V311.2C331.4 323.3 341.2 337 348.8 352H448zM96 128C78.33 128 64 142.3 64 160V224C64 241.7 78.33 256 96 256H224C241.7 256 256 241.7 256 224V160C256 142.3 241.7 128 224 128H96z">
                        </path>
                    </g>
                </svg><!-- <i class="text-warning fa-duotone fa-caravan"></i> -->
                <p class="fs-5">Caravan Pitches</p>
            </div>
            <div class="col">
                <svg class="rv text-success" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="rv"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                    <g class="fa-duotone-group">
                        <path class="fa-secondary" fill="currentColor"
                            d="M112 448C112 412.7 140.7 384 176 384C211.3 384 240 412.7 240 448C240 483.3 211.3 512 176 512C140.7 512 112 483.3 112 448zM432 448C432 412.7 460.7 384 496 384C531.3 384 560 412.7 560 448C560 483.3 531.3 512 496 512C460.7 512 432 483.3 432 448z">
                        </path>
                        <path class="fa-primary" fill="currentColor"
                            d="M224 16C224 7.164 231.2 0 240 0H368C376.8 0 384 7.164 384 16V32H512C565 32 608 74.98 608 128C608 145.7 593.7 160 576 160H384V416H266.5C253.4 378.7 217.8 352 176 352C137.1 352 103.5 375.2 88.48 408.5L18.75 338.7C6.743 326.7 0 310.5 0 293.5V96C0 60.65 28.65 32 64 32H224V16zM96 208C96 216.8 103.2 224 112 224H240C248.8 224 256 216.8 256 208V144C256 135.2 248.8 128 240 128H112C103.2 128 96 135.2 96 144V208zM416 192H516.6C529.5 192 542 196.5 552 204.7L619.5 259.8C632.5 270.5 640 286.4 640 303.2V384C640 401.7 625.7 416 608 416H586.5C573.4 378.7 537.8 352 496 352C462.6 352 433.2 369 416 394.9V192zM521.6 241.8C520.2 240.6 518.4 240 516.6 240H464V288H578.1L521.6 241.8z">
                        </path>
                    </g>
                </svg><!-- <i class="text-success fa-duotone fa-rv fa-4x mb-3"></i> -->
                <p class="fs-5">Touring Caravan Pitch</p>
            </div>
        </div>
    </div>

    <div class="package">
        <!-- <h4>Book your dream vacation now</h4> -->
        <div class="row">
            <?php foreach ($packages as $key => $package): ?>
                <div class="card">
                    <img src="./actions/photos/packages/<?= $package['image'] ?>" alt="Denim Jeans" style="width:100%">
                    <div class="card-content">
                        <h1>
                            <?= $package['name'] ?>
                        </h1>
                        <p class="price">$
                            <?= $package['price'] ?>
                        </p>
                        <?php if (strlen($package['description']) <= 100): ?>
                            <p>
                                <?= substr($package['description'], 0, 100) ?>
                            </p>
                        <?php else: ?>
                            <p>
                                <?= substr($package['description'], 0, 100) . "..." ?>
                            </p>
                        <?php endif ?>
                        <p><button>Discover More <i class="fa fa-angle-double-right" aria-hidden="true"></i></button></p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <div class="review">
        <h4>Customer Reviews</h4>
        <div class="row">
            <div class="reviewer-card">
                <div class="reviewer-name"><i class="fa fa-user-circle-o"></i> Mike Barber</div>
                <div class="rating">★★★★☆</div>
                <div class="review-text">
                    "Twin Campsite has many beautiful places to travel. Its a good camp place too."
                </div>
            </div>
            <div class="reviewer-card">
                <div class="reviewer-name"><i class="fa fa-user-circle-o"></i> John Doe</div>
                <div class="rating">★★★★☆</div>
                <div class="review-text">
                    "Bite Pu is the good campsite. With Many places to visit. "
                </div>
            </div>
            <div class="reviewer-card">
                <div class="reviewer-name"><i class="fa fa-user-circle-o"></i> Oppa Gamnu</div>
                <div class="rating">★★★★☆</div>
                <div class="review-text">
                    "Buttermilk park is a good park to relax. I recommand it."
                </div>
            </div>
        </div>
    </div>

    <div class="feature">
        <h4>Our Features</h4>
        <div class="slideshow-container">

            <?php foreach ($features as $key => $feature): ?>
                <div class="mySlides fade">
                    <div class="numbertext">
                        <?= $key + 1 ?> /
                        <?= count($features) ?>
                    </div>
                    <img src="./actions/photos/features/<?= $feature['image'] ?>">
                    <div class="text">
                        <h5>
                            <?= $feature['name'] ?>
                        </h5>
                        <?php if (strlen($feature['description']) <= 50): ?>
                            <p>
                                <?= substr($feature['description'], 0, 50) ?>
                            </p>
                        <?php else: ?>
                            <p>
                                <?= substr($feature['description'], 0, 50) . "..." ?>
                            </p>
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

        </div>
        <br>

        <div style="text-align:center">
            <?php foreach ($features as $key => $feature): ?>
                <span class="dot" onclick="currentSlide(<?= $key + 1 ?>)"></span>
                <!-- <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span> -->
            <?php endforeach; ?>
        </div>
    </div>


    <div class="youtube-container">
        <iframe src="https://www.youtube.com/embed/Z-ZcQkJxgv8?si=twDk-ZyTh5sp9gLo" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
    </div>

    <?php include "./layout/footer.php" ?>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "flex";
            slides[slideIndex - 1].className += " slide-show";

            dots[slideIndex - 1].className += " active";
        }
    </script>
</body>

</html>