<?php

namespace Model;

class FormRender {

    const Required = "required";
    const Readonly = "readonly";
    const Disabled = "disabled";
    const Placeholder = "placeholder";
    const Autofocus = "autofocus";
    const Autocomplete = "autocomplete";

    public $element;

    function __construct($element) {
        $this->element = $element;
    }

    public function render() {
        return $this->element->render();
    }

    public function renderHTML() {
        $label = $this->element->getLabel();
        $htmlTemplate = <<<HTML
                <div class="form-group">
                                    <label >$label</label>
HTML;
        echo $htmlTemplate;
        $this->element->render();
        echo "</div>";
    }

    public function renderHTMLIcon($icon) {
        $label = $this->element->getLabel();
        $htmlTemplate = <<<HTML
                <div class="form-group">
                                    <label >$label</label>
                
HTML;
        echo $htmlTemplate;
        $this->element->render();
        echo "</div>";
    }

}
