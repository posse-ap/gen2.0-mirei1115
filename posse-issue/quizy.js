'use strict';

//問1
const target1_0 = document.getElementById('target1_0');
const target1_1 = document.getElementById('target1_1');
const target1_2 = document.getElementById('target1_2');
const answer1 = document.getElementById('answer1')
const no_answer1 = document.getElementById('no_answer1')
//正解・不正解の答えはまず非表示
//none非表示、block表示
document.getElementById('answer1').style.display ='none';
document.getElementById('no_answer1').style.display ='none'
target1_0.addEventListener('click', () => { 
    //addEventListener:既にあるイベントを上書きせずに追加していく
    target1_0.classList.add('choice_square_true');
    target1_0.classList.add('choice_true');
    document.getElementById('answer1').style.display ='block';
    document.getElementById('no_answer1').style.display ='none';
    answer1.classList.add('message');
    answer1.classList.add('message_true');
    // answer1.classList.add('message_true_bottom');
    //これを入れると灰色の枠内全てに下線が入る
});
target1_1.addEventListener('click', () => {
    target1_0.classList.add('choice_square_true');
    target1_0.classList.add('choice_true');
    target1_1.classList.add('choice_square_false');
    target1_1.classList.add('choice_false');
    document.getElementById('answer1').style.display ='none';
    document.getElementById('no_answer1').style.display ='block'
    no_answer1.classList.add('message');
    no_answer1.classList.add('message_false');
});
target1_2.addEventListener('click', () => {
    target1_0.classList.add('choice_square_true');
    target1_0.classList.add('choice_true');
    target1_2.classList.add('choice_square_false');
    target1_2.classList.add('choice_false');
    document.getElementById('answer1').style.display ='none';
    document.getElementById('no_answer1').style.display ='block'
    no_answer1.classList.add('message');
    no_answer1.classList.add('message_false');
});

//問2
const target2_0 = document.getElementById('target2_0');
const target2_1 = document.getElementById('target2_1');
const target2_2 = document.getElementById('target2_2');
const answer2 = document.getElementById('answer2')
const no_answer2 = document.getElementById('no_answer2')
document.getElementById('answer2').style.display ='none';
document.getElementById('no_answer2').style.display ='none'
target2_0.addEventListener('click', () => {
    target2_0.classList.add('choice_square_true');
    target2_0.classList.add('choice_true');
    document.getElementById('answer2').style.display ='block';
    document.getElementById('no_answer2').style.display ='none'
    answer.classList.add('message');
    answer.classList.add('message_true');
});
target2_1.addEventListener('click', () => {
    target2_0.classList.add('choice_square_true');
    target2_0.classList.add('choice_true');
    target2_1.classList.add('choice_square_false');
    target2_1.classList.add('choice_false');
    document.getElementById('answer2').style.display ='none';
    document.getElementById('no_answer2').style.display ='block'
    no_answer2.classList.add('message');
    no_answer2.classList.add('message_false');
});
target2_2.addEventListener('click', () => {
    target2_0.classList.add('choice_square_true');
    target2_0.classList.add('choice_true');
    target2_2.classList.add('choice_square_false');
    target2_2.classList.add('choice_false');
    document.getElementById('answer2').style.display ='none';
    document.getElementById('no_answer2').style.display ='block'
    no_answer2.classList.add('message');
    no_answer2.classList.add('message_false');
});

//問3
const target3_0 = document.getElementById('target3_0');
const target3_1 = document.getElementById('target3_1');
const target3_2 = document.getElementById('target3_2');
const answer3 = document.getElementById('answer3')
const no_answer3 = document.getElementById('no_answer3')
document.getElementById('answer3').style.display ='none';
document.getElementById('no_answer3').style.display ='none'
target3_0.addEventListener('click', () => { 
    target3_0.classList.add('choice_square_true');
    target3_0.classList.add('choice_true');
    document.getElementById('answer3').style.display ='block';
    document.getElementById('no_answer3').style.display ='none'
    answer.classList.add('message');
    answer.classList.add('message_true');
});
target3_1.addEventListener('click', () => {
    target3_0.classList.add('choice_square_true');
    target3_0.classList.add('choice_true');
    target3_1.classList.add('choice_square_false');
    target3_1.classList.add('choice_false');
    document.getElementById('answer3').style.display ='none';
    document.getElementById('no_answer3').style.display ='block'
    no_answer3.classList.add('message');
    no_answer3.classList.add('message_false');
});
target3_2.addEventListener('click', () => {
    target3_0.classList.add('choice_square_true');
    target3_0.classList.add('choice_true');
    target3_2.classList.add('choice_square_false');
    target3_2.classList.add('choice_false');
    document.getElementById('answer3').style.display ='none';
    document.getElementById('no_answer3').style.display ='block'
    no_answer3.classList.add('message');
    no_answer3.classList.add('message_false');
});

