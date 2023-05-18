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
</head>
<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Data Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Data</a>
                    </div>
                    <?php
                        view_data("academic_qualifications_db");
                        view_data("awards_db");
                        view_data("books_db");
                        view_data("experience_db");
                        view_data("expertise_db");
                        view_data("papers_db");
                        view_data("personal_info_db");
                        view_data("plan_db");
                        view_data("speech_db");
                    ?>


                </div>
            </div>
    
        </div>
    </div>
</body>
</html>


<?php
    function view_data ($db) {
        include("conn.php");

        $sql = "SELECT * FROM $db";
        
        if ($result = mysqli_query($conn, $sql)) {
            if ($result->num_rows > 0) {
                $columns_name_array = [];
                $col_name = mysqli_fetch_fields($result);
                
                foreach($col_name as $val) {
                    array_push($columns_name_array, $val->name);
                }

                echo "<table class='table table-bordered table-striped'>";
                    echo "<thead>";
                        echo "<tr>";
                            foreach ($columns_name_array as $name) {
                                echo "<th>$name</th>";
                            }
                            echo "<th>Action</th>";
                        echo "<tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_array()) {
                        echo "<tr>";
                            foreach ($columns_name_array as $name) {
                                echo "<td>" . $row[$name] . "</td>";
                            }
                            echo "<td>";
                                echo "<a href='read.php?id=" . $row['id'] . "' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                        echo "</tr>";

                    }
                    echo "</tbody>";

                echo "</table>";
                $result->free();
            } else {
                echo "<p class='lead'><em> No records were found.</em></p>";

            }
        }

        mysqli_close($conn);


    }

?>



<?php
    mysqli_close($conn);
?>