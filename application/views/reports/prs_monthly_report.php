<div class="container" style="width:900px">
    <div class="row bg-primary rounded mt-4 p-2">
        <div class="col">
            <h1 class="text-center text-white">Monthly Evaluation for <?php echo $stats['Name']; ?></h1>
            <h3 class="text-center text-white">From <?php echo date('m/d/Y', strtotime($start_date)); ?> to <?php echo date('m/d/Y', strtotime($end_date)); ?></h3>
        </div>
    </div>
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
    <div class="row">
        <div class="col col-4 align-items-center pt-2">
            <p style="font-size:18px">Notes:</p>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex align-items-center">
            <textarea class="form-control" name="" id="" value="" rows="6" style="font-size:16px"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col col-2 align-items-bottom mt-5 pt-2">
            <p style="font-size:18px">PRS:</p>
        </div>
        <div class="col d-flex align-items-center border-bottom border-dark">
            
        </div>
    </div>
    <div class="row">
        <div class="col col-2 align-items-bottom mt-5 pt-2">
            <p style="font-size:18px">Supervisor:</p>
        </div>
        <div class="col d-flex align-items-center border-bottom border-dark">
            
        </div>
    </div>

</div>




