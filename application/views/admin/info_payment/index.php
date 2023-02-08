<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home">
                    <use xlink:href="#stroked-home"></use>
                </svg></a></li>
        <li class="active">Thông tin thanh toán</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="col-md-8">Thông tin thanh toán</div>
                <div class="col-md-4 text-right">
                    <a href="<?= admin_url('infopayment/create') ?>" class="btn btn-primary">Thêm thông tin</a>
                </div>
            </div>
        </div>
        <div class="panel-body">

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="info">
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Ngân Hàng</th>
                            <th>Hình Ảnh</th>
                            <th>Thời gian</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $item) { ?>
                            <tr>

                                <td>
                                    <?= $item->id ?>
                                </td>
                                <td>
                                    <?= $item->name ?>
                                </td>
                                <td>
                                    <?= $item->phone ?>
                                </td>
                                <td>
                                    <?= $item->stk ?>
                                </td>

                                <td><img src="<?php echo base_url(); ?>/upload/momo/<?php echo $item->image; ?>" alt="" style="width: 200px;float:left;margin-right: 10px;"></td>

                                <td>
                                    <?= date('h:i:s Y-m-d', $item->created) ?>
                                </td>
                                <td>
                                    <a href="<?= admin_url('infopayment/destroy/' . $item->id) ?>" class="btn btn-primary">Xóa</a>
                                    <a href="<?= admin_url('infopayment/edit/' . $item->id) ?>" class="btn btn-primary">Sửa</a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>