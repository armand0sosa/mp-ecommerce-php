<?php 
    session_start();

    require __DIR__  . '/vendor/autoload.php';
    require __DIR__  . '/config.php';

    MercadoPago\SDK::setAccessToken(ACCESS_TOKEN);

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    $validPost = isset($_SESSION["product"]);

    if($validPost){
        $item = new MercadoPago\Item();
        $item->id = "1234";
        $item->title = $_SESSION["product"]['title'];
        $item->quantity = $_SESSION["product"]['quantity'];
        $item->unit_price = $_SESSION["product"]['unit_price'];
        $item->picture_url = $_SESSION["product"]['picture_url'];
        $item->description = "Dispositivo móvil de Tienda e-commerce";

        $preference->items = array($item);
        $preference->external_reference = "ABCD1234";

        //Creación del comprador
        $payer = new MercadoPago\Payer();
        $payer->name = $_POST['firstName']." ".$_POST['lastName'];
        $payer->email = $_POST['email'];
        $payer->date_created = "2018-06-02T12:58:41.425-04:00";
        $payer->phone = array(
          "area_code" => "",
          "number" => $_POST['phone']
        );
        $payer->address = array(
          "street_name" => $_POST['address'],
          "street_number" => $_POST['streetNumber'],
          "zip_code" => $_POST['zip']
        );

        $preference->payer = $payer;
        
        //Retricción de pagos
        $preference->payment_methods = array(
          "excluded_payment_methods" => array(
            array("id" => "amex")
          ),
          "excluded_payment_types" => array(
            array("id" => "atm")
          ),
          "installments" => 6
        );

        //Urls de redireccionamiento 
        //Genera error al utilizar la URL con IP
        /*
        $preference->back_urls = array(
            "success" => BASE_URL."/success.php",
            "failure" => BASE_URL."/failure.php",
            "pending" => BASE_URL."/pending.php"
        );
        $preference->auto_return = "approved";*/

        $preference->save();
    }else{
        header('Location: '.BASE_URL);
    }
?>

<!DOCTYPE html>
<html class="supports-animation supports-columns svg no-touch no-ie no-oldie no-ios supports-backdrop-filter as-mouseuser" lang="en-US"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=1024">
    <title>Tienda e-commerce</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no">

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./assets/category-landing.css" media="screen, print">

    <link rel="stylesheet" href="./assets/category.css" media="screen, print">

    <link rel="stylesheet" href="./assets/merch-tools.css" media="screen, print">

    <link rel="stylesheet" href="./assets/fonts" media="">
    <style>
        .as-filter-button-text {
            font-size: 26px;
            font-weight: 700;
            color: #333;
        }
        .row.as-fixed-nav {
            border-bottom: 1px solid #ddd;
        }
        .as-producttile-tilehero.with-paddlenav.with-paddlenav-onhover {
            height: 330px;
        }
        .as-footnotes {
            background: #333;
            color: #fff;
            padding: 16px 40px;
        }
    </style>