//問4
const target4_0 = document.getElementById('target4_0');
const target4_1 = document.getElementById('target4_1');
const target4_2 = document.getElementById('target4_2');
const answer4 = document.getElementById('answer4')
const no_answer4 = document.getElementById('no_answer4')
document.getElementById('answer4').style.display ='none';
document.getElementById('no_answer4').style.display ='none'
target4_0.addEventListener('click', () => { 
    target4_0.classList.add('choice_square_true');
    target4_0.classList.add('choice_true');
    document.getElementById('answer4').style.display ='block';
    document.getElementById('no_answer4').style.display ='none'
    answer.classList.add('message');
    answer.classList.add('message_true');
});
target4_1.addEventListener('click', () => {
    target4_0.classList.add('choice_square_true');
    target4_0.classList.add('choice_true');
    target4_1.classList.add('choice_square_false');
    target4_1.classList.add('choice_false');
    document.getElementById('answer4').style.display ='none';
    document.getElementById('no_answer4').style.display ='block'
    no_answer4.classList.add('message');
    no_answer4.classList.add('message_false');
});
target4_2.addEventListener('click', () => {
    target4_0.classList.add('choice_square_true');
    target4_0.classList.add('choice_true');
    target4_2.classList.add('choice_square_false');
    target4_2.classList.add('choice_false');
    document.getElementById('answer4').style.display ='none';
    document.getElementById('no_answer4').style.display ='block'
    no_answer4.classList.add('message');
    no_answer4.classList.add('message_false');
});

//問5
const target5_0 = document.getElementById('target5_0');
const target5_1 = document.getElementById('target5_1');
const target5_2 = document.getElementById('target5_2');
const answer5 = document.getElementById('answer5')
const no_answer5 = document.getElementById('no_answer5')
document.getElementById('answer5').style.display ='none';
document.getElementById('no_answer5').style.display ='none'
target5_0.addEventListener('click', () => { 
    target5_0.classList.add('choice_square_true');
    target5_0.classList.add('choice_true');
    document.getElementById('answer5').style.display ='block';
    document.getElementById('no_answer5').style.display ='none'
    answer.classList.add('message');
    answer.classList.add('message_true');
});
target5_1.addEventListener('click', () => {
    target5_0.classList.add('choice_square_true');
    target5_0.classList.add('choice_true');
    target5_1.classList.add('choice_square_false');
    target5_1.classList.add('choice_false');
    document.getElementById('answer5').style.display ='none';
    document.getElementById('no_answer5').style.display ='block'
    no_answer5.classList.add('message');
    no_answer5.classList.add('message_false');
});
target5_2.addEventListener('click', () => {
    target5_0.classList.add('choice_square_true');
    target5_0.classList.add('choice_true');
    target5_2.classList.add('choice_square_false');
    target5_2.classList.add('choice_false');
    document.getElementById('answer5').style.display ='none';
    document.getElementById('no_answer5').style.display ='block'
    no_answer5.classList.add('message');
    no_answer5.classList.add('message_false');
});

//問6
const target6_0 = document.getElementById('target6_0');
const target6_1 = document.getElementById('target6_1');
const target6_2 = document.getElementById('target6_2');
const answer6 = document.getElementById('answer6')
const no_answer6 = document.getElementById('no_answer6')
document.getElementById('answer6').style.display ='none';
document.getElementById('no_answer6').style.display ='none'
target6_0.addEventListener('click', () => { 
    target6_0.classList.add('choice_square_true');
    target6_0.classList.add('choice_true');
    document.getElementById('answer6').style.display ='block';
    document.getElementById('no_answer6').style.display ='none'
    answer.classList.add('message');
    answer.classList.add('message_true');
});
target6_1.addEventListener('click', () => {
    target6_0.classList.add('choice_square_true');
    target6_0.classList.add('choice_true');
    target6_1.classList.add('choice_square_false');
    target6_1.classList.add('choice_false');
    document.getElementById('answer6').style.display ='none';
    document.getElementById('no_answer6').style.display ='block'
    no_answer6.classList.add('message');
    no_answer6.classList.add('message_false');
});
target6_2.addEventListener('click', () => {
    target6_0.classList.add('choice_square_true');
    target6_0.classList.add('choice_true');
    target6_2.classList.add('choice_square_false');
    target6_2.classList.add('choice_false');
    document.getElementById('answer6').style.display ='none';
    document.getElementById('no_answer6').style.display ='block'
    no_answer6.classList.add('message');
    no_answer6.classList.add('message_false');
});

//問7
const target7_0 = document.getElementById('target7_0');
const target7_1 = document.getElementById('target7_1');
const target7_2 = document.getElementById('target7_2');
const answer7 = document.getElementById('answer7')
const no_answer7 = document.getElementById('no_answer7')
document.getElementById('answer7').style.display ='none';
document.getElementById('no_answer7').style.display ='none'
target7_0.addEventListener('click', () => { 
    target7_0.classList.add('choice_square_true');
    target7_0.classList.add('choice_true');
    document.getElementById('answer7').style.display ='block';
    document.getElementById('no_answer7').style.display ='none'
    answer.classList.add('message');
    answer.classList.add('message_true');
});
target7_1.addEventListener('click', () => {
    target7_0.classList.add('choice_square_true');
    target7_0.classList.add('choice_true');
    target7_1.classList.add('choice_square_false');
    target7_1.classList.add('choice_false');
    document.getElementById('answer7').style.display ='none';
    document.getElementById('no_answer7').style.display ='block'
    no_answer7.classList.add('message');
    no_answer7.classList.add('message_false');
});
target7_2.addEventListener('click', () => {
    target7_0.classList.add('choice_square_true');
    target7_0.classList.add('choice_true');
    target7_2.classList.add('choice_square_false');
    target7_2.classList.add('choice_false');
    document.getElementById('answer7').style.display ='none';
    document.getElementById('no_answer7').style.display ='block'
    no_answer7.classList.add('message');
    no_answer7.classList.add('message_false');
});

