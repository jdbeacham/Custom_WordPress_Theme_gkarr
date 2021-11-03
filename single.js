
let width = window.innerWidth;

if (width < 600) {
let karrWait = setInterval(changeSingleImage, 1);
function changeSingleImage() {
    let karrImage = document.getElementById("gkarr_post_image");
karrImage.style.width="100%";
clearInterval(karrWait);
}
    }
