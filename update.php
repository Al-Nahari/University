<?php
include('conn.php');
if (isset($_POST['upd'])) {
    $idup = $_POST['idup'];
    $select = mysqli_query($conn, "SELECT students.id ,college.namecol, specia.namespe, students.namestu ,students.password,students.un_number,students.level FROM students ,specia ,college where students.id ='$idup'");
  
   $row = mysqli_fetch_array($select);
  
    $namecol = $row['namecol'];
    $namespe = $row['namespe'];
    $un_number = $row['un_number'];
    $namestu = $row['namestu'];
    $password = $row['password'];
    $level = $row['level'];

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
</head>
<body>
<form method="post">
 <input type="hidden" name="idup" value="<?php echo $idup ?>">
<select name="un_id">
            
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
            $sqll = "SELECT id, namespe FROM specia";
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
       
    <input name="update" type="submit" value="تعديل"></form>
    
<?php
}
if (isset($_POST['update'])) {
    $idup = $_POST['idup'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $spe_id = $_POST['spe_id'];
        $un_number = $_POST['un_number'];
        $level = $_POST['level'];
        $un_id = $_POST['un_id'];
    $sql = "UPDATE `students` SET `namestu`='$name',`password`='$password ',`spe_id`='$spe_id',`un_number`='$un_number',`level`='$level',`un_id`='$un_id' WHERE id='$idup'";
    mysqli_query($conn, $sql);
    header('location: mosh.php');
}

?>