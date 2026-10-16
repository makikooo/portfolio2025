<?php
/*
 * Template Name: detail-ai-coding
 */
?>
<?php get_header(); ?>
<main id="works-page">
  <section class="title_wrapper">
    <h3 class="section_title">Vibe Coding <span>バイブコーディング</span></h3>
  </section>
  <!-- ジャンル分け
  <section class="sec02">
    <ul class="works_list">
      <li class="works_link_item">
        <a class="works_link category_link active" href="#all">ALL</a>
      </li>
      <li class="works_link_item">
        <a class="works_link category_link" href="#website">Webサイト</a>
      </li>
      <li class="works_link_item">
        <a class="works_link category_link" href="#webdesign">Webデザイン</a>
      </li>
      <li class="works_link_item">
        <a class="works_link category_link" href="#webapp">Webアプリ</a>
      </li>
      <li class="works_link_item">
        <a class="works_link category_link" href="#wordpress">WordPress</a>
      </li>
      <li class="works_link_item">
          <a class="works_link category_link" href="#ecsite">ECサイト</a>
      </li>
      <li class="works_link_item">
          <a class="works_link category_link" href="#banner">バナー作成</a>
      </li>
    </ul>
  </section> -->
  <section class="sec03">
    <!-- ここから１サイト紹介始まり -->
    <div class="work_link_wrapper" data-category="wordpress">
      <div class="link_flex">
        <div class="work_wrapper">
          <img loading="lazy" class="work_image" src="<?php echo get_template_directory_uri(); ?>/assets/images/bleeding-tracker.webp" alt="制作内容のイメージ画像">
          <div class="work_box">
            <h5 class="work_title">
              <span>
                からだの記録アプリ
              </span>
            </h5>
            <div class="category">Webアプリ</div>
            <p class="activity">個人活動</p>
            <!-- <p class="code">
              Webデザイン / Tailwind CSS / JavaScript(Next.js・React)
            </p> -->
            <p class="production_date">制作日 2026年7月</p>
          </div>
        </div>
        <div class="button_wrapper">
          <a class="work_button detail_button" href="/detail-bleeding-tracker/">
            <div class="button_flex">
              <span>detail</span>
              <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon01.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
          <a class="work_button site_button" target="_blank" href="https://bleeding-tracker.vercel.app/">
            <div class="button_flex">
              <span>TO SITE</span>
              <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon02.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
        </div>
      </div>
    </div>
    <!-- ここまで１サイト紹介終わり -->
    <!-- ここから１サイト紹介始まり -->
    <div class="work_link_wrapper" data-category="website">
      <div class="link_flex">
        <div class="work_wrapper">
          <img loading="lazy" class="work_image" src="<?php echo get_template_directory_uri(); ?>/assets/images/makiko-memo.webp" alt="制作内容のイメージ画像">
          <div class="work_box">
            <h5 class="work_title">
              <span>
                マキコのメモ
              </span>
            </h5>
            <div class="category">WEBアプリ</div>
            <p class="activity">個人活動</p>
            <!-- <p class="code">
              Webデザイン / HTML / CSS / JavaScript
            </p> -->
            <p class="production_date">制作日 2026年8月</p>
          </div>
        </div>
        <div class="button_wrapper">
          <a class="work_button detail_button" href="<?php echo get_template_directory_uri(); ?>/detail-makiko-memo/">
            <div class="button_flex">
              <span>detail</span>
              <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon01.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
          <a class="work_button site_button" target="_blank" href="https://cf817051.cloudfree.jp/">
            <div class="button_flex">
              <span>TO SITE</span>
              <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon02.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
        </div>
      </div>
    </div>
    <!-- ここまで１サイト紹介終わり -->
    <!-- ここから１サイト紹介始まり -->
    <div class="work_link_wrapper" data-category="wordpress">
      <div class="link_flex">
        <div class="work_wrapper">
          <img loading="lazy" class="work_image" src="<?php echo get_template_directory_uri(); ?>/assets/images/miniccha.webp" alt="制作内容のイメージ画像">
          <div class="work_box">
            <h5 class="work_title">
              <span>
                みにっちゃ様
              </span>
            </h5>
            <div class="category">WordPress</div>
            <p class="activity">個人活動</p>
            <!-- <p class="code">
              Webデザイン / WordPress / HTML / PHP / CSS / JavaScript
            </p> -->
            <p class="production_date">制作日 2026年6月</p>
          </div>
        </div>
        <div class="button_wrapper">
          <a class="work_button detail_button" href="/detail-miniccha/">
            <div class="button_flex">
              <span>detail</span>
              <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon01.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
          <a class="work_button site_button" target="_blank" href="https://miniccha0709.cloudfree.jp/">
            <div class="button_flex">
              <span>TO SITe</span>
              <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon02.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
        </div>
      </div>
    </div>
    <!-- ここまで１サイト紹介終わり -->



    <!-- 続きを見るのボタン
    <div class="center_wrapper">
      <button class="continuation_button">
        <span>つづきを見る</span>
        <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon03.webp" alt="下へのボタン">
      </button>
    </div> -->
  </section>

  <section class="work_continuation last_wrapper">

    <!-- ここから１サイト紹介始まり -->
    <!-- <div class="work_link_wrapper" data-category="webdesign website">
      <div class="link_flex">
        <div class="work_wrapper">
          <img loading="lazy" class="work_image" src="<?php echo get_template_directory_uri(); ?>/assets/images/work34.webp" alt="制作内容のイメージ画像">
          <div class="work_box">
            <h5 class="work_title"><span>ポートフォリオ2023年</span></h5>
            <div class="category">Webデザイン・HP</div>
            <p class="activity">個人活動</p>
            <p class="production_date">制作日 2023年</p>
            <p class="code">
              HTML, CSS,<br class="sp_only">
              JavaScript(JQuery)
            </p>
          </div>
        </div>
        <div class="button_wrapper">
          <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon01.webp" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
          <a class="work_button site_button" target="_blank" href="<?php echo get_template_directory_uri(); ?>/site/portfolio2023/index.html">
            <div class="button_flex">
              <span>TO SITe</span>
              <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon02.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
        </div>
      </div>
    </div> -->
    <!-- ここまで１サイト紹介終わり -->
    <!-- ここから１サイト紹介始まり -->
    <!-- <div class="work_link_wrapper" data-category="webapp">
      <div class="link_flex">
        <div class="work_wrapper">
          <img loading="lazy" class="work_image" src="<?php echo get_template_directory_uri(); ?>/assets/images/work05.webp" alt="制作内容のイメージ画像">
          <div class="work_box">
            <h5 class="work_title"><span>スライダー</span></h5>
            <div class="category">Webアプリ</div>
            <p class="activity">個人活動</p>
            <p class="production_date">制作日 2025年1月</p>
            <p class="code">
              HTML, CSS,<br class="sp_only">
              バニラJavaScript
            </p>
          </div>
        </div>
        <div class="button_wrapper">
          <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon01.webp" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
          <a class="work_button site_button" target="_blank" href="<?php echo get_template_directory_uri(); ?>/site/250111_slider/index.html">
            <div class="button_flex">
              <span>TO SITe</span>
              <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon02.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
        </div>
      </div>
    </div> -->
    <!-- ここまで１サイト紹介終わり -->
    <!-- ここから１サイト紹介始まり -->
    <!-- <div class="work_link_wrapper" data-category="webapp">
      <div class="link_flex">
        <div class="work_wrapper">
          <img loading="lazy" class="work_image" src="<?php echo get_template_directory_uri(); ?>/assets/images/work06.webp" alt="制作内容のイメージ画像">
          <div class="work_box">
            <h5 class="work_title"><span>モーダルウィンドー</span></h5>
            <div class="category">Webアプリ</div>
            <p class="activity">個人活動</p>
            <p class="production_date">制作日 2024年11月</p>
            <p class="code">
              HTML, CSS,<br class="sp_only">
              バニラJavaScript
            </p>
          </div>
        </div>
        <div class="button_wrapper">
          <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon01.webp" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
          <a class="work_button site_button" target="_blank" href="<?php echo get_template_directory_uri(); ?>/site/241120_modal/index.html">
            <div class="button_flex">
              <span>TO SITe</span>
              <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon02.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
        </div>
      </div>
    </div> -->
    <!-- ここまで１サイト紹介終わり -->
    <!-- ここから１サイト紹介始まり -->
    <!-- <div class="work_link_wrapper" data-category="webapp">
      <div class="link_flex">
        <div class="work_wrapper">
          <img loading="lazy" class="work_image" src="<?php echo get_template_directory_uri(); ?>/assets/images/work07.webp" alt="制作内容のイメージ画像">
          <div class="work_box">
            <h5 class="work_title"><span>タブメニュー</span></h5>
            <div class="category">Webアプリ</div>
            <p class="activity">個人活動</p>
            <p class="production_date">制作日 2024年11月</p>
            <p class="code">
              HTML, CSS,<br class="sp_only">
              バニラJavaScript
            </p>
          </div>
        </div>
        <div class="button_wrapper">
          <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon01.webp" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
          <a class="work_button site_button" target="_blank" href="<?php echo get_template_directory_uri(); ?>/site/241116_seito_tabmenu/index.html">
            <div class="button_flex">
              <span>TO SITe</span>
              <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon02.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
        </div>
      </div>
    </div> -->
    <!-- ここまで１サイト紹介終わり -->
    <!-- ここから１サイト紹介始まり -->
    <!-- <div class="work_link_wrapper" data-category="webapp">
      <div class="link_flex">
        <div class="work_wrapper">
          <img loading="lazy" class="work_image" src="<?php echo get_template_directory_uri(); ?>/assets/images/work09.webp" alt="制作内容のイメージ画像">
          <div class="work_box">
            <h5 class="work_title"><span>タイピングアプリ</span></h5>
            <div class="category">Webアプリ</div>
            <p class="activity">個人活動</p>
            <p class="production_date">制作日 2024年9月</p>
            <p class="code">
              HTML, CSS,<br class="sp_only">
              バニラJavaScript
            </p>
          </div>
        </div>
        <div class="button_wrapper">
          <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon01.webp" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
          <a class="work_button site_button" target="_blank" href="<?php echo get_template_directory_uri(); ?>/site/240914_WebGod_typingGame/index.html">
            <div class="button_flex">
              <span>TO SITe</span>
              <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon02.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
        </div>
      </div>
    </div> -->
    <!-- ここまで１サイト紹介終わり -->

    <!-- ここから１サイト紹介始まり -->
    <!-- <div class="work_link_wrapper" data-category="webapp">
      <div class="link_flex">
        <div class="work_wrapper">
          <img loading="lazy" class="work_image" src="<?php echo get_template_directory_uri(); ?>/assets/images/work10.webp" alt="制作内容のイメージ画像">
          <div class="work_box">
            <h5 class="work_title"><span>スライダー</span></h5>
            <div class="category">Webアプリ</div>
            <p class="activity">個人活動</p>
            <p class="production_date">制作日 2024年9月</p>
            <p class="code">
              HTML, CSS,<br class="sp_only">
              バニラJavaScript
            </p>
          </div>
        </div>
        <div class="button_wrapper">
          <a class="work_button detail_button" href="http://">
                            <div class="button_flex">
                                <span>detail</span>
                                <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon01.webp" alt="リンクのアイコン"></span>
                            </div>
                            <div class="border"></div>
                        </a>
          <a class="work_button site_button" target="_blank" href="<?php echo get_template_directory_uri(); ?>/site/240913_frontendch_slider/index.html">
            <div class="button_flex">
              <span>TO SITe</span>
              <span><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon02.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
        </div>
      </div>
    </div> -->
    <!-- ここまで１サイト紹介終わり -->
  </section>
</main>
<?php get_footer(); ?>