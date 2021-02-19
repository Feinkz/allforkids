<?php
require_once 'header.php';?>
 <meta charset="utf-8">
 <link href="../css/layout.css" rel="stylesheet" type="text/css" />
 <link href="../css/style.css" rel="stylesheet" type="text/css" />

<div class='content'>
    <div class="tablica">
      <?php 
        $result = queryMysql("SELECT * FROM clothes WHERE sex='boys'");
        $num = $result->num_rows;
        for ($j=0; $j<$num; ++$j)
        {
           $row = $result->fetch_array(MYSQLI_ASSOC);
            $name= $row['name'];
            $Price= $row['Price'];
            $id=$row['id'];
            echo "<div class='item-table'><b>".$name."</b>"; 
            $result2= queryMysql("SELECT * FROM images WHERE id_galery=$id");
            $row2=$result2->fetch_array(MYSQLI_ASSOC);
            echo "<div class='image'><a href='../source/viewitem.php?id=".$id."'>
            <img src='../images/".$row2['path_images']."'></a></div>";
            echo "<b>".$Price."  тенге<b></div>";
         
        }
        
            ?>
</div>
</body>
</html>
