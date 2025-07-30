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
            'header'  => self::getHeader(),
            'content' => $content,
            'footer'  => self::getFooter() 
        ]);
    }

    /**
     * Método responsável por renderizer o conteudo do header da aplicação
     * @return string
     */
    private static function getHeader() {
        return View::render('pages/header');
    }

    /**
     * Método responsável por renderizar o conteudo do footer da aplicação
     * @return string
     */
    private static function getFooter() {
        return View::render('pages/footer');
    }
}