//Edit
editBox = document.getElementById('editBox');
overlay = document.getElementById('overlay');
btnEdit = document.querySelectorAll('.edit');

firstname = document.getElementById('editFirstname');
lastname = document.getElementById('editLastname');
userid = document.getElementById('userid');

btnCancelEdit = document.getElementById('cancelEdit');
btnEdit.forEach((v) => {
    v.addEventListener('click', (e) => {
        e.preventDefault();
        editBox.classList.toggle('active');
        overlay.classList.toggle('active');
        firstname.value = v.parentElement.parentElement.getElementsByClassName('firstname')[0].innerHTML;
        lastname.value = v.parentElement.parentElement.getElementsByClassName('lastname')[0].innerHTML;
        userid.value = v.parentElement.parentElement.getElementsByClassName('userid')[0].innerHTML;
    })
});

btnCancelEdit.addEventListener('click', (e) => {
    e.preventDefault();
    editBox.classList.toggle('active');
    overlay.classList.toggle('active');
    return false;
});
//End Edit

// Add user
addUserBtn = document.getElementById('addUserBtn');
addUserBox = document.getElementById('addUserBox');
cancelAdd = document.getElementById('cancelAdd');
addUserBtn.addEventListener('click', (e) => {
    e.preventDefault();
    addUserBox.classList.toggle('active')
    overlay.classList.toggle('active');
});
cancelAdd.addEventListener('click', (e) => {
    e.preventDefault();
    addUserBox.classList.toggle('active');
    overlay.classList.toggle('active');
    return false;
});

// End Add user

function checkDelete(event) {
    if (confirm("Do you want to delete")) {
        return true;
    } else {
        event.preventDefault();
        return false;
    }
}
