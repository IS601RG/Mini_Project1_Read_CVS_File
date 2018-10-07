<?php
/*
* Created by PhpStorm.
 * User: riya
 * Date: 9/29/18
 * Time: 5:28 PM
 */

main::start("project1.csv");

class main {

    static public function start($projectname) {
        $records =csv::getRecords($projectname);
        $table = html::generateTable($records);
        system::display_table($table);
    }
}
/*create html class to display table*/
class html {
    public static function generateTable($records) {
        $table = self::getHeader();
        $count = 0;
        foreach ($records as $record) {
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
/*create csv file class to read the file*/
class csv {

    /**
     * @param $projectname
     * @return array
     */
    static public function getRecords($projectname) {

        $readfile = fopen($projectname,  "r");
        $fieldvalue = array();
        $records = array();
        $count = 0;
        while(!feof($readfile)) {
            $record = fgetcsv($readfile, 5000, ',');

            if($count == 0) {
                $fieldvalue = $record;
            }
            else {
                $records[] = recordFactory::create($fieldvalue, $record);
            }
            $count++;
        }
        fclose($readfile);
        return $records;
    }
}
class recordFactory {

    public static  function  create(Array $fieldvalue = null, Array $values = null) {
        $record = new record($fieldvalue, $values);
        return $record;
    }
}
class record {

    public function __construct(Array $fieldvalue =null, $values = null) {
        if (count($fieldvalue) == count($values)) {
            $record = array_combine($fieldvalue,$values);
            foreach ($record as $property => $value) {
                $this->createProperty($property,$value);
            }
        }
    }
    public function createProperty($name = 'Name', $value = 'Kevin L') {
        $name = '<th>' . $name . '</th>';
        $value = '<td>' . $value . '</td>';
        $this->{$name} = $value;
    }

    public function returnArray() {
        $array = (array) $this;
        return $array;
    }
}
class system {

    public static function display_table($fileoutput) {
        echo $fileoutput;
    }
}

