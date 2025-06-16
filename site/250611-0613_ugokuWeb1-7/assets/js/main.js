'use strict'

/*******************************************
 *  画面上にスクロールバー ChatGPT使った
 *******************************************/
// スクロールバーを取得
const progressBar = document.querySelector('.splashbg');

// スクロール時にバーの幅を更新
window.addEventListener('scroll', () => {
    // 現在の**スクロール位置（縦方向）**を表す数値。
    const scrollTop = window.scrollY;
    // スクロールできる全体の距離（最大スクロール量） = ページ全体の高さ - 今現在画面に表示されているウィンドウの高さ
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    // 今どれくらいスクロールしたか（パーセント）
    const scrollPercent = (scrollTop / docHeight) * 100;
    progressBar.style.width = scrollPercent + '%';
});
/*******************************************
 *  ハンバーガーメニュー 1時間
 *******************************************/

const hamburgerMenuWrapper = document.querySelector('.hamburger_menu_wrapper');
const menuWrapper = document.querySelector('.menu_wrapper');

menuWrapper.addEventListener('click', () => {
    hamburgerMenuWrapper.classList.toggle('open');
    menuWrapper.classList.toggle('open')
});

let linkLists = document.querySelectorAll('.menu_item a');
linkLists.forEach(linklist => {
    linklist.addEventListener('click', () => {
        hamburgerMenuWrapper.classList.remove('open');
        menuWrapper.classList.remove('open');
    });
});

/*******************************************
 *  トップへ戻る 1時間
 *******************************************/
// スクロールイベントでボタンを表示・非表示に切り替え
window.addEventListener('scroll', () => {
    const btn = document.querySelector('.scrollToTopBtn');
    if (window.scrollY > 300) {
        btn.style.display = 'block';
    } else {
        btn.style.display = 'none'
    }
});

// ボタンをクリックするとページトップへスクロール
const scrollBtn = document.querySelector('.scrollToTopBtn');
scrollBtn.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
    scrollBtn.classList.add('click');
});

/*******************************************
 *  swiper.js ブログ 
 *  レスポンシブ対応 ChatGPT
 *******************************************/
let swiper = null;

function initSwiper() {
    const isMobile = window.innerWidth < 769;

    if (!isMobile && !swiper) {
        const swiper = new Swiper('.swiper-container', {
            direction: 'vertical', // 縦スクロールに設定
            loop: true, // ループ設定（任意）
            speed: 700, // スライドのスピードを設定
            autoplay: {
                delay: 1700, // オートプレイの設定
            }
        });
    } else if (isMobile && swiper) {
        // スマホ表示ならスライダーを削除
        swiper.destroy(true, true);
        swiper = null;
    }
}
// 初期化
initSwiper();

// リサイズ時もチェック
window.addEventListener('resize', () => {
    initSwiper();
});

/*******************************************
 *  rorateY 360 ・ 文字の上で流れる背景色 ・ 上から下に流れる要素 2時間 動くWebデザインアイディア帳とChatGRT
 *******************************************/
// スクロールしてrorateYクラスとbgextendクラスに到達したらonクラスを付与する
document.addEventListener('DOMContentLoaded', () => {
    const targets = document.querySelectorAll('.rotateY');
    const bgTargets = document.querySelectorAll('.bgextend');
    const upTargets = document.querySelectorAll('.up_anime');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('on');
            }
        });
    }, {
        threshold: 0.1 //要素の10％が表示されたら発火
    });
    targets.forEach(target => {
        observer.observe(target);
    });
    bgTargets.forEach(bgTarget => {
        observer.observe(bgTarget);
    });
    upTargets.forEach(upTarget => {
        observer.observe(upTarget);
    });
});
/*******************************************
 *  アコーディオンメニュー 1時間 ChatGPT
 *******************************************/
document.addEventListener('DOMContentLoaded', () => {
    const questions = document.querySelectorAll('.question');
    questions.forEach(question => {
        question.addEventListener('click', () => {
            const answer = question.nextElementSibling;
            if (answer && answer.classList.contains('answer')) { // その要素が .answer クラスを持っているか確認
                answer.classList.toggle('active');
                answer.classList.toggle('close');
                question.classList.toggle('active');
            }
        });
    });
});




/*******************************************
 *  ローディング
 *******************************************/
window.addEventListener('load', function () {
    // 1.5秒（1500ms）後に #splash をフェードアウト
    setTimeout(() => {
        const splash = document.querySelector('.loading');
        if (splash) {
            splash.style.transition = 'opacity 0.6s ease';
            splash.style.opacity = '0';
            setTimeout(() => splash.style.display = 'none', 600); // アニメーション後に非表示
        }
    }, 1500);

    setTimeout(() => {
        const loadingbg = document.querySelector('.loadingbg');
        if (loadingbg) {
            loadingbg.classList.add('on');
            setTimeout(() => {
                loadingbg.style.display = 'none';

                const bgTargets = document.querySelectorAll('.bgextend1');
                // bgTargetsをforeachでtargetにし
                bgTargets.forEach(target => {
                    target.classList.add('on');
                });

            }, 1200);
        }
    }, 1500);
});