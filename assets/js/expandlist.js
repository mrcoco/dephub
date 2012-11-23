/**************************************************************/
/* Prepares the cv to be dynamically expandable/collapsible   */
/**************************************************************/
function prepareList() {
    $('#expList').find('li:has(ul)')
    .click( function(event) {
        if (this == event.target) {
            $(this).toggleClass('expanded');
            $(this).find('li a').toggle('medium');
        }
    })
    .addClass('collapsed')
    .find('li a').hide();

    //Create the button funtionality
    $('#expandList')
    .unbind('click')
    .click( function() {
        $('.collapsed').addClass('expanded');
        $('.collapsed').find('li a').show('medium');
    })
    $('#collapseList')
    .unbind('click')
    .click( function() {
        $('.collapsed').removeClass('expanded');
        $('.collapsed').find('li a').hide('medium');
    })
};


/**************************************************************/
/* Functions to execute on loading the document               */
/**************************************************************/
$(document).ready( function() {
    prepareList()
});