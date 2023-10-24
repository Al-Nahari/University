<?php
include('conn.php');
if (isset($_POST['add'])) {
    while ($row< $_POST['grd']) {
        $row++;
        $spe_id = $_POST['spe_id'];
        $gradeis = $_POST['gradeis'.$row];
            // استعلام إضافة البيانات إلى الجدول `students`
           $sqls = "INSERT INTO `subjects` (`id`,`spe_id`, `namesub`) VALUES (NULL, '$spe_id','$gradeis');";
       //$sqls = "INSERT INTO `students` (`id`, `namestu`, `password`, `spe_id`, `un_number`, `level`, `un_id`) VALUES (NULL, 'nahari', '12345', '7', '12345', '2', '4');";
       mysqli_query($conn, $sqls);
    }
    header('location: index.php');
        echo' <div class="content">';
        echo'<table border="1">';
       
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Mystyle3.css">
    <!-- <link rel="stylesheet" href="s.css">
    <link rel="stylesheet" href="Newstyle.css"> -->
    <script src="script.js"></script>
</head>
<body>
<div >
      <a href="index.php">الرئيسية</a>
    </div>
    <br>
    <div>
    <form method="post">
        
        <select name="spe_id">
            <option value="">القسم</option>
            <?php
            echo '<script src="script.js"></script>';
            $sqll = "SELECT id, namespe FROM specia";
            $result = $conn->query($sqll);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['namespe'] . "</option>";
            }
            ?>
        </select>
        <input type="number" name="grd" id="children"  onchange="showChildNames()" placeholder="عدد المواد">
       <br>
       <div class="AddNameSub" id="child-names" style="display:none;"></div>
       <input  name='add' type="submit" value="إضافة المقرر">