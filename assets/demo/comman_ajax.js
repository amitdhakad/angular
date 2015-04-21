/*----Its use to show reply textarea----*/
function reply_div(id) {
    $('#reply_textar_' + id).removeClass('hidden');
}

/*-----its use to send reply data to controller ------*/
function query_reply(id){
       if ($('#reply_text_value_'+id).val()) {
            $('#reply_textar_'+id).removeClass('has-error');
             	 	
            var form_data = {query_id:id,
                             response:$('#reply_text_value_'+id).val()};
            $.ajax({
                type: "POST",
                cache: false,
                datatype: 'json',
                //contentType: "application/json; charset=utf-8",
                url: site_url+'query_reply',
                data: form_data, // all form fields
                success: function(data) {
                  var data=  jQuery.parseJSON(data);
                    $("#new_reply_ans_"+id).append(data);
                    $('#reply_text_value_'+id).val('');
                } // success
            }); // ajax
        } // IF
        else{
            $('#reply_textar_'+id).addClass('has-error');
            $('#reply_text_value_'+id).attr("placeholder", "This field is required.");
        }
}


/*-----its use to add /n for  texarea  ------*/
function insertNewlines(e)
{
    // Get the number of cols defined (where we will insert breaks manually
    var rowMaxChars = textarea.attr('cols');
    
    // Calculate the row we were on as newlines + 1
    var rowNum = (textarea.val().match(/\n/g) != null) ? textarea.val().match(/\n/g).length + 1 : 1;
    
    // If the chars in textarea are greater than rowMaxChars * rowNum then insert newline
    if( textarea.val().length > rowMaxChars*rowNum && e.keyCode != 8 )
    {
        textarea.val( textarea.val() + "\n" );
    }

    return true;
}


$(document).ready(function() {
    
     //how much items per page to show
    var show_per_page = 5;
    //getting the amount of elements inside content div
    var number_of_items = $('#content').children().size();
    //calculate the number of pages we are going to have
    var number_of_pages = Math.ceil(number_of_items / show_per_page);

    //set the value of our hidden input fields
    $('#current_page').val(0);
    $('#show_per_page').val(show_per_page);

    //now when we got all we need for the navigation let's make it '

    /* 
     what are we going to have in the navigation?
     - link to previous page
     - links to specific pages
     - link to next page
     */
    var navigation_html = '<a class="previous_link" href="javascript:previous();"><i class="icon-long-arrow-left"></i>Previous</a>';
    var current_link = 0;
    while (number_of_pages > current_link) {
        navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link + ')" longdesc="' + current_link + '">' + (current_link + 1) + '</a>';
        current_link++;
    }
    navigation_html += '<a class="next_link" href="javascript:next();">Next<i class="icon-long-arrow-right"></i></a>';

    $('#page_navigation').html(navigation_html);

    //add active_page class to the first page link
    $('#page_navigation .page_link:first').addClass('active_page');

    //hide all the elements inside content div
    $('#content').children().css('display', 'none');

    //and show the first n (show_per_page) elements
    $('#content').children().slice(0, show_per_page).css('display', 'block');
    
    
var number_of_items = $('#query_content').children().size();
    var number_of_pages = Math.ceil(number_of_items / show_per_page);
    $('#query_current_page').val(0);
    $('#query_show_per_page').val(show_per_page);

    var navigation_html = '';
    var current_link = 0;
    while (number_of_pages > current_link) {
        navigation_html += '<a class="query_page_link" href="javascript:query_go_to_page(' + current_link + ')" longdesc="' + current_link + '">' + (current_link + 1) + '</a>';
        current_link++;
    }

    $('#query_page_navigation').html(navigation_html);
    $('#query_page_navigation .query_page_link:first').addClass('query_active_page');
    $('#query_content').children().css('display', 'none');
    $('#query_content').children().slice(0, show_per_page).css('display', 'block');
});






function query_go_to_page(page_num) {
    var show_per_page = parseInt($('#query_show_per_page').val());
    start_from = page_num * show_per_page;
    end_on = start_from + show_per_page;
    $('#query_content').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');
    $('.query_page_link[longdesc=' + page_num + ']').addClass('query_active_page').siblings('.query_active_page').removeClass('query_active_page');
    $('#query_current_page').val(page_num);
}


function previous() {

    new_page = parseInt($('#current_page').val()) - 1;
    //if there is an item before the current active link run the function
    if ($('.active_page').prev('.page_link').length == true) {
        go_to_page(new_page);
    }

}

function next() {
    new_page = parseInt($('#current_page').val()) + 1;
    //if there is an item after the current active link run the function
    if ($('.active_page').next('.page_link').length == true) {
        go_to_page(new_page);
    }

}
function go_to_page(page_num) {
    //get the number of items shown per page
    var show_per_page = parseInt($('#show_per_page').val());

    //get the element number where to start the slice from
    start_from = page_num * show_per_page;

    //get the element number where to end the slice
    end_on = start_from + show_per_page;

    //hide all children elements of content div, get specific items and show them
    $('#content').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');

    /*get the page link that has longdesc attribute of the current page and add active_page class to it
     and remove that class from previously active page link*/
    $('.page_link[longdesc=' + page_num + ']').addClass('active_page').siblings('.active_page').removeClass('active_page');

    //update the current page input field
    $('#current_page').val(page_num);
}