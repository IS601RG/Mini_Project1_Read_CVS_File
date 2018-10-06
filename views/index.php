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
        $output = <<<'TAG'
<!DOCTYPE html><html lang="en"><head><link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script><head><body><table class="table" table-bordered table-striped">';
TAG;

        return $output;
    }
}

class recordFactory {
    public static function create(Array $field = null, Array $values = null){
        $input = new input($field, $values);
        return $input;
    }
}
class input{
    public function __construct(Array $field = null, $values = null)
    {
        $input = array_combine($field, $values);
        foreach ($input as $property => $values) {
            $this->createProperty($property, $values);
        }
    }
    public function returnArray() {
        $array = (array) $this;
        return $array;
    }
    public function createProperty($name = 'Name', $value = 'Kevin L'){
        $this->{$name} = $value;
    }
}
?>
