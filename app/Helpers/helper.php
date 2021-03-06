<?php
namespace App\Helpers;

class helper
{

    public static function IdGenerator($model, $trow, $length = 4, $prefix)
    {

        $data = $model::orderBy('id', 'desc')->first();
        if(!$data){
            $og_length=$length;
            $lastNumber='';
        }else{
            $code=substr($data->$trow,strlen($prefix)+1);
            $actual_last_number=((int)$code/1)*1;
            $increment_last_number=$actual_last_number+1;
            $last_number_length=strlen($increment_last_number);
            $og_length=$length-$last_number_length;
            $last_number=$increment_last_number;
        }
        $zeros="";
        for($i=0;$i<$og_length;$i++){
            $zeros.="0";
        }
     return $prefix.'-'.$zeros.$last_number;

    }
}
