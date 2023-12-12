<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        include_once  'component/navAuth.php';
    } else {
        include_once  'component/navWithoutAuth.php';
    }
    ?>