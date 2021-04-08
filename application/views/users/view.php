

<h2 class="text-center"><?php echo $title; ?></h2>

    <div class="container" id="flashdata">
      <!-- Flash messages -->
      <?php if($this->session->flashdata('user_entered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_entered').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_updated').'</p>'; ?>
      <?php endif; ?>
    </div>

    <div id="content" class="container p-4" style="width: 800px;">
        <table class="table table-striped" id="users">
            <thead>
                <th scope="col">Edit</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Username</th>
                <th scope="col">Supervisor</th>
                <th scope="col">Active</th>
                <th scope="col">Role</th>
            </thead>
            <tbody id="users-body"> 
                <?php foreach($users as $user) : ?>
                <tr>
                    <td><a href="<?php echo base_url(); ?>users/edit/<?php echo $user['id'] ?>">Edit</a></td>
                    <td><?php echo $user['lastname']; ?></td>
                    <td><?php echo $user['firstname']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['supervisor']; ?></td>
                    <td><?php echo $user['active']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- Body of Document -->
    <script>
        $(document).ready(function () {
            $('#users').DataTable({
                "scrollY":        "500px",
                "scrollCollapse": true,
                "paging":         false
            });
        });
    </script>