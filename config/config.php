<?php

$basePath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));

if ($basePath === '/') {
    $basePath = '';
}

define('BASE_URL', $basePath);