function startQuiz(category) {
    // Rediriger vers la page du quiz appropriée en fonction de la catégorie sélectionnée
    if (category === 'histoire') {
      window.location.href = 'html/html.html';
    } else if (category === 'sport') {
      window.location.href = 'html/htmlA.html';
    } else if (category === 'musique') {
      window.location.href = 'html/htmlB.html';
    }
  }