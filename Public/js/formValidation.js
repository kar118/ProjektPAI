document.getElementById("resetPassBtn").addEventListener("click", function(){
    var email = document.forms["resetPassForm"]["email"].value;
    var password = document.forms["resetPassForm"]["password"].value;
    var confirmPassword = document.forms["resetPassForm"]["confirmPassword"].value;
    
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    var validation = true;

    if(!email.match(mailformat))
    {
        alert("Incorrect email");
        validation = false;
    }   

    if(!password.match(confirmPassword))
    {
        alert("Password dosent match");
        validation = false;
    }
        

    if(password.length < 8)
    {
        alert("Passwords to short");
        validation=false;
    }       
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            // document.getElementById("userTable").innerHTML=this.responseText;
        }
        }
        xmlhttp.open("GET","Ajax/deleteUser.php?id="+val,true);
        xmlhttp.send();
});