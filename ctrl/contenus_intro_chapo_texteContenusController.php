<?php
/**
 * contenus_intro_chapo_texteContenusController : gestion de contenus
 *
 * @package 
 * @version $id$
 * @copyright 
 * @author Pierre-Alexis <pa@quai13.com> 
 * @license 
 */
class contenus_intro_chapo_texteContenusController extends contenus_intro_chapo_texteContenusController_Parent
{

    /**
     * editcontenuAction : formulaire d'edition de contenu : charge les javascript supplementaires
     * 
     * @access public
     * @return void
     */
    function editcontenuAction ($request)
    {
        // recupere le contenu du script a injecter dans le footer
        $script = $this->getBlockHtml('contenus/jquery_intro_chapo_texte_replace');
        // charge les javascripts necessaires
        if (Clementine::$config['module_jstools']['use_google_cdn']) {
            $this->getModel('cssjs')->register_js('jquery', array('src' => 'https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'));
        } else {
            $this->getModel('cssjs')->register_js('jquery', array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/jquery/jquery.min.js'));
        }
        $this->getModel('cssjs')->register_js('ckeditor', array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/js/ckeditor/ckeditor.js'));
        $this->getModel('cssjs')->register_js('jquery.ckeditor', array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/js/ckeditor/adapters/jquery.js'));
        // javascript de configuration de ckeditor
        $this->getModel('cssjs')->register_foot('jquery.ckeditor.replace', $script);
        // execute le controleur normal
        return parent::editcontenuAction($request);
    }

    /**
    * Function : valid_clementine_cms_contenu_html_intro_chapo_texteAction() 
    * 
    */
    function valid_clementine_cms_contenu_html_intro_chapo_texteAction($request) 
    {
        if ($this->getModel('users')->needPrivilege('manage_contents')) {
            $ns = $this->getModel('fonctions');
            if (!empty($_POST)) {
                $type_content  = 'clementine_cms_contenu_html_intro_chapo_texte';
                $id            = $ns->ifPost('int', 'id');
                $id_zone       = $ns->ifPost('int', 'id_zone');
                $id_page       = $ns->ifPost('int', 'id_page');
                $nom           = $ns->ifPost('html', 'nom');
                $contenu_html = $ns->ifPost('html', 'contenu_html');
                $contenu_html_chapo = $ns->ifPost('html', 'contenu_html_chapo');
                $contenu_html_intro_chapo_texte = $ns->ifPost('html', 'contenu_html_intro_chapo_texte');
                $contenus = $this->getModel('contenus');
                // ajoute le contenu s'il n'existe pas deja
                $request = $this->getRequest();
                $lang = $request['LANG'];
                if (!$id) {
                    $id = $contenus->addContenu($nom, $type_content, $id_zone, $id_page, $lang);
                }
                if ($this->set_contenu_defaut($id)) {
                    $contenus->updateContenuIntroChapoTexte($id, $contenu_html, $contenu_html_chapo, $contenu_html_intro_chapo_texte, $lang);
                }
            }
            if ($id_page) {
                $ns->redirect(__WWW__ . '/cms/editpage?id=' . $id_page);
            } else {
                $ns->redirect(__WWW__ . '/cms');
            }
        } else {
            $this->getModel('fonctions')->redirect(__WWW__);
        }
    }
}
?>
