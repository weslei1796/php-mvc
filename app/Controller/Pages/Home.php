<?php 

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page {

    /**
     * Método responsável por retornar o conteúdo (view) da home.
     * @return string
     */
    public static function getHome() {

        // Instânciando de Organização
        $organization = new Organization();

        // retorna a view da view home
        $content = View::render('pages/home', [
            'name'          => $organization->name,
            'description'   => $organization->description,
            'site'          => $organization->site 
        ]);

        // retorna a view da página (substituição das váriveis no template padrão)
        return parent::getPage('HOME | Weslei Aurelio', $content);
    }
}