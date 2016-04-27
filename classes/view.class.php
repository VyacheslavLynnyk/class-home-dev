<?php

class View
{
    function render($template, $data = [])
    {
        ob_start();
        extract($data);
        include ROOT_DIR.'/view/'.$template.'.html';
        $res = ob_get_contents();
        ob_end_clean();
        return $res;
    }
}