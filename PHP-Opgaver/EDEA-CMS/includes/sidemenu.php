<nav class="side">
    <a href="index.php"><img src="img/edea-skates-logo.png" alt="Edea logo"></a>
    <ul>
        <li><a href="index.php">Forside</a></li>
        <li><a href="shop.php">Shop</a></li>
        <?php if (!isset($_SESSION['logged_in'])) {
            echo <<<HTML
                <li><a href='login.php'>Login</a></li>
                <li><a href='createuser.php'>Opret bruger</a></li>
            HTML;
        }
        else{ // TODO Best way ??
            ?>
                <li><a href='logout.php'>logout</a></li>
                <li><a href="createproduct.php">Opret Product</a></li>
            <?php
        }
        ?>
    </ul>
</nav>