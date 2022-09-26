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
    const TinhThanhClass = "TinhThanhClass";
    const QuanHuyenClass = "QuanHuyenClass";
    const PhuongXaClass = "PhuongXaClass";

    public $element;


    public static function GetValue($value, $name, $formData)
    {
        if ($value == null) {
            return $formData[$name] ?? "";
        }
        return $value;
    }
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
    static public function ToolTipElement($var, $placement = "top")
    {
?>
        <i class="fa fa-info" <?php echo self::ToolTip($var, $placement); ?> aria-hidden="true"></i>
    <?php
    }

    public static function HuongDan($id, $title = "Hướng dẫn")
    {
    ?>
        <a class="btn btn-primary" target="_self" data-toggle="modal" href='#huongdan<?php echo $id; ?>'>
            <i class="fa fa-info" aria-hidden="true"></i>
            &nbsp;<?php echo $title ?>
        </a>
        <div class="modal fade" id="huongdan<?php echo $id; ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">
                            <i class="fa fa-info"></i>&nbsp;
                            <?php
                            echo $title
                            ?>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        $path = "public\huongdan\\{$id}.html";
                        if (file_exists($path))
                            echo file_get_contents($path);
                        ?>
                    </div>
                    <div class="modal-footer">
                        <a href="/huongdan/put/<?php echo $id; ?>/" class="btn btn-success">Sửa File hướng dẫn</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát/Đóng lại</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }

    public function renderHTML($tooltip = "", $placement = "top")
    {
        $label = $this->element->getLabel();
        $attrStr =  $this->element->getAttributes();
        $required = "";
        if (strpos($attrStr, FormRender::Required) > 0) {
            $required = "(*)";
        }
        if ($tooltip != "") {
        ?>
            <i class="fa fa-info" <?php echo self::ToolTip("$tooltip", $placement); ?> aria-hidden="true"></i>
<?php
        }
        // data-toggle="tooltip" data-placement="top"

        $htmlTemplate = <<<HTML
                <div class="form-group">
                    <label >$label <span style="color:red" >$required</span>
                                    $tooltip
                    </label>
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
