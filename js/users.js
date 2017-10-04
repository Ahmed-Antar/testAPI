var request;

$("#formUser").submit(function(event){

    event.preventDefault();

    if (request) {
        request.abort();
    }
    var $form = $(this);

    // Serialize the data in the form
    var serializedData = $form.serialize();

    request = $.ajax({
        url: "api/add_user",
        type: "post",
        data: serializedData
    });

    request.done(function (){
        $('#userAdd').css('display', 'block');
        users();
        console.log("Hooray, it worked!");
    });

    request.fail(function (){
        console.error("The following error occurred: ");
    });

});


var users = function() {
    $('#users').html('');
    var users = "api/users";
    $.getJSON( users, {
        format: "json"
    })
        .done(function( data ) {
            data.forEach(function(element) {
                $( "<tr>" +
                    "<td>"+element.id+"</td>" +
                    "<td>"+element.email+"</td>" +
                    "<td>"+element.name+"</td>" +
                    "<td><a href='home/taskByUser/"+element.id+"'><button class='btn btn-link'>View tasks</button></a></td>"+
                    "<td><a href='api/delete_user/"+element.id+"' class='delete'><button class='btn btn-danger' >Delete</button></a></td>"+
                    "</tr>" ).appendTo( "#users" );
            });
        });
};

$( "#users" ).on( "click", "a", function( event ) {

    event.preventDefault();

    var href = $(this).attr('href');

    console.log(href);
    $.ajax({
        url: href,
        success: function() {
            alert('users deleted');
            users();
        }
    });

});
$( document ).ready(function() {
    users();
});