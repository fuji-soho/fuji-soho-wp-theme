<?php get_header(); ?>

<main>
  <section class="hero">
        <div>
          <div class="eyebrow">Software & Web Development</div>
          <h2 class="headline">信頼できるエンジニアリングと丁寧なプロダクト開発</h2>
          <p class="lead">受託開発、技術顧問、リファクタリングまで。小規模〜中規模チームの支援を得意としています。</p>
          <div class="hero-ctas">
            <a class="btn primary" href="/contact">仕事の相談</a>
            <a class="btn ghost" href="/works">制作実績を見る</a>
          </div>

          <ul style="margin-top:14px;color:var(--muted);font-size:14px;">
            <li>得意: PHP / TypeScript / AWS </li>
            <li>運用: リモート中心、都内を拠点</li>
          </ul>
        </div>

        <aside>
          <div class="profile-card">
            <div class="avatar" aria-hidden>
              <img src="<?php echo get_template_directory_uri() . '/assets/img/photo.png';?>" alt="Fujiのプロフィール写真">
            </div>
            <h3 style="margin:10px 0 0">Fuji (フジ)</h3>
            <p style="margin:6px 0;color:var(--muted);font-size:14px">フリーランスエンジニア / フルスタック</p>
            <p style="margin-top:8px;color:var(--muted);font-size:14px">クリーンで保守性の高いコード、チームで動ける設計を提供します。</p>
            <div class="tags" style="margin-top:12px">
              <div class="tag">PHP</div>
              <div class="tag">TypeScript</div>
              <div class="tag">AWS</div>
            </div>
          </div>
        </aside>
      </section>

  <section id="services">
        <h3 style="margin:0;font-size:18px">提供サービス</h3>
        <div class="services" aria-hidden>
          <div class="service">
            <h4>受託開発</h4>
            <p>企画からリリース、保守まで。PM としての支援も対応可能です。</p>
          </div>
          <div class="service">
            <h4>コードレビュー / リファクタリング</h4>
            <p>既存プロダクトの改善、テスト導入、パフォーマンス改善を行います。</p>
          </div>
          <div class="service">
            <h4>技術顧問</h4>
            <p>アーキテクチャ設計、モダンなスタック選定、チーム立ち上げの支援。</p>
          </div>
        </div>
      </section>

  <!-- 制作実績セクション -->
  <section id="works">
  <div class="works">
    <h2>制作実績</h2>

    <div class="works-grid">
      <?php
      // ▼ ピックアップ案件（1〜2件）
      $pickup_query = new WP_Query(array(
        'post_type'      => 'works',
        'posts_per_page' => 2,
        'meta_key'       => 'pickup',
        'meta_value'     => 1,
        'orderby'        => 'date',
        'order'          => 'DESC',
      ));

      if ($pickup_query->have_posts()):
        while ($pickup_query->have_posts()): $pickup_query->the_post(); ?>
          <article class="work pickup">
            <a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('medium'); ?>
              <?php else: ?>
                <div style="height:140px;background:var(--card)"></div>
              <?php endif; ?>
              <h4><?php the_title(); ?></h4>
            </a>
            <div class="excerpt"><?php the_excerpt(); ?></div>
          </article>
      <?php endwhile; wp_reset_postdata(); endif; ?>


      <?php
      // ▼ 通常案件（ピックアップ以外）
      $normal_query = new WP_Query(array(
        'post_type'      => 'works',
        'posts_per_page' => 4,
        'meta_query'     => array(
          array(
            'key'     => 'pickup',
            'value'   => 1,
            'compare' => '!=', // pickupが1でないもの
          ),
        ),
        'orderby' => 'date',
        'order'   => 'DESC',
      ));

      if ($normal_query->have_posts()):
        while ($normal_query->have_posts()): $normal_query->the_post(); ?>
          <article class="work">
            <a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('medium'); ?>
              <?php else: ?>
                <div style="height:140px;background:var(--card)"></div>
              <?php endif; ?>
              <h4><?php the_title(); ?></h4>
            </a>
            <div class="excerpt"><?php the_excerpt(); ?></div>
          </article>
      <?php endwhile; wp_reset_postdata(); else: ?>
        <p>制作実績はまだありません。</p>
      <?php endif; ?>
    </div>

    <p><a href="<?php echo get_post_type_archive_link('works'); ?>">すべての制作実績を見る →</a></p>
  </div>
</section>

  <!-- ブログ記事セクション -->
  <section id="blog" style="margin-top:40px">
    <div class="works">
      <h2>ブログ記事</h2>
      <div class="works-grid">
        <?php
        $blog_query = new WP_Query(array(
          'post_type' => 'post',
          'posts_per_page' => 6
        ));
        if ($blog_query->have_posts()):
          while ($blog_query->have_posts()): $blog_query->the_post(); ?>
            <article class="work">
              <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()): ?>
                  <?php the_post_thumbnail('medium'); ?>
                <?php else: ?>
                  <div style="height:140px;background:var(--card)"></div>
                <?php endif; ?>
                <h4><?php the_title(); ?></h4>
              </a>
              <div class="excerpt"><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; wp_reset_postdata(); else: ?>
          <p>まだ記事がありません。</p>
        <?php endif; ?>
      </div>
      <p><a href="/blog">すべてのブログ記事を見る →</a></p>
    </div>
  </section>
  
  <section id="about" style="margin-top:28px">
  <div class="two-col">
    <div>
      <h3 style="margin-top:0">About</h3>
      <p style="color:var(--muted)">
        フリーランスとして、主に受託開発を中心に活動しています。<br>
        これまで建築業界、ドラッグストア、学校法人（幼稚園〜大学）、メディア、ガス会社などのインフラ系、芸術イベント、保険会社など、多様な業界のシステム開発・運用を担当してきました。
      </p>
      <p style="color:var(--muted)">
        技術面では、
      </p>
      <ul style="color:var(--muted);font-size:14px">
        <li>PHP / Laravel を用いた Web アプリケーション開発</li>
        <li>AWS 上でのサーバ構築・運用</li>
        <li>Apache Cordova を利用したスマホアプリ開発（App Store 公開実績あり）</li>
        <li><a href="https://github.com/fuji-soho/fuji-soho-wp-theme" target="_blank" style="color:var(--primary)">WordPress テーマの自作と GitHub 公開</a></li>
      </ul>
      <p style="color:var(--muted)">
        多様な業界での経験を活かし、<br>
        ・企画から設計・実装・運用まで一貫した開発支援<br>
        ・中小企業や団体に合わせた柔軟なシステム提案<br>
        ・クリーンで保守性の高いコードと安心できる設計<br>
        を提供しています。
      </p>
    </div>
    <div>
      <h3 style="margin-top:0">稼働形態</h3>
      <ul style="color:var(--muted);font-size:14px">
        <li>リモート中心（都内近郊での打ち合わせも対応可）</li>
        <li>初回相談は無料です。お気軽にご連絡ください。</li>
      </ul>
    </div>
  </div>
</section>
  
</main>

<?php get_footer(); ?>
