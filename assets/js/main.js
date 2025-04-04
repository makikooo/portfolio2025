'use strict'
/*******************************************
 *  ローディング時の文字を徐々に表示する
 *******************************************/
document.addEventListener('DOMContentLoaded', function () {
    const loading = document.querySelector('.loading');
    const mvTitle = document.querySelector('.mv_title');
    const mvSubtitle = document.querySelector('.mv_subtitle');

    console.log('要素を取得:', loading, mvTitle, mvSubtitle);

    // ページ読み込み完了時の処理
    window.addEventListener('load', function () {
        setTimeout(function () {
            // ローディング画面を終了
            loading.classList.add('loaded');

        }, 3000);
        // タイトルとサブタイトルを表示（hidden クラスを削除）
        setTimeout(function () {
            mvTitle.classList.remove('hidden');
            mvSubtitle.classList.remove('hidden');
        }, 700);
    });
});



/*******************************************
 *  ハンバーガーメニュー
 *******************************************/
let humbergur = document.querySelector('.humbergur_box');
let sp_nav_list = document.querySelector('.sp_nav_list');

humbergur.addEventListener('click', function () {
    humbergur.classList.toggle('active');
    sp_nav_list.classList.toggle('active');
});


/*******************************************
 *  トップページ　ワークのつづきを見る
 *******************************************/
let work_continuation = document.querySelector('.work_continuation');
let continuation_button = document.querySelector('.continuation_button');
let continuation_button_wrapper = document.querySelector('.center_wrapper')

continuation_button.addEventListener('click', function () {
    work_continuation.classList.add('active');
    continuation_button_wrapper.classList.add('hidden');
});

/*******************************************
 *  トップページ　ワークのつづきを見る2個目
 *******************************************/
let work_link_wrapper_hidden = document.querySelectorAll('.work_link_wrapper.hidden');
let continuation_button02 = document.querySelector('.continuation_button02');
let continuation_button_wrapper02 = document.querySelector('.center_wrapper02');

continuation_button02.addEventListener('click', function () {
    work_link_wrapper_hidden.forEach(function (element) {
        element.classList.remove('hidden');
    });
    continuation_button_wrapper02.classList.add('hidden');
});

/*******************************************
 *  各ページ(フッター）上に戻るのボタンを押したら時間かけて戻る
 *******************************************/
let go_to_top_button = document.querySelector('.go_to_top');

go_to_top_button.addEventListener('click', () => {
    window.scroll({
        top: 0,
        behavior: "smooth",
    });
});

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

            console.log('選択したカテゴリ:', category); // デバッグ用

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
        console.log('フィルタリング実行:', category); // デバッグ用

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
            console.log('アイテムのカテゴリ:', itemCategoryAttr); // デバッグ用

            // スペースで区切られた複数カテゴリーに対応
            const itemCategories = itemCategoryAttr.split(/\s+/);

            if (itemCategories.includes(category)) {
                // このカテゴリに該当するなら表示
                item.style.display = '';
                console.log('表示:', item); // デバッグ用
            } else {
                // 該当しないなら非表示
                item.style.display = 'none';
                console.log('非表示:', item); // デバッグ用
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
 *  トップページ カテゴリーをクリックするとボーダーボトムに色つける
 *******************************************/
// カテゴリーリンクのハイライト処理用スクリプト
document.addEventListener('DOMContentLoaded', function () {
    // すべてのカテゴリーリンクを取得
    const categoryLinks = document.querySelectorAll('.category_link');

    // カテゴリーリンクのクリックを処理する関数
    function handleCategoryClick(e) {
        // すべての項目からアクティブクラスとボーダーボトムを削除
        categoryLinks.forEach(link => {
            link.classList.remove('active');
            link.parentElement.style.borderBottom = 'none';
        });

        // クリックされたリンクにアクティブクラスを追加し、親要素にボーダーを設定
        e.target.classList.add('active');
        e.target.parentElement.style.borderBottom = '2px solid #C39000';

        // href属性からカテゴリーを取得
        const category = e.target.getAttribute('href').substring(1); // href から # を削除

        // カテゴリーに基づいて作品をフィルタリング（オプション）
        filterWorks(category);
    }

    // すべてのカテゴリーリンクにクリックイベントリスナーを追加
    categoryLinks.forEach(link => {
        link.addEventListener('click', handleCategoryClick);
    });

    // オプション: 選択されたカテゴリーに基づいて作品をフィルタリングする関数
    function filterWorks(category) {
        // すべての作品項目を取得
        const workItems = document.querySelectorAll('.work_link_wrapper');

        // カテゴリーが 'all' の場合はすべての項目を表示
        if (category === 'all') {
            workItems.forEach(item => {
                item.style.display = 'block';
            });
            return;
        }

        // それ以外の場合は data-category 属性によってフィルタリング
        workItems.forEach(item => {
            const categories = item.getAttribute('data-category').split(' ');
            if (categories.includes(category)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // 初期化: デフォルトでactiveクラスを持つ「ALL」項目にボーダーを追加
    document.querySelector('.category_link.active').parentElement.style.borderBottom = '2px solid #C39000';
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