<?php 

require_once('../bootstrap.php');
include( __DIR__ . '/common/_head.php');
$menu_left = "color_list";

if(isset($adminaccount)) {

?>
<div class="wrapper">
    <?php include( __DIR__ . '/common/_menu.php'); ?>
    <div class="right">
        <h2>顏色清單</h2>
        <h3><a href="color_add.php" class="btn">新增</a></h3>
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

            $resultsPerPage = 15;

            $pagerLayout = new Doctrine_Pager_Layout(
                      new Doctrine_Pager(
                      Doctrine_Query::create()
                      ->from('Color')
                      ->andwhere("is_active = ?", 1)
                      ->orderby('created_at  DESC')
                      ,
                      $currentPage,
                      $resultsPerPage
                      ),
                      new Doctrine_Pager_Range_Sliding(array(
                              'chunk' => 5
                      )),

                      $web.'/admin/color_list.php?page={%page_number}'
              );
              $pager = $pagerLayout->getPager();
              $datas = $pager->execute();

        ?>
        <div>
            <table>
                <tr>
                    <th>顏色</th>
                    <th>味道</th>
                    <th></th>
                    <th>色碼</th>
                    <th>動作</th>
                </tr>
                <?php foreach ($datas as $data) {?>
                <tr>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['smell']; ?></td>
                    <td><div style="background: <?php echo '#'.$data['color_code']; ?>" class="color"></div></td>
                    <td><?php echo $data['color_code']; ?></td>
                    <td>
                        <a href="color_edit.php?id=<?php echo $data['id']; ?>" ><i class="fa fa-pencil-square-o"></i></a>
                        <a href="color_del.php?id=<?php echo $data['id']; ?>" class="delete" ><i class="fa fa-trash-o"></i></a>
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
