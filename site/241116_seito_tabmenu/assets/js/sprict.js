"use strict";

(()=> { //即時関数 グローバル汚染を防ぐ
    const $doc = document; //$つけるとDOM要素という事
    const $tab = $doc.getElementById('js-tab');
    const $nav = $tab.querySelectorAll('[data-nav]');
    const $content = $tab.querySelectorAll('[data-content]');
    const ACTIVE_CLASS = 'is-active'; // 大文字で書くと定数ということ
    const navLen = $nav.length;

    // 初期化(init)
    const init = () => {
        $content[0].style.display = 'block';
    
    };
    init();

    //クリックイベント
    const handleClick = (e) => {
        // 1
        // クリックされた時にイベント自体のオブジェクトを取得する
        // リンクがクリックされたときのデフォルトの挙動であるページ遷移を防止します
        e.preventDefault(); 
        // 2
        // クリックされたnavとそのdataを取得
        // DOM要素を取れる
        // targetとはどの要素がクリックされたかっていうDOM要素を取得するプロパティ
        const $this = e.target; // すごくよく使うやり方
        // data-navの属性を取れる
        const targetValue = $this.dataset.nav;
        // 3
        // 対象外のnav,contentの全て一旦リセットする
        let index = 0;
        while(index < navLen) {
            $content[index].style.display = 'none';
            $nav[index].classList.remove(ACTIVE_CLASS);
            index++;
        }
        // 4
        // 対象のコンテンツをアクティブ化する
        $tab.querySelectorAll('[data-content="' + targetValue + '"]')[0].style.display= 'block';
        // クリックされたところがクラスを追加
        $nav[targetValue].classList.add(ACTIVE_CLASS);
    };

    // 全nav要素に対して関数を適応・発火
    let index = 0;
    while(index < navLen) {
        $nav[index].addEventListener('click',(e) => handleClick(e));
        index++;
    }

    // タブがクリックされたらそこと繋がるコンテンツエリアを表示させる命令
})();