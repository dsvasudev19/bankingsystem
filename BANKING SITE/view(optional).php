<?php

    include "config.php";

    $sql = "SELECT *FROM `userdetails`";

    $result = $conn->query($sql);

?>
<!DOCTYPE html>

<html>
    <head>
        <title>CUSTOMERS</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"></link>
    </head>
    <body>
        <div class="container">
            <h2>CUSTOMERS</h2>
        <table class="table">
            <head>
                <tr>
                    <th>SNO</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>AMOUNT</th>
                    <th>ACTION</th>
                </tr>
            </head>
            <tbody>
                <?php
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){

                ?>
                            <tr>
                                <td><?php echo $row['S NO']; ?> </td>
                                <td><?php echo $row['NAME']; ?> </td>
                                <td><?php echo $row['EMAIL']; ?> </td>
                                <td><?php echo $row['AMOUNT']; ?> </td>
                                <td><a class="btn btn-info" href="transfer.php?transfer=<?php echo $row['S NO']; ?> ">TRANSFER </a></td>
                            </tr>
                            <?php }
                    }
                    ?>

                    </tbody>

                </table>
                </div>





    </body>

    </html>
    