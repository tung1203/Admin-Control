<?php include("filter.php"); ?>
<?php

if (!empty($_SESSION['user'])) {
    if ($_SESSION['user']['user_level'] == 1) {
        header("Location: admin/admin.php");
    }
}
?>
<?php include("header.php"); ?>
<body>
<div class="top-bar"></div>
<header>
    <div class="header__promo">
        <div class="container">
            <ul class="top-promo__wrap">
                <li class="top-promo__item">
                    <a href="" class="top-promo__link">
                        <i class="tikicon tiki-assistant"></i>Trợ lý Tiki
                    </a>
                </li>
                <li class="top-promo__item">
                    <a href="" class="top-promo__link">
                        <i class="tikicon icon-uu-dai-hop-tac"></i>Ưu đãi đối tác
                    </a>
                </li>
                <li class="top-promo__item">
                    <a href="" class="top-promo__link">
                        <i class="tikicon icon-booking_dot_com"></i>Đặt khách sạn
                    </a>
                </li>
                <li class="top-promo__item">
                    <a href="" class="top-promo__link">
                        <i class="tikicon icon-gotadi"></i>Đặt vé máy bay
                    </a>
                </li>
                <li class="top-promo__item">
                    <a href="" class="top-promo__link">
                        <i class="tikicon icon-clearance-sale"></i>Săn hàng tồn
                    </a>
                </li>
                <li class="top-promo__item">
                    <a href="" class="top-promo__link">
                        <i class="tikicon ico-fire"></i>Khuyến Mãi HOT
                    </a>
                </li>
                <li class="top-promo__item">
                    <a href="" class="top-promo__link">
                        <i class="tikicon icon-global-18"></i>Hàng quốc tế
                    </a>
                </li>
                <li class="top-promo__item">
                    <a href="" class="top-promo__link">
                        <i class="tikicon icon-money_bag"></i>
                        Bán hàng cùng Tiki
                        <i class="tikicon icon-arrow-down"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="header__form">
        <div class="container">
            <div class="header__form-wrap">
                <a href="/" class="header__logo">
                    <i class="tikicon icon-tiki_short"></i>
                </a>
                <a href="" class="header__flash-sale">
                    <img src="images/tikinow.png" alt="">
                </a>
                <div class="form-search">
                    <form action="" id="search-from" method="get">
                        <div class="input">
                            <input type="text" name="q" autocomplete="off"
                                   placeholder="Tìm sản phẩm, danh mục hay thương hiệu mong muốn ...">
                        </div>
                        <button class="submit">
                            <i class="tikicon icon-search"></i>
                            <span>Tìm kiếm</span>
                        </button>
                    </form>
                </div>
                <div class="header__link">
                    <a href="" class="header-link__item-tracking">
                        <i class="tikicon icon-tracking"></i>
                        <span>Theo dõi <br> đơn hàng</span>
                    </a>
                    <a href="" class="header-link__item-notifi">
                        <i class="tikicon tikicon icon-notification"></i>
                        <span>Thông báo <br> của tôi</span>
                    </a>
                    <a href="" class="header-link__item-icon-user">
                        <i class="tikicon tikicon icon-user"></i>
                        <span>
                            <b>Chào <?php echo $_SESSION['user']["firstname"]; ?></b><br>
                            <small>Tài khoản</small>
                        </span>
                        <h3 class="text-center"><a href="logout.php"> Logout</a></h3>
                    </a>
                    <a href="" class="header__cart-btn">
                        <i class="tikicon icon-cart"></i>
                        Giỏ hàng
                        <span class="cart-count">1</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="header__nav">
        <div class="container">
            <nav class="header__nav-main">
                <i class="tikicon icon-burger-menu"></i>
                <span class="long">DANH MỤC SẢN PHẨM</span>
            </nav>
            <a href="" class="feature header__nav-location-picker">
                <span class="tikicon icon-location-picker"></span>
                Bạn muốn giao hàng tới đâu?
            </a>
            <a href="" class="feature header__nav-recently">
                <span class="tikicon icon-arrow-down"></span>
                Sản phẩm bạn đã xem
            </a>
            <a href="" class="feature header__nav-delivery-2h">
                <i class="tikicon icon-tikinow"></i>
                <span>
                    TikiNOW giao nhanh <br>
                Hàng trăm nghìn sản phẩm
                </span>
            </a>
            <a href="" class="feature header__nav-return">
                <span class="tikicon icon-exclusive"></span>
                <span>
                    Tất cả sản phẩm <br>
                100% chính hiệu
                </span>
            </a>
            <a href="" class="feature header__nav-delivery-2h">
                <span class="tikicon icon-return"></span>
                30 ngày đổi trả dễ dàng
            </a>
        </div>
    </div>
