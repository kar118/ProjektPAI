function deleteUser(val){
    
    if(val==0)
        tmp = true;
    else 
        tmp = confirm("Do you want to delete user?");

    if(tmp){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("userTable").innerHTML=this.responseText;
            }
            }
            xmlhttp.open("GET","Ajax/deleteUser.php?id="+val,true);
            xmlhttp.send();
    }
    
}

function deleteProductAmount(val){
    if(val==0)
        tmp = true;
    else 
        tmp = confirm("Do you want to delete product?");

    if(tmp){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("userTable").innerHTML=this.responseText;
            }
            }
            xmlhttp.open("GET","Ajax/deleteProductAmount.php?id="+val,true);
            xmlhttp.send();
    }
    
}

function deleteProduct(val){
    if(val==0)
        tmp = true;
    else 
        tmp = confirm("Do you want to delete product?");

    if(tmp){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("userTable").innerHTML=this.responseText;
            }
            }
            xmlhttp.open("GET","Ajax/deleteProduct.php?id="+val,true);
            xmlhttp.send();
    }
    
}

function addProductAmount(val){
    if(val==0)
        tmp = true;
    else 
        tmp = confirm("Do you want to delete product?");

    if(tmp){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("userTable").innerHTML=this.responseText;
            }
            }
            xmlhttp.open("GET","Ajax/addProductAmount.php?id="+val,true);
            xmlhttp.send();
    }
    
}

function addNewProduct(){
    if(tmp){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("userTable").innerHTML=this.responseText;
            }
            }
            xmlhttp.open("GET","Ajax/addNewProduct.php",true);
            xmlhttp.send();
    }
}

function showProducts(){
    addProductAmount(0);
}
document.getElementById("users").addEventListener("click",function(){
    deleteUser(0);
})

document.getElementById("products").addEventListener("click",function(){
    deleteProduct(0);
})