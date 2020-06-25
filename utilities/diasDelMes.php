<?php 
class diasDelMes{
function UltimoDia($anho,$mes){
   if (((fmod($anho,4)==0) and (fmod($anho,100)!=0)) or (fmod($anho,400)==0)) {
       $dias_febrero = 29;
   } else {
       $dias_febrero = 28;
   };
   switch ($mes) {
        case '1':
            return 31;
        case '2':
            return $dias_febrero;
        case '3':
            return 31;
        case '4':
            return 30;
        case '5':
            return 31;
        case '6':
            return 30;
        case '7':
            return 31;
        case '8':
            return 31;
        case '9':
            return 30;
        case '10':
            return 31;
        case '11':
            return 30;    
        case '12':
            return 31;
   }
}
}
?>