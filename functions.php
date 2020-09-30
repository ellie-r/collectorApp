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
    $query = $db->prepare('SELECT `variety`, `tones`, `cost`, `nameOfBrand`, `region`,
            `wine`.`img_location` FROM `wine` JOIN `brands` ON `wine`.`brand_id` = `brands`.`id` JOIN `regions` 
            ON `wine`.`region_of_origin`=`regions`.`id`;');
    $query->execute();
    return $query->fetchAll();
}

/**
 * takes items from an array and returns the values within HTML
 * @param array $dataFromQuery, array of data from database
 *
 * @return string, return an string of html
 *
 */

function addItemToHTML(array $dataFromQuery): string
{
    $result = '';
    foreach ($dataFromQuery as $itemFromQuery) {
        if (
            (isset($itemFromQuery['variety'])) &&
            (isset($itemFromQuery['nameOfBrand'])) &&
            (isset($itemFromQuery['cost'])) &&
            (isset($itemFromQuery['region'])) &&
            (isset($itemFromQuery['tones']))
        ) {
            if (!isset($itemFromQuery['img_location'])) {
                $itemFromQuery['img_location'] = 'imgs/plain-bottle.png';
            }
            $result .=
                '<div class = "itemContainer">
                <h2>Variety: ' . $itemFromQuery['variety'] . '</h2>
                <p>Brand: ' . $itemFromQuery['nameOfBrand'] . '</p>
                <p>Cost: £' . $itemFromQuery['cost'] . '</p>
                <p>Region of Origin: ' . $itemFromQuery['region'] . '</p>
                <p>Tones: ' . $itemFromQuery['tones'] . '</p>
                <div class="itemImg">
                    <img src="' . $itemFromQuery['img_location'] . '" alt="image of wine">
                </div>
            </div>';
        }
    }
    return $result;
}
