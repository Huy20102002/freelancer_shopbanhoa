<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home">
                    <use xlink:href="#stroked-home"></use>
                </svg></a></li>
        <li class="active">Thông tin thanh toán / Thêm thông tin</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="col-md-8">Thêm thông tin</div>
                <div class="col-md-4 text-right">
                    <a href="<?= admin_url('infopayment') ?>" class="btn btn-primary">Danh Sách</a>
                </div>
            </div>
            <div class="panel-body">
                <form method="post"   enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="name" class="form-control">
                        <br>
                        <?php echo form_error('name'); ?>

                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control">
                        <br>
                        <?php echo form_error('phone'); ?>

                    </div>
                    <div class="form-group">
                        <label for="">Số tài khoản</label>
                        <input type="text" name="stk" class="form-control">
                        <br>
                        <?php echo form_error('stk'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Hình ảnh</label>
                        <input type="file" name="image" id="image" >
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Thêm</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>