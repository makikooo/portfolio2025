'use strict'
/*******************************************
 *  お問い合わせフォーム：reCAPTCHA v3 のトークンを取得してから送信する。
 *  CSP（インラインスクリプト禁止）に対応するため外部ファイルにしている。
 *******************************************/
document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('contactForm');
  if (!form) return;

  const siteKey = form.dataset.sitekey;
  let submitting = false;

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    // 二重送信を防ぐ
    if (submitting) return;
    submitting = true;

    grecaptcha.ready(function () {
      grecaptcha.execute(siteKey, { action: 'submit' }).then(function (token) {
        document.getElementById('recaptcha_token').value = token;
        form.submit();
      }).catch(function () {
        submitting = false;
      });
    });
  });
});
