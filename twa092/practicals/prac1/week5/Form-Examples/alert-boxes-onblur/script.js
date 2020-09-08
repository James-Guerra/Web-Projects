/**
* Checks that value entered in the text box is a number in the range lower to upper
* @param {DOM Element} element The text box to be validated
* @param {integer} lower The lower bound of the range
* @param {integer} upper The upper bound of the range
* @returns nothing
*/

function validateNumberRange (element, lower, upper) {
  var userInput = element.value;
  if (isNaN(userInput)) {
    alert(userInput + " isn't a number. \nPlease enter numbers only in the range " + lower + " to " + upper);
  }
  else if (userInput < lower || userInput > upper) {
    alert(userInput + " is not in the range " + lower + " to " +  upper);
  }
}
