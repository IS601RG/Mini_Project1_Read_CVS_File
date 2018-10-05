<!--
 * Created by PhpStorm.
 * User: riya
 * Date: 9/29/18
 * Time: 5:28 PM


<style>
    .table, .t {
        border: 2px solid darkslategray;
    }

</style>
-->

<?php




    $first = new main();

class main {
    /*create contructor*/
    public function _construct() {
        $readcvs = file_read::getreadcvs();
        $displaytable = html::printTable($readcvs);
        system::outputTemplate($displaytable);
    }
}

/*  create class to read the CSV file */
class file_read {
    static public function getreadcvs() {
        $fname = 'project1.csv';
        $csv = fopen($fname, "r");
        return $csv;
    }
}
/* create class to display table */
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


?>