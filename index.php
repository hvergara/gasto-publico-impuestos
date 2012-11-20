<?php

  define('BASE_URL', 'http://www.gastopublico.cl/impuestos');
  define('BASE_DIR', dirname(__FILE__));

  
  $page = empty($_GET['page']) ? 'home' : basename($_GET['page']);

  $view_file = sprintf("%s/views/%s.php", BASE_DIR, $page);
  
  if (file_exists($view_file)) {
    include_once $view_file;
  }

?>