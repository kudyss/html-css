<?php
session_start();

// Nastavení jména a hesla (změň si podle sebe)
$admin_user = "admin";
$admin_pass = "heslo123";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';

    if ($user === $admin_user && $pass === $admin_pass) {
        $_SESSION['prihlasen'] = true;
        header("Location: py.php"); // Po přihlášení skočí zpět na tvůj hlavní soubor
        exit;
    } else {
        $error = "Chybné údaje!";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <form method="post">
        <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
        <input type="text" name="user" placeholder="Jméno" required><br>
        <input type="password" name="pass" placeholder="Heslo" required><br>
        <button type="submit">Vstoupit</button>
    </form>
</body>
</html>