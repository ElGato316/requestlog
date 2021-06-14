<h2 class="text-center"><?php echo $title; ?></h2>

<?php echo form_open('PRS/prs_statistics'); ?>

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

<?php if (!isset($stats)) { ?>
    <h3 class="text-center">No Results</h3>
<?php } else { ?>
    <div class="container" style="width:900px">
    <h3 class="text-center">Statistics From <?=date('m-d-Y',strtotime($start_date))?> To <?=date('m-d-Y',strtotime($end_date))?></h3>
    <div class="row mt-5">
        <div class="col col-4 align-items-center pt-2">
            <p style="font-size:18px">Assigned This Month:</p>
        </div>
        <div class="col d-flex align-items-center">
            <input type="text" name="" id="" value="<?php echo $stats['ReceivedTM']; ?>" style="font-size:16px">
        </div>
    </div>
    <div class="row">
        <div class="col col-4 align-items-center pt-2">
            <p style="font-size:18px">Completed This Month:</p>
        </div>
        <div class="col d-flex align-items-center">
            <input type="text" name="" id="" value="<?php echo $stats['CompletedTM']; ?>" style="font-size:16px">
        </div>
    </div>
    <div class="row">
        <div class="col col-4 align-items-center pt-2">
            <p style="font-size:18px">Videos Redacted This Month:</p>
        </div>
        <div class="col d-flex align-items-center">
            <input type="text" name="" id="" value="<?php echo $stats['VideosRedactedTM']; ?>" style="font-size:16px">
        </div>
    </div>
    <div class="row">
        <div class="col col-4 align-items-center pt-2">
            <p style="font-size:18px">Assigned Year To Date:</p>
        </div>
        <div class="col d-flex align-items-center">
            <input type="text" name="" id="" value="<?php echo $stats['ReceivedYTD']; ?>" style="font-size:16px">
        </div>
    </div>
    <div class="row">
        <div class="col col-4 align-items-center pt-2">
            <p style="font-size:18px">Completed Year To Date:</p>
        </div>
        <div class="col d-flex align-items-center">
            <input type="text" name="" id="" value="<?php echo $stats['CompletedYTD']; ?>" style="font-size:16px">
        </div>
    </div>
    <div class="row">
        <div class="col col-4 align-items-center pt-2">
            <p style="font-size:18px">Redacted Videos Year To Date:</p>
        </div>
        <div class="col d-flex align-items-center">
            <input type="text" name="" id="" value="<?php echo $stats['VideosRedactedYTD']; ?>" style="font-size:16px">
        </div>
    </div>

    </div>
<?php }; ?>