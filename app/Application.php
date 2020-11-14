<?php



class Application {
    public static string $root;
    public function __construct(string $rootPath){
        self::$root = $rootPath;
    }

    static public function replaceSlash(string $path) {
        $path= str_replace("https://",'', $path);
        $path = str_replace("http://",'', $path);

        $path = str_replace("\\","/",  $path);
        $path = str_replace('/', DIRECTORY_SEPARATOR,  $path );

        return self::$root . DIRECTORY_SEPARATOR . $path;

    }
}
