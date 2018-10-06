<?php
/*
* Created by PhpStorm.
 * User: riya
 * Date: 9/29/18
 * Time: 5:28 PM
 */

main::start("project1.csv");
class main{
    static public function start($projectN){
        $fileinput = csv::getRecords($projectN);
        $table = html::generateTable($fileinput);
        echo $table;
    }
}
class html {
    public static function generateTable($fileinput) {
        $table = self::getHeader();
        $count = 0;
        foreach ($fileinput as $record) {
            $array = $record->returnArray();
            if($count == 0) {
                $fields = array_keys($array);
                $table = self::getString($fields, $table);
            }
            $values = array_values($array);
            $table = self::getString($values, $table);
            $count++;
        }
        $table.='</table></body></html>';
        return $table;
    }
    public static function getString($array, $table){
        $table.='<tr>';
        foreach($array as $value){
            $table .= $value;
        }
        $table.= '</tr>';
        return $table;
    }
    public static function getHeader(){
        $table = '<!DOCTYPE html><html lang="en"><head><link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script></head><body><table class="table table-bordered table-striped">';
        return $table;
    }
}
class csv{
    static public function getRecords($projectN) {
        $readfile = fopen($projectN,"r");
        $field = array();
        $count = 0;
        while(! feof($readfile))
        {
            $record = fgetcsv($readfile);
            if($count == 0) {
                $field = $record;
            } else {
                $fileinput[] = recordFactory::create($field, $record);
            }
            $count++;
        }
        fclose($readfile);
        return $fileinput;
    }
}
class record {
    public function __construct(Array $field = null, $values = null )
    {
        $record = array_combine($field, $values);
        foreach ($record as $property => $value) {
            $this->createProperty($property, $value);
        }
    }
    public function returnArray() {
        $array = (array) $this;
        return $array;
    }

    public function createProperty($name = 'Name', $value = 'Kevin L') {

        $this->{$name} = $value;
    }
}
class recordFactory {
    public static function create(Array $field = null, Array $values = null) {
        $record = new record($field, $values);
        return $record;
    }
}
