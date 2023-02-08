<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home">
                    <use xlink:href="#stroked-home"></use>
                </svg></a></li>
        <li class="active">Thông tin thanh toán / Chỉnh sửa thông tin</li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="col-md-8"> Chỉnh sửa thông tin</div>
                <div class="col-md-4 text-right">
                    <a href="<?= admin_url('infopayment') ?>" class="btn btn-primary">Danh Sách</a>
                </div>
            </div>
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" value="<?php echo $item->name; ?>" name="name" class="form-control">
                        <br>
                        <?php echo form_error('name'); ?>

                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" value="<?php echo $item->phone; ?>" name="phone" class="form-control">
                        <br>
                        <?php echo form_error('phone'); ?>

                    </div>
                    <div class="form-group">
                        <label for="">Số tài khoản</label>
                        <input type="text" value="<?php echo $item->stk; ?>" name="stk" class="form-control">
                        <br>
                        <?php echo form_error('stk'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Hình ảnh</label>
                        <input type="file" name="image" id="image">
                        <input type="hidden" value="<?= $item->image ?>" name="thumb_image">
                    </div>
                    <div class="form-group">
                        <!-- <label for="">Ảnh cũ</label> -->
                        <div class="col-md-12">
                            <img src="<?php echo base_url(); ?>/upload/momo/<?php echo $item->image; ?>" alt="" style="width: 200px;float:left;margin-right: 10px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <br>

                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>