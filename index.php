<?php
    include("conn.php");
    include("header.html");
    echo '<style>';
    include "style.css";
    echo '</style>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="main.js" type="text/javascript"></script>
    <title>Personal Page</title>
</head>
<style>
    
</style>    
<body>
    
    <div class="row">
        <div class="col-sm-3">
            
        </div>
        <div class="col-sm-6">
            
            <?php
                echo '<p class="section-title">個人資料</p><br>';
                $sql = "SELECT * FROM personal_info_db";

                $result = mysqli_query($conn, $sql);

                $column_name = mysqli_fetch_fields($result);
                $columns_name_array = [];
                


                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);

                    
                    foreach ($column_name as $val) {
                        array_push($columns_name_array, $val->name);
                        
                        echo '<div class="row personal_info">' . $row[$val->name] . '</div>';
                    }
                    mysqli_free_result($result);
                }
            ?>
            


        </div>
        <div class="col-sm-3">
            <img src="images/pic.jpg" class="rounded img-fluid p_pic " alt="personal pic">

        </div>
    </div>
    <div class="row">
        <div class="col-3">
            
        </div>
        <div class="col-3">
            <?php
                
                echo '<p class="section-title">學歷</p><br>';
                show_all("academic_qualifications_db");

            ?>

        </div>
        <div class="col-3">
            <?php
                echo '<p class="section-title">經歷</p><br>';
                show_all("experience_db");
            ?>
        </div>
        <div class="col-3">
            <?php
                echo '<p class="section-title">專長</p><br>';
                show_all("expertise_db");
            ?>
        </div>
    </div>
    


    




</body>
</html>
<?php
    

    function show_all ($db) {
        include("conn.php");
        $sql = "SELECT * FROM $db";
        $result = mysqli_query($conn, $sql);
                
        if (mysqli_num_rows($result) > 0) {
            

            echo '<div class="container">';
            while ($row = mysqli_fetch_assoc($result)) {
                $i = 0;
                foreach ($row as $val) {
                    if ($i == 0) { //pass id
                        $i++;
                        continue;
                    }
                    echo $val . " ";
                }
                echo "<br>";
            }
    
            echo "</div>";

            mysqli_free_result($result);
        }

        mysqli_close($conn);
    }
    

?>

<?php
    include("footer.html");
    mysqli_close($conn);
?>

