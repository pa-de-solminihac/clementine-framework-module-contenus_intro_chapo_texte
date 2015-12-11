        <p class="form_content_edit_content_intro_chapo_texte">
            <label>Intro</label>
            <textarea class="form-control" name="contenu_html"><?php
if (isset($data['contenu_html'])) {
    echo $this->getModel('fonctions')->htmlentities($data['contenu_html']);
} else {
    if ($this->canGetBlock('contenus_intro_chapo_texte/default_contenu_html_intro')) {
        $this->getBlock('contenus_intro_chapo_texte/default_contenu_html_intro', $data);
    }
}
?></textarea>
        </p>

        <p class="form_content_edit_content_intro_chapo_texte">
            <label>Chapo</label>
            <textarea class="form-control editor" name="contenu_html_chapo"><?php
if (isset($data['contenu_html_chapo'])) {
    echo $this->getModel('fonctions')->htmlentities($data['contenu_html_chapo']);
} else {
    if ($this->canGetBlock('contenus_intro_chapo_texte/default_contenu_html_chapo')) {
        $this->getBlock('contenus_intro_chapo_texte/default_contenu_html_chapo', $data);
    }
}
?></textarea>
        </p>

        <p class="form_content_edit_content_intro_chapo_texte">
            <label>Texte</label>
            <textarea class="form-control editor" name="contenu_html_intro_chapo_texte"><?php
if (isset($data['contenu_html_intro_chapo_texte'])) {
    echo $this->getModel('fonctions')->htmlentities($data['contenu_html_intro_chapo_texte']);
} else {
    if ($this->canGetBlock('contenus_intro_chapo_texte/default_contenu_html_intro_chapo_texte')) {
        $this->getBlock('contenus_intro_chapo_texte/default_contenu_html_intro_chapo_texte', $data);
    }
}
?></textarea>
        </p>
