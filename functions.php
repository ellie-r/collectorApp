<?php
/**
 * connects to the database and extracts all items required and returns in an associative array
 * @param $dbName, the name of the db to connect to
 *
 * @return array, the array of items in the collection
 */
function connect_to_db_and_extract_items($dbName)
{
    $db = new PDO('mysql:host=db;dbname=' . $dbName, 'root', 'password'); //initialise the db connection
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $query = $db->prepare('SELECT `variety`, `tones`, `cost`, `nameOfBrand`, `country`, `wine`.`img_location` FROM `wine` JOIN `brands` ON `wine`.`brand_id` = `brands`.`id` JOIN `country` ON `wine`.`country_of_origin`=`country`.`id`;');
    $query->execute();
    return $query->fetchAll();
}

/**
 * takes items from an array and returns the values within HTML
 * @param array $dataFromQuery, array of data from database
 *
 * @return string, return string of html
 */

function addItemToHTML(array $dataFromQuery): string
{
    $result = '';
    foreach ($dataFromQuery as $itemFromQuery) {
        if ((!isset($itemFromQuery['variety'])) || (!isset($itemFromQuery['nameOfBrand'])) || (!isset($itemFromQuery['cost'])) || (!isset($itemFromQuery['country'])) || (!isset($itemFromQuery['tones']))) {
            $result .= 'Error can\'t find key';
        } else {
            if (!isset($itemFromQuery['img_location'])) {
                $itemFromQuery['img_location'] = 'imgs/plain-bottle.png';
            }
            $result .=
                '<div class = "itemContainer">
                <h2>Variety: ' . $itemFromQuery['variety'] . '</h2>
                <p>Brand: ' . $itemFromQuery['nameOfBrand'] . '</p>
                <p>Cost: £' . $itemFromQuery['cost'] . '</p>
                <p>Country of Origin: ' . $itemFromQuery['country'] . '</p>
                <p>Tones: ' . $itemFromQuery['tones'] . '</p>
                <div class="itemImg">
                    <img src="' . $itemFromQuery['img_location'] . '" alt="image of wine">
                </div>
            </div>';

        }
    }
    return $result;
}
