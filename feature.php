<?php
include(__DIR__ . '/database/model/FeaturesTable.php');
$table = new FeaturesTable();
$features = $table->getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features</title>
    <?php include(__DIR__ . '/layout/header-link.php') ?>

</head>

<body id="feature">
    <?php include "./layout/navbar.php" ?>
    <div class="hero-image">
        <div class='hero-text'>
            <h1 style="font-size:50px">Features</h1>
        </div>
    </div>
    <main class="container">
        <h2 class="title">The Most Avaliable Features in each camp sites.</h2>
        <div class="card-container">
            <?php foreach ($features as $feature) : ?>
                <!--- start of the card -->
                <div class="card">
                    <img src=<?= "/gwsc/actions/photos/features/" . $feature['image'] ?> alt="<?php echo "Free Wifi" ?>">
                    <!-- Embed the location iframe -->
                    <h2>
                        <?php echo htmlspecialchars($feature['name']) ?>
                    </h2>
                    <p>
                        <?php echo htmlspecialchars($feature['description']); ?>
                    </p>
                    </p>
                </div>

                <!-- #end fo card-->
            <?php endforeach ?>
        </div>
    </main>
    <div class="wearable-container">
        <h1>Wearable technology categories</h1>
        <p class="fs-5 mb-4">Here are some types of wearables allowed on our sites.</p>

        <div class="row">


            <div class="wear-card" style="color: #008170">

                <svg class="svg-inline--fa fa-watch-smart fa-3x" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="watch-smart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                    <g class="fa-duotone-group">
                        <path class="fa-secondary" fill="currentColor" d="M304 64C348.2 64 384 99.82 384 144V368C384 412.2 348.2 448 304 448H80C35.82 448 0 412.2 0 368V144C0 99.82 35.82 64 80 64H304zM216 160C216 146.7 205.3 136 192 136C178.7 136 168 146.7 168 160V256C168 262.4 170.5 268.5 175 272.1L223 320.1C232.4 330.3 247.6 330.3 256.1 320.1C266.3 311.6 266.3 296.4 256.1 287L216 246.1V160z"></path>
                        <path class="fa-primary" fill="currentColor" d="M271.7 0C298.4 0 320 21.63 320 48.32V65.6C314.8 64.55 309.5 64 304 64H80C74.52 64 69.17 64.55 64 65.6V48.32C64 21.63 85.63 0 112.3 0L271.7 0zM64 464V446.4C69.17 447.4 74.52 448 80 448H304C309.5 448 314.8 447.4 320 446.4V464C320 490.5 298.5 512 272 512H112C85.49 512 64 490.5 64 464zM216 246.1L256.1 287C266.3 296.4 266.3 311.6 256.1 320.1C247.6 330.3 232.4 330.3 223 320.1L175 272.1C170.5 268.5 168 262.4 168 256V160C168 146.7 178.7 136 192 136C205.3 136 216 146.7 216 160V246.1z"></path>
                    </g>
                </svg><!-- <i class="fa-duotone fa-watch-smart fa-3x"></i> -->

                <div class="fs-5 mb-2 text-center">Smartwatches</div>
            </div>



            <div class="wear-card" style="color: red">

                <svg class="svg-inline--fa fa-watch-fitness fa-3x" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="watch-fitness" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                    <g class="fa-duotone-group">
                        <path class="fa-secondary" fill="currentColor" d="M304 64C348.2 64 384 99.82 384 144V368C384 412.2 348.2 448 304 448H80C35.82 448 0 412.2 0 368V144C0 99.82 35.82 64 80 64H304zM203.1 333.3L283.2 256.1C303.3 236.7 303.3 204.5 283.2 185C264 166.6 233.7 166.6 214.6 185L192 206.9L169.4 185C150.3 166.6 119.1 166.6 100.8 185C80.72 204.5 80.72 236.7 100.8 256.1L180.9 333.3C187.1 339.3 196.9 339.3 203.1 333.3V333.3z"></path>
                        <path class="fa-primary" fill="currentColor" d="M271.7 0C298.4 0 320 21.63 320 48.32V65.6C314.8 64.55 309.5 64 304 64H80C74.52 64 69.17 64.55 64 65.6V48.32C64 21.63 85.63 0 112.3 0L271.7 0zM64 464V446.4C69.17 447.4 74.52 448 80 448H304C309.5 448 314.8 447.4 320 446.4V464C320 490.5 298.5 512 272 512H112C85.49 512 64 490.5 64 464zM180.9 333.3L100.8 256.1C80.72 236.7 80.72 204.5 100.8 185C119.1 166.6 150.3 166.6 169.4 185L192 206.9L214.6 185C233.7 166.6 264 166.6 283.2 185C303.3 204.5 303.3 236.7 283.2 256.1L203.1 333.3C196.9 339.3 187.1 339.3 180.9 333.3V333.3z"></path>
                    </g>
                </svg><!-- <i class="fa-duotone fa-watch-fitness fa-3x"></i> -->
                <div class="fs-5 mb-2 text-center">Fitness trackers</div>
            </div>


            <div class="wear-card" style="color: green">

                <svg class="svg-inline--fa fa-shirt fa-3x" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="shirt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                    <g class="fa-duotone-group">
                        <path class="fa-secondary" fill="currentColor" d="M640 162.8c0 6.917-2.293 13.88-7.012 19.7l-49.96 61.63c-6.32 7.796-15.62 11.85-25.01 11.85c-7.01 0-14.07-2.262-19.97-6.919L480 203.3V464c0 26.51-21.49 48-48 48H208C181.5 512 160 490.5 160 464V203.3L101.1 249.1C96.05 253.7 88.99 255.1 81.98 255.1c-9.388 0-18.69-4.057-25.01-11.85L7.012 182.5C2.292 176.7-.0003 169.7-.0003 162.8c0-9.262 4.111-18.44 12.01-24.68l135-106.6C159.8 21.49 175.7 16 191.1 16h17.62C217.5 70.13 263.7 112 320 112s102.5-41.87 110.4-96h17.6c16.35 0 32.22 5.49 44.99 15.57l135 106.6C635.9 144.4 640 153.6 640 162.8z"></path>
                        <path class="fa-primary" fill="currentColor" d="M209.6 16h32C249.1 52.47 281.4 80 320 80s70.95-27.53 78.38-64h32C422.5 70.13 376.3 112 320 112S217.5 70.13 209.6 16z"></path>
                    </g>
                </svg><!-- <i class="fa-duotone fa-shirt fa-3x"></i> -->
                <div class="fs-5 mb-2 text-center">Smart clothing</div>
            </div>


            <div class="wear-card" style="color: #FD8D14">

                <svg class="svg-inline--fa fa-gem fa-3x" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <g class="fa-duotone-group">
                        <path class="fa-secondary" fill="currentColor" d="M116.7 33.8c4.5-6.1 11.7-9.8 19.3-9.8H376c7.6 0 14.8 3.6 19.3 9.8l112 152c6.8 9.2 6.1 21.9-1.5 30.4l-232 256c-4.6 5-11 7.9-17.8 7.9s-13.2-2.9-17.8-7.9l-232-256c-7.7-8.5-8.3-21.2-1.5-30.4l112-152zm38.5 39.8c-3.3 2.5-4.2 7-2.1 10.5l57.4 95.6L63.3 192c-4.1 .3-7.3 3.8-7.3 8s3.2 7.6 7.3 8l192 16c.4 0 .9 0 1.3 0l192-16c4.1-.3 7.3-3.8 7.3-8s-3.2-7.6-7.3-8L301.5 179.8l57.4-95.6c2.1-3.5 1.2-8.1-2.1-10.5s-7.9-2-10.7 1L256 172.2 165.9 74.6c-2.8-3-7.4-3.4-10.7-1z"></path>
                        <path class="fa-primary" fill="currentColor" d="M165.9 74.6c-2.8-3-7.4-3.4-10.7-1s-4.2 7-2.1 10.5l57.4 95.6L63.3 192c-4.1 .3-7.3 3.8-7.3 8s3.2 7.6 7.3 8l192 16c.4 0 .9 0 1.3 0l192-16c4.1-.3 7.3-3.8 7.3-8s-3.2-7.6-7.3-8L301.5 179.8l57.4-95.6c2.1-3.5 1.2-8.1-2.1-10.5s-7.9-2-10.7 1L256 172.2 165.9 74.6z"></path>
                    </g>
                </svg><!-- <i class="fa-duotone fa-gem fa-3x"></i> -->
                <div class="fs-5 mb-2 text-center">Smart jewelry</div>
            </div>


            <div class="wear-card" style="color: indigo">

                <svg class="svg-inline--fa fa-headphones fa-3x" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="headphones" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <g class="fa-duotone-group">
                        <path class="fa-secondary" fill="currentColor" d="M511.1 399.9C511.1 399.9 511.1 400 511.1 399.9C511.1 399.1 511.1 399.9 511.1 399.9zM.0042 399.9C.0042 399.1 .0042 399.9 .0042 399.9C.0042 399.9 .0042 400 .0042 399.9zM256 32C112.9 32 4.563 151.1 0 288v48.13c0-33.47 20.64-62.13 49.8-74.1C62.66 159.6 150.2 80.14 256 80.13c105.8 .0137 193.3 79.49 206.2 181.9C491.4 273.1 512 302.7 512 336.1V287.9C507.4 151 399.1 32 256 32z"></path>
                        <path class="fa-primary" fill="currentColor" d="M80 256C35.89 256 0 291.9 0 336.1l.0042 63.81C.0042 444.1 35.89 480 80 480C106.5 480 128 458.4 128 431.9V304.1C128 277.6 106.5 256 80 256zM432 256C405.5 256 384 277.6 384 304.1v127.9C384 458.4 405.5 480 432 480c44.11 0 79.1-35.88 79.1-80.06L512 336.1C512 291.9 476.1 256 432 256z"></path>
                    </g>
                </svg><!-- <i class="fa-duotone fa-headphones fa-3x"></i> -->
                <div class="fs-5 mb-2 text-center">Headphones</div>
            </div>


            <div class="wear-card" style="color: #232D3F">

                <svg class="svg-inline--fa fa-sunglasses fa-3x" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="sunglasses" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                    <g class="fa-duotone-group">
                        <path class="fa-secondary" fill="currentColor" d="M192.9 303.6c10.5 2.8 20.8 6.3 30.5 10.4l-3.2 57.5c-1.9 33.9-29.9 60.4-63.9 60.4H112c-32.7 0-59.7-24.5-63.5-56.2l144.4-72.2zM356 374l141-70.5c10.7 2.8 21.1 6.4 31 10.7V368c0 35.3-28.7 64-64 64H419.7c-33.1 0-60.6-25.3-63.7-58z"></path>
                        <path class="fa-primary" fill="currentColor" d="M118.6 80c-11.5 0-21.4 7.9-24 19.1L57.1 259.8c25.6-7.8 52.6-11.8 78.6-11.8c40.1 0 82.2 9.6 118.5 27.3c5.8 2.9 10.4 7.3 13.5 12.7h40.6c3.1-5.4 7.7-9.8 13.5-12.7c36.2-17.8 78.4-27.3 118.5-27.3c26 0 53 4.1 78.6 11.8L481.4 99.1c-2.6-11.2-12.6-19.1-24-19.1c-3.1 0-6.2 .6-9.2 1.8L416.9 94.3c-12.3 4.9-26.3-1.1-31.2-13.4s1.1-26.3 13.4-31.2l31.3-12.5c8.6-3.4 17.7-5.2 27-5.2c33.8 0 63.1 23.3 70.8 56.2l43.9 188c1.7 7.3 2.9 14.7 3.5 22.2c.3 1.8 .5 3.7 .5 5.6v5.2c0 .5 0 1 0 1.5V352c0 .2 0 .4 0 .6V368c0 61.9-50.1 112-112 112H419.7c-59.4 0-108.5-46.4-111.8-105.8L306.6 352H269.4l-1.2 22.2C264.9 433.6 215.8 480 156.3 480H112C50.1 480 0 429.9 0 368V352 310.7 304c0-1.9 .2-3.8 .5-5.7c.6-7.4 1.8-14.8 3.5-22.1l43.9-188C55.5 55.3 84.8 32 118.6 32c9.2 0 18.4 1.8 27 5.2l31.3 12.5c12.3 4.9 18.3 18.9 13.4 31.2s-18.9 18.3-31.2 13.4L127.8 81.8c-2.9-1.2-6-1.8-9.2-1.8zM48 352v16c0 35.3 28.7 64 64 64h44.3c34 0 62-26.5 63.9-60.5l3.2-57.5c-27.3-11.7-58.3-18-87.7-18c-29.5 0-60.5 6.4-87.7 18.2V352zm392.3-56c-29.4 0-60.4 6.3-87.7 18l3.2 57.5c1.9 33.9 29.9 60.5 63.9 60.5H464c35.3 0 64-28.7 64-64V314.2c-27.2-11.8-58.2-18.2-87.7-18.2z"></path>
                    </g>
                </svg><!-- <i class="fa-duotone fa-sunglasses fa-3x"></i> -->
                <div class="fs-5 mb-2 text-center">Smart eyewear</div>
            </div>


            <div class="wear-card" style="color: #670539">

                <svg class="svg-inline--fa fa-stethoscope fa-3x" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="stethoscope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                    <g class="fa-duotone-group">
                        <path class="fa-secondary" fill="currentColor" d="M512 265.3v78.75c0 92.6-79 168-176 168c-95.39 0-173.3-72.82-175.9-163.2l.5342 .0439C170.8 350.9 181.3 352 192 352s21.2-1.143 31.35-3.17l.8711-.0439c2.701 55.1 51.89 99.23 111.9 99.23c61.8 0 112-46.7 112-104V265.3C457.9 269.6 468.6 272 480 272C491.4 272 502.2 269.5 512 265.3z"></path>
                        <path class="fa-primary" fill="currentColor" d="M332.7 13.09L269.8 .4775c-12.96-2.607-25.56 5.803-28.16 18.77c-.002 .0156 .0039-.0156 0 0L238.4 34.99c-2.607 12.96 5.849 25.61 18.81 28.22c.0156 .0039-.0156-.002 0 0l30.69 6.059L288 192c0 53.02-42.98 96-96 96S95.94 244.1 95.94 191.9L95.89 69.37l30.72-6.112C139.6 60.68 147.1 48.07 145.4 35.1c-.0039-.0176 .0039 .0176 0 0L142.3 19.37C139.7 6.397 127.1-1.997 114.1 .5814c-.0176 .0039 .0176-.0039 0 0L51.28 12.99C40.06 15.27 32.02 25.15 32 36.59v155.4C32 280.2 103.8 352 192 352s160-71.78 160-160V36.59C351.1 25.16 343.9 15.33 332.7 13.09zM480 112c-44.18 0-80 35.82-80 80S435.8 272 480 272c44.18 0 80-35.81 80-79.1S524.2 112 480 112zM480 216c-13.23 0-24-10.77-24-24S466.8 168 480 168c13.23 0 24 10.77 24 24S493.2 216 480 216z"></path>
                    </g>
                </svg><!-- <i class="fa-duotone fa-stethoscope fa-3x"></i> -->
                <div class="fs-5 mb-2 text-center">Medical wearables</div>
            </div>

        </div>
    </div>
    <?php include "./layout/footer.php" ?>
</body>

</html>