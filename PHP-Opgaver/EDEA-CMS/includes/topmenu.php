<nav class="top">
    <ul>
        <li><a href="#"><img src="./img/FacebookIcon-bw.png" alt="Facebook logo"></a></li>
        <li><a href="#"><img src="./img/InstagramIcon-bw.png" alt="Instagram logo"></a></li>
        <li><a href="#"><img src="./img/TwitterIcon-bw.png" alt="Twitter logo"></a></li>
        <li><a href="#"><img src="./img/YoutubeIcon-bw.png" alt="YouTube logo"></a></li>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            echo "<li><a href='#'>Logget ind som: ".$_SESSION['username']."</a></li>";    
            echo "<li><a href='logout-session.php'>Logout</a></li>";
            echo "<li><a href='#'>Min Side</a></li>";
        }
        else{
            echo "<li><a href='login.php'>Login</a></li>";
        }
        ?>
        <li class="carticon"><a href="#"><img src="../img/shopping-cart-solid.svg" alt="shopping cart icon"></a></li>
        <li><a href="#">Min kurv</a></li>
    </ul>
</nav>