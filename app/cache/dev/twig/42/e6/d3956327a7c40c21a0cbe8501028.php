<?php

/* KddeEdbBundle:Paleography:modalNewPaleography.html.twig */
class __TwigTemplate_42e6d3956327a7c40c21a0cbe8501028 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"modal hide\" id=\"modalNewPaleography\">
\t<div class=\"modal-header\">
\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">x</button>
\t\t<h3>Add New Paleography</h3>
\t</div>
\t<div class=\"modal-body\">
\t\t<p>
\t\t\t<form class=\"form-horizontal\">
\t\t\t\t<fieldset>
\t\t\t\t\t<div id=\"divPaleographyId\" class=\"control-group\">
\t\t\t\t\t\t<label style=\"text-align: left\" class=\"control-label\">Id</label> 
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input id=\"inputPaleographyId\" type=\"text\" 
\t\t\t\t\t\t\t\tonchange=\"\$('#divPaleographyId').attr('class', 'control-group'); \$('#errorValPaleographyId').html(null)\">
\t\t\t\t\t\t\t<p class=\"help-block\" id=\"errorValPaleographyId\"></p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"divPaleographyDesc\" class=\"control-group\">
\t\t\t\t\t\t<label style=\"text-align: left\" class=\"control-label\">Description</label> 
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input id=\"inputPaleographyDescription\" type=\"text\" 
\t\t\t\t\t\t\t\tonchange=\"\$('#divPaleographyDesc').attr('class', 'control-group'); \$('#errorValPaleographyDesc').html(null)\">
\t\t\t\t\t\t\t<p class=\"help-block\" id=\"errorValPaleographyDesc\"></p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"control-group\">
\t      \t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<a class=\"btn btn-primary\" id=\"addPaleography\">Add</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</fieldset>
\t\t\t</form>
\t\t</p>
\t\t
\t</div>
\t
\t<div class=\"modal-footer\">
\t\t<a href=\"#\" class=\"btn\" data-dismiss=\"modal\">Close</a>
\t</div>
\t
</div>";
    }

    public function getTemplateName()
    {
        return "KddeEdbBundle:Paleography:modalNewPaleography.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  21 => 4,  26 => 8,  59 => 24,  42 => 19,  39 => 18,  35 => 17,  17 => 1,  633 => 464,  629 => 463,  624 => 461,  621 => 460,  618 => 459,  604 => 448,  555 => 401,  544 => 399,  540 => 398,  405 => 265,  394 => 263,  390 => 262,  370 => 244,  359 => 242,  355 => 241,  346 => 234,  335 => 232,  331 => 231,  286 => 188,  275 => 186,  271 => 185,  263 => 179,  252 => 177,  248 => 176,  150 => 80,  118 => 48,  107 => 46,  103 => 45,  90 => 35,  84 => 34,  74 => 26,  72 => 25,  70 => 24,  68 => 23,  66 => 22,  64 => 21,  62 => 20,  60 => 19,  58 => 18,  56 => 17,  54 => 16,  52 => 15,  50 => 32,  48 => 13,  46 => 20,  44 => 11,  41 => 10,  38 => 9,  33 => 6,  30 => 5,  25 => 3,);
    }
}
