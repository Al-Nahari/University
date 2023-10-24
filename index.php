<?php
include('conn.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="Newstyle.css"> -->
    <link rel="stylesheet" href="MyStyle.css">
</head>
<body>

    <div >
       <form method='POST'>
            <h3>صفحة الأستعلام عن بيانات طالب</h1>
            <input  class="serchh" name='namestu' type="number" placeholder="رقم الطالب" required>
            <input  class="serchh" name='age' type="password" placeholder="كلمة السر" required>
            <input  class="serchh" name='add' type="Submit" value="تسجيل دخول الطالب">
            <br>
            <a href="kntrol.php"><input  class="btnKntrol" type="button" value = "الكنترول"></a>
            <a href="mosh.php"><input  class="btnmosh" type="button" value = "شؤون الطلاب"></a>
        </form>
        </div>
        <div class="content">
    <table border="1">
        <th>اسم الطالب</th>
        <th>التخصص</th> 
        <br>
        <tbody>
    </div>
    <?php
    if (isset($_POST['add'])) {
        $un_number =$_POST['namestu'];
    $password = $_POST['age'];
     $_select = mysqli_query($conn, "SELECT students.namestu ,subjects.namesub,grades.gradeis,specia.namespe FROM students INNER JOIN grades ON students.id = grades.stu_id
     INNER JOIN subjects ON grades.sub_id = subjects.id INNER JOIN specia ON students.spe_id = specia.id where un_number like '%$un_number%' AND password like '%$password%'");

    
if ( $row = mysqli_fetch_array($_select)) 
{  echo '<td>' .$row['namestu']. '</td>';
    echo '<td>' . $row['namespe'] . '</td>'; }}
    ?>
    <div class="content">
    <table border="1">
        <th>المادة</th>
        <th>الدرجة</th>       
        <tbody>
    </div>
    <?php
    $un_number = "";
    $passwor = "";
        if (isset($_POST['add'])) {
            $un_number =$_POST['namestu'];
        $password = $_POST['age'];
            $_select = mysqli_query($conn, "SELECT students.namestu ,subjects.namesub,grades.gradeis,specia.namespe FROM students INNER JOIN grades ON students.id = grades.stu_id
            INNER JOIN subjects ON grades.sub_id = subjects.id INNER JOIN specia ON students.spe_id = specia.id where un_number like '%$un_number%' AND password like '%$password%'");
    while ( $row = mysqli_fetch_array($_select)) 
    { 
        echo '<td>' . $row['namesub'] . '</td>';
        echo '<td>' . $row['gradeis'] . '</td>';
        echo '<tr>';
    } 
}
?>