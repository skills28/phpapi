<?php

include("../conn/conn.php");
 $response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $names = mysqli_real_escape_string($conn, $_POST['country_name']);
      $ranks = mysqli_real_escape_string($conn , $_POST['country_rank']);

      $query = "INSERT INTO weapons(country_name , country_rank) VALUES('$names' , '$ranks')";


      if ($conn->query($query) === TRUE) {

        $response['success']=1;
        $response['message']="Record Insert Successfully...";

      }

    else {

      $response['success']=0;
      $response['message']="Error In Sql Query ...";
     }

}

else{

  $response['success']=0;
  $response['message']="method invaild check method";
}

echo json_encode($response);
$conn->close();
?>
