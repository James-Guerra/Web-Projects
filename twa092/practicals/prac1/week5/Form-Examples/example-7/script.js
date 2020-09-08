/**
 * Start of a generic function to be able to check any input for any form
 * @param {DOM Element} theForm The form which will be validated
 * @return {Boolean} true | false
 */
function validateForm(theForm) {
  var valid = true;
  for (var i = 0; i < theForm.length; i++) {

    if(theForm[i].attributes["required"]) {

      if(theForm[i].value == "") {
        valid = false;
        theForm[i].style.border = '1px solid #ff0000';
      } else {
        theForm[i].style.border = '1px solid #ccc';
      }
      if(theForm[i].type == "radio") {
        radiosContainer = document.querySelector(".radios");
        if(theForm[theForm[i].name].value == "") {
          valid = false;
          radiosContainer.style.color = "red";
        } else {
          radiosContainer.style.color = "black";
        }
      }
    }
  }

  return valid;
}
