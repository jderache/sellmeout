// fonction qui est événement qui se déclenche lorsque le document HTML a été complètement chargé.
document.addEventListener('DOMContentLoaded', function() {
  var ratingStarsList = document.querySelectorAll('.rating-stars');

  // permet d'itérai sur chaque elément de la liste
  ratingStarsList.forEach(function(ratingStars) {
    var stars = ratingStars.getElementsByTagName('i');
    var ratingInput = ratingStars.nextElementSibling;

    for (var i = 0; i < stars.length; i++) {
      stars[i].addEventListener('click', function() {
        var value = this.getAttribute('data-value');
        ratingInput.value = value;
        highlightStars(stars, value);
      });
    }
    // ajout d'un event sur ratingStars
    ratingStars.addEventListener('mouseenter', function() {
      var value = ratingInput.value;
      highlightStars(stars, value);
    });

    // ajout d'un event sur ratingStars quand la souris quitte l'evènement
    ratingStars.addEventListener('mouseleave', function() {
      var value = ratingInput.value;
      highlightStars(stars, value);
    });
  });

  // fonction pour mettre en évidence les étoiles selectionnées
  function highlightStars(stars, value) {
    for (var i = 0; i < stars.length; i++) {
      if (i < value) {
        stars[i].classList.add('active');
      } else {
        stars[i].classList.remove('active');
      }
    }
  }
});