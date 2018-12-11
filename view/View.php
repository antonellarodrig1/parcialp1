<?php



class View extends TwigView {

    public function show($nom, $array= []) {

        echo self::getTwig()->render($nom.'.html.twig', array('array'=>$array));


    }

}
