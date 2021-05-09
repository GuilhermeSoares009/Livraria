
//==============Funcao Abrir o menu lateral==============
function abrir()
{
    if(screen.width > 760)
    {
    //Pego o elemento com o id menu-lateral do html e atribuo 250px de largura ou seja
    //é mostrado o menu lateral
    document.getElementById('menu-lateral').style.width = "250px"

    //Eu pego o primeiro menu hamburguer e faço desaperacer com o display=none
    document.getElementById('menu1').style.display = "none"

    //Pego menu hamburguer 2 e mostro ele com o display = inline
    document.getElementById('hamburguer-fechar').style.display = "inline"

    //Pego o conteúdo principal do texto e dou uma margem do lado esquerdo para que quando clicar no botao do menu
    // o conteudo fique afastrado do menu lateral
    document.getElementById('conteudo-principal').style.marginLeft = "250px" ;
    } else{
        //Pego o elemento com o id menu-lateral do html e atribuo 250px de largura ou seja
        //é mostrado o menu lateral
        document.getElementById('menu-lateral').style.height = "100%"
        
        //Altero o comando opacity para quando clicar em abrir a pessoas poder ver o menu
        document.getElementById('menu-lateral').style.opacity = "100%"


        //Eu pego o primeiro menu hamburguer e faço desaperacer com o display=none
        document.getElementById('menu1').style.display = "none"

        //Pego menu hamburguer 2 e mostro ele com o display = inline
        document.getElementById('hamburguer-fechar').style.display = "inline"
    }
}


//==============Funcao fechar o menu lateral==============
function fechar()
{
    if(screen.width > 760){
    //Pego o menu lateral e faço desaparecer com o width = 0px
    document.getElementById('menu-lateral').style.width = "0px"

    //Aqui desapareço com o menu hamburguer 2 com display = none
    document.getElementById('hamburguer-fechar').style.display ="none"

    //Eu mostro o menu 1 novamente com o display = inline
    document.getElementById('menu1').style.display ="inline"

    //Eu tiro a margem ou afastamento do lado esquerdo no conteudo principal
    //assim ele volta ao inicio como menu lateral fechado
    document.getElementById('conteudo-principal').style.marginLeft = "0px" 
    }else{
        //Pego o elemento com o id menu-lateral do html e atribuo 250px de largura ou seja
        //é mostrado o menu lateral
        document.getElementById('menu-lateral').style.height = "0%"
        
        //Aqui desapareço com o menu hamburguer 2 com display = none
        document.getElementById('hamburguer-fechar').style.display ="none"

        //Eu mostro o menu 1 novamente com o display = inline
        document.getElementById('menu1').style.display ="inline"
    }
}

$(document).ready(function()
{
    $.post("listarDados.php", function(retorna)
    {
     console.log(retorna)   
        //Mando o que a função recebe ou seja os echos  do listar dados
        //São enviados a div #conteudo0
        $("#conteudo0").html(retorna);
    });
});