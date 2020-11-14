<?php 

class Application {
    public static string $root;
    public function __construct(string $rootPath){
        self::$root = $rootPath;
    }
}