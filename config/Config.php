<?php
/* Start a new session or resume an existing one */
if (session_status() === PHP_SESSION_NONE) session_start();

/* Basic information */
define('BASE_URL', '/blog');
define('WEB_NAME', 'My Blog');

/* Data for connection */
define('HOST', 'localhost');
define('DATABASE', 'blog');
define('USER', 'root');
define('PASS', '');
define('CHARSET', 'utf8');

/* functions for messages */
function messages($type, $text)
{
    return $_SESSION['message'] = '<div class="alert alert-' . $type . ' p-1 px-3" role="alert">' . $text . '</div>';
}

/* function for redirection */
function redirect($path)
{
    header("Location:" . $path);
}

function formatDate()
{
    $date = explode('-', date('Y-m-d'));
    $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
    return $months[(int)$date[1]] . " " . $date['2'] . "," . $date['0'];
}
