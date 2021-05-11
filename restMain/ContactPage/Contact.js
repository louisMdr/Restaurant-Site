var refButton = document.getElementById("button");

function validate()
{
	var name = document.getElementsByClassName("inputBox")[0].value;
    var mail = document.getElementsByClassName("inputBox")[2].value;
    var phone = document.getElementsByClassName("inputBox")[1].value;
    var position0 = name.search(/([A-Za-z]{2,}\s[A-Za-z]{2,})|([A-Za-z]{2,})/);
    var position1 = mail.search(/^[a-zA-Z0-9\.!#$%&'*+-/=?^_`{|}~]+@[a-z]+\.[a-z]+/);
    var position2;
    if(phone.length == 0)
    {
		position2 = 0;
    }
    else
    {
    	position2 = phone.search(/(\d{10})|(\(\d{1,3}\)\d{3}-\d{4})/);
    }

    if (position0 != 0) {
        alert("Incorrect name format!");
        return false;
    }
    else if (position2 != 0) {
        alert("Incorrect phone format!");
        return false;
    }else if (position1 != 0) {
        alert("Incorrect email format!");
    } 
    else 
    {
        return true;
    }

};