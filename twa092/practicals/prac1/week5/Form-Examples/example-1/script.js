function validate (element) {
    if(!element.value.length) {
        element.labels[0].style.color = "red";
        element.style.border = "1px red dashed";
    } else {
        element.labels[0].style.color = "black";
        element.style.border = "1px #ccc solid";
    }
}