//問8
const target8_0 = document.getElementById('target8_0');
const target8_1 = document.getElementById('target8_1');
const target8_2 = document.getElementById('target8_2');
const answer8 = document.getElementById('answer8')
const no_answer8 = document.getElementById('no_answer8')
document.getElementById('answer8').style.display ='none';
document.getElementById('no_answer8').style.display ='none'
target8_0.addEventListener('click', () => { 
    target8_0.classList.add('choice_square_true');
    target8_0.classList.add('choice_true');
    document.getElementById('answer8').style.display ='block';
    document.getElementById('no_answer8').style.display ='none'
    answer.classList.add('message');
    answer.classList.add('message_true');
});
target8_1.addEventListener('click', () => {
    target8_0.classList.add('choice_square_true');
    target8_0.classList.add('choice_true');
    target8_1.classList.add('choice_square_false');
    target8_1.classList.add('choice_false');
    document.getElementById('answer8').style.display ='none';
    document.getElementById('no_answer8').style.display ='block'
    no_answer8.classList.add('message');
    no_answer8.classList.add('message_false');
});
target8_2.addEventListener('click', () => {
    target8_0.classList.add('choice_square_true');
    target8_0.classList.add('choice_true');
    target8_2.classList.add('choice_square_false');
    target8_2.classList.add('choice_false');
    document.getElementById('answer8').style.display ='none';
    document.getElementById('no_answer8').style.display ='block'
    no_answer8.classList.add('message');
    no_answer8.classList.add('message_false');
});

//問9
const target9_0 = document.getElementById('target9_0');
const target9_1 = document.getElementById('target9_1');
const target9_2 = document.getElementById('target9_2');
const answer9 = document.getElementById('answer9')
const no_answer9 = document.getElementById('no_answer9')
document.getElementById('answer9').style.display ='none';
document.getElementById('no_answer9').style.display ='none'
target9_0.addEventListener('click', () => { 
    target9_0.classList.add('choice_square_true');
    target9_0.classList.add('choice_true');
    document.getElementById('answer9').style.display ='block';
    document.getElementById('no_answer9').style.display ='none'
    answer.classList.add('message');
    answer.classList.add('message_true');
});
target9_1.addEventListener('click', () => {
    target9_0.classList.add('choice_square_true');
    target9_0.classList.add('choice_true');
    target9_1.classList.add('choice_square_false');
    target9_1.classList.add('choice_false');
    document.getElementById('answer9').style.display ='none';
    document.getElementById('no_answer9').style.display ='block'
    no_answer9.classList.add('message');
    no_answer9.classList.add('message_false');
});
target9_2.addEventListener('click', () => {
    target9_0.classList.add('choice_square_true');
    target9_0.classList.add('choice_true');
    target9_2.classList.add('choice_square_false');
    target9_2.classList.add('choice_false');
    document.getElementById('answer9').style.display ='none';
    document.getElementById('no_answer9').style.display ='block'
    no_answer9.classList.add('message');
    no_answer9.classList.add('message_false');
});

//問10
const target10_0 = document.getElementById('target10_0');
const target10_1 = document.getElementById('target10_1');
const target10_2 = document.getElementById('target10_2');
const answer10 = document.getElementById('answer10')
const no_answer10 = document.getElementById('no_answer10')
document.getElementById('answer10').style.display ='none';
document.getElementById('no_answer10').style.display ='none'
target10_0.addEventListener('click', () => { 
    target10_0.classList.add('choice_square_true');
    target10_0.classList.add('choice_true');
    document.getElementById('answer10').style.display ='block';
    document.getElementById('no_answer10').style.display ='none'
    answer.classList.add('message');
    answer.classList.add('message_true');
});
target10_1.addEventListener('click', () => {
    target10_0.classList.add('choice_square_true');
    target10_0.classList.add('choice_true');
    target10_1.classList.add('choice_square_false');
    target10_1.classList.add('choice_false');
    document.getElementById('answer10').style.display ='none';
    document.getElementById('no_answer10').style.display ='block'
    no_answer10.classList.add('message');
    no_answer10.classList.add('message_false');
});
target10_2.addEventListener('click', () => {
    target10_0.classList.add('choice_square_true');
    target10_0.classList.add('choice_true');
    target10_2.classList.add('choice_square_false');
    target10_2.classList.add('choice_false');
    document.getElementById('answer10').style.display ='none';
    document.getElementById('no_answer10').style.display ='block'
    no_answer10.classList.add('message');
    no_answer10.classList.add('message_false');
});