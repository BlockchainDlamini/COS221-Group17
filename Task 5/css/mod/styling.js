showSearchBar();
const filterSelects = document.querySelectorAll(".filterDivs>select");
const sortSelect = document.getElementById("winesort");
const sortOrderToggle = "fa-solid fa-arrow-up-z-a fa-lg fa-solid fa-arrow-down-z-a fa-lg";

for (var i = 0; i < filterSelects.length; i++) {
    filterSelects[i].classList.add("filterSelectsStyling");
}

sortSelect.classList.add("sort");


function toggleSortOrder() {
    $("#sortOrderIcon").toggleClass(sortOrderToggle);
    var currentValue = $("#sortOrder").attr("value");
    $("#sortOrder").attr("value", sortOrderValue(currentValue));
}

function sortOrderValue(currentValue) {
    if (currentValue == "ASC") {
        return "DESC";
    }
    else {
        return "ASC";
    }
}

function toggleSearchBar(documentBody) {
    if (documentBody.scrollY > 300) {
        $('#searchBarCollapse').collapse('hide');
    }
    else {
        $('#searchBarCollapse').collapse('show');
    }
}

function showSearchBar() {
    $('#searchBarCollapse').addClass('show');
}

showBody();
function showBody() {
    $('.wrapper').fadeIn(300, function () {
        $('footer').slideDown();
    });
}