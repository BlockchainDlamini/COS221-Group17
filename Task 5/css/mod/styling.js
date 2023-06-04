showSearchBar();

const sortOrderToggle = "fa-solid fa-arrow-up-z-a fa-2xl fa-solid fa-arrow-down-z-a fa-2xl";

$('.filterDivs>select').addClass("filterSelectsStyling");

$('#winesort').addClass("sort");
$('#sortOrder').addClass("sortOrder");


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


function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}


window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        $('#searchBarCollapse').collapse('hide');
        $('#scrollToTopBtn').fadeIn();
    }
    else {
        $('#searchBarCollapse').collapse('show');
        $('#scrollToTopBtn').fadeOut();
    }
}

function scrollToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}