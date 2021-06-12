<? 

if (!isset($_SESSION['role_id'])) {
    $_SESSION['role_id'] = 1;
} 

$projectName = 'Task_IP';
$staticPath = '/Task_IP';

$str = substr($_SERVER["REQUEST_URI"], strripos($_SERVER["REQUEST_URI"], $projectName));
$route = explode('/', $str);

$strController = isset($route[1]) && $route[1] != '' ? $route[1] : 'main'; 
$strAction = isset($route[2]) && $route[2] != '' ? explode('?', $route[2])[0] : 'index'; 

if (file_exists('controllers/'.$strController.'.php')) {
    include_once 'controllers/'.$strController.'.php';

    $controller = new $strController();

    if (method_exists($strController, $strAction)) $action = $controller->$strAction(); 
    else header("HTTP/1.0 404 Not Found");
    
} else header("HTTP/1.0 404 Not Found");
