<?php

class Router
{

	private $routes = [];

	public function __construct()
	{
		include ROOT . '/application/components/other.php';

		$routesPath = ROOT. '/application/config/routes.php';
		$this->routes = include($routesPath);
	}


	public static function getURI()
	{
		$arUri = parse_url($_SERVER['REQUEST_URI']);
		if (!empty($arUri["path"])) {
			if($arUri["path"] == '/')
				return 'main';
			else
				return trim($arUri["path"], '/');
		}else{
			return 'failed';
		}
	}

	public function run()
    {
        $uri = $this->getURI();
        $not_found = true;
        foreach ($this->routes as $uriPattern => $path){
            if (preg_match("~$uriPattern~", $uri)) {
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);


                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;


                $controllerFile = ROOT . '/application/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;

                if (method_exists($controllerObject, $actionName)) {
                    $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                } else {
                    $not_found = true;
                    break;
                }
                if (!empty($result)) {
                    $not_found = false;
                    break;
                }
            }
        }
		if($not_found) {
            $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:' . $host . '404');
        }
	}
}