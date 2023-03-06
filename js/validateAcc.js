const textReg = /^[A-Za-z]+$/;
const numReg = /^[0-9]+$/;

function validateText() {
    if(textReg.test(document.myForm.name.value) && document.myForm.name.value.length != 0) {
        document.getElementById("valid-accname").innerHTML = "Field is valid!";
        return true;
    }
    else{
        document.getElementById("valid-accname").innerHTML = "Please enter only alphabtes!";
        return false;
    }
}

function validateNum() {
    if(numReg.test(document.myForm.rooms.value) && document.myForm.rooms.value.length != 0) {
        document.getElementById("valid-room").innerHTML = "Field is valid!";
        return true;
    }
    else{
        document.getElementById("valid-room").innerHTML = "Please enter numeric values only!";
        return false;
    }
}