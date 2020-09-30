<?php
require('functions.php');

if (isset($_POST['variety']) &&
    isset($_POST['brand']) &&
    isset($_POST['cost']) &&
    isset($_POST['region'])
) {
    $db = connect_to_db('wineCollection');
    add_new_item_to_db($_POST, $db);
    header("Location: index.php");
    exit();
}

