<?php
// index.php - router sederhana
require_once __DIR__ . '/config/database.php';

// dapatkan page dari query string: ?page=module/action
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// pisah module/action
$parts = explode('/', $page);
$module = $parts[0] ?? 'dashboard';
$action = $parts[1] ?? 'index';

// helper untuk load view
function view($name, $data = []) {
    extract($data);
    require __DIR__ . "/views/header.php";
    require __DIR__ . "/views/{$name}.php";
    require __DIR__ . "/views/footer.php";
    exit;
}

// routing sederhana
if ($module === 'dashboard') {
    view('dashboard');
}

// module user
if ($module === 'user') {
    if ($action === 'list') {
        require __DIR__ . "/modules/user/list.php";
        exit;
    } elseif ($action === 'add') {
        require __DIR__ . "/modules/user/add.php";
        exit;
    }
}

// auth
if ($module === 'auth') {
    if ($action === 'login') {
        require __DIR__ . "/modules/auth/login.php";
        exit;
    }
    if ($action === 'logout') {
        require __DIR__ . "/modules/auth/logout.php";
        exit;
    }
}

// default fallback
echo "Halaman tidak ditemukan.";
