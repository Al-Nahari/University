<?php
include('update.php');
include('conn.php');
$conn = mysqli_connect("localhost", "root", "", "student");
mysqli_select_db($conn, "student");
?>
<?php
$select = mysqli_query($conn, "SELECT * from students");
$name ='';
$password ='';
$spe_id ='';
$namlevele ='';
$un_id ='';
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $spe_id = $_POST['spe_id'];
    $un_number = $_POST['un_number'];
    $level = $_POST['level'];
    $un_id = $_POST['un_id'];
    header('location: mosh.php');
    // استعلام إضافة البيانات إلى الجدول `students`
   $sqls = "INSERT INTO `students` (`namestu`, `password`, `spe_id`, `un_number`, `level`, `un_id`) VALUES ('$name', '$password', '$spe_id', '$un_number', '$level', '$un_id');";
   
   //$sqls = "INSERT INTO `students` (`id`, `namestu`, `password`, `spe_id`, `un_number`, `level`, `un_id`) VALUES (NULL, 'nahari', '12345', '7', '12345', '2', '4');";
   mysqli_query($conn, $sqls);

    header('location: mosh.php');

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
    <link rel="stylesheet" href="MyStyle2.css">
    <!-- <link rel="stylesheet" href="Newstyle.css"> -->
    <script src="script.js"></script>
</head>
<body>

<div>
      <a class="BackMenu" href="index.php">الرئيسية</a>
      <br>
       <div class="search">
    <form  method="POST">
        <input class="inputserch" id="uu"  name="se" type="text" placeholder="ابحث عن طالب">
 
    </form>
</div>
    </div>
    <div>
    <form method="post">
    <select name="un_id">
            <option value="">الكلية</option>
            <?php
            $sqll = "SELECT id, namecol FROM college";
            $result = $conn->query($sqll);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['namecol'] . "</option>";
            }
            ?>
        </select>
        <select name="spe_id">
            <option class="optionstyle" value="">القسم</option>
            <?php
            
            $sqll = "SELECT id, namespe FROM specia ";
            $result = $conn->query($sqll);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['namespe'] . "</option>";
            }
            ?>
        </select>
        <input type="number" name="un_number" placeholder="الرقم الجامعي" required>
        <br>
        <input class="NamePass" type="text" name="name" placeholder="الاسم" required>
        <input class="NamePass" type="password" name="password" placeholder="كلمة السر" required>
       
      
        <input type="number" name="level" placeholder="المستوى" required min="1" max="7">
       
        <input  name='add' type="submit" value="تسجيل بيانات الطالب">
    </form>
    <a href="spe.php"><input  class="btnKntrol" type="button" value = "اضافة اقسام"></a>
    </div>


    <div class="content">
    <table border="1">
    <th>الكلية</th>
    <th>التخصص</th> 
    <th>الرقم الجامعي</th>
        <th>اسم الطالب</th>
        <th>كلمة السر</th>
        <th>المستوى</th>
        <th>حذف</th>
        <th>حذف</th>
        <tr>
         
        <br>
        <tbody>
    </div>

    <?php
    
    //   echo '<link rel="stylesheet" href="Newstyle.css">';
           
    $_select = mysqli_query($conn, "SELECT students.id ,college.namecol, specia.namespe, students.namestu ,students.password,students.un_number,students.level FROM students ,specia ,college WHERE students.un_id = college.id AND students.spe_id = specia.id ");
    if (isset($_POST['se'])) {
        $name = $_POST['se'];  
    $_select = mysqli_query($conn, "SELECT students.id ,college.namecol, specia.namespe, students.namestu ,students.password,students.un_number,students.level FROM students ,specia ,college WHERE (students.un_id = college.id AND students.spe_id = specia.id) AND students.namestu like '%$name%'");

while ( $row = mysqli_fetch_array($_select)) 
{  
   echo '<td>' . $row['namecol'] . '</td>';
   echo '<td>' .$row['namespe']. '</td>';
   echo '<td>' . $row['un_number'] . '</td>';  
   echo '<td>' .$row['namestu']. '</td>';
   echo '<td>' . $row['password'] . '</td>';
   echo '<td>' .$row['level']. '</td>';
   echo '<td><form method="post"><input type="hidden" name="idel" value="' . $row['id'] . '"><input name="delet" type="submit" value="حذف"></form></td>';
   echo '<td><form  method="post"><input type="hidden" name="idup" value="' . $row['id'] . '"><input name="upd" type="submit" value=" تعديل"></form></td>';
   echo '</tr>';
    }}
    else{ 

        while ( $row = mysqli_fetch_array($_select)) 
        {  
           echo '<td>' . $row['namecol'] . '</td>';
           echo '<td>' .$row['namespe']. '</td>';
           echo '<td>' . $row['un_number'] . '</td>';  
           echo '<td>' .$row['namestu']. '</td>';
           echo '<td>' . $row['password'] . '</td>';
           echo '<td>' .$row['level']. '</td>';
           echo '<td><form method="post"><input type="hidden" name="idel" value="' . $row['id'] . '"><input name="delet" type="submit" value="حذف"></form></td>';
                        echo '<td><form method="post"><input type="hidden" name="idup" value="' . $row['id'] . '"><input name="upd" type="submit" value=" تعديل"></form></td>';
                        echo '</tr>';
            }
    }
   ?>
<?php
if (isset($_POST['delet'])) {
    $idel = $_POST['idel'];
    $sqls = "DELETE FROM students WHERE id = '$idel'";
    mysqli_query($conn, $sqls);
    header('location: mosh.php');
}


?>

   
        </body>
        </html>
        

