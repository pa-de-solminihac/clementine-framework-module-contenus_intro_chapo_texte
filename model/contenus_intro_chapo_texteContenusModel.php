<?php
/**
 * contenus_intro_chapo_texteContenusModel : gestion de contenus
 *
 * @package 
 * @version $id$
 * @copyright 
 * @author Pierre-Alexis <pa@quai13.com> 
 * @license 
 */
class contenus_intro_chapo_texteContenusModel extends contenus_intro_chapo_texteContenusModel_Parent
{

    /**
     * updateContenuHtmlCkeditor : update le contenu $id de type "contenu_html"
     * 
     * @param mixed $id 
     * @param mixed $contenu_html 
     * @param mixed $contenu_html_chapo 
     * @param mixed $contenu_html_intro_chapo_texte 
     * @access public
     * @return void
     */
    public function updateContenuIntroChapoTexte ($id, $contenu_html, $contenu_html_chapo, $contenu_html_intro_chapo_texte, $lang)
    {
        $id = (int) $id; 
        if ($cms = $this->getModel('cms')) {
            $contenu_html = $cms->escape_content($contenu_html);
            $contenu_html_chapo = $cms->escape_content($contenu_html_chapo);
            $contenu_html_intro_chapo_texte = $cms->escape_content($contenu_html_intro_chapo_texte);
        }
        $db = $this->getModel('db');
        $sql  = "INSERT INTO " . $this->table_cms_contenu . "_html_intro_chapo_texte (
                    `id`,
                    `lang`,
                    `contenu_html`,
                    `contenu_html_chapo`,
                    `contenu_html_intro_chapo_texte`) 
                 VALUES (
                     '$id',
                     '$lang', 
                     '" . $db->escape_string($contenu_html) . "',
                     '" . $db->escape_string($contenu_html_chapo) . "', 
                     '" . $db->escape_string($contenu_html_intro_chapo_texte) . "') 
                 ON DUPLICATE KEY UPDATE 
                    `contenu_html` = '" . $db->escape_string($contenu_html) . "',
                    `contenu_html_chapo` = '" . $db->escape_string($contenu_html_chapo) . "',
                    `contenu_html_intro_chapo_texte` = '" . $db->escape_string($contenu_html_intro_chapo_texte) . "' "; 
        $stmt = $db->query($sql);
    }

}
?>
