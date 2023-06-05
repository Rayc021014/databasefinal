<?php
    include("conn.php");
?>
<?php
    
    
//root raycrayc


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Update Data</title>
</head>
<body>
    <div class="wrapper" style="width: 500px; margin: 0 auto;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Data</h2>
                    </div>
                    <p>Edit data</p>

                    <?php
                        if(isset($_GET["id"]) && isset($_GET["db"])) {
                            $db = $_GET["db"];
                            $id = $_GET["id"];

                            switch($db) {
                                case "academic_qualifications_db":
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $db = $_POST["db"];
                                        $id = $_POST["id"];
                                        $school = $_POST["school"];
                                        $major = $_POST["major"];
                                        $degree = $_POST["degree"];
                                        
                                        $sql = "UPDATE $db SET school='$school', major='$major', degree='$degree' WHERE id=$id";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        
                                        header('Location: view.php');
                                    }
                                    $sql = "SELECT * FROM $db WHERE id = $id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_row($result);
                                    mysqli_free_result($result);

                                    echo 
                                    '
                                    <form id="academic_qualifications" action="?id=' . $id .'&db=' . $db . '" method="post">
                                        <div class="form-outline">
                                            <label for="school" class="form-label">Enter School: </label>
                                            <input type="text" id="school" name="school" class="form-control" ' . "value='$row[1]' required>  
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="major" class="form-label">Enter major: </label>
                                            <input type="text" id="major" name="major" class="form-control" ' . "value='$row[2]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="degree" class="form-label">Enter degree: </label>
                                            <input type="text" id="degree" name="degree" class="form-control" '. "value='$row[3]' required>
                                        </div>" . '
                                        <input type="hidden" name="db" value="' . $db . '">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="submit" class="btn btn-primary">
                                        <a href="view.php" class="btn btn-danger">Cancel</a>
                                    </form>
                                    ';
                                    break;
                                case "awards_db":
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $db = $_POST["db"];
                                        $id = $_POST["id"];
                                        $classification = $_POST["classification"];
                                        $school_year = $_POST["school_year"];
                                        $award = $_POST["award"];
                                        $awarding_unit = $_POST["awarding_unit"];
                                        $date = $_POST["date"];
                                        $topic = $_POST["topic"];

                                        
                                        $sql = "UPDATE $db SET classification='$classification', school_year='$school_year', award='$award', awarding_unit='$awarding_unit', date='$date', topic='$topic' WHERE id=$id";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        
                                        header('Location: view.php');
                                    }
                                    $sql = "SELECT * FROM $db WHERE id = $id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_row($result);
                                    mysqli_free_result($result);
                                    echo 
                                    '
                                    <form id="awards" action="?id=' . $id .'&db=' . $db . '" method="post">
                                        <div class="form-outline">
                                            <label for="classification" class="form-label">Enter classification: </label>
                                            <input type="text" id="classification" name="classification" class="form-control" '. "value='$row[1]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="school_year" class="form-label">Enter school_year: </label>
                                            <input type="number" id="school_year" name="school_year" class="form-control" '. "value='$row[2]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="award" class="form-label">Enter award: </label>
                                            <input type="text" id="award" name="award" class="form-control" '. "value='$row[3]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="awarding_unit" class="form-label">Enter awarding_unit: </label>
                                            <input type="text" id="awarding_unit" name="awarding_unit" class="form-control" '. "value='$row[4]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="date" class="form-label">Enter date: </label>
                                            <input type="date" id="date" name="date" class="form-control" '. "value='$row[5]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="topic" class="form-label">Enter topic: </label>
                                            <input type="text" id="topic" name="topic" class="form-control" '. "value='$row[6]'>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="students" class="form-label">Enter students: </label>
                                            <input type="text" id="students" name="students" class="form-control" '. "value='$row[7]'>
                                        </div>" . '
                                        <input type="hidden" name="db" value="' . $db . '">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="submit" class="btn btn-primary">
                                        <a href="view.php" class="btn btn-danger">Cancel</a>
                                    </form>
                                    ';
                                    break;
                                case "books_db":
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $db = $_POST["db"];
                                        $id = $_POST["id"];
                                        $classification = $_POST["classification"];
                                        $author = $_POST["author"];
                                        $book_name = $_POST["book_name"];
                                        $publication = $_POST["publication"];
                                        $country = $_POST["country"];
                                        $date = $_POST["date"];
                                        $pages = $_POST["pages"];

                                        
                                        $sql = "UPDATE $db SET classification='$classification', author='$author', book_name='$book_name', publication='$publication', country='$country', date='$date', pages='$pages' WHERE id=$id";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        
                                        header('Location: view.php');
                                    }
                                    $sql = "SELECT * FROM $db WHERE id = $id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_row($result);
                                    mysqli_free_result($result);
                                    echo 
                                    '
                                    <form id="books" action="?id=' . $id .'&db=' . $db . '" method="post">
                                        <div class="form-outline">
                                            <label for="classification" class="form-label">Enter classification: </label>
                                            <input type="text" id="classification" name="classification" class="form-control" '. "value='$row[1]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="author" class="form-label">Enter author: </label>
                                            <input type="text" id="author" name="author" class="form-control" '. "value='$row[2]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="book_name" class="form-label">Enter book name: </label>
                                            <input type="text" id="book_name" name="book_name" class="form-control" '. "value='$row[3]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="publication" class="form-label">Enter publication: </label>
                                            <input type="text" id="publication" name="publication" class="form-control" '. "value='$row[4]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="country" class="form-label">Enter country: </label>
                                            <input type="text" id="country" name="country" class="form-control" '. "value='$row[5]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="date" class="form-label">Enter date: </label> 
                                            <input type="date" id="date" name="date" class="form-control" '. "value='$row[6]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="pages" class="form-label">Enter pages</label>
                                            <input type="number" id="pages" name="pages" class="form-control" '. "value='$row[7]' required>
                                        </div>" . '
                                        <input type="hidden" name="db" value="' . $db . '">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="submit" class="btn btn-primary">
                                        <a href="view.php" class="btn btn-danger">Cancel</a>
                                    </form>
                                    ';
                                    break;
                                case "experience_db":
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $db = $_POST["db"];
                                        $id = $_POST["id"];
                                        $working_unit = $_POST["working_unit"];
                                        $position = $_POST["position"];

                                        
                                        $sql = "UPDATE $db SET working_unit='$working_unit', position='$position' WHERE id=$id";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        header('Location: view.php');
                                    }
                                    $sql = "SELECT * FROM $db WHERE id = $id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_row($result);
                                    mysqli_free_result($result);
                                    echo 
                                    '
                                    <form id="experience" action="?id=' . $id .'&db=' . $db . '" method="post">
                                        <div class="form-outline">
                                            <label for="working_unit" class="form-label">Enter working unit</label>
                                            <input type="text" id="working_unit" name="working_unit" class="form-control" '. "value='$row[1]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="position" class="form-label">Enter position</label>
                                            <input type="text" id="position" name="position" class="form-control" '. "value='$row[2]' required>
                                        </div>" . '
                                        <input type="hidden" name="db" value="' . $db . '">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="submit" class="btn btn-primary">
                                        <a href="view.php" class="btn btn-danger">Cancel</a>
                                    </form>
                                    ';
                                    break;
                                case "expertise_db":
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $db = $_POST["db"];
                                        $id = $_POST["id"];
                                        $ch_name = $_POST["ch_name"];
                                        $en_name = $_POST["en_name"];
                                        
                                        $sql = "UPDATE $db SET ch_name='$ch_name', en_name='$en_name' WHERE id=$id";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        header('Location: view.php');
                                    }
                                    $sql = "SELECT * FROM $db WHERE id = $id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_row($result);
                                    mysqli_free_result($result);
                                    echo 
                                    '
                                    <form id="expertise" action="?id=' . $id .'&db=' . $db . '" method="post">
                                        <div class="form-outline">
                                            <label for="ch_name" class="form-label">Enter Chinese name</label>
                                            <input type="text" id="ch_name" name="ch_name" class="form-control" '. "value='$row[1]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="en_name" class="form-label">Enter English name</label>
                                            <input type="text" id="en_name" name="en_name" class="form-control" '. "value='$row[2]' required>
                                        </div>" . '
                                        <input type="hidden" name="db" value="' . $db . '">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="submit" class="btn btn-primary">
                                        <a href="view.php" class="btn btn-danger">Cancel</a>
                                    </form>
                                    ';
                                    break;
                                case "papers_db":
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $db = $_POST["db"];
                                        $id = $_POST["id"];
                                        $paper_type = $_POST["paper_type"];
                                        $author = $_POST["author"];
                                        $paper_name = $_POST["paper_name"];
                                        $event_name = $_POST["event_name"];
                                        $date = $_POST["date"];
                                        $paper_db = $_POST["paper_db"];
                                        $place = $_POST["place"];
                                        
                                        $sql = "UPDATE $db SET paper_type='$paper_type', author='$author', paper_name='$paper_name', event_name='$event_name', date='$date', paper_db='$paper_db', place='$place' WHERE id=$id";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        header('Location: view.php');
                                    }
                                    $sql = "SELECT * FROM $db WHERE id = $id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_row($result);
                                    mysqli_free_result($result);
                                    echo 
                                    '
                                    <form id="papers" action="?id=' . $id .'&db=' . $db . '" method="post">
                                        <div class="form-outline">
                                            <label for="paper_type" class="form-label">Enter paper type</label>
                                            <input type="text" id="paper_type" name="paper_type" class="form-control" '. "value='$row[1]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="author" class="form-label">Enter author: </label>
                                            <input type="text" id="author" name="author" class="form-control" '. "value='$row[2]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="paper_name" class="form-label">Enter paper name: </label>
                                            <input type="text" id="paper_name" name="paper_name" class="form-control" '. "value='$row[3]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="event_name" class="form-label">Enter event name: </label>
                                            <input type="text" id="event_name" name="event_name" class="form-control" '. "value='$row[4]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="date" class="form-label">Enter date: </label>
                                            <input type="date" id="date" name="date" class="form-control" '. "value='$row[5]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="paper_db" class="form-label">Enter paper database: </label>
                                            <input type="text" id="paper_db" name="paper_db" class="form-control" '. "value='$row[6]'>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="place" class="form-label">Enter place: </label>
                                            <input type="text" id="place" name="place" class="form-control" '. "value='$row[7]'>
                                        </div>" . '
                                        <input type="hidden" name="db" value="' . $db . '">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="submit" class="btn btn-primary">
                                        <a href="view.php" class="btn btn-danger">Cancel</a>
                                    </form>
                                    ';
                                    break;
                                case "personal_info_db":
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $db = $_POST["db"];
                                        $id = $_POST["id"];
                                        $name = $_POST["name"];
                                        $email = $_POST["email"];
                                        $extension_number = $_POST["extension_number"];
                                        $work_position = $_POST["work_position"];
                                    
                                        
                                        $sql = "UPDATE $db SET name='$name', email='$email', extension_number='$extension_number', work_position='$work_position'";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        header('Location: view.php');
                                    }
                                    $sql = "SELECT * FROM $db";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_row($result);
                                    mysqli_free_result($result);
                                    echo 
                                    '
                                    <form id="personal_info" action="?id=' . $id .'&db=' . $db . '" method="post">
                                        <div class="form-outline">
                                            <label for="name" class="form-label">Enter name: </label>
                                            <input type="text" id="name" name="name" class="form-control" '. "value='$row[0]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="email" class="form-label">Enter email: </label>
                                            <input type="text" id="email" name="email" class="form-control" '. "value='$row[1]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="extension_number" class="form-label">Enter extension number: </label>
                                            <input type="text" id="extension_number" name="extension_number" class="form-control" '. "value='$row[2]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="work_position" class="form-label">Enter position: </label>
                                            <input type="text" id="work_position" name="work_position" class="form-control" '. "value='$row[3]' required>
                                        </div>" . '
                                        <input type="hidden" name="db" value="' . $db . '">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="submit" class="btn btn-primary">
                                        <a href="view.php" class="btn btn-danger">Cancel</a>
                                    </form>
                                    ';
                                    break;
                                case "plan_db":
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $db = $_POST["db"];
                                        $id = $_POST["id"];
                                        $plan_type = $_POST["plan_type"];
                                        $name = $_POST["name"];
                                        $date = $_POST["date"];
                                        $plan_num = $_POST["plan_num"];
                                        $position = $_POST["position"];
                                        
                                        $sql = "UPDATE $db SET plan_type='$plan_type', name='$name', date='$date', plan_num='$plan_num', position='$position' WHERE id=$id";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        header('Location: view.php');
                                    }
                                    $sql = "SELECT * FROM $db WHERE id = $id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_row($result);
                                    mysqli_free_result($result);
                                    echo 
                                    '
                                    <form id="plan" action="?id=' . $id .'&db=' . $db . '" method="post">
                                        <div class="form-outline">
                                            <label for="plan_type" class="form-label">Enter plan type: </label>
                                            <input type="text" id="plan_type" name="plan_type" class="form-control" '. "value='$row[1]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="name" class="form-label">Enter name: </label>
                                            <input type="text" id="name" name="name" class="form-control" '. "value='$row[2]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="date" class="form-label">Enter date: </label>
                                            <input type="text" id="date" name="date" class="form-control" '. "value='$row[3]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="plan_num" class="form-label">Enter plan number: </label>
                                            <input type="text" id="plan_num" name="plan_num" class="form-control" '. "value='$row[4]'>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="position" class="form-label">Enter position: </label>
                                            <input type="text" id="position" name="position" class="form-control" '. "value='$row[5]' required>
                                        </div>" . '
                                        <input type="hidden" name="db" value="' . $db . '">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="submit" class="btn btn-primary">
                                        <a href="view.php" class="btn btn-danger">Cancel</a>
                                    </form>
                                    ';
                                    break;
                                case "speech_db":
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $db = $_POST["db"];
                                        $id = $_POST["id"];
                                        $topic = $_POST["topic"];
                                        $invitation_unit = $_POST["invitation_unit"];
                                        $date = $_POST["date"];
                                        
                                        $sql = "UPDATE $db SET topic='$topic', invitation_unit='$invitation_unit', date='$date' WHERE id=$id";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        header('Location: view.php');
                                    }
                                    $sql = "SELECT * FROM $db WHERE id = $id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_row($result);
                                    mysqli_free_result($result);
                                    echo 
                                    '
                                    <form id="speech" action="?id=' . $id .'&db=' . $db . '" method="post">
                                        <div class="form-outline">
                                            <label for="topic" class="form-label">Enter topic: </label>
                                            <input type="text" id="topic" name="topic" class="form-control" '. "value='$row[1]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="invitation_unit" class="form-label">Enter invitation unit: </label>
                                            <input type="text" id="invitation_unit" name="invitation_unit" class="form-control" '. "value='$row[2]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="date" class="form-label">Enter date: </label>
                                            <input type="text" id="date" name="date" class="form-control" '. "value='$row[3]' required>
                                        </div>" . '
                                        <input type="hidden" name="db" value="' . $db . '">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="submit" class="btn btn-primary"> 
                                        <a href="view.php" class="btn btn-danger">Cancel</a>
                                    </form>
                                    ';
                                    break;
                                case "curriculum_db":
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $db = $_POST["db"];
                                        $id = $_POST["id"];
                                        $weekday = $_POST["weekday"];
                                        $time = $_POST["time"];
                                        $name = $_POST["name"];
                                        $place = $_POST["place"];
                                        $class = $_POST["class"];
                                        $course = $_POST["course"];
                                            
                                        $sql = "UPDATE $db SET weekday='$weekday', time='$time', name='$name', place='$place', class='$class', course='$course' WHERE id=$id";
                                        $result = mysqli_query($conn, $sql);
                                            
                                        header('Location: view.php');
                                    }
                                    $sql = "SELECT * FROM $db WHERE id = $id";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_row($result);
                                    mysqli_free_result($result);
                                    echo 
                                    '
                                    <form id="curriculum" action="?id=' . $id .'&db=' . $db . '" method="post">
                                        <div class="form-outline">
                                            <label for="weekday" class="form-label">Enter weekday: </label>
                                            <input type="text" id="weekday" name="weekday" class="form-control" '. "value='$row[1]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="time" class="form-label">Enter time: </label>
                                            <input type="text" id="time" name="time" class="form-control" '. "value='$row[2]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="name" class="form-label">Enter name: </label>
                                            <input type="text" id="name" name="name" class="form-control" '. "value='$row[3]' required>
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="place" class="form-label">Enter place: </label>
                                            <input type="text" id="place" name="place" class="form-control" '. "value='$row[4]' >
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="class" class="form-label">Enter class: </label>
                                            <input type="text" id="class" name="class" class="form-control" '. "value='$row[5]' >
                                        </div>" . '
                                        <div class="form-outline">
                                            <label for="course" class="form-label">Enter course: </label>
                                            <input type="text" id="course" name="course" class="form-control" '. "value='$row[6]' >
                                        </div>" . '
                                        <input type="hidden" name="db" value="' . $db . '">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="submit" class="btn btn-primary"> 
                                        <a href="view.php" class="btn btn-danger">Cancel</a>
                                    </form>
                                    ';



                                }
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