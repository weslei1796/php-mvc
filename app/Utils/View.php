<?php

namespace App\Utils;

/**
 * Classe responsável por gerênciar as views da aplicação.
 * Nesta classe teremos os métodos responsáveis por renderizar as views.
 */
class View {
    
    /**
     * Método responsável por retornar o conteúdo de uma view
     * @param string
     * @return string
     */
    private static function getContentView($view) {
        $file = __DIR__.'/../../resources/view/'.$view.'.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    /**
     * Método responsável por retornar o conteúdo renderizado de uma view
     * @param string
     * @return string
     */
    public static function render($view) {
    
        // conteúdo da view
        $contentView = self::getContentView($view);
        return $contentView;
    }

}