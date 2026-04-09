'use strict';

// =================================================================
// ヒーローページを3秒ごとに切り替え
// =================================================================
window.addEventListener('load', () => {
    let currentImage = 0;
    const images = document.querySelectorAll('.crossfade');

    // 初期画像の不透明度を設定
    if (images.length > 0) {
        images[0].style.opacity = 1;
    }

    function crossfadeImages() {
        if (images.length === 0) {
            return; // 画像が存在しない場合は何もしない
        }

        // 現在の画像の不透明度を0に設定
        images[currentImage].style.opacity = 0;

        // 次の画像のインデックスを計算
        currentImage = (currentImage + 1) % images.length;

        // 次の画像の不透明度を1に設定
        images[currentImage].style.opacity = 1;
    }

    // 5秒ごとにクロスフェード実行
    setInterval(crossfadeImages, 5000);
});

// =================================================================
// AOS.js設定
// =================================================================
document.addEventListener('DOMContentLoaded', function () {
    AOS.init({
        duration: 600,
        easing: 'ease-out',
        delay: 100,
        once: false,
    });

    // AOS.jsのズレ対策
    document
        .querySelectorAll('img')
        .forEach((img) => img.addEventListener('load', () => AOS.refresh()));
});
// =================================================================
// luxy.js
// =================================================================
// window.onload = function () {
//     luxy.init();
// };

// =================================================================
// topへ戻るボタン
// =================================================================
document.addEventListener('DOMContentLoaded', () => {
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    const topElement = document.getElementById('top_element');
    const windowHeight = window.innerHeight;

    // スクロール位置に基づいたボタンの表示状態を更新する関数
    const checkScroll = () => {
        if (window.scrollY > windowHeight) {
            scrollTopBtn.classList.add('show');
        } else {
            scrollTopBtn.classList.remove('show');
        }
    };

    // スクロールイベントの監視
    window.addEventListener('scroll', checkScroll);

    // ボタンクリック時の動作
    scrollTopBtn.addEventListener('click', () => {
        topElement.scrollIntoView({ behavior: 'smooth' });
    });

    // ページ読み込み時にスクロール位置をチェック
    checkScroll();
});
// =================================================================
// ハンバーガーメニューとscrollTopボタンの表示制御
// =================================================================

document.addEventListener('DOMContentLoaded', function () {
    const offset = 0; // navバーの高さ
    const hamburgerButton = document.querySelector('.hamburger_menu_button'); // ハンバーガーメニューボタン
    const hamburgerMask = document.querySelector('.hamburger_menu_mask'); // 背景のマスク
    const navbar = document.querySelector('.hamburger_menu'); // ナビゲーションバー
    const anchorLinks = navbar.querySelectorAll('a[href^="#"]'); // ナビゲーションバー内のページ内リンク
    const scrollTopBtn = document.querySelector('#scrollTopBtn'); // scrollTopボタン
    const body = document.body; // body要素の取得

    // クラスをトグルする共通の関数
    function toggleOpened(elements) {
        elements.forEach((element) => element.classList.toggle('opened'));
    }

    // スクロールを制御する関数
    function toggleBodyScroll() {
        body.classList.toggle('no-scroll');
    }

    // scrollTopボタンの表示状態を制御する関数
    function toggleScrollTopButton() {
        if (navbar.classList.contains('opened')) {
            scrollTopBtn.classList.add('hide');
        } else {
            scrollTopBtn.classList.remove('hide');
        }
    }

    // ハンバーガーメニューボタンにクリックイベントを追加
    hamburgerButton.addEventListener('click', function () {
        toggleOpened([this, hamburgerMask, navbar]);
        toggleScrollTopButton(); // scrollTopボタンの表示状態を更新
        toggleBodyScroll(); // bodyのスクロールを制御
    });

    // マスク領域をクリックした時の処理
    hamburgerMask.addEventListener('click', function () {
        if (this.classList.contains('opened')) {
            toggleOpened([this, hamburgerButton, navbar]);
            toggleScrollTopButton(); // scrollTopボタンの表示状態を更新
            toggleBodyScroll(); // bodyのスクロールを制御
        }
    });

    // ナビゲーションバー内のリンクにイベントを設定
    anchorLinks.forEach((link) => {
        link.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            const targetPosition =
                window.pageYOffset + targetElement.getBoundingClientRect().top;

            // スクロール位置を調整
            window.scrollTo({
                top: targetPosition - offset,
                behavior: 'smooth',
            });

            toggleOpened([hamburgerButton, hamburgerMask, navbar]);
            toggleScrollTopButton(); // scrollTopボタンの表示状態を更新
            toggleBodyScroll(); // bodyのスクロールを制御

            e.preventDefault(); // デフォルトの動作を無効化
        });
    });
});
