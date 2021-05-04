<h2 class="text-center"><?php echo $title; ?></h2>
        
        <div class="row">
        <!--
            <div class="col-12" id="permission-flashdata">
                <?php //if($this->session->flashdata('permission')): ?>
                <?php //echo '<p class="alert alert-danger">'.$this->session->flashdata('permission').'</p>'; ?>
                <?php //endif; ?>
            </div>
            <script>
                setTimeout(function(){
                    $('#permission-flashdata').fadeOut('fast');
                }, 3000);
            </script>
        -->
        </div>
        <div class="row mt-4">
            <div class="col-12 border border-primary rounded p-2">
                <table class="table table-striped" id="requests">
                    <caption>All Open Request For PRS</caption>
                    <thead>
                        <th scope="col">Edit</th>
                        <th scope="col">Date Received</th>
                        <th scope="col">Agency</th>
                        <th scope="col">GovQA #</th>
                        <th scope="col">PD Case #</th>
                        <th scope="col">PRS Assigned</th>
                        <th scope="col">Status</th>
                        <th scope="col">Comments</th>
                    </thead>
                    <tbody id="users-body"> 
                    <?php foreach($requests as $request): ?>
                        <tr>
                            <td><a href="<?php echo base_url(); ?>PRS/edit_request/<?php echo $request['id']; ?>">Edit</a></td>
                            <td><?php echo $request['date_received']; ?></td>
                            <td><?php echo $request['agency_name']; ?></td>
                            <td><?php echo $request['govqa']; ?></td>
                            <td><?php echo $request['pd_case']; ?></td>
                            <td><?php echo $request['name']; ?></td>
                            <td><?php echo $request['status']; ?></td>
                            <td class="container"><div><?php echo $request['comments']; ?></div></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!--Table of Reuqests-->
        </div><!--Main Table-->
    
    <script>
        $(document).ready(function () {
            $('#requests').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>