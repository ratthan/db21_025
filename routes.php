<?php 
$controllers=array('pages'=>['home','error']);
function call($controller,$action){
    echo "routes to ".$controller."-".$action;
}
if(array_key_exists($controller,$controllers)){
    if(in_array($action,$controllers[$controller] )){
        call($controller,$action);
    }
    else{
        call('pages','error');
    }
}
else{
    call('pages','error');
}
?>