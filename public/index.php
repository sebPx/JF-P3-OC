<?PHP
  	require_once ("../app/config.php");
  	require_once ("../app/autoloader.php");

	$AppLoader = new app\SplClassLoader('app', '../');
	$AppLoader->register();
		
	$srcLoader = new app\SplClassLoader('src', '../');
    $srcLoader->register();

	$libsLoader = new app\SplClassLoader('NxsFram', '../libs/');
    $libsLoader->register();
	
	$router = new app\router();