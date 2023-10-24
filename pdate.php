<?php
include('conn.php');
if (isset($_POST['upd'])) {
    $idup = $_POST['idup'];
    $select = mysqli_query($conn, "SELECT students.id, students.namestu ,subjects.namesub,grades.gradeis,specia.namespe FROM students INNER JOIN grades ON students.id = grades.stu_id
    INNER JOIN subjects ON grades.sub_id = subjects.id INNER JOIN specia ON students.spe_id = specia.id where grades.id ='$idup'");
  
   $row = mysqli_fetch_array($select);

    $namestu9 = $row['namestu'];
    $namespe9 = $row['namespe'];
    $namesub9 = $row['namesub'];
    $gradeis9 = $row['gradeis'];

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
<form method="post"><input type="hidden" name="idup" value="<?php echo $idup ?>">
 
        <select name="sub_id">
            <!--<?php echo $namesub9;?> -->
            
            <?php
            $sqll = "SELECT id, namesub FROM subjects";
            $result = $conn->query($sqll);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['namesub'] . "</option>";
            }
            ?>
        </select>
        <select name="stu_id">
             <!--<?php echo $namestu9;?>-->
        
            <?php
            $sqll = "SELECT id, namestu FROM students";
            $result = $conn->query($sqll);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['namestu'] . "</option>";
            }
            ?>
        </select>
        <select name="spe_id">
       <!-- <?php echo $namespe9?>-->
          
            <?php
            $sqll = "SELECT id, namespe FROM specia";
            $result = $conn->query($sqll);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['namespe'] . "</option>";
            }
            ?>
        </select>
        
       <input name="gradeis" type="text" value="" placeholder="ادخل درجة الطالب" required>
    <input name="update" type="submit" value="تعديل"></form>
    
<?php
}
if (isset($_POST['update'])) {
    $idup = $_POST['idup'];
    $namestu2 = $_POST['stu_id'];
    $namespe2 = $_POST['spe_id'];
    $namesub2 = $_POST['sub_id'];
    $gradeis2 = $_POST['gradeis'];
    $sql = "UPDATE `grades` SET `gradeis`='$gradeis2' , `stu_id`='$namestu2', `sub_id`='$namesub2' ,`spe_id`='$namespe2' WHERE id='$idup'";
    mysqli_query($conn, $sql);
    header('location: kntrol.php');
}

?>