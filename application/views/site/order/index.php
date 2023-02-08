<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 clearpaddingr">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trang chủ</a></li>
			<li class="active">Thanh toán</li>
		</ol>
		<?php if (isset($message) && !empty($message)) { ?>
			<h4 style="color:green;text-align: center;margin-top: 30px"><?php echo $message; ?></h4>
		<?php } ?>
		<div class="col-md-8 clearpadding">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Thông tin thanh toán</h3>
				</div>
				<div class="panel-body">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 clearpadding">
						<h3>Tổng số tiền thanh toán là: <?php echo number_format($total_amount); ?> VNĐ</h3>
						<form enctype="multipart/form-data" method="post">
							<table class="table">
								<tbody>
									<tr>
										<td style="width: 100px">Họ và tên</td>
										<td><input class="form-control" type="text" value="<?php echo (!empty($user)) ? $user->name : ''; ?>" name="name"><?php echo form_error('name'); ?></td>

									</tr>
									<tr>
										<td>Email</td>
										<td><input class="form-control" name="email" type="text" value="<?php echo (!empty($user)) ? $user->email : ''; ?>"><?php echo form_error('email'); ?></td>
									</tr>
									<tr>
										<td>Số điện thoại</td>
										<td><input class="form-control" name="phone" type="text" value="<?php echo (!empty($user)) ? $user->phone : ''; ?>"><?php echo form_error('phone'); ?></td>
									</tr>
									<tr>
										<td>Địa chỉ</td>
										<td><input class="form-control" name="address" type="text" value="<?php echo (!empty($user)) ? $user->address : ''; ?>"><?php echo form_error('address'); ?></td>
									</tr>
									<tr>
										<td>Lời nhắn</td>
										<td><textarea class="form-control" name="message" id="" cols="50" rows="4"></textarea><?php echo form_error('message'); ?></td>
									</tr>
									<tr>
										<td>Hình thức thanh toán</td>
										<td>
											<div class="col-md-3" style="cursor:pointer">
												<label for="cash" style="cursor:pointer">Tiền mặt</label>
												<input type="radio" id="cash" class="payment" name="payment" value="0">
											</div>
											<div class="col-md-5" style="cursor:pointer">
												<label for="momo" style="cursor:pointer">Chuyển khoản</label>
												<input type="radio" id="momo" class="payment" name="payment" value="<?= $payment->stk ?>">
												<?php echo form_error('payment'); ?>
											
											</div>
										</td>

									</tr>

									<tr>
										<td></td>
										<td>
											<button type="submit" class="btn btn-success">Đặt Hàng</button>
										</td>
									</tr>
								</tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					Hóa đơn
				</div>
				<div class="panel-body">
					<div class="row">
						<?php foreach ($cart as $item) { ?>
							<div class="col-md-12">
								<div>
									<label for="">
										<p><?= $item['name'] ?> x <?= $item['qty'] ?></p>
									</label>
									<label for="">
										<p> - <?= number_format($item['price']) ?>đ</p>
									</label>
									<label for="">Thành tiền: <?= number_format($item['subtotal']) ?>đ</label>
								</div>
								<div>

									<img src="<?php echo base_url(); ?>upload/product/<?php echo $item['image_link']; ?>" width="100" alt="" class="">
								</div>
								<hr>
							</div>
						<?php } ?>
					</div>
					<br>
					<div class="row">

						<div style="display:none" id="payment_type">
						   <label for="">Tên: <?=$payment->name?></label>
						    <label for="">Số tài khoản: <?=$payment->stk?></label>
							<img src="<?php echo base_url(); ?>/upload/momo/<?= $payment->image ?>" width="250" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="" value="<?= json_encode($payment) ?>" id="payment_json">
<input type="hidden" name="" value="<?= $payment->stk ?>" id="payment_stk">
<script>
	document.querySelectorAll('.payment').forEach((element) => {
		element.addEventListener("click", () => {
			if (element.value == $("#payment_stk").val()) {
				$("#payment_type").css("display", "block");
			} else {
				$("#payment_type").css("display", "none");

			}
		});
	})
</script>