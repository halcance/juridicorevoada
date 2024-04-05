<!doctype html>
<html lang="pt-BR">
<?php 
$page_title = "Código Processual";
include('includes/head.php');

?>

<body>
   <!--::header part start::-->
   <?php include('includes/header.php') ?>
   <!-- Header part end-->

   <!-- breadcrumb start-->
   <section class="breadcrumb breadcrumb_bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcrumb_iner text-center">
                  <div class="breadcrumb_iner_item">
                     <h2>Calculadora Penal</h2>
                     <p><span>A calculadora é uma maneira rápida e simples de realizar a somatória de todas as imputações penais.</span></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- breadcrumb start-->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section_padding">
      <div class="container">
         <div class="row mb-5">
            <div style="margin: auto;width: 30%;flex: 0 0 auto;">
                <h3>Nome do Preso</h3>
                <input type="text" placeholder="NOME DO PRESO" id="preso_nome" name="preso_nome" class="inputnumber form-control" size="8" style="margin-right:10px">
            </div>
            
            <div style="margin: auto;width: 30%;flex: 0 0 auto;">
                <h3>ID do Preso</h3>
                <input type="number" placeholder="ID DO PRESO" id="preso_rg" name="preso_rg" class="inputnumber form-control" size="8" style="margin-right:10px">
            </div>
                        
            <div style="margin: auto;width: 30%;flex: 0 0 auto;">
                <h3>ID do Advogado</h3>
                <input type="number" placeholder="ID DO ADVOGADO" id="adv_rg" name="adv_rg" class="inputnumber form-control" size="8" style="margin-right:10px">
            </div>
      </div>
      <div class="row">
         <div id="1" class="col-md-4">
       
       <h3>II - CRIMES CONTRA A VIDA:</h3>
       <div class="col col-md-12">
       <input id="Art. 5 - Tentativa de Homicídio" type="checkbox" class="form-check-input" name="crime" value="5|3000|NA" onclick="calcular()">
       <label class="form-check-label" for="Art. 5 - Tentativa de Homicídio">Art. 5 - Tentativa de Homicídio**</label>
           </div>
           <div class="col col-md-12">
       <input id="Art. 6 - Homicídio Culposo" type="checkbox" class="form-check-input" name="crime" value="5|5000|2500" onclick="calcular()">
       <label class="form-check-label" for="Art. 6 - Homicídio Culposo">Art. 6 - Homicídio Culposo </label>
           </div>
           <div class="col col-md-12">
       <input id="Art. 7 - Homicídio Doloso" type="checkbox" class="form-check-input" name="crime" value="10|5000|NA" onclick="calcular()">
       <label class="form-check-label" for="Art. 7 - Homicídio Doloso">Art. 7 - Homicídio Doloso**</label>
           </div>
           <div class="col col-md-12">
       <input id="Art. 8 - Homicídio Doloso Qualificado" type="checkbox" class="form-check-input" name="crime" value="10|5000|NA" onclick="calcular()">
       <label class="form-check-label" for="Art. 8 - Homicídio Doloso Qualificado">Art. 8 - Homicídio Doloso Qualificado**</label>
           </div>
           <div class="col col-md-12">
       <input id="Art. 9 - Omissão de Socorro" type="checkbox" class="form-check-input" name="crime" value="4|2000|4000" onclick="calcular()">
       <label class="form-check-label" for="Art. 9 - Omissão de Socorro">Art. 9 - Omissão de Socorro</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 10 - Lesão Corporal" type="checkbox" class="form-check-input" name="crime" value="2|1000|3000" onclick="calcular()">
       <label class="form-check-label" for="Art. 10 - Lesão Corporal"> Art. 10 - Lesão Corporal</label>
           </div>
           
       <hr>
       
       
       <h3>CRIMES CONTRA DIREITOS FUNDAMENTAIS:</h3>
           
       <div class="col col-md-12">
       <input id="Art. 11 - Sequestro" type="checkbox" class="form-check-input" name="crime" value="10|5000|NA" onclick="calcular()">
       <label class="form-check-label" for="Art. 11 - Sequestro">Art. 11 - Sequestro**</label>
           </div>
           <div class="col col-md-12">
       <input id="Art. 12 - Assédio Moral" type="checkbox" class="form-check-input" name="crime" value="10|50000|NA" onclick="calcular()">
       <label class="form-check-label" for="Art. 12 - Assédio Moral">Art. 12 - Assédio Moral**</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 13 - Calúnia, Injúria ou Difamação" type="checkbox" class="form-check-input" name="crime" value="5|2500|5000" onclick="calcular()">
       <label class="form-check-label" for="Art. 13 - Calúnia, Injúria ou Difamação">Art. 13 - Calúnia, Injúria ou Difamação</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 14 - Invasão de Propriedade" type="checkbox" class="form-check-input" name="crime" value="5|5000|10000" onclick="calcular()">
       <label class="form-check-label" for="Art. 14 - Invasão de Propriedade">Art. 14 - Invasão de Propriedade</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 15 - Perturbação do Sossego Alheio" type="checkbox" class="form-check-input" name="crime" value="0|20000|40000" onclick="calcular()">
       <label class="form-check-label" for="Art. 15 - Perturbação do Sossego Alheio">Art. 15 - Perturbação do Sossego Alheio</label>
       </div>
       <hr>
       
       
       <h3>CRIMES CONTRA A LIBERDADE PESSOAL:</h3>
           
       <div class="col col-md-12">
       <input id="Art. 16 - Ameaça" type="checkbox" class="form-check-input" name="crime" value="5|2500|7000" onclick="calcular()">
       <label class="form-check-label" for="Art. 16 - Ameaça">Art. 16 - Ameaça</label>
      </div>
      <div class="col col-md-12">
           <input id="Art. 17 - Extorsão" type="checkbox" class="form-check-input" name="crime" value="5|10000|12000" onclick="calcular()">
       <label class="form-check-label" for="Art. 17 - Extorsão">Art. 17 - Extorsão</label>
       </div>
       <hr>
       
       
       <h3>CRIMES CONTRA A ADMINISTRAÇÃO PÚBLICA:</h3>
           
       <div class="col col-md-12">
       <input id="Art. 18 - Agressão a Funcionário Público" type="checkbox" class="form-check-input" name="crime" value="5|10000|NA" onclick="calcular()">
       <label class="form-check-label" for="Art. 18 - Agressão a Funcionário Público">Art. 18 - Agressão a Funcionário Público</label>
      </div>
      <div class="col col-md-12">
       <input id="Art. 19 - Falsidade Ideológica" type="checkbox" class="form-check-input" name="crime" value="5|4000|8000" onclick="calcular()">
       <label class="form-check-label" for="Art. 19 - Falsidade Ideológica">Art. 19 - Falsidade Ideológica</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 20 - Prevaricação" type="checkbox" class="form-check-input" name="crime" value="10|10000|15000" onclick="calcular()">
       <label class="form-check-label" for="Art. 20 - Prevaricação">Art. 20 - Prevaricação</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 21 - Abuso de Autoridade" type="checkbox" class="form-check-input" name="crime" value="10|5000|8000" onclick="calcular()">
       <label class="form-check-label" for="Art. 21 - Abuso de Autoridade">Art. 21 - Abuso de Autoridade</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 22 - Falsa Comunicação de Crime" type="checkbox" class="form-check-input" name="crime" value="3|1000|5000" onclick="calcular()">
       <label class="form-check-label" for="Art. 22 - Falsa Comunicação de Crime">Art. 22 - Falsa Comunicação de Crime</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 23 - Tentativa de Suborno" type="checkbox" class="form-check-input" name="crime" value="10|4000|8000" onclick="calcular()">
       <label class="form-check-label" for="Art. 23 - Suborno">Art. 23 - Tentativa de Suborno</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 24 - Uso indevido do sistema de emergência" type="checkbox" class="form-check-input" name="crime" value="5|4000|8000" onclick="calcular()">
       <label class="form-check-label" for="Art. 24 - Uso indevido do sistema de emergência">Art. 24 - Uso indevido do sistema de emergência</label>
      </div>
      <div class="col col-md-12">
       <input id="Art. 25 - Desacato" type="checkbox" class="form-check-input" name="crime" value="20|50000|N/A" onclick="calcular()">
       <label class="form-check-label" for="Art. 25 - Desacato">Art. 25 - Desacato**</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 25.1 - Desacato x1" type="checkbox" class="form-check-input" name="crime" value="20|50000|N/A" onclick="calcular()">
       <label class="form-check-label" for="Art. 25.1 - Desacato x1">Art. 25.1 - Desacato x1**</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 25.2 - Desacato x2" type="checkbox" class="form-check-input" name="crime" value="20|50000|N/A" onclick="calcular()">
       <label class="form-check-label" for="Art. 25.2 - Desacato x2">Art. 25.2 - Desacato x2**</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 26 - Desobediência" type="checkbox" class="form-check-input" name="crime" value="0|15000|30000" onclick="calcular()">
       <label class="form-check-label" for="Art. 26 - Desobediência">Art. 26 - Desobediência</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 26.1 - Desobediência x1" type="checkbox" class="form-check-input" name="crime" value="0|15000|30000" onclick="calcular()">
       <label class="form-check-label" for="Art. 26.1 - Desobediência x1">Art. 26.1 - Desobediência x1</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 26.2 - Desobediência x2" type="checkbox" class="form-check-input" name="crime" value="10|15000|30000" onclick="calcular()">
        <label class="form-check-label" for="Art. 26.2 - Desobediência x2">Art. 26.2 - Desobediência x2</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 27 - Obstrução de Justiça" type="checkbox" class="form-check-input" name="crime" value="5|15000|20000" onclick="calcular()">
       <label class="form-check-label" for="Art. 27 - Obstrução de Justiça">Art. 27 - Obstrução de Justiça</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 28 - Ocultação de Provas" type="checkbox" class="form-check-input" name="crime" value="4|2500|5000" onclick="calcular()">
       <label class="form-check-label" for="Art. 28 - Ocultação de Provas">Art. 28 - Ocultação de Provas</label>
       </div>
       <div class="col col-md-12"> 
       <input id="Art. 29 - Resistência a Prisão" type="checkbox" class="form-check-input" name="crime" value="10|15000|30000" onclick="calcular()">
       <label class="form-check-label" for="Art. 29 - Resistência a Prisão">Art. 29 - Resistência a Prisão</label>
       </div>
       <hr>
      
       <hr>
       <h3>CRIMES CONTRA O PATRIMÔNIO:</h3>
       <div class="col col-md-12">
		<input id="Art. 59 - Desmanche de Veículos" type="checkbox" class="form-check-input" name="crime" value="10|5000|10000" onclick="calcular()">
