
<?php
require_once('../../views/Calendario/bdd.php');
//echo $id = $_POST['id'].$title = $_POST['title'].$title = $_POST['delete'];;
	

		if ($_POST['delete']=="true" && isset($_POST['id'])){

	
	$id = $_POST['id'];
	$sql = "DELETE FROM agenda WHERE idcita = ?";

	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute(array($id));
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
		
}
else 
		if (isset($_POST['title'])&& isset($_POST['id'])){
	
				$id = $_POST['id'];
				$title = $_POST['title'];
	
	
	$sql = "UPDATE  agenda SET  descripcion = ? WHERE  idcita =?";

	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute(array($title,$id));
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	

}


	
?>
