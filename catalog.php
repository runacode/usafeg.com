<?php
error_reporting(0);
include_once(dirname(__FILE__) . '/locale/languages.php');
//This code must be included at the top of your script before any output is sent to the browser
//-even before <!DOCTYPE> declaration
require_once realpath(dirname(__FILE__)."/resources/konnektiveSDK.php");
$pageType = "catalogPage"; //choose from: presalePage, leadPage, checkoutPage, upsellPage1, upsellPage2, upsellPage3, upsellPage4, thankyouPage
$deviceType = "ALL"; //choose from: DESKTOP, MOBILE, ALL
$ksdk = new KonnektiveSDK($pageType,$deviceType);
$offers = $ksdk->getOffers();

include 'includes/data.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>
        <?= T('Feg Serum - Eyelash Enhancer'); ?>
    </title>

<meta name="viewport" content="width=device-width" />
<meta charset="utf-8" />


    <?php
//this line of code must go either inside the <head> </head> tags or inside the <body></body> tags
$ksdk->echoJavascript();
?>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script>
        window.product = JSON.parse('<?php echo json_encode($product); ?>');
        window.data = JSON.parse('<?php echo json_encode($data); ?>');
    </script>
    <script src="/resources/js/cart.js"></script>

    <link rel="stylesheet" type="text/css" href="resources/css/fonts/fonts.css">
    <link rel="stylesheet" type="text/css" href="resources/css/shopify.css?1=2">
    <link rel="stylesheet" type="text/css" href="resources/css/stamped-reviews.css">
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>



<header class="container-fluid p-0">
    <div class="blue-line text-center">
        <?= T('US - 60% OFF ONLY TODAY!'); ?>
    </div>
    <div class="d-flex justify-content-between main-part">
        <div class="logo">
            <img src="resources/images/feg-serum-logo.jpg"/>
        </div>
        <button class="cart-button">
            <i class="fa fa-shopping-basket"></i>
        </button>
    </div>
</header>
<div class="container-fluid position-absolute cart-container d-none">
    <div class="row justify-content-end">
        <div class="col-12 col-sm-8 col-md-7 col-lg-5 p-0 cart">
        </div>
    </div>
</div>
<div class="container">
    <div class="row main-product-block">
        <div class='col-lg-7'>
            <div class='ktemplate_userCopy'>
                <img class="img-fluid" src="<?php echo $product->img; ?>"/>
            </div>
        </div>
        <div class="col-lg-5 right-product-block">
            <div class="row">
                <div class="col-7">
                    <div class="product-name">
                        <?php echo $product->name ?>
                    </div>
                    <div class="reviews-count d-flex align-items-center">
                        <div><?php echo $product->rewiews_mark ?></div>
                        <div>
                            <div><?php echo $product->excellent ?></div>
                            <div><?php echo $product->num_reviews ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="product-price">
                        <div class="price-old">
                            <?php echo $data->currency ?><?php echo number_format($product->old_price, 2) ?>
                        </div>
                        <div class="discount">
                            <?php echo $product->discount ?> <?php echo round(($product->old_price - $product->price) / $product->old_price * 100) ?>
                            %
                        </div>
                        <div class="price">
                            <?php echo $data->currency ?><?php echo $product->price ?>
                        </div>
                        <div class="satisfaction-guaranteed">
                            <?php echo $product->satisfaction_guaranteed ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="one-free">
                        <span><?php echo $product->buy_2_get_1 ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row quantity_plus_minus_section">
                        <div class="col-12 text-center" data-aos="fade-right">
                            <div class="qty">
                                <!--<span class="qty_title">QT</span>-->
                                <span class="minus"><span class="fa fa-minus" aria-hidden="true"></span></span>
                                <input type="number" class="count" name="qty" value="1">
                                <span class="plus"><span class="fa fa-plus" aria-hidden="true"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button class="add-to-cart" ><?php echo $product->add_to_cart ?></button>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-2">
                    <div class="security-logos text-center">
                        <img class="img-fluid" src="resources/images/sponsors-01.jpg"/>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="security-logos text-center">
                        <img class="img-fluid" src="resources/images/sponsors-02.jpg"/>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="31443049087031"><!-- FEG on US store -->
            <form id='kform' class='kform' onsubmit='return false' style="display:none">
                <div class="kform_spacer">
                    <input name="firstName" type="TEXT" isRequired>
                </div>
                <div class="kform_spacer">
                    <input name="lastName" type="TEXT" isRequired>
                </div>

                <div class="kform_spacer">
                    <input name="emailAddress" type="TEXT" isRequired>
                </div>

                <div class="kform_spacer">
                    <input name="phoneNumber" type="TEXT" isRequired>
                </div>

                <input type='button' value='Rush My Order!' class='kform_submitBtn' id='kformSubmit'>
            </form>
        </div>

    </div>
</div>


<div class="container mt-5" style="clear:both;">
    <div class="row">
        <div class="col-lg-8 col-sm-12 product-description">
            <?php include 'includes/description.php' ?>
        </div>
    </div>

</div>
<div class="container-fluid bottom-add-to-cart">
    <div class="row">
        <div class="col-12 persons-online">
            <i class="fa fa-users">&nbsp;</i><span>222</span> people are looking at the same product as you
        </div>
        <div class="col-12">
            <button class="add-to-cart" ><?php echo $product->add_to_cart ?></button>
        </div>
    </div>
</div>
<?php include_once('pixelcode/pixelhelper.php'); ?>


<script src="resources/js/main.js?1=2"></script>


</body>
</html>









