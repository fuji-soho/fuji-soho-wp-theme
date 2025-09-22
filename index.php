<?php get_header(); ?>

<main>
  <section class="hero">
        <div>
          <div class="eyebrow">Software & Web Development</div>
          <h2 class="headline">信頼できるエンジニアリングと丁寧なプロダクト開発</h2>
          <p class="lead">受託開発、技術顧問、リファクタリングまで。小規模〜中規模チームの支援を得意としています。</p>
          <div class="hero-ctas">
            <a class="btn primary" href="#contact">仕事の相談</a>
            <a class="btn ghost" href="#works">制作実績を見る</a>
          </div>

          <ul style="margin-top:14px;color:var(--muted);font-size:14px;">
            <li>得意: React / TypeScript / Node.js</li>
            <li>運用: リモート中心、都内を拠点</li>
          </ul>
        </div>

        <aside>
          <div class="profile-card">
            <div class="avatar" aria-hidden>
              <svg width="44" height="44" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="8" r="3" stroke="var(--primary)" stroke-width="1.5" />
                <path d="M5 20c1.5-3 4.5-4 7-4s5.5 1 7 4" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
            <h3 style="margin:10px 0 0">Fuji (フジ)</h3>
            <p style="margin:6px 0;color:var(--muted);font-size:14px">フリーランスエンジニア / フルスタック</p>
            <p style="margin-top:8px;color:var(--muted);font-size:14px">クリーンで保守性の高いコード、チームで動ける設計を提供します。</p>
            <div class="tags" style="margin-top:12px">
              <div class="tag">React</div>
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
        $works_query = new WP_Query(array(
          'post_type' => 'works',
          'posts_per_page' => 6
        ));
        if ($works_query->have_posts()):
          while ($works_query->have_posts()): $works_query->the_post(); ?>
            <article class="work">
              <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()): ?>
                  <?php the_post_thumbnail('medium'); ?>
                <?php else: ?>
                  <div style="height:140px;background:var(--card)"></div>
                <?php endif; ?>
                <h4><?php the_title(); ?></h4>
              </a>
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
      <p><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">すべてのブログ記事を見る →</a></p>
    </div>
  </section>
</main>

<?php get_footer(); ?>
