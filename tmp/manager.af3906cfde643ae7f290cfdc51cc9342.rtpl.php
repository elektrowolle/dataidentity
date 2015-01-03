<?php if(!class_exists('raintpl')){exit;}?><!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<?php $tpl = new RainTPL;$tpl->assign( $this->var );$tpl->draw( "basicHeaders" );?>

	</head>

<body>
<h1>Manager</h1>
<h2>Entitie Models</h2>
<h3>Model name: id</h3>
change name
<h4>Attributes</h4>
<table>
	<thead>
		<th>name</th>
		<th>default Value</th>
		<th>save changes</th>
	</thead>
	<tbody>
		<?php $counter1=-1; if( isset($entities) && is_array($entities) && sizeof($entities) ) foreach( $entities as $key1 => $value1 ){ $counter1++; ?>

		<tr>
			<td><?php echo $value1->name;?></td>
		</tr>
		<?php } ?>

	</tbody>
</table>
<h2>Datasets</h2>
<h3>Entity Name: id</h3>
change name
<h4>Data</h4>
<table>
<thead>
	<th>name</th>
	<th>value</th>
	<th>last update</th>
	<th>save changes</th>
</thead>
</table>
<h2>Attributes</h2>
<h3>Attribute name</h3>
</body>
</html>