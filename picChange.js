function change() {
  let img = document.getElementById("myPic");
  let input = document.getElementById("file");
  img.src = URL.createObjectURL(input.files[0]);
}
