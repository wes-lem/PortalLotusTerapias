<?php
/**
 * Página inicial
 */
get_header();

$wa_consulta = lotus_option('wa_consulta', 'Olá! Gostaria de agendar uma consulta no Portal Lótus Terapias.');
$icon = lotus_nav_lotus();
?>
  <main>
    <section class="hero">
      <div class="hero-media">
        <img src="<?php echo esc_url(lotus_img_url('hero_img', 'capa.jpg')); ?>" alt="Espaço de conversa no jardim do Portal Lótus Terapias">
      </div>
      <div class="container hero-content">
        <div class="hero-panel">
          <img class="brand-mark" src="<?php echo esc_url($icon); ?>" alt="">
          <p class="eyebrow"><?php echo lotus_plain('hero_kicker', 'Portal Lótus Terapias'); ?></p>
          <p class="therapist-line"><?php echo esc_html(lotus_option('tagline', 'Ieda Lima · Psicóloga & terapeuta')); ?></p>
          <h1><?php echo lotus_plain('hero_title', 'Sucesso é integrar com equilíbrio todos os seus papéis sociais.'); ?></h1>
          <?php lotus_paras('hero_lead', 'Cuide da sua saúde emocional e harmonize a vida profissional e pessoal. Terapias integrativas para acolher corpo, mente e emoções — com escuta, cuidado e presença.'); ?>
          <div class="btn-row">
            <a class="btn btn-gold" href="<?php echo esc_url(lotus_wa_url($wa_consulta)); ?>" target="_blank" rel="noopener"><?php echo lotus_plain('hero_btn1', 'Agendar minha consulta'); ?></a>
            <a class="btn btn-light" href="#caminhos"><?php echo lotus_plain('hero_btn2', 'Conhecer os caminhos'); ?></a>
          </div>
        </div>
      </div>
    </section>

    <?php if (lotus_bool('show_pilares')) : ?>
    <section class="section section-ivory">
      <div class="container">
        <div class="section-head center">
          <p class="eyebrow"><?php echo lotus_plain('ess_kicker', 'A essência'); ?></p>
          <h2><?php echo lotus_plain('ess_title', 'Presença que devolve leveza'); ?></h2>
          <div class="gold-line"></div>
          <p class="lede"><?php echo lotus_txt('ess_lede', 'Atendimentos personalizados para promover equilíbrio e bem-estar, no seu ritmo e na sua história.'); ?></p>
        </div>
        <div class="grid-3">
          <?php for ($i = 1; $i <= 3; $i++) :
              $defaults_t = [1 => 'Corpo, mente e emoções', 2 => 'Cuidado personalizado', 3 => 'Escuta, cuidado e presença'];
              $defaults_d = [
                  1 => 'Terapias integrativas para acolher o que pulsa em você — sem pressa e sem fórmulas prontas.',
                  2 => 'Cada encontro é construído a partir do seu momento, respeitando o que você precisa agora.',
                  3 => 'Práticas conduzidas com atenção verdadeira, para ressignificar padrões e abrir novas possibilidades de viver.',
              ];
          ?>
          <article class="pillar-card">
            <div class="pillar-icon" aria-hidden="true">
              <img src="<?php echo esc_url($icon); ?>" alt="">
            </div>
            <h3><?php echo lotus_plain('pilar' . $i . '_titulo', $defaults_t[$i]); ?></h3>
            <p><?php echo lotus_txt('pilar' . $i . '_texto', $defaults_d[$i]); ?></p>
          </article>
          <?php endfor; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_produtos')) : ?>
    <section class="section section-cream" id="caminhos">
      <div class="container">
        <div class="section-head center">
          <p class="eyebrow"><?php echo lotus_plain('prod_kicker', 'Caminhos'); ?></p>
          <h2><?php echo lotus_plain('prod_title', 'Três portais para o seu cuidado'); ?></h2>
          <div class="gold-line"></div>
          <p class="lede"><?php echo lotus_txt('prod_lead', 'Escolha o formato que conversa com o seu momento: um caderno guiado, uma comunidade de mulheres ou um acompanhamento para empresas.'); ?></p>
        </div>
        <div class="grid-3">
          <article class="product-card">
            <img src="<?php echo esc_url(lotus_img_url('card1_img', 'caderno-capa.jpg')); ?>" alt="<?php echo lotus_plain('card1_titulo', 'Caderno terapêutico'); ?>">
            <div class="body">
              <p class="eyebrow"><?php echo lotus_plain('card1_kicker', 'Produto'); ?></p>
              <h3><?php echo lotus_plain('card1_titulo', 'Caderno terapêutico'); ?></h3>
              <p><?php echo lotus_txt('card1_texto', '30 exercícios guiados de autoconhecimento. Um material digital para cuidar de si no seu tempo, no seu ritmo.'); ?></p>
              <div class="btn-row">
                <a class="btn btn-gold btn-sm" href="<?php echo esc_url(lotus_page_url('caderno')); ?>"><?php echo lotus_plain('card1_botao', 'Conhecer o caderno'); ?></a>
                <a class="btn btn-light btn-sm" href="<?php echo esc_url(lotus_wa_url(lotus_option('wa_caderno', 'Olá! Tenho interesse no Caderno terapêutico.'))); ?>" target="_blank" rel="noopener">WhatsApp</a>
              </div>
            </div>
          </article>
          <article class="product-card">
            <img src="<?php echo esc_url(lotus_img_url('card2_img', 'clube.jpg')); ?>" alt="<?php echo lotus_plain('card2_titulo', 'Clube para mulheres'); ?>">
            <div class="body">
              <p class="eyebrow"><?php echo lotus_plain('card2_kicker', 'Comunidade'); ?></p>
              <h3><?php echo lotus_plain('card2_titulo', 'Clube para mulheres'); ?></h3>
              <p><?php echo lotus_txt('card2_texto', 'Grupo de apoio com áudios diários para sustentar presença, pertencimento e uma rotina de cuidado emocional.'); ?></p>
              <div class="btn-row">
                <a class="btn btn-gold btn-sm" href="<?php echo esc_url(lotus_page_url('clube')); ?>"><?php echo lotus_plain('card2_botao', 'Entrar no clube'); ?></a>
                <a class="btn btn-light btn-sm" href="<?php echo esc_url(lotus_wa_url(lotus_option('wa_clube', 'Olá! Quero entrar no Clube para mulheres.'))); ?>" target="_blank" rel="noopener">WhatsApp</a>
              </div>
            </div>
          </article>
          <article class="product-card">
            <img src="<?php echo esc_url(lotus_img_url('card3_img', 'mentoria.jpg')); ?>" alt="<?php echo lotus_plain('card3_titulo', 'Mentoria de empresas'); ?>">
            <div class="body">
              <p class="eyebrow"><?php echo lotus_plain('card3_kicker', 'Empresas'); ?></p>
              <h3><?php echo lotus_plain('card3_titulo', 'Mentoria de empresas'); ?></h3>
              <p><?php echo lotus_txt('card3_texto', 'Saúde emocional no trabalho: equilíbrio, cultura de bem-estar e espaços que devolvem leveza à equipe.'); ?></p>
              <div class="btn-row">
                <a class="btn btn-gold btn-sm" href="<?php echo esc_url(lotus_page_url('mentoria')); ?>"><?php echo lotus_plain('card3_botao', 'Ver mentoria'); ?></a>
                <a class="btn btn-light btn-sm" href="<?php echo esc_url(lotus_wa_url(lotus_option('wa_mentoria', 'Olá! Quero uma proposta de mentoria para minha empresa.'))); ?>" target="_blank" rel="noopener">WhatsApp</a>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_servicos')) : ?>
    <section class="section section-ivory" id="servicos">
      <div class="container">
        <div class="section-head center">
          <p class="eyebrow"><?php echo lotus_plain('serv_kicker', 'Acolhimento contínuo'); ?></p>
          <h2><?php echo lotus_plain('serv_title', 'Serviços que complementam a sua jornada'); ?></h2>
          <div class="gold-line"></div>
          <p class="lede"><?php echo lotus_txt('serv_lede', 'Além dos três caminhos principais, você pode agendar atendimentos pontuais ou um acompanhamento terapêutico personalizado.'); ?></p>
        </div>
        <div class="grid-3">
          <?php
          $servicos = [
              [1, 'limpeza.jpg', 'Harmonização de Ambientes e Empresas', 'Locais de trabalho e lares pesados afetam diretamente a produtividade e a saúde mental. Realizo a reorganização e limpeza energética de espaços corporativos e residenciais, eliminando a sobrecarga do ambiente para devolver a leveza e o bem-estar ao seu espaço de trabalho e ao seu lar.', 'Olá! Gostaria de saber mais sobre Harmonização de Ambientes e Empresas.'],
              [2, 'acolhimento.jpg', 'Protocolo Antiestresse de Emergência', 'Para profissionais que sofrem com insônia, ansiedade crônica, mente acelerada ou sintomas de burnout. Uma jornada online personalizada combinando escuta qualificada, técnicas de relaxamento guiado e suporte terapêutico, focada no alívio rápido do esgotamento emocional.', 'Olá! Tenho interesse no Protocolo Antiestresse de Emergência.'],
              [3, 'consulta.jpg', 'Jornada Personalizada', 'Construída a partir do seu momento e das suas necessidades. Cada encontro integra escuta, presença e diferentes recursos terapêuticos, respeitando seu ritmo e sua história. Um caminho de autoconhecimento para ampliar, ressignificar padrões e construir novas possibilidades de viver.', 'Olá! Gostaria de conhecer a Jornada Personalizada.'],
          ];
          foreach ($servicos as $s) :
          ?>
          <article class="service-card">
            <img src="<?php echo esc_url(lotus_img_url('serv' . $s[0] . '_img', $s[1])); ?>" alt="<?php echo lotus_plain('serv' . $s[0] . '_titulo', $s[2]); ?>">
            <div class="body">
              <h3><?php echo lotus_plain('serv' . $s[0] . '_titulo', $s[2]); ?></h3>
              <p><?php echo lotus_txt('serv' . $s[0] . '_texto', $s[3]); ?></p>
              <a class="btn btn-wa btn-sm" href="<?php echo esc_url(lotus_wa_url($s[4])); ?>" target="_blank" rel="noopener">Agendar no WhatsApp</a>
            </div>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_passos')) : ?>
    <section class="section section-cream">
      <div class="container">
        <div class="section-head center">
          <p class="eyebrow"><?php echo lotus_plain('passos_kicker', 'Como funciona'); ?></p>
          <h2><?php echo lotus_plain('passos_title', 'Do primeiro contato ao acompanhamento'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="grid-3">
          <?php
          $passos = [
              [1, '01', 'Conversa inicial', 'Você escreve pelo WhatsApp. Escutamos o que está acontecendo e indicamos o caminho mais coerente: produto, clube, mentoria ou consulta.'],
              [2, '02', 'Encaminhamento', 'Combinamos formato, ritmo e próximos passos — com clareza, sem pressão e no tempo que faz sentido para você ou para a sua empresa.'],
              [3, '03', 'Cuidado contínuo', 'O acompanhamento acontece com presença: rituais, áudios, encontros ou harmonização, para integrar vida pessoal e profissional.'],
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

    <?php if (lotus_bool('show_depoimentos')) : ?>
    <section class="section section-ivory">
      <div class="container">
        <div class="section-head center">
          <p class="eyebrow"><?php echo lotus_plain('dep_kicker', 'Vozes'); ?></p>
          <h2><?php echo lotus_plain('dep_title', 'O que se transforma quando há escuta'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="grid-3">
          <?php
          $deps = [
              [1, '“Voltei a dormir e a reconhecer o que é urgente de verdade. O protocolo me devolveu um chão.”', 'Ana C. · profissional de saúde'],
              [2, '“O clube virou o meu ponto de apoio. Os áudios diários me sustentam nos dias mais cheios.”', 'Mariana L. · empreendedora'],
              [3, '“A equipe chegou mais leve depois da harmonização. O ambiente parou de pesar na reunião.”', 'Ricardo P. · liderança comercial'],
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

    <?php if (lotus_bool('show_ieda')) : ?>
    <section class="section section-cream">
      <div class="container grid-2">
        <div>
          <p class="eyebrow"><?php echo lotus_plain('ieda_kicker', 'Ieda Lima'); ?></p>
          <h2><?php echo lotus_plain('ieda_titulo', 'Psicóloga e terapeuta, presença no centro do cuidado'); ?></h2>
          <div class="gold-line"></div>
          <?php lotus_paras('ieda_texto', "O Portal Lótus Terapias é conduzido por Ieda Lima — psicóloga e terapeuta que acolhe corpo, mente e emoções com escuta, cuidado e presença.\n\nO trabalho nasce da convicção de que bem-estar não é um luxo paralelo à rotina: é o que permite ocupar cada papel social com mais clareza, afeto e equilíbrio."); ?>
          <a class="btn btn-ghost" href="<?php echo esc_url(lotus_page_url('sobre')); ?>"><?php echo lotus_plain('ieda_botao', 'Conhecer Ieda'); ?></a>
        </div>
        <div class="portrait-wrap">
          <figure class="portrait">
            <img src="<?php echo esc_url(lotus_img_url('ieda_img', 'Ieda.jpg')); ?>" alt="Ieda Lima, psicóloga e terapeuta">
          </figure>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_faq')) : ?>
    <section class="section section-ivory">
      <div class="container grid-2">
        <div>
          <p class="eyebrow"><?php echo lotus_plain('faq_kicker', 'Dúvidas'); ?></p>
          <h2><?php echo lotus_plain('faq_title', 'Perguntas frequentes'); ?></h2>
          <div class="gold-line"></div>
          <p class="lede"><?php echo lotus_txt('faq_lede', 'Se a sua pergunta não estiver aqui, fale conosco no WhatsApp. O primeiro passo é uma conversa.'); ?></p>
        </div>
        <div class="faq-list">
          <?php
          $faqs = [
              [1, 'Os atendimentos são online?', 'Sim. Consultas, protocolo antiestresse e jornadas personalizadas acontecem online. O caderno chega em formato digital, para você percorrer onde estiver. Harmonização de ambientes pode ser combinada conforme o espaço.'],
              [2, 'Como escolho entre caderno, clube e consulta?', 'O caderno é um percurso individual, com 30 exercícios em material digital. O clube oferece pertencimento e áudios diários. A consulta ou jornada é indicada quando você precisa de escuta próxima. No WhatsApp, ajudamos a escolher com calma.'],
              [3, 'Vocês atendem empresas?', 'Sim. A mentoria de empresas cuida de saúde emocional, cultura e ambientes de trabalho. A harmonização de espaços corporativos também pode integrar o processo.'],
              [4, 'Os valores ficam no site?', 'Os investimentos são apresentados na conversa, de acordo com o caminho escolhido. Assim cada proposta respeita o formato, a frequência e o que você realmente precisa.'],
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
        <p class="eyebrow"><?php echo lotus_plain('cta_kicker', 'Convite'); ?></p>
        <h2><?php echo lotus_plain('cta_titulo', 'Agende sua consulta online'); ?></h2>
        <p><?php echo lotus_txt('cta_texto', 'Cuide da sua saúde emocional e harmonize vida profissional e pessoal. Estamos a uma mensagem de distância.'); ?></p>
        <div class="btn-row">
          <a class="btn btn-gold" href="<?php echo esc_url(lotus_wa_url($wa_consulta)); ?>" target="_blank" rel="noopener"><?php echo lotus_plain('cta_btn1', 'Agendar minha consulta'); ?></a>
          <a class="btn btn-light" href="<?php echo esc_url(lotus_mail_url()); ?>" target="_blank" rel="noopener"><?php echo esc_html(lotus_option('email', 'portallotusterapias@gmail.com')); ?></a>
        </div>
      </div>
    </section>
    <?php endif; ?>
  </main>
<?php get_footer(); ?>
