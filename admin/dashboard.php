<?php 
    include(__DIR__ . "/../database/model/BookingsTable.php");
    include(__DIR__ . "/../database/model/PackagesTable.php");
    include(__DIR__ . "/../database/model/CustomersTable.php");
    include(__DIR__ . "/../database/model/ContactsTable.php");

    $bookings = new BookingsTable();
    $bookings_count = $bookings->getCount();

    $packages = new PackagesTable();
    $packages_count = $packages->getCount();

    $customers = new CustomersTable();
    $customers_count = $customers->getCount();

    $contacts = new ContactsTable();
    $contacts_count = $contacts->getCount();

    include("../layout/admin/header.php");
    include("../layout/admin/navbar.php");
    include("../layout/admin/sidebar.php");
?>

    <!-- Main -->
    <main class="main-container">
    <div class="main-title">
        <h2>DASHBOARD</h2>
    </div>

    <div class="main-cards">

        <div class="card">
        <div class="card-inner">
            <h3>
                <a href="/gwsc/admin/package/index.php">PACKAGES</a>   
            </h3>
            <span class="material-icons-outlined">inventory</span>
        </div>
        <h1><?= $packages_count ?></h1>
        </div>

        <div class="card">
        <div class="card-inner">
            <h3>
                <a href="/gwsc/admin/customer/index.php">CUSTOMERS</a>
            </h3>
            <span class="material-icons-outlined">groups</span>
        </div>
        <h1><?= $customers_count ?></h1>
        </div>

        <div class="card">
        <div class="card-inner">
            <h3>
                <a href="/gwsc/admin/booking/index.php">BOOKINGS</a>
            </h3>
            <span class="material-icons-outlined">view_timeline</span>
        </div>
        <h1><?= $bookings_count ?></h1>
        </div>

        <div class="card">
        <div class="card-inner">
            <h3>
                <a href="/gwsc/admin/contact/index.php">ALERTS</a>
            </h3>
            <span class="material-icons-outlined">notification_important</span>
        </div>
        <h1><?= $contacts_count ?></h1>
        </div>

    </div>

    </main>
    <!-- End Main -->



<?php 
    include("../layout/admin/footer.php");
?>


