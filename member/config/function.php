<?php

function sqlInsert($table, $data){
	    if (is_array($data)) {
	        $key   = array_keys($data);
	        $kolom = implode(',', $key);
	        $v     = array();
	        for ($i = 0; $i < count($data); $i++) {
	            array_push($v, "'" . $data[$key[$i]] . "'");
	        }
	        $values = implode(',', $v);
	        $query  = "INSERT INTO $table ($kolom) VALUES ($values)";
	    } else {
	        $query = "INSERT INTO $table $data";
	    }
		  return $query;

	}
function sqlUpdate($table, $data, $where){
    if (is_array($data)) {
        // ini buat array
        $key   = array_keys($data);
        $kolom = implode(',', $key);
        $v     = array();
        for ($i = 0; $i < count($data); $i++) {
            array_push($v, $key[$i] . " = '" . $data[$key[$i]] . "'");
        }
        $values = implode(',', $v);
        $query  = "UPDATE $table SET $values WHERE $where";
    } else {
        $query = "UPDATE $table SET $data WHERE $where";
    }
    
   return $query;
}	

?>