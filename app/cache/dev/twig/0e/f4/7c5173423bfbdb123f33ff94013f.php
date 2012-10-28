<?php

/* KddeEdbBundle:Search:result.html.twig */
class __TwigTemplate_0ef47c5173423bfbdb123f33ff94013f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
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
    public function block_header($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $this->displayParentBlock("header", $context, $blocks);
        echo "
\t
\t<!-- google maps v3 -->
\t<meta name=\"viewport\" content=\"initial-scale=1.0, user-scalable=no\" />
\t<style type=\"text/css\">
  \t\t#map_canvas { width:550px;height: 300px; margin-right: auto ;margin-left: auto ; }
\t</style>
\t<script type=\"text/javascript\" src=\"http://maps.googleapis.com/maps/api/js?sensor=true\" ></script>
";
    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
        // line 15
        echo " EDB Search Result Page
";
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        // line 19
        echo "
";
        // line 20
        $this->env->loadTemplate("KddeEdbBundle:GeoPosition:modalViewGeoPosition.html.twig")->display($context);
        // line 21
        echo "
<div class=\"marketing\">
\t<h2>Search Results</h2>
\t<h3>Got ";
        // line 24
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
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "pagination"));
        foreach ($context['_seq'] as $context["_key"] => $context["e"]) {
            // line 30
            echo "\t\t";
            // line 31
            echo "\t\t<div class=\"\">
\t\t\t<div class=\"row\">
\t\t\t\t<h3>Epigraph EDB";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "id"), "html", null, true);
            echo "</h3>
\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t\t<table class=\"table table-striped table-condensed\">
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><strong>Volume ICVR:</strong> <em>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "e"), "icvr"), "volume"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>Principal Number:</strong> <em>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "principalProgNumber"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>Sub Number:</strong> <em>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "subNumeration"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><strong>Reference Literature</strong></td>
\t\t\t\t\t\t<td><em>";
            // line 44
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
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "e"), "pertinence"), "pertinenceArea"), "description"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>Context:</strong> <em>";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "e"), "pertinence"), "context"), "description"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>In Situ:</strong> 
\t\t\t\t\t\t\t<em>
\t\t\t\t\t\t\t";
            // line 57
            if (($this->getAttribute($this->getAttribute($this->getContext($context, "e"), "pertinence"), "inSitu") == true)) {
                // line 58
                echo "\t\t\t\t\t\t\t\t<i class=\"icon-ok\"></i>
\t\t\t\t\t\t\t";
            } else {
                // line 60
                echo "\t\t\t\t\t\t\t\t<i class=\"icon-remove\"></i>
\t\t\t\t\t\t\t";
            }
            // line 62
            echo "\t\t\t\t\t\t\t</em> 
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr >
\t\t\t\t\t\t<td class=\"vertical-middle\" ><strong>Geographic position:</strong> <em><span id=\"fld_geoPosition_";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "id"), "html", null, true);
            echo "\" >";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "geoPosition"), "html", null, true);
            echo "</span></em></td>
\t\t\t\t\t\t<td><a name=\"viewGeoPosition\" value=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "id"), "html", null, true);
            echo "\" class=\"btn\" title=\"View geographic position on map\" >Show Map</a></td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr class=\"warning\">
\t\t\t\t\t\t<td><strong>Conservation</strong></td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t<td><strong>Lost:</strong> 
\t\t\t\t\t\t\t\t<em>
\t\t\t\t\t\t\t\t";
            // line 75
            if (($this->getAttribute($this->getContext($context, "e"), "lost") == true)) {
                // line 76
                echo "\t\t\t\t\t\t\t\t\t<i class=\"icon-ok\"></i>
\t\t\t\t\t\t\t\t";
            } else {
                // line 78
                echo "\t\t\t\t\t\t\t\t\t<i class=\"icon-remove\"></i>
\t\t\t\t\t\t\t\t";
            }
            // line 80
            echo "\t\t\t\t\t\t\t\t</em> 
\t\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t";
            // line 83
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "e"), "conservations"));
            foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
                // line 84
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t\t<td><strong>Context:</strong> <em>";
                // line 86
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
            // line 91
            echo "\t\t\t\t\t<tr class=\"warning\">
