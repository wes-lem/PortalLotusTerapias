<?php
if (!defined('ABSPATH')) {
    exit;
}

function lotus_acf_text($key, $name, $label, $default, $type = 'text', $instructions = '')
{
    $field = [
        'key'           => $key,
        'label'         => $label,
        'name'          => $name,
        'type'          => $type,
        'default_value' => $default,
        'instructions'  => $instructions,
    ];
    if ($type === 'textarea') {
        $field['rows'] = 4;
        $field['new_lines'] = '';
    }
    if ($type === 'true_false') {
        $field['ui'] = 1;
        $field['ui_on_text'] = 'Sim';
        $field['ui_off_text'] = 'Não';
        $field['default_value'] = $default ? 1 : 0;
        unset($field['rows']);
    }
    if ($type === 'image') {
        $field['return_format'] = 'array';
        $field['preview_size'] = 'medium';
        $field['library'] = 'all';
        unset($field['default_value']);
    }
    return $field;
}

function lotus_acf_tab($key, $label)
{
    return [
        'key'       => $key,
        'label'     => $label,
        'name'      => '',
        'type'      => 'tab',
        'placement' => 'top',
    ];
}

function lotus_register_acf()
{
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
        'key'    => 'group_lotus_home',
        'title'  => 'Início — conteúdos',
        'fields' => [
            lotus_acf_tab('tab_h_hero', 'Banner'),
            lotus_acf_text('h_hero_img', 'hero_img', 'Foto do banner', '', 'image'),
            lotus_acf_text('h_kicker', 'hero_kicker', 'Linha pequena', 'Portal Lótus Terapias'),
            lotus_acf_text('h_title', 'hero_title', 'Título do banner', 'Sucesso é integrar com equilíbrio todos os seus papéis sociais.'),
            lotus_acf_text('h_lead', 'hero_lead', 'Texto do banner', 'Cuide da sua saúde emocional e harmonize a vida profissional e pessoal. Terapias integrativas para acolher corpo, mente e emoções — com escuta, cuidado e presença.', 'textarea'),
            lotus_acf_text('h_btn1', 'hero_btn1', 'Texto do botão 1', 'Agendar minha consulta'),
            lotus_acf_text('h_btn2', 'hero_btn2', 'Texto do botão 2', 'Conhecer os caminhos'),

            lotus_acf_tab('tab_h_pilares', 'A essência'),
            lotus_acf_text('h_show_pilares', 'show_pilares', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('h_ess_k', 'ess_kicker', 'Linha pequena', 'A essência'),
            lotus_acf_text('h_ess_t', 'ess_title', 'Título', 'Presença que devolve leveza'),
            lotus_acf_text('h_ess_d', 'ess_lede', 'Texto', 'Atendimentos personalizados para promover equilíbrio e bem-estar, no seu ritmo e na sua história.', 'textarea'),
            lotus_acf_text('h_p1_t', 'pilar1_titulo', 'Pilar 1 — título', 'Corpo, mente e emoções'),
            lotus_acf_text('h_p1_d', 'pilar1_texto', 'Pilar 1 — texto', 'Terapias integrativas para acolher o que pulsa em você — sem pressa e sem fórmulas prontas.', 'textarea'),
            lotus_acf_text('h_p2_t', 'pilar2_titulo', 'Pilar 2 — título', 'Cuidado personalizado'),
            lotus_acf_text('h_p2_d', 'pilar2_texto', 'Pilar 2 — texto', 'Cada encontro é construído a partir do seu momento, respeitando o que você precisa agora.', 'textarea'),
            lotus_acf_text('h_p3_t', 'pilar3_titulo', 'Pilar 3 — título', 'Escuta, cuidado e presença'),
            lotus_acf_text('h_p3_d', 'pilar3_texto', 'Pilar 3 — texto', 'Práticas conduzidas com atenção verdadeira, para ressignificar padrões e abrir novas possibilidades de viver.', 'textarea'),

            lotus_acf_tab('tab_h_produtos', 'Três caminhos'),
            lotus_acf_text('h_show_produtos', 'show_produtos', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('h_prod_kicker', 'prod_kicker', 'Linha pequena', 'Caminhos'),
            lotus_acf_text('h_prod_title', 'prod_title', 'Título', 'Três portais para o seu cuidado'),
            lotus_acf_text('h_prod_lead', 'prod_lead', 'Texto', 'Escolha o formato que conversa com o seu momento: um caderno guiado, uma comunidade de mulheres ou um acompanhamento para empresas.', 'textarea'),
            lotus_acf_text('h_c1_img', 'card1_img', 'Caderno — foto', '', 'image'),
            lotus_acf_text('h_c1_k', 'card1_kicker', 'Caderno — linha pequena', 'Produto'),
            lotus_acf_text('h_c1_t', 'card1_titulo', 'Caderno — título', 'Caderno terapêutico'),
            lotus_acf_text('h_c1_d', 'card1_texto', 'Caderno — texto', '30 exercícios guiados de autoconhecimento. Um material digital para cuidar de si no seu tempo, no seu ritmo.', 'textarea'),
            lotus_acf_text('h_c1_b', 'card1_botao', 'Caderno — botão', 'Conhecer o caderno'),
            lotus_acf_text('h_c2_img', 'card2_img', 'Clube — foto', '', 'image'),
            lotus_acf_text('h_c2_k', 'card2_kicker', 'Clube — linha pequena', 'Comunidade'),
            lotus_acf_text('h_c2_t', 'card2_titulo', 'Clube — título', 'Clube para mulheres'),
            lotus_acf_text('h_c2_d', 'card2_texto', 'Clube — texto', 'Grupo de apoio com áudios diários para sustentar presença, pertencimento e uma rotina de cuidado emocional.', 'textarea'),
            lotus_acf_text('h_c2_b', 'card2_botao', 'Clube — botão', 'Entrar no clube'),
            lotus_acf_text('h_c3_img', 'card3_img', 'Mentoria — foto', '', 'image'),
            lotus_acf_text('h_c3_k', 'card3_kicker', 'Mentoria — linha pequena', 'Empresas'),
            lotus_acf_text('h_c3_t', 'card3_titulo', 'Mentoria — título', 'Mentoria de empresas'),
            lotus_acf_text('h_c3_d', 'card3_texto', 'Mentoria — texto', 'Saúde emocional no trabalho: equilíbrio, cultura de bem-estar e espaços que devolvem leveza à equipe.', 'textarea'),
            lotus_acf_text('h_c3_b', 'card3_botao', 'Mentoria — botão', 'Ver mentoria'),

            lotus_acf_tab('tab_h_serv', 'Serviços'),
            lotus_acf_text('h_show_serv', 'show_servicos', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('h_serv_k', 'serv_kicker', 'Linha pequena', 'Acolhimento contínuo'),
            lotus_acf_text('h_serv_t', 'serv_title', 'Título', 'Serviços que complementam a sua jornada'),
            lotus_acf_text('h_serv_d', 'serv_lede', 'Texto', 'Além dos três caminhos principais, você pode agendar atendimentos pontuais ou um acompanhamento terapêutico personalizado.', 'textarea'),
            lotus_acf_text('h_s1_img', 'serv1_img', 'Serviço 1 — foto', '', 'image'),
            lotus_acf_text('h_s1_t', 'serv1_titulo', 'Serviço 1 — título', 'Harmonização de Ambientes e Empresas'),
            lotus_acf_text('h_s1_d', 'serv1_texto', 'Serviço 1 — texto', 'Locais de trabalho e lares pesados afetam diretamente a produtividade e a saúde mental. Realizo a reorganização e limpeza energética de espaços corporativos e residenciais, eliminando a sobrecarga do ambiente para devolver a leveza e o bem-estar ao seu espaço de trabalho e ao seu lar.', 'textarea'),
            lotus_acf_text('h_s2_img', 'serv2_img', 'Serviço 2 — foto', '', 'image'),
            lotus_acf_text('h_s2_t', 'serv2_titulo', 'Serviço 2 — título', 'Protocolo Antiestresse de Emergência'),
            lotus_acf_text('h_s2_d', 'serv2_texto', 'Serviço 2 — texto', 'Para profissionais que sofrem com insônia, ansiedade crônica, mente acelerada ou sintomas de burnout. Uma jornada online personalizada combinando escuta qualificada, técnicas de relaxamento guiado e suporte terapêutico, focada no alívio rápido do esgotamento emocional.', 'textarea'),
            lotus_acf_text('h_s3_img', 'serv3_img', 'Serviço 3 — foto', '', 'image'),
            lotus_acf_text('h_s3_t', 'serv3_titulo', 'Serviço 3 — título', 'Jornada Personalizada'),
            lotus_acf_text('h_s3_d', 'serv3_texto', 'Serviço 3 — texto', 'Construída a partir do seu momento e das suas necessidades. Cada encontro integra escuta, presença e diferentes recursos terapêuticos, respeitando seu ritmo e sua história. Um caminho de autoconhecimento para ampliar, ressignificar padrões e construir novas possibilidades de viver.', 'textarea'),

            lotus_acf_tab('tab_h_passos', 'Como funciona'),
            lotus_acf_text('h_show_passos', 'show_passos', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('h_pass_k', 'passos_kicker', 'Linha pequena', 'Como funciona'),
            lotus_acf_text('h_pass_t', 'passos_title', 'Título', 'Do primeiro contato ao acompanhamento'),
            lotus_acf_text('h_st1_t', 'passo1_titulo', 'Passo 1 — título', 'Conversa inicial'),
            lotus_acf_text('h_st1_d', 'passo1_texto', 'Passo 1 — texto', 'Você escreve pelo WhatsApp. Escutamos o que está acontecendo e indicamos o caminho mais coerente: produto, clube, mentoria ou consulta.', 'textarea'),
            lotus_acf_text('h_st2_t', 'passo2_titulo', 'Passo 2 — título', 'Encaminhamento'),
            lotus_acf_text('h_st2_d', 'passo2_texto', 'Passo 2 — texto', 'Combinamos formato, ritmo e próximos passos — com clareza, sem pressão e no tempo que faz sentido para você ou para a sua empresa.', 'textarea'),
            lotus_acf_text('h_st3_t', 'passo3_titulo', 'Passo 3 — título', 'Cuidado contínuo'),
            lotus_acf_text('h_st3_d', 'passo3_texto', 'Passo 3 — texto', 'O acompanhamento acontece com presença: rituais, áudios, encontros ou harmonização, para integrar vida pessoal e profissional.', 'textarea'),

            lotus_acf_tab('tab_h_dep', 'Depoimentos'),
            lotus_acf_text('h_show_dep', 'show_depoimentos', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('h_dep_k', 'dep_kicker', 'Linha pequena', 'Vozes'),
            lotus_acf_text('h_dep_t', 'dep_title', 'Título', 'O que se transforma quando há escuta'),
            lotus_acf_text('h_d1_q', 'dep1_texto', 'Depoimento 1', '“Voltei a dormir e a reconhecer o que é urgente de verdade. O protocolo me devolveu um chão.”', 'textarea'),
            lotus_acf_text('h_d1_n', 'dep1_nome', 'Nome 1', 'Ana C. · profissional de saúde'),
            lotus_acf_text('h_d2_q', 'dep2_texto', 'Depoimento 2', '“O clube virou o meu ponto de apoio. Os áudios diários me sustentam nos dias mais cheios.”', 'textarea'),
            lotus_acf_text('h_d2_n', 'dep2_nome', 'Nome 2', 'Mariana L. · empreendedora'),
            lotus_acf_text('h_d3_q', 'dep3_texto', 'Depoimento 3', '“A equipe chegou mais leve depois da harmonização. O ambiente parou de pesar na reunião.”', 'textarea'),
            lotus_acf_text('h_d3_n', 'dep3_nome', 'Nome 3', 'Ricardo P. · liderança comercial'),

            lotus_acf_tab('tab_h_ieda', 'Ieda'),
            lotus_acf_text('h_show_ieda', 'show_ieda', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('h_ieda_img', 'ieda_img', 'Foto da Ieda', '', 'image'),
            lotus_acf_text('h_ieda_k', 'ieda_kicker', 'Linha pequena', 'Ieda Lima'),
            lotus_acf_text('h_ieda_t', 'ieda_titulo', 'Título', 'Psicóloga e terapeuta, presença no centro do cuidado'),
            lotus_acf_text('h_ieda_d', 'ieda_texto', 'Texto (um parágrafo por linha)', "O Portal Lótus Terapias é conduzido por Ieda Lima — psicóloga e terapeuta que acolhe corpo, mente e emoções com escuta, cuidado e presença.\n\nO trabalho nasce da convicção de que bem-estar não é um luxo paralelo à rotina: é o que permite ocupar cada papel social com mais clareza, afeto e equilíbrio.", 'textarea'),
            lotus_acf_text('h_ieda_b', 'ieda_botao', 'Texto do botão', 'Conhecer Ieda'),

            lotus_acf_tab('tab_h_faq', 'Perguntas'),
            lotus_acf_text('h_show_faq', 'show_faq', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('h_faq_k', 'faq_kicker', 'Linha pequena', 'Dúvidas'),
            lotus_acf_text('h_faq_t', 'faq_title', 'Título', 'Perguntas frequentes'),
            lotus_acf_text('h_faq_d', 'faq_lede', 'Texto', 'Se a sua pergunta não estiver aqui, fale conosco no WhatsApp. O primeiro passo é uma conversa.', 'textarea'),
            lotus_acf_text('h_f1_q', 'faq1_pergunta', 'Pergunta 1', 'Os atendimentos são online?'),
            lotus_acf_text('h_f1_a', 'faq1_resposta', 'Resposta 1', 'Sim. Consultas, protocolo antiestresse e jornadas personalizadas acontecem online. O caderno chega em formato digital, para você percorrer onde estiver. Harmonização de ambientes pode ser combinada conforme o espaço.', 'textarea'),
            lotus_acf_text('h_f2_q', 'faq2_pergunta', 'Pergunta 2', 'Como escolho entre caderno, clube e consulta?'),
            lotus_acf_text('h_f2_a', 'faq2_resposta', 'Resposta 2', 'O caderno é um percurso individual, com 30 exercícios em material digital. O clube oferece pertencimento e áudios diários. A consulta ou jornada é indicada quando você precisa de escuta próxima. No WhatsApp, ajudamos a escolher com calma.', 'textarea'),
            lotus_acf_text('h_f3_q', 'faq3_pergunta', 'Pergunta 3', 'Vocês atendem empresas?'),
            lotus_acf_text('h_f3_a', 'faq3_resposta', 'Resposta 3', 'Sim. A mentoria de empresas cuida de saúde emocional, cultura e ambientes de trabalho. A harmonização de espaços corporativos também pode integrar o processo.', 'textarea'),
            lotus_acf_text('h_f4_q', 'faq4_pergunta', 'Pergunta 4', 'Os valores ficam no site?'),
            lotus_acf_text('h_f4_a', 'faq4_resposta', 'Resposta 4', 'Os investimentos são apresentados na conversa, de acordo com o caminho escolhido. Assim cada proposta respeita o formato, a frequência e o que você realmente precisa.', 'textarea'),

            lotus_acf_tab('tab_h_cta', 'Convite final'),
            lotus_acf_text('h_show_cta', 'show_cta', 'Mostrar convite final', 1, 'true_false'),
            lotus_acf_text('h_cta_img', 'cta_img', 'Foto de fundo', '', 'image'),
            lotus_acf_text('h_cta_k', 'cta_kicker', 'Linha pequena', 'Convite'),
            lotus_acf_text('h_cta_t', 'cta_titulo', 'Título', 'Agende sua consulta online'),
            lotus_acf_text('h_cta_d', 'cta_texto', 'Texto', 'Cuide da sua saúde emocional e harmonize vida profissional e pessoal. Estamos a uma mensagem de distância.', 'textarea'),
            lotus_acf_text('h_cta_b1', 'cta_btn1', 'Botão WhatsApp', 'Agendar minha consulta'),
        ],
        'location' => [[['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']]],
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'active' => true,
    ]);

    acf_add_local_field_group([
        'key'    => 'group_lotus_caderno',
        'title'  => 'Caderno — conteúdos',
        'fields' => [
            lotus_acf_tab('tab_ca_hero', 'Banner'),
            lotus_acf_text('ca_hero_img', 'hero_img', 'Foto do banner', '', 'image'),
            lotus_acf_text('ca_kicker', 'hero_kicker', 'Linha pequena', '30 dias guiados'),
            lotus_acf_text('ca_title', 'hero_title', 'Título', 'Caderno terapêutico'),
            lotus_acf_text('ca_lead', 'hero_lead', 'Texto do banner', 'Um caminho de autoconhecimento, acolhimento e transformação — no seu tempo, no seu ritmo. Você recebe o material para começar agora, onde estiver.', 'textarea'),
            lotus_acf_text('ca_btn', 'hero_btn', 'Botão principal', 'Quero o Caderno terapêutico'),
            lotus_acf_text('ca_btn2', 'hero_btn2', 'Botão secundário', 'Ver o que contém'),

            lotus_acf_tab('tab_ca_about', 'Palavra de Ieda'),
            lotus_acf_text('ca_show_about', 'show_about', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('ca_cover', 'cover_img', 'Foto da capa (mockup)', '', 'image'),
            lotus_acf_text('ca_about_k', 'about_kicker', 'Linha pequena', 'Palavra de Ieda'),
            lotus_acf_text('ca_about_t', 'about_title', 'Título', 'Nasceu das dores silenciosas — e da confiança no que existe em você'),
            lotus_acf_text('ca_about_d', 'about_texto', 'Texto', "Meu compromisso é com o ser humano: ajudá-lo a perceber sua capacidade e o potencial que existe por trás dos medos e das ansiedades.\n\nEste caderno terapêutico nasceu do meu olhar sensível para as dores silenciosas que muitas pessoas carregam, muitas vezes sem acesso ao suporte terapêutico.\n\nReuni aqui 30 exercícios profundos e acessíveis, com o propósito de guiar você em um caminho de autoconhecimento, acolhimento e transformação — no seu tempo, no seu ritmo.", 'textarea'),
            lotus_acf_text('ca_chips', 'chips', 'Selos (um por linha)', "30 exercícios\nAcesso digital\nNo seu ritmo", 'textarea'),

            lotus_acf_tab('tab_ca_items', 'O que contém'),
            lotus_acf_text('ca_show_items', 'show_items', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('ca_items_k', 'items_kicker', 'Linha pequena', 'O que você encontra'),
            lotus_acf_text('ca_items_t', 'items_title', 'Título', 'Trinta exercícios para voltar a si'),
            lotus_acf_text('ca_i1_t', 'item1_titulo', 'Card 1 — título', '30 dias guiados'),
            lotus_acf_text('ca_i1_d', 'item1_texto', 'Card 1 — texto', 'Propostas profundas e acessíveis, pensadas para quem carrega dores em silêncio e quer um caminho claro, sem pressa.', 'textarea'),
            lotus_acf_text('ca_i2_t', 'item2_titulo', 'Card 2 — título', 'Autoconhecimento com acolhimento'),
            lotus_acf_text('ca_i2_d', 'item2_texto', 'Card 2 — texto', 'Um convite a perceber a própria capacidade — e o potencial que existe por trás dos medos e das ansiedades.', 'textarea'),
            lotus_acf_text('ca_i3_t', 'item3_titulo', 'Card 3 — título', 'No seu tempo'),
            lotus_acf_text('ca_i3_d', 'item3_texto', 'Card 3 — texto', 'Não há cobrança de ritmo. Você percorre cada exercício quando fizer sentido, no aparelho que estiver à mão.', 'textarea'),
            lotus_acf_text('ca_i4_t', 'item4_titulo', 'Card 4 — título', 'Para guardar e revisitar'),
            lotus_acf_text('ca_i4_d', 'item4_texto', 'Card 4 — texto', 'O caderno chega até você em formato digital, pronto para baixar, imprimir se desejar ou preencher na tela.', 'textarea'),

            lotus_acf_tab('tab_ca_for', 'Para quem é'),
            lotus_acf_text('ca_show_for', 'show_for', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('ca_for_k', 'for_kicker', 'Linha pequena', 'Clareza'),
            lotus_acf_text('ca_for_t', 'for_title', 'Título', 'Este caderno é para você se…'),
            lotus_acf_text('ca_for_yes_t', 'for_yes_title', 'Caixa sim — título', 'Faz sentido quando'),
            lotus_acf_text('ca_for_yes', 'for_yes', 'Lista sim (um item por linha)', "Você carrega dores em silêncio e deseja um suporte acessível, no seu ritmo.\nSente medos ou ansiedade e quer perceber a própria capacidade com mais clareza.\nBusca autoconhecimento com acolhimento, sem cobrança de desempenho.\nQuer um primeiro passo de cuidado que possa começar hoje, onde estiver.", 'textarea'),
            lotus_acf_text('ca_for_no_t', 'for_no_title', 'Caixa não — título', 'Pode não ser o melhor agora se'),
            lotus_acf_text('ca_for_no', 'for_no', 'Lista não (um item por linha)', "Você precisa de escuta imediata e acompanhamento próximo — nesse caso, a Jornada ou o Protocolo Antiestresse são mais indicados.\nBusca um grupo e áudios diários — conheça o Clube para mulheres.", 'textarea'),

            lotus_acf_tab('tab_ca_how', 'Como começa'),
            lotus_acf_text('ca_show_how', 'show_how', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('ca_how_k', 'how_kicker', 'Linha pequena', 'Como começa'),
            lotus_acf_text('ca_how_t', 'how_title', 'Título', 'Da conversa ao primeiro exercício'),
            lotus_acf_text('ca_how_list', 'how_list', 'Passos (um por linha)', "Escreva no WhatsApp pedindo o Caderno terapêutico.\nCombinamos o investimento e o envio na conversa.\nVocê recebe o material digital para guardar, percorrer e revisitar no seu tempo.", 'textarea'),
            lotus_acf_text('ca_how_btn', 'how_botao', 'Botão', 'Falar no WhatsApp'),
            lotus_acf_text('ca_quote', 'quote_texto', 'Depoimento', '“Escrever virou o único horário do dia em que eu não preciso performar. O caderno me devolveu silêncio.”', 'textarea'),
            lotus_acf_text('ca_quote_n', 'quote_nome', 'Nome do depoimento', 'Letícia M. · designer'),

            lotus_acf_tab('tab_ca_faq', 'Perguntas'),
            lotus_acf_text('ca_show_faq', 'show_faq', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('ca_faq_k', 'faq_kicker', 'Linha pequena', 'Dúvidas'),
            lotus_acf_text('ca_faq_t', 'faq_title', 'Título', 'Perguntas sobre o caderno'),
            lotus_acf_text('ca_f1_q', 'faq1_pergunta', 'Pergunta 1', 'Como o caderno chega até mim?'),
            lotus_acf_text('ca_f1_a', 'faq1_resposta', 'Resposta 1', 'É um material digital. Depois da conversa, você recebe o arquivo para baixar e usar no celular, no tablet ou no computador — e pode imprimir se preferir escrever à mão.', 'textarea'),
            lotus_acf_text('ca_f2_q', 'faq2_pergunta', 'Pergunta 2', 'Preciso ter experiência com terapia?'),
            lotus_acf_text('ca_f2_a', 'faq2_resposta', 'Resposta 2', 'Não. As propostas são acessíveis e respeitam o seu ritmo. Se no caminho surgir vontade de um acompanhamento, encaminhamos com cuidado.', 'textarea'),
            lotus_acf_text('ca_f3_q', 'faq3_pergunta', 'Pergunta 3', 'Posso combinar com o clube?'),
            lotus_acf_text('ca_f3_a', 'faq3_resposta', 'Resposta 3', 'Sim. Muitas pessoas percorrem os exercícios do caderno e os áudios do clube no mesmo período. Podemos orientar essa combinação.', 'textarea'),

            lotus_acf_tab('tab_ca_cta', 'Convite'),
            lotus_acf_text('ca_show_cta', 'show_cta', 'Mostrar convite', 1, 'true_false'),
            lotus_acf_text('ca_cta_img', 'cta_img', 'Foto de fundo', '', 'image'),
            lotus_acf_text('ca_cta_k', 'cta_kicker', 'Linha pequena', 'No seu ritmo'),
            lotus_acf_text('ca_cta_t', 'cta_titulo', 'Título', 'Quero o Caderno terapêutico'),
            lotus_acf_text('ca_cta_d', 'cta_texto', 'Texto', 'Uma mensagem é o suficiente para receber o material e começar os 30 dias guiados.', 'textarea'),
            lotus_acf_text('ca_cta_b', 'cta_botao', 'Botão', 'Chamar no WhatsApp'),
        ],
        'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/caderno.php']]],
        'position' => 'acf_after_title',
        'active' => true,
    ]);

    acf_add_local_field_group([
        'key'    => 'group_lotus_clube',
        'title'  => 'Clube — conteúdos',
        'fields' => [
            lotus_acf_tab('tab_cl_hero', 'Banner'),
            lotus_acf_text('cl_hero_img', 'hero_img', 'Foto do banner', '', 'image'),
            lotus_acf_text('cl_kicker', 'hero_kicker', 'Linha pequena', 'Comunidade'),
            lotus_acf_text('cl_title', 'hero_title', 'Título', 'Clube para mulheres'),
            lotus_acf_text('cl_lead', 'hero_lead', 'Texto do banner', 'Um grupo de apoio para não atravessar sozinha o excesso da vida. Áudios diários, presença compartilhada e um ritmo de cuidado que cabe na sua rotina.', 'textarea'),
            lotus_acf_text('cl_btn', 'hero_btn', 'Botão principal', 'Quero entrar no Clube'),
            lotus_acf_text('cl_btn2', 'hero_btn2', 'Botão secundário', 'Como funciona no dia a dia'),

            lotus_acf_tab('tab_cl_about', 'Pertencimento'),
            lotus_acf_text('cl_show_about', 'show_about', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('cl_photo', 'about_img', 'Foto', '', 'image'),
            lotus_acf_text('cl_about_k', 'about_kicker', 'Linha pequena', 'Pertencimento'),
            lotus_acf_text('cl_about_t', 'about_title', 'Título', 'Cuidar de si é mais leve quando há outras mulheres no caminho'),
            lotus_acf_text('cl_about_d', 'about_texto', 'Texto', "O clube existe para quem sustenta muitos papéis — mãe, profissional, filha, líder, cuidadora — e precisa de um espaço em que não seja cobrada a “dar conta de tudo”.\n\nCada dia, um áudio chega como um convite: respirar, nomear o que sente e voltar ao corpo antes de seguir.", 'textarea'),

            lotus_acf_tab('tab_cl_dia', 'O dia a dia'),
            lotus_acf_text('cl_show_items', 'show_items', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('cl_items_k', 'items_kicker', 'Linha pequena', 'O dia a dia'),
            lotus_acf_text('cl_items_t', 'items_title', 'Título', 'O que acontece quando você entra'),
            lotus_acf_text('cl_i1_t', 'item1_titulo', 'Passo 1 — título', 'Áudios diários'),
            lotus_acf_text('cl_i1_d', 'item1_texto', 'Passo 1 — texto', 'Mensagens guiadas para presença, regulação emocional e um recorte de silêncio no meio do dia.', 'textarea'),
            lotus_acf_text('cl_i2_t', 'item2_titulo', 'Passo 2 — título', 'Grupo de apoio'),
            lotus_acf_text('cl_i2_d', 'item2_texto', 'Passo 2 — texto', 'Um círculo de mulheres que se escutam com respeito. Sem comparação, sem performance, com acolhimento real.', 'textarea'),
            lotus_acf_text('cl_i3_t', 'item3_titulo', 'Passo 3 — título', 'Ritmo sustentável'),
            lotus_acf_text('cl_i3_d', 'item3_texto', 'Passo 3 — texto', 'Você participa no seu tempo. O clube acompanha a vida — não exige mais uma lista de tarefas.', 'textarea'),

            lotus_acf_tab('tab_cl_for', 'Para quem é'),
            lotus_acf_text('cl_show_for', 'show_for', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('cl_for_k', 'for_kicker', 'Linha pequena', 'Para quem é'),
            lotus_acf_text('cl_for_t', 'for_title', 'Título', 'Um espaço seu — e compartilhado'),
            lotus_acf_text('cl_for_yes_t', 'for_yes_title', 'Caixa sim — título', 'O clube acolhe você se'),
            lotus_acf_text('cl_for_yes', 'for_yes', 'Lista sim (um item por linha)', "Sente solidão mesmo rodeada de gente e de demandas.\nQuer uma rotina de cuidado que caiba entre o trabalho e a casa.\nPrefere ser lembrada de pausar, em vez de ter que se cobrar sozinha.\nBusca irmãs de caminho, não mais um feed para consumir.", 'textarea'),
            lotus_acf_text('cl_for_no_t', 'for_no_title', 'Caixa não — título', 'Talvez outro caminho se'),
            lotus_acf_text('cl_for_no', 'for_no', 'Lista não (um item por linha)', "Você precisa de atendimento individual urgente — converse sobre o Protocolo Antiestresse.\nBusca um percurso individual de escrita — o Caderno terapêutico pode ser o primeiro passo.", 'textarea'),

            lotus_acf_tab('tab_cl_dep', 'Depoimentos'),
            lotus_acf_text('cl_show_dep', 'show_depoimentos', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('cl_dep_k', 'dep_kicker', 'Linha pequena', 'Vozes do círculo'),
            lotus_acf_text('cl_dep_t', 'dep_title', 'Título', 'O que as mulheres relatam'),
            lotus_acf_text('cl_d1_q', 'dep1_texto', 'Depoimento 1', '“Os áudios me pegam no caminho do trabalho. Cinco minutos e eu chego diferente em casa.”', 'textarea'),
            lotus_acf_text('cl_d1_n', 'dep1_nome', 'Nome 1', 'Fernanda S. · gestora'),
            lotus_acf_text('cl_d2_q', 'dep2_texto', 'Depoimento 2', '“Pela primeira vez senti que não precisava explicar demais o cansaço. Alguém já entendia.”', 'textarea'),
            lotus_acf_text('cl_d2_n', 'dep2_nome', 'Nome 2', 'Camila R. · professora'),
            lotus_acf_text('cl_d3_q', 'dep3_texto', 'Depoimento 3', '“O clube não pediu que eu fosse outra. Pediu que eu voltasse a mim.”', 'textarea'),
            lotus_acf_text('cl_d3_n', 'dep3_nome', 'Nome 3', 'Juliana A. · empreendedora'),

            lotus_acf_tab('tab_cl_faq', 'Perguntas'),
            lotus_acf_text('cl_show_faq', 'show_faq', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('cl_faq_k', 'faq_kicker', 'Linha pequena', 'Dúvidas'),
            lotus_acf_text('cl_faq_t', 'faq_title', 'Título', 'Perguntas sobre o clube'),
            lotus_acf_text('cl_f1_q', 'faq1_pergunta', 'Pergunta 1', 'Os áudios são todos os dias?'),
            lotus_acf_text('cl_f1_a', 'faq1_resposta', 'Resposta 1', 'Sim. A proposta é um encontro diário, curto e constante, para sustentar o cuidado mesmo nos períodos mais cheios.', 'textarea'),
            lotus_acf_text('cl_f2_q', 'faq2_pergunta', 'Pergunta 2', 'Preciso aparecer ou falar no grupo?'),
            lotus_acf_text('cl_f2_a', 'faq2_resposta', 'Resposta 2', 'Não. Você pode apenas receber e escutar. A participação é convite, nunca obrigação.', 'textarea'),
            lotus_acf_text('cl_f3_q', 'faq3_pergunta', 'Pergunta 3', 'Como faço para entrar?'),
            lotus_acf_text('cl_f3_a', 'faq3_resposta', 'Resposta 3', 'Chame no WhatsApp. Explicamos o funcionamento, o investimento e os próximos passos para você chegar ao círculo com tranquilidade.', 'textarea'),

            lotus_acf_tab('tab_cl_cta', 'Convite'),
            lotus_acf_text('cl_show_cta', 'show_cta', 'Mostrar convite', 1, 'true_false'),
            lotus_acf_text('cl_cta_img', 'cta_img', 'Foto de fundo', '', 'image'),
            lotus_acf_text('cl_cta_k', 'cta_kicker', 'Linha pequena', 'Seu lugar no círculo'),
            lotus_acf_text('cl_cta_t', 'cta_titulo', 'Título', 'Quero entrar no Clube'),
            lotus_acf_text('cl_cta_d', 'cta_texto', 'Texto', 'Escreva para nós. Vamos te receber com escuta e combinar o melhor momento para começar.', 'textarea'),
            lotus_acf_text('cl_cta_b', 'cta_botao', 'Botão', 'Chamar no WhatsApp'),
        ],
        'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/clube.php']]],
        'position' => 'acf_after_title',
        'active' => true,
    ]);

    acf_add_local_field_group([
        'key'    => 'group_lotus_mentoria',
        'title'  => 'Mentoria — conteúdos',
        'fields' => [
            lotus_acf_tab('tab_me_hero', 'Banner'),
            lotus_acf_text('me_hero_img', 'hero_img', 'Foto do banner', '', 'image'),
            lotus_acf_text('me_kicker', 'hero_kicker', 'Linha pequena', 'Para organizações'),
            lotus_acf_text('me_title', 'hero_title', 'Título', 'Mentoria de empresas'),
            lotus_acf_text('me_lead', 'hero_lead', 'Texto do banner', 'Locais de trabalho pesados afetam produtividade e saúde mental. Cuidamos de pessoas, cultura e ambientes para devolver leveza ao que a empresa constrói todos os dias.', 'textarea'),
            lotus_acf_text('me_btn', 'hero_btn', 'Botão principal', 'Quero uma proposta para minha empresa'),
            lotus_acf_text('me_btn2', 'hero_btn2', 'Botão secundário', 'Para RH e lideranças'),

            lotus_acf_tab('tab_me_about', 'O problema'),
            lotus_acf_text('me_show_about', 'show_about', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('me_photo', 'about_img', 'Foto', '', 'image'),
            lotus_acf_text('me_about_k', 'about_kicker', 'Linha pequena', 'O problema'),
            lotus_acf_text('me_about_t', 'about_title', 'Título', 'Quando o ambiente cobra mais do que as pessoas conseguem oferecer'),
            lotus_acf_text('me_about_d', 'about_texto', 'Texto', "Insônia, mente acelerada, burnout e reuniões que pesam no corpo não são falhas individuais. São sinais de um sistema que precisa de escuta, ritmo e espaços mais humanos.\n\nA mentoria integra saúde emocional, liderança consciente e, quando fizer sentido, harmonização de ambientes corporativos.", 'textarea'),

            lotus_acf_tab('tab_me_items', 'O que cobre'),
            lotus_acf_text('me_show_items', 'show_items', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('me_items_k', 'items_kicker', 'Linha pequena', 'O que a mentoria cobre'),
            lotus_acf_text('me_items_t', 'items_title', 'Título', 'Cuidado que atravessa pessoas e espaço'),
            lotus_acf_text('me_i1_t', 'item1_titulo', 'Card 1 — título', 'Diagnóstico sensível'),
            lotus_acf_text('me_i1_d', 'item1_texto', 'Card 1 — texto', 'Escuta com lideranças e, quando combinado, com a equipe para entender o clima, os excessos e o que o ambiente comunica.', 'textarea'),
            lotus_acf_text('me_i2_t', 'item2_titulo', 'Card 2 — título', 'Cultura de bem-estar'),
            lotus_acf_text('me_i2_d', 'item2_texto', 'Card 2 — texto', 'Práticas e conversas que tiram o cuidado do discurso e colocam pausa, limite e presença na rotina de trabalho.', 'textarea'),
            lotus_acf_text('me_i3_t', 'item3_titulo', 'Card 3 — título', 'Liderança emocional'),
            lotus_acf_text('me_i3_d', 'item3_texto', 'Card 3 — texto', 'Acompanhamento para quem conduz pessoas: decidir com clareza sem abandonar a própria saúde.', 'textarea'),
            lotus_acf_text('me_i4_t', 'item4_titulo', 'Card 4 — título', 'Harmonização de ambientes'),
            lotus_acf_text('me_i4_d', 'item4_texto', 'Card 4 — texto', 'Reorganização e limpeza energética de espaços corporativos, para reduzir a sobrecarga do lugar e devolver bem-estar.', 'textarea'),

            lotus_acf_tab('tab_me_for', 'Para quem'),
            lotus_acf_text('me_show_for', 'show_for', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('me_for_k', 'for_kicker', 'Linha pequena', 'Para quem'),
            lotus_acf_text('me_for_t', 'for_title', 'Título', 'Feita para quem sente responsabilidade pelas pessoas'),
            lotus_acf_text('me_for_yes_t', 'for_yes_title', 'Caixa sim — título', 'Indicada para'),
            lotus_acf_text('me_for_yes', 'for_yes', 'Lista sim (um item por linha)', "RH e pessoas de cultura que querem ir além da palestra pontual.\nLideranças que percebem esgotamento na equipe — e em si.\nEmpresas cujo ambiente físico ou relacional está pesado.\nNegócios que desejam integrar desempenho e saúde emocional.", 'textarea'),
            lotus_acf_text('me_for_no_t', 'for_no_title', 'Caixa não — título', 'Não substitui'),
            lotus_acf_text('me_for_no', 'for_no', 'Lista não (um item por linha)', "Atendimento clínico individual de colaboradores — podemos orientar caminhos paralelos, como o Protocolo Antiestresse.\nConsultoria financeira ou de organograma. O foco é o campo humano e o ambiente.", 'textarea'),

            lotus_acf_tab('tab_me_passos', 'Percurso'),
            lotus_acf_text('me_show_passos', 'show_passos', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('me_pass_k', 'passos_kicker', 'Linha pequena', 'Percurso'),
            lotus_acf_text('me_pass_t', 'passos_title', 'Título', 'Como a parceria acontece'),
            lotus_acf_text('me_st1_t', 'passo1_titulo', 'Passo 1 — título', 'Conversa de alinhamento'),
            lotus_acf_text('me_st1_d', 'passo1_texto', 'Passo 1 — texto', 'No WhatsApp ou em uma chamada, entendemos o momento da empresa e o que precisa ser cuidado primeiro.', 'textarea'),
            lotus_acf_text('me_st2_t', 'passo2_titulo', 'Passo 2 — título', 'Proposta sob medida'),
            lotus_acf_text('me_st2_d', 'passo2_texto', 'Passo 2 — texto', 'Desenhamos um percurso com encontros, práticas e, se necessário, harmonização do espaço físico.', 'textarea'),
            lotus_acf_text('me_st3_t', 'passo3_titulo', 'Passo 3 — título', 'Acompanhamento'),
            lotus_acf_text('me_st3_d', 'passo3_texto', 'Passo 3 — texto', 'O trabalho segue com presença: ajustes de ritmo, escuta da liderança e ambiente mais leve para produzir.', 'textarea'),

            lotus_acf_tab('tab_me_faq', 'Perguntas'),
            lotus_acf_text('me_show_faq', 'show_faq', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('me_quote', 'quote_texto', 'Depoimento', '“A equipe chegou mais leve depois da harmonização. O ambiente parou de pesar na reunião.”', 'textarea'),
            lotus_acf_text('me_quote_n', 'quote_nome', 'Nome do depoimento', 'Ricardo P. · liderança comercial'),
            lotus_acf_text('me_faq_k', 'faq_kicker', 'Linha pequena', 'Dúvidas'),
            lotus_acf_text('me_faq_t', 'faq_title', 'Título', 'Perguntas de empresas'),
            lotus_acf_text('me_f1_q', 'faq1_pergunta', 'Pergunta 1', 'Atendem apenas grandes empresas?'),
            lotus_acf_text('me_f1_a', 'faq1_resposta', 'Resposta 1', 'Não. Trabalhamos com times de diferentes portes. O desenho respeita o tamanho, a cultura e o orçamento da organização.', 'textarea'),
            lotus_acf_text('me_f2_q', 'faq2_pergunta', 'Pergunta 2', 'A mentoria é presencial?'),
            lotus_acf_text('me_f2_a', 'faq2_resposta', 'Resposta 2', 'Encontros podem ser online. A harmonização de ambientes acontece no espaço físico, quando esse recurso fizer parte da proposta.', 'textarea'),
            lotus_acf_text('me_f3_q', 'faq3_pergunta', 'Pergunta 3', 'Como recebo uma proposta?'),
            lotus_acf_text('me_f3_a', 'faq3_resposta', 'Resposta 3', 'Envie uma mensagem no WhatsApp com o nome da empresa e o que está incomodando hoje. Retornamos para uma conversa de alinhamento.', 'textarea'),

            lotus_acf_tab('tab_me_cta', 'Convite'),
            lotus_acf_text('me_show_cta', 'show_cta', 'Mostrar convite', 1, 'true_false'),
            lotus_acf_text('me_cta_img', 'cta_img', 'Foto de fundo', '', 'image'),
            lotus_acf_text('me_cta_k', 'cta_kicker', 'Linha pequena', 'Para o seu time'),
            lotus_acf_text('me_cta_t', 'cta_titulo', 'Título', 'Quero uma proposta para minha empresa'),
            lotus_acf_text('me_cta_d', 'cta_texto', 'Texto', 'Vamos conversar sobre o clima, as pessoas e o espaço. O próximo passo é uma mensagem.', 'textarea'),
            lotus_acf_text('me_cta_b', 'cta_botao', 'Botão', 'Chamar no WhatsApp'),
        ],
        'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/mentoria.php']]],
        'position' => 'acf_after_title',
        'active' => true,
    ]);

    acf_add_local_field_group([
        'key'    => 'group_lotus_sobre',
        'title'  => 'Sobre — conteúdos',
        'fields' => [
            lotus_acf_tab('tab_so_hero', 'Banner'),
            lotus_acf_text('so_hero_img', 'hero_img', 'Foto do banner', '', 'image'),
            lotus_acf_text('so_kicker', 'hero_kicker', 'Linha pequena', 'A terapeuta'),
            lotus_acf_text('so_title', 'hero_title', 'Título', 'Ieda Lima'),
            lotus_acf_text('so_lead', 'hero_lead', 'Texto do banner', 'Psicóloga & terapeuta. Um espaço para quem deseja integrar, com equilíbrio, todos os seus papéis sociais — e viver com mais presença no corpo, na mente e nas emoções.', 'textarea'),

            lotus_acf_tab('tab_so_bio', 'Ieda'),
            lotus_acf_text('so_show_bio', 'show_bio', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('so_ieda_img', 'ieda_img', 'Foto da Ieda', '', 'image'),
            lotus_acf_text('so_bio_k', 'bio_kicker', 'Linha pequena', 'Portal Lótus Terapias'),
            lotus_acf_text('so_bio_t', 'bio_titulo', 'Título', 'Escuta, presença e cuidado conduzidos por Ieda Lima'),
            lotus_acf_text('so_bio_d', 'bio_texto', 'Texto', "Ieda Lima é psicóloga e terapeuta. No Portal Lótus, ela acolhe pessoas e organizações que sentem o peso de uma vida acelerada — sem atalhos, com respeito à história de cada um.\n\nO trabalho integra terapias, rituais de autoconhecimento e cuidado para quem quer habitar o trabalho, a casa e os vínculos sem se abandonar.", 'textarea'),

            lotus_acf_tab('tab_so_prin', 'Princípios'),
            lotus_acf_text('so_show_prin', 'show_principios', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('so_prin_k', 'prin_kicker', 'Linha pequena', 'Princípios'),
            lotus_acf_text('so_prin_t', 'prin_title', 'Título', 'Como conduzimos cada encontro'),
            lotus_acf_text('so_p1_t', 'prin1_titulo', 'Princípio 1 — título', 'Escuta qualificada'),
            lotus_acf_text('so_p1_d', 'prin1_texto', 'Princípio 1 — texto', 'Antes de qualquer técnica, há alguém sendo ouvido. O cuidado começa no que você traz — e no que ainda não encontrou palavras.', 'textarea'),
            lotus_acf_text('so_p2_t', 'prin2_titulo', 'Princípio 2 — título', 'Ritmo respeitado'),
            lotus_acf_text('so_p2_d', 'prin2_texto', 'Princípio 2 — texto', 'Nada é forçado. Cada jornada, protocolo ou ritual é construído a partir do seu momento e das suas necessidades.', 'textarea'),
            lotus_acf_text('so_p3_t', 'prin3_titulo', 'Princípio 3 — título', 'Integração de papéis'),
            lotus_acf_text('so_p3_d', 'prin3_texto', 'Princípio 3 — texto', 'Trabalhamos a vida como ela é: profissional, afetiva, doméstica e interior. O equilíbrio mora no conjunto, não em um único eixo.', 'textarea'),

            lotus_acf_tab('tab_so_espaco', 'O espaço'),
            lotus_acf_text('so_show_espaco', 'show_espaco', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('so_espaco_img', 'espaco_img', 'Foto', '', 'image'),
            lotus_acf_text('so_esp_k', 'espaco_kicker', 'Linha pequena', 'O espaço'),
            lotus_acf_text('so_esp_t', 'espaco_titulo', 'Título', 'Pessoas, mulheres em círculo e empresas que querem respirar de novo'),
            lotus_acf_text('so_esp_list', 'espaco_lista', 'Lista (um item por linha)', "Profissionais com insônia, ansiedade, mente acelerada ou sinais de burnout.\nMulheres que desejam pertencimento e uma rotina de cuidado compartilhado.\nQuem busca um caminho concreto de autoconhecimento, como o caderno terapêutico.\nLideranças e RH que entendem que o ambiente também adoece — ou cura.", 'textarea'),

            lotus_acf_tab('tab_so_cam', 'Caminhos'),
            lotus_acf_text('so_show_cam', 'show_caminhos', 'Mostrar esta seção', 1, 'true_false'),
            lotus_acf_text('so_cam_k', 'cam_kicker', 'Linha pequena', 'Caminhos'),
            lotus_acf_text('so_cam_t', 'cam_title', 'Título', 'Como você pode começar'),
            lotus_acf_text('so_c1_img', 'cam1_img', 'Card 1 — foto', '', 'image'),
            lotus_acf_text('so_c1_t', 'cam1_titulo', 'Card 1 — título', 'Caderno terapêutico'),
            lotus_acf_text('so_c1_d', 'cam1_texto', 'Card 1 — texto', '30 exercícios para acolher dores silenciosas e reconhecer o potencial por trás dos medos — no seu ritmo.', 'textarea'),
            lotus_acf_text('so_c1_b', 'cam1_botao', 'Card 1 — botão', 'Conhecer'),
            lotus_acf_text('so_c2_img', 'cam2_img', 'Card 2 — foto', '', 'image'),
            lotus_acf_text('so_c2_t', 'cam2_titulo', 'Card 2 — título', 'Clube para mulheres'),
            lotus_acf_text('so_c2_d', 'cam2_texto', 'Card 2 — texto', 'Grupo de apoio e áudios diários para sustentar presença na rotina.', 'textarea'),
            lotus_acf_text('so_c2_b', 'cam2_botao', 'Card 2 — botão', 'Conhecer'),
            lotus_acf_text('so_c3_img', 'cam3_img', 'Card 3 — foto', '', 'image'),
            lotus_acf_text('so_c3_t', 'cam3_titulo', 'Card 3 — título', 'Mentoria de empresas'),
            lotus_acf_text('so_c3_d', 'cam3_texto', 'Card 3 — texto', 'Saúde emocional, cultura e ambientes de trabalho mais leves.', 'textarea'),
            lotus_acf_text('so_c3_b', 'cam3_botao', 'Card 3 — botão', 'Conhecer'),

            lotus_acf_tab('tab_so_cta', 'Convite'),
            lotus_acf_text('so_show_cta', 'show_cta', 'Mostrar convite', 1, 'true_false'),
            lotus_acf_text('so_cta_img', 'cta_img', 'Foto de fundo', '', 'image'),
            lotus_acf_text('so_cta_k', 'cta_kicker', 'Linha pequena', 'Primeiro passo'),
            lotus_acf_text('so_cta_t', 'cta_titulo', 'Título', 'Agende sua consulta online'),
            lotus_acf_text('so_cta_d', 'cta_texto', 'Texto', 'Cuide de sua saúde emocional e harmonize sua vida profissional e pessoal. Estamos prontas para escutar.', 'textarea'),
            lotus_acf_text('so_cta_b1', 'cta_btn1', 'Botão WhatsApp', 'Agendar no WhatsApp'),
        ],
        'location' => [[['param' => 'page_template', 'operator' => '==', 'value' => 'page-templates/sobre.php']]],
        'position' => 'acf_after_title',
        'active' => true,
    ]);
}
add_action('acf/init', 'lotus_register_acf');
