<?php include('common/_head.php');

if(isset($_GET['id'])) {
	$id = $_GET['id'];
}

$qProduct = Doctrine_Query::create()
	->from('Product p')
	->innerJoin('p.Type t ON t.id = p.type_id')
	->addwhere("id = ?", $id)
	->addwhere("is_active = ?", 1);
$dataProduct = $qProduct->fetchOne();

$qColorPic = Doctrine_Query::create()
	->from('ColorPic cp')
	->innerJoin('cp.Color c ON c.id = cp.color_id')
	->addwhere('product_id=?',$dataProduct->id)
	->addwhere("is_active = ?", 1)
	->orderby('is_cover  DESC')
	->limit(4);
$dataColorPic = $qColorPic->fetchArray();

?>
<!-- 左邊區塊 -->
<div class="infoBoard">
	<div class="infoContnet">
		<h4>使用方法</h4>
		<p><?= $dataProduct['method']; ?></p>
		<table>
			<?php foreach($dataColorPic as $data) {?>
			<tr>
				<td><?= $data['Color']['name']; ?></td>
				<td><?= $data['Color']['smell']; ?></td>
			</tr>
			<?php } ?>
		</table>
		<a class="closeBtn" href="javascript:"></a>
	</div>	
</div>
<div class="contentL">
	<div class="product">
		<?php if($dataProduct['sticker']){ ?>
		<div class="sticker"><img src="pic/<?= $dataProduct['sticker']; ?>" alt=""></div>
		<?php } ?>
		<ul>
			<?php foreach($dataColorPic as $data) {?>
				<li><img src="pic/<?= $data['big_pic']; ?>" alt=""></li>
			<?php } ?>
		</ul>
	</div>
	<a class="prev" href="javascript:" onclick="history.back()">回上層</a>
	<div class="detail sliderBar">
		<h3><?= $dataProduct['Type']['name']; ?></h3>
		<h4><?= $dataProduct['name']; ?></h4>
		<p><?= $dataProduct['detail']; ?>
		<div class="price">NT<?= $dataProduct['price']; ?></div>
		<a class="infoBtn" href="javascript:"><img src="images/infoBtn.png" alt=""></a>
		<div class="selectGroup">
			<ul class="colorGroup">
				<?php foreach($dataColorPic as $data) {?>
					<li <?php if($data['is_cover']==1){ echo "class='nowColor'"; } ?> data-c_id="<?= $data['color_id'] ;?>" data-id="<?= $data['id'] ;?>" >
						<a style="background: <?php echo '#'.$data['Color']['color_code']; ?>" href="javascript:"></a></li>'
				<?php } ?>
			</ul>
			<div class="arrowFrame">
				<div class="arrow"></div>
			</div>
		</div>
		<div class="numberGroup">
			<a href="javascript:" class="minusBtn"><img src="images/minusBtn.png" alt=""></a>
			<span class="number">1</span>
			<a href="javascript:" class="plusBtn"><img src="images/plusBtn.png" alt=""></a>
		</div>
		<div class="btnGroup">
			<?php if($dataProduct['is_soldout']==0){ ?>
			<a class="addcartBtn" data-id="<?= $dataProduct['id'] ;?>" href="javascript:;"><span>加入購物車</span></a>
			<?php }else{ ?>
			<div class="soldOut">完售</div>
			<?php } ?>
			<a data-id="<?= $dataProduct['id']; ?>" class="likeBtn wishList" href="javascript:">
				<?php
				$status = 'fa-heart-o';
				if(isset($_SESSION['wishlist'][$dataProduct['id']])){
					$status = 'fa-heart';
				}
				?>
				<i class="fa <?php echo $status; ?>"></i></a>
		</div>
		<div class="notice">	
			<div class="iconB"><i class="fa fa-truck"></i></div>
			<p>於購物系統選擇貨到付款方式，配送前以電話聯絡收件人告知送達時間及欲收款金額。商品送達，同時收取貨款。</p>
		</div>
		<div class="info">產品資訊</div>
		<div class="unitFrame">
			<div class="icon"><img src="images/weight.png" alt=""></div><div class="unit">重量</div><div class="unitVal"><?= $dataProduct['weight']; ?> 克</div>
			<div class="icon"><img src="images/size.png" alt=""></div><div class="unit">尺寸</div><div class="unitVal"><?= $dataProduct['size']; ?> 公分</div>
			<div class="icon"><img src="images/time.png" alt=""></div><div class="unit">燃燒時間</div><div class="unitVal"><?= $dataProduct['burning']; ?> 小時</div>
		</div>
	</div>
<!-- 右邊區塊 -->
<?php include('common/_menu.php'); ?>
<!-- JS -->
<?php include('common/_footer.php'); ?>
<script>



</script>
