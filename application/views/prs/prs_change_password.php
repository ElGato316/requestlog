<h3 class="text-center pt-5"><?=$title?></h3>

<h4 class="text-danger"><?php echo $this->session->flashdata('password_error'); ?></h4>
<h4 class="text-danger"><?php echo $this->session->flashdata('password_confirm_error'); ?></h4>

<div class="row pt-5">
    <div class="col">

    </div>
    <div class="col">
        <?php echo form_open('PRS/change_password'); ?>

        <div class="form-group row">
            <div class="col form-group">
                <label for="current_passwod" class="control-label">Current Password:</label>
                <input type="password" name="current_password" id="" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col col form-group">
                <label for="new_password" class="control-label">New Password:</label>
                <input type="password" name="new_password" id="" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col col form-group">
                <label for="confirm_password" class="control-label">Confirm Password:</label>
                <input type="password" name="confirm_password" id="" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="col col form-group">
                <input type="submit" value="Change Password" class="btn btn-primary rounded">
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="col">

    </div>

</div>
