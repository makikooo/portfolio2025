<?php 
/*
 * Template Name: makiko-memo
 */
?>

<?php get_header(); ?>
  <main id="detail">  
    <section class="sec01">
        <h3 class="section_title">detail  <span>内容</span></h3>
        <h4 class="detail_section_title">フルスクラッチ</h4>
        <div class="border"></div>

        <div class="images_wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/makiko-memo.webp" alt="">
        </div>
        <a target="_blank" href="https://cf817051.cloudfree.jp/" class="detail_subtitle">わたしの運営アプリ</a>
        <p class="detail_link"><a target="_blank" href="https://cf817051.cloudfree.jp/">( https://cf817051.cloudfree.jp/ )</a></p>
        
        
        <h6 class="detail_title">対応内容 アプリ構成</h6>
        <p class="detail_text">
            プランニング / Webデザイン / HTML / CSS / JavaScript / highlight.js / JSZip / Firebase
        </p>

        <h6 class="detail_title">制作概要</h6>
        
        <dl>
            <dt>【作品の名前】</dt>
            <dd>マキコのメモ</dd>
            
            <dt>【ターゲット】</dt>
            <dd>メモを多用に扱っている方</dd>
            
            <dt>【作品のコンセプト】</dt>
            <dd>Notionみたいなメモを自前で作りました</dd>
            
            <dt>【作品のポイント】</dt>
            <dd>
              NotionからのZipファイルでインポートできるようにしています。
            </dd>>
            
            <dt>【公開年月日】</dt>
            <dd>2026年7月公開</dd>
            
            <dt>【制作期間】</dt>
            <dd>2日</dd>

        </dl>

        <h6 class="detail_title">活動内容</h6>
        <dl>
            <dt>【個人活動】</dt>
            <dd>個人的にメモアプリを作ってみたかったので作りました。</dd>
        </dl>
        
        <h6 class="detail_title">スキル</h6>
        <p class="detail_text">
            Webデザイン / HTML / CSS / JavaScript
        </p>

        <h6 class="detail_title">使用ツール</h6>
        <p class="detail_text"> VScode / Claude Code</p>
            
        <div class="button_wrapper">
          <a class="work_button go_to_site_button" href="https://cf817051.cloudfree.jp/" target="_blank">
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