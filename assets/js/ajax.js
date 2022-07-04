// search and pagination using ajax:
// execute a funcion when an user presses an enter a key on the keyboard
let searchInputs = document.querySelectorAll('.input-search'),
    tagLinks = document.querySelectorAll('.tag');

    console.log(tagLinks);

searchInputs.forEach(searchInput => {
    searchInput.addEventListener('keypress', function (event) {
        if (event.key === 'Enter') {
            searchValue = searchInput.value;

        }

    });

});

tagLinks.forEach(tag => {
    tag.addEventListener('click', function (event) {
        event.stopPropagation();
        // tagSlug = tag.textContent;
        // console.log(tagSlug);
        console.log('dd');


    });

});
// load();
function load(search = '', current_page = 1) {
    let formData = new FormData();
    formData.append('search', search);
    formData.append('current_page', current_page);

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'data_process.php');
    xhttp.send(formData);

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            let html = '';
                response = JSON.parse(xhttp.responseText);


            if (response.data.length > 0) {
                let articles = response.data;
                for(let article of articles){
                    html += '<article class="post-home">';
                    html += '<a href="article/' + article['slug'] + '.html' + ' ">'  
                                + '<img src="assets/imgs/img.png" alt="' + article['title'] + ' ">'
                          + '</a>';
                    html += '<div><h2><a href="article/' + article['slug'] + '.html' + '">' + article['title'] + '</a></h2>';
                    html += '<span class="time">' + article['created_at'] + '</span>';
                    html += '<p class="description">' + article['description'] + '</p>';
                    html += '</div></article>'
                }

            // console.log(xhttp.responseText);
        }
            else {
                html += '<p>Không có dữ liệu</p>';
            }

            document.querySelector('.left-side').innerHTML = html;
        }

    }
    
}