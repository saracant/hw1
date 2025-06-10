 document.addEventListener('DOMContentLoaded', function() {
    console.log('Script chi_siamo.js avviato');
 //menu mobile 
    const hamburger = document.querySelector('.hamburger');
    const mainNav = document.querySelector('.main-nav');
  
    if(hamburger && mainNav) {
      hamburger.addEventListener('click',function(){
        mainNav.classList.toggle('active');
      });
    }
 });
