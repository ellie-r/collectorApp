<?php
function connect_to_db($dbName)
{
    $db = new PDO('mysql:host=db;dbname=' . $dbName, 'root', 'password'); //initialise the db connection
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

function addItemToHTML(array $dataFromQuery): string {
    $result = '';
    foreach($dataFromQuery as $itemFromQuery){
$variety = $itemFromQuery['variety'];
$tones = $itemFromQuery['tones'];
$cost = $itemFromQuery['cost'];
$brand = $itemFromQuery['nameOfBrand'];
$country = $itemFromQuery['country'];
$img_location = $itemFromQuery['img_location'];
        $result .= '<div class = "itemContainer">
    <h2>Variety: ' . $variety . '</h2>
    <p>Brand: ' . $brand . '</p>
    <p>Cost: £' . $cost . '</p>
    <p>Country of Origin: ' . $country . '</p>
    <p>Tones: ' . $tones . '</p>
    <div class="itemImg">
        <img src="' . $img_location . '" alt="image of wine"></div></div>';

}
    return $result;
}
