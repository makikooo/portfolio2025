const imageTotalNumber = 6,
      mainImageElement = document.getElementById('mainImage');
      imageListElement = document.getElementById('imageList');
      prevImageElement = document.getElementById('prevImage');
      nextImageElement = document.getElementById('nextImage');

let currentSlideNumber = 1;

mainImageElement.setAttribute('src','assets/images/blog01.webp');


function changeSlideStatus() {

    if(currentSlideNumber === 1 ){
        prevImageElement.classList.add("inActive");
    } else {
        prevImageElement.classList.remove('inActive');
    }
    
    if(currentSlideNumber === imageTotalNumber ){
        nextImageElement.classList.add("inActive");
    } else {
        nextImageElement.classList.remove('inActive');
    }

    document.getElementById('currentSlideNumber').textContent = `${currentSlideNumber} / ${imageTotalNumber}`;
}
changeSlideStatus();


for (let i = 0; i < imageTotalNumber; i++) {
    const liElement = document.createElement('li');
    liElement.style.backgroundImage = `url(assets/images/blog0${i + 1}.webp)`;

    liElement.addEventListener('click',() => {
        mainImageElement.setAttribute('src',`assets/images/blog0${i + 1}.webp`)
        currentSlideNumber = i + 1;
        changeSlideStatus();
    });
    imageListElement.appendChild(liElement);
}

prevImageElement.addEventListener('click', () =>{
    if(currentSlideNumber !== 1){
        currentSlideNumber--
        mainImageElement.setAttribute('src',`assets/images/blog0${currentSlideNumber}.webp`)
        changeSlideStatus();
    }
});
nextImageElement.addEventListener('click', () =>{
    if(currentSlideNumber !== imageTotalNumber){
        currentSlideNumber++
        mainImageElement.setAttribute('src',`assets/images/blog0${currentSlideNumber}.webp`)
        changeSlideStatus();
    }
});
