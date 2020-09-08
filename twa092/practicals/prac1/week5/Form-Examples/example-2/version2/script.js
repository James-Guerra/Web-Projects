function validate (theForm) {

  var invalid;
  invalid = false;
    //validate the textboxes
    if (requiredFieldEmpty(theForm.fname)) invalid = true;
    if (requiredFieldEmpty(theForm.lname)) invalid = true;
    if (requiredFieldEmpty(theForm.pet)) invalid = true;

    //validate the checkboxes
    if (isNoCheckboxSelected(theForm.sports)) invalid = true;

    if(invalid) {
        document.getElementById('form-error').style.display = "inline-block";    //display the error message
        return false;       //stop the form submitting
    }
    return true;            //allow the form to submit
}

function isNoCheckboxSelected (checkBoxGroup) {
    for(var i = 0; i< checkBoxGroup.length; i++) {
        if(checkBoxGroup[i].checked) {
            return false;        //a checkbox was selected
        }
    }
    return true;                 //a checkbox was not selected
}

function requiredFieldEmpty (element){
  if(!element.value.length) {
      return true;
  }
}
