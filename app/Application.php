<?php
class Application {

  public static $root;

  public function __construct($rootPath){
    self::$root = $rootPath;
    // $this->root = $rootPath;
  }

  // static public function replaceSlash($path) {
  //   $path= str_replace("https://",'', $path);
  //   $path = str_replace("http://",'', $path);
  //   $path = str_replace("\\","/",  $path);
  //   $path = str_replace('/', DIRECTORY_SEPARATOR,  $path );
  //
  //   return self::$root . DIRECTORY_SEPARATOR . $path;
  //
  // }
}
