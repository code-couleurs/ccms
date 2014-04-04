<?php

return array(
    'cms_listeners'=>array(
        array('event'=>'blocs/before_save', 'callback'=>'\Pagebox\Controller_Pagebox::handle_save_bloc'),
        //array('event'=>'blocs/after_duplicate', 'callback'=>'\Pagebox\Controller_Pagebox::handle_duplicate_bloc')
    )
);