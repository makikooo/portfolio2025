"use strict";
const quiz = [
  {
    question: "ゲーム市場、最も売れたゲーム機は次のうちどれ？",
    answers: [
      "スーパーファミコン",
      "プレイステーション2",
      "ニンテンドースイッチ",
      "ニンテンドーDS",
    ],
    correct: "ニンテンドーDS",
  },
  {
    question: "糸井重里が企画に関わった任天堂の看板ゲームといえば？",
    answers: [
      "MOTHER2",
      "スーパーマリオブラザーズ3",
      "スーパードンキーコング",
      "星のカービィ",
    ],
    correct: "MOTHER2",
  },
  {
    question: "ファイナルファンタジーⅣの主人公の名前は？",
    answers: ["フリオニール", "クラウド", "ティーダ", "セシル"],
    correct: "セシル",
  },
];

const quizLength = quiz.length;
let quizIndex = 0;
let score = 0;

// // 問題文・選択肢・答えの3つを変数・定数で定義
// const question = "ゲーム市場、最も売れたゲーム機は次のうちどれ？";
// const answers = [
//   "スーパーファミコン",
//   "プレイステーション2",
//   "ニンテンドースイッチ",
//   "ニンテンドーDS",
// ];
// const correct = "ニンテンドーDS";

// HTMLのオブジェクトを取ってくる場合「$」をつける
const $button = document.getElementsByTagName("button");
const buttonLength = $button.length;

// 定数の文字列をHTMLに反映させる
//クイズの問題文、選択肢を定義
const setupQuiz = () => {
  document.getElementById("js-question").textContent = quiz[quizIndex].question;
  // リファクタリング
  // ソースコードをきれいにする
  let buttonIndex = 0;
  //   let buttonLength = $button.length;
  while (buttonIndex < buttonLength) {
    $button[buttonIndex].textContent = quiz[quizIndex].answers[buttonIndex];
    buttonIndex++;
  }
  // $button[0].textContent = answers[0];
  // $button[1].textContent = answers[1];
  // $button[2].textContent = answers[2];
  // $button[3].textContent = answers[3];
};
setupQuiz();

// リファクタリング
const clickHandler = (e) => {
  console.log(e);
  // eとはイベントのオブジェクト
  // targetは今クリックされたボタン自体のこと
  if (quiz[quizIndex].correct === e.target.textContent) {
    window.alert("正解！");
    score++;
  } else {
    window.alert("不正解！");
  }

  quizIndex++;

  if (quizIndex < quizLength) {
    //問題数がまだあればこちらを実行
    setupQuiz();
  } else {
    //問題数がもうなければこちらを実行
    window.alert("終了!あなたの正解数は" + score + "/" + quizLength + "です！");
  }
};
// ボタンをクリックしたら正誤判定
//リファクタリング
let handlerIndex = 0;
// const buttonLength = $button.length;
while (handlerIndex < buttonLength) {
  $button[handlerIndex].addEventListener("click", (e) => {
    clickHandler(e);
  });
  handlerIndex++;
}

// $button[0].addEventListener("click", (e) => {
//   clickHandler(e);
// });

// $button[0].addEventListener("click", () => {
//   if (correct === $button[0].textContent) {
//     window.alert("正解！");
//   } else {
//     window.alert("不正解！");
//   }
// });
// $button[1].addEventListener("click", () => {
//   if (correct === $button[1].textContent) {
//     window.alert("正解！");
//   } else {
//     window.alert("不正解！");
//   }
// });
// $button[2].addEventListener("click", () => {
//   if (correct === $button[2].textContent) {
//     window.alert("正解！");
//   } else {
//     window.alert("不正解！");
//   }
// });
// $button[3].addEventListener("click", () => {
//   if (correct === $button[3].textContent) {
//     window.alert("正解！");
//   } else {
//     window.alert("不正解！");
//   }
// });
