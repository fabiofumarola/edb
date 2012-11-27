<?php

/* KddeEdbBundle:Literature:modalLiteratures.html.twig */
class __TwigTemplate_84eb9118553a7c69c64cf92191df00f4 extends Twig_Template
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
        echo "<div class=\"modal hide\" id=\"viewLiteratureModal\">
\t<div class=\"modal-header\">
\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">x</button>
\t\t<h3>Literature</h3>
\t</div>
\t<div class=\"modal-body\">
\t\t<p>
\t\t<table id=\"tableLiterature\" class=\"table table-condensed table-bordered\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th class=\"span3\">Code</th>
\t\t\t\t\t<th class=\"span7\">Description</th>
\t\t\t\t\t<th class=\"span1\">Add</th>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "literatures"));
        foreach ($context['_seq'] as $context["_key"] => $context["lit"]) {
            // line 18
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td> ";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "lit"), "id"), "html", null, true);
            echo "</td>\t
\t\t\t\t\t\t<td> ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "lit"), "description"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td><button type=\"button\" class=\"btn\" onclick=\"addToLiterature('";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "lit"), "id"), "html", null, true);
            echo "')\">add</button></td>\t\t\t\t
\t\t\t\t\t</tr>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lit'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 24
        echo "\t\t\t</tbody>
\t\t</table>
\t\t
\t</div>
\t<div class=\"modal-footer\">
\t\t<a href=\"#\" class=\"btn\" data-dismiss=\"modal\">Close</a>
\t</div>
</div>";
    }

    public function getTemplateName()
    {
        return "KddeEdbBundle:Literature:modalLiteratures.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 13,  36 => 1,  100 => 42,  228 => 101,  217 => 95,  203 => 92,  201 => 91,  197 => 90,  183 => 83,  169 => 77,  154 => 71,  150 => 70,  118 => 53,  114 => 51,  662 => 486,  658 => 485,  653 => 483,  650 => 482,  647 => 481,  633 => 470,  584 => 423,  573 => 421,  569 => 420,  423 => 285,  419 => 284,  399 => 266,  384 => 263,  375 => 256,  364 => 254,  360 => 253,  315 => 210,  304 => 208,  300 => 207,  292 => 201,  281 => 199,  277 => 198,  138 => 61,  76 => 30,  68 => 14,  66 => 29,  56 => 24,  45 => 14,  21 => 4,  450 => 215,  446 => 214,  442 => 213,  438 => 212,  434 => 287,  430 => 210,  426 => 209,  422 => 208,  418 => 207,  414 => 206,  410 => 205,  406 => 204,  402 => 203,  398 => 202,  393 => 201,  388 => 264,  385 => 198,  380 => 166,  374 => 24,  370 => 23,  365 => 22,  362 => 21,  356 => 6,  349 => 31,  345 => 30,  341 => 29,  337 => 28,  333 => 27,  329 => 25,  327 => 21,  309 => 6,  303 => 4,  297 => 217,  295 => 198,  271 => 176,  265 => 173,  262 => 172,  260 => 171,  254 => 167,  252 => 166,  220 => 96,  214 => 133,  210 => 131,  208 => 130,  199 => 126,  182 => 114,  170 => 93,  168 => 109,  110 => 49,  98 => 40,  85 => 22,  209 => 84,  205 => 129,  196 => 79,  192 => 78,  189 => 77,  178 => 82,  176 => 81,  165 => 76,  161 => 75,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 49,  127 => 57,  123 => 56,  109 => 39,  93 => 40,  90 => 36,  54 => 6,  133 => 44,  124 => 41,  111 => 37,  80 => 31,  60 => 25,  52 => 5,  97 => 34,  95 => 21,  88 => 23,  78 => 33,  71 => 28,  25 => 4,  72 => 15,  64 => 24,  53 => 19,  34 => 4,  92 => 38,  86 => 35,  79 => 60,  19 => 2,  42 => 19,  40 => 10,  29 => 5,  26 => 15,  224 => 96,  215 => 90,  211 => 94,  204 => 84,  200 => 83,  195 => 124,  193 => 88,  190 => 78,  188 => 85,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 104,  156 => 60,  153 => 102,  146 => 55,  142 => 64,  137 => 92,  126 => 84,  120 => 39,  117 => 44,  103 => 72,  74 => 29,  47 => 19,  32 => 6,  24 => 3,  22 => 9,  23 => 3,  17 => 1,  69 => 56,  63 => 26,  58 => 9,  49 => 17,  43 => 45,  37 => 9,  20 => 1,  139 => 26,  131 => 59,  128 => 43,  125 => 42,  121 => 82,  115 => 78,  107 => 36,  99 => 34,  96 => 41,  91 => 66,  82 => 35,  77 => 17,  75 => 24,  57 => 15,  50 => 21,  46 => 20,  44 => 11,  39 => 18,  33 => 7,  30 => 4,  27 => 3,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 46,  108 => 48,  104 => 43,  102 => 37,  94 => 38,  89 => 38,  87 => 32,  84 => 34,  81 => 26,  73 => 36,  70 => 30,  67 => 27,  62 => 12,  59 => 24,  55 => 18,  51 => 16,  48 => 17,  41 => 12,  38 => 8,  35 => 17,  31 => 3,  28 => 3,);
    }
}
