'use stript'

const questions = [
    'JavaScript',
    'document',
    'window',
    'getElementById',
    'getElementByClassName',
    'addEventListener'
];

const entered = document.getElementById('entered');
const remained = document.getElementById('remained');
const inputText = document.getElementById('inputText');
const game = document.getElementById('game');
const message = document.getElementById('message');
const replayBtn = document.getElementById('replayBtn');


let remainedTextWords = remained.textContent.split('');
let enteredTextWords = [];
let currentKey;
let currentText;

// 新しい問題文をランダムにセットする関数
const setQuestion = () => {
    //配列の中からランダムで問題文を一つ選ぶ
    currentKey = Math.floor( Math.random() * questions.length);
    currentText = questions[ currentKey ];

    // 現在の問題分をリセットして新しい問題文を表示させる
    // 画面に新しい問題文をリセット
    entered.textContent = '';
    remained.textContent = currentText;
    
    // 一度選ばれた問題は配列から削除する
    questions.splice(currentKey, 1);
    console.log(questions);


    // これまでに入力されたフォームのリセット
    inputText.value = '';

    // 入力済みの文字、未入力の文字の配列の中身をリセット
    enteredTextWords = [];
    remainedTextWords = currentText.split('');
}
setQuestion();

document.addEventListener('input', (e) => {
    if(remainedTextWords[0] === e.data){

        // 入力済み文字の配列の最後に1文字追加
        enteredTextWords.push( remainedTextWords[0] );
        // 未入力文字の配列の先頭から1文字削除
        remainedTextWords.shift();

        
        // 入力済みテキスト＆未入力テキストを連結して画面表示
        entered.textContent = enteredTextWords.join('');
        remained.textContent = remainedTextWords.join('');

        // 全ての文字が正しく入力されたら新しい問題文をセット
        if(remainedTextWords.length <= 0) {
            if(questions.length <= 0) {
                game.classList.add('hidden');
                message.classList.remove('hidden');

            }  else {
                setQuestion(); // 新しい問題文をセットする関数を使って実行
            }
        }
    } 
});

//　もう一度プレイするボタン
replayBtn.addEventListener('click',() => {
    window.location.reload();
});