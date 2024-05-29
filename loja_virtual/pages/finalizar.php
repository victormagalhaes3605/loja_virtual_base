<div class="chamada-escolher">
    <div class="container">
        <h2>Finalize o seu pedido!</h2>
    </div><!--container-->
</div>

<div class="tabela-pedidos">
    <div class="container">
    <h2><i class="fa fa-shopping-cart"></i>Carrinho:</h2>
    <table>
        <tr>
            <td>Nome do produto:</td>
            <td>Quantidade:</td>
            <td>Valor:</td>
        </tr>
        <?php 
            $itemsCarrinho = $_SESSION['carrinho'];
            $total = 0;
            foreach ($itemsCarrinho as $key => $value) {
            $idProduto = $key;  
            $produto = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.estoque` WHERE id = $idProduto");
            $produto->execute();
            $produto = $produto->fetch();
            $valor = $value * $produto['preco'];
            $total+=$valor;
        ?>

        <tr>
            <td><?php echo $produto['nome']; ?></td>
            <td><?php echo $value; ?></td>
            <td>R$: <?php echo Painel::convertMoney($valor); ?></td>
        </tr>
       <?php } ?> 
       
    </table>
    </div>

</div><!--tabela-pedidos-->
<div class="finalizar-pedido">
    <div class="container">
        <h2>Total:R$<?php echo Painel::convertMoney($total);?></h2>
        <div class="clear"></div>
        <a href="" class="btn-pagamento">Pagar agora</a>
        <div class="clear"></div>
    </div><!--container-->
</div><!--finalizar-pedido-->




<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
<script src="<?php echo INCLUDE_PATH ?>js/constants.js"></script>
<script src="<?php echo INCLUDE_PATH ?>js/scripts.js"></script>