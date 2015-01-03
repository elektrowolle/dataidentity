<?php
	include_once 'conf.php';

	try {
		$pdo = new PDO($config['db_name']);
		$query = 
			'CREATE TABLE IF NOT EXISTS "di.dataset" ( '
			. 'id INTEGER PRIMARY KEY AUTOINCREMENT, '
			. 'entity_id INTEGER NOT NULL); '

			. 'CREATE TABLE IF NOT EXISTS "di.entity" ( '
			. 'id INTEGER PRIMARY KEY AUTOINCREMENT, '
			. 'name TEXT NOT NULL); '

			. 'CREATE TABLE IF NOT EXISTS "di.entitydata" ( '
			. 'id INTEGER PRIMARY KEY AUTOINCREMENT, '
			. 'entity_id INTEGER NOT NULL, '
			. 'attribute_id INTEGER NOT NULL, '
			. 'defaultValue TEXT NOT NULL); '

			. 'CREATE TABLE IF NOT EXISTS "di.attribute" ( '
			. 'id INTEGER PRIMARY KEY AUTOINCREMENT, '
			. 'name TEXT NOT NULL); '
			
			. 'CREATE TABLE IF NOT EXISTS "di.data" ( '
			. 'id INTEGER PRIMARY KEY AUTOINCREMENT, '
			. 'dataset_id INTEGER NOT NULL, '
			. 'attribute_id INTEGER NOT NULL, '
			. 'value TEXT NOT NULL, '
			. 'time INTEGER NOT NULL); '

			. 'CREATE TABLE IF NOT EXISTS "di.options" ( '
			. 'id TEXT PRIMARY KEY, '
			. 'value TEXT NOT NULL); ';
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