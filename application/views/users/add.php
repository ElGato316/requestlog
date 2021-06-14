

    
    <div class="col-md-8 mx-auto">
    <?php echo validation_errors(); ?>
    </div>
    
    <div class="col-4 mx-auto">
        <?php echo form_open('users/add'); ?>
            <fieldset>
                <legend class="text-center"> Add User</legend>
                <div class="form-group">
                    <label for="username" class="">First Name:</label>
                    <input type="text" class="form-control" name="firstname">
                </div><!-- First Name Field -->
                <div class="form-group">
                    <label for="password" class="">Last Name:</label>
                    <input type="text" class="form-control" name="lastname">
                </div><!-- Last Name Field -->
                <div class="form-group">
                    <label for="lastname" class="">Username:</label>
                    <input type="text" class="form-control" name="username">
                </div><!-- badge Field -->
                <div class="form-group">
                    <label for="password" class="">Password:</label>
                    <input type="text" class="form-control" name="password">
                </div><!-- Password Field -->
                <div class="form-group p-2 mt-2 row">
                    <label for="active" class="col-sm-3">Active:</label>
                    <div class="col-sm-9">
                    <select name="active" id="active">
                        <option value="1" class="form-control" selected>Yes</option>
                        <option value="0" class="form-control">No</option>
                    </select>
                    </div>
                </div><!-- Active Field --> 
                <div class="form-group p-2 mt-2 row">
                    <label for="Role" class="col-sm-3">Supervisor:</label>
                    <div class="col-sm-9">
                    <select name="supervisor" id="role">
                        <option value="1" class="form-control">Yes</option>
                        <option value="0" class="form-control" selected>No</option>
                    </select>
                    </div>
                </div><!-- Supervisor Field -->
                <div class="form-group p-2 mt-2 row">
                    <label for="Role" class="col-sm-3">Role:</label>
                    <div class="col-sm-9">
                    <select name="role" id="role">
                        <option value="prs" class="form-control" selected>PRS</option>
                        <option value="sgt" class="form-control">SGT</option>
                    </select>
                    </div>
                </div><!-- Supervisor Field -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add User</button>
                </div><!-- Submit Button -->
            </fieldset>
        </form><!-- Add User Form -->
</div>
