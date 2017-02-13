

<br><?= $this->Form->create('User'); ?>
    <?php
        echo $this->Form->input('username', array(
            'label'=>'IF-ID: '
        ));
        echo $this->Form->input('password', array(
            'label'=>'Senha: '
        ));
        
        echo $this->Form->submit(
            $this->Html->image("/img/icons/door-open-in.png").'Entrar',
            array('div'=>false)
        );
    ?>
    <?php echo $this->Form->end(); ?>