initialise();

function initialise() {
    var rowCount = $('.results .tableRow').length;
    $('.rowCount').text(rowCount + ' items');

    //initialise contextmenu and search
    showContextMenu();
    searchTable();

    $('main').slideDown();
}


function showContextMenu() {
    (function ($, window) {
        $.fn.contextMenu = function (settings) {
            return this.each(function () {
                // Open context menu
                $(this).on("contextmenu", function (e) {
                    //open menu 
                    $(settings.menuSelector)
                        .data("invokedOn", $(e.target))
                        .show()
                        .css({
                            position: "absolute",
                            left: getLeftLocation(e),
                            top: getTopLocation(e)
                        })
                        .off('click')
                        .on('click', function (e) {
                            $(this).hide();
                            var $invokedOn = $(this).data("invokedOn");
                            var $selectedMenu = $(e.target);
                            settings.menuSelected.call(this, $invokedOn, $selectedMenu);
                        });
                    return false;
                });
                //make sure menu closes on any click
                $(document).click(function () {
                    $(settings.menuSelector).hide();
                });
            });

            function getLeftLocation(e) {
                var mouseWidth = e.pageX;
                var pageWidth = $(window).width();
                var menuWidth = $(settings.menuSelector).width();
                // opening menu would pass the side of the page
                if (mouseWidth + menuWidth > pageWidth &&
                    menuWidth < mouseWidth) {
                    return mouseWidth - menuWidth;
                }
                return mouseWidth;
            }

            function getTopLocation(e) {
                var mouseHeight = e.pageY;
                var pageHeight = $(window).height();
                var menuHeight = $(settings.menuSelector).height();
                // opening menu would pass the bottom of the page
                if (mouseHeight + menuHeight > pageHeight &&
                    menuHeight < mouseHeight) {
                    return mouseHeight - menuHeight;
                }
                return mouseHeight;
            }
        };
    })(jQuery, window);
    $("#winesTable>#tableBody").contextMenu({
        menuSelector: "#contextMenu",
        menuSelected: function (invokedOn, selectedMenu) {
            var msg = "You selected the menu item '" + selectedMenu.text() +
                "' on the value '" + invokedOn.text() + "'";
            console.log(msg);
        }
    });
}

