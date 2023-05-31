<nav class="top">
    <ul>
        <li><a href="#"><img src="./img/FacebookIcon-bw.png" alt="Facebook logo"></a></li>
        <li><a href="#"><img src="./img/InstagramIcon-bw.png" alt="Instagram logo"></a></li>
        <li><a href="#"><img src="./img/TwitterIcon-bw.png" alt="Twitter logo"></a></li>
        <li><a href="#"><img src="./img/YoutubeIcon-bw.png" alt="YouTube logo"></a></li>
        <!-- IF $_SESSION logged in isset and == TRUE -->
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            echo <<<HTML
                <li><a href='#'>Logget ind som: {$_SESSION['username']}</a></li>
                <li><a href='logout.php'>Logout</a></li>
                <li><a href='mypage.php'>Min Side</a></li>
            HTML;
        }
        else{   // TODO Best way ??
            ?>
            <li><a href='login.php'>Login</a></li>
            <?php
        }
        ?>
        <li class="carticon"><a href="#"><img src="./img/shopping-cart-solid.svg" alt="shopping cart icon"></a></li>
        <li><a href="#">Min kurv</a></li>
    </ul>
</nav>