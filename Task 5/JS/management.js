initialise();

function initialise() {
   

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

            $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function (e) {
                $(this).attr('visible', 'false');
            });

            $(".results tbody tr:containsi('" + searchSplit + "')").each(function (e) {
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