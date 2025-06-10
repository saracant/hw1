document.addEventListener('DOMContentLoaded', () => {
  const meteoCataniaDiv = document.getElementById('meteo-catania-info');

  async function fetchMeteoCatania() {
      const apiKeyMeteo = "secret"; 
      const lat = 37.5079; 
      const lon = 15.0878; 
      const urlMeteo = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKeyMeteo}&units=metric&lang=it`;

      fetch(urlMeteo)
      .then(function(response) {
        if(!response.ok) {
          meteoCataniaDiv.innerHTML = '<p>Errore nel recupero dei dati meteo per Catania.</p>';
        
        console.error('Errore');
        return null;
        }
      return response.json();
    })
      .then(function(data) {
        if (!data || !data.main || !data.weather || data.weather.length === 0) {
          meteoCataniaDiv.innerHTML = '<p>Dati meteo non disponibili.</p>';
          return;
        }
          const temperatura = data.main.temp;
          const descrizione = data.weather[0].description;
          const iconCode = data.weather[0].icon;
          const iconUrl = `http://openweathermap.org/img/wn/${iconCode}@2x.png`;
      
          meteoCataniaDiv.innerHTML = `
              <p>Temperatura: ${temperatura}°C</p>
              <p>Condizioni: ${descrizione}</p>
              <img src="${iconUrl}" alt="${descrizione}">
          `;
      });
  }

  

  const eventListDiv = document.getElementById('eventi-list');

  function loadEventi() {
    fetch('api_eventi.php')
    .then(function(response) {
      if (!response.ok) {
        eventListDiv.innerHTML = '<p>Errore nel recupero degli eventi.</p>';
        console.error('Errore');
        return null;
      }
      return response.json();
    })
    .then(function(eventi) {
      if (!eventi || eventi.error) {
        eventListDiv.innerHTML = '<p>Errore nel recupero degli eventi: </p>';
        return;
      }
      if (eventi.length === 0) {
        eventListDiv.innerHTML = '<p>Nessun evento disponibile. </p>';
        return;
      }
      eventListDiv.innerHTML = ''; 

      eventi.forEach(evento => {
        const eventoCard = document.createElement('div');
        eventoCard.classList.add('event-card');
        eventoCard.innerHTML = `
           <img src="${evento.immagine_url}" alt="${evento.nome}">
                        <div class="event-info">
                            <h3>${evento.nome}</h3>
                            <p>${evento.descrizione}</p>
                            <p><strong>Quando:</strong> ${evento.data_formattata}</p>
                            <p><strong>Dove:</strong> ${evento.luogo}</p>
                            <p>Posti disponibili: ${evento.posti_disponibili}</p>
                            <button class="prenota-btn" data-event-id="${evento.id}">Prenota</button>
                        </div>
        `;
        eventListDiv.appendChild(eventoCard);
      });

      attachPrenotaEventListeners();
    });
  }
      function attachPrenotaEventListeners() {
        const prenotaButtons = document.querySelectorAll('.prenota-btn');
      prenotaButtons.forEach(function(button)  {
        button.removeEventListener('click',handlePrenotaClick); 
        button.addEventListener('click', handlePrenotaClick);
        });
      }
      function handlePrenotaClick(event) {
        const button = event.currentTarget;
        const eventId = button.dataset.eventId;

        if(!eventId) {
          alert('Errore: ID evento non trovato.');
          return;
        }
        button.disabled = true;
        button.textContent = 'Prenotazione in corso...';
        button.style.backgroundColor = '#ccc';

        fetch('prenota_evento.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ id_evento: eventId })
        })
        .then(response => {
          if(!response.ok) {
            return response.json().then(errorData => {
              return {isError: true,message: errorData.error || 'Errore nella prenotazione.'};
            }).catch(() => {
              return {isError: true,message: 'Errore HTTP nella prenotazione.'};
            });
          }
            return response.json();
        })
        .then(data => {
          if(data.isError) {
            alert(data.message);
            button.disabled = false;
            button.textContent = 'Prenota';
            button.style.backgroundColor = '';
            console.error('Errore fetch prenotazione:',data.message);
            return;
          } 
          if (data.success) {
            alert('Prenotazione effettuata con successo!');
            button.textContent = 'Prenotato';
            button.style.backgroundColor = 'gray'; 
          } else {
            alert('Errore nella prenotazione: ' + (data.error || 'Errore sconosciuto.'));
            button.disabled = false;
            button.textContent = 'Prenota';
            button.style.backgroundColor = '';
          }
          
        });
        }
        fetchMeteoCatania();
              loadEventi();


  //menu hamburger 
  const hamburger = document.querySelector('.hamburger');
  const mainNav = document.querySelector('.main-nav');

  if(hamburger && mainNav) {
    hamburger.addEventListener('click',function(){
      mainNav.classList.toggle('active');
    });
  }
});
