 document.addEventListener('DOMContentLoaded', function() {
    console.log('Script profilo.js avviato');

    const prenotaListDiv = document.getElementById('prenotazioni-list');
  
    function loadPrenotazioni() {
      prenotaListDiv.innerHTML = '<p>Caricamento prenotazioni...</p>';

      fetch('api_prenotazioni.php')
      .then(response => {
        if (!response.ok) {
          const errorMessage = 'Errore HTTP: ';
          prenotaListDiv.innerHTML = `<p>${errorMessage}</p>`;
          console.error(errorMessage);
          return null;
        }
        return response.json();
      })
      .then(data => {
        if(data && data.error) {
          prenotaListDiv.innerHTML = `<p>Errore API: ${data.error}</p>`;
          console.error('Errore API:', data.error);
          return;
        }
        if (!data || data.length === 0) {
          prenotaListDiv.innerHTML = '<p>Nessuna prenotazione trovata.</p>';
          return;
        }

        prenotaListDiv.innerHTML = ''; 

        data.forEach(prenotazione => {
          const prenotazioneCard = document.createElement('div');
          prenotazioneCard.classList.add('prenotazione-card');

          prenotazioneCard.innerHTML = `
                        <img src="${prenotazione.immagine_url}" alt="Immagine Evento: ${prenotazione.nome_evento}">
                        <div class="prenotazione-info">
                            <h3>${prenotazione.nome_evento}</h3>
                            <p><strong>Quando:</strong> ${prenotazione.data_evento_formattata}</p>
                            <p><strong>Dove:</strong> ${prenotazione.luogo_evento}</p>
                            <p><strong>Posti prenotati:</strong> ${prenotazione.numero_posti || 'N/D'}</p>
                            <p class="data-prenotazione">Prenotato il: ${prenotazione.data_prenotazione_formattata_php}</p>
                        </div>
                    `;
          prenotaListDiv.appendChild(prenotazioneCard);
        });
      })
    }
    loadPrenotazioni();

 //menu mobile 
    const hamburger = document.querySelector('.hamburger');
    const mainNav = document.querySelector('.main-nav');
  
    if(hamburger && mainNav) {
      hamburger.addEventListener('click',function(){
        mainNav.classList.toggle('active');
      });
    }
 });

 
