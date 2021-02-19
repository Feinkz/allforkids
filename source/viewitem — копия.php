<?php
require_once 'header.php';?>
 <link href="../css/layout.css" rel="stylesheet" type="text/css" />
 <link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php $id=$_GET["id"];
  $result = queryMysql("SELECT * FROM clothes WHERE id=".$id);
    $row = $result->fetch_array(MYSQLI_ASSOC);
  $idgalery=$row['id_galery'];

?>
<div class='viewcontent'>
     <div class="backbutton"> 
      <a href="#" onclick="history.back()">Назад</a>
    </div>
    
    <div class="Limage">
        <div class="Bigview"></div>
        <div class="listimg">
         <?php
        $res=queryMysql("SELECT * FROM images WHERE id_galery=".$row['id_galery']); 
        
        $num=$res->num_rows;
        for ($j=0; $j<$num; ++$j)
        {
           $im=$res->fetch_array(MYSQLI_ASSOC);
            echo "<div class='itoflist'> <img src='../images/".$im['path_images']."'>";
            echo "</div>";
        };
          ?>
        </div>
       
    
    </div>
   <div class="description">
 <?php  echo $row['description']; ?>
    </div>
</div>
</body>
</html>
