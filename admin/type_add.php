<?php 

require_once('../bootstrap.php');
include( __DIR__ . '/common/_head.php');
$menu_left = "type_list";

if(isset($adminaccount)) {

    $type_name = isset($_POST['type_name']);
    $upload_dir =  "./images/";

    if(isset($_FILES['banner']['name'][0])) {
        $fileName = $_FILES['banner']['name'][0];
        $extend = strrchr($fileName, ".");
        $new_name = $type_name . $extend;
    }

    if($type_name){
        $dataTypes = new Type();
        $dataTypes->name                = $_POST['type_name'];

        if(move_uploaded_file($_FILES['banner']['tmp_name'][0], $upload_dir.$new_nameSt)){
           $dataTypes->banner           = $new_name;
        }
        $dataTypes->save();

        echo "<SCRIPT LANGUAGE='javascript'>";
        echo "alert('新增成功');";
        echo "window.location.replace('type_list.php')";
        echo "</SCRIPT>";
    }

?>
<div class="wrapper">
<?php include( __DIR__ . '/common/_menu.php'); ?>
<div class="right">
   <h2>商品種類新增</h2>
   <form method="POST"id="form">
       <table>
           <tr>
               <td>種類名稱</td>
               <td>
                   <input type="text" name="type_name" size="50" class="required" />
               </td>
           </tr>
           <tr>
               <td>Banner</td>
               <td><input type="file" name="banner[]" /></td>
           </tr>
           <tr>
               <td colspan="2"><input type="submit" title="新增" value="新增" class="button"/></td>
           </tr>

       </table>
   </form>
</div>
</div>
</body>
</html>
<?php
} else {
header('location:index_logout.php');
exit();
} 
?>
