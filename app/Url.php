<?php
class Url
{
    public function getUrlInfo()
    {
        // recupere le lien d'entrée (vers index.php) : /mondossier/index.php
        $currentUrl = $_SERVER['PHP_SELF'];
        // recupere le lien en cours (dynamique)
        $currentPageUrl = $_SERVER['REQUEST_URI'];

        // recupere: [dirname] => /mondossier dans un tableau grace à la fonction pathinfo

        $pathInfo = explode('/', pathinfo($currentUrl)['dirname']);
        $path = '/';

        for ($i = 0; $i < $_ENV['PATH_INFO']; $i++) {
            if (!empty($pathInfo[$i])) {
                $pathInfo[$i] .= "/";
                $path .= $pathInfo[$i];
            }

        }
        // var_dump($path);
        // die();
        // print($path);

        // recupere le : localhost ou www.monsite.fr
        $nomDuHost = $_SERVER['HTTP_HOST'];

        // recupere le http:// ou https://
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'http';

        $uri[0] = $protocol . '://' . $nomDuHost . $path;
        $uri[1] = $protocol . '://' . $nomDuHost . $currentPageUrl;
        // retourne : http://localhost/mondossier/
        return $uri;
    }
}
