<?php

$db = new mysqli('localhost', 'root', 'usbw', 'information_schema');
$query = $db->query("SELECT DISTINCT TABLE_NAME, COLUMN_NAME, DATA_TYPE
				FROM
					INFORMATION_SCHEMA.COLUMNS
				WHERE TABLE_SCHEMA = '97eats'");

$rows = $query->fetch_all(true);
$tables = [];
foreach ($rows as $arr) {
	if(!isset($tables[$arr['TABLE_NAME']]))
		$tables[$arr['TABLE_NAME']] = [];
	
	$tables[$arr['TABLE_NAME']][] = [$arr['COLUMN_NAME'] => $arr['DATA_TYPE']];

}

return $tables;