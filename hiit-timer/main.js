let intervalSelection = document.querySelectorAll(".interval-selection input[type='radio']")
intervalSelection.forEach(element => {
  element.addEventListener("click", () => {
    intervalSelection.forEach(thing => {
      console.log(thing.checked)
      if (thing.checked) {
        thing.parentElement.style.backgroundColor = "#0080809e";
      }
      if (!thing.checked) {
        thing.parentElement.style.backgroundColor = "teal";
      }
    })
    
  })
  
})
let intervalPopover = document.querySelector(".interval-gt-10-popover"); 
let popoverActive = document.querySelector("#activate-popover");
popoverActive.addEventListener("click", () => {
  intervalPopover.style.display = "flex";
  // intervalPopover.style.transition = "transform 4s";
  // intervalPopover.style.transform = "translate(-50%, -50%)";
})
let closeButton = document.querySelector(".close-button");
closeButton.addEventListener("click", () => {
  intervalPopover.style.display = "none ";
})