<label class="form-check-label" for="Art. 59 - Desmanche de Veículos">Art. 59 - Desmanche de Veículos</label>
	</div>
    <div class="col col-md-12">
           <input id="Art. 60 - Roubo" type="checkbox" class="form-check-input" name="crime" value="5|2000|5000" onclick="calcular()">
       <label class="form-check-label" for="Art. 60 - Roubo">Art. 60 - Roubo</label>
       </div>
       <div class="col col-md-12">
           <input id="Art. 61 - Furto a Caixa Eletrônico" type="checkbox" class="form-check-input" name="crime" value="10|10000|30000" onclick="calcular()">
       <label class="form-check-label" for="Art. 61 - Furto a Caixa Eletrônico">Art. 61 - Furto a Caixa Eletrônico </label>
       </div>   
       <div class="col col-md-12">
           <input id="Art. 62 - Furto" type="checkbox" class="form-check-input" name="crime" value="5|5000|10000" onclick="calcular()">
       <label class="form-check-label" for="Art. 62 - Furto">Art. 62 - Furto </label>
       </div>
       <div class="col col-md-12">
           <input id="Art. 63 - Receptação de Veículos" type="checkbox" class="form-check-input" name="crime" value="5|5000|10000" onclick="calcular()">
       <label class="form-check-label" for="Art. 63 - Receptação de Veículos">Art. 63 - Receptação de Veículos </label>
       </div>
       <div class="col col-md-12">
           <input id="Art. 64 - Roubo de Veículos" type="checkbox" class="form-check-input" name="crime" value="10|6000|11000" onclick="calcular()">
       <label class="form-check-label" for="Art. 64 - Roubo de Veículos">Art. 64 - Roubo de Veículos</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 65 - Tentativa de Furto" type="checkbox" class="form-check-input" name="crime" value="5|8000|12000" onclick="calcular()">
       <label class="form-check-label" for="Art. 65 - Tentativa de Furto">Art. 65 - Tentativa de Furto</label>
       </div>
       <div class="col col-md-12">
           <input id="Art. 66 - Furto de Veículos" type="checkbox" class="form-check-input" name="crime" value="6|1000|5000" onclick="calcular()">
       <label class="form-check-label" for="Art. 66 - Furto de Veículos">Art. 66 - Furto de Veículos</label>
       </div>
       <hr>
       </div>         <!-- FIM DA COLUNA -->
       <div id="2" class="col-md-4">
       
       <h3>CRIMES CONTRA A ORDEM PÚBLICA:</h3>
       <div class="col col-md-12">
       <input id="Art. 30 - Dano a Patrimônio Público" type="checkbox" class="form-check-input" name="crime" value="5|2000|4000" onclick="calcular()">
       <label class="form-check-label" for="Art. 30 - Dano a Patrimônio Público">Art. 30 - Dano a Patrimônio Público</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 31 - Atentado ao Pudor" type="checkbox" class="form-check-input" name="crime" value="10|10000|20000" onclick="calcular()">
       <label class="form-check-label" for="Art. 31 - Atentado ao Pudor">Art. 31 - Atentado ao Pudor</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 32 - Formação de Quadrilha" type="checkbox" class="form-check-input" name="crime" value="8|5000|9000" onclick="calcular()">
           <label class="form-check-label" for="Art. 32 - Formação de Quadrilha">Art. 32 - Associação Criminosa</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 33 - Apologia ao Crime" type="checkbox" class="form-check-input" name="crime" value="5|3000|5000" onclick="calcular()">
       <label class="form-check-label" for="Art. 33 - Apologia ao Crime">Art. 33 - Apologia ao Crime</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 34 - Posse de Arma em Público" type="checkbox" class="form-check-input" name="crime" value="5|2000|5000" onclick="calcular()">
       <label class="form-check-label" for="Art. 34 - Posse de Arma em Público">Art. 34 - Posse de Arma em Público</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 35 - Uso de Máscara" type="checkbox" class="form-check-input" name="crime" value="0|5000|10000" onclick="calcular()">
       <label class="form-check-label" for="Art. 35 - Uso de Máscara">Art. 35 - Uso de Máscara</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 36 - Uso de Equipamentos Restritos" type="checkbox" class="form-check-input" name="crime" value="5|5000|7000" onclick="calcular()">
       <label class="form-check-label" for="Art. 36 - Uso de Equipamentos Restritos">Art. 36 - Uso de Equipamentos Restritos</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 37 - Vadiagem" type="checkbox" class="form-check-input" name="crime" value="5|10000|15000" onclick="calcular()">
       <label class="form-check-label" for="Art. 37 - Vadiagem">Art. 37 - Vadiagem</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 38 - Tentativa de Fuga" type="checkbox" class="form-check-input" name="crime" value="10|5000|10000" onclick="calcular()">
       <label class="form-check-label" for="Art. 38 - Tentativa de Fuga">Art. 38 - Tentativa de Fuga</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 39 - Vandalismo" type="checkbox" class="form-check-input" name="crime" value="5|4000|8000" onclick="calcular()">
       <label class="form-check-label" for="Art. 39 - Vandalismo">Art. 39 - Vandalismo</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 40 - Réu Reincidente" type="checkbox" class="form-check-input" name="crime" value="5|0|0" onclick="calcular()">
       <label class="form-check-label" for="Art. 40 - Réu Reincidente">Art. 40 - Réu Reincidente</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 41 - Cúmplice" type="checkbox" class="form-check-input" name="crime" value="0|0|5000" onclick="calcular()">
       <label class="form-check-label" for="Art. 41 - Cúmplice">Art. 41 - Cúmplice</label>
       </div>
       <div class="col col-md-12">
           <input id="Art. 42 - Tráfico de Armas" type="checkbox" class="form-check-input" name="crime" value="10|10000|20000" onclick="calcular()">
       <label class="form-check-label" for="Art. 42 - Tráfico de Armas">Art. 42 - Tráfico de Armas </label>
       </div>
       <div class="col col-md-12">
           <input id="Art. 43 - Tráfico de Itens Ilegais" type="checkbox" class="form-check-input" name="crime" value="10|15000|20000" onclick="calcular()">
       <label class="form-check-label" for="Art. 43 - Tráfico de Itens Ilegais">Art. 43 - Tráfico de Itens Ilegais </label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 44 - Tráfico de Munições (+100)" type="checkbox" class="form-check-input  escolha2" name="crime" value="8|5000|8000" onclick="limparCheckboxes22(this)">
       <label class="form-check-label" for="Art. 44 - Tráfico de Munições (+100)">Art. 44 - Tráfico de Munições (+100) </label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 45 - Tráfico de Drogas (+100)" type="checkbox" class="form-check-input escolha1" name="crime" value="10|50000|80000" onclick="limparCheckboxes(this)">
       <label class="form-check-label" for="Art. 45 - Tráfico de Drogas (+100)">Art. 45 - Tráfico de Drogas (+100) </label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 46 - Porte de Arma Pesada" type="checkbox" class="form-check-input" name="crime" value="5|15000|20000" onclick="calcular()">
       <label class="form-check-label" for="Art. 46 - Porte de Arma Pesada">Art. 46 - Porte de Arma Pesada </label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 47 - Porte de Arma Leve" type="checkbox" class="form-check-input" name="crime" value="3|10000|15000" onclick="calcular()">
       <label class="form-check-label" for="Art. 47 - Porte de Arma Leve">Art. 47 - Porte de Arma Leve </label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 48 - Porte de Arma Branca" type="checkbox" class="form-check-input" name="crime" value="0|5000|7000" onclick="calcular()">
       <label class="form-check-label" for="Art. 48 - Porte de Arma Branca">Art. 48 - Porte de Arma Branca </label>
       </div>
       <div class="col col-md-12">
           <input id="Art. 49 - Posse de Peças de Armas" type="checkbox" class="form-check-input" name="crime" value="5|10000|15000" onclick="calcular()">
       <label class="form-check-label" for="Art. 49 - Posse de Peças de Armas">Art. 49 - Posse de Peças de Armas </label>
       </div>
       <div class="col col-md-12">
           <input id="Art. 50 - Posse de Cápsulas" type="checkbox" class="form-check-input" name="crime" value="5|10000|15000" onclick="calcular()">
       <label class="form-check-label" for="Art. 50 - Posse de Cápsulas">Art. 50 - Posse de Cápsulas </label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 51 - Disparo de Arma de Fogo" type="checkbox" class="form-check-input" name="crime" value="4|5000|10000" onclick="calcular()">
       <label class="form-check-label" for="Art. 51 - Disparo de Arma de Fogo">Art. 51 - Disparo de Arma de Fogo </label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 52 - Posse de Munição (-100)" type="checkbox" class="form-check-input  escolha2" name="crime" value="3|5000|8000" onclick="limparCheckboxes22(this)">
       <label class="form-check-label" for="Art. 52 - Posse de Munição (-100)">Art. 52 - Posse de Munição (-100) </label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 53 - Posse de Colete" type="checkbox" class="form-check-input" name="crime" value="2|1000|5000" onclick="calcular()">
       <label class="form-check-label" for="Art. 53 - Posse de Colete">Art. 53 - Posse de Colete </label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 54 - Aviãozinho (6 a 100)" type="checkbox" class="form-check-input escolha1" name="crime" value="20|15000|30000" onclick="limparCheckboxes(this)">
       <label class="form-check-label" for="Art. 54 - Aviãozinho (6 a 100)">Art. 54 - Aviãozinho (6 a 100) </label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 55 - Posse de Componentes Narcóticos" type="checkbox" class="form-check-input" name="crime" value="10|5000|10000" onclick="calcular()">
       <label class="form-check-label" for="Art. 55 - Posse de Componentes Narcóticos">Art. 55 - Posse de Componentes Narcóticos </label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 56 - Posse de Drogas (1 a 5)" type="checkbox" class="form-check-input escolha1" name="crime" value="0|10000|0" onclick="limparCheckboxes(this)">
       <label class="form-check-label" for="Art. 56 - Posse de Drogas (1 a 5)">Art. 56 - Posse de Drogas (1 a 5)</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 57 - Posse de Itens Ilegais" type="checkbox" class="form-check-input" name="crime" value="5|10000|15000" onclick="calcular()">
       <label class="form-check-label" for="Art. 57 - Posse de Itens Ilegais">Art. 57 - Posse de Itens Ilegais</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 58 - Dinheiro Sujo" type="checkbox" class="form-check-input" name="crime" value="10|100|20000" onclick="calcular()">
       <label class="form-check-label" for="Art. 58 - Dinheiro Sujo">Art. 58 - Dinheiro Sujo</label>
       </div>
       
       <hr>
       
       
       <h3>CRIMES DE TRÂNSITO:</h3>
       <div class="col col-md-12">
       <input id="Art. 67 - Condução Imprudente" type="checkbox" class="form-check-input" name="crime" value="2|1000|2500" onclick="calcular()">
       <label class="form-check-label" for="Art. 67 - Condução Imprudente">Art. 67 - Condução Imprudente</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 68 - Dirigir na Contra Mão" type="checkbox" class="form-check-input" name="crime" value="0|15000|0" onclick="calcular()">
       <label class="form-check-label" for="Art. 68 - Dirigir na Contra Mão">Art. 68 - Dirigir na Contra Mão</label>
       </div>
       <div class="col col-md-12">
       
       <input id="Art. 69 - Alta Velocidade" type="checkbox" class="form-check-input" name="crime" value="0|10000|0" onclick="calcular()">
       <label class="form-check-label" for="Art. 69 - Alta Velocidade">Art. 69 - Alta Velocidade</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 70 - Poluição Sonora" type="checkbox" class="form-check-input" name="crime" value="0|10000|0" onclick="calcular()">
       <label class="form-check-label" for="Art. 70 - Poluição Sonora">Art. 70 - Poluição Sonora</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 71 - Corridas Ilegais" type="checkbox" class="form-check-input" name="crime" value="5|25000|0" onclick="calcular()">
       <label class="form-check-label" for="Art. 71 - Corridas Ilegais">Art. 71 - Corridas Ilegais</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 72 - Uso Excessivo de Insulfilm" type="checkbox" class="form-check-input" name="crime" value="0|10000|0" onclick="calcular()">
       <label class="form-check-label" for="Art. 72 - Uso Excessivo de Insulfilm">Art. 72 - Uso Excessivo de Insulfilm</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 73 - Veículo Irregular" type="checkbox" class="form-check-input" name="crime" value="0|5000|0" onclick="calcular()">
       <label class="form-check-label" for="Art. 73 - Veículo Irregular">Art. 73 - Veículo Irregular</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 74 - Estacionar em área proibida" type="checkbox" class="form-check-input" name="crime" value="0|5000|0" onclick="calcular()">
       <label class="form-check-label" for="Art. 74 - Estacionar em área proibida">Art. 74 - Estacionar em área proibida</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 75 - Não Ceder Passagem a Viaturas" type="checkbox" class="form-check-input" name="crime" value="0|2000|0" onclick="calcular()">
       <label class="form-check-label" for="Art. 75 - Não Ceder Passagem a Viaturas">Art. 75 - Não Ceder Passagem a Viaturas</label>
       </div>
       <div class="col col-md-12">
       <input id="Art. 76 - Impedir o Fluxo do Tráfego" type="checkbox" class="form-check-input" name="crime" value="0|2000|0" onclick="calcular()">
       <label class="form-check-label" for="Art. 76 - Impedir o Fluxo do Tráfego">Art. 76 - Impedir o Fluxo do Tráfego</label>
       </div>
       <hr>
       <div class="col col-md-12">
       <h3>
           ITENS APREENDIDOS:
       </h3>
       <textarea rows="10" style="resize: none;" maxlength="500" id="itens" class="form-control"></textarea>
       </div>
       
       
       
       </div>
          <div class="col-md-4">
          <h3><i class="bi bi-eye"></i> Pré-visualização:</h3>
                         <textarea rows="10" cols="50" style="resize: none;" readonly="true" maxlength="500" id="areaText" class="TextoArtigos form-control"></textarea>
         
                         <div class="alert alert-red" id="penamaxima" style="display: none;" role="alert">
                             Excedeu 180 MESES
                         </div>
                     <h4><i class="bi bi-clock-history"></i> PENA:</h4>
                 <input type="text" id="pena" name="pena" class="form-control" readonly="true" size="2" style="margin-right:5px">
                 <h4><i class="bi bi-cash"></i> MULTA: </h4> <input type="text" id="multa" name="multa" class="form-control" readonly="true" size="5" style="margin-right:15px">
                 <h4 id="h4_1" style="display:none;">💸 FIANÇA TOTAL </h4> <input type="text" id="fianca" name="fianca" class="form-control" readonly="true" size="8" style="margin-right:10px; display:none;">
                 <h4 id="h4_2" style="display:none;">💸 FIANÇA POLICIAL </h4> <input type="text" id="fianca_pol" name="fianca_pol" class="form-control" readonly="true" size="8" style="margin-right:10px; display:none;">
                 <h4 id="h4_3" style="display:none;">💸 FIANÇA PAINEL </h4> <input type="text" id="fianca_bau" name="fianca_bau" class="form-control" readonly="true" size="8" style="margin-right:10px; display:none;">
                 <h4 id="h4_4" style="display:none;">💸 FIANÇA ADVOGADO </h4> <input type="text" id="fianca_adv" name="fianca_adv" class="form-control" readonly="true" size="8" style="margin-right:10px; display:none;">
               <!--  <h4>⚖️ CONDICIONAL:</h4> <input type="text" value="NÃO USAR" id="condicional" class="form-control" name="condicional" readonly="true" size=7 style="margin-right:10px">     -->
                <!-- <h3 style="margin-top: 30px;"></h3> -->
                 <h4><i class="bi bi-currency-dollar"></i> DINHEIRO SUJO:</h4>
                 <input type="number" id="input_sujo" placeholder="R$ Dinheiro sujo" name="sujo" class="form-control" onchange="calcular()" size="9"> 
                 <br>
                 <button class="btn btn-success w-100" id="copy"><i class="bi bi-clipboard"></i> Copiar</button>
       <br>
       <br>
                 <button class="btn btn-danger w-100" onclick="limpar()"><i class="bi bi-trash"></i> Limpar</button>
               <br> 
               <br> 
                         <h3>
                             ATENUANTES:
                         </h3>
                         <div class="col col-md-12 advogado-1">
                             <input type="checkbox" class="form-check-input" id="advogado-30" name="advogado-30" value="30">🔹 Advogado constituído:
                        Redução de 30% na pena total.
                     </div>
                             <div class="col col-md-12 advogado-1">
                                 
                                         <input id="reu-primario" type="checkbox" class="form-check-input" value="20" name="reu-primario" onchange="calcular()">🔹 Réu primário:
                                    Redução de 20% na pena total.
                             </div>
                             <div class="col col-md-12 advogado-2">
                                         <input id="reu-confesso" type="checkbox" class="form-check-input" value="20" name="reu-confesso" onchange="calcular()">🔹 Réu confesso:
                                     Redução de 20% na pena total.
                             </div>
                             <div class="col col-md-12 advogado-3">
                                 
                                     🔹 Delação premiada: Critério do
                                             policial.
                             
                                     <div class="col col-md-12" style="padding-left: 5%;">
                                         <input id="delacao-premiada" class="form-control" min="0" max="100" type="number" name="delacao-premiada" onchange="calcular()">
                                     </div>
                                 
                             </div>
                             <br>
                             <input type="checkbox" class="form-check-input" id="mandado" name="mandado" value="500" onchange="calcular()">🔹 Mandado de busca e apreensão: Ordem do juiz, mandando que se apreenda coisa em poder de outrem ou em certo lugar, para ser trazida a juízo e aí ficar sob custódia do próprio juiz, mesmo que em poder de um depositário por ele designado ou do depositário público. 
                             <br><br>
                             <input type="checkbox" id="porte" name="porte" class="form-check-input" value="0" title="Marque se o indivíduo possuir porte de arma." onchange="calcular()"><span> 📋 POSSUI PORTE DE ARMA</span>
                             <br> <br>
                             <input type="checkbox" disabled="" id="fiancaP" name="fiancaP" class="form-check-input" value="0" title="Marque se o indivíduo pagou a fiança." onchange="calcular()">
                                 🔻 FIANÇA
                             <br> <br>
                             <input type="checkbox" id="inputHP" name="inputHP" class="form-check-input" value="0" title="Marque se o indivíduo foi levantado depois de morto." onchange="calcular()">
                             <span> 🏥 REANIMADO NO HP:</span>
                             Redução de 30% na pena total.
                             <p>🔹(Obrigatório sempre que o preso tiver sido reanimado)</p>
                             <textarea rows="10" cols="50" style="resize: none; display: none;" readonly="true" maxlength="500" id="discord-text"></textarea>
         
                             <input hidden="" id="pena-reduzida-70" value="70">
                             <input hidden="" id="pena-reducao" type="number" value="0"> 
         
                             <script type="text/javascript">(function(){window['__CF$cv$params']={r:'6d4ede693a774cf7',m:'c1hW1Rh0H4tuZl0wsr8lc_PxHochVPe94cU5za3H6pc-1643421646-0-AZgReWNppiCIufGN9b0SQAKCqRsLtHcwRgDjgAZ+Ebwly7w0zsT9G6XS1O/UzoI0KiHefNZG3S1S37LGPme9exr6Q+bETOtZoXvE80b2jTfbfvhbNPPCZOseNmfBmgNt6A/HEo8div1AtL5xdFuLfRozIq3iNLhezke9DJu8FQdEnFcZ+SAUTYcHVynGr69bHeJn9/0I1C6Z2kVFP5+t1xjmrXaI1cyd880XCyhvg3kG',s:[0xa3d3168605,0xba02de72f3],}})();</script><script type="text/javascript">(function(){window['__CF$cv$params']={r:'6d55320baf256030',m:'ZIEu.pp.iZbUyq5KJvDLfjpPqMeOMxiNGM_gE_5Duyk-1643487986-0-AcUKQeDM0xlzizuzSCE1OWs4UCC/gTki/Wf/ptjXki9iQ5VGlYhrXoxDtlJyTdabd/omn/0PoOs+p2TFELZ2mXXA6xQBQ2b+78uInsszFfSZ930uS3lQhVc0pV+mm90Hi0ieWJJmSuym9EtYDi4CGxRFI1YKe+wVHyalMeXttvlzsYErYN8azcWTRNNeh5t9RbTkmCwQHWLPNxXvCr0wo0DuT9CtjXmfznyCLMi9IUpe',s:[0x6efed7905d,0x60ab50310e],}})();</script>	
                             
                             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                         </div>   
                       </div>
      </div>
   </section>
   <script>
      $(document).ready(async function () {
          $(this).tooltip();
          try {
              const {state} = await navigator.permissions.query({name: 'clipboard-write'})
              return state === "granted"
          } catch{
              return false;
          }
      });
  </script>
  <script>
   function limpar() {
       var crimes = document.getElementsByName('crime');
       for (var i = 0; i < crimes.length; i++) {
           crimes[i].checked = false;
       }
       $("#reu-primario")[0].checked = false
       $("#reu-confesso")[0].checked = false
       $("#advogado-30")[0].checked = false
       $("#fiancaP")[0].checked = false
       $("#inputHP")[0].checked = false
       $("#fianca")[0].checked = false
       $("#mandado")[0].checked = false
       $("#delacao-premiada").val("");
       $("#fianca")[0].value = "";
       $("#pena")[0].value = "";
       $("#multa")[0].value = "";
       $("#input_sujo")[0].value = "";
       $("#condicional")[0].value = "NÃO USAR";
       $("#areaText")[0].value = "";
       $("#itens")[0].value = "";
       $("#porte")[0].checked = false;
       $('#preso_nome').val("");
       $('#preso_rg').val("");
       $("#multa").val("");
       $("#adv_rg").val("");
       $("#pena-reducao").val(0);
       $("#fianca_bau").val("");
       $("#fianca_adv").val("");
       $("#fianca_pol").val("");
   }

   $("#advogado-30").change(function () {
       var checkbox = document.getElementById("advogado-30");
       const div_p1 = document.getElementById('fianca');
       const div_p2 = document.getElementById('fianca_pol');
       const div_p3 = document.getElementById('fianca_bau');
       const div_p4 = document.getElementById('fianca_adv');
       const h4_1 = document.getElementById('h4_1');
       const h4_2 = document.getElementById('h4_2');
       const h4_3 = document.getElementById('h4_3');
       const h4_4 = document.getElementById('h4_4');
       div_p1.style.display = "block";
       div_p2.style.display = "block";
       div_p3.style.display = "block";
       div_p4.style.display = "block";
       h4_1.style.display = "block";
       h4_2.style.display = "block";
       h4_3.style.display = "block";
       h4_4.style.display = "block";
       if (checkbox.checked) {
           if ($("#adv_rg").val() === "") {
               $("#advogado-30").prop({
                   checked: false
               });
               Swal.fire({
                 text: 'Informe o RG do Advogado',
                 icon: 'error',
                 showCancelButton: false,
                 confirmButtonColor: '#3085d6',
                 confirmButtonText: 'Fechar'
               });
               div_p1.style.display = "none";
               div_p2.style.display = "none";
               div_p3.style.display = "none";
               div_p4.style.display = "none";
               h4_1.style.display = "none";
               h4_2.style.display = "none";
               h4_3.style.display = "none";
               h4_4.style.display = "none";
           }
           calcular();
       } else {
           div_p1.style.display = "none";
           div_p2.style.display = "none";
           div_p3.style.display = "none";
           div_p4.style.display = "none";
           h4_1.style.display = "none";
           h4_2.style.display = "none";
           h4_3.style.display = "none";
           h4_4.style.display = "none";
           calcular();
       }
   });
   
   function calcular() {
       const checkboxes =  document.getElementsByName('crime');
       let ids = [];
       checkboxes.forEach(checkbox => {
           if (checkbox.checked) {
               ids.push(checkbox.id);				
           }
       });
       document.getElementById('areaText').value = ids.join('\n');
       var Pena = 0;
       var Multa = 0;
       var Fianca = 0;
       var penaReduzir = 0;
       var penaRe = 0;
       var Condicional = "NÃO USAR";
       var fiancaReduzir = 0;
       /* Crimes */
       var crimes = document.getElementsByName('crime');
       for (var i = 0; i < crimes.length; i++) {
           if (crimes[i].checked) {
               var valores_crime = crimes[i].value.split("|");
               //var button = crimes[i].relatedTarget;						
               var Vinput =  crimes[i].dataset.base // "3" crimes[i].attr("");
               //document.getElementById('input_teste').value = Vinput;	
               //var Vmult = mult.val();
               Pena += parseInt(valores_crime[0]);
               Multa += parseInt(valores_crime[1]);
               Fianca += parseInt(valores_crime[2]);
               /*Condicional += parseInt(valores_crime[0])*4; */
               Condicional = "NÃO USAR";						
           }
       }
       /* dinheiro sujo */
       var sujo = parseInt(document.getElementById("input_sujo").value);
       if (sujo >= 1000) {
           Multa += sujo / 100 * 50;
           Fianca += sujo / 100 * 50;
       }
       var reu_pri = document.getElementById("reu-primario");
       var reu_conf = document.getElementById("reu-confesso");
       var delacao = parseInt(document.getElementById("delacao-premiada").value);
       var PfiancaP = parseInt(document.getElementById("fiancaP").value);
       var Vmandado = document.getElementById("mandado");
       var checkboxadv = document.getElementById("advogado-30");
       var inputHP = document.getElementById("inputHP");
       if (reu_pri.checked) {
           penaRe = penaRe + 20
       }
       if (checkboxadv.checked) {
           penaRe = penaRe + 20
       }
       if (reu_conf.checked) {
           penaRe = penaRe + 20
       }
       if(inputHP.checked){
           penaRe = penaRe + 30
       }
       if (delacao > 0) {
           penaRe = penaRe + delacao;
           if (penaRe > 100){
               penaRe = 100;
           }
       }
       if (penaRe > 70 ){
           penaRe = 70;
       }
       if(PfiancaP.checked){
           penaRe = 0;
           pena_txt.value = 1;
       }
       penaReduzir = Pena * parseInt(penaRe) / 100;
       var limite = Pena - penaReduzir;
       var valorFF = '';
       if(Pena > 180){
           document.getElementById("pena").value = 180;
       }else{
           document.getElementById("pena").value = Pena - penaReduzir;
       }
       document.getElementById("multa").value = "R$" + Multa.toLocaleString('pt-BR', { minimumFractionDigits: 2 }); 
       if (isNaN(Fianca) || Vmandado.checked) {
           document.getElementById("fianca").value = "SEM FIANÇA";
           document.getElementById("fianca_adv").value = "SEM FIANÇA";
           document.getElementById("fianca_pol").value = "SEM FIANÇA";
           document.getElementById("fianca_bau").value = "SEM FIANÇA";
       } else {
           //TOTAL
           var FiancaFF = Fianca * 1.3;
           document.getElementById("fianca").value = "R$" + FiancaFF.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
           // ADV
           var FiancaADV = FiancaFF * 0.30;
           document.getElementById("fianca_adv").value = "R$" + FiancaADV.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
           // POLICIAL
           var FiancaPOL = FiancaFF * 0.35;
           document.getElementById("fianca_pol").value = "R$" + FiancaPOL.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
           //BAU
           var FiancaBAU = FiancaFF * 0.35;
           document.getElementById("fianca_bau").value = "R$" + FiancaBAU.toLocaleString('pt-BR', { minimumFractionDigits: 2 });
       }
   }
