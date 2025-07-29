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
     * @param string $view
     * @param array  $vars (string/numeric)
     * @return string
     */
    public static function render($view, $vars = []) {
    
        // conteúdo da view
        $contentView = self::getContentView($view);

        // chaves do array de váriaveis
        $keys = array_keys($vars);
        $keys = array_map(function($item){
            return '{{' .$item. '}}';
        }, $keys);

        return str_replace($keys, array_values($vars), $contentView);
    }

}