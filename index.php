<?php

  require_once __DIR__ . "/system/helpers/application_helper.php";
  require_once __DIR__ . "/system/helpers/url_helper.php";

  $app = new App(__DIR__);

  define ('VIEW_DIR', __DIR__ . '/' . $app->get_config('view_dir'));

  $route_params = $app->get_route_params();

  $ctrl_path = __DIR__ . "/" .
      $app->get_config('controller_dir') . "/" .
      $route_params['controller'] . ".php";

  if(file_exists($ctrl_path)) {

    require_once $ctrl_path;
  
  } else {
  
    $message = "Controller not found !";
    include VIEW_DIR . '/errors/404.php';
    exit;

  };

  $ctrl = new $route_params['controller'];

  $data = call_user_func_array([$ctrl, $route_params['method']], $route_params['arguments']);

  foreach ($data as $key => $value) {
    $$key = $value;
  }

  $view_path = VIEW_DIR . '/' . $route_params['controller'] . '/' . $route_params['method'] . '.php';

  if(file_exists($view_path)) include $view_path;
  else include VIEW_DIR . '/errors/404.php';

?>