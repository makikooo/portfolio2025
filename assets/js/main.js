'use strict'
/*******************************************
 *  ローディング時の文字を徐々に表示する
 *******************************************/
document.addEventListener('DOMContentLoaded', function () {
    const loading = document.querySelector('.loading');
    const mvTitle = document.querySelector('.mv_title');
    const mvSubtitle = document.querySelector('.mv_subtitle');

    const today = new Date().toISOString().slice(0, 10); // "2025-05-26" の形式
    const lastShownDate = localStorage.getItem('loadingShownDate');
    // ページ読み込み完了時の処理
    window.addEventListener('load', function () {
        if (lastShownDate === today) {
            loading.style.display = "none";
        } else {
            setTimeout(() => {
                mvTitle.classList.remove('hidden');
                mvSubtitle.classList.remove('hidden');
            }, 20);
            setTimeout(() => {
                mvTitle.classList.add('hidden');
                mvSubtitle.classList.add('hidden');
            }, 2500);
            setTimeout(() => {
                loading.classList.add('loaded');
            }, 3000);
            setTimeout(() => {
                loading.style.display = 'none';
                // localStorage.setItem('loadingShownDate', today);
            }, 3500);
        }

    });
});



/*******************************************
 *  ハンバーガーメニュー
 *******************************************/
document.addEventListener('load', () => {

    let humbergur = document.querySelector('.humbergur_box');
    let sp_nav_list = document.querySelector('.sp_nav_list');
    let nav_links = document.querySelectorAll('.nav_link');

    if (humbergur && sp_nav_list) {
        humbergur.addEventListener('click', () => {
            humbergur.classList.toggle('active');
            sp_nav_list.classList.toggle('active');
        });
        nav_links.forEach(link => {
            link.addEventListener('click', () => {
                sp_nav_list.classList.remove('active');
                humbergur.classList.remove('active');
            });
        });
    };
});


/*******************************************
 *  トップページ　ワークのつづきを見る
 *******************************************/
document.addEventListener('load', () => {

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
document.addEventListener('load', () => {
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
document.addEventListener('load', function () {
    const categoryLinks = document.querySelectorAll('.category_link');
    const workItems = document.querySelectorAll('.work_link_wrapper');
    const workContinuationSection = document.querySelector('.work_continuation');
    const continuationWrappers = document.querySelectorAll('.center_wrapper, .center_wrapper02');
    const workBox = document.querySelector('#workBox');

    const initialHash = window.location.hash.substring(1);
    if (initialHash) {
        showContinuationSection();
        filterItems(initialHash);
        setActiveLink(initialHash);
    }

    categoryLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            const category = href.substring(1);

            window.location.hash = category;

            showContinuationSection();
            filterItems(category);
            setActiveLink(category);
        });
    });

    // 「つづきを見る」を隠して、続きを表示
    function showContinuationSection() {
        if (workContinuationSection) {
            workContinuationSection.classList.add('active');
        }
        continuationWrappers.forEach(button => {
            button.style.display = 'none';
        });
        const hiddenItems = document.querySelectorAll('.work_link_wrapper.hidden');
        hiddenItems.forEach(item => {
            item.classList.remove('hidden');
        });
        if (workBox) workBox.classList.add('active');
    }

    function filterItems(category) {
        if (category === 'all') {
            workItems.forEach(item => {
                item.style.display = '';
            });
            return;
        }
        workItems.forEach(item => {
            if (!item.hasAttribute('data-category')) {
                item.style.display = 'none';
                return;
            }
            const itemCategoryAttr = item.getAttribute('data-category');
            const itemCategories = itemCategoryAttr.split(/\s+/);
            item.style.display = itemCategories.includes(category) ? '' : 'none';
        });
    }

    function setActiveLink(category) {
        categoryLinks.forEach(link => {
            const href = link.getAttribute('href');
            const linkCategory = href.substring(1);
            link.classList.toggle('active', linkCategory === category);
        });
    }
});


/*******************************************
 *  トップページ カテゴリーをクリックすると背景色に色つける
 *******************************************/
document.addEventListener('load', function () {
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
document.addEventListener('load', () => {

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
});