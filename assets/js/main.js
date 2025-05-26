'use strict'
/*******************************************
 *  ローディング時の文字を徐々に表示する
 *******************************************/
document.addEventListener('DOMContentLoaded', function () {
    const loading = document.querySelector('.loading');
    const mvTitle = document.querySelector('.mv_title');
    const mvSubtitle = document.querySelector('.mv_subtitle');

    // ページ読み込み完了時の処理
    window.addEventListener('load', function () {
        setTimeout(() => {
            mvTitle.classList.remove('hidden');
            mvSubtitle.classList.remove('hidden');
        }, 20);
        setTimeout(() => {
            mvTitle.classList.add('hidden');
            mvSubtitle.classList.add('hidden');
        }, 800);
        setTimeout(() => {
            loading.classList.add('loaded');
        }, 1000);
        setTimeout(() => {
            loading.style.display = 'none';
        }, 1200);
    });
});



/*******************************************
 *  ハンバーガーメニュー
 *******************************************/
document.addEventListener('DOMContentLoaded', () => {

    let humbergur = document.querySelector('.humbergur_box');
    let sp_nav_list = document.querySelector('.sp_nav_list');

    if (humbergur && sp_nav_list) {
        humbergur.addEventListener('click', () => {
            humbergur.classList.toggle('active');
            sp_nav_list.classList.toggle('active');
        });
    };
});


/*******************************************
 *  トップページ　ワークのつづきを見る
 *******************************************/
document.addEventListener('DOMContentLoaded', () => {

    let work_continuation = document.querySelector('.work_continuation');
    let continuation_button = document.querySelector('.continuation_button');
    let continuation_button_wrapper = document.querySelector('.center_wrapper');

    if (continuation_button) {
        continuation_button.addEventListener('click', function () {
            work_continuation.classList.add('active');
            continuation_button_wrapper.style.display = "none";
        });
    }
});

/*******************************************
 *  トップページ　ワークのつづきを見る2個目
 *******************************************/
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.querySelector('#btnContinuation02');

    if (btn) {

        btn.addEventListener('click', () => {
            const worksBox = document.querySelector('#workBox');
            worksBox.classList.add("active");
            const centerWrapper02 = document.querySelector('.center_wrapper02');
            centerWrapper02.style.display = 'none';
        });
    }

});

/*******************************************
 *  各ページ(フッター）上に戻るのボタンを押したら時間かけて戻る
 *******************************************/
let go_to_top_button = document.querySelector('.go_to_top');

if (go_to_top_button) {

    go_to_top_button.addEventListener('click', () => {
        window.scroll({
            top: 0,
            behavior: "smooth",
        });
    });
}

/*******************************************
 *  トップページ カテゴリーをクリックするとそのカテゴリーだけのリスト表示にする
 *******************************************/
