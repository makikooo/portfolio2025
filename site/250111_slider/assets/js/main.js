'use strict'

// function initializeCarousel (container, options = {}) {

//     const track = container.querySelector('.carousel-track');
//     // 各スライドを配列として取得
//     const slides = Array.from(container.querySelectorAll('.image-container'));
//     const dotsContainer = container.querySelector('#dots');
//     const playPauseButton = container.querySelector('#play-pause');
//     const prevButton = container.querySelector('#prev');
//     const nextButton = container.querySelector('#next');
    
//     // 現在表示しているスライドのインデックス
//     let currentIndex = 0;
//     let isPlaying = true;
//     let autoplayInterval = null;

//     const defaultOptions = {
//         autoplaySpeed: 3000,
//         autoplay: true,
//     };

//     //ユーザー設定とデフォルト設定をマージ
//     const settings = { ...defaultOptions, ...options};

//     function setupClones() {
//         const firstClone = slides[0].cloneNode(true); // 最初のスライドをコピー
//         const lastClone = slides[slides.length - 1].cloneNode(true);
//         track.appendChild(firstClone);
//         track.insertBefore(lastClone, slides[0]);
//         setPosition(false); // 初期位置の設定（アニメーションなし）
//     }
    
//     // ドットナビゲージョンのセットアップ
//     function setUpDots() {
//         dotsContainer.innerHTML = '';
//         slides.forEach((_, index) => {
//             const dot = document.createElement('div');
//             dot.className = 'dot';
//             dot.addEventListener('click', () => {
//                 goToSlide(index);
//                 stopAutoplay();
//             })
//             dotsContainer.appendChild(dot);
//         });
//         updateDots();
//     }

//     function updateDots() {
//         const dots = dotsContainer.querySelectorAll('.dot');
//         dots.forEach((dot, index) => {
//             dot.classList.toggle('active', index === currentIndex)
//         });
//     }

//     function startAutoplay() {
//         if(autoplayInterval) {
//             clearInterval(autoplayInterval); // 既存のタイマーをクリア
//         }
//         autoplayInterval = setInterval(next, settings.autoplaySpeed); // 一定間隔で次のスライドへ
//         isPlaying = true;
//         updatePlayPauseButton();
//     }

//     function stopAutoplay() {
//         if(autoplayInterval) {
//             clearInterval(autoplayInterval);
//             autoplayInterval = null;
//         }
//         isPlaying = false;
//         updatePlayPauseButton();
//     }

//     function updatePlayPauseButton() {
//         playPauseButton.textContent = isPlaying ? '⏸' : '▶';
//     }


//     // トラックをスライドの位置に応じて移動
//     function setPosition(animate = true){
//         const slideWidth = slides[0].offsetWidth;
//         const position = -(slideWidth * (currentIndex + 1)); // トラックを移動する位置を計算

//         if (!animate) {
//             track.style.transition = 'none'; // アニメーションを無効化
//         }
//         track.style.transform = `translateX(${position}px)`;
//         if(!animate) {
//             setTimeout(() => {
//                 track.style.transition = 'transform 0.3s ease-out';
//             }, 10);
//         }
//     }
//     // トラックのアニメーションが修了した時の処理
//     function handleTransitionEnd() {
//         if(currentIndex >= slides.length){
//             track.style.transition = 'none';
//             currentIndex = 0;
//             setPosition(false);
//             setTimeout(() => {
//                 track.style.transition = 'transform 0.3s ease-out';
//             }, 10);
//         } else if (currentIndex < 0) {
//             track.style.transition = 'none';
//             currentIndex = slides.length - 1;
//             setPosition(false);
//             setTimeout(() => {
//                 track.style.transition ='transform 0.3s ease-out';
//             }, 10);
//         }
//         updateDots();
//     }

//     // 前のスライドに移動
//     function prev() {
//         currentIndex--;
//         setPosition();
//     }

//     // 次のスライドに移動
//     function next() {
//         currentIndex++;
//         setPosition();
//     }

//     // 特定のスライドに移動
//     function goToSlide(index) {
//         currentIndex = index;
//         setPosition();
//     }

//     // イベントリスナーをバインド
//     //　バインドとはthis引数としてターゲット関数に渡す値
//     function bindEvents() {
//         prevButton.addEventListener('click', () => {
//             prev();
//             stopAutoplay();
//         });

//         nextButton.addEventListener('click', () => {
//             next();
//             stopAutoplay();
//         });

//         playPauseButton.addEventListener('click', () => {
//             if(isPlaying) {
//                 stopAutoplay();
//             } else {
//                 startAutoplay();
//             }
//         });

//         container.addEventListener('mouseenter', () => {
//             if(isPlaying) {
//                 stopAutoplay();
//             }
//         });

//         container.addEventListener('mouseleave', () => {
//             if(settings.autoplay) {
//                 startAutoplay();
//             }
//         });
//         track.addEventListener('transitionend', handleTransitionEnd)
//     }

    
    
//     // 初期化処理
//     setUpDots(); // ドットをセットアップ
//     setupClones();
//     bindEvents();