function searchTable() {

    $(document).ready(function () {
        $(".search").keyup(function () {
            var searchTerm = $(".search").val();
            var listItem = $('.results tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")

            $.extend($.expr[':'], {
                'containsi': function (elem, i, match, array) {
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });

            $(".results tbody .tableRow").not(":containsi('" + searchSplit + "')").each(function (e) {
                $(this).attr('visible', 'false');
            });

            $(".results tbody .tableRow:containsi('" + searchSplit + "')").each(function (e) {
                $(this).attr('visible', 'true');
            });

            var jobCount = $('.results tbody tr[visible="true"]').length;
            $('.rowCount').text(jobCount + ' items');

            if (jobCount == '0') {
                $('.no-result').show();
            } else {
                $('.no-result').hide();
            }
        });
    });
}

function toggleTableEdit() {
    if (!$('#modifyTable').hasClass("modifiable")) {
        $('#modifyTable').toggleClass("btn-info btn-success modifiable");//if table was not modifiable before, make it modifiable now
        $('.wineEdit').removeAttr('disabled');
        $('#contextMenu button').removeAttr('disabled');
        $('#modifyTable').html("Lock Table <i class='fa-solid fa-lock'></i>");
    } else {
        $('#modifyTable').toggleClass("btn-info btn-success modifiable"); //if table was modifiable before, make it readonly now
        $('.wineEdit').prop('disabled', 'true');
        $('#contextMenu button').prop('disabled', 'true');
        $('#modifyTable').text("Modify Table");
    }
}

function generateMainRow(wineBarrelID, bottleID, awardID, varietalID) {
    var finalAwardID = awardID;
    if (Array.isArray(awardID)) {
        finalAwardID = JSON.stringify(awardID); //convert the array of award ids to JSON string
    }

    var mainRow = document.createElement("tr");
    mainRow.innerHTML = '<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><div class="d-flex justify-content-around"><button disabled type="button" onclick="updateTable(this)" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-wineBarrelID=' + wineBarrelID + ' data-bottleID=' + bottleID + ' data-awardID=' + finalAwardID + ' data-varietalID=' + varietalID + ' data-mdb-ripple-color="dark" title="Edit"><i class="fa-regular fa-pen-to-square fa-xl actionIcons"></i></button><button disabled type="button" class="btn btn-link btn-floating btn-sm fw-bold wineEdit" data-mdb-ripple-color="dark" title="Delete"><i class="fa-solid fa-trash fa-xl actionIcons" style="color: #f83a3a;"></i></button></div></td>';

    const subRowDivID = bottleID;
    mainRow.setAttribute("data-mdb-toggle", "collapse");
    mainRow.setAttribute("data-mdb-target", "#" + subRowDivID);
    mainRow.classList.add("accordion-toggle");
    mainRow.classList.add("collapsed");
    mainRow.classList.add("tableRow");
    mainRow.setAttribute("aria-expanded", "false");

    return mainRow;
}


function generateSubRow(wineBarrelID, bottleID) {
    const subRowDivID = bottleID;
    var subRow = document.createElement("tr");
    subRow.innerHTML = '<td colspan="13" class="hiddenRow"><div class="accordian-body collapse" id=' + subRowDivID + '><table class="table table-sm ms-4 table-striped mb-0"><thead class="bg-info text-dark" style="--mdb-bg-opacity:0.19;"><tr><th>Description</th><th>Wineyard</th><th>Award</th><th>Award Year</th><th>Award Details</th><th>Residual Sugar</th><th>Cellaring Potential</th><th>Production Method</th><th>Production Date</th><th>Bottles Made</th><th>Bottles Sold</th><th>Image URL</th></tr></thead><tbody><tr data-mdb-toggle="collapse"><td class="text-truncate" style="max-width: 5px;"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td class="text-truncate" style="max-width: 5px;"></td></tr></tbody></table></div></td> ';

    //to get the cells use->   const cols = selectedSubRow.children[0].children[0].children[0].children[1].children[0].children;
    return subRow;
}

function prepareForUpdate(updateButton) {
    //skip index 0 and index 12(row number and actions column)
    const selectedMainRow = updateButton.closest("tr");
    const colsOne = selectedMainRow.children;

    const selectedSubRow = selectedMainRow.nextElementSibling;
    const colsTwo = getCellsOfSubRow(selectedSubRow);
    const modal = document.getElementsByClassName("modalInputs");

    var m = 0;

    for (var i = 1; i < colsOne.length - 1; i++) {
        modal[m++].value = colsOne[i].innerHTML;
    }
    for (var i = 0; i < colsTwo.length; i++) {
        modal[m++].value = colsTwo[i].innerHTML;
    }
    selectedMainRow.setAttribute("data-mdb-toggle", "collapse");
    const wineBarrelID = selectedMainRow.getAttribute("data-wineBarrelID");
    const bottleID = selectedMainRow.getAttribute("data-bottleID");
    const awardID = selectedMainRow.getAttribute("data-awardID");

    var finalAwardID = awardID;
    if (awardID.indexOf(',') > -1) {
        //split into an array
        finalAwardID = awardID.split(',');
    }
    const varietalID = selectedMainRow.getAttribute("data-varietalID");

    sessionStorage.setItem("wineBarrelID", wineBarrelID); //save the wineBarrelID to session storage
    sessionStorage.setItem("bottleID", bottleID); //save the bottleID to session storage
    sessionStorage.setItem("awardID", finalAwardID); //save the awardID to session storage
    sessionStorage.setItem("varietalID", varietalID); //save the verietalID to session storage
}


function preventRowExtension(updateButton) {
    const selectedMainRow = updateButton.closest("tr");
    selectedMainRow.setAttribute("data-mdb-toggle", "");
}

function getCellsOfSubRow(subRow) {
    const cols = subRow.children[0].children[0].children[0].children[1].children[0].children;
    return cols;
}

function prepareForInsert() {
    const modal = document.getElementsByClassName("modalInputs");
    for (var i = 0; i < modal.length; i++) {
        modal[i].value = "";
    }
}


