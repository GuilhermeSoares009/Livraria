

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!--Comando que irá aceitar palavras com acentos-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Aqui fica o titulo que aparece no navegador-->
    <title>Dashboard</title>
    <!--Aqui eu uno o arquivo que está o css como o html faço uma ligação entre  os dois,
    assim tudo que está sendo feito lá é aplicado aqui-->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
  
<!--Area de cima-->
<section>
        <!--Barra preta-->
        <section id="Barra">
            <div id="menu">
                <!--Menu Hamburguer 1-->
                <div class="hamburguer"  id="menu1" onclick='abrir()'>
                    <div class="barras-menu"></div>
                    <div class="barras-menu"></div>
                    <div class="barras-menu"></div>
                 </div>

                 <!--Menu Hamburguer 2-->
                 <div class="hamburguer" id="hamburguer-fechar" onclick='fechar()'>
                    <div class="barras-menu"></div>
                    <div class="barras-menu"></div>
                    <div class="barras-menu"></div>
                 </div>

                 <!--Conteudo Principal-->
                <a id="adm" href="#">Administração </a>
            </div>
            
            <!--Sair-->
            <a id="sair" href="#">
                Sair
            </a>
        </section>
</section>


<!--Seção com menu lateral e conteudo-->
<section  id="principal">
        <!--Menu lateral-->
        <nav id="menu-lateral">
            <ul id="lista">
            
                <li></li>
                <li id="linkMenu" href="?pagina=Usuario&metodo=Perfil">Perfil</li>
                <li>Páginas</li>
                <li>Categorias</li>
                <li>Plugins</li>
                <li>Ir para o site</li>
          
            </ul>
        </nav>


        <nav id="menu-lateral">
            <ul id="lista">
            
                <li></li>
                <li id="linkMenu" href="?pagina=Usuario&metodo=Perfil">Nome</li>
                <li>Páginas</li>
                <li>Categorias</li>
                <li>Plugins</li>
                <li>Ir para o site</li>
            </ul>
        </nav>


    <main id="conteudo-principal">

        {{area_substituivel}}    


    </main>

</section>
    <!--Eu chamo o arquivo javascript e faço uma ligação entre o ele e o html assim tudo que está sendo feito
    lá é aplicado aqui-->
    <script type="text/javascript" src="js/javascript.js">
  
  </script>
</body>
</html>