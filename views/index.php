<!--
/**
 * Created by PhpStorm.
 * User: riya
 * Date: 9/29/18
 * Time: 4:39 PM
 */
-->

<!--
<!DOCTYPE html>
<html>
<head>
    {% include 'header.html' %}

</head>
-->
<body>

<div>
    <table class="yellowTable">

        <?php
        /** wrong file errors  */

        if(isset($_GET['file_error']))
            if($_GET('file_error'))
                echo "<tr>
        <td>Error: Format of the file is wrong. Only .CSV file can be uploaded</td><br>
        </tr></td>";
        ?>
        <tr>
            <td>
                <h2><a href="index.php"> Please Resubmit This Page </a><br><br><br>

                    <form action="projectupload.php" method="post" enctype="multipart/form-data" name="project1" id="project1">
                        <label for="Selectfile">Browse to select file</label>
                        <input type="file" name="selectfile" id="Selectfile" /><br><br><br>
                        <input type="submit" name="submit" value="Submit" />
                        <h3>Format of the file must be in <b>.CSV</b></h3></h2>
                 <!--
                <?php
                echo "SYSTEM TEMPORARY DIRECTORY IS: ". sys_get_temp_dir()."<br>";
                ?>
                -->
                </form>
            </td>
        </tr>
    </table>
</div>

<!--create footer -->
<div id="Footer"></div>


</body>
</html>
