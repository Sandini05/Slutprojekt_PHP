<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User data</title>
    <link rel="stylesheet" href="../css/userdata.css">
</head>

<body>
    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="input_box">
            <div class="center">

                <h1>User data Upload</h1>
                
                <label for="namn">Namn</label>
                <input type="text" name="name"><br>

                <label for="bankkonto">Bankkonto Nr</label>
                <input type="text" name="bank"><br>

                <label for="saldo">Saldo</label>
                <input type="text" name="saldo"><br>

                <input type="file" name="imgup"><br>

                <input type="submit" name="sub" value="Spara">
            </div>
        </div>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_bank";

    $connect = mysqli_connect($servername, $username, $password, $dbname);
    if(!$connect){
        die("Connection failed" . mysqli_connect_error());
    }

    /*$sql = "CREATE DATABASE user_bank";
    if(mysqli_query($connect,$sql)){
        echo "Database has been created successfully";
    }
    else{
        echo "Error in creating database " . mysqli_error($connect);
    }*/

    /*$sql = 
    "CREATE TABLE user_info (
    Bild VARCHAR(200) NOT NULL,
    Namn VARCHAR(30) NOT NULL,
    Bankkonto INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Saldo INT(50) )";

    if (mysqli_query($connect, $sql)){
        echo "Table created successfully";
    }
    else{
        echo "Error creating table" . mysqli_error($connect);
    }*/

    if(isset($_POST['sub'])){
        $target_dir = "../bild/"; 
        $target_file = $target_dir . basename($_FILES['imgup']['name']); 
        $uploadOk = 1; 

        if($uploadOk == 0){ 
            echo "Error";
        }

        else{ 
            if(move_uploaded_file($_FILES['imgup']['tmp_name'], $target_file)){
                echo "<div class= 'img_up'>";
                echo "<img src= '". $target_file . "'>";
                echo "</div>";

                $img_file = "bild/".$_FILES['imgup']['name'];
                $name = $_REQUEST['name'];
                $bank = $_REQUEST['bank'];
                $saldo = $_REQUEST['saldo'];
                $sql = "INSERT INTO user_info VALUES ('$img_file', '$name', '$bank', '$saldo')";

                if(mysqli_query($connect, $sql)){
                    echo '<div class= "echo_align">';
                    echo "Data saved successfully";
                    echo '</div>';
                }
                else{
                    echo "Error" . mysqli_error($connect);
                }
            }
        }
    }
    ?>
</body>
</html>