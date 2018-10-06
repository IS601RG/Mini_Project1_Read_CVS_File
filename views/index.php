<!--
 * Created by PhpStorm.
 * User: riya
 * Date: 9/29/18
 * Time: 5:28 PM
-->

<html>

<title>Mini Project 1 - IS601:101 by Riya Gandhi</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>


<?php

main::start("project1.csv");

class main{

    static public function start($readcsv) {

        $Cfile = csv::getRecords($readcsv);
        $output = html::generateTable($Cfile);
    }
}




/**
$first = new main();

class main {
    public function _construct() {
        $readcvs = file_read::getreadcvs();
        $displaytable = html::printTable($readcvs);
        system::outputTemplate($displaytable);
    }
}

/*  create class to read the CSV file
class file_read {
    static public function getreadcvs() {
        $fname = 'project1.csv';
        $csv = fopen($fname, "r");
        return $csv;
    }
}
/* create class to display table
class html {
    static public function printTable($cvs) {

        $displaytable = '<html><body><table class="table table-bordered">';

        while ($input = fgetcsv($cvs, 5000, ',')) {

            $displaytable .= '<tr>';

            foreach ($input as $column) {

                $displaytable .="<td>$column</td>";
            }

            $displaytable .= '</tr>';

        }

        $displaytable .= '</table></body></html>';
        fclose($cvs);
        return $displaytable;

    }
}
class system {

    static public function outputTemplate($template){

        echo $template;
    }

}
**/


?>
