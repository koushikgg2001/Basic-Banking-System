<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Receiver</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Festive&family=Open+Sans+Condensed:wght@300&display=swap">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
 
    <?php
        include 'config.php';

        if(isset($_POST['submit']))
        {
            $from = $_GET['id'];
            $to = $_POST['to'];
            $amount = $_POST['amount'];
  
            $sql = "SELECT * from users where id=$from";
            $query = mysqli_query($conn,$sql);
            $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.
  
            $sql = "SELECT * from users where id=$to";
            $query = mysqli_query($conn,$sql);
            $sql2 = mysqli_fetch_array($query); // returns array or output of user to which the amount is to be transferred.

        // constraint to check input of negative value by user
            if (($amount)<0)
            {
                echo '<script type="text/javascript">';
                echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
                echo '</script>';
            }

        // constraint to check insufficient balance.
            else if($amount > $sql1['balance']) 
            {
                echo '<script type="text/javascript">';
                echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
                echo '</script>';
            }

        // constraint to check zero values
            else if($amount == 0)
            {
                echo "<script type='text/javascript'>";
                echo "alert('Oops! Zero value cannot be transferred')";
                echo "</script>";
            }

            else 
            {  
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
               
                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE users set balance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                  
                $sender = $sql1['name'];
                $receiver = $sql2['name'];
                date_default_timezone_set("Asia/Kolkata");
                $datetime = date("Y-m-d H:i:s");  

                $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`,`datetime`) VALUES ('$sender','$receiver','$amount','$datetime')";
                $query=mysqli_query($conn,$sql);
  
                if($query){
                    echo "<script> alert('Transaction Successful');
                        window.location='transactionhistory.php';
                    </script>";   
                }
  
                $newbalance= 0;
                $amount =0;
            }
        }
    ?>

    <div class ="background ">
        <div class ="blur">

            <!-- top navigation bar -->
            <nav class="navbar navbar-expand-sm sticky-top navbar-dark">
                <h2 class="navbar-brand">Sparks Bank</h2>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                </ul>
            </nav>

            <!-- amount and details of receiver -->
            <div class="container userdetail">
                <h2 class="text-center heading">Transaction</h2>
                <form method="post" name="tcredit" class="tabletext" >
                    <label>Transfer To:</label>
                    <select name="to" class="form-control" required>
                        <option value="" disabled selected>Choose</option>
                        <?php
                            include 'config.php';
                            $sid=$_GET['id'];
                            $sql = "SELECT * FROM users where id!=$sid";
                            $result=mysqli_query($conn,$sql);
                            while($rows = mysqli_fetch_assoc($result)) 
                            {
                        ?>
                                <option class="table" value="<?php echo $rows['id'];?>" >
                                    <?php echo $rows['name'] ;?> 
                                    (Balance: <?php echo $rows['balance'] ;?> ) 
                                </option>
                        <?php 
                            } 
                        ?>
                    </select>
                    <label>Amount:</label>
                    <input type="number" class="form-control" name="amount" required>   
                    <div class="text-center" >
                        <button class="btn mt-3" name="submit" type="submit">Transfer</button>
                    </div>
                </form>
            </div>

            <!-- footer -->
            <footer class="text-center fixed-bottom mt-5 py-2">
                <div>
                    <p>&copy 2020. Koushik G G<br> The Sparks Foundation </p>
                </div>
            </footer>

        </div>
    </div>
</body>
</html>
