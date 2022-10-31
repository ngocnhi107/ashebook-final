<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/58d7e4d8cc.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tác phẩm kinh điển</title>
    <link rel="stylesheet" href="ashe_css/home.css">
    <link rel="stylesheet" href="ashe_icon/themify-icons.css">
    <link rel="stylesheet" href="ashe_css/category.css">


</head>

<body>

    <header class="header">
        <div class="header__logo">
            <a href="home.php">

                <img src="./ashe_img/ashebooklogo2.png" alt="Logo" class="header__logo-img">
                <span class="header__logo-name">ASHEBOOK</span>
            </a>
        </div>
        <div class="header__menu">
            <a href="home.php" class="header__menu-home">
                <li>Trang chủ</li>
            </a>
            <a href="product(tieuthuyet).php" class="header__menu-product-tieuthuyet">
                <li>Tiểu thuyết</li>
            </a>
            <a href="product(ngontinh).php" class="header__menu-product-ngontinh">
                <li>Ngôn tình</li>
            </a>
            <a href="product(tanvan).php" class="header__menu-product-tanvan">
                <li>Tản văn</li>
            </a>
            <a href="product(tacphamkinhdien).php" class="header__menu-product-tacphamkinhdien">
                <li>Tác phẩm kinh điển</li>
            </a>





        </div>
        <div class="header__others">

                
                <?php
                    if(isset($_SESSION['email'])){
                        ?>
                        <a href= 'log_out.php'>Đăng xuất</a>
                        <?php
                }else{
                    ?>
                    <a href='log_in.php'>Đăng nhập</a>
                <?php
                }
                ?>
            </div>

    </header>
    <div class="cover-male">

    </div>
    
    
    <div class="new__product">
        <h2 class="new__product-title" style="font-size: 50px;">Những tác phẩm kinh điển</h2>                
                
    <?php
    $sql = "select * from product where idcategory = 0146 ";

    if (isset($_GET["cat"])) {
        $a = $_GET["cat"];

        $sql = "SELECT *
                FROM product where idcategory = 0146 ";
    } else
        $a = "";
    if (!empty($_GET["page"])) {
        $page = $_GET["page"];
        $sql .= "limit   " . (($page - 1) * 20) . ",20";
    } else {
        $sql .= " limit 20";
    }
    ?>

<?php
                require_once "config.php";
                $result = mysqli_query($conn, $sql);
               
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                ?>
                    <?php
                    $d = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                  
                        <div class="product_thumbnail">


                            <a href="./detail_product.php/?productid=<?= $row['productid']?>">
                                <img src=' <?php echo $row["thumbnail"]; ?>' class="product_thumbnail-img" /><br />


                                <p class="product_thumbnail-product-name"><?php echo $row["product_name"]; ?></p>
                                </p>

                            </a>



                        </div>

                        <?php
                        $d++;
                        if ($d == 5) { ?>
                            <div style='clear:both;'></div>
                    <?php
                            $d = 0;
                        }
                    }
                    ?>

                <?php
                } else {
                    echo "0 results";
                }
                mysqli_close($conn);
                ?>


    <center>

        <a href="product(tacphamkinhdien).php?cat=<?php echo $a; ?>&page=1">1</a>
       
    </center>
    <div class="main-footer">


        <div class="footer">
            <div class="footer-shoplogo">
                <a href="home.php">


                    <img src="ashe_img/ashebooklogo2.png" alt="" class="footer-logo">
                    <span class="footer-shopname">ASHEBOOK</span>
                </a>
            </div>
            <div class="footer__contact">
                <div class="footer__contact-name">Thông tin liên hệ</div>
                <div class="footer-contact-name-border"></div>

                <div class="footer__contact-address">
                    <i class="ti-location-pin"></i>
                    <span class="footer__contact-address-address">56 Hoàng Diệu 2, Linh Chiểu, Thủ Đức, TPHCM</span>
                </div>
                <div class="footer__contact-phone">
                    <i class="ti-mobile"></i>
                    <span class="footer__contact-phone-number">0978624197</span>
                </div>
                <div class="footer__contact-mail">
                    <i class="ti-email"></i>
                    <span class="footer__contact-mail-email">Ashebook@gmail.com</span>
                </div>
            </div>

            <div class="footer-description">
                <p class="footer-description-about">Về Ashe book</p>
                <div class="footer-description-about-border"></div>
                Ashe-book có đa dạng tác phẩm với các loại truyện tiểu thuyết, tản văn...
                <p>Sẵn sàng phục vụ độc giả nhanh chóng thông qua việc khám phá hiệu sách</p>
            </div>
            <div class="footer__social">
                <p class="footer__social-name">Social media</p>
                <div class="footer-social-name-border"></div>

                <a href="https://www.facebook.com/profile.php?id=100009393213605" class="footer__social-facebook">
                    <i class="ti-facebook" style="font-size: 24px;"></i>
                </a>
                <a href="https://www.instagram.com/yuer.nh/" class="footer__social-instagram">
                    <i class="ti-instagram" style="font-size: 24px;"></i>
                </a>
                <a href="" class="footer__social-twitter">
                    <i class="ti-twitter" style="font-size: 24px;"></i>
                </a>
            </div>
        </div>


        <div class="footer__border"></div>
        <div class="footer-license">
            @Bản quyền thuộc về ASHE team
        </div>
    </div>

    </div>

</body>

</html>