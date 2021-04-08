


<div class="col-md-8 mx-auto">
    <?php echo validation_errors(); ?>
    </div>
    
    <div class="col-4 mx-auto">
        <?php echo form_open('users/update'); ?>
            <fieldset>
                <legend class="text-center">Edit User</legend>
                <div class="form-group">
                    <label for="username" class="">First Name:</label>
                    <input type="text" class="form-control" name="firstname" value="<?php echo $user['firstname']; ?>">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                </div><!-- First Name Field -->
                <div class="form-group">
                    <label for="password" class="">Last Name:</label>
                    <input type="text" class="form-control" name="lastname" value="<?php echo $user['lastname']; ?>">
                </div><!-- Last Name Field -->
                <div class="form-group">
                    <label for="lastname" class="">Username:</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>">
                </div><!-- badge Field -->
                <div class="form-group">
                    <label for="password" class="">Password:</label>
                    <input type="text" class="form-control" name="password" value="">
                </div><!-- Password Field -->
                <div class="form-group p-2 mt-2 row">
                    <label for="active" class="col-sm-3">Active:</label>
                    <div class="col-sm-9">
                    <select name="active" id="active">
                        <?php if($user['active'] == 1) : ?>
                            <option value="1" class="form-control" selected>Yes</option>
                            <option value="0" class="form-control">No</option>
                        <?php else : ?>
                            <option value="1" class="form-control">Yes</option>
                            <option value="0" class="form-control" selected>No</option>
                        <?php endif; ?>
                    </select>
                    </div>
                </div><!-- Active Field --> 
                <div class="form-group p-2 mt-2 row">
                    <label for="Role" class="col-sm-3">Supervisor:</label>
                    <div class="col-sm-9">
                    <select name="supervisor" id="role">
                        <?php if($user['supervisor'] == 1) : ?>
                            <option value="1" class="form-control" selected>Yes</option>
                            <option value="0" class="form-control">No</option>
                        <?php else : ?>
                            <option value="1" class="form-control">Yes</option>
                            <option value="0" class="form-control" selected>No</option>
                        <?php endif; ?>
                    </select>
                    </div>
                </div><!-- Supervisor Field -->
                <div class="form-group p-2 mt-2 row">
                    <label for="Role" class="col-sm-3">Role:</label>
                    <div class="col-sm-9">
                    <select name="role" id="role">
                        <?php if($user['role'] == 'prs') : ?>
                            <option value="prs" class="form-control" selected>PRS</option>
                            <option value="sgt" class="form-control">SGT</option>
                        <?php else : ?>
                            <option value="prs" class="form-control">PRS</option>
                            <option value="sgt" class="form-control" selected>SGT</option>
                        <?php endif; ?>
                    </select>
                    </div>
                </div><!-- Supervisor Field -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit User</button>
                </div><!-- Submit Button -->
            </fieldset>
        </form><!-- Add User Form -->
</div>