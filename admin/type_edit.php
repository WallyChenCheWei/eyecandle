<?php 

require_once('../bootstrap.php');
include( __DIR__ . '/common/_head.php');
$menu_left = "type_list";

if(isset($adminaccount)) {


$id = $_GET['id'];

$qType = Doctrine_Query::create()
                ->from('Type')
                ->andwhere("id = ?", $id);
$dataType = $qType->fetchOne();
$upload_dir =  "./images/";


if(isset($_POST['id'])) {
    $type_name = $_POST['type_name'];
    $id        = (int) $_POST['id'];

    if(isset($_FILES['banner']['name'][0])) {
        $fileName = $_FILES['banner']['name'][0];
        $extend = strrchr($fileName, ".");
        $new_name = str_replace(" ","_",strtolower($type_name)) . $extend;
    }


    $data = Doctrine::getTable('Type')->find($id);
    $data->name              = $type_name;

    if(move_uploaded_file($_FILES['banner']['tmp_name'][0], $upload_dir.$new_name)){
       $data->banner           = $new_name;
    }
    $data->save();

    echo "<SCRIPT LANGUAGE='javascript'>";
    echo "alert('修改成功');";
    echo "window.location.replace('type_list.php')";
    echo "</SCRIPT>";

}

?>
<div class="wrapper">
  <?php include( __DIR__ . '/common/_menu.php'); ?>
  <div class="right">
      <h2>商品種類修改</h2>
      <form method="POST" enctype="multipart/form-data" id="form">
          <table>
              <tr>
                  <td>種類名稱</td>
                  <td id="type_name_list">
                      <input type="text" name="type_name" size="50" value="<?php echo $dataType['name']; ?>" class="required" />
                  </td>
                  <tr>
                       <td>Banner</td>
                       <td><input type="file" name="banner[]" /></td>
                   </tr>
              </tr>
              <tr>
                  <td colspan="2"><input type="hidden" name="id" value="<?php echo $dataType['id']; ?>" /><input type="submit" title="修改" value="修改" class="button"/></td>
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
