var questions = [
    {
        question: "Qui est le seule club francais a avoir remporter la champions league   ?",
        choices: ["Paris", "Lyon", "Saint-Etienne", "Marseille"],
        correctAnswer: 3
    },
    {
        question: "Qui detient le record de ballon d'or ?",
        choices: ["Ronaldo", "Messi", "Zidane", "Modric"],
        correctAnswer: 1
    },
    {
        question: "Quelle nation ne detient pas de coupe du monde  ?",
        choices: ["Argentine", "Belgique", "France", "Bresil"],
        correctAnswer: 1
    }
];

var currentQuestion = 0;
var score = 0;

// Afficher la première question
function displayQuestion() {
    var questionElement = document.getElementById("question");
    var choicesElement = document.getElementById("choices");
    var scoreElement = document.getElementById("score");

    questionElement.textContent = questions[currentQuestion].question;
    choicesElement.innerHTML = "";

    for (var i = 0; i < questions[currentQuestion].choices.length; i++) {
        var choice = document.createElement("button");
        choice.className = "choice";
        choice.textContent = questions[currentQuestion].choices[i];
        choice.value = i;
        choice.onclick = checkAnswer;
        choicesElement.appendChild(choice);
    }

    scoreElement.textContent = "Score: " + score;
}

// Vérifier la réponse sélectionnée
function checkAnswer() {
    var selectedAnswer = this.value;

    if (selectedAnswer == questions[currentQuestion].correctAnswer) {
        score++;
    }

    currentQuestion++;

    if (currentQuestion < questions.length) {
        displayQuestion();
    } else {
        endQuiz();
    }
}

// Afficher le score final
function endQuiz() {
    var container = document.querySelector(".container");
    container.innerHTML = "<h2>Quiz termine !</h2>" +
                          "<p>Score final: " + score + "</p>";
}

// Démarrer le quiz
displayQuestion();
