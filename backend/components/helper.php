<?php
namespace backend\components;
class helper extends  \yii\web\Request {

    function dateFormatingSlash($date) {
        list($day, $month, $year) = explode('/', $date);
        $date_f = $year . "-" . $month . "-" . $day;
        return $date_f;
    }

    function dateFormatingStrip($date) {
        list($day, $month, $year) = explode('-', $date);
        $date_f = $year . "-" . $month . "-" . $day;
        return $date_f;
    }

    function dateTimeFormatingStrip($date) {
        $dt = explode(' ', $date);
        list($day, $month, $year) = explode('-', $dt[0]);
        $date_f = $year . "-" . $month . "-" . $day;
        return $date_f;
    }

    function dateTimeStripFullFormating($date) {
        $dt = explode(' ', $date);
        list($day, $month, $year) = explode('-', $dt[0]);
        $date_f = $year . "-" . $month . "-" . $day;
        return $date_f . " " . $dt[1];
    }

    function dateTimeSlashFullFormating($date) {
        $dt = explode(' ', $date);
        list($day, $month, $year) = explode('/', $dt[0]);
        $date_f = $year . "-" . $month . "-" . $day;
        return $date_f . " " . $dt[1];
    }

    function dateFormatingApp($date) {
        list($year, $month, $day) = explode('-', $date);
        $date_f = $day . "/" . $month . "/" . $year;
        return $date_f;
    }
	
    function dateFormatingAppStrip($date)
    {
        if ($date){
            list($year,$month,$day) = explode('-',$date);
            $date_f = $day."-".$month."-".$year;
            return $date_f;
        }
    }

    function dateTimeFormatingApp($date) {
        $dt = explode(' ', $date);
        list($day, $month, $year) = explode('-', $dt[0]);
        $date_f = $day . "/" . $month . "/" . $year;
        return $date_f . " " . $dt[1];
    }
    
    function dateTimeFormatingAppStf($date) {
        $dt = explode(' ', $date);
        list($day, $month, $year) = explode('-', $dt[0]);
        $date_f = $day . "-" . $month . "-" . $year;
        return $date_f;
    }
    
    function dateFormat($date){
        $dateF =date_create($date);
        return date_format($dateF,"d-m-Y");
    }

    function moneyFormat($number) {
        if($number != ''){
                $num = number_format($number, 4, ',', '.');
                return "Rp. ".$num;
        }
        else return "Rp. 0,00";
    }
    
    function thousandFormat($number){
        if($number != ''){
            $num = number_format($number, 4, ',', '.');
            return $num;
        }
        else return 0;
    }
    
    function thousandFormatNd($number){
        if($number != ''){
            $num = number_format($number, 0, ',', '.');
            return $num;
        }
        else return 0;
    }

    function decomMoney($number) {
        $number =  str_replace(".", "", $number);
        $number =  str_replace(",", ".", $number);
        return floatval($number);
    }

}

?>