</script>
<script>
   function addZero(i) {
       if (i < 10) {i = "0" + i}
       return i;
   }
   </script>
   <script>
      $("#copy").click(async function(){
          if($("#areaText").val() != "" && 
              $('#preso_nome').val() != "" &&
              $('#preso_rg').val()!= "" &&
              $('#pena').val()!= "" &&
              $("#multa").val()!= "") {
                  calcular();
                  var checkfujo = document.getElementById("Art. 58 - Dinheiro Sujo");
                  var checkarma0 = document.getElementById("Art. 42 - Tráfico de Armas");
                  var checkarma1 = document.getElementById("Art. 46 - Porte de Arma Pesada");
                  var checkarma2 = document.getElementById("Art. 47 - Porte de Arma Leve");
                  var checkarma3 = document.getElementById("Art. 44 - Tráfico de Munições (+100)");
                  var checkarma4 = document.getElementById("Art. 52 - Posse de Munição (-100)");
                  var checkarma5 = document.getElementById("Art. 45 - Tráfico de Drogas (+100)");
                  var checkarma6 = document.getElementById("Art. 54 - Aviãozinho (6 a 100)");
                  if(checkfujo.checked && $("#input_sujo").val() === "" ){
                      Swal.fire({
                          text: 'Por favor colocar o valor do Dinheiro Sujo',
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'Fechar'
                      });
                  }else if(checkarma0.checked && $("#itens").val() === "" ){
                      Swal.fire({
                          text: 'Por favor colocar a Quantidade de Armas na caixa de ITENS APREENDIDOS:',
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'Fechar'
                      });
                  }else if(checkarma1.checked && $("#itens").val() === "" ){
                      Swal.fire({
                          text: 'Por favor colocar a Quantidade de Armas na caixa de ITENS APREENDIDOS:',
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'Fechar'
                      });
                  }else if(checkarma2.checked && $("#itens").val() === "" ){
                      Swal.fire({
                          text: 'Por favor colocar a Quantidade de Armas na caixa de ITENS APREENDIDOS:',
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'Fechar'
                      });
                  }else if(checkarma3.checked && $("#itens").val() === "" ){
                      Swal.fire({
                          text: 'Por favor colocar a Quantidade de Munições na caixa de ITENS APREENDIDOS:',
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'Fechar'
                      });
                  }else if(checkarma4.checked && $("#itens").val() === "" ){
                      Swal.fire({
                          text: 'Por favor colocar a Quantidade de Munições na caixa de ITENS APREENDIDOS:',
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'Fechar'
                      });
                  }else if(checkarma5.checked && $("#itens").val() === "" ){
                      Swal.fire({
                          text: 'Por favor colocar a Quantidade de Drogas na caixa de ITENS APREENDIDOS:',
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'Fechar'
                      });
                  }else if(checkarma6.checked && $("#itens").val() === "" ){
                      Swal.fire({
                          text: 'Por favor colocar a Quantidade de Drogas na caixa de ITENS APREENDIDOS:',
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'Fechar'
                      });
                  }else{
                      var today = new Date();
                      var mes = today.getMonth() + 1;
                      var porte = ''
                      var fianca = ''
                      let div = document.getElementById("discord-text");
                      let text = div.innerText;
                      let textArea = document.createElement("textarea");
                      textArea.width = '1px';
                      textArea.height = '1px';
                      textArea.background = 'transparents';
                      var redPer = 100;
                      var redPer22 = 0;
                      var checkboxadv = document.getElementById("advogado-30");
                      var checkprimario = document.getElementById("reu-primario");
                      var checkconfesso = document.getElementById("reu-confesso");
                      var checkmandado = document.getElementById("mandado");
                      var checkporte = document.getElementById("porte");
                      var checkfianca = document.getElementById("fiancaP");
                      if (checkboxadv.checked) {
                          redPer22 = redPer22 + 30;
                      } 
                      if (checkprimario.checked) {
                          redPer22 = redPer22 + 20;
                      } 
                      if (checkconfesso.checked) {
                          redPer22 = redPer22 + 20;
                      }
                      if (redPer22 > 70 ){
                          redPer22 = 70;
                      }
                      redPer = redPer - redPer22;
                      if (checkporte.checked) {
                          porte = "Sim"
                      }else{
                          porte = "Não"
                      }
                      let h = addZero(today.getHours());
                      let m = addZero(today.getMinutes());
                      text ="QRA:\n```md"
                      +"\n# INFORMAÇÕES DO PRESO:"
                      +"\n* NOME: " + $('#preso_nome').val()
                      +"\n* RG: " + $('#preso_rg').val();
                      if (checkboxadv.checked) {
                          text +="\n\n# INFORMAÇÕES DO ADVOGADO: \n* RG: " + $('#adv_rg').val();
                          redPer = redPer - 20;
                      }
                      text +="\n\n# PENA TOTAL: " + $('#pena').val() +' meses ('+redPer+'%)'
                      +"\n# MULTA: " + $("#multa").val()+' (100%)';
                      if(checkfujo.checked){
                          text +="\n\n# DINHEIRO SUJO\n" + "R$ " + $("#input_sujo").val().toLocaleString('pt-BR', { minimumFractionDigits: 2 })
                      }
                      text +="\n\n# CRIMES: \n" + $("#areaText").val()
                      +"\n\n# ITENS APREENDIDOS\n" +$("#itens").val()
                      +"\n\n# ATENUANTES: ";
                      if (checkboxadv.checked) {
                          text +="\n* 🔹 Advogado constituído: Redução de 30% na pena total.";
                      } 
                      if (checkprimario.checked) {
                          text +="\n* 🔹 Réu primário: Redução de 20% na pena total.";
                      } 
                      if (checkconfesso.checked) {
                          text +="\n* 🔹 Réu confesso: Redução de 20% na pena total.";
                      } 
                      if (checkmandado.checked) {
                          text +="\n* 🔹 Mandado de Busca e Apreensão";
                      } 
                      text +="\n\n# 📋 PORTE DE ARMA: " + porte 
                      if (checkfianca.checked) {
                          text +="\n\n* 🔹 Fiança paga";
                          text +="\n\n# 💸 FIANÇA TOTAL: " + $("#fianca").val()+' ';
      
                      }
                      text +="\n* DATA: "+ today.getDate() +"/" + mes + "/" + today.getFullYear() + " - "+ h +":"+ m
                      +"\n```"
                      textArea.value = text;
                      document.body.append(textArea);
                      textArea.select();
                      document.execCommand("copy");
                      document.body.removeChild(textArea)
                      Swal.fire({
                          text: 'Copiado com Sucesso',
                          icon: 'success',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'Fechar'
                      });
                      const timeOut = setTimeout(inafiancavel, 3000);
                  }
          } else{
              if($("#areaText")[0].value == ""){
                  Swal.fire({
                      text: 'Escolha os crimes',
                      icon: 'error',
                      showCancelButton: false,
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Fechar'
                  });
              } else {
                  if($("#preso_nome")[0].value == ""){
                      Swal.fire({
                          text: 'Nome do Preso',
                          icon: 'error',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'Fechar'
                      });
                  } else{
                      if($("#preso_rg")[0].value == ""){
                          Swal.fire({
                              text: 'Informe o RG do Preso',
                              icon: 'error',
                              showCancelButton: false,
                              confirmButtonColor: '#3085d6',
                              confirmButtonText: 'Fechar'
                          });
                      }
                  }
              }	
          }
          })
      
      </script>
      <script>
         function limparCheckboxes(checkbox) {
           const checkboxes = document.querySelectorAll('.escolha1');
           for (let i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i] !== checkbox) {
               checkboxes[i].checked = false;
             }
           }
           calcular();
         }
       </script>
       <script>
         function limparCheckboxes22(checkbox) {
           const checkboxes = document.querySelectorAll('.escolha2');
           for (let i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i] !== checkbox) {
               checkboxes[i].checked = false;
             }
           }
           calcular();
         }
       
         // Capturando os elementos dos checkboxes
       const checkbox1 = document.getElementById("advogado-30");
       const checkbox2 = document.getElementById("fiancaP");
       
       // Adicionando um event listener ao checkbox1
       checkbox1.addEventListener("change", function() {
         if (checkbox1.checked) {
           // Se checkbox1 estiver marcado, habilite checkbox2
           checkbox2.disabled = false;
         } else {
           // Se checkbox1 estiver desmarcado, desabilite e desmarque checkbox2
           checkbox2.disabled = true;
           checkbox2.checked = false;
         }
       });
       </script>
   <!--================Blog Area end =================-->

   <!-- footer part start-->
   <footer class="footer-area">
      <div class="container">
         <div class="row justify-content-between">
            <div class="col-sm-6 col-xl-3">
               <div class="single-footer-widget footer_1">
                  <a href="index.html"> <img src="img/footer-logo.png" alt=""> </a>
                  <p>Created. Image moving living fowl earth fruitful. Two hath first you're doesn you
                     life above. Living give and earth light for appear moved their behold </p>
                  <div class="social_icon">
                     <a href="#"> <i class="ti-facebook"></i> </a>
                     <a href="#"> <i class="ti-twitter-alt"></i> </a>
                     <a href="#"> <i class="ti-instagram"></i> </a>
                     <a href="#"> <i class="ti-skype"></i> </a>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-xl-3">
               <div class="single-footer-widget">
                  <h4>Our Service</h4>
                  <ul>
                     <li><a href="#">Car accident</a></li>
                     <li><a href="#">Personal injury</a></li>
                     <li><a href="#">Family law</a></li>
                     <li><a href="#">Bank and financial</a></li>
                     <li><a href="#">Capital market</a></li>
                     <li><a href="#">Employment Law</a></li>
                  </ul>

               </div>
            </div>
            <div class="col-sm-6 col-xl-3">
               <div class="single-footer-widget footer_icon">
                  <h4>Contact Info</h4>
                  <p>4361 Morningview Lane Artland
                     Latimer, IA 50452</p>
                  <ul>
                     <li><a href="#"><i class="ti-mobile"></i>+02 - 32 365 2654</a></li>
                     <li><a href="#"><i class="ti-email"></i>ariclaw@law.com</a></li>
                     <li><a href="#"><i class="ti-world"></i> ariclawyerfirm.com</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-sm-6 col-xl-3">
               <div class="single-footer-widget footer_3">
                  <h4>Instagram</h4>
                  <div class="footer_img">
                     <div class="single_footer_img">
                        <img src="img/footer_img/footer_img_1.png" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                     </div>
                     <div class="single_footer_img">
                        <img src="img/footer_img/footer_img_2.png" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                     </div>
                     <div class="single_footer_img">
                        <img src="img/footer_img/footer_img_3.png" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                     </div>
                     <div class="single_footer_img">
                        <img src="img/footer_img/footer_img_4.png" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                     </div>
                     <div class="single_footer_img">
                        <img src="img/footer_img/footer_img_5.png" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                     </div>
                     <div class="single_footer_img">
                        <img src="img/footer_img/footer_img_6.png" alt="">
                        <a href="#"><i class="ti-instagram"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
      <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12">
                 <div class="copyright_part_text text-center">
                     <div class="container">
                         <div class="row">
                             <div class="col-lg-8 col-md-12">
                                 <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                             </div>
                             <div class="col-lg-4 col-md-12">
                                 <div class="footer_menu">
                                     <ul>
                                         <li><a href="#">Home</a></li>
                                         <li><a href="#">Services</a></li>
                                         <li><a href="#">Careers</a></li>
                                         <li><a href="#">Faq</a></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
   </footer>
   <!-- footer part end-->

   <!-- jquery plugins here-->
   <!-- jquery -->
   <script src="js/jquery-1.12.1.min.js"></script>
   <!-- popper js -->
   <script src="js/popper.min.js"></script>
   <script src="js/sweetalert2.js"></script>
   <!-- bootstrap js -->
   <script src="js/bootstrap.min.js"></script>
   <!-- easing js -->
   <script src="js/jquery.magnific-popup.js"></script>
   <!-- swiper js -->
   <script src="js/swiper.min.js"></script>
   <!-- swiper js -->
   <script src="js/masonry.pkgd.js"></script>
   <!-- particles js -->
   <script src="js/owl.carousel.min.js"></script>
   <!-- swiper js -->
   <script src="js/slick.min.js"></script>
   <script src="js/gijgo.min.js"></script>
   <script src="js/jquery.nice-select.min.js"></script>
   <!-- custom js -->
   <script src="js/custom.js"></script>
</body>

</html>