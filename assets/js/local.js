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
        notified_date.value = "";
    }
}