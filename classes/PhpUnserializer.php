<?php

class PhpUnserializer
{
    public function index($f3)
    {
        $code = $f3->get('POST.code');
        $result = '';

        if ( !empty($code) ) {
            $code = unserialize($code);

            if (!empty($code)) {
                ob_start();
                echo '<pre>';
                print_r($code);
                echo '</pre>';
                $result = ob_get_clean();
            }
        }

        $f3->set('result', $result);
        $f3->set('content', 'views/php-unserializer.htm');
        echo Template::instance()->render('views/app.htm');
    }
}