

<h2 class="text-center"><?php echo $title; ?></h2>

<?php echo form_open('requests/search_by_status'); ?>

<div class="form-group row mx-auto">
    <div class="col col-md-3">
    </div>
        <div class="col col-md-6">
            <label for="status_id" class="col-form-label">Search For Status:</label>
            <select class="form-select m-3" name="status_id">
                <option value="">Select Status:</option>
                <?php foreach($statuses as $status): ?>
                <option value="<?php echo $status['id']; ?>"><?php echo $status['status']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-primary">Search</button>
        </div><!-- Date Received Field -->
    <div class="col col-md-3">
    </div>
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
                        <th scope="col">Date Completed</th>
                        <th scope="col">Agency</th>
                        <th scope="col">GovQA #</th>
                        <th scope="col">PD Case #</th>
                        <th scope="col">PRS Assigned</th>
                        <th scope="col">Status</th>
                        <th scope="col">Comments</th>
                    </thead>
                    <tbody id="users-body"> 
                    <?php foreach($requests as $request): ?>
                        <tr class="" id="">
                        <td><a href="<?php echo base_url(); ?>requests/edit/<?php echo $request['id']; ?>">Edit</a></td>
                            <td><?php echo $request['date_received']; ?></td>
                            <td><?php echo $request['date_completed']; ?></td>
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
<?php }; ?>
<script>
        $(document).ready(function () {
            $('#search_requests').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
</script>