<?php 

namespace App\Controller\Pages;

use \App\Utils\View;

class Home extends Page {

    /**
     * Método responsável por retornar o conteúdo (view) da home.
     * @return string
     */
    public static function getHome() {

        // retorna a view da view home
        $content = View::render('pages/home', [
            'name'          => 'Weslei Aurelio',
            'description'   => 'Descrição teste!'
        ]);

        // retorna a view da página (substituição das váriveis no template padrão)
        return parent::getPage('HOME | Weslei Aurelio', $content);
    }
}