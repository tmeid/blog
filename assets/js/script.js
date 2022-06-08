let tagForm,
    previousTd,
    editBtns = document.querySelectorAll('.edit'),
    cancelEditBtns = document.querySelectorAll('.cancel-edit');

function displayForm(ele, status){
    ele.style.display = status;
}

editBtns.forEach(editBtn => {
    editBtn.addEventListener('click', function(){  
        previousTd = editBtn.previousElementSibling; 
        tagForm = previousTd.childNodes[1];
        // console.log(tagForm); 
        displayForm(tagForm, "flex");
    });
});


cancelEditBtns.forEach(cancelEditBtn => {
    cancelEditBtn.addEventListener('click', function(){  
        tagForm = cancelEditBtn.parentElement; 
        // console.log(tagForm); 
        displayForm(tagForm, "none");
    });
});
    
// cancelEditBtn.addEventListener('click', function(){
//     displayForm(tagForm, "hidden");
// });

//random fontsize, fontweight text
let tags = document.querySelectorAll('.tag'),
    minFontSize = 10,
    maxFontSize = 35;

tags.forEach(tag => {
    tag.style.fontSize = Math.floor(Math.random() * (maxFontSize - minFontSize + 1)) + minFontSize + 'px';
});


// click icon search ==> display search bar
let searchIcon = document.querySelector('.search-icon'),
    searchBar = document.querySelector('.search-bar'),
    popupMenu = document.querySelector('.popup-menu'),
    hamburger = document.querySelector('.hamburger');

searchIcon.addEventListener('click', function(){
    searchBar.style.display = 'block'; 
});

// hamburger.addEventListener('click', function(){
//     popupMenu.classList.toggle('open');
// });

hamburger.onclick = function(event){
    event.stopPropagation();
    popupMenu.classList.toggle('open');
}
// click outside: close a popup menu
document.body.addEventListener('click', () => {
    if(popupMenu.classList.contains('open')){
        popupMenu.classList.remove('open');
    }
});
