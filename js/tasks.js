var getLocation = function(href) {
    var l = document.createElement("a");
    l.href = href;
    return l;
};

var request;

$("#formTask").submit(function(event){

    event.preventDefault();
    var l = getLocation(document.URL);
    var src = "/"+l.pathname.split('/')[1]+"/api/add_task";
    if (request) {
        request.abort();
    }
    var $form = $(this);
    var serializedData = $form.serialize();
    request = $.ajax({
        url: src,
        type: "post",
        data: serializedData
    });
    request.done(function (){
        $('#TaskAdd').css('display', 'block');
        tasks();
        console.log("it worked!");
    });

    request.fail(function (){
        console.error("error");
    });

});


var tasks = function() {


    var l = getLocation(document.URL);
    var id_user = l.pathname.split('/')[4];
    var src = "/"+l.pathname.split('/')[1]+"/api/taskUser/"+id_user;

    $('#tasks').html('');
    var tasks = src;
    $.getJSON( tasks, {
        format: "json"
    })
    .done(function( data ) {
        data.forEach(function(element) {
            $( "<tr>" +
                "<td>"+element.id+"</td>" +
                "<td>"+element.title+"</td>" +
                "<td>"+element.description+"</td>" +
                "<td>"+element.creations_date+"</td>"+
                "<td>"+element.status+"</td>"+
                "<td><a href='/"+l.pathname.split('/')[1]+"/api/delete_task/"+element.id+"'  class='del'><button class='btn btn-danger' >Delete task</button></a></td>"+
                "</tr>" ).appendTo( "#tasks" );
        });
    });
};

$( "#tasks" ).on( "click", "a", function( event ) {

    event.preventDefault();

    var href = $(this).attr('href');

    console.log(href);
    $.ajax({
        url: href,
        success: function() {
            alert('task deleted');
            tasks();
        }
    });

});


$( document ).ready(function() {
    tasks();
});
