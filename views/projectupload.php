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

        /*
        $csv_file_data = file_read::csv_file_read();
        $print_table = html::print_table($csv_file_data);
        system::display_csv_file_data($print_table); */


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


        /* per TA Kishore -- this part needs clearificaiton
        while ($file_content = fgetcsv($csv, 5000, ',')) {
            echo '<tr>';
            if ($header){
                foreach ($file_content as $file_header){
                    echo "<th class='t'>$file_header</th>";
                }
            }
          else {
              /*content for column
              foreach ($file_content as $file_column) {
                  echo "<td class='t'>$file_column</td>";
              }
          }
        }
        echo '<tr>';
    }
        }
        echo '</html></table></body>';
        fclose($csv);*/

}


?>