<?php

/* KddeEdbBundle:Technique:modalNewTechnique.html.twig */
class __TwigTemplate_c722ecc0b05c5f5fde56a18569f7ca0e extends Twig_Template
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
        echo "<div class=\"modal hide\" id=\"modalNewTechnique\">
\t<div class=\"modal-header\">
\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">x</button>
\t\t<h3>Add New Technique</h3>
\t</div>
\t<div class=\"modal-body\">
\t\t<p>
\t\t\t<form class=\"form-horizontal\">
\t\t\t\t<fieldset>
\t\t\t\t\t<div id=\"divTechniqueId\" class=\"control-group\">
\t\t\t\t\t\t<label style=\"text-align: left\" class=\"control-label\">Id</label> 
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input id=\"inputTechniqueId\" type=\"text\" 
\t\t\t\t\t\t\t\tonchange=\"\$('#divTechniqueId').attr('class', 'control-group'); \$('#errorValTechniqueId').html(null)\">
\t\t\t\t\t\t\t<p class=\"help-block\" id=\"errorValTechniqueId\"></p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div id=\"divTechniqueDesc\" class=\"control-group\">
\t\t\t\t\t\t<label style=\"text-align: left\" class=\"control-label\">Description</label> 
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input id=\"inputTechniqueDescription\" type=\"text\" 
\t\t\t\t\t\t\t\tonchange=\"\$('#divTechniqueDesc').attr('class', 'control-group'); \$('#errorValTechniqueDesc').html(null)\">
\t\t\t\t\t\t\t<p class=\"help-block\" id=\"errorValTechniqueDesc\"></p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"control-group\">
\t      \t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<a class=\"btn btn-primary\" id=\"addTechnique\">Add</a>
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
        return "KddeEdbBundle:Technique:modalNewTechnique.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  21 => 4,  26 => 8,  59 => 24,  42 => 19,  39 => 18,  35 => 17,  17 => 1,  631 => 462,  627 => 461,  622 => 459,  619 => 458,  616 => 457,  602 => 446,  553 => 399,  542 => 397,  538 => 396,  414 => 274,  403 => 272,  399 => 271,  370 => 244,  359 => 242,  355 => 241,  346 => 234,  335 => 232,  331 => 231,  286 => 188,  275 => 186,  271 => 185,  263 => 179,  252 => 177,  248 => 176,  150 => 80,  118 => 48,  107 => 46,  103 => 45,  90 => 35,  84 => 34,  74 => 26,  72 => 25,  70 => 24,  68 => 23,  66 => 22,  64 => 21,  62 => 20,  60 => 19,  58 => 18,  56 => 17,  54 => 16,  52 => 15,  50 => 32,  48 => 13,  46 => 20,  44 => 11,  41 => 10,  38 => 9,  33 => 6,  30 => 5,  25 => 3,);
    }
}
