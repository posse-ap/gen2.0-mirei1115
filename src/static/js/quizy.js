'use strict';

const choice = [
    ['たかなわ','たかわ','こうわ'],
    ['かめいど','かめど','かめと'],
    ['こうじまち','かゆまち','おかとまち'],
    ['おなりもん','おかどもん','ごせいもん'],
    ['とどろき','たたら','たたりき'],
    ['しゃくじい','いじい','せきこうい'],
    ['ぞうしき','ざっしき','ざっしょく'],
    ['おかちまち','みとちょう','ごしろちょう'],
    ['ししぼね','ろっこつ','しこね'],
    ['こぐれ','こばく','こしゃく'],
];
const answer = ['たかなわ','かめいど','こうじまち','おなりもん','とどろき','しゃくじい','ぞうしき','おかちまち','ししぼね','こぐれ',]
const choiceLength = 3;

for (let quizIndex = 0; quizIndex < choice.length; quizIndex++) {
    const newDiv = document.createElement('div');
    newDiv.classList.add("whole");
    document.body.appendChild(newDiv);
    newDiv.insertAdjacentHTML('afterbegin',`<h1 class="title">${quizIndex+1}.この地名はなんて読む？？</h1>`);

    const newImg = document.createElement('img');
    newImg.src = `../static/img/quizy${quizIndex+1}.jpg`;
    newDiv.appendChild(newImg);

    for (let i = choiceLength-1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i+1));
        [choice[quizIndex][j],choice[quizIndex][i]] = [choice[quizIndex][i],choice[quizIndex][j]];
    }
    let correctNum = choice[quizIndex].indexOf(answer[quizIndex]);

    const newChoice = document.createElement('ul');
    newChoice.innerHTML =
        `<li id="choice${quizIndex}_0" onclick="check(${quizIndex},0,${correctNum})" class="choice_square">${choice[quizIndex][0]}</li>`
        +`<li id="choice${quizIndex}_1" onclick="check(${quizIndex},1,${correctNum})" class="choice_square">${choice[quizIndex][1]}</li>`
        +`<li id="choice${quizIndex}_2" onclick="check(${quizIndex},2,${correctNum})" class="choice_square">${choice[quizIndex][2]}</li>`;
    newDiv.appendChild(newChoice);

    const correctBoxDiv = document.createElement('div');
    correctBoxDiv.id = `correct${quizIndex}`;
    correctBoxDiv.classList.add("message");
    newDiv.appendChild(correctBoxDiv);
    correctBoxDiv.style= "display:none;";
    correctBoxDiv.insertAdjacentHTML('afterbegin',`<p class="message_true">正解！</p>`);
    correctBoxDiv.insertAdjacentHTML('beforeend',`<p>正解は${answer[quizIndex]}です！</p>`);
    const falseBoxDiv = document.createElement('div');
    falseBoxDiv.id = `false${quizIndex}`;
    falseBoxDiv.classList.add("message");
    newDiv.appendChild(falseBoxDiv);
    falseBoxDiv.style= "display:none;";
    falseBoxDiv.insertAdjacentHTML('afterbegin',`<p class="message_false">不正解！</p>`);
    falseBoxDiv.insertAdjacentHTML('beforeend',`<p>正解は${answer[quizIndex]}です！</p>`);
};

function check(quizIndex,choiceNum,correctNum) {
    const clickedBox = document.getElementById(`choice${quizIndex}_${choiceNum}`);
    const correctChoiceBox = document.getElementById(`choice${quizIndex}_${correctNum}`);
    const correctBoxDiv = document.getElementById( `correct${quizIndex}`);
    const falseBoxDiv = document.getElementById( `false${quizIndex}`);
    if (choiceNum === correctNum) {
        correctBoxDiv.style = "display:block;";
        clickedBox.classList.add('choice_square_true');
        document.getElementById(`choice${quizIndex}_0`).classList.add('no-pointer');
        document.getElementById(`choice${quizIndex}_1`).classList.add('no-pointer');
        document.getElementById(`choice${quizIndex}_2`).classList.add('no-pointer');
    } else {
        falseBoxDiv.style = "display:block;";
        clickedBox.classList.add('choice_square_false');
        correctChoiceBox.classList.add('choice_square_true');
        document.getElementById(`choice${quizIndex}_0`).classList.add('no-pointer');
        document.getElementById(`choice${quizIndex}_1`).classList.add('no-pointer');
        document.getElementById(`choice${quizIndex}_2`).classList.add('no-pointer');
    }
};