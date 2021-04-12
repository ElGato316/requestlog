


<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col">
            <h2 class="text-center">Login Page</h2>
        </div>
        <div class="col">
        </div>
    </div>
    <div class="row">
        <div class="col">
        </div>
        <div class="col mx-auto">
            <?php echo form_open('login/login'); ?>
                <div class="form-group">
                    <input type="text" name="username" id="username" placeholder="User Name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary rounded">Log In</button>
                </div>
            <?php echo form_close(); ?>
        </div>
        <div class="col">
        </div>
    </div>
    <div class="row">
        <div class="col">
        </div>
        <div class="col">
        </div>
        <div class="col">
        </div>
    </div>

</div>