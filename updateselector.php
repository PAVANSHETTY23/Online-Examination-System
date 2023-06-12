
<html>

<head>
    <title>
        Onine examination System
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
$qsid1='';
session_start();
require_once 'sql.php';
                $conn = mysqli_connect($host, $user, $ps, $project);if (!$conn) {
    echo "<script>alert(\"Database error retry after some time !\")</script>";
} else {
    $type1 = $_SESSION["type"];
    $username1 = $_SESSION["username"];
    $sql = "select * from " . $type1 . " where mail='{$username1}'";
    $res =   mysqli_query($conn, $sql);
    if ($res == true) {
        global $dbmail, $dbpw, $dbusn;
        while ($row = mysqli_fetch_array($res)) {
            $dbmail = $row['mail'];
            $dbname = $row['name'];
            $dbusn = $row['staffid'];
            $dbphno = $row['phno'];
            $dbgender = $row['gender'];
            $dbdob = $row['DOB'];
            $dbdept = $row['dept'];
        }
    }
    $qname = $_SESSION['qname'];
    $sql = "select quizid from quiz where quizname='{$qname}'";
    $res =   mysqli_query($conn, $sql);
    if ($res == true) {
        global $qid;
        while ($row = mysqli_fetch_array($res)) {
            $qid = $row['quizid'];
        }
    }
    if (isset($_POST['submit'])) {
        $old=$_POST['old'];
        $id=$_POST['id'];
        $qs = $_POST['qs'];
        $op1 = $_POST['op1'];
        $op2 = $_POST['op2'];
        $op3 = $_POST['op3'];
        $op4 = $_POST["op4"];
        $ans = $_POST["ans"];
        $quizid = $_GET["qid"];

        $sql="UPDATE questions SET questions.qs='$qs', questions.op1='$op1', questions.op2='$op2', questions.op3='$op3', questions.op4='$op4', answer='$ans' WHERE questions.quizid=$quizid AND questions.qs='$qs';";

        $conn=mysqli_connect('localhost', 'root', 'pavan123', 'quiz');
        $res =   mysqli_query($conn, $sql);
        if ($res) {
            echo '<script>alert("Question Updated");</script>';
            header('homestaff.php');

        } else {
            echo '<script>alert("Error");</script>';
        }
    }
    if (isset($_POST['submit2'])) {
        $qs = $_POST["qs"];
        $op1 = $_POST["op1"];
        $op2 = $_POST["op2"];
        $op3 = $_POST["op3"];
        $op4 = $_POST["op4"];
        $ans = $_POST["ans"];
        $quizid = $_GET["qid"];
        echo "<h1>'$1uizid'</h1>";
        $sql = "UPDATE questions SET qs='$qs', op1='$op1', op2='$op2', op3='$op3', op4='$op4', answer='$ans' WHERE quizid='$quizid';";
        $conn=mysqli_connect('localhost', 'root', 'pavan123', 'quiz');
        $res =   mysqli_query($conn, $sql);
        if ($res) {
            echo '<script>alert("Question Updated");</script>';
            header('Location: homestaff.php');
            
            
        } else {
            echo '<script>alert("Error");</script>';
        }
    }
}
?>
<style>
    table{
        border: 1px solid black;
        width: 100% !important;
        font-weight: bolder;
        font-size: 2vw;
        color: #042A38;
    }
    td{
        border: 1px solid black;
        width: 20%;
        font-weight: bolder;
        font-size: 2vw;

    }
    li {
        margin: 1.5vw;
    }

    ul {
        list-style: none;
        width: auto !important;
    }

    .navbar {
        background-color: #fff!important;
        font-size: 1.5vw;
    }

    .navbar>ul>li:hover {
        color: black;
        text-decoration: underline;
        font-weight: bold;

    }

    .navbar>ul>li>a:hover {
        color: black;
        text-decoration: underline;
        font-weight: bold !important;
    }

    a {
        text-decoration: none;
        color: #042A38;
    }

    .prof,
    #score {
        top: 3vw;
        position: fixed;
        width: 50vw !important;
        margin-left: 25vw !important;
        margin-right: 25vw !important;
        background-color: #fff!important;
        display: none !important;
        border-radius: 10px;
        margin-top: 2vw;
        z-index: 1;
        padding: 1vw;
        padding-left: 2vw;
        color: #042A38;
    }

    button {
        height: 5vh;
        width: 10vw;
        background-color: lightgoldenrodyellow;
        color: black;
        outline: none;
        border: none;
        border-radius: 10px;
        margin: 5vw;
    }

    input {
        width: 30vw;
        height: 3vw;
        border-radius: 10px;
        border: 2px solid black;
        padding-left: 2vw;
        font-weight: bolder;
        outline: none;
    }

    ::placeholder {
        font-weight: bold;
        font-family: 'Courier New', Courier, monospace;
    }

    label {
        font-weight: bolder;
    }

    button:hover {
        background-color: blueviolet !important;
    }

    .bg {
        background-size: 100%;
    }

    @media screen and (max-width: 450px) {
        .navbar {
            display: initial !important;

        }

        .navbar>ul {
            display: initial !important;
            left: 25vw !important;
            text-align: center;
            right: 25vw !important;
        }

        .navbar>ul>li {
            background-color: orange !important;
        }

        section {
            text-align: center;
            margin-top: 0 !important;
            background-color: orange !important;
            width: 100vw;
            margin: 0 !important;
        }

        p {
            color: #042A38 !important;
        }

    }
    table{
        width: 90vw;
        margin-left: 5vw;
        margin-right: 5vw;
        align-content: center;
        border: 1px solid black;
    }
    thead{
        font-weight:900;
        font-size: 1.5vw;
    }
    td{
        width: auto;
        border: 1px solid black;
        text-align: center;
        height: 4vw;
        font-weight: bold;
   }
    #tq{
        text-decoration: underline;
    }
    #sc{
        width: 100% !important;
        margin: 0%;
        color: #042A38;
            }
            #le{
                width: 90vw;
                margin: 0;
                color: #fff;
            }
