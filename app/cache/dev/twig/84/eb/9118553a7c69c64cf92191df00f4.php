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
        return array (  59 => 24,  42 => 19,  39 => 18,  35 => 17,  17 => 1,  633 => 464,  629 => 463,  624 => 461,  621 => 460,  618 => 459,  604 => 448,  555 => 401,  544 => 399,  540 => 398,  405 => 265,  394 => 263,  390 => 262,  370 => 244,  359 => 242,  355 => 241,  346 => 234,  335 => 232,  331 => 231,  286 => 188,  275 => 186,  271 => 185,  263 => 179,  252 => 177,  248 => 176,  150 => 80,  118 => 48,  107 => 46,  103 => 45,  90 => 35,  84 => 34,  74 => 26,  72 => 25,  70 => 24,  68 => 23,  66 => 22,  64 => 21,  62 => 20,  60 => 19,  58 => 18,  56 => 17,  54 => 16,  52 => 15,  50 => 21,  48 => 13,  46 => 20,  44 => 11,  41 => 10,  38 => 9,  33 => 6,  30 => 5,  25 => 3,);
    }
}
