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
    
    <?php if (FLUSH::check('success')) : ?>
        <div class="alert alert-success">
            <?= FLUSH::message('success') ?>
        </div>
    <?php endif ?>

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
                    <th scope="col">Action</th>
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
                        <td><?= $booking['subtotal'] ?></td>
                        <td><?= $booking['payment_type'] ?></td>
                        <td>
                            <?php 
                                if($booking['status'] == 1){
                                    echo 'Approved';
                                }elseif($booking['status'] == 2){
                                    echo 'Denied';
                                }else{
                                    echo 'Pending';
                                }
                            ?>
                        </td>
                        <td><?= $booking['booking_date'] ?></td>
                        <td>
                            <a 
                                href="/gwsc/actions/admin/booking/control_status.php?id=<?= $booking['id'] ?>&status=approve" 
                                class="text-success" 
                                onclick="return confirm('Are you sure to approve #<?= $booking['id'] ?>')"
                            >
                                Approve
                            </a> | 
                            <a 
                                href="/gwsc/actions/admin/booking/control_status.php?id=<?= $booking['id'] ?>&status=deny" 
                                class="text-danger" 
                                onclick="return confirm('Are you sure to deny #<?= $booking['id'] ?>')"
                            >
                                Deny
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if(count($bookings) < 1): ?>
            <h3 class="text-center">No Data...</h3>
        <?php endif; ?>
    </div>
</main>

<?php 
    include("../../layout/admin/footer.php");
?>