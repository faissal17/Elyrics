var el = document.getElementById("wrapper");
var toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function() {
    el.classList.toggle("toggled");
};

function editdTask(id) {
    document.getElementById("task-save-btn").style.display = "none";
    document.getElementById("task-delete-btn").style.display = "block";
    document.getElementById("task-update-btn").style.display = "block";
    document.getElementById("task-id").value = id;
    document.getElementById("title-id").value = document
        .getElementById("songg" + id)
        .getAttribute("data");
    document.getElementById("artist").value = document
        .getElementById("artistt" + id)
        .getAttribute("data");
    document.getElementById("lyrics").value = document
        .getElementById("lyricss" + id)
        .getAttribute("data");
    document.getElementById("date").value = document
        .getElementById("datee" + id)
        .getAttribute("data");
    document.getElementById("album").value = document
        .getElementById("albumm" + id)
        .getAttribute("data");
}

function addbtn() {
    document.getElementById("form-task").reset();
    document.getElementById("task-save-btn").style.display = "block";
    document.getElementById("task-delete-btn").style.display = "none";
    document.getElementById("task-update-btn").style.display = "none";
}