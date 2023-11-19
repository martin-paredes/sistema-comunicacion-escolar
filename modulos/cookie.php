<?php
if (!empty($_COOKIE['remember']) & !empty($_COOKIE['authenticate'])) {
    $remember = $_COOKIE['remember'];
} else {
    $remember = '';
}

if ($remember == 'si') {
    $_SESSION['usuario'] = $_COOKIE['usuario'];

    if (!empty($_COOKIE['admin'])) {
        $_SESSION['admin'] = $_COOKIE['admin'];
    }
}