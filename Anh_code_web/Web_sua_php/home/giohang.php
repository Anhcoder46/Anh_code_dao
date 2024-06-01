<button id="cart"><li class="fa fa-shopping-basket" aria-hidden="true"></li></button>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <span class="close">&times;</span>
            </div>

            <div class="modal-body">
                <h1 class="">Giỏ hàng</h1>
                <div class="cart-row">
                    <span class="cart-item cart-header cart-column">Sản Phẩm</span>
                    <span class="cart-price cart-header cart-column">Giá</span>
                    <span class="cart-quantity cart-header cart-column">Số Lượng</span>
                </div>
                <div class="cart-items"></div>
                <div class="cart-total">
                    <div class="modal_customer">
                    <h2>Địa chỉ nhận hàng</h2>
                    <table>
                        <tr>
                            <td><input type="text" size="20" id="txtName" placeholder="Tên khách hàng"></td>
                        </tr>

                        <tr>
                            <td><input type="number" size="20" id="txtNumber" placeholder="Số điện thoại"></td>
                        </tr>

                        <tr>
                            <td><input type="text" name="" size="40" id="txtAddress" placeholder="Địa chỉ"></td>
                        </tr>
                 </table>
            </div>
                    <strong class="cart-total-title">Tổng Cộng:</strong>
                    <span class="cart-total-price">0VNĐ</span>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-footer">Đóng</button>
                <button type="button" class="btn btn-primary order">Thanh Toán</button>
            </div>
        </div>
    </div>

    <div class="menu-icon">
        <i class="fa fa-bars" id="menuIcon" aria-hidden="true"></i>
    </div>