$("document").ready(function () {
  // this is code for text editor for our web site
  ClassicEditor.create(document.querySelector("#body")).catch((error) => {
    console.error(error);
  });

  // this code is for our check box function in post section in our cms project
  $("#selectAllBoxes").click(function (event) {
    if (this.checked) {
      $(".checkboxs").each(function () {
        this.checked = true;
      });
    } else {
      $(".checkboxs").each(function () {
        this.checked = false;
      });
    }

    $("#password").click(function () {
      $(this).is(":checked")
        ? $(".allpass").attr("type", "text")
        : $(".allpass").attr("type", "password");
    });
  });
});

function loadUserOnline(){
  $.get("function.php?onlineusers=result" , function (data){
    $(".usersonline").text(data)
  })
}
setInterval(function (){
  loadUserOnline()
} , 500)
