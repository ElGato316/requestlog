<div class="container">
    <div class="row bg-primary rounded mt-4 p-2">
        <div class="col">
            <h1 class="text-center text-white">Monthly Evaluation for <?php echo $stats['Name']; ?></h1>
            <h3 class="text-center text-white">From <?php echo date('m/d/Y', strtotime($start_date)); ?> to <?php echo date('m/d/Y', strtotime($end_date)); ?></h3>
        </div>
    </div>
    <?php print_r($stats); ?>
    <div class="row">
        <div class="col">
            
        </div>
    </div>

</div>




