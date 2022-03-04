<!-- Modal cảnh báo đăng nhập trên nhiều thiết bị -->
<div class="modal fade" id="warningLoggedModal" tabindex="-1" aria-labelledby="warningLoggedLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="warningLoggedLabel"><i class="fa fa-warning"></i> Cảnh báo đăng nhập!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body medium">
                <p class="redcolor">Vui lòng không đăng nhập trên nhiều thiết bị hoặc nhiều trình duyệt khác nhau!</p>
                <p>Lịch sử đăng nhập của bạn đã được lưu lại để kiểm tra. Nếu phát hiện hành vi gian lận, chúng tôi sẽ tiến hành khóa tài khoản của bạn.</p>
                <p>IP của bạn: <strong><?php echo $_SERVER[ 'REMOTE_ADDR' ]; ?></strong></p>
                <p>IP nghi vấn: <strong class="show-logged-ip"></strong></p>
                <p>Trình duyệt: <strong class="show-logged-agent"></strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"><i class="fa fa-remove"></i> Bỏ qua</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-check"></i> Đã hiểu</button>
            </div>
        </div>
    </div>
</div>
<?php

//
if ( $current_user_id > 0 ) {
    // lưu session id của người dùng vào file
    $base_model->set_logged( $current_user_id );

    // nạp js cảnh báo đăng nhập
    $base_model->add_js( 'javascript/device_protection.js', 0, [
        'defer'
    ] );
}