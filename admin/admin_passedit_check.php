<?php require_once('../bootstrap.php');

if(isset($adminaccount)) {

    $password = $_POST['password'];
    $qAdmin = Doctrine_Query::create()
                    ->from('Admin')
                    ->addwhere("username = ?", $adminaccount);
    $dataAdmin = $qAdmin->fetchOne();

    $data = Doctrine::getTable('Admin')->find($dataAdmin->id);
    $data->password      = $password;
    $data->save();

    echo "<SCRIPT LANGUAGE='javascript'>";
    echo "alert('修改成功');";
    echo "window.location.replace('user_list.php')";
    echo "</SCRIPT>";

//    $_SESSION['adminaccount']=NULL;
//    unset($_SESSION['adminaccount']);
//
//    header("location:index.php");
//    exit();
} else {
    header('location:index_logout.php');
    exit();
} 
?>