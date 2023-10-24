<?php

include('conn.php');
if (isset($_POST['add'])) {
    while ($row< $_POST['grd']) {
        $row++;
        $spe_id = $_POST['spe_id'];
        $gradeis = $_POST['gradeis'.$row];
            // استعلام إضافة البيانات إلى الجدول `students`
           $sqls = "INSERT INTO `specia`(`id`, `namespe`, `col_id`) VALUES (NULL, '$gradeis','$spe_id');";
       //$sqls = "INSERT INTO `students` (`id`, `namestu`, `password`, `spe_id`, `un_number`, `level`, `un_id`) VALUES (NULL, 'nahari', '12345', '7', '12345', '2', '4');";
       mysqli_query($conn, $sqls);
    }
    header('location: spe.php');
        echo' <div class="content">';
        echo'<table border="1">';
       
    }
    $select = mysqli_query($conn, "SELECT * from specia");
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
            <option value="">الكلية</option>
            <?php
            $sqll = "SELECT id, namecol FROM college";
            $result = $conn->query($sqll);

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['namecol'] . "</option>";
            }
            ?>
        </select>
       
        <input type="number" name="grd" id="children"  onchange="showChildNames()" placeholder="عدد المواد">
        <input  name='add' type="submit" value="إضافة المقرر">
        <br>
       <div class="AddNameSub" id="child-names" style="display:none;"></div>
       
       <div class="content">
        <table border="1">
        <th>id</th>
        <th>التخصص</th>  
            <th>اسم الجامعة</th>
              
            <tbody>
                <?php 
               
            
                    while ($row = mysqli_fetch_array($select)) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['namespe'] . '</td>';
                        echo '<td>' . $row['col_id'] . '</td>';
                        
                        echo '</tr>';
                    
        
}
?>
<?php

if (isset($_POST['delet'])) {
    $idel = $_POST['idel'];
    $sqls = "DELETE FROM specia WHERE id = '$idel'";
    mysqli_query($conn, $sqls);
    header('location: spe.php');
}


?>