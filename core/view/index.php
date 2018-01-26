<?php


$Menu=array();
$SP=array();
for($i=0;$i<$VIEW->rowCount;$i++)
{
    $viewSite=$VIEW->qDownSite($i);
    $Menu[$i]['name']=$viewSite['name'];
    $Menu[$i]['nameMenu']=$viewSite['name_menu'];
    
    $SP[$i]=$viewSite;
}



$MenuView='';$MenuViewSmart='';
for($i=0;$i<$VIEW->rowCount;$i++)
{

    if($i==0){
        ob_start();
        $buffer = ob_get_contents();
        include 'templates/blackwhite/headerMenuOne'.EXT;
        $MenuView.= substr(ob_get_contents(),strlen($buffer));
        ob_end_clean();
    }else{        
        ob_start();
        $buffer = ob_get_contents();
        include 'templates/blackwhite/headerMenu'.EXT;
        $MenuView.= substr(ob_get_contents(),strlen($buffer));
        ob_end_clean();
        
    }
    if($i==0){
        ob_start();
        $buffer = ob_get_contents();
        include 'templates/blackwhite/headerMenuOneSmart'.EXT;
        $MenuViewSmart.= substr(ob_get_contents(),strlen($buffer));
        ob_end_clean();
    }else{        
        ob_start();
        $buffer = ob_get_contents();
        include 'templates/blackwhite/headerMenuSmart'.EXT;
        $MenuViewSmart.= substr(ob_get_contents(),strlen($buffer));
        ob_end_clean();
        
    }
        
        
}
include_once 'templates/blackwhite/header'.EXT;

for($i=0;$i<$VIEW->rowCount;$i++){
    
    if(in_array($i,array(1,3,5,7,9))){
        $ps_bg='b-bg';
    }else{
        $ps_bg='';
    }
    $ps_name=$SP[$i]['name'];
    $ps_title=$SP[$i]['title'];
    $ps_value= nl2br($SP[$i]['value']);
    include 'templates/blackwhite/post'.EXT;
}

include_once 'templates/blackwhite/footer'.EXT;