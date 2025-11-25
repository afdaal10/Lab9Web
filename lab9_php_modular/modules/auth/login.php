<?php
// modules/auth/login.php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // contoh dummy: user=admin pass=admin
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';
    if ($user === 'admin' && $pass === 'admin') {
        $_SESSION['user'] = 'admin';
        header("Location: /lab9_php_modular/index.php?page=dashboard");
        exit;
    } else {
        $error = "Login gagal";
    }
}
?>
<div class="content">
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <input name="user" placeholder="user"><br>
        <input name="pass" type="password" placeholder="password"><br>
        <button type="submit">Login</button>
    </form>
</div>
