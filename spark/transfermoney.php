<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>

    <!-- google fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Festive&family=Open+Sans+Condensed:wght@300&display=swap">
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
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

      <!-- choose the sender -->
      <div class="container transfermoney">
        <h3 class = "text-center heading">Transfer Money</h3>
        <div class="table-responsive">
          <table class="table table-sm table-condensed table-bordered">
            <tbody>
              <tr>
                <th scope="col" class="text-center py-2">Id</th>
                <th scope="col" class="text-center py-2">Name</th>
                <th scope="col" class="text-center py-2">E-Mail</th>               
                <th scope="col" class="text-center py-2">Balance</th>
                <th scope="col" class="text-center py-2">Operation</th>
              </tr>
            <?php
              include 'config.php';
              $selectquery = " select * from users";
              $query = mysqli_query($conn,$selectquery);
              while($rows = mysqli_fetch_array($query))
              {     
            ?>
              <tr> 
                <td class="py-2"><?php echo $rows['id']; ?></td>
                <td class="py-2"><?php echo $rows['name']; ?></td>
                <td class="py-2"><?php echo $rows['email']; ?></td>
                <td class="py-2"><?php echo $rows['balance']; ?> </td>
                <td><a href="selecteduserdetail.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn btn-info">Select user</button></a></td>
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
