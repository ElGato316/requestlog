function setNotifiedDate(){
    //get the checkbox
    var checkBox = document.getElementById("notified");
    var notfied_date = document.getElementById("notified_date");
    var todaydate = new Date();
    var month = ("0" + (todaydate.getMonth() + 1)).slice(-2);
    var day = ("0" + todaydate.getDate()).slice(-2);
    var year = todaydate.getFullYear();
    var datestring = year + "-" + month + "-" + day;
    
    //logic
    if (checkBox.checked == true){
        notified_date.value = datestring;
    }else{
        notified_date.value = "0000-00-00";
    }
}

function dateCompleted(){
    //set variables
    var selectBox = document.getElementById("status_id");
    var date_completed_input = document.getElementById("completed_date");
    var todaydate = new Date();
    var month = ("0" + (todaydate.getMonth() + 1)).slice(-2);
    var day = ("0" + todaydate.getDate()).slice(-2);
    var year = todaydate.getFullYear();
    var datestring = year + "-" + month + "-" + day;

    if (selectBox.value == 1 || selectBox.value == 3 || selectBox.value == 5 || selectBox.value == 12){
        date_completed_input.value = datestring;
    }else{
        date_completed_input.value = "0000-00-00";
    }

}