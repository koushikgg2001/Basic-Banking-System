<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>

    <!-- google fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Festive&family=Open+Sans+Condensed:wght@300&display=swap">
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/table.css">
</head>

<body>

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

            <!-- table of all the transactions -->
            <div class="container transactionhistory">
                <h3 class = "text-center heading">Transaction History</h3>
                <div class="table-responsive">
                    <table class="table table-sm table-condensed">
                        <tbody>
                            <tr>
                                <th scope="col" class="text-center py-2">S.No.</th>
                                <th scope="col" class="text-center py-2">Sender</th>
                                <th scope="col" class="text-center py-2">Receiver</th>
                                <th scope="col" class="text-center py-2">Amount</th>
                                <th scope="col" class="text-center py-2">Date & Time</th>
                            </tr>
                            <?php
                                include 'config.php';
                                $selectquery = " select * from transaction";
                                $query = mysqli_query($conn,$selectquery);
                                while($rows = mysqli_fetch_array($query))
                                {
                            ?>
                                    <tr> 
                                        <td class="py-2"><?php echo $rows['sno']; ?></td>
                                        <td class="py-2"><?php echo $rows['sender']; ?></td>
                                        <td class="py-2"><?php echo $rows['receiver']; ?></td>
                                        <td class="py-2"><?php echo $rows['amount']; ?> </td>
                                        <td class="py-2"><?php echo $rows['datetime']; ?> </td>
                     
                                    </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
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
