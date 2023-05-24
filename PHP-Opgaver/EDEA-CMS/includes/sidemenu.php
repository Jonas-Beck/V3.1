<nav class="side">
    <a href="index.php"><img src="img/edea-skates-logo.png" alt="Edea logo"></a>
    <ul>
        <li><a href="index.php">Forside</a></li>
        <li><a href="shop.php">Shop</a></li>
        <?php if (!isset($_SESSION['logged_in'])) {
            echo "<li><a href='login.php'>Login</a></li>";              
            echo "<li><a href='createuser.php'>Opret bruger</a></li>";
        }
        else{
            echo "<li><a href='logout-session.php'>logout</a></li>";
        }
        ?>
    </ul>
</nav>