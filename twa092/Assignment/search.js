/*
Authorship:
Name: James Guerra
Student ID: 19045229
Prac Time: Thursday 10am
*/
function validate() {
  var input = document.getElementById('search-input').value;
  var submit = true;
  if(!input.length) {
    document.getElementById('error-message').style.display = "inline-block";
    document.getElementById('inner-search-bar-container').style.border = "2px solid #FE1212";
    var submit = false;
  }
  else {
    document.getElementById('error-message').style.display = "none";
    document.getElementById('inner-search-bar-container').style.border = "2px solid #383838";
    var submit = true;
  }

  return submit;
}

function showPopUp(thing) {
  if(thing == document.getElementById('new-playlist')) {
    var element = document.getElementById('playlist-form-container');
  }
  if(thing == document.getElementById('add-to-playlist')) {
    var element = document.getElementById('playlist-selection-pop-up');
  }
  if(thing == document.getElementById('playlist-redirection-message')) {
    var element = document.getElementById('playlist-redirection-message');
  }
  var overlay = document.getElementsByClassName('maintain-overlay')[0];
  element.style.display = "block";
  overlay.style.visibility = "visible";
  overlay.style.animation = "opac 0.5s";
  overlay.style.animationFillMode = "forwards";

}

function hidePopUp(thing) {
  if(thing == document.getElementById('1')) {
    var element = document.getElementById('playlist-form-container');
  }
  if(thing == document.getElementById('2')) {
    var element = document.getElementById('playlist-selection-pop-up');
  }
  if(thing == document.getElementById('3')) {
    var element = document.getElementById('playlist-redirection-message');
  }
  var overlay = document.getElementsByClassName('maintain-overlay')[0];
  element.style.display = "none";
  overlay.style.visibility = "hidden";
  overlay.style.animation = "none";
}

/* for accessibility purposes - give focus to input when entire div is clicked */
function giveFocus() {
  document.getElementById('playlist-input').focus();
}

function fadeOut() {
  document.getElementById('successful-submission-pop-up').style.animation = "fadeOut 1s 1";
  document.getElementById('successful-submission-pop-up').style.animationDelay = "1s";
  document.getElementById('successful-submission-pop-up').style.animationFillMode = "forwards";
}

function backToTop() {
  document.getElementById('search-input').focus();
}

/* the following function was modified from
https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_scroll_to_top*/
function scrollFunction() {
  var button = document.getElementsByClassName('scroll-to-top')[0];
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    button.style.display = "block";
  }
  else {
    button.style.display = "none";
  }
}
/* end of code segment from
https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_scroll_to_top */

function disable(elem) {
  if(elem.checked == false) {
    document.getElementById('submit-choice').disabled = true;
    document.getElementById('submit-choice').style.cursor = "default";
  }
  else {
    document.getElementById('submit-choice').disabled = false;
    document.getElementById('submit-choice').style.cursor = "pointer";
    document.getElementById('submit-choice').style.border = "2px solid black";
    document.getElementById('submit-choice').style.color = "black";
  }
}
