

<h2 class="text-center"><?php echo $title; ?></h2>

<div class="col-md-8 mx-auto">
    <?php echo validation_errors(); ?>
    </div>
    
    <div class="col-4 mx-auto">
        <?php echo form_open('users/update'); ?>
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
                <input type="text" class="form-control" name="password" value="<?php echo $user['password']; ?>">
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
        </form><!-- Add User Form -->

<!--     <script src="<?php //echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
</div>