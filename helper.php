<?php
/*
 * @package         mod_horaexata
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GNU General Public License version 3. See license.txt
 */
// no direct access
defined('_JEXEC') or die;


class HoraExata {
    
    
    /*
     *  Variavel que contem o valor bruto da hora
     * 
     * @var         string
     */
    private $raw;
    
    
    
    /*
     * 
     * 
     */
    public function getHora()
    {
        $pagina = $this->_getUrlContents('http://pcdsh01.on.br/HoraLegalBrasileira.asp');
        //$regex = "'<title>(.*?)</title>'si"; //Regex de exemplo, como retornar titulo
        $regex = "'66>\<B\>(.*?)\</B\>'si"; //Se mudarem o HTML da pagina resultante, atualizar aqui
        preg_match_all( $regex, $pagina, $match );
        
        $this->raw = $match[1][0];
        
        return $this->raw;
    }
    

    /*
     * Return contents of url
     * @author      Emerson Rocha Luiz
     * @var         string      $url
     * @var         string      $certificate path to certificate if is https URL
     * @return      string
     */
    protected function _getUrlContents($url, $certificate = FALSE){            
        //$page = file_get_contents($url);            
        $ch = curl_init(); //Inicializar a sessao           
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//Retorne os dados em vez de imprimir em tela
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $certificate);//Check certificate if is SSL, default FALSE
        curl_setopt($ch, CURLOPT_URL, $url);//Setar URL
        $content = curl_exec($ch);//Execute
        curl_close($ch);//Feche          

        return $content;
    }
}
