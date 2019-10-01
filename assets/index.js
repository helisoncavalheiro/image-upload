document.addEventListener('DOMContentLoaded', function(event){

    document.getElementById("image_file").addEventListener("input", function(){
        var filename = document.getElementById("image_file").value;
        document.getElementById("label_image_file").innerHTML = filename.slice(12);
    }, false);    

});