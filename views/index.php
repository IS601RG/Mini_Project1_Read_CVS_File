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
<html>
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

                 <!--   <h2><br> Format of the file must be in <b>.CSV</b></h2></h2><br><br><br> -->

                    <form action="projectupload.php" method="post" enctype="multipart/form-data" name="file1" id="file1">
                        <label for="file">Browse to select file</label>
                        <input type="file" name="file" id="file" /><br><br><br>
                        <input type="submit" name="submit" value="Submit" />
                    </form>

            </td>
        </tr>
    </table>
</div>

<!--create footer
<div id="Footer"></div> -->

</body>
</html>
