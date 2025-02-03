<?php
session_start();
require_once 'classes/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($user->login($email, $password)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Ungültige E-Mail oder Passwort!";
    }
}

require_once 'views/header.php';
?>
<div class="container">
<h2>Anmeldung</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="POST" class="form">
        <input type="email" name="email" placeholder="E-Mail" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Anmeldung</button>
    </form>
    <p>Sie haben noch kein Konto? <a href="register.php">Registrieren</a></p>
</div>

<?php
require_once 'views/footer.php';
?>
