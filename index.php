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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <title>個人首頁</title>
</head>
<style>
    /* 模態對話框樣式 */
    .modal-content {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f2f2f2;
  }

  .modal-content h2 {
    margin-top: 0;
  }

  .modal-content label {
    display: block;
    margin-bottom: 10px;
  }

  .modal-content input,
  .modal-content textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;
  }

  .modal-content button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .modal-content button:hover {
    background-color: #45a049;
  }

  .modal-content .close {
    float: right;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
  }

</style>    
<script>
    // 顯示模態對話框
    function openModal() {
    var modal = document.getElementById('modal');
    modal.style.display = 'block';
    }

    // 關閉模態對話框
    function closeModal() {
    var modal = document.getElementById('modal');
    modal.style.display = 'none';
    }

    // 提交留言
    function submitMessage() {
    var messageInput = document.getElementById('message-input');
    var message = messageInput.value;
    
    var messageList = document.getElementById('message-list');
    var newMessage = document.createElement('p');
    newMessage.textContent = message;
    messageList.appendChild(newMessage);
    
    messageInput.value = '';
    }

    
    
    
</script>
<body>
    <div class="row" style="padding-top: 50px;">
        <div class="col-sm-3">        
                  
        </div>
        <div class="col-sm-3 " >
            <img src="https://www.iecs.fcu.edu.tw/media/img/teacher/avatar/899631.jpg" class="rounded img-fluid p_pic " alt="personal pic" style="width: 325px;">
        </div>
        <div class="col-sm-3">           
            <?php
                echo '<p class="section-title">個人資料</p><br>';
                $sql = "SELECT * FROM personal_info_db";
                $result = mysqli_query($conn, $sql);        
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    echo '<div class="personal_info bg-light">';
                    echo "姓名: " . "<span style='padding-left: 60px;'>" . $row[0] . "</span><br>";
                    echo "Email: " . "<span style='padding-left: 60px;'>" . $row[1] . "</span><br>";
                    echo "分機: " . "<span style='padding-left: 60px;'>" . $row[2] . "</span><br>";
                    echo "職位: " . "<span style='padding-left: 60px;'>" . $row[3] . "</span><br>";
                    echo '</div>';   
                    mysqli_free_result($result);
                }
            ?>
        </div>    
    </div>
    <div class="row">
        <div class="col-3">
            <!-- 模態觸發按鈕 -->
            <button onclick="openModal()" class="btn btn-primary btn-lg" style="margin-left: 3rem">留言</button>

            <!-- 模態對話框 -->
            <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>留言</h2>
                <form id="message-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <label for="name-input">名字:</label>
                    <input type="text" id="name-input" name="name" placeholder="輸入您的名字" required>

                    <label for="time-input">現在時間:</label>
                    <input type="datetime-local" id="time-input" name="time" value="<?php echo date('Y-m-d H:i:s'); ?>" required>

                    <label for="message-input">留言:</label>
                    <textarea id="message-input" name="message" placeholder="輸入留言" required></textarea>

                    <button type="submit">提交</button>
                </form>
                <div id="message-list"></div>
            </div>
            </div>  
        </div>
        <div class="col-3 ">
            <?php
                
                echo '<p class="section-title">學歷</p><br>';
                echo '<div style="font-size: 22px;">';
                show_all("academic_qualifications_db");
                echo '</div>';
            ?>

        </div>
        <div class="col-3 ">
            <?php
                echo '<p class="section-title">經歷</p><br>';
                echo '<div style="font-size: 22px;">';
                show_all("experience_db");
                echo '</div>';
            ?>
        </div>
        <div class="col-3 ">
            <?php
                echo '<p class="section-title">專長</p><br>';
                echo '<div style="font-size: 22px;">';
                show_all("expertise_db");
                echo '</div>'
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
            

            echo '<div class="container bg-light">';
            while ($row = mysqli_fetch_assoc($result)) {
                $i = 0;
                foreach ($row as $val) {
                    if ($i == 0) { //pass id
                        $i++;
                        continue;
                    }
                    echo "<span style='padding-right: 2rem;'>" . $val . "</span>";
                }
                echo "<br>";
            }
    
            echo "</div>";

            mysqli_free_result($result);
        }

        mysqli_close($conn);
    }
    

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $name = $_POST["name"];
        $time = $_POST["time"];
        $message = $_POST["message"];
        
        $sql = "INSERT INTO messages_db VALUES(id, '$name', '$time', '$message')";
        mysqli_query($conn, $sql);

        header("Location: index.php");
    }

?>

<?php
    //include("footer.html");
    mysqli_close($conn);
?>

