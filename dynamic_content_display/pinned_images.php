<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinned Images</title>
    <style>
        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .image-container img {
            margin: 10px;
            max-width: 300px;
            max-height: 200px;
            object-fit: cover;
        }

       
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

     
        .btn:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    
    <a href="index.html" class="btn">Go back to Homepage</a>
  
    <center><h1>Pinned Images</h1></center>
    

    <div class="image-container">
        <?php
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "image_pin"; 

      
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM image_pin";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<img src="' . $row["url"] . '" alt="Pinned Image">';
            }
        } else {
            echo "No pinned images found.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
