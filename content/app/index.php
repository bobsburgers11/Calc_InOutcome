<?php

/**
 * diese Funktion nimmt den Link und ruft die gewünschte Seite auf.
 */
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'Homepage';
    $action = 'show';
}

require_once('../app/layout.php');

