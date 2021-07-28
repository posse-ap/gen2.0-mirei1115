'use strict';

const target1_0 = document.getElementById('target1_0');
const target1_1 = document.getElementById('target1_1');
const target1_2 = document.getElementById('target1_2');
const answer = document.getElementById('answer')
document.getElementById("answer").style.display ="none";

target1_0.addEventListener('click', () => { 
    //addEventListener:既にあるイベントを上書きせずに追加していく
    target1_0.classList.add('choice_square_true');
    target1_0.classList.add('choice_true');
    if(answer.style.display=="block") { //noneで非表示
        answer.style.display ="none";
    }else{ //blockで表示
        answer.style.display ="block";
    }
    // answer.classList.add('message');
    // answer.classList.add('message_true');
    // answer.classList.add('message_true_comment');
});

target1_1.addEventListener('click', () => {
    // target11.classList.add('');
});
target1_2.addEventListener('click', () => {
    // target12.classList.add('');
});
