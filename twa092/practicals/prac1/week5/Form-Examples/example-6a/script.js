function ValidateNumber(obj, msg) {
  var userInput = obj.value;
  if (userInput.length != 0) {
    if (isNaN(userInput))
      msg.innerHTML = "Numbers only please.";
    else if (userInput > 10)
      msg.innerHTML = "Value must be 10 or below.";
    else
      msg.innerHTML = "";
    }

  return;
}

function ValidateEmail(obj,msg) {
  var email = obj.value;
  if (email.length != 0) {
    var regExpression = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;   //regEx from https://www.regular-expressions.info/email.html
    if (!regExpression.test(email))
      msg.innerHTML = "Invalid email address.";
    else
      msg.innerHTML = "";
  }
  return;
}
