function onSubmitSignIn() {

  var a = document.forms["Form"]["user"].value;
  var b = document.forms["Form"]["pass"].value;
  if ((a === "") || (b === "")) {
    alert("Please Fill In All Required Fields");
    return false;
  }

}
