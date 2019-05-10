<?php

if ( ! function_exists('menu_ul'))
{
   function menu_ul($config_menu)
   {
        $menu = '<ul class="nav nav-pills">'."\n";
        foreach($config_menu as $row)
        {
            $menu .= '<li class="'.@$mantenedor_usuario.'""><a href="'.site_url().'/'.$row->url."/".$row->nombre.'">'.$row->nombre.'</a></li>'."\n";
        }
         
        $menu .= '</ul>'."\n";
        return $menu;
    }
}

?>