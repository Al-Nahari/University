<?php
include('pdate.php');
include('conn.php');


if (isset($_POST['add'])) {
    $stu_id = $_POST['stu_id'];
    $spe_id = $_POST['spe_id'];
    $sub_id = $_POST['sub_id'];
    $gradeis = $_POST['gradeis'];

    // استعلام إضافة البيانات إلى الجدول `students`
   $sqls = "INSERT INTO `grades` (`id`, `stu_id`, `spe_id`,`sub_id`, `gradeis`) VALUES (NULL, '$stu_id ', '$spe_id', '$sub_id', '$gradeis');";
   
   //$sqls = "INSERT INTO `students` (`id`, `namestu`, `password`, `spe_id`, `un_number`, `level`, `un_id`) VALUES (NULL, 'nahari', '12345', '7', '12345', '2', '4');";
   mysqli_query($conn, $sqls);

    header('location: kntrol.php');

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
</head>
<body>
<div >
      <a href="index.php">الرئيسية</a>
      </div
      <br>
      <div class="inputserch">
    <form method="POST">
        <input  name="se" type="text" placeholder="ابحث عن طالب">
    </form>
</div>
    
    <div>
    <form method="post">
        
        <select name="spe_id">
            <option value="">القسم</option>
            <?php
            $sqll = "SELECT id, namespe FROM specia";
            $result = $conn->query($sqll);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['namespe'] . "</option>";
            }
            ?>
        </select>
        <select name="sub_id">
            <option value="">المادة</option>
            <?php
            $sqll = "SELECT id, namesub FROM subjects";
            $result = $conn->query($sqll);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['namesub'] . "</option>";
            }
            ?>
        </select>
        <select name="stu_id">
            <option value="">الطالب</option>
            <?php
            $sqll = "SELECT id, namestu FROM students";
            $result = $conn->query($sqll);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['namestu'] . "</option>";
            }
            ?>
        </select>
        <input type="text" name="gradeis" placeholder="الدرجة">
        
        <input  name='add' type="submit" value="تسجيل بيانات الطالب">
    </form>
    <a href="sub.php"><input  class="inputserch" type="button" value = "اضافة مقرر"></a>
    </div>
    <div class="content">
    <table border="1">
 
        <th>اسم الطالب</th>
        <th>التخصص</th>
        <th>المادة</th>
        <th>الدرجة</th> 
              
        <tbody>
    </div>
    <?php
   
    
    
    ?>
    <?php 
     $_select = mysqli_query($conn, "SELECT grades.id , students.namestu ,subjects.namesub,grades.gradeis,specia.namespe FROM students INNER JOIN grades ON students.id = grades.stu_id
     INNER JOIN subjects ON grades.sub_id = subjects.id INNER JOIN specia ON students.spe_id = specia.id ");
         $row = mysqli_fetch_array($_select);
         
            if (isset($_POST['se'])) {
                $name = $_POST['se'];
                    $select = mysqli_query($conn, "SELECT grades.id, students.namestu ,subjects.namesub,grades.gradeis,specia.namespe FROM students INNER JOIN grades ON students.id = grades.stu_id
                    INNER JOIN subjects ON grades.sub_id = subjects.id INNER JOIN specia ON students.spe_id = specia.id where students.namestu like '%$name%'");
                    
                    while ($row = mysqli_fetch_array($select)) {
                        echo '<tr>';
                     
                        echo '<td>' .$row['namestu']. '</td>';
                        echo '<td>' . $row['namespe'] . '</td>';
                        echo '<td>' . $row['namesub'] . '</td>';
                        echo '<td>' . $row['gradeis'] . '</td>';
                        echo '<td><form method="post"><input type="hidden" name="idel" value="' . $row['id'] . '"><input name="delet" type="submit" value="حذف"></form></td>';
                        echo '<td><form method="post"><input type="hidden" name="idup" value="' . $row['id'] . '"><input name="upd" type="submit" value=" تعديل"></form></td>';
                        echo '<tr>'; }
                    }
                
                else {
                   
               while ( $row = mysqli_fetch_array($_select)) 
               {  echo '<td>' .$row['namestu']. '</td>';
                   echo '<td>' . $row['namespe'] . '</td>';
                   echo '<td>' . $row['namesub'] . '</td>';
                   echo '<td>' . $row['gradeis'] . '</td>';
                   echo '<td><form method="post"><input type="hidden" name="idel" value="' . $row['id'] . '"><input name="delet" type="submit" value="حذف"></form></td>';
                        echo '<td><form method="post"><input type="hidden" name="idup" value="' . $row['id'] . '"><input name="upd" type="submit" value=" تعديل"></form></td>';
                   echo '<tr>'; }
                }
                

?>
<?php

if (isset($_POST['delet'])) {
    $idel = $_POST['idel'];
    $sqls = "DELETE FROM grades WHERE id = '$idel'";
    mysqli_query($conn, $sqls);
    header('location: kntrol.php');
}


?>
        </body>
        </html>
        

