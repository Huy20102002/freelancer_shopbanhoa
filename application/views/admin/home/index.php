<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home">
					<use xlink:href="#stroked-home"></use>
				</svg></a></li>
		<li class="active">Quản trị</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Trang quản trị</h1>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-xs-12 col-md-7 col-lg-4">
		<div class="panel panel-blue panel-widget ">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<svg class="glyph stroked bag">
						<use xlink:href="#stroked-bag"></use>
					</svg>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo $total_order; ?></div>
					<div class="text-muted">Đơn hàng mới</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-7 col-lg-4">
		<div class="panel panel-orange panel-widget">
			<div class="row no-padding">
				<div class="col-sm-2 col-lg-5 widget-left">
					<i class="fa-regular fa-cart-shopping" style="font-size:5rem"></i>
				</div>
				<div class="col-sm-10 col-lg-7 widget-right">
					<div class="large"> <?= $total_count_order ?></div>
					<div class="text-muted">Đơn hàng trong ngày</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-7 col-lg-4">
		<div class="panel panel-teal panel-widget">
			<div class="row no-padding">
				<div class="col-sm-2 col-lg-5 widget-left">
					<i class="fa-light fa-money-bill" style="font-size:5rem"></i>
				</div>
				<div class="col-sm-10 col-lg-7 widget-right">
					<div class="large"> <?= number_format($total_money_orders_day) ?> VNĐ</div>
					<div class="text-muted">Tổng doanh thu trong ngày</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">

	</div>
	<div class="col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3>
					<label for="">Tổng doanh thu các tháng <?=date('Y')?></label>
				</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-10">
					<canvas id="bar-chart"></canvas>
				</div>
			</div>
		</div>
		<!-- <div id="bar-chart"></div> -->
	</div>
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<h3>
					<label for="">Top 5 Sản phẩm bán chạy</label>
				</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
					<canvas id="bar-chart2"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="" id="total_money_in_month" value='<?= json_encode($total_money_in_month) ?>' />
<input type="hidden" name="" id="product_sale" value='<?=json_encode($product_sale)?>'>