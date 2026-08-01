<?php 
/*
 * Template Name: bleeding-tracker
 */
?>

<?php get_header(); ?>
  <main id="detail">  
    <section class="sec01">
        <h3 class="section_title">detail  <span>内容</span></h3>
        <h4 class="detail_section_title">フルスクラッチ（Next.js）</h4>
        <div class="border"></div>

        <div class="images_wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/bleeding-tracker.webp" alt="">
        </div>
        <a target="_blank" href="https://bleeding-tracker.vercel.app/" class="detail_subtitle">わたしの運営アプリ</a>
        <p class="detail_link"><a target="_blank" href="https://bleeding-tracker.vercel.app/">( https://bleeding-tracker.vercel.app/ )</a></p>
        
        
        <h6 class="detail_title">対応内容 アプリ構成</h6>
        <p class="detail_text">
            プランニング / ロゴデザイン / Webデザイン / Tailwind CSS / JavaScript(Next.js・React) / 個人ワーク
        </p>

        <h6 class="detail_title">制作概要</h6>
        
        <dl>
            <dt>【作品の名前】</dt>
            <dd>からだの記録アプリ</dd>
            
            <dt>【ターゲット】</dt>
            <dd>閉経間近の女性</dd>
            
            <dt>【作品のコンセプト】</dt>
            <dd>婦人科医に説明をしやすく、体調の変化が分かるようにしました。</dd>
            
            <dt>【作品のポイント】</dt>
            <dd>
              一目で生理の周期がわかるようにし、カレンダーを使い体調の変化も比べれるようにしました。
            </dd>>
            
            <dt>【公開年月日】</dt>
            <dd>2026年7月公開</dd>
            
            <dt>【制作期間】</dt>
            <dd>3日</dd>

        </dl>

        <h6 class="detail_title">活動内容</h6>
        <dl>
            <dt>【個人活動】</dt>
            <dd>生理管理アプリが妊活や若い人向けだったので更年期世代のアプリを作りたかったです。</dd>
        </dl>
        
        <h6 class="detail_title">スキル</h6>
        <p class="detail_text">
            Webデザイン / Tailwind CSS / JavaScript(Next.js・React)
        </p>

        <h6 class="detail_title">使用ツール</h6>
        <p class="detail_text"> VScode / Claude Code</p>
            
        <div class="button_wrapper">
          <a class="work_button go_to_site_button" href="https://bleeding-tracker.vercel.app/" target="_blank">
            <div class="button_flex">
                <span>TO site</span>
                <span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon02.webp" alt="リンクのアイコン"></span>
            </div>
            <div class="border"></div>
          </a>
          <a class="work_button go_to_works_button" href="../index.php#ai">
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