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
    <!-- datatable CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<style>
    

</style>

<script>
    $(document).ready( function () {
        $('#speech_db').DataTable({
            "searching" : true,
            "paging": true,
            "ordering": true,
            "sPaginationType": "full_numbers",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "pageLength": "10",
            "serverSide": false,
            "stateSave": true,
            "destroy": true,
            "info": true,
            "autoWidth": false,
            "scrollCollapse": true,
            "scrollY": "200px",
            language: {
                "lengthMenu": "顯示 _MENU_ 筆資料",
                "sProcessing": "處理中...",
                "sZeroRecords": "没有匹配结果",
                "info": "顯示第 _START_ 至 _END_ 筆結果，共 _TOTAL_ 筆",
                "sInfoEmpty": "目前共有 0 筆紀錄",
                "sInfoFiltered": " ",
                "sInfoPostFix": "",
                "sSearch": "搜尋:",
                "sUrl": "",
                "sEmptyTable": "尚未有資料紀錄存在",
                "sLoadingRecords": "載入資料中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首頁",
                    "sPrevious": "上一頁",
                    "sNext": "下一頁",
                    "sLast": "末頁"
                },
                "order": [[0, "desc"]],
                "oAria": {
                    "sSortAscending": ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                }   
            }
        }); 
    });
    
    $(document).ready( function () {
        $('#plan_db').DataTable({
            "searching" : true,
            "paging": true,
            "ordering": true,
            "sPaginationType": "full_numbers",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "pageLength": "10",
            "processing": false,
            "serverSide": false,
            "stateSave": true,
            "destroy": true,
            "info": true,
            "autoWidth": false,
            "scrollCollapse": true,
            //"scrollX": "85%"
            language: {
                "lengthMenu": "顯示 _MENU_ 筆資料",
                "sProcessing": "處理中...",
                "sZeroRecords": "没有匹配结果",
                "info": "顯示第 _START_ 至 _END_ 筆結果，共 _TOTAL_ 筆",
                "sInfoEmpty": "目前共有 0 筆紀錄",
                "sInfoFiltered": " ",
                "sInfoPostFix": "",
                "sSearch": "搜尋:",
                "sUrl": "",
                "sEmptyTable": "尚未有資料紀錄存在",
                "sLoadingRecords": "載入資料中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首頁",
                    "sPrevious": "上一頁",
                    "sNext": "下一頁",
                    "sLast": "末頁"
                },
                "order": [[0, "desc"]],
                "oAria": {
                    "sSortAscending": ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                }   
            }
        }); 
    });
    $(document).ready( function () {
        $('#papers_db').DataTable({
            "searching" : true,
            "paging": true,
            "ordering": true,
            "sPaginationType": "full_numbers",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "pageLength": "10",
            "processing": false,
            "serverSide": false,
            "stateSave": true,
            "destroy": true,
            "info": true,
            "autoWidth": false,
            "scrollCollapse": true,
            //"scrollX": "85%"
            language: {
                "lengthMenu": "顯示 _MENU_ 筆資料",
                "sProcessing": "處理中...",
                "sZeroRecords": "没有匹配结果",
                "info": "顯示第 _START_ 至 _END_ 筆結果，共 _TOTAL_ 筆",
                "sInfoEmpty": "目前共有 0 筆紀錄",
                "sInfoFiltered": " ",
                "sInfoPostFix": "",
                "sSearch": "搜尋:",
                "sUrl": "",
                "sEmptyTable": "尚未有資料紀錄存在",
                "sLoadingRecords": "載入資料中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首頁",
                    "sPrevious": "上一頁",
                    "sNext": "下一頁",
                    "sLast": "末頁"
                },
                "order": [[0, "desc"]],
                "oAria": {
                    "sSortAscending": ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                }   
            }
        }); 
    });
    $(document).ready( function () {
        $('#books_db').DataTable({
            "searching" : true,
            "paging": true,
            "ordering": true,
            "sPaginationType": "full_numbers",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "pageLength": "10",
            "processing": false,
            "serverSide": false,
            "stateSave": true,
            "destroy": true,
            "info": true,
            "autoWidth": false,
            "scrollCollapse": true,
            //"scrollY": "200px",
            //"scrollX": "85%"
            language: {
                "lengthMenu": "顯示 _MENU_ 筆資料",
                "sProcessing": "處理中...",
                "sZeroRecords": "没有匹配结果",
                "info": "顯示第 _START_ 至 _END_ 筆結果，共 _TOTAL_ 筆",
                "sInfoEmpty": "目前共有 0 筆紀錄",
                "sInfoFiltered": " ",
                "sInfoPostFix": "",
                "sSearch": "搜尋:",
                "sUrl": "",
                "sEmptyTable": "尚未有資料紀錄存在",
                "sLoadingRecords": "載入資料中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首頁",
                    "sPrevious": "上一頁",
                    "sNext": "下一頁",
                    "sLast": "末頁"
                },
                "order": [[0, "desc"]],
                "oAria": {
                    "sSortAscending": ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                }   
            }
        }); 
    });
    $(document).ready( function () {
        $('#awards_db').DataTable({
            "searching" : true,
            "paging": true,
            "ordering": true,
            "sPaginationType": "full_numbers",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "pageLength": "10",
            "processing": false,
            "serverSide": false,
            "stateSave": true,
            "destroy": true,
            "info": true,
            "autoWidth": false,
            "scrollCollapse": true,
            //"scrollY": "200px",
            //"scrollX": "85%"
            language: {
                "lengthMenu": "顯示 _MENU_ 筆資料",
                "sProcessing": "處理中...",
                "sZeroRecords": "没有匹配结果",
                "info": "顯示第 _START_ 至 _END_ 筆結果，共 _TOTAL_ 筆",
                "sInfoEmpty": "目前共有 0 筆紀錄",
                "sInfoFiltered": " ",
                "sInfoPostFix": "",
                "sSearch": "搜尋:",
                "sUrl": "",
                "sEmptyTable": "尚未有資料紀錄存在",
                "sLoadingRecords": "載入資料中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首頁",
                    "sPrevious": "上一頁",
                    "sNext": "下一頁",
                    "sLast": "末頁"
                },
                "order": [[0, "desc"]],
                "oAria": {
                    "sSortAscending": ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                }   
            }
        }); 
    });
</script> 
<body>
    <div class="container-fluid">
    <?php     
    select_data("speech_db");
            
    select_data("plan_db");
            
    select_data("papers_db");
           
    select_data("books_db");
            
    select_data("awards_db");

    function select_data ($db) {
        include("conn.php");
        try {
            
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

            $sql = "SELECT * FROM {$db} ";

            
            $result = mysqli_query($conn, $sql);

            if ($result->num_rows > 0) {
                echo '<div class="container-sm db_name" >' ;
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
                echo '<div class="container border border-2">';
                echo '<table class="display table table-striped table-hover border-primary" 
                        id="' . $db . '" style="">';
                
                //print column name
                echo '<thead class="table-primary" >' . '<tr>';
                
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
                echo '</div>';

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
    </div>
</body>
</html>

