"use strict";


// クラスで作成
class Modal {
    constructor(openBtn, overlay, closeBtn) {
        // セレクタをもとに要素を取得
        this.$modalOpen = document.querySelector('.modal-open');
        this.$modalOverlay = document.querySelector('.modal-overlay');
        this.$modalClose = document.querySelector('.modal-close');
        if(this.$modalOpen && this.$modalOverlay && this.$modalClose) {
            this.init();
        } else {
            console.error('指定された要素が見つかりません。')
        }
    }

    // イベントを初期化
    init() {
        // モーダルを開くボタンのクリックイベント
        this.$modalOpen.addEventListener('click', () => this.openModal());
        // モーダルを閉じるボタンのクリックイベント
        this.$modalClose.addEventListener('click',() => this.closeModal());

        // オーバーレイをクリックして閉じる
        this.$modalOverlay.addEventListener('click', (e) => {
            if(e.target === this.$modalOverlay) {
                this.closeModal();
            }
        });
    }

    // モーダルを開く
    openModal() {
        this.$modalOverlay.style.display = 'block';
    }
    // モーダルを閉じる
    closeModal() {
        this.$modalOverlay.style.display ='none';
    }
}

// クラスのインスタンス化
const modal = new Modal('.modal-open', '.modal-overlay', '.modal-close');


//　最初にコーディングしてみた
// const $modalOpen = document.querySelector('.modal-open');
// const $modalOverlay = document.querySelector('.modal-overlay');

// const $modalClose = document.querySelector('.modal-close');


// $modalOpen.addEventListener('click', function() {
//     $modalOverlay.style.display = 'block';
// });

// $modalClose.addEventListener('click',function() {
//     $modalOverlay.style.display = 'none';

// });