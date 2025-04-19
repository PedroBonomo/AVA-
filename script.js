const images = [
  'img/1.png',
  'img/2.png',
  'img/3.png',
  'img/4.png',
  'img/5.png'
];

let startIndex = 0;
const track = document.querySelector('.carousel-track');

function renderCarousel() {
  track.innerHTML = '';

  for (let i = 0; i < 5; i++) {
    const index = (startIndex + i) % images.length;
    const item = document.createElement('div');
    item.classList.add('carousel-item');
    if (i === 2) item.classList.add('active');

    const img = document.createElement('img');
    img.src = images[index];
    img.alt = `Aluno ${index + 1}`;

    item.appendChild(img);
    track.appendChild(item);
  }
}

document.querySelector('.next').addEventListener('click', () => {
  startIndex = (startIndex + 1) % images.length;
  renderCarousel();
});

document.querySelector('.prev').addEventListener('click', () => {
  startIndex = (startIndex - 1 + images.length) % images.length;
  renderCarousel();
});

renderCarousel();