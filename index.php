<?php

require('config.php');

$page_title = "Início";

// CONSULTA TOTAL DE USUÁRIOS
$stmt = $pdo->prepare("SELECT * FROM users ORDER BY rank DESC LIMIT 3");
$stmt->execute();

?>
<!doctype html>
<html lang="pt-BR">
<?php include('includes/head.php') ?>

<body>
    <!--::header part start::-->
    <?php include('includes/header.php') ?>
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>TRIBUNAL DE JUSTIÇA</h1>
                            <p>A função do Poder Judiciário é garantir os direitos individuais, coletivos e sociais e resolver conflitos entre cidadãos, entidades e Estado.</p>
                            <div class="banner_btn">
                                <a href="/membros.php" class="btn_1">Membros</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- about part start-->
    <section class="about_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <h2>“A verdade do advogado não é a Verdade, mas sim a consistência ou uma conveniência consistente”</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-sm-7">
                    <div class="about_part_img">
                        <img src="img/12.png" alt="#">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-5 d-none d-sm-block">
                    <div class="about_part_img">
                        <img src="img/15.png" alt="#">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="about_text text-center">
                        <p>O Sistema Jurídico do RevoadaRJ busca manter a paz social e a defesa dos direitos de todos os cidadãos por meio da Ordem dos Advogados onde localiza-se nossos advogados e o nosso tribunal de justiça onde julga-se processos civis e criminais.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about part end-->

    <!-- Service part start-->
    <section class="service_part section_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_service_part">
                        <div class="single_service_text">
                            <span class="flaticon-law"></span>
                            <h2>CARTÓRIO</h2>
                            <p>O cartório é seu parceiro confiável para todos os seus documentos legais. Realizamos a emissão de todos os documentos civis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_service_part">
                        <div class="single_service_text">
                            <span class="flaticon-scale"></span>
                            <h2>REVISÃO DE CASOS</h2>
                            <p>Reveja decisões tomadas por outras instituições/organizações e garanta a justiça e a preservação dos direitos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_service_part">
                        <div class="single_service_text">
                            <span class="flaticon-siren"></span>
                            <h2>DENÚNCIAS</h2>
                            <p>Não se sente seguro em denunciar algo ou alguém diretamente? Faça sua denúncia no jurídico e iremos apurar os fatos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_service_part">
                        <div class="single_service_text">
                            <span class="flaticon-policeman"></span>
                            <h2>ASSISTÊNCIA JURÍDICA</h2>
                            <p>Oferecemos assistência jurídica garantindo proteção legal em todas as etapas. Conte com nossa experiência para resolver seus desafios legais com eficiência e confiança.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service part end-->

    <!-- our_offer part start-->
    <section class="our_offer case_study section_padding">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-sm-10">
                    <div class="section_tittle">
                        <h2>Administração Pública</h2>
                        <p>Nossos princípios incluem eficiência, transparência, legalidade e responsabilidade na utilização dos recursos públicos. Engloba planejamento, organização, direção e controle das atividades do setor público, com o objetivo de promover o bem-estar social e o desenvolvimento sustentável da cidade. </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="img/18.png" alt="offer_img_1">
                            <div class="hover_text">
                                <h2>Defesa Civil</h2>
                                <p>Instituição que atua na defesa da ordem jurídica, dos interesses sociais e individuais indisponíveis, promovendo a investigação e a responsabilização de infratores, além de fiscalizar a aplicação da lei e zelar pelo cumprimento dos direitos fundamentais.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="img/oab1.png" alt="offer_img_1">
                            <div class="hover_text">
                                <h2>Corpo Jurídico</h2>
                                <p>Dentro do nosso painel de membros do corpo jurídicos contamos com pessoas capacitadas e competentes atuando em todas as áreas administrativas.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="img/14.png" alt="offer_img_1">
                            <div class="hover_text">
                                <h2>Resolução de Conflitos</h2>
                                <p>Resolva conflitos de forma eficaz e harmoniosa com nossos serviços especializados em mediação e negociação. Libere o potencial de sua equipe e promova um ambiente de trabalho produtivo e positivo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our_offer part end-->

    <!-- team_part part start-->
    <section class="team_part our_offer section_bg section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-sm-10">
                    <div class="section_tittle">
                        <h2>Conheça nossa Administração</h2>
                        <p>A administração é responsável por planejar, organizar, dirigir e controlar os recursos. Isso envolve tomar decisões estratégicas, alocação eficiente de recursos, liderança de equipes e avaliação de desempenho para garantir o sucesso e a sustentabilidade.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
               <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="../admin/<?php echo $dados['image'] ?>" alt="offer_img_1">
                            <div class="hover_text">
                                <p>PASSAPORTE: <?php echo $dados['passport'] ?></p>
                                <p>RG: <?php echo $dados['rg'] ?></p>
                                <p>CADASTRO: <?php echo $dados['created'] ?></p>
                            </div>
                        </div>
                        <div class="team_member_info">
                            <h4><?php echo $dados['name'] ?></h4>
                            <p><?php echo $dados['role'] ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- team_part part end-->

    <!-- cta_part part start-->
    <section class="cta_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cta_text">
                        <h2>A Câmara Municipal do RevoadaRJ está disponível para atender suas solicitações e demandas, nossos vereadores estão de prontidão para atendimentos</h2>
                        <a href="https://discord.gg/htPzUBfAtM" class="cta_btn">Discord da Câmara Municipal</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta_part part end-->

    <!--::review_part start::-->
    <section class="review_part section_padding section_bg">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-9">
                    <!-- MAIN SLIDES -->
                    <div class="slider">
                        <div data-index="1">
                            <div class="client_review_text text-center">
                                <p>"O trabalho da Ordem dos Advogados tem sido exemplar,
                                     demonstrando compromisso inabalável com a justiça e excelência na defesa dos direitos dos cidadãos."</p>

                            </div>
                        </div>
                        <div data-index="2">
                            <div class="client_review_text text-center">
                                <p>"A resolução de conflitos conduzida pelo tribunal foi excepcional, demonstrando profissionalismo, imparcialidade e garantindo justiça para todas as partes envolvidas. 
                                    Estamos gratos pela eficiência e competência demonstradas durante todo o processo."</p>
                            </div>
                        </div>
                        <div data-index="3">
                            <div class="client_review_text text-center">
                                <p>Thing yielding place gathered heaven second isn't darkness does not good very dry
                                    morning
                                    signs isn't for spirit stars man meat beginning. Meat earth. Face seas doesn't life
                                    doesn't fruit brought life gathering also lights isn't day a wherein firmament
                                    fruitful
                                    read ability</p>
                            </div>
                        </div>
                        <div data-index="4">
                            <div class="client_review_text text-center">
                                <p>Thing yielding place gathered heaven second isn't darkness does not good very
                                    dry morning signs isn't for spirit stars man meat beginning. Meat earth.
                                    Face seas doesn't life doesn't fruit brought life gathering also lights
                                    isn't day a wherein firmament fruitful read ability</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- THUMBNAILS -->
                    <div class="slider-nav-thumbnails">
                        <div class="slider-thumbnails">
                            <img src="img/client/18225_1.png" alt="slideimg" class="image">
                            <div class="client_review_text text-center">
                                <h3>Andreza Vallence</h3>
                                <h5>Diretora da OAB</h5>
                            </div>
                        </div>
                        <div class="slider-thumbnails">
                            <img src="img/client/client_2.png" alt="slideimg" class="image">
                            <div class="client_review_text text-center">
                                <h3>Daniel E Gilcritst</h3>
                                <h5>Manager, Vision</h5>
                            </div>
                        </div>
                        <div class="slider-thumbnails">
                            <img src="img/client/client_3.png" alt="slideimg" class="image">
                            <div class="client_review_text text-center">
                                <h3>Richard Kellerman</h3>
                                <h5>Manager, Vision</h5>
                            </div>
                        </div>
                        <div class="slider-thumbnails">
                            <img src="img/client/client_4.png" alt="slideimg" class="image">
                            <div class="client_review_text text-center">
                                <h3>Daniel E Gilcritst</h3>
                                <h5>Manager, Vision</h5>
                            </div>
                        </div>
                        <div class="slider-thumbnails">
                            <img src="img/client/client_1.png" alt="slideimg" class="image">
                            <div class="client_review_text text-center">
                                <h3>Richard Kellerman</h3>
                                <h5>Manager, Vision</h5>
                            </div>
                        </div>
                        <div class="slider-thumbnails">
                            <img src="img/client/client_2.png" alt="slideimg" class="image">
                            <div class="client_review_text text-center">
                                <h3>Daniel E Gilcritst</h3>
                                <h5>Manager, Vision</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->

    <!-- team_part part start-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-sm-10">
                    <div class="section_tittle">
                        <h2>Latest From Blog</h2>
                        <p>Over their the abundantly every midst place thing them them winged you're beginning
                            forth you fruit seas very does can after herb moved so was kind </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="img/blog/blog_1.png" alt="offer_img_1">
                            <div class="hover_text">
                                <div class="single-home-blog">
                                    <a href="blog.html"> <i class="ti-bookmark"></i> Finance</a>
                                    <a class="time"> <i class="ti-time"></i> March 30, 2019</a>
                                    <a href="blog.html">
                                        <h5 class="card-title">Day to fill you greater together
                                            life open set seed</h5>
                                    </a>
                                    <p>Created images moving living fowl earth freed two hath first you
                                        does you life above living a Give and earth light appear moved
                                        behold go day seasons it made you more so fifty tosand on board
                                        of the ready </p>
                                    <ul>
                                        <li> <span class="ti-heart"></span>0 Like</li>
                                        <li> <span class="ti-comments"></span>2 Comments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="img/blog/blog_2.png" alt="offer_img_1">
                            <div class="hover_text">
                                <div class="single-home-blog">
                                    <a href="blog.html"> <i class="ti-bookmark"></i> Finance</a>
                                    <a class="time"> <i class="ti-time"></i> March 30, 2019</a>
                                    <a href="blog.html">
                                        <h5 class="card-title">Day to fill you greater together
                                            life open set seed</h5>
                                    </a>
                                    <p>Created images moving living fowl earth freed two hath first you
                                        does you life above living a Give and earth light appear moved
                                        behold go day seasons it made you more so fifty tosand on board
                                        of the ready </p>
                                    <ul>
                                        <li> <span class="ti-heart"></span>0 Like</li>
                                        <li> <span class="ti-comments"></span>2 Comments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_offer_part">
                        <div class="single_offer">
                            <img src="img/blog/blog_3.png" alt="offer_img_1">
                            <div class="hover_text">
                                <div class="single-home-blog">
                                    <a href="blog.html"> <i class="ti-bookmark"></i> Finance</a>
                                    <a class="time"> <i class="ti-time"></i> March 30, 2019</a>
                                    <a href="blog.html">
                                        <h5 class="card-title">Day to fill you greater together
                                            life open set seed</h5>
                                    </a>
                                    <p>Created images moving living fowl earth freed two hath first you
                                        does you life above living a Give and earth light appear moved
                                        behold go day seasons it made you more so fifty tosand on board
                                        of the ready </p>
                                    <ul>
                                        <li> <span class="ti-heart"></span>0 Like</li>
                                        <li> <span class="ti-comments"></span>2 Comments</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team_part part end-->

    <!-- footer part start-->
    <?php include('includes/footer.php') ?>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
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