
<?php

    include "config.php";

    $sql = "SELECT *FROM `userdetails`";

    $result = $conn->query($sql);

?>

<?php
    include "config.php";
    
    
    if(isset($_GET['transfer'])){
        $S_NO = $_GET['transfer'];
        //$qu = "SELECT *FROM `USERDETAILS` WHERE S_NO=$S_NO ";
        //$fetched = $mysql->query($qu);
       
       

    }
?>

<?php
    include "config.php";

    if(isset($_POST['submit'])){
        $from = $S_NO;
        $to = $_POST['toperson'];
        $amount=$_POST['transferamount'];

        $trans = "SELECT *FROM `userdetails` WHERE S_NO=$from";
        $query1 = mysqli_query($conn,$trans);
        $sql1 =  mysqli_fetch_array($query1);

        $trans = "SELECT *FROM `userdetails` WHERE S_NO=$to";
        $query1 = mysqli_query($conn,$trans);
        $sql2 = mysqli_fetch_array($query1);
        

        if($amount<0){
            echo '<script type="text/javascript">';
            echo ' alert("Negative value cannot be transfered !")';
            echo '</script>';
        }

        else if($amount > $sql1['3']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Sorry! you have insufficient balance !")';
        echo '</script>';
    }
    else if($amount == 0){

        echo "<script type='text/javascript'>";
        echo "alert('Zero value cannot be transferred !')";
        echo "</script>";
    }

    else {
        $newbalance = $sql1[3] - $amount;
        $trans = "UPDATE userdetails set AMOUNT=$newbalance where S_NO=$from";
        mysqli_query($conn,$trans);
     
        $newbalance = $sql2[3] + $amount;
        $trans = "UPDATE userdetails set AMOUNT=$newbalance where S_NO=$to";
        mysqli_query($conn,$trans);
        
        $sender = $sql1[1];
        $receiver = $sql2[1];
        
        
        $trans = "INSERT INTO transactions(`sender`, `receiver`, `balance`,`time`) VALUES ('$sender','$receiver','$amount',current_time())";
        $query=mysqli_query($conn,$trans);

        if($query){
             echo "<script> alert('Transaction Successfully !');
                             window.location='transactions.php';
                   </script>";
            
        }

        $newbalance= 0;
        $amount =0;
}


    }

?>

<html>
    <head>
        <title>DSV BANK's</title>
        <link rel="stylesheet" href="styles.css">
        <style>
            #transferamount{
                width:350px;
                height: 55px;
                border:4px solid red;
                border-radius:10px;
                border-bottom:3px solid orange;
                overflow:hidden;

            }
            #transferbutton{
                width:350px;
                height:60px;
                background-color:lightblue;
                color:black;
                border:4px solid green;
                border-radius:10px;
                border-bottom:3px solid orange;
            }

            #transferbutton:hover{
                color:black;
                background-color:red;
            }
            select{
                width:950px;
                height:35px;
                border-radius:10px;
                color:green;
            }
            option{
                width:950px;
                height:30px;
                color:green;
            }
            table{
                width:950px;
                height:50px;
                float:center;
                justify-content:center;
                text-align:center;
                align-items:center;
                border:3px solid red;
                border-radius:5px;
                margin-left:15px; 

            }
            tr,td{
                /* width:100px; */
                height:30px;
                border:3px solid black;
                border-collapse:collapse;
                border-radius:5px;
            }


        </style>
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
                    <a href="index.php" style="text-decoration: none;"><li style="list-style: none; text-decoration: none; list-style-type: none;">HOME</li></a>
                        <a href="customers.php" style="text-decoration: none;"><li style="list-style: none; text-decoration: none; list-style-type: none;">CUSTOMERS</li></a>
                        <a href="transactions.php" style="text-decoration: none;"><li style="list-style: none; text-decoration: none; list-style-type: none;">TRANSACTIONS</li></a>
                        <a href="about.php" style="text-decoration: none;"><li  style="list-style: none; text-decoration: none; list-style-type: none;">ABOUT ME</li></a>
                        <!-- <a href="adduser.html" style="text-decoration: none;"><li style="list-style: none; text-decoration: none; list-style-type: none;">Add user</li></a> -->
                        
                        
                    </ul>
                </div>
                
            </div>
            <div class="definition">
                <div class="container" id="mainbody">
                    <form method="POST" name="tocredit">
                        <label style="font-size:30px;">FROM</label><br><br>
                        <label>
                        <?php 
                            //echo $S_NO;
                            $query="SELECT *FROM `userdetails` WHERE S_NO = '$S_NO' ";
                            $query_run = mysqli_query($conn,$query);
                            GLOBAL $rowf;
                            while($rowf = mysqli_fetch_array($query_run)){
                                
                                ?>
                                <table>
                                    <tr>
                                        <!-- <td> <?php echo $row['S_NO']; ?>  </td> -->
                                        
                                        <td> <?php echo $rowf['NAME']; ?>  </td>
                                        <td> <?php echo $rowf['EMAIL']; ?>  </td>
                                        <td> <?php echo $rowf['AMOUNT']; ?>  </td>
                                    </tr>
                                </table>
                                <?php
                            }
                            
                        ?>
                        </label>
                        <br>
                        <label style="font-size:30px;">TO</label><br><br>
                        <select name="toperson" id="toperson">
                            
                            <?php while($row = mysqli_fetch_array($result)):;?>
                            <option value=<?php echo $row[0] ?> ><?php echo ("$row[1]($row[2])");?><?php echo ("($row[3])");?></option>
                            <?php endwhile ?>
                        </select>
                        <br>
                        <br>
                        <label>AMOUNT</label>
                        <br>
                        <input type="number" size="10" id="transferamount" name='transferamount'>
                        <br>
                        <br>
                        <button id="transferbutton" name="submit" value="submit" method="post">TRANSFER</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer">
                <div class="cp">
                <img src="copyright.jpg" alt="cp" style="width:20px; height:20px; border-radius:15px;"><p>MADE BY DS.VASUDEV</p>
                </div>
                <br>
                <p>UNDER THE INTERNSHIP PROGRAM AT THE SPARK'S FOUNDATION</p>

            </div>
    </body>
</html>

<?php
    if(isset($_GET['transfer'])){
        echo $S_NO;
      
    }
?> 
