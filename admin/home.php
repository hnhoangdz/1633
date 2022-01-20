<?php
require_once "header.php";
session_start();
?>

<link rel="stylesheet" href="css/homepage.css">

<body>
    <!-- Slide show -->
    <!-- image slider starts -->
    <div class="slider">
        <div class="slides">
            <!-- radio buttons starts -->
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <!-- radio button ends -->
            <!-- slide images starts -->
            <div class="slide first">
                <img src="image/aventador.png" alt="aventador">
            </div>
            <div class="slide">
                <img src="image/urus.png" alt="urus">
            </div>
            <div class="slide">
                <img src="image/hurracan.png" alt="huracan">
            </div>
            <!-- slide images end -->
            <!-- automatic navigation starts -->
            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
            </div>
            <!-- automatic navigation ends -->
        </div>
        <!-- manual navigation starts -->
        <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
        </div>
        <!-- manual navigation ends -->
    </div>
    <!-- image slider end -->

    <!-- auto transfer slide image -->
    <script type="text/javascript">
        var time = 1;
        setInterval(function() {
            document.getElementById('radio' + time).checked = true;
            time++;
            if (time > 3) {
                time = 1;
            }
        }, 10000);
    </script>
</body>