<footer>
    <div class="footer-logo">GWSC</div>
    <div class="link-container">

        <ul class="footer-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Terms of Service | Privacy Policy</a></li>
        </ul>
        <ul class="footer-links">
            <li><a href="#">Information</a></li>
            <li><a href="#">PitchTypes&Availability</a></li>
            <li><a href="#">Reviews</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">Local Attraction</a></li>
        </ul>

        <div class="footer-social">
            <h4>Address</h4>
            <a href="#" target="_blank">No.1, Shwe Taung Kyar Street, Yangon</a>
            <a href="#" target="_blank">Tel: +123 456 7890</a>
            <a href="#" target="_blank">Email: contact@gwsc.com</a>
        </div>

        <div class="footer-social">
            <h4>Social Media</h4>
            <a href="#" target="_blank"><i class="fa fa-facebook"></i> Facebook</a>
            <a href="#" target="_blank"><i class="fa fa-twitter"></i> Twitter</a>
            <a href="#" target="_blank"><i class="fa fa-instagram"></i> Instagram</a>
            <a href="/gwsc/rss-producer.php" target="_blank"><i class="fa fa-rss"></i> Rss Feed</a>
        </div>
    </div>

    <marquee>
        <?= isset($_SESSION['customer']) ? "You are visited ". $_SESSION['customer']['view_count'] . " time" : '' ?>
        <span> • </span>
        You are in <span id="location"></span> page.
    </marquee>

    <p class="copyright">&copy; 2023 GWSC. All rights reserved.</p>
</footer>


<script>
    let i = window.location.href.split('.php')[0];
    let page = i.split('/');
    page = page[page.length - 1];
    document.getElementById("location").innerText = page.replace("_"," ");
    document.getElementsByTagName("title")[0].innerText=page.replace("_"," ");
</script>