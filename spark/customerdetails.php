<html>
<head>
  <title>Customer Details</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Festive&family=Open+Sans+Condensed:wght@300&display=swap">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- CSS -->
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

      <!-- table of all the customers' details -->
      <div class="container customerdetails">
        <h3 class = "text-center heading">Customer Details</h3>
          <div class="table-responsive">
            <table class="table table-sm table-condensed">
              <tbody>
                <tr>
                  <th class="text-center py-2">Id</th>
                  <th class="text-center py-2">Name</th>
                  <th class="text-center py-2">E-Mail</th>
                  <th class="text-center py-2">Balance</th>
                </tr>
              <?php
                include 'config.php';
                $selectquery = " select * from users";
                $query = mysqli_query($conn,$selectquery);
                $numofrows = mysqli_num_rows($query);
                while($rows = mysqli_fetch_array($query))
                {        
              ?>
                  <tr> 
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['name']?></td>
                    <td class="py-2"><?php echo $rows['email']?></td>
                    <td class="py-2"><?php echo $rows['balance']?></td>
                  </tr>
              <?php
                }
              ?>
              </tbody>
            </table>
          </div>
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