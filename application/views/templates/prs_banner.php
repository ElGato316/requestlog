

<div class="container border rounded bg-primary text-white mt-3">
    <div class="row p-3">

    </div><!-- Top Row -->
    <div class="row">
        <div class="col col-md-12">
            <h1 class="text-center"><?php echo $_SESSION['firstname']." ". $_SESSION['lastname']; ?></h1>
        </div>
    </div><!-- Middle Row Name-->
    <div class="row mt-2">
        <div class="col">
            <p>Change Password</p>
        </div><!-- Link -->
        <div class="col">
            <p><a href="<?php echo base_url(); ?>PRS/dashboard" style="color:white;">Dashboard</a></p>
        </div><!-- Link -->
        <div class="col">
            <p><a href="<?php echo base_url(); ?>PRS/paid_open_requests_prs" style="color:white;">Paid/Open</a></p>
        </div><!-- Link -->
        <div class="col">
        <p><a href="<?php echo base_url(); ?>PRS/search_requests" style="color:white;">Search Requests</a></p>
        </div><!-- Link -->
        <div class="col">
            <p>View Statistics</p>
        </div><!-- Link -->
        <div class="col">
            <p><a href="<?php echo base_url(); ?>login/logout" class="text-white">Logout</a></p>
        </div><!-- Link -->
    </div><!-- Bottom Row Links -->

</div><!--Container for Banner-->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/js/local.js"></script>