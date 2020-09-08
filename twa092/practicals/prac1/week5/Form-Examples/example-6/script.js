/**
 * Validate the form on submit for all required fields
 * @param  {DOM Element} theForm The form being validated
 * @return {Boolean} true | false
 */
function validateForm(theForm) {
  var valid = true;            //assume the form is valid to start with

  // Go through each form input and check it has a value
  if (!theForm.fname.value.length) {
    valid = false;                                                          //form is not valid
    document.getElementById('fname-error').style.display = "inline-block";  //show the error message
    theForm.fname.style.border = "1px solid #ff0000";                          //with a red border around the text box
  } else {
    document.getElementById('fname-error').style.display = "none";          //hide the error message
    theForm.fname.style.border = "1px solid #ccc";                             //set the border back to normal
  }

  if (!theForm.lname.value.length) {
    valid = false;
    document.getElementById('lname-error').style.display = "inline-block";
    theForm.lname.style.border = "1px solid #ff0000";
  } else {
    document.getElementById('lname-error').style.display = "none";
    theForm.lname.style.border = "1px solid #ccc";
  }

  if (!theForm.pet.value.length) {
    valid = false;
    document.getElementById('pet-label').style.color = '#ff0000';
  } else {
    document.getElementById('pet-label').style.color = "#000000";
  }

  if(isNoCheckboxSelected(theForm.sports)) {
    valid = false;
    document.getElementById('sports-label').style.color = '#ff0000';
  } else {
    document.getElementById('sports-label').style.color = '#000000';
  }

  return valid;     //return the state of the form

}

/**
 * Generic Function to validate all check boxes in a group of checkboxes
 * @param  {DOM Element} checkboxGroup A group of checkboxes
 * @return {Boolean} true | false
 */
function isNoCheckboxSelected(checkboxGroup) {
  for (var i = 0; i < checkboxGroup.length; i++) {
    if (checkboxGroup[i].checked) {
        return false;
    }
  }
  return true;
}
