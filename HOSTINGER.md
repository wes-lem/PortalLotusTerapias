# Publicar o Portal Lótus na Hostinger

O tema WordPress está na pasta `portal-lotus` e no arquivo `portal-lotus.zip`. A instalação do WordPress no hPanel precisa ser feita com o acesso da Hostinger (não envie senha no chat).

## 1. WordPress no ar (~10 min)

1. Entre no **hPanel** da Hostinger.
2. **Site** → **Sites** → domínio da Ieda.
3. Se ainda não houver WordPress: **Instalador automático** → **WordPress** → instalar na raiz (`public_html`).
4. Ative o **SSL** (Let’s Encrypt).
5. Abra `https://DOMINIO/wp-admin` e confirme o login admin.

## 2. Usuário para a Ieda (editor)

Em **Usuários** → **Adicionar**:

- Função: **Editor** (não Administrador)
- Ela edita páginas e mídia, sem instalar plugins nem quebrar o tema

## 3. Plugin ACF

1. **Plugins** → **Adicionar** → busque **Advanced Custom Fields**.
2. Instale e ative a versão gratuita.
3. (Opcional) ACF Pro só se no futuro ela quiser listas ilimitadas. O tema já funciona com a versão grátis: campos numerados, com os textos atuais como padrão.

## 4. Enviar o tema

1. Use o arquivo `portal-lotus.zip` desta pasta do projeto (ou compacte a pasta `portal-lotus`, com `style.css` dentro dela).
2. No WordPress: **Aparência** → **Temas** → **Adicionar** → **Enviar tema**.
3. Ative **Portal Lótus**.
4. Na ativação, o tema cria sozinho as páginas Início, Caderno, Clube, Mentoria e Sobre, o menu e a página inicial.

Se o upload do zip falhar (tamanho), use o **Gerenciador de arquivos** da Hostinger: envie a pasta `portal-lotus` para `public_html/wp-content/themes/`.

## 5. Conferir

- **Ajustes** → **Leitura**: “Uma página estática” → Início
- **Aparência** → **Menus**: menu **Menu principal**
- Menu lateral **Portal Lótus**: WhatsApp, e-mail, nome da marca
- **Páginas** → **Início**: os campos ACF (textos e fotos) abaixo do editor

## 6. Como a Ieda edita

Páginas → escolhe a página → rola até os grupos de campos (Título do banner, Texto, Foto, “Mostrar esta seção”) → Atualizar.

Não usar Elementor nem o construtor da Hostinger neste tema.
