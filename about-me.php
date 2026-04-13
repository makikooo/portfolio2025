<?php 
/*
 * Template Name: about-me
 */
?>
<?php get_header(); ?>
    <main id="about-page">
      <section class="sec01">
        <div class="title_wrapper">
          <div class="image_wrapper">
            <svg class="rotating-text" viewBox="0 0 320 320" width="320" height="320">
              <defs>
                <path id="circle-path"
                d="M 160,160 m -120,0 a 120,120 0 1,1 240,0 a 120,120 0 1,1 -240,0"/>
              </defs>
              <text font-size="15" font-family="sans-serif"
              fill="#C39000" letter-spacing="7.5" font-weight="600">
                <textPath href="#circle-path" startOffset="0%">
                  THANK YOU FOR VISITING MY PORTFOLIO SITE ✦✦✦ 
                </textPath>
              </text>
            </svg>
            
            <div class="circle-photo">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aboutme.webp" alt="プロフィール写真">
            </div>
          </div>

          <div class="text_wrapper">
            <p>Front End Engineer</p>
            <h2 class="roma_name">KARASAWA MAKIKO</h2>
            <h3 class="kanji_name">唐澤 真希子</h3>
            <p class="skill">HTML / CSS / JavaScript</p>
          </div>
        </div>
        <p class="about_sub_titile">現在は障害者施設の就労継続支援A型にてフロントエンドエンジニアとして活動しながらフルスタックエンジニアへの成長を目指しています。</p>
        <hr class="section_border">
        <p class="aim">
          人の心に届くWeb制作を目指しています。<br>
          美容師から転身し、デザインと技術の両面から<br class="sp_only">Webに向き合っています。
        </p>
        <div class="skill_flex">
          <div class="skill_title">Webデザイン</div>
          <div class="skill_title">HTML / CSS</div>
          <div class="skill_title">JavaScript</div>
          <div class="skill_title">WordPress</div>
        </div>
      </section>        
      <section class="sec02">
          <h3 class="section_title">ABOUT ME  <span>わたしについて</span></h3>
          <div class="sec02_wrapper">
            <p>
              1977年生まれ。美容学校を卒業後、美容師としてキャリアを積んできました。しかし、病気をきっかけに美容師を離れることになり、障害があることから就労継続支援A型事業所でのリスタートを選びました。<br>
              そこで出会ったのが、WEBコーディングでした。HTMLを書いたら画面が変わる——その感覚がパズルを解くようで楽しくて、気づいたらもっと深く学びたいという気持ちが止まらなくなっていました。
            </p>
            <div class="point">
              私が制作したWebサイトに対して「安心感があった」「共感できた」と言ってもらえたことが大きな転機となりました。人の心に届くWeb制作ができるなんて、こんな素敵な仕事はないと感じ、フロントエンドエンジニアを本格的に歩んでいます。
            </div>
            <p>
              現在は就労支援A型にて約3年半、リモートにてWeb制作に従事しています。<br>
              前職では制作チームのサブリーダーを一年務め、チームの雰囲気づくり・メンバーのコンディション管理やメンタリングにも関わってきました。
            </p>
            <div class="goal">
              <h3>GOAL - フルスタックエンジニアへ</h3>
              <p>
                フロントエンドの技術を土台に、バックエンドやサーバーサイドの知識も深く身につけ、フルスタックエンジニアとしてWebの表から裏まで一貫して手がけられるエンジニアを目指しています。<br>
                UIの実装だけにとどまらず、データベース設計やAPIの構築、サーバー環境の理解まで視野を広げることで、プロジェクト全体を俯瞰しながら最適な提案や実装ができるエンジニアになりたいと考えています。<br>
                ユーザー体験とシステム設計の両方を深く理解することで、見た目の美しさと機能性を兼ね備えたWebサービスの実現に貢献していきます。フロントエンドで培った「人に伝わるものづくり」の感覚を、より広い技術領域で活かしていくことが、これからの目標です。
              </p>
            </div>
          </div>
      </section>
      <section class="sec03">
        <h3 class="section_title">SKILL  <span>スキル</span></h3>
        <div class="sec03_flex">
          <article class="card">
            <p class="card__number">01</p>
            <h4 class="card__title">Web Development</h4>
            <p class="card__text">HTML・CSSを用いてデザインを忠実に再現し、JavaScriptでインタラクションを実装します。デザイナーが心を込めて作ったデザインをきめ細かく丁寧にコーディングすることを大切にしており、可読性の高いコードとレスポンシブ対応も意識しています。</p>
          </article>
          <article class="card">
            <p class="card__number">02</p>
            <h4 class="card__title">Web Design</h4>
            <p class="card__text">視覚的な美しさと情報設計・機能性を両立したWebサイトデザインにしています。ユーザーにとって使いやすく、実際の課題解決につながるデザインを追求しています。</p>
          </article>
        </div>
        <div class="skill-section">
          <p class="slill-section__title">コーディングスキル</p>
          <div class="skill-item">
            <div class="skill-item__header">
              <span class="skill-item__name">HTML</span>
              <span class="skill-item__level">得意</span>
            </div>
            <div class="skill-item__bar-bg">
              <div class="skill-item__bar" style="--bar-width: 90%;"></div>
            </div>
          </div>

          <div class="skill-item">
            <div class="skill-item__header">
              <span class="skill-item__name">CSS</span>
              <span class="skill-item__level">得意</span>
            </div>
            <div class="skill-item__bar-bg">
              <div class="skill-item__bar" style="--bar-width: 85%;"></div>
            </div>
          </div>

          <div class="skill-item">
            <div class="skill-item__header">
              <span class="skill-item__name">JavaScript</span>
              <span class="skill-item__level">実務経験あり</span>
            </div>
            <div class="skill-item__bar-bg">
              <div class="skill-item__bar" style="--bar-width: 70%;"></div>
            </div>
          </div>
        </div>
        <div class="skill-up-section">
          <p class="skill-up-title">現在スキルアップ中</p>
          <div class="skill-up-wrapper">
            <div class="skill-up">SCSS</div>
            <div class="skill-up">React</div>
            <div class="skill-up">Node.js</div>
            <div class="skill-up">PHP</div>
            <div class="skill-up">WordPress</div>
          </div>
        </div>
      </section>
      <section class="sec04">
        <h3 class="section_title">TOOL  <span>ツール</span></h3>
        <div class="sec04_grid">
          <article class="tool__card">
            <p class="tool__card-title">開発環境</p>
            <p class="tool__card-tools">
              Mac / Windows / Visual Studio Code
            </p>
          </article>
          <article class="tool__card">
            <p class="tool__card-title">デザイン</p>
            <p class="tool__card-tools">
              Figma / XD
            </p>
          </article>
          <article class="tool__card">
            <p class="tool__card-title">バージョン管理</p>
            <p class="tool__card-tools">
              GitHub(個人) / Sourcetree 
            </p>
          </article>
          <article class="tool__card">
            <p class="tool__card-title">CMS・環境</p>
            <p class="tool__card-tools">
              WordPress / Local / Docker
            </p>
          </article>
          <article class="tool__card">
            <p class="tool__card-title">ドキュメント</p>
            <p class="tool__card-tools">
              Excel / Word
            </p>
          </article>
          <article class="tool__card">
            <p class="tool__card-title">コミュニケーション</p>
            <p class="tool__card-tools">
              Zoom / Chatwork / Teams / Slack
            </p>
          </article>
        </div>
        <hr class="tool__border">
        <p class="text">美容師時代に培った「人に寄り添う視点」と、Web制作で得た「技術的な表現力」を組み合わせ、フロントエンドからフルスタックへ。見る人の心に届くWebサービスの実現を目指しています。</p>
        <p class="thank">最後までご覧いただきありがとうございます</p>
      </section>  
    </main>
  <?php get_footer(); ?>