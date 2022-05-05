

    var myForm = document.getElementById('maForm');
    myForm.addEventListener('submit',function(){
        const nbm = document.getElementById('numero').value;
        message="bonjour";  
        const url="https://api.twilio.com/2010-04-01/Accounts/ACe5f01f2604e6c79921a828f318371afb/Messages.json"
        var myheaders = new Headers({
            'Content-Type' : 'application/x-www-form-urlencoded',
            'Authorization' : 'basic '+btoa("ACe5f01f2604e6c79921a828f318371afb:caef005615b3e6b504ace07a5f12fd7f")
        })
        var myBody='To=+21699640992&From=+19794919653&body='+message,
        var myData={
            method : 'POST',
            headers : myheaders,
            body : myBody
        }
        fetch(url, myData);
        //alert (nbm+' - '+message);


