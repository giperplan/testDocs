<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);

$array = [
  ['id' => 1, 'date' => "12.01.2020", 'name' => "test1", 'someField' => "someValueF"],
  ['id' => 2, 'date' => "02.05.2020", 'name' => "test2", 'someField' => "someValueE"],
  ['id' => 4, 'date' => "08.03.2020", 'name' => "test4", 'someField' => "someValueD"],
  ['id' => 1, 'date' => "22.01.2020", 'name' => "test1", 'someField' => "someValueC"],
  ['id' => 2, 'date' => "11.11.2020", 'name' => "test4", 'someField' => "someValueB"],
  ['id' => 3, 'date' => "06.06.2020", 'name' => "test3", 'someField' => "someValueA"],
];

echo 'Source:';
var_dump($array);

/**
 * Find unique values by key id
 */ 
$discoveredKeys = [];

$arrayExistedItems = [];
$arrayUniqueItems = [];

$out = array_map(function($item) use (&$discoveredKeys, &$arrayExistedItems, &$arrayUniqueItems) {       
    if ( isset($discoveredKeys[$item['id']]) ) {
        $arrayExistedItems[] = $item;
    } else {
        $arrayUniqueItems[] = $item;
        $discoveredKeys[$item['id']] = true;
    }
}, $array);
echo "Unique:";
var_dump($arrayUniqueItems);

echo "Existed:";
var_dump($arrayExistedItems);


/** 
 * Sorting function
 */
include 'Sort.php';

echo "Sorted by id (desc):";
var_dump(Sort::sortByField($array, 'id', Sort::SORT_AS_NUMBER), SORT_DESC);

echo "Sorted by date:";
var_dump(Sort::sortByField($array, 'date', Sort::SORT_AS_DATE));

echo "Sorted by someField:";
var_dump(Sort::sortByField($array, 'someField', Sort::SORT_AS_STRING));





