<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <title>VBC-Customers</title>

     <!-- Custom fonts for this template -->
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">

</head>

<body id="page-top">
<?php
require ("functions.php");
$con = dbConnect();
$read_sql = "SELECT * FROM `customer`";
$read_data = $con->query($read_sql);

?>
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">VBC</div>
      </a>


    


      <!-- Heading -->
      <div class="sidebar-heading">
        Admin Section
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.php">
        <i class="fas fa-user-plus"></i>          
        <span>Add Customer</span></a>
      </li>



    <!-- Heading -->
    <div class="sidebar-heading">
        Customer Section
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="makePayment.php">
        <i class="fas fa-money-check-alt"></i><span>Make Payments</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="viewTransaction.php">
          <i class="fas fa-fw fa-table"></i>
          <span>View Transactions</span></a>
      </li>




      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="adashboard.php">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
            </li>
          </ul>

        </nav>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <center>
                <a class="m-0 font-weight-bold text-primary" data-toggle='modal' data-target="#my_modal">ADD CUSTOMER</h6></a>
              </center>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th >Account No</th>
                      <th >Username</th>
                      <th>Amount</th>
                      <th>Gender</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Registered</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php
                		while($data_array = $read_data->fetch_assoc()) {
                    echo "<tr>";
                    echo  "<td>".$data_array["AccountNo"]."</td>";
                    echo  "<td>".$data_array["UserName"]."</td>";
                    echo  "<td>".$data_array["Amount"]."</td>";
                    echo  "<td>".$data_array["Gender"]."</td>";
                    echo  "<td>".$data_array["Email"]."</td>";
                    echo  "<td>".$data_array["Contact"]."</td>";
                    echo  "<td>".$data_array["RegisteredAt"]."</td>";
                  echo  "<td><a value =".$data_array["AccountNo"]." href='javascript:void(0)' onclick = 'newwin(this)' >";
                    echo  '<center><i class="fa fa-trash" style="color:red font-size:15px"></i></center></a></td>';
                    echo  "</tr>";
                		}
                	?>

                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Modal -->
<form action="add_action.php" method="post">
<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>

    <div class="modal-body">
       <div class="form-group">
            <label>UserName</label> 
                <input type="text" name="userName" placeholder="Enter Username" class="form-control  form-control-lg">
        
        </div>
        <div class="form-group">
            <label>Amount</label> 
                <input type="text" name="amt" placeholder="Enter  Amount" class="form-control  form-control-lg">
        
        </div>
        <fieldset class="form-group">
        <legend class="col-form-label pt-0">Gender</legend>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="M" checked>
          <label class="form-check-label" for="gridRadios1">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="F">
          <label class="form-check-label" for="gridRadios2">
            Female
          </label>
        </div>
        </fieldset>
       <div class="form-group">
            <label>Email</label> 
                <input type="text" name="email" placeholder="Enter Email" class="form-control  form-control-lg">
        
        </div>
        <div class="form-group">
            <label>Contact</label> 
                <input type="text" name="contact" placeholder="Enter Contact" class="form-control  form-control-lg">
        
        </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Add</button>
          </div>
        </div>
      </div>
    </div>
</form>


    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>

            
        function newwin(id)
        {
            Swal.fire({
  title: 'Are you sure?',
  text: 'You will not be able to recover this Account!',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, keep it',
  allowOutsideClick: false
}).then((result) => {
  if (result.value) {
    id = id.getAttribute('value');
    Swal.fire(
      'Deleted!',
      'Account '+id+' has been deleted.',
      'success'
    ).then((result) => {
            window.location.href="delete.php?id="+id;  
    })

  } else if (result.dismiss === Swal.DismissReason.cancel) {
    Swal.fire(
      'Cancelled',
      'Your imaginary record is safe :)',
      'error'
    )
  }
})
} 
</script>
</body>

</html>
