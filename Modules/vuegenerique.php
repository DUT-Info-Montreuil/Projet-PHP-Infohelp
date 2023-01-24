
<?php

class vueGenerique{
    public function __construct(){

        ob_start();
    }

    public function getAffichage(){
        return ob_get_clean();
        ob_end_flush();
    }

}


/* 
Version 4.0 - 2023/01/24
CC BY-NC-ND © 2023-2033 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
*/