<?php 
/*
 * Template Name: our-sle
 */
?>

<?php get_header(); ?>
  <main id="detail">  
    <section class="sec01">
        <h3 class="section_title">detail  <span>内容</span></h3>
        <h4 class="detail_section_title">WordPressを新規作成</h4>
        <div class="border"></div>

        <div class="images_wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/our-sle.webp" alt="">
        </div>
        <h5 class="detail_subtitle">わたしの運営サイト</h5>
        <p class="detail_link"><a target="_blank" href="https://our-sle.info/">( https://our-sle.info/ )</a></p>
        
        
        <h6 class="detail_title">対応内容サイト構成</h6>
        <p class="detail_text">
            プランニング / ロゴデザイン / レスポンシブWEBデザイン（スマホ・タブレット対応）/ HTMLコーディング / WordPress / チームワーク
        </p>

        <h6 class="detail_title">制作 概要</h6>
        
        <table class="content_table">
            <tr>
                <th>作品の名前</th>
                <td>わたしたちのSLE</td>
            </tr>
            <tr>
                <th>ターゲット</th>
                <td>全身性エリテマトーデスの患者さんとそのご家族と身近な方</td>
            </tr>
            <tr>
                <th>作品のコンセプト</th>
                <td>全身性エリテマトーデス（SLE）は希少な病気であり共感を得るのが難しく孤独感を感じます。Webサイトも患者が作ったものがなく患者同士が共感し合えて相談も出来るサイトを作りたいと思いました。</td>
            </tr>
            <tr>
                <th>作品のポイント</th>
                <td>コンバージョンは仲間と話せるオープンチャットへの誘導です<br>
                    私が管理するオープンチャットは430名集まりました
                </td>
            </tr>
            <tr>
                <th>作品のビジュアル</th>
                <td>サイトのTopページビジュアルはデザイナーの娘に線画をかいてもらいました</td>
            </tr>
            <tr>
                <th>公開年月日</th>
                <td>2021年公開</td>
            </tr>
            <tr>
                <th>制作期間</th>
                <td>2021年から現在に至り全面的な改修を2度行っています</td>
            </tr>
            <tr>
                <th>使用したスキル</th>
                <td>
                  罹患したばかりの患者さんが不安になることを少しでも気持ちが安らぐように実体験や患者仲間からのアンケートを行いグラフでグラフで集計をしています。<br>
                  レスポンスデザイン対応しています。<br>
                  HTMLとCSSを一から作り、JQueryとJavaScriptを勉強しながらコーディングしています
                </td>
            </tr>
            <tr>
                <th>使用ツール</th>
                <td>Photoshopp / illustrator / XDから figma へ移行 / VScode / Git Hub / Tree Source</td>
            </tr>
            
        </table>
        
        <h6 class="detail_title">活動内容</h6>
        <p class="detail_text">
            グループ活動<br>
            わたしが担当した場所はヒーロー画像以外の全てです。
        </p>
        <h6 class="detail_title">スキル</h6>
        <p class="detail_text">
            HTML、CSS、JavaScript、JQuery、WordPress、PHP
        </p>

        <div class="button_wrapper">
            <a class="work_button go_to_site_button" href="https://our-sle.info/" target="_blank">
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