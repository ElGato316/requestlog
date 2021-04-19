    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3 mt-3 rounded">
      <h4 class="text-white pr-3">Request Log</h4>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if(!empty($_SESSION['logged_in'])): ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>users/view" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Users
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>users/add">Add User</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>users/view">All Users</a></li>

              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Requests
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>requests/add">Add Request</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>requests/view">All Open Requests</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>requests/search">Search Requests</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>requests/search_user">Search Requests By PRS</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>requests/search_by_status">Search Requests By Status</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url(); ?>requests/view_pending_invoices">Requests Pending Invoice</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>users/view" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Reports
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Chief's Weekly</a></li>
                <li><a class="dropdown-item" href="#">PRS Monthly</a></li>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item text-white pr-3">Logged in as : <?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></li>
            <li class="nav-item"><a href="<?php echo base_url(); ?>login/logout" class="text-white">Logout</a></li>
          </ul>
          <?php endif; ?>
      </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/js/local.js"></script>
