<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
       
        <link href="../css/layout.css" rel="stylesheet" type="text/css" />
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <script src="../lib/tinymce/tinymce.min.js"></script>   
        <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: "emoticons",
            toolbar: "emoticons"
        });
        </script>
    </head>
    <body>
        <form action="index.php" method="POST" name="upload_form" enctype="multipart/form-data">
        <pre>
      Наименование: <input type="text" name="title_item">
      Цена:         <input type="text" name="Price">
      Пол:          <select name="sex" size="1">
                    <option value="boys">Мальчики</option>
                    <option value="girls">Девочки</option>
                    </select>
      Описание:     <textarea id="mytextarea" rows="10" cols="45" name="text"></textarea>
      Выберите фото:<input type="file" name="file[]" multiple/>    
                    <input type="submit"  value="Загрузить" />
        </pre>
        </form>
   <?php 
    require_once '../source/functions.php';
        
        if (isset ($_POST['title_item']) && 
            isset($_POST['Price']) &&
            isset($_POST['sex']) &&
            isset($_POST['text']) &&
            isset($_FILES['file'])){
            $title_item=get_post($connection, 'title_item');
            $Price=get_post($connection, 'Price');
            $sex=get_post($connection, 'sex');
            $text=get_post($connection, 'text');
            $uploaddir='../images/';
            $result=queryMysql("INSERT INTO clothes VALUES (NULL, '$title_item', '$sex', '$text', '$Price')");
            $insertID= $connection->insert_id;
            
        if (isset($_FILES['file']))
        {
    for ($i=0; $i<count($_FILES['file']['name']); ++$i){
    echo "<pre>".$_FILES['file']['name'][$i]."</pre>";
    $imagename=$_FILES['file']['name'][$i];
    move_uploaded_file ($_FILES['file']['tmp_name'][$i], $uploaddir.basename($_FILES['file']['name'][$i]));
    $result=queryMysql("INSERT INTO images VALUES (NULL, '$imagename', NULL, '$insertID')");
    echo "<img src='".$uploaddir.$imagename."'>";
    
  

}
        }
        header ('Location: .');}
   
        
        function get_post($connection, $var)
        {
            return $connection-> real_escape_string($_POST[$var]);
        }
 ?>
    </body>
</html>