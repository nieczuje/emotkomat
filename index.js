
// var element = document.querySelector(".door");
// element.addEventListener("click", toggleDoor);

// function toggleDoor() {
//   element.classList.toggle("doorOpen");
// }

function toggleDoor() {
  var cusid_ele = document.getElementsByClassName('door');
for (var i = 0; i < cusid_ele.length; ++i) {
    var item = cusid_ele[i];  
    // item.innerHTML = 'this is value' + i;
  item.classList.remove("doorOpen");
}
  this.classList.toggle("doorOpen");
}

function myFunction() {
  var x, i;
  x = document.querySelectorAll(".door");
  for (i = 0; i < x.length; i++) {
    // x[i].style.backgroundColor = "blue";
    x[i].addEventListener("click", toggleDoor);
    x[i].innerHTML = i + 1;
  }
}


