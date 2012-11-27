<?php

/* KddeEdbBundle:ConservationLocation:modalNewConservationLocation.html.twig */
class __TwigTemplate_cf519a52553627ce839a3a37d85de0ca extends Twig_Template
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
        echo "<div class=\"modal hide\" id=\"modalNewConservationLocation\">
\t<div class=\"modal-header\">
\t\t";
        // line 4
        echo "\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">x</button>
\t\t<h3>Add New Conservation Location</h3>
\t</div>
\t<div class=\"modal-body\">
\t\t<p>
\t\t\t<form class=\"form-horizontal\">
\t\t\t\t<fieldset>
\t\t\t\t\t<div id=\"divConservationLocation\" class=\"control-group\">
\t\t\t\t\t\t<label style=\"text-align: left\" class=\"control-label\">Description</label> 
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input id=\"inputConservationLocationDescription\" type=\"text\" 
\t\t\t\t\t\t\t\tonchange=\"\$('#divConservationLocation').attr('class', 'control-group'); \$('#errorValConservationLocation').html(null)\">
\t\t\t\t\t\t\t<p class=\"help-block\" id=\"#errorValConservationLocation\"></p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"control-group\">
\t      \t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<a class=\"btn btn-primary\" id=\"addConservationLocation\">Add</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</fieldset>
\t\t\t</form>
\t\t</p>
\t\t
\t</div>
\t
\t<div class=\"modal-footer\">
\t\t";
        // line 32
        echo "\t\t<a href=\"#\" class=\"btn\" data-dismiss=\"modal\">Close</a>
\t</div>
\t
</div>";
    }

    public function getTemplateName()
    {
        return "KddeEdbBundle:ConservationLocation:modalNewConservationLocation.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  21 => 4,  450 => 215,  446 => 214,  442 => 213,  438 => 212,  434 => 211,  430 => 210,  426 => 209,  422 => 208,  418 => 207,  414 => 206,  410 => 205,  406 => 204,  402 => 203,  398 => 202,  393 => 201,  388 => 199,  385 => 198,  380 => 166,  374 => 24,  370 => 23,  365 => 22,  362 => 21,  356 => 6,  349 => 31,  345 => 30,  341 => 29,  337 => 28,  333 => 27,  329 => 25,  327 => 21,  309 => 6,  303 => 4,  297 => 217,  295 => 198,  271 => 176,  265 => 173,  262 => 172,  260 => 171,  254 => 167,  252 => 166,  220 => 136,  214 => 133,  210 => 131,  208 => 130,  199 => 126,  182 => 114,  170 => 110,  168 => 109,  110 => 76,  98 => 70,  85 => 63,  209 => 84,  205 => 129,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 112,  165 => 108,  161 => 61,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 39,  93 => 67,  90 => 32,  54 => 50,  133 => 44,  124 => 41,  111 => 37,  80 => 26,  60 => 16,  52 => 12,  97 => 34,  95 => 21,  88 => 29,  78 => 25,  71 => 14,  25 => 4,  72 => 16,  64 => 54,  53 => 13,  34 => 5,  92 => 20,  86 => 28,  79 => 60,  19 => 2,  42 => 10,  40 => 10,  29 => 33,  26 => 3,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 124,  193 => 123,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 104,  156 => 60,  153 => 102,  146 => 55,  142 => 94,  137 => 92,  126 => 84,  120 => 39,  117 => 44,  103 => 72,  74 => 58,  47 => 19,  32 => 6,  24 => 3,  22 => 1,  23 => 3,  17 => 1,  69 => 56,  63 => 20,  58 => 9,  49 => 48,  43 => 45,  37 => 9,  20 => 2,  139 => 26,  131 => 48,  128 => 43,  125 => 42,  121 => 82,  115 => 78,  107 => 36,  99 => 34,  96 => 34,  91 => 66,  82 => 27,  77 => 25,  75 => 24,  57 => 15,  50 => 32,  46 => 10,  44 => 11,  39 => 9,  33 => 7,  30 => 4,  27 => 3,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 77,  108 => 40,  104 => 24,  102 => 37,  94 => 33,  89 => 20,  87 => 32,  84 => 28,  81 => 26,  73 => 21,  70 => 26,  67 => 21,  62 => 24,  59 => 52,  55 => 18,  51 => 13,  48 => 10,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
