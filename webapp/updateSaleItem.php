<?php require_once "connection.php"; ?>

<?php 

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    $saleId = $_POST['saleId'];
    switch($action) {
        case 'update' : 
        	echo $_POST['saleId'];break;
        case 'delete' :
		// sql to delete a record
		$sql = "DELETE FROM sales WHERE s_id=$saleId";

		if ($conn->query($sql) === TRUE) {
		    echo "Record deleted successfully";
		} else {
		    echo "Error deleting record: " . $conn->error;
		}

		break;
        // ...etc...
    }
}
?>
