document.addEventListener('DOMContentLoaded', function() {
    //Mostra il testo cliccando Scopri di Più nella sezione Eventi 
    const scopriPiuBtnEventi = document.querySelector('.eventi-text .button.secondary');
    const testoBreveEventi = document.querySelector('.eventi-text .testo-breve');
    const testoCompletoEventi = document.querySelector('.eventi-text .testo-completo');
  
    if (scopriPiuBtnEventi && testoBreveEventi && testoCompletoEventi) {
        scopriPiuBtnEventi.addEventListener('click', function(event) {
            event.preventDefault(); 
            testoBreveEventi.classList.toggle('hidden');
            testoCompletoEventi.classList.toggle('hidden');
            this.textContent = testoCompletoEventi.classList.contains('hidden') ? 'Scopri di Più' : 'Mostra Meno';
        });
    }
    //Cambio immagine hero al mouseover 
    const heroImage = document.getElementById('hero-img');
  
    if (heroImage) {
        const originalSrc = heroImage.src;
        const hoverSrc = heroImage.getAttribute('data-hover-src');
  
        heroImage.addEventListener('mouseover', function() {
            this.src = hoverSrc;
        });
  
        heroImage.addEventListener('mouseout', function() {
            this.src = originalSrc;
        });
    }
   //Aggiungere Aggiungi ai preferiti ai prodotti
    const productCards = document.querySelectorAll('.product-card');
  
    productCards.forEach(card => {
      const preferitoBtn = card.querySelector('.preferito-btn'); 
  
      if (preferitoBtn) {
          preferitoBtn.addEventListener('click', function() {
              card.classList.toggle('preferito');
              this.textContent = card.classList.contains('preferito') ? 'Rimuovi dai Preferiti' : 'Aggiungi ai Preferiti';
          });
      }
  });
  //Aggiungiamo dettagli al prodotto cliccando Visualizza
  const visualizzaBtns = document.querySelectorAll('.visualizza-prodotto');
  
      visualizzaBtns.forEach(btn => {
          btn.addEventListener('click', function() {
              const productCard = this.closest('.product-card');
              const dettagliProdotto = productCard.querySelector('.dettagli-prodotto');
              const descrizioneParagrafo = dettagliProdotto.querySelector('.descrizione');
              const prezzoParagrafo = dettagliProdotto.querySelector('.prezzo');
  
              const descrizione = productCard.dataset.descrizione;
              const prezzo = productCard.dataset.prezzo;
  
              if (descrizioneParagrafo && prezzoParagrafo) {
                  descrizioneParagrafo.textContent = descrizione;
                  prezzoParagrafo.textContent = `Prezzo: €${prezzo}`;
              }
  
              dettagliProdotto.classList.toggle('hidden');
              this.textContent = dettagliProdotto.classList.contains('hidden') ? 'Visualizza' : 'Nascondi';
          });
      });
    //menu mobile 
    const hamburger = document.querySelector('.hamburger');
    const mainNav = document.querySelector('.main-nav');
  
    if(hamburger && mainNav) {
      hamburger.addEventListener('click',function(){
        mainNav.classList.toggle('active');
      });
    }

    const searchInput = document.getElementById('search-input');
    const searchButton = document.getElementById('search-button');

    if(searchButton) {
        searchButton.addEventListener('click',() => {
            performSearch();
        });
    }

    if(searchInput) {
        searchInput.addEventListener('keypress',(event) => {
            if(event.key === 'Enter') {
                performSearch();
            }
        });
    }

    function performSearch() {
        const query = searchInput.value.trim();

        if(query) {
            window.location.href = 'shop.html?search=${encodeURIComponent(query)}';
        }
    }
  });
