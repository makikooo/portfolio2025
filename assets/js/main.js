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