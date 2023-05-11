function load(previousScore) {
    if(previousScore)
    {
        const container = document.getElementById('card-text');
        const div = document.createElement("div");
        const text1 = document.createTextNode("Chcesz spróbować rozwiązać quiz ponownie?");
        const text2 = document.createTextNode(`Twój poprzedni wynik to ${previousScore} na 10`);
        const br = document.createElement("br");
        var link = document.createElement("a");
        const linkText = document.createTextNode("Quiz");
        link.appendChild(linkText);
        link.title = "Quiz";
        link.href = "mainpage.php#quiz";
        link.className="planety-link";

        div.style.margin = "20px";
        div.style.marginBottom = "40px";
        document.getElementById("last").style.marginLeft = "20px";
        
        div.appendChild(text1);
        div.appendChild(br);
        div.appendChild(text2);
        container.appendChild(div);
        container.appendChild(link);
    }
    else {
        const container = document.getElementById('card-text');
        const div = document.createElement("div");
        const text1 = document.createTextNode("Spróbuj rozwiązać quiz o układzie słonecznym!");
        var link = document.createElement("a");
        const linkText = document.createTextNode("Quiz");
        link.appendChild(linkText);
        link.title = "Quiz";
        link.href = "mainpage.php#quiz";
        link.className="planety-link";

        div.style.margin = "20px";
        div.style.marginBottom = "40px";
        document.getElementById("last").style.marginLeft = "20px";

        div.appendChild(text1);
        container.appendChild(div);
        container.appendChild(link);

    }
}


const previousScore = sessionStorage.getItem('sessionScore');

load(previousScore);
