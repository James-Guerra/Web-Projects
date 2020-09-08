function updatePrice (element) {
  var options = element.selectedOptions;
  var total = 0;

  for (var i = 0; i < options.length; i++) {
    total += parseFloat(options[i].value);
  }

  document.getElementById('price').value = total;
}
