<?php
require_once 'header.php';?>
 <link href="../css/layout.css" rel="stylesheet" type="text/css" />
 <link href="../css/style.css" rel="stylesheet" type="text/css" />
<script src="../lib/jquery/jquery-3.2.1.min.js"></script>
<script src="../lib/lightslider.js"></script>

<script>
    $(document).ready(function(){
        $("content-slider").lightSlider({
            loop:true,
            keyPress:true
        });
        $('#image-galery').lightSlider({
            gallery:true,
            item:1,
            thumbItem:9,
            slideMargin:0,
            speed:500,
            auto:true,
            loop:true,
            onSliderLoad: function() {
                $('#image-galery').removeClass('cS-hidden');
            }
        });
    });

</script>

<?php $id=$_GET["id"];
  $result = queryMysql("SELECT * FROM clothes WHERE id=".$id);
    $row = $result->fetch_array(MYSQLI_ASSOC);
//  $idgalery=$row['id'];

?>
<div class='viewcontent'>
     <div class="backbutton"> 
      <a href="#" onclick="history.back()">Назад</a>
    </div>
    
    <div class="Limage">
       
       <div class="item">
        <div class="clearfix" style="max-width:474px;">
           <ul id="image-galery" class="gallery list-unstyled cS-hidden">
            <?php
               $res=queryMysql("SELECT * FROM images WHERE id_galery=".$id);
               $num=$res->num_rows;
               for ($j=0; $j<$num; ++$j) {
                   $r=$res->fetch_array(MYSQLI_ASSOC);
                   echo "<li data-thumb='../images/".$r['path_images']."'>";
                   echo "<img src='../images/".$r['path_images']."'/>";
                   echo "</li>";
               }
               
              ?> 
                           
            </ul>
           
           </div>
        
        </div>
    
    </div>
   <div class="description">
 <?php 
       
       echo $row['description']; ?>
    </div>
</div>
</body>
</html>
