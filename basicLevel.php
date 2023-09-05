<?php

$array = [
  ['id' => 1, 'date' => "12.01.2020", 'name' => "test1", 'someField' => "someValue1"],
  ['id' => 2, 'date' => "02.05.2020", 'name' => "test2", 'someField' => "someValue2"],
  ['id' => 4, 'date' => "08.03.2020", 'name' => "test4", 'someField' => "someValue4"],
  ['id' => 1, 'date' => "22.01.2020", 'name' => "test1", 'someField' => "someValue1"],
  ['id' => 2, 'date' => "11.11.2020", 'name' => "test4", 'someField' => "someValue2"],
  ['id' => 3, 'date' => "06.06.2020", 'name' => "test3", 'someField' => "someValue3"],
];

// ввыделить уникальные значения по ключу id
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
 





