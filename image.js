const images = document.querySelectorAll("img");
const contain = document.getElementById("contain");
const imageBox = document.getElementById("imagebox");
const closeBtn = document.getElementById("close-btn");

closeBtn.addEventListener("click", () => {
  imageBox.style.display = "none";
});

// console.log(images);
images.forEach((image) => {
  image.addEventListener("click", showImageBox);
});
function showImageBox() {
  imageBox.style.display = "block";
  let image = document.createElement("img"); // it is also known for <img> tag .
  image.src = this.src;

  image.style.height = 500;
  image.style.width = 500;
  image.style.objectFit = "cover";

  contain.innerHTML = "";
  contain.append(image);
}
