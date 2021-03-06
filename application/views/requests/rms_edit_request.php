

    <?php echo form_open('requests/update'); ?>
		<fieldset class="p-3">
		<legend class="text-center">Edit Request</legend>
		<div class="row">
			<div class="col">
				<label class="form-label">Date Received</label>
				<input type="date" class="form-control" name="date_received" value="<?php echo $request['date_received']; ?>">
                <input type="hidden" name="id" value="<?php echo $request['id']; ?>">
			</div>
			<div class="col">
				<label class="form-label">GovQA #</label>
				<input type="text" class="form-control" name="govqa" value="<?php echo $request['govqa']; ?>">
			</div>
			<div class="col">
				<label class="form-label">PD Case</label>
				<input type="text" class="form-control" name="pd_case" value="<?php echo $request['pd_case']; ?>">
			</div>
			<div class="col">
				<label class="form-label">Activity #</label>
				<input type="text" class="form-control" name="activity_number" value="<?php echo $request['activity_number']; ?>">
			</div>
		</div>
		<div class="row pt-3">
			<div class="col">
				<label class="form-label">User</label><br>
				<select class="form-select" name="user_id">
				    <option selected="<?php echo $request['user_id']; ?>" value="<?php echo $request['user_id']; ?>"><?php echo $request['name']; ?></option>
                    <?php foreach($users as $user): ?>
                    <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                    <?php endforeach; ?>
				</select>
			</div>
			<div class="col">
				<label class="form-label">Status</label><br>
				<select class="form-select" name="status_id" id="status_id" onChange="dateCompleted()">
                    <option selected="<?php echo $request['status_id']; ?>" value="<?php echo $request['status_id']; ?>"><?php echo $request['status_name']; ?></option>
                    <?php foreach($statuses as $status): ?>
                    <option value="<?php echo $status['id']; ?>"><?php echo $status['status']; ?></option>
                    <?php endforeach; ?>
				</select>
			</div>
			<div class="col">
				<label class="form-label">Date Completed:</label>
                <?php if (is_null($request['date_completed'])) { ?>
                    <input type="date" class="form-control" id="completed_date" name="date_completed" value=null>
                <?php } else { ?>
                    <input type="date" class="form-control" id="completed_date" name="date_completed" value="<?php echo $request['date_completed']; ?>">
                <?php }; ?>
			</div>
		</div>
		<div class="row pt-3">
		<div class="col col">
				<label class="form-label">Agency:</label><br>
				<select class="form-select" name="agency_id">
                    <option selected="<?php echo $request['agency_id']; ?>" value="<?php echo $request['agency_id']; ?>"><?php echo $request['agency_name']; ?></option>
                    <?php foreach($agencies as $agency): ?>
                    <option value="<?php echo $agency['id']; ?>"><?php echo $agency['agency']; ?></option>
                    <?php endforeach; ?>
				</select>
			</div>
			<div class="col ml-3">
				<label class="form-label">Agency Contact:</label>
				<input type="text" class="form-control" name="agency_agent" value="<?php echo $request['agency_agent']; ?>">
			</div>
		
		</div>
		<div class="row pt-3">
			<div class="col">
				<label class="form-label"># of Vids</label>
				<input type="text" class="form-control" name="number_of_videos" value="<?php echo $request['number_of_videos']; ?>" style="width: 100px;">
			</div>
			<div class="col">
				<label class="form-label">Redacted</label>
				<input type="text" class="form-control" name="videos_redacted" value="<?php echo $request['videos_redacted']; ?>" style="width: 100px;">
			</div>
			<div class="col">
				<label class="form-label">Video Hours:</label>
				<input type="text" class="form-control" name="hours_reviewed" value="<?php echo $request['hours_reviewed']; ?>" style="width: 100px;">
			</div>
			<div class="col pt-4 mx-auto">
				<label class = "form-check-label pl-5"><input type="checkbox" class="form-check-input" value="1" <?php echo ($request['invoice_needed']==1 ? 'checked' : ''); ?> id="invoice_needed" name="invoice_needed">Invoice Needed</label>
			</div>
			<div class="col">
				<label class="form-label">Date Invoiced:</label>
                <?php if (is_null($request['date_invoiced'])) { ?>
                    <input type="date" class="form-control" id="invoiced_date" name="date_invoiced" value="">
                <?php } else { ?>
                    <input type="date" class="form-control" id="invoiced_date" name="date_invoiced" value="<?php echo $request['date_invoiced']; ?>">
                <?php }; ?>
			</div>
			<div class="col">
				<label class="form-label">Date Paid:</label>
                <input type="date" class="form-control" id="paid_date" name="date_paid" value="<?php echo $request['date_paid']; ?>">
			</div>
		</div>
		<div class="row pt-3 p-3">
			<div class="col col-md-5 form-check border border-primary rounded p-3">
				<label class = "checkbox-inline">Need To Notify Officer</label>
				<?php if($request['officer_notified'] == 0) {
					echo '<input type="checkbox" name="officer_notified" id="notified" value="1" onClick="setNotifiedDate()">';
				 }else{ 
					echo '<input type="checkbox" name="officer_notified" id="notified" value="0" onClick="setNotifiedDate()" checked>';
				} ?>
				</br>
				<label class="form-label pt-3">Date Notified:</label>
                <input type="date" class="form-control" id="notified_date" name="date_notified" value="<?php echo $request['date_notified']; ?>">
			</div>
            <div class="col-md-1">
            </div>
			<div class="col col-md-6 form-check form-switch border border-primary rounded p-3">
				<label class = "checkbox-inline"><input type = "checkbox" value = "1" name="completed_by_other_user" id="other_user" <?php echo ($request['completed_by_other_user']==1 ? 'checked' : ''); ?>> Closed By Other PRS</label>
				</br>
				<label class="form-label pt-3">Other PRS:</label>
                <br>
				<select class="form-select" name="other_user_id">
				    <option selected="<?php echo $request['other_user_id']; ?>" value="<?php echo $request['other_user_id']; ?>"><?php echo $request['name2']; ?></option>
                    <?php foreach($users as $user): ?>
                    <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                    <?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="row pt-3">
			<div class="col">
				<label class="form-label">Comments:</label>
				<textarea class="form-control" rows="5" name="comments"><?php echo $request['comments']; ?></textarea>
			</div>
		</div>
		<div class="pt-3">
			<input class="btn btn-primary" type="submit" value="Submit">
		</div>
		</fieldset>
    </form>
    </div>