//     if(settings.autoplay) {
//         startAutoplay();
//     }
// }

// // ページ読み込み後にカルーセルを初期化
// document.addEventListener('DOMContentLoaded', () => {
//     const carouselContainer = document.querySelector('.carousel-container');
//     initializeCarousel(carouselContainer, {
//         autoplay: true, // 自動再生を有効化
//         autoplaySpeed: 3000, // 自動再生の間隔を設定
//     });
// });

// クラスで表記
class Carousel {
    constructor(container, options = {}) {
        this.container = container;
        this.track = container.querySelector('.carousel-track');
        this.slides = Array.from(container.querySelectorAll('.image-container'));
        this.dotsContainer = container.querySelector('#dots');
        this.playPauseButton = container.querySelector('#play-pause');
        this.prevButton = container.querySelector('#prev');
        this.nextButton = container.querySelector('#next');
        
        this.currentIndex = 0;
        this.isPlaying = true;
        this.autoplayInterval = null;
        
        // デフォルト設定とユーザー設定をマージ
        this.settings = {
            autoplaySpeed: 3000,
            autoplay: true,
            ...options
        };

        this.initialize();
    }

    setupClones() {
        const firstClone = this.slides[0].cloneNode(true);
        const lastClone = this.slides[this.slides.length - 1].cloneNode(true);
        this.track.appendChild(firstClone);
        this.track.insertBefore(lastClone, this.slides[0]);
        this.setPosition(false);
    }

    setUpDots() {
        this.dotsContainer.innerHTML = '';
        this.slides.forEach((_, index) => {
            const dot = document.createElement('div');
            dot.className = 'dot';
            dot.addEventListener('click', () => {
                this.goToSlide(index);
                this.stopAutoplay();
            });
            this.dotsContainer.appendChild(dot);
        });
        this.updateDots();
    }

    updateDots() {
        const dots = this.dotsContainer.querySelectorAll('.dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === this.currentIndex);
        });
    }

    startAutoplay() {
        if (this.autoplayInterval) {
            clearInterval(this.autoplayInterval);
        }
        this.autoplayInterval = setInterval(() => this.next(), this.settings.autoplaySpeed);
        this.isPlaying = true;
        this.updatePlayPauseButton();
    }

    stopAutoplay() {
        if (this.autoplayInterval) {
            clearInterval(this.autoplayInterval);
            this.autoplayInterval = null;
        }
        this.isPlaying = false;
        this.updatePlayPauseButton();
    }

    updatePlayPauseButton() {
        this.playPauseButton.textContent = this.isPlaying ? '⏸' : '▶';
    }

    setPosition(animate = true) {
        const slideWidth = this.slides[0].offsetWidth;
        const position = -(slideWidth * (this.currentIndex + 1));

        if (!animate) {
            this.track.style.transition = 'none';
        }
        this.track.style.transform = `translateX(${position}px)`;
        if (!animate) {
            setTimeout(() => {
                this.track.style.transition = 'transform 0.3s ease-out';
            }, 10);
        }
    }

    handleTransitionEnd = () => {
        if (this.currentIndex >= this.slides.length) {
            this.track.style.transition = 'none';
            this.currentIndex = 0;
            this.setPosition(false);
            setTimeout(() => {
                this.track.style.transition = 'transform 0.3s ease-out';
            }, 10);
        } else if (this.currentIndex < 0) {
            this.track.style.transition = 'none';
            this.currentIndex = this.slides.length - 1;
            this.setPosition(false);
            setTimeout(() => {
                this.track.style.transition = 'transform 0.3s ease-out';
            }, 10);
        }
        this.updateDots();
    }

    prev() {
        this.currentIndex--;
        this.setPosition();
    }

    next() {
        this.currentIndex++;
        this.setPosition();
    }

    goToSlide(index) {
        this.currentIndex = index;
        this.setPosition();
    }

    bindEvents() {
        this.prevButton.addEventListener('click', () => {
            this.prev();
            this.stopAutoplay();
        });

        this.nextButton.addEventListener('click', () => {
            this.next();
            this.stopAutoplay();
        });

        this.playPauseButton.addEventListener('click', () => {
            if (this.isPlaying) {
                this.stopAutoplay();
            } else {
                this.startAutoplay();
            }
        });

        this.container.addEventListener('mouseenter', () => {
            if (this.isPlaying) {
                this.stopAutoplay();
            }
        });

        this.container.addEventListener('mouseleave', () => {
            if (this.settings.autoplay) {
                this.startAutoplay();
            }
        });

        this.track.addEventListener('transitionend', this.handleTransitionEnd);
    }

    initialize() {
        this.setUpDots();
        this.setupClones();
        this.bindEvents();

        if (this.settings.autoplay) {
            this.startAutoplay();
        }
    }
}

// 使用例
document.addEventListener('DOMContentLoaded', () => {
    const carouselContainer = document.querySelector('.carousel-container');
    new Carousel(carouselContainer, {
        autoplay: true,
        autoplaySpeed: 3000,
    });
});