<?php
    include("conn.php");
?>
<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $db = $_POST["db"] . "_db";
        switch ($db) {
            case "academic_qualifications_db":
                $school = $_POST["school"];
                $major = $_POST["major"];
                $degree = $_POST["degree"];
                
                //delete auto = 1
                $sql = "INSERT INTO $db VALUES(id, '$school', '$major', '$degree');";
                mysqli_query($conn, $sql);
                header('Location: view.php');                
                break;
            case "awards_db":
                $classification = $_POST["classification"];
                $school_year = $_POST["school_year"];
                $award = $_POST["award"];
                $awarding_unit = $_POST["awarding_unit"];
                $date = $_POST["date"];
                $topic = $_POST["topic"];
                $students = $_POST["students"];

                $sql = "INSERT INTO $db VALUES(id, '$classification', '$school_year', '$award', '$awarding_unit', '$date', '$topic', '$students');";
                mysqli_query($conn, $sql);
                header('Location: view.php');
                break;
            case "books_db":
                $classification = $_POST["classification"];
                $author = $_POST["author"];
                $book_name = $_POST["book_name"];
                $publication = $_POST["publication"];
                $country = $_POST["country"];
                $date = $_POST["date"];
                $pages = $_POST["pages"];

                $sql = "INSERT INTO $db VALUES(id, '$classification', '$author', '$book_name', '$publication', '$country', '$date', '$pages');";
                mysqli_query($conn, $sql);
                header('Location: view.php');
                break;
            case "experience_db":
                $working_unit = $_POST["working_unit"];
                $position = $_POST["position"];

                $sql = "INSERT INTO $db VALUES(id, '$working_unit', '$position');";
                mysqli_query($conn, $sql);
                break;
            case "expertise_db":
                $ch_name = $_POST["ch_name"];
                $en_name = $_POST["en_name"];

                $sql = "INSERT INTO $db VALUES(id, '$ch_name', '$en_name');";
                mysqli_query($conn, $sql);
                header('Location: view.php');
                break;
            case "papers_db":
                $paper_type = $_POST["paper_type"];
                $author = $_POST["author"];
                $paper_name = $_POST["paper_name"];
                $event_name = $_POST["event_name"];
                $date = $_POST["date"];
                $paper_db = $_POST["paper_db"];
                $place = $_POST["place"];
                
                $sql = "INSERT INTO $db VALUES(id, '$paper_type', '$author', '$paper_name', '$event_name', '$date', '$paper_db', '$place');";
                mysqli_query($conn, $sql);
                header('Location: view.php');
                break;
            case "personal_info_db":
                $name = $_POST["name"];
                $email = $_POST["email"];
                $extension_number = $_POST["extension_number"];
                $work_position = $_POST["work_position"];

                $sql = "INSERT INTO $db VALUES('$name', '$email', '$extension_number', '$work_position');";
                mysqli_query($conn, $sql);
                header('Location: view.php');
                break;
            case "plan_db":
                $plan_type = $_POST["plan_type"];
                $name = $_POST["name"];
                $date = $_POST["date"];
                $plan_num = $_POST["plan_num"];
                $position = $_POST["position"];

                $sql = "INSERT INTO $db VALUES(id, '$plan_type', '$name', '$date', '$plan_num', '$position');";
                mysqli_query($conn, $sql);
                header('Location: view.php');
                break;
            case "speech_db":
                $topic = $_POST["topic"];
                $invitation_unit = $_POST["invitation_unit"];
                $date = $_POST["date"];

                $sql = "INSERT INTO $db VALUES(id, '$topic', '$invitation_unit', '$date');";
                mysqli_query($conn, $sql);
                header('Location: view.php');
                break;
            case "curriculum_db":
                $weekday = $_POST["weekday"];
                $time = $_POST["time"];
                $name = $_POST["name"];
                $place = $_POST["place"];
                $class = $_POST["class"];
                $course = $_POST["course"];

                $sql = "INSERT INTO $db VALUES(id, '$weekday', '$time', '$name', '$place', '$class', '$course');";
                mysqli_query($conn, $sql);
                header('Location: view.php');
                break;
        }
    }
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
<script>
    function showForm () {
        let select = document.getElementById("selectForm");
        let selectedOption = select.value;
        
        let forms = document.getElementsByTagName("form");
        
        
        for (let i = 0; i < forms.length; i++) {
            
            forms[i].style.display = "none";
        }

        let form = document.getElementById(selectedOption);
        form.style.display = "block";
        
    }