document.addEventListener('DOMContentLoaded', function () {
    // カテゴリリンクの要素を取得
    const categoryLinks = document.querySelectorAll('.category_link');
    // すべての項目要素を取得
    const workItems = document.querySelectorAll('.work_link_wrapper');
    // work_continuation セクション
    const workContinuationSection = document.querySelector('.work_continuation');

    // 初期表示（URLハッシュがあれば、それに対応するカテゴリを表示）
    const initialHash = window.location.hash.substring(1);
    if (initialHash) {
        showContinuationSection();
        filterItems(initialHash);
        setActiveLink(initialHash);
    }

    // カテゴリリンクにクリックイベントを設定
    categoryLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            // デフォルトのハッシュ遷移を防止
            e.preventDefault();
            // クリックされたカテゴリを取得
            const href = this.getAttribute('href');
            const category = href.substring(1); // #を除去

            // URLのハッシュを更新
            window.location.hash = category;

            // 続きのセクションを表示
            showContinuationSection();

            // 項目をフィルタリング
            filterItems(category);

            // アクティブなリンクのスタイルを更新
            setActiveLink(category);
        });
    });

    // 続きのセクションを表示する関数
    function showContinuationSection() {
        // work_continuation を表示
        if (workContinuationSection) {
            workContinuationSection.classList.add('active');
        }

        // 「続きを見る」ボタンを非表示
        const continuationButtons = document.querySelectorAll('.center_wrapper, .center_wrapper02');
        continuationButtons.forEach(button => {
            button.classList.add('hidden');
        });

        // hidden クラスを持つ要素を一旦すべて表示に戻す
        const hiddenItems = document.querySelectorAll('.work_link_wrapper.hidden');
        hiddenItems.forEach(item => {
            item.classList.remove('hidden');
        });
    }

    // 項目をフィルタリングする関数
    function filterItems(category) {

        // ALLの場合はすべて表示
        if (category === 'all') {
            workItems.forEach(item => {
                item.style.display = '';
            });
            return;
        }

        // 特定カテゴリーのフィルタリング
        workItems.forEach(item => {
            // data-category属性を確認
            if (!item.hasAttribute('data-category')) {
                // 属性がない場合は非表示
                item.style.display = 'none';
                return;
            }

            const itemCategoryAttr = item.getAttribute('data-category');

            // スペースで区切られた複数カテゴリーに対応
            const itemCategories = itemCategoryAttr.split(/\s+/);

            if (itemCategories.includes(category)) {
                // このカテゴリに該当するなら表示
                item.style.display = '';
            } else {
                // 該当しないなら非表示
                item.style.display = 'none';
            }
        });
    }

    // アクティブなリンクのスタイルを設定する関数
    function setActiveLink(category) {
        categoryLinks.forEach(link => {
            const href = link.getAttribute('href');
            const linkCategory = href.substring(1); // #を除去

            if (linkCategory === category) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }
});


/*******************************************
 *  トップページ カテゴリーをクリックすると背景色に色つける
 *******************************************/
document.addEventListener('DOMContentLoaded', function () {
    const categoryLinks = document.querySelectorAll('.category_link');
    const workItems = document.querySelectorAll('.work_link_wrapper');

    function filterWorks(category) {
        workItems.forEach(item => {
            const categories = item.getAttribute('data-category').split(/\s+/);
            const isMatch = category === 'all' || categories.includes(category);
            item.style.display = isMatch ? 'block' : 'none';
        });
    }

    categoryLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const category = link.getAttribute('href').substring(1);
            const clickedLi = link.parentElement;

            // すべてのカテゴリを非アクティブに
            categoryLinks.forEach(otherLink => {
                const li = otherLink.parentElement;
                li.classList.remove('active');
                li.style.backgroundColor = '';
                li.style.borderBottom = 'none';
            });

            // 選択されたカテゴリだけをアクティブに
            clickedLi.classList.add('active');
            clickedLi.style.backgroundColor = '#F1DC80';
            clickedLi.style.borderBottom = '2px solid #C39000';

            // 表示を更新
            filterWorks(category);
        });
    });

    // 初期状態（"ALL" を選択状態にする）
    const initial = document.querySelector('.category_link.active');
    if (initial) {
        const li = initial.parentElement;
        li.classList.add('active');
        li.style.backgroundColor = '#F1DC80';
        li.style.borderBottom = '2px solid #C39000';
        const category = initial.getAttribute('href').substring(1);
        filterWorks(category);
    }
});

/*******************************************
 *  トップページ 利用規約同意チェックすると送信ボタンを押せれる
 *******************************************/
// 利用規約同意チェックボックスと送信ボタンの要素を取得
const agreementCheckbox = document.getElementById('agreement');
const submitButton = document.querySelector('.contact_button');

// 初期状態で送信ボタンを無効化して半透明にする
if (submitButton) {
    submitButton.disabled = true;
    submitButton.style.opacity = '0.5';
    submitButton.style.cursor = 'not-allowed';
}

// チェックボックスの状態が変わった時のイベントハンドラー
if (agreementCheckbox) {
    agreementCheckbox.addEventListener('change', function () {
        if (this.checked) {
            // チェックされた場合、ボタンを有効化して不透明度を元に戻す
            submitButton.disabled = false;
            submitButton.style.opacity = '1';
            submitButton.style.cursor = 'pointer';
        } else {
            // チェックが外れた場合、ボタンを無効化して半透明にする
            submitButton.disabled = true;
            submitButton.style.opacity = '0.5';
            submitButton.style.cursor = 'not-allowed';
        }
    });
}