<?php

/* KddeEdbBundle:Search:result.html.twig */
class __TwigTemplate_0ef47c5173423bfbdb123f33ff94013f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo " EDB Search Result Page
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "
<div class=\"marketing\">
\t<h2>Search Results</h2>
\t<h3>Got ";
        // line 11
        echo twig_escape_filter($this->env, $this->getContext($context, "count"), "html", null, true);
        echo " Inscription";
        if (($this->getContext($context, "count") > 0)) {
            echo "s";
        }
        echo "</h3>
\t<br>
</div>
<div class=\"row\">
\t<div class=\"offset2 table-striped\">
\t";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "pagination"));
        foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
            // line 17
            echo "\t\t";
            // line 18
            echo "\t\t<div class=\"\">
\t\t\t<div class=\"row\">
\t\t\t\t<h3>Epigraph EDB";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "id"), "html", null, true);
            echo "</h3>
\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t\t<table class=\"table table-striped table-condensed\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><strong>Volume ICVR:</strong> <em>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "e"), "icvr"), "volume"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>Principal Number:</strong> <em>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "principalProgNumber"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>Sub Number:</strong> <em>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "subNumeration"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><strong>Reference Literature</strong></td>
\t\t\t\t\t\t<td><em>";
            // line 31
            echo twig_escape_filter($this->env, twig_join_filter($this->getAttribute($this->getContext($context, "e"), "literatures"), ", "), "html", null, true);
            echo "</em></td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr class=\"warning\">
\t\t\t\t\t\t<td><strong>Pertinence</strong></td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><strong>Area:</strong> <em>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "e"), "pertinence"), "pertinenceArea"), "description"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>Context:</strong> <em>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "e"), "pertinence"), "context"), "description"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>In Situ:</strong> 
\t\t\t\t\t\t\t<em>
\t\t\t\t\t\t\t";
            // line 44
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "e"), "pertinence"), "inSitu") == true)) {
                // line 45
                echo "\t\t\t\t\t\t\t\t<i class=\"icon-ok\"></i>
\t\t\t\t\t\t\t";
            } else {
                // line 47
                echo "\t\t\t\t\t\t\t\t<i class=\"icon-remove\"></i>
\t\t\t\t\t\t\t";
            }
            // line 49
            echo "\t\t\t\t\t\t\t</em> 
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr class=\"warning\">
\t\t\t\t\t\t<td><strong>Conservation</strong></td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t<td><strong>Lost:</strong> 
\t\t\t\t\t\t\t\t<em>
\t\t\t\t\t\t\t\t";
            // line 57
            if (($this->getAttribute($this->getContext($context, "e"), "lost") == true)) {
                // line 58
                echo "\t\t\t\t\t\t\t\t\t<i class=\"icon-ok\"></i>
\t\t\t\t\t\t\t\t";
            } else {
                // line 60
                echo "\t\t\t\t\t\t\t\t\t<i class=\"icon-remove\"></i>
\t\t\t\t\t\t\t\t";
            }
            // line 62
            echo "\t\t\t\t\t\t\t\t</em> 
\t\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t";
            // line 65
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "e"), "conservations"));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 66
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t\t<td><strong>Context:</strong> <em>";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "c"), "conservationContext"), "description"), "html", null, true);
                echo " </em></td>
\t\t\t\t\t\t\t<td></td>
\t\t\t
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 73
            echo "\t\t\t\t\t<tr class=\"warning\">
\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><strong>Support:</strong> <em>";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "e"), "material"), "support"), "description"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>Technique:</strong> <em>";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "e"), "material"), "technique"), "description"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td></td>\t
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><strong>Metrical Text:</strong> <em>";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "metricText"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>Divergent Text:</strong> <em>";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "divergentText"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>Function:</strong> <em>";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "e"), "funzione"), "description"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><strong>Dating:</strong></td>\t
\t\t\t\t\t\t";
            // line 90
            if (($this->getAttribute($this->getContext($context, "e"), "data") != null)) {
                // line 91
                echo "\t\t\t\t\t\t\t<td><strong>from</strong> <em>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "e"), "data"), "from"), "html", null, true);
                echo " </em></td>
\t\t\t\t\t\t\t<td><strong>to</strong> <em>";
                // line 92
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "e"), "data"), "to"), "html", null, true);
                echo " </em></td>\t
\t\t\t\t\t\t";
            } else {
                // line 94
                echo "\t\t\t\t\t\t\t<td><strong>from</strong> <em> n.d. </em></td>
\t\t\t\t\t\t\t<td> <strong>to</strong> <em> n.d. </em></td>
\t\t\t\t\t\t";
            }
            // line 97
            echo "\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><strong>Compilation Date:</strong> <em>";
            // line 99
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "dataScheda"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t";
            // line 100
            if (($this->getAttribute($this->getContext($context, "e"), "compilator") != null)) {
                // line 101
                echo "\t\t\t\t\t\t\t<td><strong>Compilator:</strong> <em>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "e"), "compilator"), "firstname"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "e"), "compilator"), "lastname"), "html", null, true);
                echo " </em></td>
\t\t\t\t\t\t";
            } elseif (($this->getAttribute($this->getContext($context, "e"), "oldCompilator") != null)) {
                // line 103
                echo "\t\t\t\t\t\t\t<td><strong>Compilator:</strong> <em>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "oldCompilator"), "html", null, true);
                echo " </em></td>
\t\t\t\t\t\t";
            }
            // line 104
            echo "\t\t\t\t\t\t
\t\t\t\t\t\t<td><a href=\"http://pcas.xdams.net/pcas-web/scheda/fotografico/ICVR/";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "id"), "html", null, true);
            echo "/scheda.html\" onclick=\"window.open(this.href);return false;\">Link PCAS</a></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td colspan=\"3\">
\t\t\t\t\t\t\t<div class=\"hero-unit\">
\t\t\t\t\t\t\t\t<p class=\"lead\" id=\"cardo\">";
            // line 110
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "trascription"), "html", null, true);
            echo "</p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr class=\"error\">
\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t</tr>
\t\t\t\t</table>
\t\t\t</div>
\t\t</div>
\t\t<hr>
\t\t";
            // line 124
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 125
        echo "\t<div class=\"pagination offset2\">
\t\t<ul>
    \t\t";
        // line 127
        echo $this->getAttribute($this->getContext($context, "pagination"), "render", array(), "method");
        echo "
    \t</ul>
\t</div>
 </div>
</div>\t\t
";
    }

    public function getTemplateName()
    {
        return "KddeEdbBundle:Search:result.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  276 => 127,  272 => 125,  266 => 124,  250 => 110,  242 => 105,  239 => 104,  233 => 103,  225 => 101,  223 => 100,  219 => 99,  215 => 97,  210 => 94,  205 => 92,  200 => 91,  198 => 90,  191 => 86,  187 => 85,  183 => 84,  176 => 80,  172 => 79,  164 => 73,  153 => 68,  149 => 66,  145 => 65,  140 => 62,  136 => 60,  132 => 58,  130 => 57,  120 => 49,  116 => 47,  112 => 45,  110 => 44,  104 => 41,  100 => 40,  88 => 31,  81 => 27,  77 => 26,  73 => 25,  65 => 20,  61 => 18,  59 => 17,  55 => 16,  43 => 11,  38 => 8,  35 => 7,  30 => 4,  27 => 3,);
    }
}
