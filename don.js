let links = document.querySelectorAll(".link")
//Slideshow of images
var images = ['./one.jpeg','./new_second.jpg','./third.jpg','./fourth.jpg','./fifth.jpg'] 
var i = 0
function slider(){
    document.getElementById("image").src = images[i]
    if(i<images.length-1){
        i+=1
    }
    else{
        i=0
    }
    setTimeout('slider()',1500)
}
window.onload = slider