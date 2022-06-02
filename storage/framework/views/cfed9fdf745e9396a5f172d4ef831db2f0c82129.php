<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Jesco - Fashion eCommerce Invoice</title>

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media  only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title">
									<img width=80 src="https://i.postimg.cc/Jh6wGgWw/logo.png" alt="Company logo"/>
								</td>
								
								<td>
									Invoice #: <?php echo e($billing_details->order_id); ?><br />
									Created: <?php echo e($billing_details->created_at->format('d-M-Y')); ?>

								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="4">
						<table>
							<tr>
								<td>
									<?php echo e($billing_details->address); ?>

								</td>

								<td>
									<?php echo e($billing_details->company); ?><br />
									<?php echo e($billing_details->name); ?><br />
									<?php echo e($billing_details->email); ?>

								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>
					<td colspan="3">
						<?php
							if($orders->payment_method == 1){
								echo 'Cash on Delivery';
							}
							else if($orders->payment_method == 2){
								echo 'SSLCommerz';
							}
							else{
								echo 'Stripe';
							}
						?>
					</td>
				</tr>
				<tr>
					<td height="20"></td>
				</tr>
				<tr class="heading">
					<td>Item</td>
					<td>Price</td>
					<td>Quantity</td>
					<td>Subtotal</td>
				</tr>
				<?php
					$total = 0;
				?>

				<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
					<tr class="item">
						<td><?php echo e($product->product->product_name); ?></td>
						<td>BDT <?php echo e($product->product_price); ?></td>
						<td><?php echo e($product->quantity); ?></td>
						<td><?php echo e($product->product_price*$product->quantity); ?></td>
					</tr>

					<?php
						$total += $product->product_price*$product->quantity;
					?>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				<tr>
					<td height="20"></td></td>
				</tr>

				<tr class="total">
					<td></td>

					<td colspan="3">Discount: BDT <?php echo e($orders->discount); ?></td>
				</tr>
				<tr class="total">
					<td></td>

					<td colspan="3">Delivery Charge: BDT <?php echo e($orders->delivery_charge); ?></td>
				</tr>
				<tr class="total">
					<td></td>

					<td colspan="3">Total: BDT <?php echo e(($total - $orders->discount) + $orders->delivery_charge); ?></td>
				</tr>
			</table>
		</div>
	</body>
</html>
<?php /**PATH C:\Users\JUMANA\Laravel\spider\resources\views/invoice/invoice.blade.php ENDPATH**/ ?>