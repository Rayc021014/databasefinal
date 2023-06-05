<?php
    include("conn.php");
    include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insert.php" method="post">
        <div class="form-group">
            <label for="db_name"></label>
            <select>
                <option>plans</option>
                <option>papers</option>
                <option>awards</option>
                <option>speech</option>
                <option></option>
            </select>
            <input type="submit" value="insert">


        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <nav class="navbar">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="#">academic_qualification</a></li>
                            <br>
                            <li class="nav-item"><a href="#">awards</a></li>
                        </ul>
                    </div>
    </nav> 
</body>
</html>


<?php





/*  read excel file to insert to table
$row = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (($handle = fopen("database.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            echo "<p> $num fields in line $row: <br /></p>\n";
            $row++;
            for ($c=0; $c < $num; $c++) {
                echo $data[$c] . "<br />\n";
            }
            
            //insert data with csv
            $sql = "INSERT INTO papers_db
            VALUES('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]');";

            mysqli_query($conn, $sql);



        }
        fclose($handle);
    }
}*/



?>


<?php
    mysqli_close($conn);
?>