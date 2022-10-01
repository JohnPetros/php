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
	    	$sql = "SELECT * FROM disciplina WHERE id = '$data->id'";
			$result = $conn->query($sql);
            $info=[];
            
            // existe?
			if ($result->num_rows > 0) {
			  // return result of query
			  $info = $result->fetch_assoc();//obtém registro	  
			  //obter o nome do professor
			//   $sql2 = "SELECT nome FROM escola WHERE idProfessor = ".$info["idProfessor"];
			//   $result2 = $conn->query($sql2);
			  if ($result2->num_rows > 0) {
			      $info2 = $result2->fetch_assoc();				
			    //   $nomeProfessor=$info2["nome"];      
			  }
			  else
			    //    $nomeEscola="?"; // dados não coerentes
			  
			    
			    
			 		
			  $response[] = ['id' => $info['id'],'nome' => $info['nome'], 'rg'=>$info['rg'],'username'=>$info['username'],'password'=>$info['password'],'nomeProfessor'=>$nomeProfessor];
			}
    		else{
			  $response[] = ['id' => 0,'nome' => ''];
			}
	}	
	$conn->close();
	echo '{"informacoes":'.html_entity_decode(json_encode($response)).'}';
	

?>   