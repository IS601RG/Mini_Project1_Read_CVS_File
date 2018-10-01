<!--
/**
 * Created by PhpStorm.
 * User: riya
 * Date: 9/29/18
 * Time: 4:39 PM
 */
-->
<style>
    .tab, .h{
        border: 2px solid darkslategray;
    }

</style>

<?php
    $first = new main();

class main {
    /*create contructor*/
    public function_construct() {
        $csv_file_data = file_read::csv_file_read();
        $print_table = html::show_table($csv_file_data);
        system::display_csv_file_data($print_table);
        

    }
}

/*  create class to read the CSV file */
class file_read {
    static public funtion csv_file_read() {
        $name = 'project1.csv';
        $csv = fopen($name, 'k');
        return $csv;
    }
}
/* create class to display table */
class html {
    static public function print_table($csv, $header = false) {
        echo '<html>
               <body><table class="tab">';

        while ($file_content = fgetcsv($csv, 5000, ',')) {
            echo '<tr>';
            if ($header){
                foreach ($file_content as $file_header){
                    echo "<th class='h'>$file_header</th>";
                }
            }
          else {
              /*content for column*/
              foreach ($file_content as $file_column) {
                  echo "<td class='h'>$file_column</td>";
              }
          }
        }
        echo '<tr>';
    }
        }
        echo '</html></table></body>';
        fclose($csv);

    }
}

?>
