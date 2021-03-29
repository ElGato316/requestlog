

<h2 class="text-center"><?php echo $title; ?></h2>

<div id="content" class="container border p-4" style="width: 800px;">
        <?php echo form_open('requests/add'); ?>
            <div class="form-group row">
                <div class="col">
                    <label for="date-received" class="">Date Received:</label>
                    <input type="date" class="form-control" name="date-received">
                </div><!-- Date Received Field -->
                <div class="col">
                    <label for="date-assigned" class="">Date Assigned:</label>
                    <input type="date" class="form-control" name="date-assigned" value="<?php echo date("Y-m-d"); ?>">
                </div><!-- Date Assigned Field -->
                <div class="col">
                    <label for="govqa" class="">GovQA #:</label>
                    <input type="text" class="form-control" name="govqa" maxlength="14">
                </div><!-- GovQA # Field -->
                <div class="col">
                    <label for="pdcase" class="">PD Case #:</label>
                    <input type="text" class="form-control" name="pd_case" maxlength="14">
                </div><!-- PD Case # Field -->
            </div><!--Top Row-->
            <div class="form-group row">
                <div class="col-4">
                    <label for="agency" class="">Agency:</label><br />
                    <select name="agency_id" id="agency" style="width: 220px;">
                        <?php foreach($agencies as $agency) : ?>
                            <option value="<?php echo $agency['id']; ?>" class="form-control"><?php echo $agency['agency']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><!-- Agency Field --> 
                <div class="col-4">
                    <label for="agency-contact" class="">Agency Contact:</label>
                    <input type="text" class="form-control" name="agency_agent">
                </div><!-- Agency Contact Field -->
                <div class="col-4">
                    <label for="prs" class="">PRS:</label><br />
                    <select name="user_id" id="prs" style="width: 220px;">
                        <?php foreach($users as $user) : ?>
                            <option value="<?php echo $user['id']; ?>" class="form-control"><?php echo $user['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><!-- PRS Field -->
            </div><!--Middle Row-->
            <div class="form-group row">
                <div class="col">
                    <label for="comments" class="">Comments:</label>
                    <textarea name="comments" id="comments" cols="77" rows="10" style="vertical-align: top;"></textarea>
                </div><!-- Comments Field -->
            </div><!--Thrid Row-->    
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Request</button>
            </div><!-- Submit Button -->
        </form><!-- Add User Form -->
    </div><!-- Body of Document -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>