\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t\t<td></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><strong>Support:</strong> <em>";
            // line 97
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "e"), "material"), "support"), "description"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>Technique:</strong> <em>";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getContext($context, "e"), "material"), "technique"), "description"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td></td>\t
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><strong>Metrical Text:</strong> <em>";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "metricText"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>Divergent Text:</strong> <em>";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "divergentText"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t<td><strong>Function:</strong> <em>";
            // line 104
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "e"), "funzione"), "description"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><strong>Dating:</strong></td>\t
\t\t\t\t\t\t";
            // line 108
            if (($this->getAttribute($this->getContext($context, "e"), "data") != null)) {
                // line 109
                echo "\t\t\t\t\t\t\t<td><strong>from</strong> <em>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "e"), "data"), "from"), "html", null, true);
                echo " </em></td>
\t\t\t\t\t\t\t<td><strong>to</strong> <em>";
                // line 110
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "e"), "data"), "to"), "html", null, true);
                echo " </em></td>\t
\t\t\t\t\t\t";
            } else {
                // line 112
                echo "\t\t\t\t\t\t\t<td><strong>from</strong> <em> n.d. </em></td>
\t\t\t\t\t\t\t<td> <strong>to</strong> <em> n.d. </em></td>
\t\t\t\t\t\t";
            }
            // line 115
            echo "\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><strong>Compilation Date:</strong> <em>";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "dataScheda"), "html", null, true);
            echo " </em></td>
\t\t\t\t\t\t";
            // line 118
            if (($this->getAttribute($this->getContext($context, "e"), "compilator") != null)) {
                // line 119
                echo "\t\t\t\t\t\t\t<td><strong>Compilator:</strong> <em>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "e"), "compilator"), "firstname"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "e"), "compilator"), "lastname"), "html", null, true);
                echo " </em></td>
\t\t\t\t\t\t";
            } elseif (($this->getAttribute($this->getContext($context, "e"), "oldCompilator") != null)) {
                // line 121
                echo "\t\t\t\t\t\t\t<td><strong>Compilator:</strong> <em>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "oldCompilator"), "html", null, true);
                echo " </em></td>
\t\t\t\t\t\t";
            }
            // line 122
            echo "\t\t\t\t\t\t
\t\t\t\t\t\t<td><a href=\"http://pcas.xdams.net/pcas-web/scheda/fotografico/ICVR/";
            // line 123
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "e"), "id"), "html", null, true);
            echo "/scheda.html\" onclick=\"window.open(this.href);return false;\">Link PCAS</a></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td colspan=\"3\">
\t\t\t\t\t\t\t<div class=\"hero-unit\">
\t\t\t\t\t\t\t\t<p class=\"lead\" id=\"cardo\">";
            // line 128
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
            // line 142
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['e'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 143
        echo "\t<div class=\"pagination offset2\">
\t\t<ul>
    \t\t";
        // line 145
        echo $this->getAttribute($this->getContext($context, "pagination"), "render", array(), "method");
        echo "
    \t</ul>
\t</div>
 </div>
</div>\t\t
";
    }

    // line 151
    public function block_javascripts($context, array $blocks = array())
    {
        // line 152
        echo "\t
\t\t";
        // line 153
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t\t
\t\t <script src=\"";
        // line 155
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/basic-result.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
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
        return array (  334 => 155,  329 => 153,  326 => 152,  323 => 151,  313 => 145,  309 => 143,  303 => 142,  287 => 128,  279 => 123,  276 => 122,  270 => 121,  262 => 119,  260 => 118,  256 => 117,  252 => 115,  247 => 112,  242 => 110,  237 => 109,  235 => 108,  228 => 104,  224 => 103,  220 => 102,  213 => 98,  209 => 97,  201 => 91,  190 => 86,  186 => 84,  182 => 83,  177 => 80,  173 => 78,  169 => 76,  167 => 75,  156 => 67,  150 => 66,  144 => 62,  140 => 60,  136 => 58,  134 => 57,  128 => 54,  124 => 53,  112 => 44,  105 => 40,  101 => 39,  97 => 38,  89 => 33,  85 => 31,  83 => 30,  79 => 29,  67 => 24,  62 => 21,  60 => 20,  57 => 19,  54 => 18,  49 => 15,  46 => 14,  32 => 4,  29 => 3,);
    }
}
