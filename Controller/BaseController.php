<?php

namespace Controller;

class BaseController
{

    protected $route;
    private $params;
    protected $userManager;
    protected $productManager;

    public function __construct($route)
    {
        $this->route = $route;
        $this->params = array();
        $this->loadManager();
    }

    public function loadManager()
    {
        if(!empty($this->route->manager)){
            foreach($this->route->manager as $manager)
            {
                $managerName = $manager . "Manager";
                $managerClass = "Model\\" . $managerName;
                $this->{lcfirst($managerName)} = new $managerClass();
            }
        }
    }

    public function View($template)
    {
        if (file_exists("View/" .$this->route->controller . "/css/$template.css")) {
            $header = '<link rel="stylesheet" href="View/' . $this->route->controller . '/css/' . $template . '.css">';
        }
        ob_start();
        extract($this->params);
        include "View/". $this->route->controller ."/$template.php";
        $content = ob_get_clean();
        include "View/layout.php";
    }

    public function addParam($key, $value)
    {
        $this->params[$key] = $value;
    }
}
