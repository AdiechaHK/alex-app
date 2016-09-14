<?php

class App
{

  private $dir;

  function __construct($directory) {
    $this->dir = $directory;
  } 


  public function get_route_params()
  {


    $path = strpos($_SERVER['PATH_INFO'], '/') === 0? substr($_SERVER['PATH_INFO'], 1): $_SERVER['PATH_INFO'];

    $list = explode("/", $path);

    $route_params = array(
      'controller' => "",
      'method' => "",
      'arguments' => []);

    // Assigning proper values
    $step = 0;
    foreach ($list as $param) {
      switch ($step) {
        case 0:
          $route_params['controller'] = $param;
          $step++;
          break;
        case 1:
          $route_params['method'] = $param;
          $step++;
          break;
        default:
          $route_params['arguments'] = array_merge($route_params['arguments'], [$param]);
          break;
      }
    }

    // Making sure all information filled or we fill it with defaults
    if($route_params['controller'] == '') $route_params['controller'] = $this->get_config('default_controller');
    if($route_params['method'] == '') $route_params['method'] = $this->get_config('default_method');

    return $route_params;

  }


  public function get_config($key)
  {
    $app_config = require($this->dir . "/config/app.php");
    return $app_config[$key];
  }

}

?>