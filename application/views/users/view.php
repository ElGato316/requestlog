

<h2>All Users</h2>

    <div id="content" class="container p-4" style="width: 800px;">
        <table class="table table-striped" id="users">
            <thead>
                <th scope="col">Edit</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">ID</th>
                <th scope="col">Role</th>
                <th scope="col">Active</th>
            </thead>
            <tbody id="users-body"> 
                <?php foreach($users as $user) : ?>
                <tr>
                    <td>Edit</td>
                    <td><?php echo $user['lastname']; ?></td>
                    <td><?php echo $user['firstname']; ?></td>
                    <td><?php echo $user['badge']; ?></td>
                    <td><?php echo $user['supervisor']; ?></td>
                    <td><?php echo $user['active']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- Body of Document -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <!--<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>-->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#users').DataTable({
                "scrollY":        "500px",
                "scrollCollapse": true,
                "paging":         false
            });
        });
    </script>