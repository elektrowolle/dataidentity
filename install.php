<?php
	include_once 'conf.php';

	try {
		$pdo = new PDO($config['db_name']);
		$query = 
			'CREATE TABLE IF NOT EXISTS "dataset" ( '
			. 'id INTEGER PRIMARY KEY AUTOINCREMENT, '
			. 'entity_id INTEGER); '

			. 'CREATE TABLE IF NOT EXISTS "entity" ( '
			. 'id INTEGER PRIMARY KEY AUTOINCREMENT, '
			. 'name TEXT); '

			. 'CREATE TABLE IF NOT EXISTS "entitydata" ( '
			. 'id INTEGER PRIMARY KEY AUTOINCREMENT, '
			. 'entity_id INTEGER, '
			. 'attribute_id INTEGER, '
			. 'defaultValue TEXT); '

			. 'CREATE TABLE IF NOT EXISTS "attribute" ( '
			. 'id INTEGER PRIMARY KEY AUTOINCREMENT, '
			. 'name TEXT); '
			
			. 'CREATE TABLE IF NOT EXISTS "data" ( '
			. 'id INTEGER PRIMARY KEY AUTOINCREMENT, '
			. 'dataset_id INTEGER, '
			. 'attribute_id INTEGER, '
			. 'value TEXT, '
			. 'time INTEGER); '

			. 'CREATE TABLE IF NOT EXISTS "options" ( '
			. 'id TEXT PRIMARY KEY, '
			. 'value TEXT); ';
		;

		print($query);
		echo $pdo->exec($query); //or die(print_r($pdo->errorInfo(), true) . "dead");

		$options = $db->{'\'di.options\''}();

		$data = array(
				'id'    => 'showIP',
				'value' => 'false');

		echo "\n " . $options->insert($data);

	} catch (Exception $e) {
		echo "\n exception: ";
		print_r($e);
	}

	

?>