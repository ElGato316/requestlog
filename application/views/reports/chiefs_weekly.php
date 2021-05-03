

<h2 class="text-center"><?php echo $title; ?></h2>

<?php echo form_open('reports/chiefs_weekly'); ?>

<div class="form-group row mx-auto">
    <div class="col">
        <label class="control-label">Start Date:</label>
        <input type="date" name="start_date" class="form-control">
    </div>
    <div class="col">
        <label class="control-label">End Date:</label>
        <input type="date" name="end_date" class="form-control">        
    </div><!-- Date Received Field -->

</div><!--Top Row-->
<div class="form-group row mx-auto">
    <div class="col">
    </div>
    <div class="col text-right">
        <button type="submit" class="btn btn-primary">Search</button>     
    </div><!-- Date Received Field -->

</div><!--2nd Row-->

<?php echo form_close(); ?>

<?php if (!isset($requests)) { ?>
    <h3 class="text-center">No Results</h3>
<?php } else { ?>
    <div class="row mt-4">
            <div class="col-12 border border-primary rounded p-2">
                <table class="table table-striped" id="chiefs_weekly">
                    <caption>Search Results</caption>
                    <thead>
                        <th scope="col">Agency</th>
                        <th scope="col">Current Week Received</th>
                        <th scope="col">Received YTD</th>
                        <th scope="col">Completed YTD</th>
                        <th scope="col">Last Year To Date</th>
                    </thead>
                    <tbody id="users-body"> 
                    <?php foreach($requests as $request): ?>
                        <tr class="" id="">
                            <td><?php echo $request['date_received']; ?></td>
                            <td><?php echo $request['date_completed']; ?></td>
                            <td><?php echo $request['agency_name']; ?></td>
                            <td><?php echo $request['govqa']; ?></td>
                            <td><?php echo $request['pd_case']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!--Table of Reuqests-->
        </div><!--Main Table-->
<?php }; ?>
<script>
        $(document).ready(function () {
            $('#chiefs_weekly').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
</script>