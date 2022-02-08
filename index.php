<?php

include 'functions.php';

if ($_SERVER['REQUEST_URI'] == '/') {
    $page = 'home';
}
else {
    $page = substr($_SERVER['REQUEST_URI'], 1);
    if (!preg_match('/^[a-z0-9]{3,15}$/', $page)) exit('error, url');
}

session_start();

if (file_exists('all/' . $page . '.php')) include 'all/' . $page . '.php';
    else if ($_SESSION['ulogin'] == 1 && file_exists('auth/' . $page . '.php')) include 'auth/' . $page . '.php';
        else if ($_SESSION['ulogin'] != 1 && file_exists('guest/' . $page . '.php')) include 'guest/' . $page . '.php';
            else exit('Страница 4045');

function top( $t ) {
    $title = $t;
    include 'head.php';
}

function bottom() {
    include 'footer.php';
}

?>

