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

/**
 * extracts the brands and their ids from the database and returns them in an associative array
 * @param PDO $db, the database to extract from
 *
 * @return array array of the brands and their ids
 */
function extract_brands_from_db(PDO $db): array {
    $query = $db->prepare('SELECT `id`,`nameOfBrand` FROM `brands`;');
    $query->execute();
    return $query->fetchAll();
}

/**
 * extracts the regions and their ids from
 * @param PDO $db, the database to extract from the database and returns them in an associative array
 *
 * @return array array of the regions and their ids
 */
function extract_regions_from_db(PDO $db): array {
    $query = $db->prepare('SELECT `id`,`region` FROM `regions`;');
    $query->execute();
    return $query->fetchAll();
}

/**
 * adds the array of values to the db after changing the data types to match the db structure
 * @param array $postArray, the array of values you want to add into the db
 * @param PDO $db , the db you want to add the values to
 */
function add_new_item_to_db(array $postArray,PDO $db) {
    settype($postArray['brand'], "integer");
    settype($postArray['cost'], "float");
    settype($postArray['region'], "integer");
    $query = $db->prepare('INSERT INTO `wine` (`variety`, `tones`, `brand_id`, `cost`, `region_of_origin`) VALUES (?,?,?,?,?);');
    $query->execute([$postArray['variety'], $postArray['tones'], $postArray['brand'], $postArray['cost'], $postArray['region'] ]);
}