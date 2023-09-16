<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <?php include(__DIR__ . '/layout/header-link.php') ?>
    <link rel="stylesheet" href="./asset/css/review.css">
</head>

<body>
    <?php include(__DIR__ . '/layout/navbar.php') ?>
    <div class="hero-image">
        <div class="hero-text">
            <!-- <h1 style="font-size:50px">Customer Review</h1> -->
        </div>
    </div>
    <main>
        <section class="review-form">
            <h2>Write a Review</h2>
            <form id="reviewForm">
                <label for="comment">Comment:</label>
                <textarea id="comment" rows="4" required></textarea>

                <button type="submit">Submit Review</button>
            </form>
        </section>

        <section class="reviews-list">
            <h2>Customer Reviews</h2>

            <div class="review-card">
                <div class="review-header">
                    <h3 class="review-title">Product Review</h3>
                    <span class="review-date">Posted on: July 15, 2023</span>
                </div>
                <div class="review-content">
                    <p class="review-text">
                        This product exceeded my expectations! It's high quality and works perfectly. I highly recommend it.
                    </p>
                </div>
                <div class="review-footer">
                    <span class="review-author">By John Doe</span>
                </div>
            </div>

        </section>
    </main>

    <?php include(__DIR__ . '/layout/footer.php') ?>
</body>

</html>