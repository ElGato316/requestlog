


<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col">
            <?php if($this->session->flashdata('user_loggedout')): ?>
            <?php echo '<label class="text-danger">'.$this->session->flashdata("user_loggedout").'</label>'; ?>  
            <?php endif; ?>
            <h2 class="text-center">Login Page</h2>
        </div>
        <div class="col">
        </div>
    </div>
    <div class="row">
        <div class="col">
        </div>
        <div class="col mx-auto">
            <?php echo form_open('login/view'); ?>
                <div class="form-group">
                    <input type="text" name="username" id="username" placeholder="User Name" class="form-control">
                    <span class="text-danger"><?php echo form_error('username'); ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
                    <span class="text-danger"><?php echo form_error('password'); ?>
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
        <div class="col" id="login_error">
        <?php if($this->session->flashdata('error')): ?>
        <?php echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>'; ?>  
        <?php endif; ?>
         </div>
        <div class="col">
        </div>
    </div>
    <script>
        setTimeout(function(){
            $('#login_error').fadeOut('fast');
        }, 3000);
    </script>

</div>