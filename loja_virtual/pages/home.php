<div class="chamada-escolher">
    <div class="container">
        <h2>Escolha seus produtos e compre agora!</h2>
    </div><!--container-->
</div>

<div class="lista-items">
    <div class="container">
        <?php 
            $itens = \models\homeModel::getLojaItems();
            foreach ($itens as $key => $value) {
            $imagem = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque_imagens` WHERE produto_id = $value[id]");
            $imagem->execute();
            $imagem = $imagem->fetch()['imagem'];
        ?>
        <div class="produto-single-box">
            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $imagem; ?>" alt="">
            <p>Preço: R$<?php echo Painel::convertMoney($value['preco']) ?></p>
            <a href="<?php echo INCLUDE_PATH ?>?addCart=<?php echo $value['id'] ?> ?>">Adicionar no carrinho!</a>
        </div><!--produto-single-box-->
        <?php } ?>
    </div><!--container-->
</div><!--lista-itens-->