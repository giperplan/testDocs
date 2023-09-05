<?php
class sort {
    const SORT_AS_STRING = 1;
    const SORT_AS_NUMBER = 2;
    const SORT_AS_DATE = 3;

    private static function sortFunctions($sort_as) {
        return [
            self::SORT_AS_STRING => function ($a, $b) {
                return strcmp($a, $b);
            },
            self::SORT_AS_NUMBER => function ($a, $b) {                
                return $a - $b;
            },
            self::SORT_AS_DATE => function ($a, $b) {
                return strtotime($a) - strtotime($b);
            },
        ][$sort_as];
        
    }

    public static function sortByField($array, $field, $sort_mode = self::SORT_AS_STRING, $sort_direction = SORT_ASC) {
        usort($array, function($a, $b) use ($field, $sort_mode, $sort_direction) {            
            $result = self::sortFunctions($sort_mode)($a[$field], $b[$field]);
            if ($sort_direction === SORT_DESC) {
                $result *= -1;
            }
            return $result;            
        });
        return $array;
    }
}