<?php 

require_once('../bootstrap.php');
include( __DIR__ . '/common/_head.php');
$menu_left = "product_list";

if(isset($_GET['type'])){
    $sql = 'type_id = '.$_GET['type'];
    $type_id = $_GET['type'];
}else{
    $type_id = '';
    $sql = 'is_active = 1';
    $all = '1';
}

if(isset($adminaccount)) {

?>
<div class="wrapper">
    <?php include( __DIR__ . '/common/_menu.php'); ?>
    <div class="right">
        <h2>商品清單</h2>
        <h3><a href="product_add.php" class="btn">新增</a></h3>
        <?php

            if(isset($_GET['page'])){
                $paramPage = $_GET['page'];
            }else{
                $paramPage = '';
            }

            if ($paramPage != NULL) {
              $currentPage = $paramPage;
            }else {
              $currentPage = 1;
            }

            $resultsPerPage = 10;

            $pagerLayout = new Doctrine_Pager_Layout(
                      new Doctrine_Pager(
                      Doctrine_Query::create()
                      ->from('Product p')
                      ->innerJoin('p.Type t ON p.type_id = t.id')
                      ->andwhere("is_active = ?", 1)
                      ->andwhere($sql)
//                      ->addorderby('is_soldout  ASC')
                      ->addorderby('created_at  DESC')
                      ,
                      $currentPage,
                      $resultsPerPage
                      ),
                      new Doctrine_Pager_Range_Sliding(array(
                              'chunk' => 5
                      )),

                      $web.'/admin/product_list.php?type='.$type_id.'&page={%page_number}'
              );
              $pager = $pagerLayout->getPager();
              $datas = $pager->execute();

//              $qColorPic = Doctrine_Query::create()
//                                    ->from('Product p')
//                      ->innerJoin('p.Type t ON p.type_id = t.id')
//                      ->andwhere("is_active = ?", 1)
//                      ->andwhere($sql)
//                      ->orderby('created_at  DESC');
//                    $dataColorPic = $qColorPic->fetchArray();
//
//              echo $qColorPic->getSQLQuery();

//print_r($datas);

              $qType = Doctrine_Query::create()
                            ->from('Type')
                            ->andwhere("is_active = ?", 1);
              $dataType = $qType->fetchArray();

        ?>
        <div class="product_type">
            <span><a href="product_list.php" <?php if($type_id==NULL){ echo 'class="type_active"';} ?>>All</a></span>
            <?php foreach($dataType as $data) { ?><span><a href="product_list.php?type=<?php echo $data['id']; ?>" <?php if($type_id==$data['id']){ echo 'class="type_active"'; } ?>><?php echo $data['name']; ?></a></span><?php } ?>
        </div>
        <div>
            <table>
                <tr>
                    <th>商品類型</th>
                    <th>商品名稱</th>
                    <th>商品顏色</th>
                    <th>價錢</th>
                    <th>動作</th>
                </tr>
                <?php foreach ($datas as $datas) {

                    $qColorPic = Doctrine_Query::create()
                                    ->from('ColorPic')
                                    ->andwhere("product_id = ?", $datas['id'])
                                    ->andwhere("is_active = ?", 1);
                    $dataColorPic = $qColorPic->fetchArray();
                ?>
                <tr <?php if($datas['is_soldout']==1){ echo 'class="soldout_active"';} ?>>
                    <td><?php echo $datas['Type']['name']; ?></td>
                    <td><a href="product_detail.php?id=<?php echo $datas['id']; ?>" ><?php echo $datas['name']; ?></a></td>     
                    <td class="icon"><?php foreach ($dataColorPic as $dataColorPic) {
                        $qColor = Doctrine_Query::create()
                                ->from('Color')
                                ->andwhere("id = ?", $dataColorPic['color_id']);
                        $dataColor = $qColor->fetchOne();?>
                        <?php echo $dataColor['name'] ?>
                    <a href="productpic_del.php?id=<?php echo $dataColorPic['id']; ?>&type=<?php echo $datas['type_id']; ?>" class="delete" ><i class="fa fa-trash-o del"></i></a>
                    <?php if($dataColorPic['is_cover']==0){ ?>
                    <a href="productpic_cover.php?id=<?php echo $dataColorPic['id']; ?>&product_id=<?php echo $datas['id']; ?>" title="設為封面" ><i class="fa fa-eye cover"></i></a>
                    <?php } ?>
                    <br>
                    <?php } ?>
                    </td>
                    <td><?php echo $datas['price']; ?></td>
                    <td>
                        <a href="product_edit.php?id=<?php echo $datas['id']; ?>"><i class="fa fa-pencil-square-o"></i></a>
                        <?php if($datas['is_soldout']==0){ ?>
                        <a href="product_soldout.php?id=<?php echo $datas['id']; ?>&is_soldout=<?php echo $datas['is_soldout']; ?>" ><i class="fa fa-smile-o"></i></a>
                        <?php }else{ ?>
                        <a href="product_soldout.php?id=<?php echo $datas['id']; ?>&is_soldout=<?php echo $datas['is_soldout']; ?>" ><i class="fa fa-frown-o soldout"></i></a>
                        <?php } ?>
                        <a href="product_del.php?id=<?php echo $datas['id']; ?>&all=<?php echo $all; ?>" class="delete" ><i class="fa fa-trash-o"></i></a>

                    </td>
                </tr>
                <?php } ?>
            </table>
            <div class="page">
                <?php
                // First page
                $pagerLayout->setTemplate('<a href="{%url}" title="第一頁" >&laquo; 第一頁</a>');
                $pagerLayout->addMaskReplacement('page', '&laquo;', true);
                $options['page_number'] = $pager->getFirstPage();
                echo $pagerLayout->processPage($options);

                // Previous page
                $pagerLayout->setTemplate('<a href="{%url}" title="前一頁">&laquo; 上一頁</a>');
                $pagerLayout->addMaskReplacement('page', '&lsaquo;', true);
                $options['page_number'] = $pager->getPreviousPage();
                echo $pagerLayout->processPage($options);

                // Pages listing
                $pagerLayout->setTemplate('<a href="{%url}" class="number" >{%page}</a>');
                $pagerLayout->setSelectedTemplate('<a href="javascript:;" class="number current" >{%page}</a>');
                $pagerLayout->removeMaskReplacement('page');
                $pagerLayout->display();
                $pagerLayout->setSelectedTemplate('');

                // Next page
                $pagerLayout->setTemplate('<a href="{%url}" title="下一頁">下一頁 &raquo;</a>');
                $pagerLayout->addMaskReplacement('page', '&laquo;', true);
                $options['page_number'] = $pager->getNextPage();
                echo $pagerLayout->processPage($options);

                // Last page
                $pagerLayout->setTemplate('<a href="{%url}" title="最末頁">最末頁 &raquo;</a>');
                $pagerLayout->addMaskReplacement('page', '&lsaquo;', true);
                $options['page_number'] = $pager->getLastPage();
                echo $pagerLayout->processPage($options);
                ?>
            </div>
        </div>
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
