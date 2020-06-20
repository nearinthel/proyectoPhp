<?php 

class mesesANum {

public function mes($num)
{
    switch ($num) {
        case 'Enero':
            return 1;
            break;
        case 'Febrero':
            return 2;
            break;
        case 'Marzo':
            return 3;
            break;
        case 'Abril':
            return 4;
            break;
        case 'Mayo':
            return 5;
            break;
        case 'Junio':
            return 6;
            break;
        case 'Julio':
            return 7;
            break;
        case 'Agosto':
            return 8;
            break;
        case 'Setiembre':
            return 9;
            break;
        case 'Octubre':
            return 10;
            break;
        case 'Noviembre':
            return 11;
            break;
        case 'Diciembre':
            return 12;
            break;
        default:
            # code...
            break;
    }
}
}
?>