<?php
session_start();
include('./helpers/FLUSH.php');
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
            <div class="img-container">
                <img width="100%" src="./actions/photos/packages/<?= $package['image'] ?>" alt="<?= $package['name'] ?>">
            </div>
            <div class="content-container">
                <h3>
                    <?= $package['name'] ?>
                </h3>
                <p>
                    <?= $package['description'] ?>
                </p>
                <p>
                    Price: <b>$ <span id="price"><?= $package['price'] ?></span></b>
                </p>
                <p>
                    Pitch Type: <b><?= $package['pitch_type_name'] ?></b>
                </p>
                <p>
                    Campsite: <b><?= $package['campsite_name'] ?></b>
                </p>

                <p>
                    Features: <b class="text-primary"> |
                        <?php # foreach ($features as $key => $feature) : ?>
                            <?= $package['features'] ?> |
                        <?php # endforeach; ?>
                    </b>
                </p>

                <p>
                    Local Attractions: <b class="text-primary"> |
                        <?php # foreach ($attractions as $key => $attraction) : ?>
                            <?= $package['attractions'] ?> |
                        <?php #endforeach; ?>
                    </b>
                </p>

            </div>
            <div class="reserve-container booking-form">
                <?php if (FLUSH::check('success')) : ?>
                    <div class="alert alert-success">
                        <?= FLUSH::message('success') ?>
                    </div>
                <?php endif ?>
                <h2>Your Booking</h2>
                <form id="bookingForm" method="post" action="./actions/add_booking.php">
                    <input type="hidden" name="package_id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="price" value="<?= $package['price'] ?>">
                    <div class="form-group">
                        <label for="qty">Choose Package Qty:</label>
                        <input type="number" name="qty" id="qty" min="1" value="1" required>
                    </div>
                    <div class="form-group">
                        <label for="booking-date">Choose Booking Date:</label>
                        <input type="date" name="booking_date" id="booking-date" required>
                    </div>
                    <div class="result">
                        <div class="tax">
                            <span>Tax</span>
                            <span>10%</span>
                        </div>
                        <div class="total-price">
                            <span>Total Price</span>
                            <span>
                                $<span id="total-price-result">
                                    <?= $package['price'] + (($package['price'] * 10) / 100) ?>
                                </span>
                            </span>
                        </div>
                    </div>
                    <?php if(isset($_SESSION['customer'])): ?>
                        <button type="submit" id="submit">Submit Booking</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        <div class="iframe-container">
            <iframe src="<?= $package['location'] ?>" frameborder="0"></iframe>
        </div>
    </main>
    <?php include(__DIR__ . '/layout/footer.php') ?>
    <script>
        const qty = document.getElementById('qty');
        const price = +document.getElementById('price').textContent;
        const totalPrice = document.getElementById('total-price-result');
        qty.addEventListener("input", function() {
            // alert(price)
            let result = 0;
            if (this.value) {
                let tax = (price * this.value * 10) / 100;
                result = (price * this.value) + tax;
            }

            totalPrice.innerText = result;
        });

        //document ready
        (function() {
            const today = new Date().toISOString().split("T")[0];
            // Set the minimum date for the input element to today
            document.getElementById("booking-date").setAttribute("min", today);
        })();
    </script>
</body>

</html>