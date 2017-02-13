<?php $cakeDescription = 'NUCLEO'; ?>

<!DOCTYPE html>
<html>
<head>
<!-- 
/*******************************************************************************
  Sistema de impressão IFG Câmpus Cidade de Goias

  Distribuido sob domínio público.
  2015 Marco Antônio Queiroz <marco.queiroz@ifg.edu.br>
*******************************************************************************/

 * Tema IFG Câmpus Cidade de Goias
 *
 * Copyright 2015
 * Licensed free
 * http://www.ifg.edu.br/goias
 *
 * Desenvolvido por: 
 *  Marco Antônio Queiroz
 *  Tec. de Tecnologia Da Informação,
 *  Analista Desenvolvedor de Sistemas
 */
 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $this -> Html -> charset('UTF-8'); ?>
    <title>IFG:
      <?php echo $title_for_layout; ?></title>
      <?php echo $this -> Html -> meta('icon');

      echo $this -> Html -> css('login');

      echo $this -> fetch('meta');
      echo $this -> fetch('css');
      echo $this -> fetch('script');
      echo $this -> fetch('script');
      ?>
  </head>
  <body>
    
<div id="content">
        <div class="login">
            <?php echo $this -> Session -> flash(); ?>
            <?php echo $this -> Session -> flash('auth'); ?>
            <?php echo $this -> fetch('content'); ?>
        </div>
        
        <div id="helping" class="hide helping">
            <span class="close"></span>
            <b>Aluno/Professor:</b> Utilize seu login e senha de acesso ao IFG-ID, caso não tenha, procure o setor responsavel (<b>TI</b>).
            </p>
            <b>Visitante:</b> Solicite ao setor responsavel (<b>TI</b>) um voucher de acesso.
        </div>

</div>
  
<?php 
  //echo $this->element('footer-by');
?>  
</body>
</html>
<script>
    window.scrollTo(0,10);
</script>