let tagForm,
    previousTd,
    editBtns = document.querySelectorAll('.edit'),
    cancelEditBtns = document.querySelectorAll('.cancel-edit');

function displayForm(ele, status) {
    ele.style.display = status;
}

editBtns.forEach(editBtn => {
    editBtn.addEventListener('click', function () {
        previousTd = editBtn.previousElementSibling;
        tagForm = previousTd.childNodes[1];
        // console.log(tagForm); 
        displayForm(tagForm, "flex");
    });
});


cancelEditBtns.forEach(cancelEditBtn => {
    cancelEditBtn.addEventListener('click', function () {
        tagForm = cancelEditBtn.parentElement;
        // console.log(tagForm); 
        displayForm(tagForm, "none");
    });
});

// click icon search ==> display search bar
let popupMenu = document.querySelector('.popup-menu'),
    hamburger = document.querySelector('.hamburger');


// hamburger.addEventListener('click', function(){
//     popupMenu.classList.toggle('open');
// });

if (hamburger != null) {
    hamburger.onclick = function (event) {
        event.stopPropagation();
        popupMenu.classList.toggle('open');
    }
}

// click outside: close a popup menu
document.body.addEventListener('click', () => {
    if (popupMenu.classList.contains('open')) {
        popupMenu.classList.remove('open');
    }
});