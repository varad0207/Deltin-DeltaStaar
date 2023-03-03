function validateEmp() {
	var t1 = t2 = t3 = t4 = t5 = t6 = t7 = t8 = t9 = t10 = t11 = t12 = t13 = t14 = false;
	const textReg = /^[A-Za-z]+$/;
    const numReg = /^[0-9]+$/;
    const emailReg = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;

    var empcode = document.getElementById("empcode").value;
    var fname = document.myForm.fname.value;
    var mname = document.myForm.mname.value;
    var lname = document.myForm.lname.value;
    var state = document.myForm.state.value;
    var country = document.myForm.country.value;
    var pincode = document.myForm.pincode.value;
    var phone = document.myForm.contact1.value;
    var email = document.myForm.email.value;
    var aadhar = document.myForm.aadhaar_number.value;
    var salary = document.myForm.salary.value;
    var dob = document.myForm.dob.value;
    var address = document.myForm.address.value;
    var dept = document.myForm.department.value;
    var desig = document.myForm.designation.value;

    var pinstr = pincode.toString();
    var phonestr = phone.toString();
    var aadharstr = aadhar.toString();
    var salarystr = salary.toString();

    if(empcode.length == ""){
        document.getElementById("valid-empcode").innerHTML = "Field cannot be empty!";
    }
    else
        t12 = true;
    if(textReg.test(fname) && fname.length != ""){
    	t1 = true;
    	document.getElementById("valid-fname").innerHTML = "Field is valid!";
    }
    else
    	document.getElementById("valid-fname").innerHTML = "Enter a valid first name!";
    if(textReg.test(mname) && mname.length != ""){
    	t2 = true;
    	document.getElementById("valid-mname").innerHTML = "Field is valid!";
    }
    else
    	document.getElementById("valid-mname").innerHTML = "Enter a valid middle name!";
    if(textReg.test(lname) && lname.length != ""){
    	t3 = true;
    	document.getElementById("valid-lname").innerHTML = "Field is valid!";
    }
    else
    	document.getElementById("valid-lname").innerHTML = "Enter a valid last name!";
    if(textReg.test(state) && state.length != ""){
    	t4 = true;
    	document.getElementById("valid-state").innerHTML = "Field is valid!";
    }
    else
    	document.getElementById("valid-state").innerHTML = "Enter a valid state name!";
    if(textReg.test(country) && country.length != ""){
    	t5 = true;
    	document.getElementById("valid-country").innerHTML = "Field is valid!";
    }
    else
    	document.getElementById("valid-country").innerHTML = "Enter a valid country name!";
    if(numReg.test(pincode) && pinstr.length == 6){
    	t6 = true;
    	document.getElementById("valid-pincode").innerHTML = "Field is valid!";
    }
    else
    	document.getElementById("valid-pincode").innerHTML = "Enter a valid 6 digit pincode!";
    if(numReg.test(phone) && phonestr.length == 10){
    	t7 = true;
    	document.getElementById("valid-phone").innerHTML = "Field is valid!";
    }
    else
    	document.getElementById("valid-phone").innerHTML = "Enter a valid 10 digit phone number!";
    if(emailReg.test(email) && email.length != ""){
    	t8 = true;
    	document.getElementById("valid-email").innerHTML = "Field is valid";
    }
    else
    	document.getElementById("valid-email").innerHTML = "Enter a valid email address!";
    if((numReg.test(aadhar) && aadharstr.length == 16) || aadharstr.length == ""){
    	t9 = true;
    	document.getElementById("valid-aadhar").innerHTML = "Field is valid!";
    }
    else
    	document.getElementById("valid-aadhar").innerHTML = "Enter a valid 16 digit aadhar number!";
    if(numReg.test(salary) || salarystr.length == ""){
    	t10 = true;
    	document.getElementById("valid-salary").innerHTML = "Field is valid!";
    }
    else
    	document.getElementById("valid-salary").innerHTML = "Enter a valid salary!";
    if(dob.length == "" || address.length == ""){
    	document.getElementById("valid-dob").innerHTML = "Field cannot be empty!";
    	document.getElementById("valid-add").innerHTML = "Field cannot be empty!";
    }
    else
        t11 = true;
    if(dept.length == "")
        document.getElementById("valid-dept").innerHTML = "Field cannot be empty!";
    else
        t13 = true;
    if(desig.length == "")
        document.getElementById("valid-desig").innerHTML = "Field cannot be empty!";
    else
        t14 = true;

    if(t1 && t2 && t3 && t4 && t5 && t6 && t7 && t8 && t9 && t10 && t11)
    	return true;
    else
    	return false;
} 