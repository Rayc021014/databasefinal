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
    <title>Document</title>
</head>
<style>
    
</style>    
<body>
    <h1 class="bg-dark text-white">Home Page</h1>
    <div class="row">
        <div class="col-sm-3 ">
            
        </div>
        <div class="col-sm-6">
            <?php
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
    


    




</body>
</html>
<?php
    
    

?>

<?php
    include("footer.html");
    mysqli_close($conn);
?>

