<?php
    // receive data from mobile app
    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json);

    // data for connection
	$servername = "localhost";
	$username = "id19649422_user";
	$password = "zWy?5@}?4L)LZNsI";
	$dbname = "id19649422_info";
	
	// create array for return result script
	$response = [];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn, "utf8");
	
	// Check connection
	if ($conn->connect_error) {
	    $response[] = ['msg' => "error ".$conn->connect_error];
	}
	else{
        // define sql for input data table
        $sql = "update usuarios set nome='".$data->nome."', serie=".$data->serie.", idProfessor=".$data->idProfessor;
    
    	// run query
    	$result = $conn->query($sql);
    	
    	// if ok		
    	if ($result) {
    	    $response[] = ['msg' => "Informações inseridas com sucesso"];
    	}			
    	 else {
    	      $response[] = ['msg' => "Erro ao tentar inserir na tabela!"];
    	}
	}	
	$conn->close();
	echo '{"informacoes":'.html_entity_decode(json_encode($response)).'}';
	

?>   