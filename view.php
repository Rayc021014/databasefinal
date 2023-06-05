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
    <!-- datatable CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    
    
</head>
<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
<style>
    .li-item {
        list-style: none;
    }
    .li-link {
        text-align: center;
        background-color: white;
        border-radius: 200px;
        border: 3px solid gray;
        color: black;
        width: 10rem;
    }
    .li-link:hover {
        color: blueviolet;
    }
    .side_nav {
        position: fixed;
        font-size: 18px;
        background-color: white;
        padding-top: 2rem;
    }
    .db_name {
    font-size: 22px;
    color: blue;
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <div class="side_nav">
                    <ul class="">
                        <li class="li-item" style="list-style: none;"><a href="#academic_qualifications_db" class="li-link nav-link">學歷</a></li>
                        <br>
                        <li class="li-item"><a href="#awards_db" class="li-link nav-link">獲獎紀錄</a></li>
                        <br>
                        <li class="li-item"><a href="#books_db" class="li-link nav-link">專書/教材</a></li>
                        <br>
                        <li class="li-item"><a href="#experience_db" class="li-link nav-link">經歷</a></li>
                        <br>
                        <li class="li-item"><a href="#expertise_db" class="li-link nav-link">專長</a></li>
                        <br>
                        <li class="li-item"><a href="#papers_db" class="li-link nav-link">論文</a></li>
                        <br>
                        <li class="li-item"><a href="#personal_info_db" class="li-link nav-link">個人基本資料</a></li>
                        <br>
                        <li class="li-item"><a href="#plan_db" class="li-link nav-link">計畫</a></li>
                        <br>
                        <li class="li-item"><a href="#speech_db" class="li-link nav-link">演講</a></li>
                        <br>
                        <li class="li-item"><a href="#curriculum_db" class="li-link nav-link">課表</a></li>
                        <br>
                        <li class="li-item"><a href="#messages_db" class="li-link nav-link">留言</a></li>
                    </ul>
                </div>
            </div>
        
            <div class="col-sm-10">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-header clearfix">
                                <h1 class="pull-left">資料</h1>
                                <a href="create.php" class="btn btn-success pull-right">新增資料</a>
                                
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
                                view_data("curriculum_db");
                                view_data("messages_db");
                            ?>

                        </div>
                    </div>
            
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
                echo '<div class=" db_name ' . $db . '"id="' . $db . '">';
                switch($db) {
                    case "academic_qualifications_db":
                        echo "學歷";
                        break;
                    case "awards_db":
                        echo "獲獎紀錄";
                        break;
                    case "books_db":
                        echo "專書/教材";
                        break;
                    case "experience_db":
                        echo "經歷";
                        break;
                    case "expertise_db":
                        echo "專長";
                        break;
                    case "papers_db":
                        echo "論文";
                        break;
                    case "personal_info_db":
                        echo "個人基本資料";
                        break;
                    case "plan_db":
                        echo "計畫";
                        break;
                    case "speech_db":
                        echo "演講";
                        break;
                    case "curriculum_db":
                        echo "課表";
                        break;
                    case "messages_db":
                        echo "留言";
                        break;
                }
                echo "</div>";
                echo "<div class='container-fluid'>";
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
                            if ($db != "personal_info_db" AND $db != "messages_db") {
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
                            } else if ($db == "personal_info_db") { //personal dont have id
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
                            } else if($db == "messages_db") {
                                echo "<td>";
                                    echo 
                                    "<a href='delete.php?id=". $row['id'] . '&db=' . $db ."' title='Delete Record' data-toggle='tooltip'>
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
                echo "</div>";
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