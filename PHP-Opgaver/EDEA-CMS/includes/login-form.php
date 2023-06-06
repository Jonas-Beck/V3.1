<!-- Used with login-form-validate.php include to validate data and redirect -->

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">  <!-- PHP_SELF to update the current page  -->
    <!-- If POST data exist for input use that as value  -->
    <!-- Username Form -->
    <p>
        <label for="login-username" class="loginform">Brugernavn: </label>
        <input type="text" name="login-username" placeholder="Brugernavn" class="logininput" value="<?php echo isset($_POST['login-username']) ? $_POST['login-username'] : '';?>">
        <label for="login-username" class="loginerror"><?php echo $usernameError;?></label>
    </p>
    <!-- Password Form -->
    <p>
        <label for="login-password" class="loginform">Adgangskode: </label>
        <input type="password" name="login-password" placeholder="Adgangskode" class="logininput" value="<?php echo isset($_POST['login-password']) ? $_POST['login-password'] : '';?>">
        <label for="login-password" class="loginerror"><?php echo $passwordError;?></label>

    </p>
    <!-- Submit Form -->
    <p>
        <input type="submit" name="login-submit" value="Login" class="submitbtn loginbtn">
    </p>
</form>