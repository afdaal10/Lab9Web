<?php
session_start();
session_destroy();
header("Location: /lab9_php_modular/index.php?page=dashboard");
exit;
