 <?php

    require __DIR__  . '/vendor/autoload.php';
    require __DIR__  . '/config.php';

    MercadoPago\SDK::setAccessToken(ACCESS_TOKEN);

    $validNotification = isset($_POST["type"]) && isset($_GET["data_id"]);

    if($validNotification){
        switch($_POST["type"]) {
            case "payment":
                $payment = MercadoPago\Payment::find_by_id($_GET["data_id"]);
                //Guardar información en la base de datos
                break;
            case "plan":
                $plan = MercadoPago\Plan::find_by_id($_GET["data_id"]);
                //Guardar información en la base de datos
                break;
            case "subscription":
                $plan = MercadoPago\Subscription::find_by_id($_GET["data_id"]);
                //Guardar información en la base de datos
                break;
            case "invoice":
                $plan = MercadoPago\Invoice::find_by_id($_GET["data_id"]);
                //Guardar información en la base de datos
                break;
        }
    }else{
        header("HTTP/1.0 400 Bad Request");
    }
?>