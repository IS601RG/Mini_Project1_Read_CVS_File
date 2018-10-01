<!--
/**
 * Created by PhpStorm.
 * User: riya
 * Date: 9/29/18
 * Time: 4:39 PM
 */
-->
<?php

class main {
    /*create contructor*/
    public function_construct() {
        $csv_file_data = file_read::csv_file_read();
        

    }
}

/*  create class to read the CSV file */
class file_read {
    static public funtion csv_file_read() {
        $name = 'project1.csv';
        $csv = fileopen($name, 'f');
        return $csv;
    }
}




?>
}