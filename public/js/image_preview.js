function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var imageContainer = document.querySelector('.image_preview img');

        
        

        reader.onload = function (e) {
            if(imageContainer.src != ""){
                document.querySelector('.no_image').style.display = "none";
                imageContainer.style.display = "block";
            }
            imageContainer.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}
