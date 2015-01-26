<?php 
/**
 * Menu con yii y estilos de bootstrap
 */
$this->widget('zii.widgets.CMenu', array(
	'encodeLabel' => false,
	'htmlOptions' => array(
	    'class'=>'nav nav-list',
	    'style'=> 'style="top: 0px;text-align: left;',
	  ),
	'submenuHtmlOptions' => array(
	    'class' => 'submenu nav-hide',
	    'style' => 'display: none;',
	),
    'items' => array(
        array(
            'label' => '<i class="menu-icon fa fa-bar-chart"></i>
						    <span class="menu-text">Graficas</span>
						    <b class="arrow fa fa-angle-down"></b>',
            'url' => '#',
            'linkOptions'=> array(
                'class' => 'dropdown-toggle',
                ),
            'itemOptions' => array('class'=>'hsub',),
            'items' => array(
                array(
                    'label' => '<i class="icon-user"></i> Clicks',
                    'url' => 'graph/clickouts'
                ),
                array(
                    'label' => '<i class="icon-calendar"></i> My Calendar',
                    'url' => '#',
                ),
                array(
                    'label' => '<i class="icon-tasks"></i> My Tasks</a>',
                    'url' => '#',
                ),
                array(
                    'label' => '',
                    array(
                        'class' => 'divider',
                    )
                ),
                array(
                    'label' => '<i class="icon-key"></i> Log Out',
                    'url' => array('site/logout'),
                ),
            )
        ),
    ),
));
?>