<?php get_header(); ?>
    <main id="home">
        <section class="mv loading">
            <div class="mv_wrapper">
                <h2 class="mv_title hidden">
                    welcome to<br>
                    my portfolio
                </h2>
                <p class="mv_subtitle hidden">
                    &lt;html&gt;想いをカタチに&lt;&frasl;html&gt;
                </p>
            </div>
        </section>
        <section class="sec01 title_wrapper">
            <h3 class="section_title">SKILLS  <span>出来ること</span></h3>
            <div class="section_wrapper">
                <h4 class="sec01_title">01 Web development</h4>
                <p class="sec01_text">
                    HTML・CSSを用いてデザインを忠実に再現し、JavaScriptを活用してサイトに動きを付けます。LP・企業サイトのコーディングからUI実装・WordPress対応まで、読みやすく誰が見ても理解しやすいコードを心掛けています。
                </p>
                <h4 class="sec01_title">02 Web Design</h4>
                <p class="sec01_text">
                    ユーザーが使いやすいと感じるデザインを意識しながら、クライアント様の意向を大切にしています。細部にまでこだわり、実際に役立つWebサイト制作を心掛けています。
                </p>
            </div>
        </section>
        
        <section class="works title_wrapper">
          <h3 class="section_title">WORKS　　pick up <span>実績</span></h3>
          <div class="works_wrapper">
            <!-- わたしたちのSLEのカード -->
            <article class="work_card">
              <img class="thumnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/thumnail-sle.webp" alt="わたしたちのSLEのサムネイル">
              <div class="skill_wrapper">
                <h4 class="category">WordPress</h4>
                <h5 class="website_name">わたしたちのSLE</h5>
                <p class="skills">Webデザイン / HTML / CSS / JavaScript / jQuery / Chart.js / WordPress / PHP</p>
              </div>
              <div class="botton_wrapper">
                <hr class="word_border">
                <a href="https://our-sle.info/" target="_blank" class="go_to_site">
                  <p class="botton_text">サイトを見る</p>
                  <img class="angle arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg">
                </a>
                <hr class="word_border">
                <a href="/our-sle/" class="go_to_site">
                  <p class="botton_text">サイト紹介を見る</p>
                  <img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg">
                </a>
              </div>
            </article>
            <!-- SMILE-OOH様のカード -->
            <article class="work_card">
              <img class="thumnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/thumnail-smile-ooh.webp" alt="SMILE-OOH様のサムネイル">
              <div class="skill_wrapper">
                <h4 class="category">WordPress</h4>
                <h5 class="website_name">SMILE-OOH様</h5>
                <p class="skills">HTML / CSS / JavaScript / WordPress / PHP</p>
              </div>
              <div class="botton_wrapper">
                <hr class="word_border">
                <a href="https://smile-ooh.com/" target="_blank" class="go_to_site">
                  <p class="botton_text">サイトを見る</p>
                  <img class="angle arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg">
                </a>
                <hr class="word_border">
                <a href="/detail_smile-ooh/" class="go_to_site">
                  <p class="botton_text">サイト紹介を見る</p>
                  <img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg">
                </a>
              </div>
            </article>
            <!-- デザインスクール大津様 -->
            <article class="work_card sp_display">
              <img class="thumnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/thumnail-design-school.webp" alt="デザインスクール大津様のサムネイル">
              <div class="skill_wrapper">
                <h4 class="category">LP</h4>
                <h5 class="website_name">デザインスクール大津様</h5>
                <p class="skills">HTML / CSS / JavaScript /GSAP</p>
              </div>  
              <div class="botton_wrapper">
                <hr class="word_border">
                <a href="https://onof-design.com/" target="_blank" class="go_to_site">
                  <p class="botton_text">サイトを見る</p>
                  <img class="angle arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg">
                </a>
                <hr class="word_border">
                <a href="/design-school/" class="go_to_site">
                  <p class="botton_text">サイト紹介を見る</p>
                  <img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg">
                </a>
              </div>
            </article>
            <!-- イラストレーションスクール様 -->
            <article class="work_card">
              <img class="thumnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/thumnail-illustration-school.webp" alt="イラストレーションスクール様のサムネイル">
              <div class="skill_wrapper">
                <h4 class="category">WordPress</h4>
                <h5 class="website_name">イラストレーションスクール様</h5>
                <p class="skills">Webデザイン / HTML / CSS / JavaScript / GSAP<br>チーム実務
                </p>
              </div>
              <div class="botton_wrapper">
                <hr class="word_border">
                <a href="https://illust-school.com/" target="_blank" class="go_to_site">
                  <p class="botton_text">サイトを見る</p>
                  <img class="angle arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg">
                </a>
                <hr class="word_border">
                <a href="/illastration-school/" class="go_to_site">
                  <p class="botton_text">サイト紹介を見る</p>
                  <img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg">
                </a>
              </div>
            </article>
          </div>
          <a class="go_to_detail_works button" href="/detail-works/">
              <span class="button_text">すべての作品を見る</span>
              <img class="arrow" src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg">
          </a>
        </section>
  
        <section class="about_me title_wrapper" id="about">
            <h3 class="section_title">about me  <span>わたしについて</span></h3>
            
            <div class="image_flex">

                <div class="about_image_box">
                    <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/karasawa.webp" alt="">
                </div>
                <div class="about_text_box">
                    <h5 class="about_title">
                        PROFILE
                    </h5>
                    
                    <p>
                      美容師として働く中で、「目の前の人に本当に喜んでもらうこと」に向き合ってきました。<br>
                      その想いは、エンジニアに転身した今も変わっていません。<br>
                      <br>
                      遠回りに見えるキャリアですが、経験があるからこそ、ユーザー視点で考える開発ができると考えています。<br>
                      コードの先にいる“人”を意識し、使う人に寄り添うプロダクトをつくり続けます。
                    </p>
                    
                    <h5 class="web_site_title">
                        運営サイト
                    </h5>
                    <table class="site_table">
                        <tr>
                            <th>
                                <a href="https://our-sle.info/">私たちのSLE</a>
                            </th>
                            <td>
                                <a href="https://our-sle.info/">https://our-sle.info </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                当サイト：ポートフォリオサイト
                            </th>
                            <td>
                                https://happy-smile-design.info/
                            </td>
                        </tr>
                    </table>
                    <a class="go-to-about-me" href="/about-me/">わたしについて 詳しくはこちら<img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/images/icon01.webp"></a>
                </div>
            </div>
        </section>

        <section class="title_wrapper">
          <h3 class="section_title">contact  <span>お問い合わせ</span></h3>
        </section>
        <section class="contact" id="contact">
            <p>ご依頼・ご相談や、ホームページのご感想などお気軽にお問い合わせくださいませ。</p><br>
            <a class="to_contact_button" href="<?php echo get_template_directory_uri(); ?>/contact.php">コンタクトページへ</a>
            <!-- <form action="">
                <table class="contact_table">
                    <tr>
                        <th><label for="name">※お名前</label></th>
                        <td><input type="text" id="name"></td>
                    </tr>
                    <tr>
                        <th><label for="email">※メールアドレス</label></th>
                        <td>
                            <input type="email" name="" id="email" class="serif">
                        </td>
                    </tr>
                    <tr>
                        <th><label for="tel">電話番号</label></th>
                        <td>
                            <input type="tel" name="" id="tel">
                        </td>
                    </tr>
                    <tr>
                        <th><label for="massage">※お問い合わせ内容</label></th>
                        <td>
                            <textarea name="" id="massage"></textarea>
                        </td>
                    </tr>
                </table>
                <div class="box">
                    <h3 class="privecy">
                        プライバシーポリシー
                    </h3>
                    <p>最終更新日：2025年4月3日</p>
                    <h4 class="privecy_title">1.はじめに</h4>
                    <p>私、唐澤真希子はお客様の個人情報保護の重要性を認識し、個人情報の保護に関する法律、その他の関係法令を遵守するとともに、本プライバシーポリシーに従い、適切な取り扱いおよび保護に努めます。</p>
                    <h4 class="privecy_title">2. 収集する情報</h4>
                    <p>私が収集する情報には、以下のようなものが含まれます：</p>
                    <h5 class="privecy_subtitle">2.1 お客様から直接収集する情報</h5>
                    <ul>
                        <li>氏名</li>
                        <li>メールアドレス</li>
                        <li>電話番号</li>
                        <li>その他私のサービス利用時にお客様が提供する情報</li>
                    </ul>
                    <h5 class="privecy_subtitle">2.2 自動的に収集される情報</h5>
                    <ul>
                        <li>IPアドレス</li>
                        <li>クッキー情報</li>
                        <li>位置情報</li>
                        <li>デバイス情報（ブラウザの種類、OS情報など</li>
                        <li>サービスの利用状況に関する情報</li>
                    </ul>
                    <h4 class="privecy_title">3. 情報の利用目的</h4>
                    <p>収集した情報を以下の目的で利用します：</p>
                    <ul>
                        <li>お客様へのサービス提供のため</li>
                        <li>お客様からのお問い合わせへの対応のため</li>
                        <li>サービスの品質向上、新機能開発のため</li>
                        <li>お客様に有用と思われる情報・サービスの提供のため</li>
                        <li>不正アクセス、不正利用の防止のため</li>
                        <li>当社規約や法令に違反する行為への対処のため</li>
                    </ul>
                    <h4 class="privecy_title">4. 情報の共有・第三者提供</h4>
                    <p>以下の場合を除き、お客様の個人情報を第三者に開示または提供いたしません：</p>
                    <ul>
                        <li>お客様の同意がある場合</li>
                        <li>法令に基づく場合</li>
                        <li>人の生命、身体または財産の保護のために必要がある場合</li>
                        <li>公衆衛生の向上または児童の健全な育成の推進のために特に必要がある場合</li>
                        <li>国の機関もしくは地方公共団体またはその委託を受けた者が法令の定める事務を遂行することに対して協力する必要がある場合</li>
                        <li>業務委託先に対して、業務の遂行に必要な範囲内で個人情報を提供する場合</li>
                        <li>事業譲渡その他の事由によって事業の承継が行われる場合</li>
                    </ul>
                    <h4 class="privecy_title">5. 情報の保護</h4>
                    <p>お客様の個人情報の安全管理のために、適切な安全対策を講じます。また、個人情報を取り扱う従業者や委託先に対して、個人情報の適切な取り扱いを徹底します。</p>
                    <h4 class="privecy_title">6. クッキーの使用</h4>
                    <p>ウェブサイトでは、クッキーを使用しています。クッキーとは、ウェブサイトがお客様のコンピュータやモバイルデバイスに保存する小さなテキストファイルです。お客様のウェブサイト体験を向上させるため、および分析目的のためにクッキーを使用します。ほとんどのブラウザではクッキーを無効にすることができますが、その場合、サービスの一部の機能が正常に動作しない可能性があります。</p>
                    <h4 class="privecy_title">7. お客様の権利</h4>
                    <p>お客様は、当社が保有するお客様の個人情報について、開示、訂正、追加または削除、利用停止または消去を請求することができます。これらの請求を行う場合は、お問い合わせフォームでお問い合わせください。</p>
                    <h4 class="privecy_title">8. 子どものプライバシー</h4>
                    <p>13歳未満の子どもを対象としていません。当社は、13歳未満の子どもから故意に個人情報を収集することはありません。13歳未満の子どもの個人情報を当社が保有していることが判明した場合、速やかに削除いたします。</p>
                    <h4 class="privecy_title">9. プライバシーポリシーの変更</h4>
                    <p>必要に応じて本プライバシーポリシーを変更することがあります。重要な変更がある場合は、当社のウェブサイト上で通知を行います。</p>
                </div>
                <div class="agreement_flex">
                    <input 
                        type="checkbox"
                        id="agreement"
                        onchange={handleCheckboxChange}
                        class="check"
                    >
                    <label for="agreement" class="agreement">
                        上記のプライバシーポリシーに同意します
                    </label>
                </div>
                <button
                    type="submit"
                    disabled={!isChecked}
                    class="contact_button"    
                >送信する</button>
            </form>
            <p class="send_text">
                お問い合わせのご返信は2日以内(土日祝日以外)を心がけております。ご利用環境、また迷惑メール対策等の設定により、お返事が届かない場合があります。5日経過しても返信のない場合、大変お手数をおかけしますが再度お送りいただくよう、お願い申し上げます。
            </p> -->
            
        </section>
        <section class="title_wrapper">
          <h3 class="section_title">CODE <span>このサイトのコード</span></h3>
        </section>
        <section class="github_links_section">
            <div class="github_links">
                <a href="https://github.com/makikooo/portfolio2025" target="_blank">GitHub</a>
            </div>
        </section>
    </main>
<?php get_footer(); ?>