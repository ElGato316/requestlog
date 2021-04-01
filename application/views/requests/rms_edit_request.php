<h2 class="text-center"><?php echo $title; ?></h2>
    <form>
		<fieldset class="p-3">
		<legend>Request Fields</legend>
		<div class="row">
			<div class="col">
				<label class="form-label">Date Received</label>
				<input type="date" class="form-control" placeholder="Date Received">
			</div>
			<div class="col">
				<label class="form-label">GovQA #</label>
				<input type="text" class="form-control" placeholder="GovQA">
			</div>
			<div class="col">
				<label class="form-label">PD Case</label>
				<input type="text" class="form-control" placeholder="PD Case">
			</div>
			<div class="col">
				<label class="form-label">Activity #</label>
				<input type="text" class="form-control" placeholder="Activity Number">
			</div>
		</div>
		<div class="row pt-3">
			<div class="col">
				<label class="form-label">PRS</label><br>
				<select class="form-select" aria-label="Default select example">
				  <option selected>Open this select menu</option>
				  <option value="1">One</option>
				  <option value="2">Two</option>
				  <option value="3">Three</option>
				</select>
			</div>
			<div class="col">
				<label class="form-label">Status</label><br>
				<select class="form-select" aria-label="Default select example">
				  <option selected>Open this select menu</option>
				  <option value="1">One</option>
				  <option value="2">Two</option>
				  <option value="3">Three</option>
				</select>
			</div>
			<div class="col">
				<label class="form-label">Date Completed:</label>
				<input type="date" class="form-control" placeholder="Date Completed">
			</div>
		</div>
		<div class="row pt-3">
			<div class="col col-3">
				<label class="form-label">Agency:</label><br>
				<select class="form-select" aria-label="Default select example">
				  <option selected>Open this select menu</option>
				  <option value="1">One</option>
				  <option value="2">Two</option>
				  <option value="3">Three</option>
				</select>
			</div>
			<div class="col col-3">
				<label class="form-label">Agency Contact:</label>
				<input type="text" class="form-control" placeholder="Agent">
			</div>
			<div class="col col-2">
				<label class="form-label"># of Vids</label>
				<input type="text" class="form-control" placeholder="Vids" size="2">
			</div>
			<div class="col col-2">
				<label class="form-label">Redacted</label>
				<input type="text" class="form-control" placeholder="Vids" size="2">
			</div>
			<div class="col col-2">
				<label class="form-label">Video Hours:</label>
				<input type="text" class="form-control" placeholder="Agent" size="2">
			</div>
		</div>
		<div class="row pt-3 mx-auto">
			<div class="col form-check pt-4 mx-auto">
				<label class = "checkbox-inline"><input type="checkbox" value="1" id="invoice_needed"> Invoice Needed</label>
			</div>
			<div class="col">
				<label class="form-label">Date Invoiced:</label>
				<input type="date" class="form-control" placeholder="Date Invoiced">
			</div>
			<div class="col">
				<label class="form-label">Date Paid:</label>
				<input type="date" class="form-control" placeholder="Date Paid">
			</div>
		</div>
		<div class="row pt-3 p-3">
			<div class="col col-md-5 form-check border border-primary rounded p-3">
				<label class = "checkbox-inline"><input type="checkbox" value="1" id="notified" onclick="setNotifiedDate()"> Need To Notify Officer</label>
				</br>
				<label class="form-label pt-3">Date Notified:</label>
				<input type="date" class="form-control" id="notified_date">
			</div>
            <div class="col-md-1">
            </div>
			<div class="col col-md-6 form-check form-switch border border-primary rounded p-3">
				<label class = "checkbox-inline"><input type = "checkbox" value = "1"> Closed By Other PRS</label>
				</br>
				<label class="form-label pt-3">Other PRS:</label>
                <br>
				<select class="form-select" aria-label="Default select example">
				  <option selected>Open this select menu</option>
				  <option value="1">One</option>
				  <option value="2">Two</option>
				  <option value="3">Three</option>
				</select>
			</div>
		</div>
		<div class="row pt-3">
			<div class="col">
				<label class="form-label">Comments:</label>
				<textarea class="form-control" rows="5"></textarea>
			</div>
		</div>
		<div class="pt-3">
			<input class="btn btn-primary" type="submit" value="Submit">
		</div>
		</fieldset>
    </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <script>
		function setNotifiedDate(){
			//get the checkbox
			var checkBox = document.getElementById("notified");
			//get notified date text box
			var notfied_date = document.getElementById("notified_date");
			var todaydate = new Date();
			var month = ("0" + (todaydate.getMonth() + 1)).slice(-2);
			var day = ("0" + todaydate.getDate()).slice(-2);
			var year = todaydate.getFullYear();
			//var datestring = month + "/" + day + "/" +year;
			var datestring = year + "-" + month + "-" + day;
			
			//logic
			if (checkBox.checked == true){
				notified_date.value = datestring;
				//window.alert(datestring);
			}else{
				notified_date.value = "";
			}
		}
    </script>