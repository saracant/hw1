document.addEventListener('DOMContentLoaded', function() {
    console.log('Script contatti.js avviato');

    const hamburger = document.querySelector('.hamburger');
    const mainNav = document.querySelector('.main-nav');

    if(hamburger && mainNav) {
        hamburger.addEventListener('click', function(){
            mainNav.classList.toggle('active');
        });
    }

    const contactForm = document.getElementById('contactForm');
    const responseMessageDiv = document.getElementById('responseMessage');

    function displayResponseMessage(message, isSuccess) {
        responseMessageDiv.innerHTML = message;
        responseMessageDiv.classList.remove('success-message', 'error-message');
        if (isSuccess) {
            responseMessageDiv.classList.add('success-message');
        } else {
            responseMessageDiv.classList.add('error-message');
        }
    }

    if (contactForm) {
        contactForm.addEventListener('submit', function(event) {
            event.preventDefault(); 

            responseMessageDiv.innerHTML = '';
            responseMessageDiv.classList.remove('success-message', 'error-message');

            const nome = contactForm.elements['nome'].value.trim();
            const cognome = contactForm.elements['cognome'].value.trim();
            const email = contactForm.elements['email'].value.trim();
            const messaggio = contactForm.elements['messaggio'].value.trim();
            const privacyChecked = contactForm.elements['privacy'].checked;

            let clientErrors = [];
            if (!nome) clientErrors.push('Il campo Nome è obbligatorio.');
            if (!cognome) clientErrors.push('Il campo Cognome è obbligatorio.');
            if (!email) clientErrors.push('Il campo Email è obbligatorio.');
            if (!/\S+@\S+\.\S+/.test(email)) clientErrors.push('L\'indirizzo email non è valido.');
            if (!messaggio) clientErrors.push('Il campo Messaggio è obbligatorio.');
            if (!privacyChecked) clientErrors.push('Devi accettare l\'informativa sulla Privacy.');

            if (clientErrors.length > 0) {
                displayResponseMessage(clientErrors.join(' '), false); 
                return; 
            }
            const form_data = new FormData(contactForm);
            if (privacyChecked) {
                form_data.append('privacy', 'on');
            }
            const fetch_options = {
                method: 'POST',
                body: form_data 
            };

            fetch("messaggio_contatto.php", fetch_options)
                .then(responseAggiornaMessaggio) 
                .then(onMessageResponse); 
        });
    }

    
    function responseAggiornaMessaggio(response) {
        if (!response.ok) {
            return response.json().then(errorData => {
                throw new Error(errorData.error || `Errore HTTP: ${response.status}`);
            }).catch(() => {
                throw new Error(`Errore HTTP ${response.status}: Impossibile leggere la risposta del server.`);
            });
        }
        return response.json(); 
    }

    function onMessageResponse(json) {
        if (json.success) {
            displayResponseMessage(json.message, true); 
            contactForm.reset(); 
        } else {
            displayResponseMessage(json.error, false); 
        }
    }
});


