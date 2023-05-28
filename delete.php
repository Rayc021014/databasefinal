<?php
    include("conn.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="wrapper" style="width: 500px; margin: 0 auto;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Data</h1>
                    </div>
                    <?php
                    if (isset($_GET["id"]) && isset($_GET["db"])) { 
                        $id = $_GET["id"];
                        $db = $_GET["db"];
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            
                            $db = $_POST["db"];
                            $id = $_POST["id"];

                            $sql = "DELETE FROM $db WHERE id = $id";

                            try {
                                $result = mysqli_query($conn, $sql);
                                $sqla = "ALTER TABLE $db AUTO_INCREMENT = 1";
                                $resulta = mysqli_query($conn, $sqla);
                                header("Location: view.php");
                                
                            }
                            catch (Exception $e) {
                                echo $e->getMessage();
                            }
                            
                            mysqli_free_result($result);
                            mysqli_free_result($resulta);

                        }
                        echo 
                        '
                            <form method="post">
                                <div>
                                    <input action="?id=' . $id .'&db=' . $db . '" type="hidden" name="id">
                                    <p>Are you sure to delete this data</p>
                                    <input type="hidden" name="db" value="' . $db . '">
                                    <input type="hidden" name="id" value="' . $id . '">
                                    <p>
                                        <input type="submit" value="Yes" class="btn btn-danger">
                                        <a href="view.php" class="btn btn-success">No</a>
                                    </p>
                                </div>
                            </form>
                        ';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    mysqli_close($conn);

?>