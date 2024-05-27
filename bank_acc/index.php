<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table for DB info</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>List of Bank Service Users</h1>
    <br>
    <div class="container">
        <table id="align_table">
            <thead>
                <tr>
                    <th>Bild</th>
                    <th>Namn</th>
                    <th>Bankkonto</th>
                    <th>Saldo</th>
                </tr>
            </thead>
        <tbody>
    <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user_bank";
 
    $connect = mysqli_connect($servername, $username, $password, $dbname);
    if(!$connect){
        die("Connection failed" . mysqli_connect_error());
    }
    
    $sql = "SELECT Bild, Namn, Bankkonto, Saldo FROM user_info"; 
    $display = $connect->query($sql); 
    
    if (mysqli_num_rows($display) > 0){ 
        while($row = mysqli_fetch_assoc($display)){
            echo '<tr>';
            echo '<td><img src="' .$row["Bild"]. '" alt="image" height="200px" width="200px"/></td>'; 
            echo '<td>' . $row['Namn'] . '</td>'; 
            echo '<td>' . $row["Bankkonto"] . '</td>'; 
            echo '<td>' . $row["Saldo"] . ' kr' . '</td>';
            echo '</tr>';
        }
    } 
    else{ 
        echo "Error";
    }
    ?>
        </tbody>
    </table>
</div>
</body>
</html>