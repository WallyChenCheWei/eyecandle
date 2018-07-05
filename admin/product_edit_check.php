<?php require_once('../bootstrap.php');

if(isset($adminaccount)) {

  $id  = (int) $_POST['id'];
  $name = $_POST['name'];
  $type_id = $_POST['type_id'];
  $price = $_POST['price'];
  $weight = $_POST['weight'];
  $size = $_POST['size'];
  $burning = $_POST['burning'];
  $material = $_POST['material'];
  $detail = $_POST['detail'];
  $method = $_POST['method'];

  $dataProduct = Doctrine::getTable('Product')->find($id);
  $dataProduct->name            = $name;

  $upload_dir =  "./pic/";

  if(isset($_FILES['sticker']['name'][0])) {
    $fileNameSt = $_FILES['sticker']['name'][0];
    $extendSt = strrchr($fileNameSt, ".");
    $new_nameSt = $id . "_sticker" . $extendSt;
  }

  if(isset($_FILES['cover_sticker']['name'][0])) {
    $fileNameCover_St = $_FILES['cover_sticker']['name'][0];
    $extendCover_St = strrchr($fileNameCover_St, ".");
    $new_nameCover_St = $dataProduct->id . "_cover_sticker" . $extendCover_St;
  }
 
  if(move_uploaded_file($_FILES['sticker']['tmp_name'][0], $upload_dir.$new_nameSt)){
    $dataProduct->sticker           = $new_nameSt;
  }
  if(move_uploaded_file($_FILES['cover_sticker']['tmp_name'][0], $upload_dir.$new_nameCover_St)){
    $dataProduct->cover_sticker           = $new_nameCover_St;
  }
  $dataProduct->type_id         = $type_id;
  $dataProduct->price           = $price;
  $dataProduct->weight          = $weight;
  $dataProduct->size            = $size;
  $dataProduct->burning         = $burning;
  $dataProduct->material        = $material;
  $dataProduct->detail          = nl2br($detail);
  $dataProduct->method          = nl2br($method);
  $dataProduct->save();

  $limitedext = array(".gif",".jpg",".jpeg",".png");
  $countFileUpload = count($_FILES['small_pic']['name']);

  if(($_FILES['small_pic']['name'][0]==NULL)&&($_FILES['big_pic']['name'][0]==NULL)) {
    echo "<SCRIPT LANGUAGE='javascript'>";
    echo "alert('修改成功');";
    echo "window.location.replace('product_list.php?type=$type_id')";
    echo "</SCRIPT>";

  }else{
    $j = 1;
    for($i = 1; $i <= $countFileUpload; $i++) {
      if($_FILES['small_pic']['name'][$i-1] != '') {
        $fileNameS = $_FILES['small_pic']['name'][$i-1];
        $fileNameB = $_FILES['big_pic']['name'][$i-1];
        $extendS = strrchr($fileNameS, ".");
        $extendB = strrchr($fileNameB, ".");
        
        $qColor = Doctrine_Query::create()
                        ->from('Color')
                        ->andwhere("id = ?", $_POST['color_id']);
        $dataColor = $qColor->fetchOne();
        
        $new_nameS = $dataProduct->id."_s_c".$dataColor->id.$extendS;
        $new_nameB = $dataProduct->id."_b_c".$dataColor->id.$extendB;

        if (!(in_array(strtolower($extendS),$limitedext))) {
          echo "<SCRIPT LANGUAGE='javascript'>";
          echo "alert('檔案副檔名有誤（只允許GIF和JPEG檔）');";
          echo "history.back();";
          echo "</SCRIPT>";
          exit();

        }
        if (move_uploaded_file($_FILES['small_pic']['tmp_name'][$i-1], $upload_dir.$new_nameS)
          &&move_uploaded_file($_FILES['big_pic']['tmp_name'][$i-1], $upload_dir.$new_nameB)) {


          $dataColorPic = new ColorPic();
          $dataColorPic->product_id              = $dataProduct->id;
          $dataColorPic->color_id                = $_POST['color_id'][$i-1];
          $dataColorPic->small_pic               = $new_nameS;
          $dataColorPic->big_pic                 = $new_nameB;
          $dataColorPic->save();
          $j++;

        }else{
          echo "<SCRIPT LANGUAGE='javascript'>";
          echo "alert('上傳失敗');";
          echo "history.back();";
          echo "</SCRIPT>";
          exit();

        }
      }
    }
    echo "<SCRIPT LANGUAGE='javascript'>";
    echo "alert('修改成功');";
    echo "window.location.replace('product_list.php?type=$type_id')";
    echo "</SCRIPT>";
  }
  
} else {
  header('location:index_logout.php');
  exit();
}
?>