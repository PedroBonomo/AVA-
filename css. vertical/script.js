const images = [
  { src: 'img/1.png', link: 'sobreamine.html' },
  { src: 'img/2.png', link: 'sobrecaio.html' },
  { src: 'img/3.png', link: 'sobrenatha.html' },
  { src: 'img/4.png', link: 'sobrepedro.html' },
  { src: 'img/5.png', link: 'sobresilvana.html' }
];

let startIndex = 0;
const track = document.querySelector('.carousel-track');

function renderCarousel() {
  track.innerHTML = ''; // Limpa o conteúdo atual do carrossel.

  for (let i = 0; i < images.length; i++) {
    const index = (startIndex + i) % images.length; // Calcula o índice da imagem atual.
    const item = document.createElement('div'); // Cria um elemento <div> para o item do carrossel.
    item.classList.add('carousel-item'); // Adiciona a classe 'carousel-item' ao elemento.

    if (i === 2) {
      item.classList.add('active'); // Marca o item central como 'active'.

      // Torna o item clicável apenas se for o item em foco
      item.addEventListener('click', () => {
        window.location.href = images[index].link; 
      });
    }

    const img = document.createElement('img'); // Cria um elemento <img>.
    img.src = images[index].src; // Define o caminho da imagem.
    img.alt = `Imagem de ${images[index].link.split('.')[0].replace('sobre', '')}`; // Define o texto alternativo.

    item.appendChild(img); 
    track.appendChild(item); 
  }
}

document.querySelector('.next').addEventListener('click', () => {
  startIndex = (startIndex + 1) % images.length; // Incrementa o índice inicial de forma cíclica.
  renderCarousel(); // Atualiza o carrossel.
});

document.querySelector('.prev').addEventListener('click', () => {
  startIndex = (startIndex - 1 + images.length) % images.length; // Decrementa o índice inicial de forma cíclica.
  renderCarousel(); // Atualiza o carrossel.
});

renderCarousel();