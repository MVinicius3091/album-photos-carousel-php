const allImg = document.querySelectorAll('img.images');
const btnNext = document.querySelector('button#next');
const btnPrevius = document.querySelector('button#previus');
let divRenderPhotos = document.querySelector('div.render-photos'); 

const xhttp = new XMLHttpRequest;

allImg.forEach(element => {
  element.addEventListener('click', (el) => {
    
    let id = el.target.id;
    let html = `<iframe src="album.php?id=${id}" class="box-iframe"></iframe>`;

    divRenderPhotos.style.display = 'flex';
    divRenderPhotos.innerHTML = html;
  });
})

let count = 0;
// allDivImg[0].classList.add('active');

// btnNext.addEventListener('click', () => {

//   ++count;
  
//   if(count < allDivImg.length) {

//     allDivImg[count].classList.add('active');
//     allDivImg[count - 1].classList.remove('active');

//   } else {

//     count = allDivImg.length - 1;
//   }
// });

// btnPrevius.addEventListener('click', () => {

//   --count;

//   if (count >= 0) {

//     allDivImg[count].classList.add('active');
//     allDivImg[count + 1].classList.remove('active');

//   } else {

//     count = 0;
//   }
// });


