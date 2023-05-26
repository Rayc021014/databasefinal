<?php
    include("conn.php");

?>
<?php
    $id = $_GET["id"];
    $db = $_GET["db"];
    echo $db;
    echo $id;
?>

<?php
    mysqli_close($conn);

?>