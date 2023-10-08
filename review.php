<?php
session_start();
include_once(__DIR__ . '/database/model/PackagesTable.php');
include_once(__DIR__ . '/database/model/ReviewsTable.php');

$packagesTable = new PackagesTable();
$packages = $packagesTable->getAll();

$reviewsTable = new ReviewsTable();
$reviews = $reviewsTable->getAll();
// echo '<pre>';
// var_dump(isset($_SESSION['customer']));
// echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <?php include(__DIR__ . '/layout/header-link.php') ?>
</head>

<body id="review">
    <?php include(__DIR__ . '/layout/navbar.php') ?>
    <div class="hero-image">
        <div class="hero-text">
            <h1 style="font-size:50px">Customer Review</h1>
        </div>
    </div>
    <main>
        <!-- Check customer login or not  -->
        <?php if(isset($_SESSION['customer'])): ?>
        <section class="review-form">
            <h2>Write a Review</h2>
            <form id="reviewForm" method="post" action="./actions/add_review.php">
                <input id="package-id" type="hidden" name="package_id">
                <div class="form-group">
                    <label for="browser">Choose package from the list:</label>
                    <input list="browsers" name="package-name" id="package-list">
                    <datalist id="browsers">
                        <?php foreach ($packages as $key => $package) : ?>
                            <option data-package-id="<?= $package['id'] ?>" value="<?= $package['name'] ?>">
                            <?php endforeach; ?>
                    </datalist>
                    <span id="package-id-error" style="color: red;"></span>
                </div>
                <div class="form-group">
                    <label for="rating">Rating:</label>
                    <select id="rating" name="rating">
                        <option value="5">5 stars</option>
                        <option value="4">4 stars</option>
                        <option value="3">3 stars</option>
                        <option value="2">2 stars</option>
                        <option value="1">1 star</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comment">Message:</label>
                    <textarea id="message" rows="4" name="message"></textarea>
                    <span id="message-error" style="color: red;"></span>
                </div>

                <button type="submit" id="submit">Submit Review</button>
            </form>
        </section>
        <?php endif; ?>

        <section class="reviews-list">
            <h2>Customer Reviews</h2>

            <?php if(count($reviews) > 0): ?>
                <?php foreach ($reviews as $key => $review) : ?>
                <div class="review-card">
                    <div class="review-header">
                        <h3 class="review-title"><?= $review['package_name'] ?></h3>
                        <span class="review-date">Posted on: <?= date('F d, Y h:m A', strtotime($review['created_at'])); ?></span>
                    </div>
                    <div class="review-content">
                        <div class="review-rating">
                            <?php for ($i=1; $i <= 5; $i++) { 
                                if($review['rating'] >= $i){
                                    echo "<span class='star'>&#9733;</span>";
                                }else{
                                    echo "<span class='star'>&#9734;</span>";
                                }
                            }
                            ?>
                        </div>
                        <p class="review-text">
                            <?= $review['message'] ?>
                        </p>
                    </div>
                    <div class="review-footer">
                        <span class="review-author">By <?= $review['customer_name'] ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
            <h4 style="text-align: center;">No Reviews Found.</h4>
            <?php endif; ?>
        </section>
        
    </main>

    <?php include(__DIR__ . '/layout/footer.php') ?>
    <script>

        //choose package
        const packageList = document.getElementById('package-list');

        const packageId = document.getElementById('package-id');

        packageList.addEventListener('input', function() {
            const selectedOption = document.querySelector(`option[value="${this.value}"]`);

            // alert(packageId.value);
            if (selectedOption) {
                packageId.value = selectedOption.getAttribute('data-package-id');
            } else {
                packageId.value = null;
            }
        });


        //validation
        const submitBtn = document.getElementById('submit');
        const messageBox = document.getElementById('message');

        submitBtn.addEventListener('click', function(e) {
            if(!packageId.value){
                document.getElementById('package-id-error').innerText = '* Please choose correct package name.';
                e.preventDefault();
            }else{
                document.getElementById('package-id-error').innerText = '';
            }
            // alert(messageBox.value)
            if(!messageBox.value){
                document.getElementById('message-error').innerText = '* Please enter message.';
                e.preventDefault();
            }else{
                document.getElementById('message-error').innerText = '';
            }
            // e.preventDefault();
        });
    </script>
</body>

</html>