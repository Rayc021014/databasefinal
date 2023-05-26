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
    <div class="wrapper" style="width: 100%;">
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
                            if ($db != "personal_info_db") {
                                echo "<td>";
                                    echo 
                                    "<a href='update.php?id=". $row['id'] . '&db='. $db . "' title='Update Record' data-toggle='tooltip'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                        </svg>
                                    </a>";
                                    
                                    echo 
                                    "<a href='delete.php?id=". $row['id'] . '&db='. $db ."' title='Delete Record' data-toggle='tooltip'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                                        </svg>
                                    </a>";
                                echo "</td>";
                            } else { //personal dont have id
                                echo "<td>";
                                    echo 
                                    "<a href='update.php?id=". $row['name'] . '&db=' . $db . "' title='Update Record' data-toggle='tooltip'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                        </svg>
                                    </a>";
                                    
                                    echo 
                                    "<a href='delete.php?id=". $row['name'] . '&db=' . $db ."' title='Delete Record' data-toggle='tooltip'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                                        </svg>
                                    </a>";
                                echo "</td>";
                            }
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