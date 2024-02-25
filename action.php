<?php
   

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $FullName = $_POST['fullname'];
        $EmaillAddress = $_POST['email'];
        $Mobile = $_POST['mobile'];
        $EmailSubject = $_POST['emailSub'];
        $Massaage = $_POST['Massaage'];
       
       
    
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'portfolio');
    
        // Check the connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
    
        // Use prepared statement to prevent SQL injection
        $sql = "INSERT INTO table1 (fullname, email, mobile, emailSub, Massaage) 
                VALUES (?, ?, ?, ?, ?)";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $FullName, $EmaillAddress, $Mobile, $EmailSubject, $Massaage);
    
        if ($stmt->execute()) {
            echo "<script>alert('Message Sent Successfully!')</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
        $conn->close();
    }
    ?>
    




