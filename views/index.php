<!--
 * Created by PhpStorm.
 * User: riya
 * Date: 9/29/18
 * Time: 5:28 PM
-->

<html>

<title>Mini Project 1 - IS601:101 by Riya Gandhi</title>



</html>


<?php

main::start("project1.csv");

class main{

    static public function start($projectfile) {

        $fileinput = csv::getRecords($projectfile);
        $output = html::generateTable($fileinput);
        echo $output;
    }
}

/*create class to get record from file*/
class csv{
    static public function getRecords($projectfile) {
        $readfile = fopen($projectfile, 'r');
        $field = array();
        $fileinput = array();
        $count = 0;

        while(!feof($readfile)){
            $input = fgetcsv($readfile, 5000,',');
            if($count == 0){
              $field = $input;
            }
            else{
                $fileinput[]=recordFactory::create($field,$input);
            }
            $count++;
        }
        fclose($readfile);
        return $fileinput;
        }
}

/*create class to display table*/
class html {
    public static function generateTable($fileinput){
        $output = self::getHTMLHeader();
        $count = 0;
        foreach ($fileinput as $input) {
            $array = $input->returnArray();
            if($count == 0) {
                $fieldkeys = array_keys($array);
                $output = self:: getString($fieldkeys, $output);
                }
            $values = array_values($array);
            $output = self::getString($values,$output);
            $count++;
         }
         $output.='</table></body></html>';
         return $output;
    }
    public static function getString($array, $output){
        $output.='<tr>';
        foreach($array as $value){
            $output .= $value;
        }
        $output.='</tr>';
        return $output;
    }
    public static function getHTMLHeader(){
        $output =

        return $output;
    }
}





class recordFactory {
    public static function create(Array $field = null, Array $input = null){
        $input = new input($field, $input);
        return $input;
    }
}
?>
