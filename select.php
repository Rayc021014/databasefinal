<?php
    include("header.html");
    include("conn.php");
    echo '<style>';
    include("style.css");
    echo '</style>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<style>
    

</style>
<body>
    <div class="container-fluid">
        <form action="select.php" method="post">
            
                <label for="key"></label>
                <input type="text" name="key" placeholder="Search" class="search-bar">
            
                <label for="db"></label>
                <select name="db" class="select_db">
                    <option value="all">ALL</option>
                    <option value="speech">演講</option>
                    <option value="plan">計畫</option>
                    <option value="papers">論文</option>
                    <option value="books">專書</option>
                    <option value="awards">獎項</option>
                    
                </select>
            
            <br>
            <input type="submit" value="Submit" class="btn btn-primary">

        </form>
    </div>
</body>
</html>
<?php   

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $db = $_POST["db"] . "_db";
        
        //select data from all table
        if ($db == "all_db") {
            select_data("speech_db");
            
            select_data("plan_db");
            
            select_data("papers_db");
           
            select_data("books_db");
            
            select_data("awards_db");

        } else { //select data from specific table
            select_data($db);
        }
    }



    
    function select_data ($db) {
        include("conn.php");

        try {
            $key = $_POST["key"];
            //$db = $_POST["db"] . "_db";


            //loop every column in table
            //find
            
            $column_sql = "SELECT * FROM $db;";
            $column_result = mysqli_query($conn, $column_sql);
            $columns_count = mysqli_num_fields($column_result);

            //get columns name
            $columns_name_array = [];
            $columns_name = mysqli_fetch_fields($column_result);
            foreach ($columns_name as $val) {
                array_push($columns_name_array, $val->name);
            }
            
            mysqli_free_result($column_result);

            
            

            //decide how many column and add how many
            //basic command
            $sql = "SELECT * FROM {$db} ";
            
            //merge to the right sql command
            for ($i = 0; $i < $columns_count; $i++) {
                if ($i == 0) {
                    $sql = $sql . "WHERE ";
                }
                $sql = $sql . "$columns_name_array[$i] LIKE '%$key%' ";
                if ($i < $columns_count - 1) {
                    $sql = $sql . "or ";
                }

            }
            $sql = $sql . ";";
            //echo $sql . "<br>";


            

            //
            
            $result = mysqli_query($conn, $sql);

            if ($result->num_rows > 0) {
                echo '<div class="container-lg db_name">';
                switch($db) {
                    case "speech_db":
                        echo "演講";
                        break;
                    case "plan_db":
                        echo "計畫";
                        break;
                    case "papers_db":
                        echo "論文";
                        break;
                    case "books_db":
                        echo "專書/教科書";
                        break;
                    case "awards_db":
                        echo "獲獎紀錄";
                        break;
                }
                echo '</div>';
                echo '<table class="table table-striped table-hover container-lg">';
                
                //print column name
                echo '<thead class="table-primary">' . '<tr>';
                
                foreach($columns_name_array as $name) {
                    echo "<th>" . $name . "</th>";
                }
                echo  '</tr>' . '</thead>';
                
                //print the select value
                echo '<tbody>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    
                    foreach($row as $val) {
                        echo '<td>' . $val . '</td>';
                        
                    }
                    
                    echo '</tr>';
                }
                echo '</tbody>';

                echo '</table>';

                //if have data echo a div 
                echo '<div class="select_data_space"></div>';
            }
            
            mysqli_free_result($result);
            
        }
        catch(Exception $e) {
            echo $e;
        }
    }
    
    mysqli_close($conn);
?>
