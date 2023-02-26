const btnClose = document.querySelector('button#btn-close');
const allPhotos = document.querySelectorAll('img.photos');

let divCaroussel = document.querySelector('div.caroussel');

let count = 0;

allPhotos.forEach((element) => element.addEventListener('click', carouselPhotos));

btnClose.addEventListener('click', (e) => {
  let iframe = e.target.ownerDocument.defaultView.frameElement.offsetParent;
  iframe.style.display = 'none';
});

function carouselPhotos(el) {

  let src = el.target.src;
  let srcTarget = src.slice(src.lastIndexOf('/')+1);
  let newSrc = '';

  allPhotos.forEach((ph, index) => {
    let srcPhoto = ph.src.slice(ph.src.lastIndexOf('/')+1);

    if (srcPhoto == srcTarget) {
      newSrc = ph.src;
      count = index;
    }

  });

  let img = `<img src="${newSrc}" class="img-target" width="700px" height="400px" > 
      <button id="next" onclick="nextElement()">Next</button>
      <button id="previus" onclick="previusElement()">Previus</button>
      <button id="btn-close-caroussel" onclick="removeCaroussel()">close</button>`;

  divCaroussel.style.display = 'flex';
  divCaroussel.innerHTML = img;
}

function removeCaroussel() {
  divCaroussel.style.display = 'none'
}


function nextElement(){
  let imgTarget = document.querySelector('img.img-target');

  if (count < (allPhotos.length - 1)) {
    let setSrc = allPhotos[++count].src;
    imgTarget.setAttribute('src', setSrc);
  }

}

function previusElement(){

  let imgTarget = document.querySelector('img.img-target');
  --count;

  if (count >= 0) {

    let setSrc = allPhotos[count].src;
    imgTarget.setAttribute('src', setSrc);

  } else {

    count = 0;

  }

}
