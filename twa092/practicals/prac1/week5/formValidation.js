/**
Student ID: 19045229
Name: James Guerra
Campus: Campbelltown
Prac time: Thursday 10am
*/
//Displays text box for when "other" value is selected
function displayOther() {
  if(document.getElementById('title').value == "other") {
    document.getElementById('other').style.display = "inline-block";
    document.getElementById('other').setAttribute("required", "true");
  }
  else {
    document.getElementById('other').style.display = "none";
    document.getElementById('other').removeAttribute("required", "false");
  }
}

/**
 * If the user does not input a value, a red border and a 'required field' message
 * appears
 * @param {DOM element} input element being evaluated
 * @param {integer} index integer value representing the corresponding class index
*/
//Displays 'required field' alert box only for required fields
function requiredField(input, index) {
  if(!input.value.length) {
     document.getElementsByClassName('required')[index].style.display = "inline-block";
     input.style.border = "1px solid red";
  }
  else {
    document.getElementsByClassName('required')[index].style.display = "none";
  }
}

/**
 * Each of the following functions are to validate the user's input depending on
 * depending on the regular expression
 * @param {DOM element} input the element that is being evaluated
*/
//Validates date input
function validateDate(input) {
  var regex = /([0-2][0-9]|3[0-1])\/(0[0-9]|1[0-2])\/\d{4}$/;
  displayAlert(input, regex, 0);
}

//Validates first and last name inputs
function nameValidate(input) {
  var regex = /^[a-zA-Z\s-]+$/;
  displayAlert(input, regex, 1);
}

//Validates address input
function validateAddress(input) {
  var regex = /^[a-zA-Z0-9 \/-]+$/;
  displayAlert(input, regex, 2);

}

//Validates suburb input
function validateSuburb(input) {
  var regex = /^[a-zA-Z -]+$/;
  displayAlert(input, regex, 3);

}

//Validates postcode input
function validatePostcode(input) {
  var regex = /^\d{4}$/;
  displayAlert(input, regex, 4);

}

//Validates daytime phone input
function validatePhone(input) {
  var regex = /^\d{8,10}$/;
  displayAlert(input, regex, 5);

}

//Validates mobile input
function validateMobile(input) {
  var regex_1 = /^04\d{8}/;
  var regex_2 = /^\d{0,10}$/;
  displayAlert(input, regex_1, 6);
  displayAlert(input, regex_1, 7);
  displayAlert(input, regex_2, 8);

}

/**
 * Reference for regular expression
 * Reference:
 *    Title: JavaScript: HTML Form - email validation
 *    Author: w3resource.com
 *    Date: 2011-2020
 *    Availability: https://www.w3resource.com/javascript/form/email-validation.php
*/
//Validates email input
function validateEmail(input) {
  var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  displayAlert(input, regex, 9);

}

//Copy's emergency contact details to next of kin details when checkbox is checked
function copyDetails() {
  if(document.getElementById('checkbox-copy-details').checked) {
    document.getElementById('kin-name').value = document.getElementById('emerg-contact').value;
    document.getElementById('kin-relationship').value = document.getElementById('relationship').value;
    document.getElementById('kin-mobile').value = document.getElementById('emerg-mobile').value;
    document.getElementById('kin-dt-phone').value = document.getElementById('emerg-dt-phone').value;
  }
  else {
    document.getElementById('kin-name').value = "";
    document.getElementById('kin-relationship').value = "";
    document.getElementById('kin-mobile').value = "";
    document.getElementById('kin-dt-phone').value = "";
  }
}

