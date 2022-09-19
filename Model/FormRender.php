<?php

namespace Model;

class FormRender
{
    const Required = "required";
    const Readonly = "readonly";
    const Disabled = "disabled";
    const Placeholder = "placeholder";
    const Autofocus = "autofocus";
    const Autocomplete = "autocomplete";

    public $element;

    function __construct($element)
    {
        $this->element = $element;
    }

    public function render()
    {
        return $this->element->render();
    }

    static public function ToolTip($var, $placement = "top")
    {
        return  'data-toggle="tooltip" data-placement="' . $placement . '" title="' . $var . '"';
    }
    public function renderHTML($tooltip = "")
    {
        $label = $this->element->getLabel();
        $attrStr =  $this->element->getAttributes();
        $required = "";
        if (strpos($attrStr, FormRender::Required) > 0) {
            $required = "(*)";
        }
        if ($tooltip != "") {
?>
            <i class="fa fa-info" <?php echo self::ToolTip("$tooltip"); ?> aria-hidden="true"></i>
<?php
        }
        // data-toggle="tooltip" data-placement="top"

        $htmlTemplate = <<<HTML
                <div class="form-group">
                                    <label >$label <span style="color:red" >$required</span></label>
HTML;
        echo $htmlTemplate;
        $this->element->render();
        echo "</div>";
    }

    public function renderHTMLIcon($icon)
    {
        $label = $this->element->getLabel();
        $attrStr =  $this->element->getAttributes();
        $required = "";
        if (strpos($attrStr, FormRender::Required) > 0) {
            $required = "(*)";
        }
        $htmlTemplate = <<<HTML
                <div class="form-group">
                <label >$label <span style="color:red" >$required</span> </label>
                
HTML;
        echo $htmlTemplate;
        $this->element->render();
        echo "</div>";
    }
}
