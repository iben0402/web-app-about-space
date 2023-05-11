function buildQuiz(){
    const output =[];

    questions.forEach(
        (currentQuestion, questionNumber) => {
            const answers = [];
            for(letter in currentQuestion.answers){
                answers.push(
                    `<label>
                      <input type="radio" name="question${questionNumber}" value="${letter}">
                      ${letter} :
                      ${currentQuestion.answers[letter]}
                    </label>`
                  );
            }

            output.push(
                `<div class="question"> ${currentQuestion.question} </div>
                <div class="answers"> ${answers.join('')} </div>`
              );
        }
    );

    quizContainer.innerHTML = output.join('');
}

function addLink(){
    const linkDiv = document.createElement("div");
    const text1 = document.createTextNode("Gratuluje rozwiązania quizu! Aby dowiedzieć się więcej o planetach układu słonecznego kliknij w poniższy link");
    const br = document.createElement("br");
    const br2 = document.createElement("br");
    const br3 = document.createElement("br");
    var link = document.createElement("a");
    const linkText = document.createTextNode("Planety");
    
    link.appendChild(linkText);
    link.title = "Planety";
    link.href = "planety.php";
    link.className="planety-link";
    if(localStorage.getItem('highScore')) {
        const text2 = document.createTextNode(`Twój najlepszy wynik: ${localStorage.getItem('highScore')} na 10`);
        linkDiv.appendChild(text2);
        linkDiv.appendChild(br3);
    }
    linkDiv.appendChild(text1);
    linkDiv.appendChild(br);
    linkDiv.appendChild(br2);
    linkDiv.appendChild(link);
    resultsContainer.appendChild(linkDiv);
}

function addLocalStorage(score)
{
    const highScore = localStorage.getItem('highScore');

    if(highScore) {
        if(highScore<score){
            localStorage.setItem('highScore', score);
        }
    }
    else {
        localStorage.setItem('highScore', score);
    }
}

function addSessionStorage(score)
{
    sessionStorage.setItem('sessionScore', score);
}

function showResult(){
    const answerContainers = quizContainer.querySelectorAll('.answers');
    let numberCorrect = 0;
    questions.forEach( (currentQuestion, questionNumber) => {
        const answerContainer = answerContainers[questionNumber];
        const selector = `input[name=question${questionNumber}]:checked`;
        const userAnswer = (answerContainer.querySelector(selector) || {}).value;

        if(userAnswer === currentQuestion.correct){
            numberCorrect++;
            answerContainers[questionNumber].style.color = "lightgreen";
        }
        else {
            answerContainers[questionNumber].style.color = 'red';
        }
    });

    resultsContainer.innerHTML = `Wynik: ${numberCorrect} na 10`;
    addLocalStorage(numberCorrect);
    addSessionStorage(numberCorrect);
    addLink();
    window.scrollTo(0, document.body.scrollHeight);
}

const quizContainer = document.getElementById('quiz');
const resultsContainer = document.getElementById('results');
const submitButton = document.getElementById('submit');
const questions = [
    {
        question: "1. Jak nazywa się planeta najbliżej Słońca?",
        answers: {
            a: "Mars",
            b: "Ziemia",
            c: "Merkury"
        },
        correct: "c"
    },
    {
        question: "2. Ile planet jest obecnie (2022) w układzie słonecznym?",
        answers: {
            a: "7",
            b: "8",
            c: "9"
        },
        correct: "b"
    },
    {
        question: "3. Która planeta układu słonecznego jest największa?",
        answers: {
            a: "Jowisz",
            b: "Saturn",
            c: "Neptun"
        },
        correct: "a"
    },
    {
        question: "4. Która z tych planet należy do planet skalistych?",
        answers: {
            a: "Wenus",
            b: "Saturn",
            c: "Uran"
        },
        correct: "a"
    },
    {
        question: "5. Jak nazywa się planeta karłowata, która do 2006 była uznawana za 9 planetę Układu Słonecznego?",
        answers: {
            a: "Ceres",
            b: "Neptun",
            c: "Pluton"
        },
        correct: "c"
    },
    {
        question: "6. Która planeta jest najdalej od słońca?",
        answers: {
            a: "Uran",
            b: "Neptun",
            c: "Jowisz"
        },
        correct: "b"
    },
    {
        question: "7. Która z tych planet ma największą masę?",
        answers: {
            a: "Wenus",
            b: "Ziemia",
            c: "Mars"
        },
        correct: "b"
    },
    {
        question: "8. Która z tych planet ma największą średnicę?",
        answers: {
            a: "Saturn",
            b: "Uran",
            c: "Neptun"
        },
        correct: "a"
    },
    {
        question: "9. Ile księżyców ma Jowisz?",
        answers: {
            a: "Mniej niż 50",
            b: "Więcej niż 50, ale mniej niż 100",
            c: "Więcej niż 100"
        },
        correct: "b"
    },
    {
        question: "10. Jakim rodzajem planety jest Uran?",
        answers: {
            a: "Planeta skalista",
            b: "Planeta gazowa",
            c: "Planeta gazowo-lodowa"
        },
        correct: "c"
    },
]

buildQuiz();

submitButton.addEventListener('click', showResult);
