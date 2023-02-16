const deleteSchedule = document.querySelectorAll(".delete-schedule");

function removeSchedule(){
    const removeButton = this;

    const container = removeButton.parentElement;
    const id = container.getAttribute("id");

    fetch('/removeSchedule/'+id).then(function (){
        container.setAttribute('style', 'display: none');
    });
}

deleteSchedule.forEach(button => button.addEventListener("click", removeSchedule));