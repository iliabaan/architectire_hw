<?php

require 'Explorer.php';

$page = new Explorer($_SERVER['DOCUMENT_ROOT']);
$page->showDirectory();

if ($_GET['folder']) {
    $dir = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $_GET['folder'];
    $page = new Explorer($dir);
    $page->showDirectory();
}

