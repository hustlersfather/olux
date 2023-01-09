
function logindiv(n,y,z,x){
    $("#logindiv").html('<h4><img src="files/img/load.gif"></h4>').show();
    $.ajax({
    type:       'GET',
    url:        'log-inpage'+ n +'.html?x='+Math.random(),
    success:    function(data)
    {
        
        $("#logindiv").html(data).show();
        var obj = { Title: y, Url: z };
        if (x != 1) {
          history.pushState(obj, obj.Title, obj.Url);
        }
        else{
          history.replaceState(obj, obj.Title, obj.Url);
        }
        document.title = y;
    }});
}
$(window).on("popstate", function(e) {
    if (event.state) {
        location.replace(document.location);
    }
});