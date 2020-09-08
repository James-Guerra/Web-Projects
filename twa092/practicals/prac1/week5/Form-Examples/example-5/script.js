function enableButton (element) {
  if (element.checked) {
    document.getElementById('submit-form').disabled = false;
  }
  else {
    document.getElementById('submit-form').disabled = true;
  }
  return;
}
