

      <?php if($this->session->flashdata('request_added')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('request_added').'</p>'; ?>
      <?php endif; ?>

<h2 class="text-center"><?php echo $title; ?></h2>

<div id="content" class="container border p-4" style="width: 1000px;">
        <?php echo form_open('requests/add'); ?>
            <div class="form-group row">
                <div class="col">
                    <label for="date-received" class="">Date Received:</label>
                    <input type="date" class="form-control" name="date_received">
                </div><!-- Date Received Field -->
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
            </div><!--Second Row-->
            <div class="form-group row">
                <div class="col">
                    <label for="status" class="">Staus:</label>
                    <select name="status" id="status" style="">
                        <?php foreach($statuses as $status) : ?>
                            <option value="<?php echo $status['id']; ?>" class="form-control"><?php echo $status['status']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div><!-- Status Field -->
            </div><!--Thrid Row--> 
            <div class="form-group row">
                <div class="col">
                    <label for="comments" class="">Comments:</label>
                    <textarea name="comments" id="comments" cols="100" rows="5" style="vertical-align: top;"></textarea>
                </div><!-- Comments Field -->
            </div><!--Fourth Row-->    
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Request</button>
            </div><!-- Submit Button -->
        </form><!-- Add Request Form -->
            <div class="row">
                <div class="col col-md-4">
                <table class="table table-striped" id="user-request">
                    <thead>
                        <th scope="col">PRS</th>
                        <th scope="col">Open Requests</th>
                    </thead>
                    <tbody id="users-request-body">
                    <?php foreach($opened as $open): ?> 
                        <tr>
                            <td><?php echo $open['name']; ?></td>
                            <td><?php echo $open['opened']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <div class="col col-md-1" id="spacer">
                </div><!--Spacer Div -->
                <div class="col col-md-7">
                <table class="table table-striped" id="last-request-entered">
                    <thead>
                        <th scope="col">GovQA</th>
                        <th scope="col">Date Entered</th>
                        <th scope="col">Assigned To</th>
                    </thead>
                    <tbody id="last-request-entered-body"> 
                    <?php foreach($requests as $request): ?>
                        <tr>
                            <td><?php echo $request['govqa']; ?></td>
                            <td><?php echo date("Y-m-d", strtotime($request['date_assigned'])); ?></td>
                            <td><?php echo $request['name']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>                        
            </div>
</div><!-- Body of Document -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>