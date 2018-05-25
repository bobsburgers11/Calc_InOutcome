<?php

/**
 * die Klasse nimmt den aufgerufenen Link und erstellt den gewünschten Controller und ruft die benötigte funktion auf.
 */
class Route
{
    static function call($controller, $action)
    {
        /**if (isset($_SESSION["login_user"])) {**/
            $controllerFile = '../controller/' . $controller . 'Controller.php';
        /**} else {
            $controllerFile = '../controller/' . 'User' . 'Controller.php';
            $action = 'loginShow';
        }**/
        if (file_exists($controllerFile)) {
            require_once($controllerFile);
            $controllerClass = $controller . "Controller";
            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                if (is_callable(array($controller, $action))) {
                    return $controller->{$action}();
                }
            }
        }
        return self::call('Error', 'error');
    }
}