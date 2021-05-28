

      <?php if($this->session->flashdata('request_added')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('request_added').'</p>'; ?>
      <?php endif; ?>

<div id="content" class="container mt-3" style="width: 1000px;">
            <div class="row mx-auto">
                <?php echo form_open('requests/add'); ?>
                <fieldset>
                    <legend class="text-center">Add Request</legend>
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
                                <option value="0">Select an Agency</option>
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
                            <label for="prs" class="">User:</label><br />
                            <select name="user_id" id="prs" style="width: 220px;">
                                <option value="0">Select a User</option>
                                <?php foreach($users as $user) : ?>
                                    <option value="<?php echo $user['id']; ?>" class="form-control"><?php echo $user['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><!-- PRS Field -->
                    </div><!--Second Row-->
                    <div class="form-group row">
                        <div class="col">
                            <label for="status" class="">Staus:</label>
                            <select class="form-select" name="status" id="status_id" onChange="dateCompleted()">
                                <option value="0">Set Status</option>
                                <?php foreach($statuses as $status) : ?>
                                    <option value="<?php echo $status['id']; ?>" class="form-control"><?php echo $status['status']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><!-- Status Field -->
                        <div class="col">
                            <label for="date-completed" class="">Date Completed:</label>
                            <input type="date" class="form-control" name="date_completed" id="completed_date">
                        </div><!-- Date Completed Field -->
                        <div class="col form-group form-inline ml-3 mt-3">
                            <label for="status" class="">Invoice Needed:</label>
                            <input type="checkbox" name="invoice_needed" value="1" class="form-control ml-3">
                        </div><!-- Invoice Check -->
                        <div class="col form-group form-inline mt-3">
                            <label for="status" class="block">Number of Videos:</label>
                            <input type="text" name="number_of_videos" id="" class="form-control ml-3" size="2">
                        </div><!--Number of Videos -->
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
                </fieldset>
                </form><!-- Add Request Form -->
            </div>
            <hr>
            <div class="row mt-2">
                <div class="col col-md-4 border rounded border-dark">
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
                <div class="col col-md-7 border rounded border-dark">
                    <table class="table table-striped" id="last-request-entered">
                        <thead>
                            <th scope="col">GovQA</th>
                            <th scope="col">Date Entered</th>
                            <th scope="col">Assigned To</th>
                            <th scope="col">PD Case</th>
                        </thead>
                        <tbody id="last-request-entered-body"> 
                        <?php foreach($requests as $request): ?>
                            <tr>
                                <td><?php echo $request['govqa']; ?></td>
                                <td><?php echo date("Y-m-d", strtotime($request['date_assigned'])); ?></td>
                                <td><?php echo $request['name']; ?></td>
                                <td><?php echo $request['pd_case']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>                        
            </div>
</div><!-- Body of Document -->
  