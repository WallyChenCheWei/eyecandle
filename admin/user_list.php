<?php 

require_once('../bootstrap.php');
include( __DIR__ . '/common/_head.php');
$menu_left = "user_list"; 

if(isset($adminaccount)) {

?>
<div class="wrapper">  
    <?php include( __DIR__ . '/common/_menu.php'); ?>
    <div class="right">
        <h2>會員清單</h2>
        <div>
            <form class="form" method="POST">
                <input type="text" name="search" size="50" placeholder="輸入姓名或Email"/>
                <input type="submit" title="搜尋" value="搜尋" class="button" />
                <input type="button" title="還原" value="還原" onclick="location.href='user_list.php'" />
            </form>
        </div>
        <br>
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


            if(isset($_POST['search'])){
                $search = $_POST['search'];
            }else{
                $search = NULL;
            }

            $pagerLayout = new Doctrine_Pager_Layout(
                      new Doctrine_Pager(
                      Doctrine_Query::create()
                      ->from('User u')
                      ->orwhere('u.is_active = 1 AND email LIKE ?' , '%'.$search.'%')
                      ->orwhere('u.is_active = 1 AND name LIKE ?' , '%'.$search.'%')
                      ->addWhere("is_active = ?", 1)
                      ->orderby('created_at  DESC')
                      ,
                      $currentPage,
                      $resultsPerPage
                      ),
                      new Doctrine_Pager_Range_Sliding(array(
                              'chunk' => 5
                      )),

                      $web.'/admin/user_list.php?page={%page_number}'
            );
            $pager = $pagerLayout->getPager();
            $datas = $pager->execute();

        ?>
        <div>
            <table>
                <tr>
                    <th>來源</th>
                    <th>Email</th>
                    <th>姓名</th>
                    <th>電話</th>
                    <th>地址</th>
                    <th>加入網站日期</th>
                </tr>
                <?php foreach ($datas as $data) {?>
                <tr class="collect">
                    <td><?php echo $data['social']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['tel']; ?></td>
                    <td><?php echo $data['address']; ?></td>
                    <td><?php echo date("Y/m/d",strtotime($data['created_at'])); ?></td>
                </tr>
                <?php
                 $qCollect = Doctrine_Query::create()
                                ->from('Collect')
                                ->andwhere("user_id = ?", $data->id)
                                ->andwhere("is_active = ?", 1);
                $dataCollect = $qCollect->fetchArray();
                $countCollect = $qCollect->Count();

                

                ?>
                <tr class="collectCotent">
                    <td><b>收藏清單</b></td>
                    <td colspan="5">
                        
                        
                <?php 
                if($countCollect==0){
                    echo '無';
                }
                foreach ($dataCollect as $dataC) {

                    $qProduct = Doctrine_Query::create()
                                    ->from('Product')
                                    ->andwhere("id = ?", $dataC['product_id']);
                    $dataProduct = $qProduct->fetchOne();

                    $qColorPic = Doctrine_Query::create()
                                ->from('ColorPic')
                                ->addwhere('product_id=?',$dataC['product_id'])
                                ->addwhere("is_active = ?", 1)
                                ->limit(1);

                    $dataColorPic = $qColorPic->fetchOne();
                
                echo $dataProduct['name']; ?><img src="../pic/<?php echo $dataColorPic['small_pic']; ?>"><br><?php } ?></td>
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
<script type="text/javascript">
    $(function() {
        $('.collect').click(function() {
//            $(this).siblings('.collectCotent').hide();
            $(this).next('.collectCotent').slideToggle();
            
        });

    });

</script>
</body>
</html>
<?php 
} else {
    header('location:index_logout.php');
    exit();
} 
?>
