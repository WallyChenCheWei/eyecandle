<div class="left">
    <div><img src="../images/logo.png"></div>
    <a href="admin_passedit.php" class="btn">修改密碼</a>
    <a href="index_logout.php" title="Logout" class="btn">登出</a>
    <ul>
        <li><a href="#">清單</a>
            <ul <?php if(($menu_left=='user_list')||($menu_left=='cart_list')){ echo 'class="list_active"'; } ?>>
                <li><a href="user_list.php" <?php if($menu_left=='user_list'){ echo 'class="menu_active"'; } ?>>會員清單</a></li>
                <li><a href="cart_list.php" <?php if($menu_left=='cart_list'){ echo 'class="menu_active"'; } ?>>購物車清單</a></li>
            </ul>
        </li>
        <li><a href="#">商品種類＆顏色</a>
            <ul <?php if(($menu_left=='product_list')||($menu_left=='type_list')||($menu_left=='color_list')){ echo 'class="list_active"'; } ?>>
                <li><a href="product_list.php" <?php if($menu_left=='product_list'){ echo 'class="menu_active"'; } ?>>商品清單</a></li>
                <li><a href="type_list.php" <?php if($menu_left=='type_list'){ echo 'class="menu_active"'; } ?>>商品種類</a></li>
                <li><a href="color_list.php" <?php if($menu_left=='color_list'){ echo 'class="menu_active"'; } ?>>商品顏色</a></li>
            </ul>       
        </li>

    </ul>
</div>

