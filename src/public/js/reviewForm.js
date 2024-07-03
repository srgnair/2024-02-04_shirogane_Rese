var fileArea = document.getElementById('dragDropArea');
var fileInput = document.getElementById('fileInput');
fileArea.addEventListener('dragover', function(evt){
  evt.preventDefault();
  fileArea.classList.add('dragover');
});
fileArea.addEventListener('dragleave', function(evt){
    evt.preventDefault();
    fileArea.classList.remove('dragover');
});
fileArea.addEventListener('drop', function(evt){
    evt.preventDefault();
    fileArea.classList.remove('dragenter');
    var files = evt.dataTransfer.files;
    console.log("DRAG & DROP");
    console.table(files);
    fileInput.files = files;
    imagePreview('onChenge',files[0]);
});
function imagePreview(event, f = null) {
  var file = f;
  if(file === null){
      file = event.target.files[0];
  }
  var reader = new FileReader();
  var preview = document.getElementById("previewArea");
  var previewImage = document.getElementById("previewImage");

  if(previewImage != null) {
    preview.removeChild(previewImage);
  }
  reader.onload = function(event) {
    var img = document.createElement("img");
    img.setAttribute("src", reader.result);
    img.setAttribute("id", "previewImage");
    preview.appendChild(img);
  };

  reader.readAsDataURL(file);
<<<<<<< HEAD
}
if (reviewImages && reviewImages.length > 0) {
  reviewImages.forEach(function(image) {
    var imgElement = document.createElement('img');
    imgElement.src = "/storage/" + image.image_path;
    previewArea.appendChild(imgElement);
  });
=======
>>>>>>> parent of a5ff6e7 (Fixed untracked files issue)
}