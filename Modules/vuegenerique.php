<!-- 
Version 1.0 - 2022/12/12
GNU GPL Copyleft (C inversé) 2022-2032 
Initiated by Daniel & Lucas & Geovany
Web Site = <https://InfoHelp.com>
 -->
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
