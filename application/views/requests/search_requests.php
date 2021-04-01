

<h2 class="text-center"><?php echo $title; ?></h2>

<?php echo form_open('requests/search'); ?>

<div class="form-group row">
    <div class="col col-md-2">
        <label for="date-received" class="col-form-label">Search For:</label>
    </div>
    <div class="col col-md-8">
        <input type="text" class="form-control" name="input" required="true">
    </div><!-- Date Received Field -->
    <div class="col col-md-2">
        <button type="submit" class="btn btn-primary">Search</button>
    </div><!-- Date Received Field -->
</div><!--Top Row-->

<?php echo form_close(); ?>

<?php if (!isset($requests)) { ?>
    <h3 class="text-center">No Results</h3>
<?php } else { ?>
    <div class="row mt-4">
            <div class="col-12 border border-primary rounded p-2">
                <table class="table table-striped" id="search_requests">
                    <caption>Search Results</caption>
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
                            <td>Edit</td>
                            <td><?php echo $request['date_received']; ?></td>
                            <td><?php echo $request['agency_name']; ?></td>
                            <td><?php echo $request['govqa']; ?></td>
                            <td><?php echo $request['pd_case']; ?></td>
                            <td><?php echo $request['name']; ?></td>
                            <td><?php echo $request['status']; ?></td>
                            <td><?php echo $request['comments']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!--Table of Reuqests-->
        </div><!--Main Table-->
<?php }; ?>

<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script>
        $(document).ready(function () {
            $('#search_requests').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>