</style>

<body style="margin: 0 !important;font-weight: bolder !important;font-family: 'Courier New', Courier, monospace;color:#fff !important">
    <div style="background-color: #042A38;height: 100%;">
        <div class="navbar" style="display: inline-flex;width: 100%;color:#042A38;position:fixed;">
            <section style="margin: 1.5vw;">ONLINE EXAMINATION SYSTEM</section>
            <ul style="display: inline-flex;padding: 0 !important;margin: 0;float: right;right: 0;position: fixed;width: 50vw;">
                <li onclick="dash()">Dashbord</li>
                <li onclick="prof()">profile</li>
                <li onclick="score()">Quiz's</li>
                <li onclick="lo()">Sign Out</li>
            </ul>
        </div><br><br>
        <section class="dash" style="margin-top:3vw">
            <section id="ans">
                <center>
                    <form style="margin: 0vw;width: 100vw" method="get" action="updateq.php">
                    <?php 
                    $qsid1=$_GET['qid'];
                    
                    $sql ="select * from questions where quizid=$qsid1";
                    $sql1 ="select * from questions where quizid=$qsid1";
                    $res=mysqli_query($conn,$sql);
                    //if($res)
                    //{
                        //echo "<h1>List of Quiz added by U</h1>";
                        //echo "<table id=\"sc\"><thead><tr><td>Quiz id</td>&nbsp;<td>Quiz Title</td><td>Created on</td></tr></thead>";
                        if (mysqli_num_rows($res)>0) {
                                if($row=mysqli_fetch_assoc($res)){
                            ?>
                            <label for="quizname">Add Questions</label><br><br>
                        <div id="QS">
                        
                            <label for="qs">Question ID</label>
                            <?php
                            $q1=$_GET['qid'];
                            ?>


                            
                            <input type="text" name="qid" placeholder="Question ID " value=<?php echo $row["quizid"]; ?> readonly><br><br>
                            
                            <input type='hidden' name='old' value='<?php echo $row["qs"]; ?>'/>
                            <input type='hidden' name='id' value='<?php echo $row["id"]; ?>'/>

                           
                            <label>Select Question To Edit</label><br>
                            <select class="form-control" name="selector" style="width:550px; height:40px;">
                            <br>

                            <?php $options[0]='';
                            $qsid1=$_GET['qid'];
                            $conn1 = mysqli_connect($host, $user, $ps, $project);

				                $query1 ="SELECT * FROM questions where quizid=$qsid1";
				                $result1 = mysqli_query($conn1,$query1);
  
				                if ($result1->num_rows > 0) {
					                // output data of each row
					                while($row = $result1->fetch_assoc()) {
						                ?>
                                        <option value="<?php echo $row['id']; ?>">
                                        <?php echo 'Quiz ID - '.$row["quizid"].' - '.$row["qs"]; ?></option>
			
						                <?php
					                }
  
				                } else {
					                echo "0 results";
				                }

			?></select><br><br>
            <button type="submit" style="width:550px; height:40px;">Next</button>
                </form>
                        
                        <?php
                        
                        
                                }
                            //echo "<tr><td>".$row["qs"]."</td><td>".$row["op1"]."</td><td>".$row["op2"]."</td></tr>"; 
                        }
                        //echo "</table>";
                    
                    ?>
                </center>
            </section>
        </section>
        <section class="prof" id="prof" style="display: none;color:#042A38;">
            <p><b>Type of User&nbsp;:&nbsp;<?php echo $type1 ?></b></p>
            <p><b>NAME&nbsp;:&nbsp;<?php echo $dbname ?></b></p>
            <p><b>EMAIL&nbsp;:&nbsp;<?php echo $dbmail ?></b></p>
            <p><b>Ph No.&nbsp;:&nbsp;<?php echo $dbphno ?></b></p>
            <p><b>USN&nbsp;:&nbsp;<?php echo $dbusn ?></b></p>
            <p><b>GENDER&nbsp;:&nbsp;<?php echo $dbgender ?></b></p>
            <p><b>DOB&nbsp;:&nbsp;<?php echo $dbdob ?></b></p>
            <p><b>Dept.&nbsp;:&nbsp;<?php echo $dbdept ?></b></p>
        </section>
        <section id="score" style="display:none;">
        <?php 
            $sql ="select * from quiz where mail='{$username1}'";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                echo "<h1>List of Quiz added by U</h1>";
                echo "<table id=\"sc\"><thead><tr><td>Quiz id</td>&nbsp;<td>Quiz Title</td><td>Created on</td></tr></thead>";
                while ($row = mysqli_fetch_assoc($res)) {                
                    echo "<tr><td>".$row["quizid"]."</td><td>".$row["quizname"]."</td><td>".$row["date_created"]."</td></tr>"; 
                }
                echo "</table>";
            }
            ?>
        </section>
    </div>


</body>
<?php
echo '<script>' .
    "function prof(){" .
    "document.getElementById(\"prof\").style=\"display: block !important;\";" .
    "document.getElementById(\"score\").style=\"display: none !important;\";" .
    "}" .
    "function score(){" .
    "document.getElementById(\"prof\").style=\"display: none !important;\";" .
    "document.getElementById(\"score\").style=\"display: block !important;\";" .
    "}" .
    "function dash(){" .
    "document.getElementById(\"prof\").style=\"display: none !important;\";" .
    "document.getElementById(\"score\").style=\"display: none !important;\";" .
    "}" .
    "function lo(){" .
    "alert(\"Thank You for Using our Online Examination System\");";
//session_unset();
//session_destroy();
echo "window.location.replace(\"index.php\");" .
    "}" .
    "function addquiz(){" .
    "document.getElementById(\"addq\").style=\"display: initial;\";" .
    "}" .

    "</script>";
?>

</html>