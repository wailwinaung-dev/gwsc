<header class="navbar">
    <nav class="navbar-container">
        <a href="#" class="navbar-logo">GWSC</a>
        <div class="menu-button" onclick="toggleMenu()">&#9776;</div>
        <ul class="navbar-menu">
            <li><a href="/gwsc/information.php">Information</a></li>
            <li><a href="/gwsc/availability.php">PitchTypes&Availability</a></li>
            <li><a href="/gwsc/review.php">Reviews</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="/gwsc/contact.php">Contacts</a></li>
            <li><a href="#">Local Attractions</a></li>
            <li><a href="/gwsc/login.php">Login</a></li>
        </ul>
    </nav>
</header>

<script>
    function toggleMenu() {
        var menu = document.querySelector('.navbar-menu');
        menu.classList.toggle('show');
    }
</script>