<style type="text/css"> @keyframes loading-rotate { 100% { transform: rotate(360deg); } } @keyframes loading-dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 100, 200; stroke-dashoffset: -20px; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124px; } } @keyframes loading-fade-in { from { opacity: 0; } to { opacity: 1; } } .mp-spinner { position: absolute; top: 100px; left: 50%; font-size: 70px; margin-left: -35px; animation: loading-rotate 2.5s linear infinite; transform-origin: center center; width: 1em; height: 1em; } .mp-spinner-path { stroke-dasharray: 1, 200; stroke-dashoffset: 0; animation: loading-dash 1.5s ease-in-out infinite; stroke-linecap: round; stroke-width: 2px; stroke: #009ee3; } </style><style type="text/css"> .mercadopago-button { padding: 0 1.7142857142857142em; font-family: "Helvetica Neue", Arial, sans-serif; font-size: 0.875em; line-height: 2.7142857142857144; background: #009ee3; border-radius: 0.2857142857142857em; color: #fff; cursor: pointer; border: 0; } </style><style type="text/css"> @keyframes loading-rotate { 100% { transform: rotate(360deg); } } @keyframes loading-dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 100, 200; stroke-dashoffset: -20px; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124px; } } @keyframes loading-fade-in { from { opacity: 0; } to { opacity: 1; } } .mp-spinner { position: absolute; top: 100px; left: 50%; font-size: 70px; margin-left: -35px; animation: loading-rotate 2.5s linear infinite; transform-origin: center center; width: 1em; height: 1em; } .mp-spinner-path { stroke-dasharray: 1, 200; stroke-dashoffset: 0; animation: loading-dash 1.5s ease-in-out infinite; stroke-linecap: round; stroke-width: 2px; stroke: #009ee3; } </style><style type="text/css"> .mercadopago-button { padding: 0 1.7142857142857142em; font-family: "Helvetica Neue", Arial, sans-serif; font-size: 0.875em; line-height: 2.7142857142857144; background: #009ee3; border-radius: 0.2857142857142857em; color: #fff; cursor: pointer; border: 0; } </style><style type="text/css"> @keyframes loading-rotate { 100% { transform: rotate(360deg); } } @keyframes loading-dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 100, 200; stroke-dashoffset: -20px; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124px; } } @keyframes loading-fade-in { from { opacity: 0; } to { opacity: 1; } } .mp-spinner { position: absolute; top: 100px; left: 50%; font-size: 70px; margin-left: -35px; animation: loading-rotate 2.5s linear infinite; transform-origin: center center; width: 1em; height: 1em; } .mp-spinner-path { stroke-dasharray: 1, 200; stroke-dashoffset: 0; animation: loading-dash 1.5s ease-in-out infinite; stroke-linecap: round; stroke-width: 2px; stroke: #009ee3; } </style><style type="text/css"> .mercadopago-button { padding: 0 1.7142857142857142em; font-family: "Helvetica Neue", Arial, sans-serif; font-size: 0.875em; line-height: 2.7142857142857144; background: #009ee3; border-radius: 0.2857142857142857em; color: #fff; cursor: pointer; border: 0; } </style><style type="text/css"> @keyframes loading-rotate { 100% { transform: rotate(360deg); } } @keyframes loading-dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 100, 200; stroke-dashoffset: -20px; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124px; } } @keyframes loading-fade-in { from { opacity: 0; } to { opacity: 1; } } .mp-spinner { position: absolute; top: 100px; left: 50%; font-size: 70px; margin-left: -35px; animation: loading-rotate 2.5s linear infinite; transform-origin: center center; width: 1em; height: 1em; } .mp-spinner-path { stroke-dasharray: 1, 200; stroke-dashoffset: 0; animation: loading-dash 1.5s ease-in-out infinite; stroke-linecap: round; stroke-width: 2px; stroke: #009ee3; } </style><style type="text/css"> .mercadopago-button { padding: 0 1.7142857142857142em; font-family: "Helvetica Neue", Arial, sans-serif; font-size: 0.875em; line-height: 2.7142857142857144; background: #009ee3; border-radius: 0.2857142857142857em; color: #fff; cursor: pointer; border: 0; } </style><style type="text/css"> @keyframes loading-rotate { 100% { transform: rotate(360deg); } } @keyframes loading-dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 100, 200; stroke-dashoffset: -20px; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124px; } } @keyframes loading-fade-in { from { opacity: 0; } to { opacity: 1; } } .mp-spinner { position: absolute; top: 100px; left: 50%; font-size: 70px; margin-left: -35px; animation: loading-rotate 2.5s linear infinite; transform-origin: center center; width: 1em; height: 1em; } .mp-spinner-path { stroke-dasharray: 1, 200; stroke-dashoffset: 0; animation: loading-dash 1.5s ease-in-out infinite; stroke-linecap: round; stroke-width: 2px; stroke: #009ee3; } </style><style type="text/css"> .mercadopago-button { padding: 0 1.7142857142857142em; font-family: "Helvetica Neue", Arial, sans-serif; font-size: 0.875em; line-height: 2.7142857142857144; background: #009ee3; border-radius: 0.2857142857142857em; color: #fff; cursor: pointer; border: 0; } </style><style type="text/css"> @keyframes loading-rotate { 100% { transform: rotate(360deg); } } @keyframes loading-dash { 0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; } 50% { stroke-dasharray: 100, 200; stroke-dashoffset: -20px; } 100% { stroke-dasharray: 89, 200; stroke-dashoffset: -124px; } } @keyframes loading-fade-in { from { opacity: 0; } to { opacity: 1; } } .mp-spinner { position: absolute; top: 100px; left: 50%; font-size: 70px; margin-left: -35px; animation: loading-rotate 2.5s linear infinite; transform-origin: center center; width: 1em; height: 1em; } .mp-spinner-path { stroke-dasharray: 1, 200; stroke-dashoffset: 0; animation: loading-dash 1.5s ease-in-out infinite; stroke-linecap: round; stroke-width: 2px; stroke: #009ee3; } </style><style type="text/css"> .mercadopago-button { padding: 0 1.7142857142857142em; font-family: "Helvetica Neue", Arial, sans-serif; font-size: 0.875em; line-height: 2.7142857142857144; background: #009ee3; border-radius: 0.2857142857142857em; color: #fff; cursor: pointer; border: 0; } </style></head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style type="text/css">.mercadopago-button{ background: #2D3277 !important; }</style>

<body class="as-theme-light-heroimage">

    <div class="stack">
        
        <div class="as-search-wrapper" role="main">
            <div class="as-navtuck-wrapper">
                <div class="as-l-fullwidth  as-navtuck" data-events="event52">
                    <div>
                        <div class="pd-billboard pd-category-header">
                            <div class="pd-l-plate-scale">
                                <div class="pd-billboard-background">
                                    <img src="./assets/music-audio-alp-201709" alt="" width="1440" height="320" data-scale-params-2="wid=2880&amp;hei=640&amp;fmt=jpeg&amp;qlt=95&amp;op_usm=0.5,0.5&amp;.v=1503948581306" class="pd-billboard-hero ir">
                                </div>
                                <div class="pd-billboard-info">
                                    <h1 class="pd-billboard-header pd-util-compact-small-18">Tienda e-commerce</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="as-search-results as-filter-open as-category-landing as-desktop" id="as-search-results">
                
                <div class="py-5 row">
                    <div class="col-md-4 order-md-2 mb-4">
                      <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Su compra</span>
                        <span class="badge badge-secondary badge-pill">1</span>
                      </h4>
                      <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                            <h6 class="my-0"><?=$_SESSION['product']['title']?></h6>
                            <small class="text-muted">Cantidad: <?=$_SESSION['product']['quantity']?></small>
                          </div>
                          <span class="text-muted">$<?=$_SESSION['product']['unit_price']?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                          <span>Total (MXN)</span>
                          <strong>$<?=$_SESSION['product']['unit_price']?></strong>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-8 order-md-1">
                      <h4 class="mb-3">Confirma tus datos</h4>

                      <p>Nombre: <?=$_POST['firstName']?> <?=$_POST['lastName']?></p>
                      <p>Email: <?=$_POST['email']?></p>
                      <p>Teléfono: <?=$_POST['phone']?></p>
                      <p>Dirección: <?=$_POST['address']?></p>
                      <p>Número de casa: <?=$_POST['streetNumber']?></p>
                      <p>Código Postal: <?=$_POST['zip']?></p>
                      <p>País: <?=$_POST['country']?></p>
                      <p>Estado: <?=$_POST['state']?></p>
                      <hr class="mb-4">
                        <a href="<?=BASE_URL?>/checkout.php" class="btn btn-danger">Corregir</a>
                        <form action="index.php" method="POST" class="float-right">
                          <script
                           data-elements-color="#2D3277"
                           data-button-label="Pagar la compra"
                           src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js"
                           data-preference-id="<?php echo $preference->id; ?>" >
                          </script>
                        </form>
                    </div>
                  </div>
            </div>
        </div>
        <div role="alert" class="as-loader-text ally" aria-live="assertive"></div>
        <div class="as-footnotes ">
            <div class="as-footnotes-content">
                <div class="as-footnotes-sosumi">
                    Todos los derechos reservados Tienda Tecno 2018
                </div>
            </div>
        </div>

</div><div class="mp-mercadopago-checkout-wrapper" style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;"> <svg class="mp-spinner" viewBox="25 25 50 50"> <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle> </svg> </div><div class="mp-mercadopago-checkout-wrapper" style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;"> <svg class="mp-spinner" viewBox="25 25 50 50"> <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle> </svg> </div><div class="mp-mercadopago-checkout-wrapper" style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;"> <svg class="mp-spinner" viewBox="25 25 50 50"> <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle> </svg> </div><div class="mp-mercadopago-checkout-wrapper" style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;"> <svg class="mp-spinner" viewBox="25 25 50 50"> <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle> </svg> </div><div class="mp-mercadopago-checkout-wrapper" style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;"> <svg class="mp-spinner" viewBox="25 25 50 50"> <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle> </svg> </div><div class="mp-mercadopago-checkout-wrapper" style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;"> <svg class="mp-spinner" viewBox="25 25 50 50"> <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle> </svg> </div><div id="ac-gn-viewport-emitter"> </div></body></html>