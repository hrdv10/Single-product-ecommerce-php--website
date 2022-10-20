<?php
use Phppot\Config;

require_once __DIR__ . '/config/Config.php';
$configModel = new Config();
$configResult = $configModel->getProduct();
?>
<HTML>
<HEAD>
<TITLE>Ecommerce website </TITLE>
<link href="assets/css/style.css" type="text/css" rel="stylesheet" />
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
</HEAD>
<BODY>
	<div class="txt-heading">Single product eCommerce application</div>
	<div id="product-grid">
		<div class="product-item">
			<div>
				<img src="<?php echo $configResult["imageUrl"]; ?>">
			</div>
			<div class="product-tile-footer">
				<div class="product-title"><?php echo $configResult["name"]; ?></div>
				<div class="product-price"><?php echo "$ ".  number_format($configResult["price"],2); ?></div>
				<?php if(Config::DISPLAY_QUANTITY_INPUT == true){?><div
					class="quantity">
					<input type="text" class="product-quantity" id="productQuantity"
						name="quantity" value="1" size="2" />
				</div><?php }?>
				<div>
					<button name="data" id="btn" onClick="buynow();"
						class="btnAddAction">Buy Now</button>
				</div>
			</div>
		</div>
	</div>
	<div id="customer-detail">
		<div class="txt-heading">Customers Details</div>
		<div class="product-item">
			<form method="post" action="" id="checkout-form">
				<div class="row">
					<div class="form-label">
						Name: <span class="required error" id="first-name-info"></span>
					</div>
					<input class="input-box" type="text" name="first-name"
						id="first-name">
				</div>
				<div class="row">
					<div class="form-label">
						Email Address: <span class="required error" id="email-info"></span>
					</div>
					<input class="input-box" type="text" name="email" id="email">
				</div>
				<div class="row">
					<div id="inline-block">
						<img id="loader" src="images/spinner.svg" /> <input type="button"
							class="checkout" name="checkout" id="checkout-btn"
							value="Checkout" onClick="Checkout();">
					</div>
				</div>
			</form>
		</div>
	</div>
	<div id="mail-status"></div>
	<script src="assets/js/shop.js"></script>
</BODY>
</HTML>