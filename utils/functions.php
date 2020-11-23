<?php

function verifUrl(string $url, array $paths = [])
{
    $isRigth = false;
    foreach ($paths as $path) {
        if ($url === $path) {
            $isRigth = true;
        }
    }
    return $isRigth;
}
function redirectErrorPage()
{
    return header('location:404');
}
function secureData($data, $typeData = "")
{
    if ($typeData != "password") {
        $data = trim($data);
    }

    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function valid_email($str)
{
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? false : true;
}

function isTheSameValue($newData, $originData)
{
    $response = false;
    if (strcmp(strval($newData), strval($originData)) === 0) {
        $response = true;
    }
    return $response;
}
