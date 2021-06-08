<?php 
require('top.php');
$order_id=get_safe_value($con,$_GET['id']);
?>
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Thank You</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                            <th class="product-thumbnail">Product Name</th>
												<th class="product-thumbnail">Product Image</th>
                                                <th class="product-name">Qty</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-price">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $uid = $_SESSION['USER_ID'];
                                                $res=mysqli_query($con,"select order_detail.*,`order`.address,`order`.city,`order`.pincode,product.name,product.image from order_detail join product on order_detail.product_id=product.ID join `order` 
                                                on order_detail.order_id=`order`.id where order_detail.order_id = '$order_id' and `order`.user_id='$uid' and product.id=order_detail.product_id");
                                               
                                                while ($row=mysqli_fetch_assoc($res)) {
                                                ?>
                                            <tr>
                                                <td class="product-name"><?php echo $row['name']?></td>
                                                <td class="product-name"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
												<td class="product-name"><?php echo $row['qty']?></td>
												<td class="product-name"><?php echo $row['price']?></td>
												<td class="product-name"><?php echo $row['qty']*$row['price']?></td>
                                            </tr>
                                            <?php    
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                   
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        						
<?php require('footer.php')?>        