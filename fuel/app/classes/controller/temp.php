<?php

class Controller_Temp extends \Controller {
    
    public function action_index()
    {
        
        $arbo = Arborescence_Arbre::forge();
        $this->ordonne($arbo);
        exit;
        
    }
    
    private function ordonne($branche)
    {
        $i = 1;
        echo '<ul>';
        foreach($branche->getChildren() as $sousbranche)
        {
            echo '<li>';
            echo $i.' -> '.$sousbranche->getTitle();
            $sousbranche->model->position = $i++;
            $sousbranche->model->save();
            $this->ordonne($sousbranche);
            echo '</li>';
        }
        echo '</ul>';
    }
    
}