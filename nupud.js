function edit_text(id) {
    var text = $("#text_" + id).text();
    $("body").append("<div id='edit_box' style='z-index:999;position:absolute;top:40%;left:30%;background-color:white;width:600px;height:500px;'></div>");
    $("#edit_box").append("<form id='edit_form' action='edit_text.php' method='post'></form>");
    $("#edit_form").append("<textarea name='text' style='width:550px;height:450px;margin:0 auto;'>" + text + "</textarea>");
    $("#edit_form").append("<input type='hidden' name='id' value='" + id + "'/>");
    $("#edit_form").append("<input type='submit' name='submit' value='OK' />");
}


function fullscreen(path) {
    var img = $("<img class='fullscreen_picture' src='img/galerii/" + path + "' style='width:90%;height:80%;position:fixed;top:5%;left:5%;z-index:1234' />");
    $("body").append(img);

    $(img).on("click", function () {
        this.remove();

    });
}

