function commande(name, argument) {
    if (typeof argument === 'undefined') {
        argument = '';
    }

    document.execCommand(name, false, argument);
}

$("#form_articles").submit(function(e)) {
    e.preventDefault();

    $.post(
          'administration_post.php',
          {
                title: $("#title").val(),
                content: $("#content").val()
          },
          function(result) {
                if (result == "success"){
                      $("#result").html("success inserted values");
                }
                else{
                  $("#result").html("Error occured");
                }
          }
    );
});