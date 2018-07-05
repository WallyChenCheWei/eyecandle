<?php 

require_once('../bootstrap.php');
include( __DIR__ . '/common/_head.php');
$menu_left = "cart_list";

if(isset($adminaccount)) {

?>
<div class="wrapper">
    <?php include( __DIR__ . '/common/_menu.php'); ?>
    <div class="right">
        <h2>購物車清單</h2>
        <div>
            <form class="form" method="POST">
                <input type="text" name="search" size="50" class="required" placeholder="輸入購物編號或Email"/>
                <input type="submit" title="搜尋" value="搜尋" class="button" />
                <input type="button" title="還原" value="還原" onclick="location.href='cart_list.php'" />
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

            $resultsPerPage = 15;
            
            if(isset($_POST['search'])){
                $search = $_POST['search'];
            }else{
                $search = '';
            }

            $pagerLayout = new Doctrine_Pager_Layout(
                      new Doctrine_Pager(
                      Doctrine_Query::create()
                      ->from('Cart c')
                      ->innerJoin('c.User u ON u.id = c.user_id')
//                      ->innerJoin('c.Product p ON p.id = c.product_id')
//                      ->innerJoin('c.Color co ON co.id = c.color_id')
                      ->orwhere('email LIKE ?' , '%'.$search.'%')
                      ->orwhere('order_name LIKE ?' , '%'.$search.'%')
                      ->andwhere("is_active = ?", 1)
                      ->orderby('created_at  DESC')
                      ,
                      $currentPage,
                      $resultsPerPage
                      ),
                      new Doctrine_Pager_Range_Sliding(array(
                              'chunk' => 5
                      )),

                      $web.'/admin/cart_list.php?page={%page_number}'
              );
              $pager = $pagerLayout->getPager();
              $datas = $pager->execute();

        ?>
        <div>
            <table>
                <tr>         
                    <th>Email</th>
                    <th>購物編號</th>
                    <th>總計</th>
                    <th>姓名</th>
                    <th>送貨方式</th>
                    <th>送貨地址</th>
                    <th>電話</th>  
                    <th>狀態</th>
                </tr>
                <?php foreach ($datas as $data) {

                    switch($data['status']){
                        case 'paid':
                            $status = '<a href="cart_check.php?id='.$data['id'].'">出貨</a>';
                            break;
                        case 'send':
                            $status = '已出貨';
                            break;
                    }
                    
                ?>
                <tr class="collect">
                    
                    <td><?php echo $data['User']['email']; ?></td>
                    <td><?php echo $data['order_name']; ?></td>
                    <td><?php echo $data['total']; ?></td>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['send_option']; ?></td>
                    <td><?php echo $data['address']; ?></td>
                    <td><?php echo $data['tel']; ?></td>
                    <td><?php echo $status; ?></td>
                </tr>

                
                <tr class="collectCotent">
                    <td colspan="2">商品名稱</td>
                    <td colspan="2">顏色</td>
                    <td colspan="2">數量</td>
                    <td colspan="2">總計</td>
                </tr>
                <?php 
                
                $qCartList = Doctrine_Query::create()
                            ->from('CartList cl')
                            ->innerJoin('cl.Product p ON p.id = cl.product_id')
                            ->innerJoin('cl.Color co ON co.id = cl.color_id')
                            ->andwhere("cart_id = ?", $data['id'])
                            ->andwhere("is_active = ?", 1);
                $dataCartList = $qCartList->fetchArray();
        
                foreach ($dataCartList as $datac) {
                ?>
                <tr class="collectCotent">
                    <td colspan="2"><?php echo $datac['Product']['name']; ?></td>
                    <td colspan="2"><?php echo $datac['Color']['name']; ?></td>
                    <td colspan="2"><?php echo $datac['num']; ?></td>
                    <td colspan="2"><?php echo $datac['total']; ?></td>
                </tr>
                <?php }} ?>
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
            var tr = $(this);
            var next = tr.next();
            while(next.hasClass('collectCotent')){
                next.toggle();
                next = next.next();
            }

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
