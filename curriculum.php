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
    <title>Document</title>
</head>
<body>
    <?php
        echo "<table class='table'>";
            echo "<thead>";
                echo "<tr>";
                echo "<td></td>";
                echo "<td>" . "星期一" . "</td>";
                echo "<td>" . "星期二" . "</td>";
                echo "<td>" . "星期三" . "</td>";
                echo "<td>" . "星期四" . "</td>";
                echo "<td>" . "星期五" . "</td>";
                echo "<td>" . "星期六" . "</td>";
                echo "<td>" . "星期日" . "</td>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
                echo "<tr>";
                    echo "<td>第一節<br>08:10~09:00</td>";
                    $time = "第一節 08:10~09:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
                echo "<tr>";
                    echo "<td>第二節<br>09:10~10:00</td>";
                    $time = "第二節 09:10~10:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
                echo "<tr>";
                    echo "<td>第三節<br>10:10~11:00</td>";
                    $time = "第三節 10:10~11:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
                echo "<tr>";
                    echo "<td>第四節<br>11:10~12:00</td>";
                    $time = "第四節 11:10~12:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
                echo "<tr>";
                    echo "<td>第五節<br>12:10~13:00</td>";
                    $time = "第五節 12:10~13:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
                echo "<tr>";
                    echo "<td>第六節<br>13:10~14:00</td>";
                    $time = "第六節 13:10~14:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
                echo "<tr>";
                    echo "<td>第七節<br>14:10~15:00</td>";
                    $time = "第七節 14:10~15:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
                echo "<tr>";
                    echo "<td>第八節<br>15:10~16:00</td>";
                    $time = "第八節 15:10~16:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
                echo "<tr>";
                    echo "<td>第九節<br>16:10~17:00</td>";
                    $time = "第九節 16:10~17:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
                echo "<tr>";
                    echo "<td>第十節<br>17:10~18:00</td>";
                    $time = "第十節 17:10~18:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
                echo "<tr>";
                    echo "<td>第十一節<br>18:10~19:00</td>";
                    $time = "第十一節 18:10~19:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
                echo "<tr>";
                    echo "<td>第十二節<br>19:10~20:00</td>";
                    $time = "第十二節 19:10~20:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
                echo "<tr>";
                    echo "<td>第十三節<br>20:10~21:00</td>";
                    $time = "第十三節 20:10~21:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
                echo "<tr>";
                    echo "<td>第十四節<br>21:10~22:00</td>";
                    $time = "第十四節 21:10~22:00";
                    findSql($time, "星期一");
                    findSql($time, "星期二");
                    findSql($time, "星期三");
                    findSql($time, "星期四");
                    findSql($time, "星期五");
                    findSql($time, "星期六");
                    findSql($time, "星期日");
                echo "</tr>";
            echo "</tbody>";
        echo "</table>";



        function findSql ($time, $weekday) {
            include("conn.php");

            $gsql = "SELECT * FROM curriculum_db WHERE time='$time' AND weekday='$weekday';";
                    $result = mysqli_query($conn, $gsql);
                    echo "<td>";
                    if (mysqli_num_rows($result) > 0) {
                        
                        while ($row = mysqli_fetch_array($result)) {
                            if ($row['name']) {
                                echo $row['name'] . "<br>";
                            }
                            if ($row['place']) {
                                echo $row['place'] . "<br>";
                            }
                            if ($row['class']) {
                                echo $row['class'] . "<br>";
                            }
                            if ($row['course']) {
                                echo $row['course'] . "<br>";
                            }
                        }
                        
                    }
                    echo "</td>";
                    mysqli_free_result($result);
        }
    ?>
    
</body>
</html>
<?php
    
    mysqli_close($conn);

?>