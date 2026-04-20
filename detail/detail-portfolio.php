<?php 
/*
 * Template Name: detail-portfolio
 */
?>

<?php get_header(); ?>
  <main id="detail">  
    <section class="sec01">
        <h3 class="section_title">detail  <span>内容</span></h3>
        <h4 class="detail_section_title">WordPressを新規作成</h4>
        <div class="border"></div>

        <div class="images_wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/datail-portfolio.webp" alt="">
        </div>
        <a target="_blank" href="https://happy-smile-design.info/" class="detail_subtitle">このサイト</a>
        <p class="detail_link"><a target="_blank" href="https://happy-smile-design.info/">( https://happy-smile-design.info/ )</a></p>
        
        
        <h6 class="detail_title">対応内容 サイト構成</h6>
        <p class="detail_text">
            プランニング / ロゴデザイン / レスポンシブWEBデザイン（スマホ・タブレット対応）/ HTMLコーディング / WordPress
        </p>

        <h6 class="detail_title">制作概要</h6>
        
        <dl>
            <dt>【作品の名前】</dt>
            <dd>ポートフォリオ</dd>
            
            <dt>【作品のコンセプト】</dt>
            <dd>就職活動のために実績や作品を見やすくする。</dd>
            
            <dt>【作品のポイント】</dt>
            <dd>
              トップページの実績のカードの高さを合わせるためにJavaScriptを使用
            </dd>
            
            <dt>【作品のビジュアル】</dt>
            <dd>上品かつ繊細さを意識しました</dd>
            
            <dt>【公開年月日】</dt>
            <dd>2025年公開</dd>
            
            <dt>【制作期間】</dt>
            <dd>2025年から現在に至り部分的な改修を行っています</dd>
            
            <dt>【使用したスキル】</dt>
            <dd>
              WordPressを使いました。<br>
              レスポンスデザイン対応しています。<br>
              HTMLとCSSを一から作り、vanilla JavaScriptを勉強しながらコーディングしています</dd>   
        </dl>

        <h6 class="detail_title">活動内容</h6>
        <dl>
            <dt>【個人活動】</dt>
            <dd>わたしがデザインから全て担当しています。</dd>
        </dl>
        
        <h6 class="detail_title">スキル</h6>
        <p class="detail_text">
            HTML、CSS、JavaScript、WordPress、PHP
        </p>

        <h6 class="detail_title">使用ツール</h6>
        <p class="detail_text">Photoshop / figma / VScode / GitHub / Treesource</p>
            
        <div class="button_wrapper">
          <a class="work_button go_to_site_button" href="https://happy-smile-design.info/" target="_blank">
            <div class="button_flex">
                <span>TO site</span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon02.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
          <a class="work_button go_to_works_button" href="../index.html#works">
            <div class="button_flex">
                <span>TO works</span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon01.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
        </div>
    </section>      
  </main>
<?php get_footer(); ?>