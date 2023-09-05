<?php
session_start();

include("../../../database/model/BookingsTable.php");
include("../../../helpers/HTTP.php");
include("../../../helpers/FLUSH.php");

$booking = new BookingsTable();
$id = $_GET['id'];
$status = $_GET['status'] == 'approve' ? 1 : 2;

$booking->statusHandler($id, $status);

$message = 'Booking denied successfully';
if($status == 1){
    $message = 'Booking approved successfully';
}
FLUSH::message('success', $message);
HTTP::redirect("/admin/booking/index.php");
