<!-- menu section -->
<?php
    //lay ra tu csdl
    $sql_danhsach ="select * from msql_spsua order by id_spsua desc";
    $query_danhsach = mysqli_query($conn,$sql_danhsach);
?>
<section id="wrapper">
    <div class="products">
        <ul>
            <?php
                while($row = mysqli_fetch_assoc($query_danhsach)){
            ?>
            <li class="main-product">
                <div class="img-product">
                    <img class="img-prd" src="admin/modum/main_right_themsua/upanh/<?php echo $row['anh_spsua'] ?>" alt="Sữa">
                </div>
                <div class="content-product ">
                    <a href="index.php?quanly=thongtinsua"><h3 class="content-product-h3 "><?php echo $row['ten_spsua'] ?></h3></a>
                    <div class="content-product-deltals ">
                        <div class="price ">
                            <span class="money ">39.917đ</span>
                        </div>
                        <button type="button" class="btn btn-cart ">Thêm Vào Giỏ</button>
                    </div>
                </div>
            </li>
            <?php 
                }
            ?>

            <li class="main-product no-margin">
                <div class="img-product">
                    <img class="img-prd " src="image/milk23.jpg" alt="Kem Vinamilk Đậu Xanh">
                </div>
                <div class="content-product">
                    <h3 class="content-product-h3 ">Kem Vinamilk Đậu Xanh</h3>
                    <div class="content-product-deltals ">
                        <div class="price ">
                            <span class="money ">166.376đ</span>
                        </div>
                        <button type="button" class="btn btn-cart ">Thêm Vào Giỏ</button>
                    </div>
                </div>
            </li>

            <li class="main-product no-margin ">
                <div class="img-product ">
                    <img class="img-prd " src="image/milk58.jpg" alt="Sữa Đậu Nành Vinamilk Super Nut Đậu Đỏ">
                </div>
                <div class="content-product ">
                    <h3 class="content-product-h3 ">Sữa Đậu Nành Vinamilk Super Nut Đậu Đỏ</h3>
                    <div class="content-product-deltals ">
                        <div class="price ">
                            <span class="money ">285.27đ</span>
                        </div>
                        <button type="button" class="btn btn-cart ">Thêm Vào Giỏ</button>
                    </div>
                </div>
            </li>

            <li class="main-product no-margin ">
                <div class="img-product ">
                    <img class="img-prd " src="image/milk64.jpg" alt="Nước Ép Vfresh Nho">
                </div>
                <div class="content-product ">
                    <h3 class="content-product-h3 ">Nước Ép Vfresh Nho</h3>
                    <div class="content-product-deltals ">
                        <div class="price ">
                            <span class="money ">548.597đ</span>
                        </div>
                        <button type="button" class="btn btn-cart ">Thêm Vào Giỏ</button>
                    </div>
                </div>
            </li>

            <li class="main-product no-margin ">
                <div class="img-product ">
                    <img class="img-prd " src="image/milk66.jpg" alt="Sữa Bột Optimum Mama Gold">
                </div>
                <div class="content-product ">
                    <h3 class="content-product-h3 ">Sữa Bột Optimum Mama Gold</h3>
                    <div class="content-product-deltals ">
                        <div class="price ">
                            <span class="money ">374.939đ</span>
                        </div>
                        <button type="button" class="btn btn-cart ">Thêm Vào Giỏ</button>
                    </div>
                </div>
            </li>

            <li class="main-product no-margin ">
                <div class="img-product ">
                    <img class="img-prd " src="image/milk30.jpg" alt="Sữa Dinh Dưỡng Vinamilk Adm Socola">
                </div>
                <div class="content-product ">
                    <h3 class="content-product-h3 ">Sữa Dinh Dưỡng Vinamilk Adm Socola</h3>
                    <div class="content-product-deltals ">
                        <div class="price ">
                            <span class="money ">202.954đ</span>
                        </div>
                        <button type="button" class="btn btn-cart ">Thêm Vào Giỏ</button>
                    </div>
                </div>
            </li>


            <li class="main-product no-margin ">
                <div class="img-product ">
                    <img class="img-prd " src="image/milk52.jpg" alt="Sữa Dinh Dưỡng Vinamilk Flex Không Lactose">
                </div>
                <div class="content-product ">
                    <h3 class="content-product-h3 ">Sữa Dinh Dưỡng Vinamilk Flex Không Lactose</h3>
                    <div class="content-product-deltals ">
                        <div class="price ">
                            <span class="money ">321.667đ</span>
                        </div>
                        <button type="button" class="btn btn-cart ">Thêm Vào Giỏ</button>
                    </div>
                </div>
            </li>


            <li class="main-product no-margin ">
                <div class="img-product ">
                    <img class="img-prd " src="image/milk61.jpg" alt="Sữa Bột Dielac Alpha 3 - Cho Trẻ Từ 1 Đến 2 Tuổi">
                </div>
                <div class="content-product ">
                    <h3 class="content-product-h3 ">Sữa Bột Dielac Alpha 3 - Cho Trẻ Từ 1 Đến 2 Tuổi</h3>
                    <div class="content-product-deltals ">
                        <div class="price ">
                            <span class="money ">223.430đ</span>
                        </div>
                        <button type="button" class="btn btn-cart ">Thêm Vào Giỏ</button>
                    </div>
                </div>
            </li>

            <li class="main-product no-margin ">
                <div class="img-product ">
                    <img class="img-prd " src="image/milk73.jpg" alt="Kem Sữa Chua Subo Mãng Cầu">
                </div>
                <div class="content-product ">
                    <h3 class="content-product-h3 ">Kem Sữa Chua Subo Mãng Cầu</h3>
                    <div class="content-product-deltals ">
                        <div class="price ">
                            <span class="money ">14.140đ</span>
                        </div>
                        <button type="button" class="btn btn-cart ">Thêm Vào Giỏ</button>
                    </div>
                </div>
            </li>
        </ul>
        <div class="center">
            <div class="pagination"></div>
        </div>
    </div>
</section>