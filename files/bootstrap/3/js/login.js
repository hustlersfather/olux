

        
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