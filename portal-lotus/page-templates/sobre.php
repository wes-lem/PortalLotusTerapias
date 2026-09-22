<?php
/**
 * Template Name: Sobre
 */
get_header();
$wa = lotus_option('wa_consulta', 'Olá! Gostaria de agendar uma consulta no Portal Lótus Terapias.');
?>
  <main>
    <section class="page-hero">
      <div class="hero-media">
        <img src="<?php echo esc_url(lotus_img_url('hero_img', 'capa.jpg')); ?>" alt="Espaço de conversa no jardim do Portal Lótus Terapias">
      </div>
      <div class="container hero-content">
        <div class="hero-panel">
          <p class="eyebrow"><?php echo lotus_plain('hero_kicker', 'A terapeuta'); ?></p>
          <h1><?php echo lotus_plain('hero_title', 'Ieda Lima'); ?></h1>
          <?php lotus_paras('hero_lead', 'Psicóloga & terapeuta. Um espaço para quem deseja integrar, com equilíbrio, todos os seus papéis sociais — e viver com mais presença no corpo, na mente e nas emoções.'); ?>
        </div>
      </div>
    </section>

    <?php if (lotus_bool('show_bio')) : ?>
    <section class="section section-ivory">
      <div class="container grid-2">
        <div>
          <p class="eyebrow"><?php echo lotus_plain('bio_kicker', 'Portal Lótus Terapias'); ?></p>
          <h2><?php echo lotus_plain('bio_titulo', 'Escuta, presença e cuidado conduzidos por Ieda Lima'); ?></h2>
          <div class="gold-line"></div>
          <?php lotus_paras('bio_texto', "Ieda Lima é psicóloga e terapeuta. No Portal Lótus, ela acolhe pessoas e organizações que sentem o peso de uma vida acelerada — sem atalhos, com respeito à história de cada um.\n\nO trabalho integra terapias, rituais de autoconhecimento e cuidado para quem quer habitar o trabalho, a casa e os vínculos sem se abandonar."); ?>
        </div>
        <div class="portrait-wrap">
          <figure class="portrait">
            <img src="<?php echo esc_url(lotus_img_url('ieda_img', 'Ieda.jpg')); ?>" alt="Ieda Lima, psicóloga e terapeuta do Portal Lótus">
          </figure>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_principios')) : ?>
    <section class="section section-cream">
      <div class="container">
        <div class="section-head center">
          <p class="eyebrow"><?php echo lotus_plain('prin_kicker', 'Princípios'); ?></p>
          <h2><?php echo lotus_plain('prin_title', 'Como conduzimos cada encontro'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="grid-3">
          <?php
          $prins = [
              [1, 'Escuta qualificada', 'Antes de qualquer técnica, há alguém sendo ouvido. O cuidado começa no que você traz — e no que ainda não encontrou palavras.'],
              [2, 'Ritmo respeitado', 'Nada é forçado. Cada jornada, protocolo ou ritual é construído a partir do seu momento e das suas necessidades.'],
              [3, 'Integração de papéis', 'Trabalhamos a vida como ela é: profissional, afetiva, doméstica e interior. O equilíbrio mora no conjunto, não em um único eixo.'],
          ];
          foreach ($prins as $p) :
          ?>
          <article class="pillar-card">
            <h3><?php echo lotus_plain('prin' . $p[0] . '_titulo', $p[1]); ?></h3>
            <p><?php echo lotus_txt('prin' . $p[0] . '_texto', $p[2]); ?></p>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_espaco')) : ?>
    <section class="section section-ivory">
      <div class="container grid-2 split-reverse">
        <div class="about-photo">
          <img src="<?php echo esc_url(lotus_img_url('espaco_img', 'capa.jpg')); ?>" alt="Jardim e espaço de conversa do Portal Lótus">
        </div>
        <div>
          <p class="eyebrow"><?php echo lotus_plain('espaco_kicker', 'O espaço'); ?></p>
          <h2><?php echo lotus_plain('espaco_titulo', 'Pessoas, mulheres em círculo e empresas que querem respirar de novo'); ?></h2>
          <div class="gold-line"></div>
          <?php lotus_list('espaco_lista', [
              'Profissionais com insônia, ansiedade, mente acelerada ou sinais de burnout.',
              'Mulheres que desejam pertencimento e uma rotina de cuidado compartilhado.',
              'Quem busca um caminho concreto de autoconhecimento, como o caderno terapêutico.',
              'Lideranças e RH que entendem que o ambiente também adoece — ou cura.',
          ]); ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_caminhos')) : ?>
    <section class="section section-cream">
      <div class="container">
        <div class="section-head center">
          <p class="eyebrow"><?php echo lotus_plain('cam_kicker', 'Caminhos'); ?></p>
          <h2><?php echo lotus_plain('cam_title', 'Como você pode começar'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="grid-3">
          <article class="service-card service-card--cover-top">
            <img src="<?php echo esc_url(lotus_img_url('cam1_img', 'caderno-capa.jpg')); ?>" alt="<?php echo lotus_plain('cam1_titulo', 'Caderno terapêutico'); ?>">
            <div class="body">
              <h3><?php echo lotus_plain('cam1_titulo', 'Caderno terapêutico'); ?></h3>
              <p><?php echo lotus_txt('cam1_texto', '30 exercícios para acolher dores silenciosas e reconhecer o potencial por trás dos medos — no seu ritmo.'); ?></p>
              <a class="btn btn-ghost btn-sm" href="<?php echo esc_url(lotus_page_url('caderno')); ?>"><?php echo lotus_plain('cam1_botao', 'Conhecer'); ?></a>
            </div>
          </article>
          <article class="service-card">
            <img src="<?php echo esc_url(lotus_img_url('cam2_img', 'clube.jpg')); ?>" alt="<?php echo lotus_plain('cam2_titulo', 'Clube para mulheres'); ?>">
            <div class="body">
              <h3><?php echo lotus_plain('cam2_titulo', 'Clube para mulheres'); ?></h3>
              <p><?php echo lotus_txt('cam2_texto', 'Grupo de apoio e áudios diários para sustentar presença na rotina.'); ?></p>
              <a class="btn btn-ghost btn-sm" href="<?php echo esc_url(lotus_page_url('clube')); ?>"><?php echo lotus_plain('cam2_botao', 'Conhecer'); ?></a>
            </div>
          </article>
          <article class="service-card">
            <img src="<?php echo esc_url(lotus_img_url('cam3_img', 'mentoria.jpg')); ?>" alt="<?php echo lotus_plain('cam3_titulo', 'Mentoria de empresas'); ?>">
            <div class="body">
              <h3><?php echo lotus_plain('cam3_titulo', 'Mentoria de empresas'); ?></h3>
              <p><?php echo lotus_txt('cam3_texto', 'Saúde emocional, cultura e ambientes de trabalho mais leves.'); ?></p>
              <a class="btn btn-ghost btn-sm" href="<?php echo esc_url(lotus_page_url('mentoria')); ?>"><?php echo lotus_plain('cam3_botao', 'Conhecer'); ?></a>
            </div>
          </article>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_cta')) : ?>
    <section class="cta-band">
      <img src="<?php echo esc_url(lotus_img_url('cta_img', 'capa.jpg')); ?>" alt="">
      <div class="container">
        <p class="eyebrow"><?php echo lotus_plain('cta_kicker', 'Primeiro passo'); ?></p>
        <h2><?php echo lotus_plain('cta_titulo', 'Agende sua consulta online'); ?></h2>
        <p><?php echo lotus_txt('cta_texto', 'Cuide de sua saúde emocional e harmonize sua vida profissional e pessoal. Estamos prontas para escutar.'); ?></p>
        <div class="btn-row">
          <a class="btn btn-gold" href="<?php echo esc_url(lotus_wa_url($wa)); ?>" target="_blank" rel="noopener"><?php echo lotus_plain('cta_btn1', 'Agendar no WhatsApp'); ?></a>
          <a class="btn btn-light" href="<?php echo esc_url(lotus_mail_url()); ?>" target="_blank" rel="noopener"><?php echo esc_html(lotus_option('email', 'portallotusterapias@gmail.com')); ?></a>
        </div>
      </div>
    </section>
    <?php endif; ?>
  </main>
<?php get_footer(); ?>
