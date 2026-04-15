<?php 
/*
 * Template Name: portfolio2024
 */
?>

<?php get_header(); ?>
  <main id="detail">  
    <section class="sec01">
        <h3 class="section_title">detail  <span>内容</span></h3>
        <h4 class="detail_section_title">Webサイトを新規作成</h4>
        <div class="border"></div>

        <div class="images_wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/portfolio2024.webp" alt="">
        </div>
        <a target="_blank" href="<?php echo get_template_directory_uri(); ?>/site/portfolio2024/index.html" class="detail_subtitle">わたしのポートフォリオサイト2024</a>
                
        <h6 class="detail_title">対応内容 サイト構成</h6>
        <p class="detail_text">
            プランニング / ロゴデザイン / レスポンシブWEBデザイン（スマホ・タブレット対応）/ HTMLコーディング
        </p>

        <h6 class="detail_title">制作概要</h6>
        
        <dl>
            <dt>【作品の名前】</dt>
            <dd>ポートフォリオ2024</dd>
            
            <dt>【作品のコンセプト】</dt>
            <dd>自分で作れるものを体感してみたかった</dd>
            
            <dt>【作品のポイント】</dt>
            <dd>
              セクションごとに半円の文字が流れるところに工夫しました
            </dd>
            
            <dt>【公開年月日】</dt>
            <dd>2024年公開</dd>
            
            <dt>【制作期間】</dt>
            <dd>2024年から4ヶ月</dd>
            
            <dt>【使用したスキル】</dt>
            <dd>JavaScriptで動きをつけました<br>
                レスポンスデザイン対応しています。<br>
                HTMLとCSSを一から作り、勉強しながらコーディングしています</dd>   
        </dl>

        <h6 class="detail_title">活動内容</h6>
        <dl>
            <dt>【個人活動】</dt>
            <dd>プランニングから公開までわたしがいたしました</dd>
        </dl>
        
        <h6 class="detail_title">スキル</h6>
        <p class="detail_text">
            HTML、CSS、JavaScript、GSAP、PHP
        </p>

        <h6 class="detail_title">使用ツール</h6>
        <p class="detail_text">PhotoShop / Illustrator / figma / VScode / GitHub / Treesource</p>
            
        <div class="button_wrapper">
          <a class="work_button go_to_site_button" href="<?php echo get_template_directory_uri(); ?>/site/portfolio2024/index.html" target="_blank">
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