<?php
/**
 * connects to the database and sets the attribute
 * @param $dbName, the name of the db to connect to
 *
 * @return PDO, the db connection
 */
function connect_to_db($dbName)
{
    $db = new PDO('mysql:host=db;dbname=' . $dbName, 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * using the db connection provided select the items from the db and return as an associative array
 * @param PDO $db, the database to extract from
 *
 * @return array, the associative array of the items
 *
 */
function extract_from_db(PDO $db): array {
    $query = $db->prepare('SELECT `variety`, `tones`, `cost`, `nameOfBrand`, `country`,
            `wine`.`img_location` FROM `wine` JOIN `brands` ON `wine`.`brand_id` = `brands`.`id` JOIN `country` 
            ON `wine`.`country_of_origin`=`country`.`id`;');
    $query->execute();
    return $query->fetchAll();
}

/**
 * takes items from an array and returns the values within HTML
 * @param array $dataFromQuery, array of data from database
 *
 * @return array, return an array with a key of result and value of the string of html and a key or error and value
 *  of any error that occured
 *
 */

function addItemToHTML(array $dataFromQuery): array
{
    $result = '';
    $error = '';
    foreach ($dataFromQuery as $itemFromQuery) {
        if ((!isset($itemFromQuery['variety'])) || (!isset($itemFromQuery['nameOfBrand']))
            || (!isset($itemFromQuery['cost'])) || (!isset($itemFromQuery['country']))
            || (!isset($itemFromQuery['tones']))) {
            $error = 'Error can\'t find key';
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
    $result_array = ['result' => $result, 'error'=> $error];
    return $result_array;
}
