<?php 
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['mobile'];
        $address = $_POST['city'];
        $status = $_POST['status'];

        $host = 'localhost:3307';
        $user = 'root';
        $pass = '';
        $dbname = 'mytutor';

        $conn = mysqli_connect($host, $user, $pass, $dbname);

        $sql = "INSERT INTO newstudent (Name, Email, Phone, Address, Status) VALUES ('$name', '$email', '$phone', '$address', '$status')";
        mysqli_query($conn, $sql);

        echo "<style>
        .form-container {display: none;}
        .button-container {display: inline-block !important;}
        </style>";

        $studentData = "SELECT ID, Name, Email, Address, Status FROM newstudent";
        $result = $conn->query($studentData);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["ID"]."&nbsp; &nbsp; &nbsp;". $row["Name"]. "&nbsp; &nbsp; &nbsp;".$row["Email"]."&nbsp; &nbsp; &nbsp;".$row["Address"]."&nbsp; &nbsp; &nbsp;".$row["Status"]. "<br>";
        }
        } else {
        echo "0 results";
        }

    }


    include "test.html";

?>