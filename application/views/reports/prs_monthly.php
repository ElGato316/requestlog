<h2 class="text-center"><?php echo $title; ?></h2>

<?php echo form_open('reports/prs_monthly_report'); ?>

<div class="form-group row mx-auto">
    <div class="col">
        <label for="" class="control-label">PRS:</label>
        <select class="form-control" name="user">
            <option value="">Select A PRS:</option>
            <?php foreach($users as $user): ?>
            <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
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