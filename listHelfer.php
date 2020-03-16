<?php
include_once("site/loaddata.php");
?>
<html>
<header>
    <?php
    include_once("site/headdata.php");
    ?>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="js/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="js/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="js/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <!--===============================================================================================-->
</header>
<body>
<?php
include_once("site/header.php");
?>
<div class="site-container">
    <br>
    <h3 style="text-align: center">Helfer</h3>
    <p style="text-align: center; margin-bottom: 5px">Hier finden Sie alle Menschen die aktuell Hilfe anbieten.</p>
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100">
                    <table>
                        <thead>
                        <tr class="table100-head" style="background-color: #58c85b">
                            <th class="column1">Name</th>
                            <th class="column2">Stadt</th>
                            <th class="column3">PLZ</th>
                            <th class="column4">Beschreibung</th>
                            <th class="column5">Kontakt</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $resp = $mysqli->query("SELECT p.vorname, p.nachname, p.plz, p.stadt, p.email, h.beschreibung, p.id FROM Helfer h INNER JOIN Person p ON h.pid = p.id");

                        if($resp->num_rows == 0) {
                            echo "<tr><td>Aktuell sucht niemand nach Hilfe!</td></tr>";
                        }

                        while ($row = $resp->fetch_row()) {
                            echo "<tr>";
                            echo "<td class='column1'>".$row[0] . " " . $row[1].". </td>";
                            echo "<td class='column2'>".$row[3]."</td>";
                            echo "<td class='column3'>".$row[2]."</td>";
                            echo "<td class='column4'>".$row[5]."</td>";
                            echo "<td class='column5'><a href='formMail.php?name=".$row[0]." ".$row[1]."&pid=".$row[6]."&hilfe=0'>Jetzt Kontaktieren</a></td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="js/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="js/bootstrap/js/popper.js"></script>
<script src="js/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="js/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>