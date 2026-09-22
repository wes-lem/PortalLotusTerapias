<?php
/**
 * Template Name: Caderno Terapêutico
 */
get_header();
$wa = lotus_option('wa_caderno', 'Olá! Tenho interesse no Caderno terapêutico.');
?>
  <main>
    <section class="page-hero">
      <div class="hero-media">
        <img src="<?php echo esc_url(lotus_img_url('hero_img', 'capa.jpg')); ?>" alt="Espaço de conversa no jardim do Portal Lótus Terapias">
      </div>
      <div class="container hero-content">
        <div class="hero-panel">
          <p class="eyebrow"><?php echo lotus_plain('hero_kicker', '30 dias guiados'); ?></p>
          <h1><?php echo lotus_plain('hero_title', 'Caderno terapêutico'); ?></h1>
          <?php lotus_paras('hero_lead', 'Um caminho de autoconhecimento, acolhimento e transformação — no seu tempo, no seu ritmo. Você recebe o material para começar agora, onde estiver.'); ?>
          <div class="btn-row">
            <a class="btn btn-gold" href="<?php echo esc_url(lotus_wa_url($wa)); ?>" target="_blank" rel="noopener"><?php echo lotus_plain('hero_btn', 'Quero o Caderno terapêutico'); ?></a>
            <a class="btn btn-light" href="#conteudo"><?php echo lotus_plain('hero_btn2', 'Ver o que contém'); ?></a>
          </div>
        </div>
      </div>
    </section>

    <?php if (lotus_bool('show_about')) : ?>
    <section class="section section-ivory">
      <div class="container grid-2">
        <div>
          <p class="eyebrow"><?php echo lotus_plain('about_kicker', 'Palavra de Ieda'); ?></p>
          <h2><?php echo lotus_plain('about_title', 'Nasceu das dores silenciosas — e da confiança no que existe em você'); ?></h2>
          <div class="gold-line"></div>
          <?php lotus_paras('about_texto', "Meu compromisso é com o ser humano: ajudá-lo a perceber sua capacidade e o potencial que existe por trás dos medos e das ansiedades.\n\nEste caderno terapêutico nasceu do meu olhar sensível para as dores silenciosas que muitas pessoas carregam, muitas vezes sem acesso ao suporte terapêutico.\n\nReuni aqui 30 exercícios profundos e acessíveis, com o propósito de guiar você em um caminho de autoconhecimento, acolhimento e transformação — no seu tempo, no seu ritmo."); ?>
          <?php lotus_list('chips', ['30 exercícios', 'Acesso digital', 'No seu ritmo'], 'meta-row'); ?>
        </div>
        <div class="cover-frame">
          <img src="<?php echo esc_url(lotus_img_url('cover_img', 'cadernoterapeutico.jpg')); ?>" alt="Capa do Caderno Terapêutico: 30 dias guiados para o autoconhecimento">
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_items')) : ?>
    <section class="section section-cream" id="conteudo">
      <div class="container">
        <div class="section-head center">
          <p class="eyebrow"><?php echo lotus_plain('items_kicker', 'O que você encontra'); ?></p>
          <h2><?php echo lotus_plain('items_title', 'Trinta exercícios para voltar a si'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="include-grid">
          <?php
          $items = [
              [1, '30 dias guiados', 'Propostas profundas e acessíveis, pensadas para quem carrega dores em silêncio e quer um caminho claro, sem pressa.'],
              [2, 'Autoconhecimento com acolhimento', 'Um convite a perceber a própria capacidade — e o potencial que existe por trás dos medos e das ansiedades.'],
              [3, 'No seu tempo', 'Não há cobrança de ritmo. Você percorre cada exercício quando fizer sentido, no aparelho que estiver à mão.'],
              [4, 'Para guardar e revisitar', 'O caderno chega até você em formato digital, pronto para baixar, imprimir se desejar ou preencher na tela.'],
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
          <p class="eyebrow"><?php echo lotus_plain('for_kicker', 'Clareza'); ?></p>
          <h2><?php echo lotus_plain('for_title', 'Este caderno é para você se…'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="for-whom">
          <div class="for-box">
            <h3><?php echo lotus_plain('for_yes_title', 'Faz sentido quando'); ?></h3>
            <?php lotus_list('for_yes', [
                'Você carrega dores em silêncio e deseja um suporte acessível, no seu ritmo.',
                'Sente medos ou ansiedade e quer perceber a própria capacidade com mais clareza.',
                'Busca autoconhecimento com acolhimento, sem cobrança de desempenho.',
                'Quer um primeiro passo de cuidado que possa começar hoje, onde estiver.',
            ]); ?>
          </div>
          <div class="for-box not">
            <h3><?php echo lotus_plain('for_no_title', 'Pode não ser o melhor agora se'); ?></h3>
            <?php lotus_list('for_no', [
                'Você precisa de escuta imediata e acompanhamento próximo — nesse caso, a Jornada ou o Protocolo Antiestresse são mais indicados.',
                'Busca um grupo e áudios diários — conheça o Clube para mulheres.',
            ]); ?>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_how')) : ?>
    <section class="section section-cream">
      <div class="container grid-2">
        <div>
          <p class="eyebrow"><?php echo lotus_plain('how_kicker', 'Como começa'); ?></p>
          <h2><?php echo lotus_plain('how_title', 'Da conversa ao primeiro exercício'); ?></h2>
          <div class="gold-line"></div>
          <?php lotus_list('how_list', [
              'Escreva no WhatsApp pedindo o Caderno terapêutico.',
              'Combinamos o investimento e o envio na conversa.',
              'Você recebe o material digital para guardar, percorrer e revisitar no seu tempo.',
          ], 'check-list', 'ol'); ?>
          <a class="btn btn-wa" href="<?php echo esc_url(lotus_wa_url($wa)); ?>" target="_blank" rel="noopener"><?php echo lotus_plain('how_botao', 'Falar no WhatsApp'); ?></a>
        </div>
        <blockquote class="quote-card">
          <p><?php echo lotus_txt('quote_texto', '“Escrever virou o único horário do dia em que eu não preciso performar. O caderno me devolveu silêncio.”'); ?></p>
          <cite><?php echo lotus_plain('quote_nome', 'Letícia M. · designer'); ?></cite>
        </blockquote>
      </div>
    </section>
    <?php endif; ?>

    <?php if (lotus_bool('show_faq')) : ?>
    <section class="section section-ivory">
      <div class="container grid-2">
        <div>
          <p class="eyebrow"><?php echo lotus_plain('faq_kicker', 'Dúvidas'); ?></p>
          <h2><?php echo lotus_plain('faq_title', 'Perguntas sobre o caderno'); ?></h2>
          <div class="gold-line"></div>
        </div>
        <div class="faq-list">
          <?php
          $faqs = [
              [1, 'Como o caderno chega até mim?', 'É um material digital. Depois da conversa, você recebe o arquivo para baixar e usar no celular, no tablet ou no computador — e pode imprimir se preferir escrever à mão.'],
              [2, 'Preciso ter experiência com terapia?', 'Não. As propostas são acessíveis e respeitam o seu ritmo. Se no caminho surgir vontade de um acompanhamento, encaminhamos com cuidado.'],
              [3, 'Posso combinar com o clube?', 'Sim. Muitas pessoas percorrem os exercícios do caderno e os áudios do clube no mesmo período. Podemos orientar essa combinação.'],
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
        <p class="eyebrow"><?php echo lotus_plain('cta_kicker', 'No seu ritmo'); ?></p>
        <h2><?php echo lotus_plain('cta_titulo', 'Quero o Caderno terapêutico'); ?></h2>
        <p><?php echo lotus_txt('cta_texto', 'Uma mensagem é o suficiente para receber o material e começar os 30 dias guiados.'); ?></p>
        <div class="btn-row">
          <a class="btn btn-gold" href="<?php echo esc_url(lotus_wa_url($wa)); ?>" target="_blank" rel="noopener"><?php echo lotus_plain('cta_botao', 'Chamar no WhatsApp'); ?></a>
        </div>
      </div>
    </section>
    <?php endif; ?>
  </main>
<?php get_footer(); ?>
