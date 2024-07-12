<?php
/**
************************************************************************
* This function is heliping to Remove duplicate form multidimentional
* array using below php build in functions
* array_map, array_unique, serialize, unserialize
* It return the unique multidimensioanl array
************************************************************************
*/

function remove_duplicate_from_multi_dim_arr(array $multi_dimn_arr){

    return array_map("unserialize", array_unique(array_map("serialize", $multi_dimn_arr)));
}

/**
********************************************************
* This function process the array or obj
* for use in dd 1st value is the dd value
* 2nd value is the dd name
* It convert the associate array to index array
* Then first value use as key and 2nd value use as
* value ... This is the way dd works...
********************************************************
*/
function arr_for_dd( $data ){
    $arr = [];
    if( is_array( $data ) || is_object( $data ) ){
        foreach ($data as $k => $v) {
            $v = (array) $v;
            $new_index_arr = array_values($v);
            $arr[$new_index_arr[0]] = $new_index_arr[1];
        }
    }
    return $arr;
}

/**
 *
 * This function remove a array element
 * Based on it's key and return the val
 * @param Array and $key
 * @return val or Null
 */

function arr_remove(array &$arr, $key) {
    if (array_key_exists($key, $arr)) {
        $val = $arr[$key];
        unset($arr[$key]);

        return $val;
    }
    return null;
}