/**
 * This function requires 3 parameters and is used in conjuction with each validate function above.
 * If the regular expression provided is false it will display a message given by the 'alert' class,
 * make the border of the element red and change the status of the submit button to disabled. Otherwise
 * the function with go back to its normal state.
 * If the element doesn't have a required attribute the 'alert' class has no display and no red border
 * @param {DOM element} input the element which will be evaluated
 * @param {Regular Expression} regex a regular expression given by the validation functions above
 * @param {integer} index the index of the class name 'alert'
*/
function displayAlert(input, regex, index) {
  if(regex.test(input.value) == false) {
    document.getElementsByClassName('alert')[index].style.display = "block";
    input.style.border = "1px solid red";
    document.getElementById('submit').disabled = true;
  }
  else {
    document.getElementsByClassName('alert')[index].style.display = "none";
    input.style.border = "1px solid #ccc";
    document.getElementById('submit').disabled = false;
  }
  if(input.hasAttribute("required") == false && input.value == "") {
    document.getElementsByClassName('alert')[index].style.display = "none";
    input.style.border = "1px solid #ccc";
    document.getElementById('submit').disabled = false;
  }
}

//Removes all red borders when AT LEAST one input has been given a value
function removeRedBorder() {
  var dtPhone = document.getElementById('dt-phone');
  var mobile = document.getElementById('mobile');
  var work = document.getElementById('work');
  if(dtPhone.value.length || mobile.value.length || work.value.length) {
    dtPhone.style.border = "1px solid #ccc";
    mobile.style.border = "1px solid #ccc";
    work.style.border = "1px solid #ccc";
    document.getElementById('alert-contact-details').style.display = "none";
    dtPhone.removeAttribute("required", "false");
    mobile.removeAttribute("required", "false");
    work.removeAttribute("required", "false");
  }
}

/*
 * This functions purpose is to ensure the user provides AT LEAST one phone number
 * If the user does not, red borders are placed around all three phone number inputs
 * and an alert message is displayed to give focus to them. OTHERWISE, the inputs should
 * revert back to normal.
*/
function alertContactDetails() {
  var dtPhone = document.getElementById('dt-phone').value.length;
  var mobile = document.getElementById('mobile').value.length;
  var work = document.getElementById('work').value.length;
  if(!dtPhone && !mobile && !work) {
    document.getElementById('alert-contact-details').style.display = "inline-block";
    document.getElementById('dt-phone').style.border = "1px solid red";
    document.getElementById('mobile').style.border = "1px solid red";
    document.getElementById('work').style.border = "1px solid red";
  }
  else {
    document.getElementById('alert-contact-details').style.display = "none";
    document.getElementById('dt-phone').style.border = "1px solid #ccc";
    document.getElementById('mobile').style.border = "1px solid #ccc";
    document.getElementById('work').style.border = "1px solid #ccc";
  }
}

/**
 * @param {DOM element} theForm the form which is to be evaluated
 * @return {boolean} returns true or false
 * Reference:
 *    Title: Lecture-05: Example-7
 *    Author: Davies, P
 *    Date: April 2020
 *    Availability: https://learn-ap-southeast-2-prod-fleet01-xythos.s3-ap-southeast-2.amazonaws.com/5df059da37b55/8252853?response-content-disposition=inline%3B%20filename%2A%3DUTF-8%27%27Lecture-05.pdf&response-content-type=application%2Fpdf&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20200417T082129Z&X-Amz-SignedHeaders=host&X-Amz-Expires=21600&X-Amz-Credential=AKIAIW5OVFIUOTV36DNA%2F20200417%2Fap-southeast-2%2Fs3%2Faws4_request&X-Amz-Signature=5a8c01c67fa59108d5c5ffad9bd387cae0d0c258e4612c3f0afac7b7a76aac99
*/
function validateForm(theForm) {
  var valid = true;
  for (var i = 0; i < theForm.length; i++) {

    if(theForm[i].attributes["required"]) {
      if(theForm[i].value == "") {
        document.getElementById('required-onsubmit').style.display = "block";
        document.documentElement.scrollTop = 0;
        valid = false;
        theForm[i].style.border = '1px solid red';
        alertContactDetails();
      } else {
        theForm[i].style.border = '1px solid #ccc';
        document.getElementById('required-onsubmit').style.display = "none";
      }
    }
  }

  return valid;
}
