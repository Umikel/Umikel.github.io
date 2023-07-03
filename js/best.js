function ungogo(){
var done1 = document.getElementById("name")
var done2 = document.getElementById("email")
var done3 = document.getElementById("pin")
if (done3.value >3000000000000000 && done3.value <= 6000000000000000 ){
return true;
}
else{
    alert("invail or Incorrect PIN")
    return false;

}
}