</header>
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li>
                <a href="">
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="">
                    Điện Thoại - Máy Tính Bảng
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="content__wrap">
            <aside>
                <div class="panel__wrap">
                    <div class="panel">
                        <div class="panel__heading">
                            <h4>Danh Mục Sản Phẩm</h4>
                        </div>
                        <div class="panel__category">
                            <div class="panel__category-list">
                                <div class="panel__category-item panel__category-title">
                                    <a href="">Điện Thoại - Máy Tính Bảng</a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Điện thoại Smartphone
                                        <span>(570)</span>
                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Điện thoại Smartphone
                                        <span>(570)</span>
                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Điện thoại Smartphone
                                        <span>(570)</span>
                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Điện thoại Smartphone
                                        <span>(570)</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel__heading">
                            <h4>Sản phẩm được giao từ</h4>
                        </div>
                        <div class="panel__category">
                            <div class="panel__category-list">
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Điện thoại Smartphone
                                        <span>(570)</span>
                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Điện thoại Smartphone
                                        <span>(570)</span>
                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Điện thoại Smartphone
                                        <span>(570)</span>
                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Điện thoại Smartphone
                                        <span>(570)</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="products">
                <div class="products__filter">
                    <div class="products__filter-option-wrap">
                        <div class="products__filter-option-left">
                            <span>Ưu tiên xem: </span>
                            <ul class="products__filter-option">
                                <li>
                                    <a href="">HÀNG MỚI</a>
                                </li>
                                <li>
                                    <a href="">BÁN CHẠY</a>
                                </li>
                                <li>
                                    <a href="">GIẢM GIÁ NHIỀU</a>
                                </li>
                                <li>
                                    <a href="">GIÁ THẤP</a>
                                </li>
                                <li>
                                    <a href="">GIÁ CAO</a>
                                </li>
                                <li>
                                    <a href="">CHỌN LỌC</a>
                                </li>
                            </ul>
                        </div>
                        <div class="products__filter-option-right">
                            <form action="" method="get">
                                <input type="text" name="q" id="search-product" placeholder="<?php echo isset($_GET['q']) ? $_GET['q'] : 'Tìm trong Điện Thoại - Máy Tính Bảng'?>">
                                <button>Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                    <div class="products__filter-2h" style="height: 50px;">

                    </div>
                </div>
                <div class="products__wrap">
                    <!--                    <div class="product">-->
                    <!--                        <a href="">-->
                    <!--                            <div class="product__image">-->
                    <!--                                <img src="images/dt1.jpg" alt="">-->
                    <!--                            </div>-->
                    <!--                            <div class="product__option">-->
                    <!--                                <ul>-->
                    <!--                                    <li class="active">-->
                    <!--                                        <img src="images/dt1small.jpg" alt="">-->
                    <!--                                    </li>-->
                    <!--                                    <li>-->
                    <!--                                        <img src="images/dt1small1.jpg" alt="">-->
                    <!--                                    </li>-->
                    <!--                                </ul>-->
                    <!--                            </div>-->
                    <!--                            <div class="product__title">-->
                    <!--                                <i class="icon icon-tikinow"></i>-->
                    <!--                                Điện Thoại Xiaomi Redmi Note 7 (3GB/32GB) - Điện Thoại Xiaomi Redmi Note 7 (3GB/32GB) - Điện Thoại Xiaomi Redmi Note 7 (3GB/32GB) --->
                    <!--                            </div>-->
                    <!--                            <span class="product__sale">-->
                    <!--                                <span class="product__sale-final">-->
                    <!--                                    3.590.000 ₫-->
                    <!--                                    <span class="product__sale-percent">-->
                    <!--                                        -10%-->
                    <!--                                    </span>-->
                    <!--                                </span>-->
                    <!--                                <span class="product__sale-regular">3.990.000 ₫</span>-->
                    <!--                            </span>-->
                    <!--                            <div class="product__installment">-->
                    <!--                                Trả góp 0% chỉ 299.167 ₫/tháng-->
                    <!--                            </div>-->
                    <!--                            <div class="product__review">-->
                    <!--                                <div class="product__review-start">-->
                    <!--                                    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--                                    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--                                    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--                                    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--                                    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--                                    <span class="product__review-start-y">-->
                    <!--                                        <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--                                    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--                                    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--                                    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--                                    <i class="fa fa-star" aria-hidden="true"></i>-->
                    <!--                                    </span>-->
                    <!--                                </div>-->
                    <!--                                <div class="product__review-text">(252 nhận xét)</div>-->
                    <!--                            </div>-->
                    <!--                        </a>-->
                    <!--                    </div>-->
                    <?php include("process-product.php"); ?>
                </div>

                <div class="pagination">
                    <ul>
                        <?php include("process-pagination.php") ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
<div class="tiki-newletter">
    <div class="container">

    </div>
</div>
</footer>
<?php include("footer.php"); ?>
