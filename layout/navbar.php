<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="navbar">
    <nav class="navbar-container">
        <a href="/gwsc/home.php" class="navbar-logo">GWSC</a>
        <div class="menu-button" onclick="toggleMenu()">&#9776;</div>
        <ul class="navbar-menu">
            <li><a href="/gwsc/information.php">Information</a></li>
            <li><a href="/gwsc/availability.php">PitchTypes&Availability</a></li>
            <li><a href="/gwsc/review.php">Reviews</a></li>
            <li><a href="/gwsc/feature.php">Features</a></li>
            <li><a href="/gwsc/contact.php">Contacts</a></li>
            <li><a href="/gwsc/localAttraction.php">Local Attractions</a></li>
            <?php if (isset($_SESSION['customer'])) : ?>
                <!-- <li><a href="/gwsc/login.php">Login</a></li> -->
                <li>
                    <a href="/gwsc/actions/logout.php">
                        Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </a>
                </li>
            <?php else : ?>
                <li><a href="/gwsc/login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<script>
    function toggleMenu() {
        var menu = document.querySelector('.navbar-menu');
        menu.classList.toggle('show');
    }
</script>