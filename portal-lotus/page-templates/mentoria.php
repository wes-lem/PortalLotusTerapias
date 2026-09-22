<?php
/**
 * Template Name: Mentoria Individual
 */
get_header();
$wa = lotus_option('wa_mentoria', 'Olá! Quero uma proposta de mentoria para minha empresa.');
?>
  <main>
    <section class="page-hero">
      <div class="hero-media">
        <img src="<?php echo esc_url(lotus_img_url('hero_img', 'capa.jpg')); ?>" alt="Espaço de conversa no jardim do Portal Lótus Terapias">
      </div>
      <div class="container hero-content">
        <div class="hero-panel">
          <p class="eyebrow"><?php echo lotus_plain('hero_kicker', 'Para organizações'); ?></p>
          <h1><?php echo lotus_plain('hero_title', 'Mentoria de empresas'); ?></h1>
          <?php lotus_paras('hero_lead', 'Locais de trabalho pesados afetam produtividade e saúde mental. Cuidamos de pessoas, cultura e ambientes para devolver leveza ao que a empresa constrói todos os dias.'); ?>
          <div class="btn-row">
            <a class="btn btn-gold" href="<?php echo esc_url(lotus_wa_url($wa)); ?>" target="_blank" rel="noopener"><?php echo lotus_plain('hero_btn', 'Quero uma proposta para minha empresa'); ?></a>
            <a class="btn btn-light" href="#para-quem"><?php echo lotus_plain('hero_btn2', 'Para RH e lideranças'); ?></a>
          </div>
        </div>
      </div>
    </section>

    <?php if (lotus_bool('show_about')) : ?>
    <section class="section section-ivory" id="para-quem">
      <div class="container grid-2">
        <div>
          <p class="eyebrow"><?php echo lotus_plain('about_kicker', 'O problema'); ?></p>
          <h2><?php echo lotus_plain('about_title', 'Quando o ambiente cobra mais do que as pessoas conseguem oferecer'); ?></h2>
          <div class="gold-line"></div>
          <?php lotus_paras('about_texto', "Insônia, mente acelerada, burnout e reuniões que pesam no corpo não são falhas individuais. São sinais de um sistema que precisa de escuta, ritmo e espaços mais humanos.\n\nA mentoria integra saúde emocional, liderança consciente e, quando fizer sentido, harmonização de ambientes corporativos."); ?>
        </div>
        <div class="about-photo">
          <img src="<?php echo esc_url(lotus_img_url('about_img', 'mentoria.jpg')); ?>" alt="Sala de reunião com plantas e luz natural">
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_items')) : ?>
    <section class="section section-cream">
      <div class="container">
        <div class="section-head center">
          <p class="eyebrow"><?php echo lotus_plain('items_kicker', 'O que a mentoria cobre'); ?></p>
          <h2><?php echo lotus_plain('items_title', 'Cuidado que atravessa pessoas e espaço'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="include-grid">
          <?php
          $items = [
              [1, 'Diagnóstico sensível', 'Escuta com lideranças e, quando combinado, com a equipe para entender o clima, os excessos e o que o ambiente comunica.'],
              [2, 'Cultura de bem-estar', 'Práticas e conversas que tiram o cuidado do discurso e colocam pausa, limite e presença na rotina de trabalho.'],
              [3, 'Liderança emocional', 'Acompanhamento para quem conduz pessoas: decidir com clareza sem abandonar a própria saúde.'],
              [4, 'Harmonização de ambientes', 'Reorganização e limpeza energética de espaços corporativos, para reduzir a sobrecarga do lugar e devolver bem-estar.'],
          ];
          foreach ($items as $item) :
          ?>
          <article class="include-card">
            <h3><?php echo lotus_plain('item' . $item[0] . '_titulo', $item[1]); ?></h3>
            <p><?php echo lotus_txt('item' . $item[0] . '_texto', $item[2]); ?></p>
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
          <p class="eyebrow"><?php echo lotus_plain('for_kicker', 'Para quem'); ?></p>
          <h2><?php echo lotus_plain('for_title', 'Feita para quem sente responsabilidade pelas pessoas'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="for-whom">
          <div class="for-box">
            <h3><?php echo lotus_plain('for_yes_title', 'Indicada para'); ?></h3>
            <?php lotus_list('for_yes', [
                'RH e pessoas de cultura que querem ir além da palestra pontual.',
                'Lideranças que percebem esgotamento na equipe — e em si.',
                'Empresas cujo ambiente físico ou relacional está pesado.',
                'Negócios que desejam integrar desempenho e saúde emocional.',
            ]); ?>
          </div>
          <div class="for-box not">
            <h3><?php echo lotus_plain('for_no_title', 'Não substitui'); ?></h3>
            <?php lotus_list('for_no', [
                'Atendimento clínico individual de colaboradores — podemos orientar caminhos paralelos, como o Protocolo Antiestresse.',
                'Consultoria financeira ou de organograma. O foco é o campo humano e o ambiente.',
            ]); ?>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_passos')) : ?>
    <section class="section section-cream">
      <div class="container">
        <div class="section-head center">
          <p class="eyebrow"><?php echo lotus_plain('passos_kicker', 'Percurso'); ?></p>
          <h2><?php echo lotus_plain('passos_title', 'Como a parceria acontece'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="grid-3">
          <?php
          $passos = [
              [1, '01', 'Conversa de alinhamento', 'No WhatsApp ou em uma chamada, entendemos o momento da empresa e o que precisa ser cuidado primeiro.'],
              [2, '02', 'Proposta sob medida', 'Desenhamos um percurso com encontros, práticas e, se necessário, harmonização do espaço físico.'],
              [3, '03', 'Acompanhamento', 'O trabalho segue com presença: ajustes de ritmo, escuta da liderança e ambiente mais leve para produzir.'],
          ];
          foreach ($passos as $p) :
          ?>
          <article class="step-card">
            <div class="step-num"><?php echo esc_html($p[1]); ?></div>
            <h3><?php echo lotus_plain('passo' . $p[0] . '_titulo', $p[2]); ?></h3>
            <p><?php echo lotus_txt('passo' . $p[0] . '_texto', $p[3]); ?></p>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_faq')) : ?>
    <section class="section section-ivory">
      <div class="container grid-2">
        <blockquote class="quote-card">
          <p><?php echo lotus_txt('quote_texto', '“A equipe chegou mais leve depois da harmonização. O ambiente parou de pesar na reunião.”'); ?></p>
          <cite><?php echo lotus_plain('quote_nome', 'Ricardo P. · liderança comercial'); ?></cite>
        </blockquote>
        <div>
          <p class="eyebrow"><?php echo lotus_plain('faq_kicker', 'Dúvidas'); ?></p>
          <h2><?php echo lotus_plain('faq_title', 'Perguntas de empresas'); ?></h2>
          <div class="gold-line"></div>
          <div class="faq-list">
            <?php
            $faqs = [
                [1, 'Atendem apenas grandes empresas?', 'Não. Trabalhamos com times de diferentes portes. O desenho respeita o tamanho, a cultura e o orçamento da organização.'],
                [2, 'A mentoria é presencial?', 'Encontros podem ser online. A harmonização de ambientes acontece no espaço físico, quando esse recurso fizer parte da proposta.'],
                [3, 'Como recebo uma proposta?', 'Envie uma mensagem no WhatsApp com o nome da empresa e o que está incomodando hoje. Retornamos para uma conversa de alinhamento.'],
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
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_cta')) : ?>
    <section class="cta-band">
      <img src="<?php echo esc_url(lotus_img_url('cta_img', 'capa.jpg')); ?>" alt="">
      <div class="container">
        <p class="eyebrow"><?php echo lotus_plain('cta_kicker', 'Para o seu time'); ?></p>
        <h2><?php echo lotus_plain('cta_titulo', 'Quero uma proposta para minha empresa'); ?></h2>
        <p><?php echo lotus_txt('cta_texto', 'Vamos conversar sobre o clima, as pessoas e o espaço. O próximo passo é uma mensagem.'); ?></p>
        <div class="btn-row">
          <a class="btn btn-gold" href="<?php echo esc_url(lotus_wa_url($wa)); ?>" target="_blank" rel="noopener"><?php echo lotus_plain('cta_botao', 'Chamar no WhatsApp'); ?></a>
        </div>
      </div>
    </section>
    <?php endif; ?>
  </main>
<?php get_footer(); ?>
