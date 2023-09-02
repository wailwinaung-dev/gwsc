<?php
include('../../helpers/FLUSH.php');
include('../../database/model/BookingsTable.php');

$bookingsTable = new BookingsTable();
$bookings = $bookingsTable->getAll();

?>

<?php 
    include("../../layout/admin/header.php");
    include("../../layout/admin/navbar.php");
    include("../../layout/admin/sidebar.php") 
?>

<!-- Main -->
<main class="main-container">
    <div class="main-title">
        <h2>Bookings</h2> 

    </div>
    
    <div style="overflow-x:auto;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Package</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Price</th>
                    <th scope="col">Tax</th>
                    <th scope="col">Total</th>
                    <th scope="col">Payment Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Booking Date</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($bookings as $key => $booking) : ?>
                    <tr>
                        <th scope="row"><?= $key +1 ?></th>
                        <td><?= $booking['customer_name'] ?></td>
                        <td><?= $booking['package_name'] ?></td>
                        <td><?= $booking['qty'] ?></td>
                        <td><?= $booking['price'] ?></td>
                        <td><?= $booking['tax'] ?></td>
                        <td><?= $booking['total'] ?></td>
                        <td><?= $booking['payment_type'] ?></td>
                        <td><?= $booking['status'] ?></td>
                        <td><?= $booking['booking_date'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if(isset($bookings)): ?>
            <h3 class="text-center">No Data...</h3>
        <?php endif; ?>
    </div>
</main>

<?php 
    include("../../layout/admin/footer.php");
?>