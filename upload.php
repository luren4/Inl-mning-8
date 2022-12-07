<?php
session_start();
if(isset($_SESSION["username"]))
{


  if(isset($_POST["submit"])) 
  {


    $sql = "SELECT * FROM guestbook";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inlämning 8";
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $result = $conn->query($sql);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $stmt = $conn->prepare("INSERT INTO Guestbook (name, email, homepage, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $homepage, $comment);

    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $homepage = $_POST["homepage"];
    $comment = $_POST["comment"];
    // $sql = "INSERT INTO Guestbook (name, email, homepage, comment, time) VALUES ('$name', '$email', '$homepage', '$comment', now())";
    // $conn->query($sql);
    $stmt->execute();


    echo "New records created successfully";

    $sql = "SELECT * FROM Guestbook order by id desc";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="resultDiv">
            <br>
            <br>
            Time: ' . $row["time"] .
                "<br>From: " . $row["name"] .
                "<br>Email: " . $row["email"] .
                "<br>Homepage: " . $row["homepage"] .
                "<br>Comment: " . $row["comment"] .
                "</div>";
        }
    } else {
        echo "0 results";
    }

    $stmt->close();
    $conn->close();



    session_destroy();



  }

}
else {
  echo "You are not logged in!";
}

?>
