<?php
/**
 * Template Name: Clube de Autocuidado
 */
get_header();
$wa = lotus_option('wa_clube', 'Olá! Quero entrar no Clube para mulheres.');
?>
  <main>
    <section class="page-hero">
      <div class="hero-media">
        <img src="<?php echo esc_url(lotus_img_url('hero_img', 'capa.jpg')); ?>" alt="Espaço de conversa no jardim do Portal Lótus Terapias">
      </div>
      <div class="container hero-content">
        <div class="hero-panel">
          <p class="eyebrow"><?php echo lotus_plain('hero_kicker', 'Comunidade'); ?></p>
          <h1><?php echo lotus_plain('hero_title', 'Clube para mulheres'); ?></h1>
          <?php lotus_paras('hero_lead', 'Um grupo de apoio para não atravessar sozinha o excesso da vida. Áudios diários, presença compartilhada e um ritmo de cuidado que cabe na sua rotina.'); ?>
          <div class="btn-row">
            <a class="btn btn-gold" href="<?php echo esc_url(lotus_wa_url($wa)); ?>" target="_blank" rel="noopener"><?php echo lotus_plain('hero_btn', 'Quero entrar no Clube'); ?></a>
            <a class="btn btn-light" href="#diaadia"><?php echo lotus_plain('hero_btn2', 'Como funciona no dia a dia'); ?></a>
          </div>
        </div>
      </div>
    </section>

    <?php if (lotus_bool('show_about')) : ?>
    <section class="section section-ivory">
      <div class="container grid-2">
        <div>
          <p class="eyebrow"><?php echo lotus_plain('about_kicker', 'Pertencimento'); ?></p>
          <h2><?php echo lotus_plain('about_title', 'Cuidar de si é mais leve quando há outras mulheres no caminho'); ?></h2>
          <div class="gold-line"></div>
          <?php lotus_paras('about_texto', "O clube existe para quem sustenta muitos papéis — mãe, profissional, filha, líder, cuidadora — e precisa de um espaço em que não seja cobrada a “dar conta de tudo”.\n\nCada dia, um áudio chega como um convite: respirar, nomear o que sente e voltar ao corpo antes de seguir."); ?>
        </div>
        <div class="about-photo">
          <img src="<?php echo esc_url(lotus_img_url('about_img', 'acolhimento.jpg')); ?>" alt="Espaço de pausa para escutar os áudios diários">
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_items')) : ?>
    <section class="section section-cream" id="diaadia">
      <div class="container">
        <div class="section-head center">
          <p class="eyebrow"><?php echo lotus_plain('items_kicker', 'O dia a dia'); ?></p>
          <h2><?php echo lotus_plain('items_title', 'O que acontece quando você entra'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="grid-3">
          <?php
          $steps = [
              [1, '01', 'Áudios diários', 'Mensagens guiadas para presença, regulação emocional e um recorte de silêncio no meio do dia.'],
              [2, '02', 'Grupo de apoio', 'Um círculo de mulheres que se escutam com respeito. Sem comparação, sem performance, com acolhimento real.'],
              [3, '03', 'Ritmo sustentável', 'Você participa no seu tempo. O clube acompanha a vida — não exige mais uma lista de tarefas.'],
          ];
          foreach ($steps as $s) :
          ?>
          <article class="step-card">
            <div class="step-num"><?php echo esc_html($s[1]); ?></div>
            <h3><?php echo lotus_plain('item' . $s[0] . '_titulo', $s[2]); ?></h3>
            <p><?php echo lotus_txt('item' . $s[0] . '_texto', $s[3]); ?></p>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_for')) : ?>
    <section class="section section-ivory">
      <div class="container">
        <div class="section-head center">
          <p class="eyebrow"><?php echo lotus_plain('for_kicker', 'Para quem é'); ?></p>
          <h2><?php echo lotus_plain('for_title', 'Um espaço seu — e compartilhado'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="for-whom">
          <div class="for-box">
            <h3><?php echo lotus_plain('for_yes_title', 'O clube acolhe você se'); ?></h3>
            <?php lotus_list('for_yes', [
                'Sente solidão mesmo rodeada de gente e de demandas.',
                'Quer uma rotina de cuidado que caiba entre o trabalho e a casa.',
                'Prefere ser lembrada de pausar, em vez de ter que se cobrar sozinha.',
                'Busca irmãs de caminho, não mais um feed para consumir.',
            ]); ?>
          </div>
          <div class="for-box not">
            <h3><?php echo lotus_plain('for_no_title', 'Talvez outro caminho se'); ?></h3>
            <?php lotus_list('for_no', [
                'Você precisa de atendimento individual urgente — converse sobre o Protocolo Antiestresse.',
                'Busca um percurso individual de escrita — o Caderno terapêutico pode ser o primeiro passo.',
            ]); ?>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_depoimentos')) : ?>
    <section class="section section-cream">
      <div class="container">
        <div class="section-head center">
          <p class="eyebrow"><?php echo lotus_plain('dep_kicker', 'Vozes do círculo'); ?></p>
          <h2><?php echo lotus_plain('dep_title', 'O que as mulheres relatam'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="grid-3">
          <?php
          $deps = [
              [1, '“Os áudios me pegam no caminho do trabalho. Cinco minutos e eu chego diferente em casa.”', 'Fernanda S. · gestora'],
              [2, '“Pela primeira vez senti que não precisava explicar demais o cansaço. Alguém já entendia.”', 'Camila R. · professora'],
              [3, '“O clube não pediu que eu fosse outra. Pediu que eu voltasse a mim.”', 'Juliana A. · empreendedora'],
          ];
          foreach ($deps as $d) :
          ?>
          <blockquote class="quote-card">
            <p><?php echo lotus_txt('dep' . $d[0] . '_texto', $d[1]); ?></p>
            <cite><?php echo lotus_plain('dep' . $d[0] . '_nome', $d[2]); ?></cite>
          </blockquote>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_faq')) : ?>
    <section class="section section-ivory">
      <div class="container grid-2">
        <div>
          <p class="eyebrow"><?php echo lotus_plain('faq_kicker', 'Dúvidas'); ?></p>
          <h2><?php echo lotus_plain('faq_title', 'Perguntas sobre o clube'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="faq-list">
          <?php
          $faqs = [
              [1, 'Os áudios são todos os dias?', 'Sim. A proposta é um encontro diário, curto e constante, para sustentar o cuidado mesmo nos períodos mais cheios.'],
              [2, 'Preciso aparecer ou falar no grupo?', 'Não. Você pode apenas receber e escutar. A participação é convite, nunca obrigação.'],
              [3, 'Como faço para entrar?', 'Chame no WhatsApp. Explicamos o funcionamento, o investimento e os próximos passos para você chegar ao círculo com tranquilidade.'],
          ];
          foreach ($faqs as $f) :
          ?>
          <article class="faq-item">
            <button type="button" aria-expanded="false"><?php echo lotus_plain('faq' . $f[0] . '_pergunta', $f[1]); ?><span>+</span></button>
            <div class="faq-panel"><?php echo lotus_txt('faq' . $f[0] . '_resposta', $f[2]); ?></div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_cta')) : ?>
    <section class="cta-band">
      <img src="<?php echo esc_url(lotus_img_url('cta_img', 'capa.jpg')); ?>" alt="">
      <div class="container">
        <p class="eyebrow"><?php echo lotus_plain('cta_kicker', 'Seu lugar no círculo'); ?></p>
        <h2><?php echo lotus_plain('cta_titulo', 'Quero entrar no Clube'); ?></h2>
        <p><?php echo lotus_txt('cta_texto', 'Escreva para nós. Vamos te receber com escuta e combinar o melhor momento para começar.'); ?></p>
        <div class="btn-row">
          <a class="btn btn-gold" href="<?php echo esc_url(lotus_wa_url($wa)); ?>" target="_blank" rel="noopener"><?php echo lotus_plain('cta_botao', 'Chamar no WhatsApp'); ?></a>
        </div>
      </div>
    </section>
    <?php endif; ?>
  </main>
<?php get_footer(); ?>
