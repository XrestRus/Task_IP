<?
function view($title = '')
{
    global $strAction, $strController, $staticPath, $controller;

    $_this = $controller;
    $title = $title == '' ? $strAction : $title;

    if (file_exists("views/$strController/$title.php")) {
        $view = "views/$strController/$title.php";

        include_once "views/shared/layout.php";
    }
    else header("HTTP/1.0 404 Not Found");
}