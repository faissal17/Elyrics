var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function() {
    el.classList.toggle("toggled");
};
var Add = document.getElementsByClassName("Add")[0];
const modal_body = document.querySelector(".modal-body");
const another_modal_body = document.querySelector(".another-modal-body");
console.log(Add);

Add.addEventListener("click", Addinputs);

function Addinputs() {
    another_modal_body.append(modal_body.cloneNode(true));
}

// function addbtn() {
//     document.getElementById("form-task").reset();
//     document.getElementById("task-save-btn").style.display = "block";
//     document.getElementById("task-delete-btn").style.display = "none";
//     document.getElementById("task-update-btn").style.display = "none";
// }