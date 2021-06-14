

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
    <h3 class="text-center">Report For Week Ending: <?php echo date('m/d/Y', strtotime($end_date)); ?></h3>

    <div class="row mt-4">
            <div class="col-12 border border-primary rounded p-2">
                <table class="table table-striped" id="chiefs_weekly">
                    <caption>Chief's Weekly</caption>
                    <thead>
                        <th scope="col">Agency</th>
                        <th class="text-center" scope="col">Current Week Received</th>
                        <th class="text-center" scope="col">Received YTD</th>
                        <th class="text-center" scope="col">Completed YTD</th>
                        <th class="text-center" scope="col">Last Year To Date</th>
                    </thead>
                    <tbody id="users-body"> 
                    <?php foreach($requests as $request): ?>
                        <tr class="" id="">
                            <td><?php echo $request['Agency']; ?></td>
                            <td class="text-center"><?php echo $request['ReceivedTW']; ?></td>
                            <td class="text-center"><?php echo $request['ReceivedTY']; ?></td>
                            <td class="text-center"><?php echo $request['CompletedTY']; ?></td>
                            <td class="text-center"><?php echo $request['ReceivedLYTD']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <td><h5>Totals</h5></td>
                        <td class="text-center"><h5><?php echo $week_total; ?></h5></td>
                        <td class="text-center"><h5><?php echo $received_ytd; ?></h5></td>
                        <td class="text-center"><h5><?php echo $completed_ytd; ?></h5></td>
                        <td class="text-center"><h5><?php echo $received_lytd; ?></h5></td>
                    </tfoot>
                </table>
            </div><!--Table of Reuqests-->
        </div><!--Main Table-->
<?php }; ?>
<!--
<script>
        $(document).ready(function () {
            $('#chiefs_weekly').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
</script>
-->