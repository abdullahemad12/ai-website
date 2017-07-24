
$(document).ready(function(){  
  configure();
});

function configure()
{
    // configure typeahead
    // https://github.com/twitter/typeahead.js/blob/master/doc/jquery_typeahead.md
    $("#q").typeahead({
        autoselect: true,
        highlight: true,
        minLength: 1
    },
    {
        source: search,
        templates: {
            empty: "No matches were found",
            suggestion:_.template('<p><%- name %><br><span style = "color: gray; font-size:10px"><%-email%></span></p>')
        }
    });

    // re-center map after place is selected from drop-down
    $("#q").click(function(){
        $('.q').typeahead('open');
    });

    $("#q").on("typeahead:selected", function(eventObject, suggestion, name) {
        window.location.href= '/members/' + suggestion.id;
    });
}

/*
*
*/
function search(query, cb)
{
 
    $.getJSON("/members/search/" + query)
    .done(function(data, textStatus, jqXHR) {
        // call typeahead's callback with search results (i.e., places)
        cb(data);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {

        // log error to browser's console
        console.log(errorThrown.toString());
    });
}



