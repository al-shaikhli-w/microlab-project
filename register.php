<?php
session_start();
require_once 'classes/User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Die Passwörter stimmen nicht überein!";
    } else {
        if ($user->register($name, $email, $password)) {
            header("Location: login.php?success=registered");
            exit();
        } else {
            $error = "Registrierung fehlgeschlagen. Die E-Mail ist möglicherweise bereits in Gebrauch.";
        }
    }
}

require_once 'views/header.php';

?>
    <div class="container">
    <h2>Registrieren</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="POST" class="form">
        <input type="text" name="name" placeholder="Voller Name" required>
        <input type="email" name="email" placeholder="E-Mail" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Bestätigen Sie Ihr Passwort" required>
        <button type="submit">Registrieren</button>
    </form>
    <p>Sie haben bereits ein Konto? <a href="login.php">Anmeldung</a></p>
    
    </div>
    
<?php
require_once 'views/footer.php';
?>