</script>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Data</h2>
                    </div>
                    <label>
                        <select class="form-select form-select-lg mb-3" id="selectForm" onchange="showForm()">
                            <option selected>Open this select menu</option>
                            <option value="academic_qualifications">學位</option>
                            <option value="awards">獎項</option>
                            <option value="books">專書</option>
                            <option value="experience">經歷</option>
                            <option value="expertise">專長</option>
                            <option value="papers">論文</option>
                            <option value="personal_info">個人資料</option>
                            <option value="plan">計畫</option>
                            <option value="speech">演講</option>    
                            <option value="curriculum">課程</option>           
                        </select>
                    </label>
                    
                    <form id="academic_qualifications" style="display: none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="form-outline">
                            <label for="school" class="form-label">Enter School: </label>
                            <input type="text" id="school" name="school" class="form-control" required>  
                        </div>
                        <div class="form-outline">
                            <label for="major" class="form-label">Enter major: </label>
                            <input type="text" id="major" name="major" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="degree" class="form-label">Enter degree: </label>
                            <input type="text" id="degree" name="degree" class="form-control" required>
                        </div>
                        <div style="display: none;">                        
                            <label for="db"></label>
                            <input type="text" name="db" value="academic_qualifications">
                        </div>
                        <input type="submit" class="btn btn-primary">
                        <a href="view.php" class="btn btn-danger">Cancel</a>
                    </form>

                    <form id="awards" style="display: none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="form-outline">
                            <label for="classification" class="form-label">Enter classification: </label>
                            <input type="text" id="classification" name="classification" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="school_year" class="form-label">Enter school_year: </label>
                            <input type="number" id="school_year" name="school_year" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="award" class="form-label">Enter award: </label>
                            <input type="text" id="award" name="award" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="awarding_unit" class="form-label">Enter awarding_unit: </label>
                            <input type="text" id="awarding_unit" name="awarding_unit" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="date" class="form-label">Enter date: </label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="topic" class="form-label">Enter topic: </label>
                            <input type="text" id="topic" name="topic" class="form-control">
                        </div>
                        <div class="form-outline">
                            <label for="students" class="form-label">Enter students: </label>
                            <input type="text" id="students" name="students" class="form-control">
                        </div>
                        <div style="display: none;">                        
                            <label for="db"></label>
                            <input type="text" name="db" value="awards">
                        </div>
                        <input type="submit" class="btn btn-primary">
                        <a href="view.php" class="btn btn-danger">Cancel</a>
                    </form>

                    <form id="books" style="display: none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="form-outline">
                            <label for="classification" class="form-label">Enter classification: </label>
                            <input type="text" id="classification" name="classification" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="author" class="form-label">Enter author: </label>
                            <input type="text" id="author" name="author" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="book_name" class="form-label">Enter book name: </label>
                            <input type="text" id="book_name" name="book_name" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="publication" class="form-label">Enter publication: </label>
                            <input type="text" id="publication" name="publication" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="country" class="form-label">Enter country: </label>
                            <input type="text" id="country" name="country" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="date" class="form-label">Enter date: </label> 
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="pages" class="form-label">Enter pages</label>
                            <input type="number" id="pages" name="pages" class="form-control" required>
                        </div>
                        <div style="display: none;">                        
                            <label for="db"></label>
                            <input type="text" name="db" value="books">
                        </div>
                        <input type="submit" class="btn btn-primary">
                        <a href="view.php" class="btn btn-danger">Cancel</a>
                    </form>

                    <form id="experience" style="display: none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="form-outline">
                            <label for="working_unit" class="form-label">Enter working unit</label>
                            <input type="text" id="working_unit" name="working_unit" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="position" class="form-label">Enter position</label>
                            <input type="text" id="position" name="position" class="form-control" required>
                        </div>
                        <div style="display: none;">                        
                            <label for="db"></label>
                            <input type="text" name="db" value="experience">
                        </div>
                        <input type="submit" class="btn btn-primary">
                        <a href="view.php" class="btn btn-danger">Cancel</a>
                    </form>

                    <form id="expertise" style="display: none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="form-outline">
                            <label for="ch_name" class="form-label">Enter Chinese name</label>
                            <input type="text" id="ch_name" name="ch_name" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="en_name" class="form-label">Enter English name</label>
                            <input type="text" id="en_name" name="en_name" class="form-control" required>
                        </div>
                        <div style="display: none;">                        
                            <label for="db"></label>
                            <input type="text" name="db" value="expertise">
                        </div>
                        <input type="submit" class="btn btn-primary">
                        <a href="view.php" class="btn btn-danger">Cancel</a>
                    </form>

                    <form id="papers" style="display: none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="form-outline">
                            <label for="paper_type" class="form-label">Enter paper type</label>
                            <input type="text" id="paper_type" name="paper_type" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="author" class="form-label">Enter author: </label>
                            <input type="text" id="author" name="author" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="paper_name" class="form-label">Enter paper name: </label>
                            <input type="text" id="paper_name" name="paper_name" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="event_name" class="form-label">Enter event name: </label>
                            <input type="text" id="event_name" name="event_name" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="date" class="form-label">Enter date: </label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="paper_db" class="form-label">Enter paper database: </label>
                            <input type="text" id="paper_db" name="paper_db" class="form-control">
                        </div>
                        <div class="form-outline">
                            <label for="place" class="form-label">Enter place: </label>
                            <input type="text" id="place" name="place" class="form-control">
                        </div>
                        <div style="display: none;">                        
                            <label for="db"></label>
                            <input type="text" name="db" value="papers">
                        </div>
                        <input type="submit" class="btn btn-primary">
                        <a href="view.php" class="btn btn-danger">Cancel</a>
                    </form>

                    <form id="personal_info" style="display: none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="form-outline">
                            <label for="name" class="form-label">Enter name: </label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="email" class="form-label">Enter email: </label>
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="extension_number" class="form-label">Enter extension number: </label>
                            <input type="text" id="extension_number" name="extension_number" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="work_position" class="form-label">Enter position: </label>
                            <input type="text" id="work_position" name="work_position" class="form-control" required>
                        </div>
                        <div style="display: none;">                        
                            <label for="db"></label>
                            <input type="text" name="db" value="personal_info">
                        </div>
                        <input type="submit" class="btn btn-primary">
                        <a href="view.php" class="btn btn-danger">Cancel</a>
                    </form>

                    <form id="plan" style="display: none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="form-outline">
                            <label for="plan_type" class="form-label">Enter plan type: </label>
                            <input type="text" id="plan_type" name="plan_type" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="name" class="form-label">Enter name: </label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="date" class="form-label">Enter date: </label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="plan_num" class="form-label">Enter plan number: </label>
                            <input type="text" id="plan_num" name="plan_num" class="form-control">
                        </div>
                        <div class="form-outline">
                            <label for="position" class="form-label">Enter position: </label>
                            <input type="text" id="position" name="position" class="form-control" required>
                        </div>
                        <div style="display: none;">                        
                            <label for="db"></label>
                            <input type="text" name="db" value="plan">
                        </div>
                        <input type="submit" class="btn btn-primary">
                        <a href="view.php" class="btn btn-danger">Cancel</a>
                    </form>

                    <form id="speech" style="display: none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="form-outline">
                            <label for="topic" class="form-label">Enter topic: </label>
                            <input type="text" id="topic" name="topic" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="invitation_unit" class="form-label">Enter invitation unit: </label>
                            <input type="text" id="invitation_unit" name="invitation_unit" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="date" class="form-label">Enter date: </label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                        <div style="display: none;">                        
                            <label for="db"></label>
                            <input type="text" name="db" value="speech">
                        </div>
                        <input type="submit" class="btn btn-primary"> 
                        <a href="view.php" class="btn btn-danger">Cancel</a>
                    </form>

                    <form id="curriculum" style="display: none;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="form-outline">
                            <label for="weekday" class="form-label">Enter weekday: </label>
                            <input type="text" id="weekday" name="weekday" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="time" class="form-label">Enter time: </label>
                            <input type="text" id="time" name="time" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="name" class="form-label">Enter name: </label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="place" class="form-label">Enter place: </label>
                            <input type="text" id="place" name="place" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="class" class="form-label">Enter class: </label>
                            <input type="text" id="class" name="class" class="form-control" required>
                        </div>
                        <div class="form-outline">
                            <label for="course" class="form-label">Enter course: </label>
                            <input type="text" id="course" name="course" class="form-control" required>
                        </div>
                        <div style="display: none;">                        
                            <label for="db"></label>
                            <input type="text" name="db" value="curriculum">
                        </div>
                        <input type="submit" class="btn btn-primary"> 
                        <a href="view.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
</html>

<?php
    mysqli_close($conn);

?>