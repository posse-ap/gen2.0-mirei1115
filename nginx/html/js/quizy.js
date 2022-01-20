'use strict';

const choice = [
    ['たかなわ','たかわ','こうわ'], //0
    ['かめいど','かめど','かめと'], //1
    ['こうじまち','かゆまち','おかとまち'], //2
    ['おなりもん','おかどもん','ごせいもん'], //3
    ['とどろき','たたら','たたりき'], //4
    ['しゃくじい','いじい','せきこうい'], //5
    ['ぞうしき','ざっしき','ざっしょく'], //6
    ['おかちまち','みとちょう','ごしろちょう'], //7
    ['ししぼね','ろっこつ','しこね'], //8
    ['こぐれ','こばく','こしゃく'], //9
];
const answer = ['たかなわ','かめいど','こうじまち','おなりもん','とどろき','しゃくじい','ぞうしき','おかちまち','ししぼね','こぐれ',]
const choiceLength = 3;

//////表示に関する部分//////
for (let quizIndex = 0; quizIndex < choice.length; quizIndex++) {
// i = 0だとfor文が複数出てきたときに煩わしい

    /**クイズタイトルと画像、選択肢を含ませるdiv要素**/
    const newDiv = document.createElement('div');
    newDiv.classList.add("whole"); //クラス名を付ける
    document.body.appendChild(newDiv); //子要素を親要素の中へ
    newDiv.insertAdjacentHTML('afterbegin',`<h1 class="title">${quizIndex+1}.この地名はなんて読む？？</h1>`);
    //このdivいちばん初めに挿入

    //画像の表示
    const newImg = document.createElement('img');
    newImg.src = `./img/T${quizIndex+1}.jpg`;
    newDiv.appendChild(newImg);

    // ランダムな配列生成
    for (let i = choiceLength-1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i+1));
        [choice[quizIndex][j],choice[quizIndex][i]] = [choice[quizIndex][i],choice[quizIndex][j]];
    }
    let correctNum = choice[quizIndex].indexOf(answer[quizIndex]);
    //choice[quizIndex]の中でanswer[quizIndex]は何番目にあるのか探してくれる

    //選択肢のul作成
    const newChoice = document.createElement('ul');
    newChoice.innerHTML =
        `<li id="choice${quizIndex}_0" onclick="check(${quizIndex},0,${correctNum})" class="choice_square">${choice[quizIndex][0]}</li>`
        +`<li id="choice${quizIndex}_1" onclick="check(${quizIndex},1,${correctNum})" class="choice_square">${choice[quizIndex][1]}</li>`
        +`<li id="choice${quizIndex}_2" onclick="check(${quizIndex},2,${correctNum})" class="choice_square">${choice[quizIndex][2]}</li>`;
    // check()は引数を与えている
    newDiv.appendChild(newChoice);

    //回答ボックスの表示・非表示
    //正解の時
    const correctBoxDiv = document.createElement('div');
    correctBoxDiv.id = `correct${quizIndex}`;
    correctBoxDiv.classList.add("message");
    newDiv.appendChild(correctBoxDiv);
    correctBoxDiv.style= "display:none;"; //非表示
    correctBoxDiv.insertAdjacentHTML('afterbegin',`<p class="message_true">正解！</p>`);
    correctBoxDiv.insertAdjacentHTML('beforeend',`<p>正解は${answer[quizIndex]}です！</p>`);
    //不正解の時
    const falseBoxDiv = document.createElement('div');
    falseBoxDiv.id = `false${quizIndex}`;
    falseBoxDiv.classList.add("message");
    newDiv.appendChild(falseBoxDiv);
    falseBoxDiv.style= "display:none;"; //非表示
    falseBoxDiv.insertAdjacentHTML('afterbegin',`<p class="message_false">不正解！</p>`);
    falseBoxDiv.insertAdjacentHTML('beforeend',`<p>正解は${answer[quizIndex]}です！</p>`);
};

//////クリックした時実行する関数//////
function check(quizIndex,choiceNum,correctNum) {
    const clickedBox = document.getElementById(`choice${quizIndex}_${choiceNum}`); //クリックしたliを取得
    const correctChoiceBox = document.getElementById(`choice${quizIndex}_${correctNum}`); //正解のliを取得
    const correctBoxDiv = document.getElementById( `correct${quizIndex}`); //正解ボックスのdivを取得
    const falseBoxDiv = document.getElementById( `false${quizIndex}`); //不正解ボックスのdivを取得
    // 正誤判定、選択肢にスタイル追加
    if (choiceNum === correctNum) {
        correctBoxDiv.style = "display:block;";
        clickedBox.classList.add('choice_square_true');
        //クリックできなくする
        document.getElementById(`choice${quizIndex}_0`).classList.add('no-pointer');
        document.getElementById(`choice${quizIndex}_1`).classList.add('no-pointer');
        document.getElementById(`choice${quizIndex}_2`).classList.add('no-pointer');
    } else {
        falseBoxDiv.style = "display:block;";
        clickedBox.classList.add('choice_square_false');
        correctChoiceBox.classList.add('choice_square_true');
        //クリックできなくする
        document.getElementById(`choice${quizIndex}_0`).classList.add('no-pointer');
        document.getElementById(`choice${quizIndex}_1`).classList.add('no-pointer');
        document.getElementById(`choice${quizIndex}_2`).classList.add('no-pointer');
    }
};