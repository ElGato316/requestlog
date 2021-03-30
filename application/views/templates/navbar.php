    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3 mt-3 rounded">
        <a class="navbar-brand p-2" href="<?php echo base_url(); ?>">Request Log</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>requests/search">Search Requests By PRS</a></li>
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
    </div>
    </nav>

