<?php
/*
 * @package         mod_horaexata
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GNU General Public License version 3. See license.txt
 */
// no direct access
defined('_JEXEC') or die;
?>

<div class="horaexata<?php echo $moduleclass_sfx; ?>">
<?php 
echo $modbefore;
echo $he->getHora(); 
echo $modafter;
?>
</div>

