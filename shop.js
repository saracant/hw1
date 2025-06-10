document.addEventListener('DOMContentLoaded', function() {
    console.log('Script shop.js avviato');
    const productsContainer = document.getElementById('products-list');
    console.log('Container dei prodotti:',productsContainer);

    fetch('api_prodotti.php')
        .then(function(response) {
            return response.json();
        })
            .then(function(products) {
                if (products && products.error) {
                    productsContainer.innerHTML = '<p>' + products.error + '</p>';
                    return;
                }
           if (products.length === 0) {
            productsContainer.innerHTML = '<p>Nessun prodotto disponibile.</p>';
            return;
           }

           productsContainer.innerHTML = '';

           products.forEach(product => {
            const productCard = document.createElement('div');
            productCard.classList.add('product-card');
            productCard.innerHTML = `
            <img src="${product.immagine_url}" alt="${product.nome}">
            <div class = "product-info">
                <h3>${product.nome}</h3>
                <p>${product.descrizione}</p>
                <div class = "price-buy-container"> 
                <div class = "product-price">€ ${parseFloat(product.prezzo).toFixed(2)}</div>
                <button class="buy-btn" data-product-id="${product.id}">Aggiungi al carrello</button>
                </div>
            </div>
            `;
            productsContainer.appendChild(productCard);
        });

        const buyButtons = document.querySelectorAll('.buy-btn');
        buyButtons.forEach(button => {
            button.addEventListener('click',function(event) {
                const productId = event.currentTarget.dataset.productId
                console.log('Aggiungi al carrello:',productId);

                document.location.href = `aggiungi_al_carrello.php?productId=${productId}&quantity=1`;
            })
        })
    });
     //menu mobile 
    const hamburger = document.querySelector('.hamburger');
    const mainNav = document.querySelector('.main-nav');
  
    if(hamburger && mainNav) {
      hamburger.addEventListener('click',function(){
        mainNav.classList.toggle('active');
      });
    }
});
