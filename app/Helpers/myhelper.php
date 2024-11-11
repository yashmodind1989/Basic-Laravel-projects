<?php
if (!function_exists('generate_order_id'))
{
     function generate_order_id()
     {
        $ordId='order_'. mt_rand( 1000000000, 9999999999 );
        return $ordId;
     }
}

?>
