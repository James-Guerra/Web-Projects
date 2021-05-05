let setQty = 0
let tableRows = document.querySelector("#workout-info-container").rows


let buttons = Array.from(document.querySelectorAll("a")).map(button => {
	return {button: button, isClicked: false}
})

buttons.forEach(button => {
	button.button.addEventListener("click", () => {
		if(!button.isClicked) {
			button.isClicked = true;
		}
		if(button.isClicked) {
			$("section input")[buttons.indexOf(button)]
			// buttons.indexOf(button)
		}
	})
	
})

$("input").on("input", (e) => {
	setQty = e.target.value
	switch(e.target.id) {
		case "num-of-sets":
			tableRows[1].children[1].innerText = setQty
			break;
		case "num-of-intervals":
			tableRows[2].children[1].innerText = setQty
			break;
		default:
			""
	}
	console.log(e)
})

$(function() {
	let mouseDown = false
	let mouseOffsetX = 164;
	let angle = 0;
	$("#circle-dial").on("mousedown", e => {
		mouseDown = true
	})

	$("#dial, #circle-dial").mouseup(() => {
			mouseDown = false;
	})
	let time = 0
	$("#dial, #circle-dial").mousemove(e => {
		if(mouseDown) {
			let radius = Math.ceil($("svg").width()/2)
			let resetCoords = {
				newOffsetX: e.offsetX - radius,
				newOffsetY: radius - e.offsetY
			}

			if(resetCoords.newOffsetX >= 0 && resetCoords.newOffsetY >= 0) {
				angle = Math.atan( resetCoords.newOffsetX / resetCoords.newOffsetY ) * (180 / Math.PI)
			}

			if(resetCoords.newOffsetX >= 0 && resetCoords.newOffsetY < 0) {
				angle = 180 + (Math.atan( resetCoords.newOffsetX / resetCoords.newOffsetY ) * (180 / Math.PI))
			}

			if(resetCoords.newOffsetX <= 0 && resetCoords.newOffsetY < 0) {
				angle = 180 + (Math.atan( resetCoords.newOffsetX / resetCoords.newOffsetY ) * (180 / Math.PI))
			}

			if(resetCoords.newOffsetX <= 0 && resetCoords.newOffsetY >= 0) {
				angle = 360 + (Math.atan( resetCoords.newOffsetX / resetCoords.newOffsetY ) * (180 / Math.PI))
			}

			$("#dial").css("transform", `rotate(${angle}deg)`)
			time = String(Math.floor(angle/6))
			time = time.split("")
			// time.push("","","")
			console.log(time)
			let timeInputs = Array.from(document.querySelectorAll("#time-display input"));
			timeInputs.reverse().forEach(el => {
				if(timeInputs.indexOf(el) == 0 && time.length == 1) {
					el.value = time[0]
				}
				if(time.length == 2) {
					if(timeInputs.indexOf(el) == 0) {
						el.value = time[1]
					}
					if(timeInputs.indexOf(el) == 1) {
						el.value = time[0]
					}
				}
			})
		}
	})

	
});