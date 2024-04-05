<?php
$page_title = "Membros";

?>
<!doctype html>
<html lang="pt-BR">

<?php include('includes/head.php') ?>

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
                            <h2>Corpo Jurídico</h2>
                            <p>Jurídico <span>//</span>Membros</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!-- team_part part start-->
    <section class="team_part our_offer single_attorneys section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-sm-10">
                    <div class="section_tittle">
                        <h2>Conheça nossa equipe</h2>
                        <p>A nossa equipe que constitui o Corpo Jurídico é formado pelas seguintes pessoas:</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
            <?php 
            // CONSULTA TOTAL DE USUÁRIOS
$stmt = $pdo->prepare("SELECT * FROM users ORDER BY rank DESC");
$stmt->execute();
            while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
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
                        <h2>Conheça também o nosso Corpo Legislativo de Vereadores</h2>
                        <a href="https://discord.gg/htPzUBfAtM" class="cta_btn">Câmara Municipal</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta_part part end-->

    <!--::review_part start::-->
    <!--::blog_part end::-->


    <!-- footer part start-->
    <?php include('includes/footer.php') ?>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
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