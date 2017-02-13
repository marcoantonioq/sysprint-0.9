<?php if( $this->Session->read('Auth.User.nome') ): ?>
<div id="branding">
    <div class="floatleft">
        <h4>
            <?php $painel = 'PAINEL '.strtoupper((empty($this->request->prefix) ? 'Professor' :$this->request->prefix)) ?>
            <?php echo $this->Html->link($painel,'/') ?>
        </h4>
    </div>
    <div class="floatright">
        <div class="floatleft">
            <!-- <img src="img/img-profile.jpg" alt="Profile Pic" /> -->
        </div>

        <div class="floatleft marginleft10">
            <ul class="inline-ul floatleft">
                <li>
                    <?php 
                        echo $this->Html->link('Ola '.$this->Session->read('Auth.User.nome'), 
                            array(
                                'admin'=>false, 
                                'plugin'=>'users', 
                                'controller'=>'users', 
                                'action'=>'index',
                                $this->Session->read('Auth.User.id')
                            )
                        ); 
                    ?> 
                </li>
                <?php if($this->Session->read('Auth.User.grupo_id') == 1): ?>
                    <li>
                        <?php $return = (empty($this->request->prefix) ? true : false );?>
                        <?php 
                            echo $this->Html->link('Alternar', 
                                array(
                                    'admin'=>$return,
                                    'plugin'=>false,
                                    'controller'=>'recursos', 
                                    'action'=>'index'
                                )
                            ); ?>
                    </li>
                <?php endif; ?>
                <li>
                    <?php echo $this->Html->link('Logout', array('admin'=>false, 'plugin'=>'users', 'controller'=>'users', 'action'=>'logout')); ?>
                </li>
            </ul>
            <br />
            <span class="small grey">Último login: <?= date('d/m/Y H:i', strtotime($this->Session->read('Auth.User.login'))); ?></span>
        </div>
    </div>
    <div class="clear">
    </div>
</div>
<?php endif; ?>