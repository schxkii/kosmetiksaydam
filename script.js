document.addEventListener("DOMContentLoaded", function() {
  const cardsSection = document.querySelector('.leistungen-cards');
  const cardTitles = document.querySelectorAll('.leistungen-cards .card h3');

  if ('IntersectionObserver' in window && cardsSection) {
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if(entry.isIntersecting) {
          cardTitles.forEach(h3 => h3.classList.add('animate'));
          observer.disconnect();
        }
      });
    }, { threshold: 0.5 });

    observer.observe(cardsSection);
  } else {
    // Fallback: Animation sofort starten
    cardTitles.forEach(h3 => h3.classList.add('animate'));
  }
});