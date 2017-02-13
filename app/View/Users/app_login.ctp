
<div class="logo" data-title='Senha'>
    <?php 
        echo $this->Html->image(
            "banner.png",
            array(
                'class'=>'logo_img',
                'title'=>"IFG Goias"
            )
        ); 
    ?>
</div>

Servidor de impressão.
<br></p>

<?php echo $this->Form->create('User'); ?>

    <?php
        echo $this->Form->input('username', array(
            'label' => false,
            'placeholder'=>'IF-ID',
            'title'=>'Entre com seu IF-ID',
        ));
     ?>

    <?php 
        echo $this->Form->input('password', array(
            'label' => false,
            'placeholder'=>'Senha',
            'title'=>'Entre com a senha',
        ));
    ?>

    <?php 

        echo $this->Form->button(
            $this->Html->image('/img/icons/door-open-in.png')." Entrar",
            array(
                'div'=>false,
                'escape'=>false,
            )
        );
    ?>
    <?php echo $this->Form->end(); ?>


<div class="clear"></div>
</p>
<div class="left">
IFG Câmpus Cidade de Goiás | Telefone: (62) 3371-9154 (TI).
</div>