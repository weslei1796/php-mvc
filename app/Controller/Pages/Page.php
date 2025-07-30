<?php 

namespace App\Controller\Pages;

use \App\Utils\View;

class Page {

    /**
     * Método responsável por retornar o conteúdo da página genérica da aplicação
     * Faz a substituição das váriaveis no template padrão (page.html)
     * @return string
    */
    public static function getPage($title, $content) {

        return View::render('pages/page', [
            'title'   => $title,
            'content' => $content
        ]);
    }
}