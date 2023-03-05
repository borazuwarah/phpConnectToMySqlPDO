<?php

require 'config.php';

$Connection = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
	$pdo = new PDO($Connection, $user, $password);

	if ($pdo) {
		echo "Connected to the $db database successfully!";
        $sql = "SELECT * FROM tbl_personal"; 
$query = $pdo -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 

if($query -> rowCount() > 0)   { 
foreach($results as $result) { 
echo "<tr>
<td>".$result -> nombres."</td>
<td>".$result -> apellidos."</td>
<td>".$result -> profesion."</td>
<td>".$result -> estado."</td>
<td>".$result -> fregis."</td>
</tr>";

   }
 }
	}
} catch (PDOException $e) {
	echo $e->getMessage();
}



?>