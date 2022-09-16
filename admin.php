<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
</head>
<body>
    <!-- <img src="logo.png"> -->
    <h1> ADMINISTRATOR MODE </h1>
    <div class="container text-center">

    <button class="btn" id="pos">POS</button>
    <button class="btn" id="orders">Orders</button>
    <button class="btn" id="inventory">Inventory</button>
    <button class="btn" id="salesReport">Sales Report</button>
    <button class="btn" id="Logout">Logout</button>
    <script>
    document.getElementById("pos").onclick = function () {window.location.replace('pos.php'); };
    document.getElementById("orders").onclick = function () {window.location.replace('orders.php'); };
    document.getElementById("inventory").onclick = function () {window.location.replace('inventory.php'); };
    document.getElementById("salesReport").onclick = function () {window.location.replace('salesReport.php'); };
    document.getElementById("Logout").onclick = function () {window.location.replace('login.php');
    $.post(
        "method/clearSessionMethod.php", {
        }
    );};
    </script>
</body>
</html>

<style>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
  body{
    background-color: #ED212D;
    font-family: 'Josefin Sans',sans-serif;

  }
  .btn{
    background-color: transparent;
    border: none;
    color: black;
    text-align: center;
    font-size: 25px;
    margin: 20px;
    transition: 0.4s;
    border-radius: 10px;
  }
   .btn:hover{
     color: white;
     background-color: black;
   }
   .container{
     display: grid;
     text-align: right;
     /* max-width: 100%;
     width: 30%;
     height: auto; */

   }
   /* img{
     width: 10%;
     height: 20vh;

   } */
  h1{
    padding-top: 150px;
    text-align: center;
    color: white;
    font-size: 50px;
  }
</style>
