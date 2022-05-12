<?php

    include "config.php";

    $sql = "SELECT *FROM `transactions`";

    $result = $conn->query($sql);

?>

<html>
    <head>
        <title>CUSTOMERS</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"></link>
    </head>
    <body>
        <div class="main">
            <div class="header">
                <div class="logo">
                    <p style="font-size: 50px;">DSV BANK</p>
                    <p style="font-size: 20px; color: green;"><span style="color: orange;">EASY</span> <span style="color: green;">BANKING</span></p>

                </div>
                <div class="nav">
                <ul style="font-size:30px; float:right;">
                    <a href="index.php" style="text-decoration: none; color:black;"><li style="list-style: none; text-decoration: none; list-style-type: none;">HOME</li></a>
                        <a href="customers.php" style="text-decoration: none; color:black;"><li style="list-style: none; text-decoration: none; list-style-type: none;">CUSTOMERS</li></a>
                        <a href="transactions.php" style="text-decoration: none; color:black;"><li style="list-style: none; text-decoration: none; list-style-type: none; color:orange;">TRANSACTIONS</li></a>
                        <a href="about.php" style="text-decoration: none; color:black;"><li  style="list-style: none; text-decoration: none; list-style-type: none;">ABOUT ME</li></a>
                        <!-- <a href="adduser.html" style="text-decoration: none;"><li style="list-style: none; text-decoration: none; list-style-type: none;">Add user</li></a> -->
                        
                        
                    </ul>
                </div>
                
            </div>
            <a href="customers.php" style="text-decoration: none;"><button class="btn btn-danger" style="float:right; margin-right:200px; ">CLICK HERE TO TRANSFER</button></a>
            <div class="definition">
                
                    
                    <div class="container">
                        <h2 style="color:red; position:relative;">TRANSACTIONS</h2>
                        <br>
                    <table class="table">
                        <head>
                            <tr>
                                <th>SNO</th>
                                <th>SENDER</th>
                                <th>RECEIVER</th>
                                <th>AMOUNT</th>
                                <th>TIME</th>
                            </tr>
                        </head>
                        <tbody>
                            <?php
                            include "config.php";
                                if($result->num_rows>0){
                                    while($row = $result->fetch_assoc()){
            
                            ?>
                                        <tr>
                                            <td><?php echo $row['S_NO']; ?> </td>
                                            <td><?php echo $row['sender']; ?> </td>
                                            <td><?php echo $row['receiver']; ?> </td>
                                            <td><?php echo $row['balance']; ?> </td>
                                            <td><?php echo $row['time']; ?> </td>

                                            <!-- <td><a class="btn btn-info" href="transfer.php?transfer=<?php echo $row['S_NO']; ?> ">TRANSFER </a></td> -->
                                        </tr>
                                        <?php }
                                }
                                ?>
            
                                </tbody>
            
                            </table>
                            </div>
            
            
            
                
            </div>
            
            <div class="footer">
                <div class="cp">
                <img src="copyright.jpg" alt="cp" style="width:20px; height:20px; border-radius:15px;"><p>MADE BY DS.VASUDEV</p>
                </div>
                <br>
                <p>UNDER THE INTERNSHIP PROGRAM AT THE SPARK'S FOUNDATION</p>

            </div>
        </div>
    </body>

</html>