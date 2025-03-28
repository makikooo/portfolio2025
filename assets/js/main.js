'use strict'

/*******************************************
 *  ハンバーガーメニュー
 *******************************************/
let humbergur = document.querySelector('.humbergur_box');
let sp_nav_list = document.querySelector('.sp_nav_list');

humbergur.addEventListener('click', function () {
    humbergur.classList.toggle('active');
    sp_nav_list.classList.toggle('active');
});