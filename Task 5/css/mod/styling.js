const filterSelects = document.querySelectorAll(".filterDivs>select");

for (var i = 0; i < filterSelects.length; i++) {
    filterSelects[i].classList.add("filterSelectsStyling");
}

const sortSelects = document.querySelectorAll(".sortGroup>select");
sortSelects[0].classList.add("sort");
sortSelects[1].classList.add("sortOrder");