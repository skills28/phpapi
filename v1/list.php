<?php

include('../conn/conn.php');
$weapons = array();

$query = "SELECT * FROM weapons ORDER BY id DESC";

//$result = mysqli_query($conn, $sql);
$result = $conn->query($query);

if ($result->num_rows > 0) {

   while($row = $result->fetch_assoc()) {

      $data = array();

      $data["id"]=$row["id"];
      $data["country_name"]=$row["country_name"];
      $data["country_rank"]=$row["country_rank"];

      array_push($weapons , $data);

  }

 if($result){

    echo json_encode($weapons,JSON_PRETTY_PRINT);

 }

else{
    echo json_encode("Error in query try again" , JSON_PRETTY_PRINT);
}

}

else {
  echo json_encode("No Records Found" ,JSON_PRETTY_PRINT);
}

$conn->close();
?>
