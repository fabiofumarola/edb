<?php

/* KddeEdbBundle:Search:basic.html.twig */
class __TwigTemplate_b1e8f6114bec0c4a2078d692c0900107 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
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
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo " EDB Basic Search
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "
\t<div class=\"marketing\">
\t\t<h2>Basic Search</h2>
\t\t<br>
\t</div>
\t<div class=\"row\">
\t\t<div class=\"offset3 span8\">
\t\t\t<form class=\"form-horizontal\" action=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_search_basic_do"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo ">\t\t
\t\t\t
\t\t\t\t<fieldset>
\t\t\t\t      <div class=\"control-group\">
      \t\t\t\t\t<label  class=\"control-label required\" for=\"search_id\">ID EDB</label>
      \t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input type=\"text\" id=\"search_id\" name=\"search[id]\" class=\"span2\">
      \t\t\t\t\t</div>
      \t\t\t\t</div>
    \t\t\t\t<div class=\"control-group\">
      \t\t\t\t\t<label  class=\"control-label required\" for=\"search_icvr\">Volume ICVR</label>
      \t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t<select class=\"span2\" id=\"search_icvr\" name=\"search[icvr]\">
\t\t\t\t\t\t\t<option value=\"\"></option>
\t\t\t\t\t\t\t";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "icvrs"));
        foreach ($context['_seq'] as $context["_key"] => $context["icvr"]) {
            // line 30
            echo "\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "icvr"), "id"), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "icvr"), "volume"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['icvr'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 31
        echo "\t\t\t\t
\t\t\t\t\t\t</select>
      \t\t\t\t\t</div>
      \t\t\t\t</div>
      \t\t\t\t<div class=\"control-group\">
      \t\t\t\t\t<label  class=\"control-label required\" for=\"search_principalProgNumber\">ICVR Number</label>
      \t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t<input type=\"text\" id=\"search_principalProgNumber\" name=\"search[principalProgNumber]\" class=\"span2\">
      \t\t\t\t\t</div>
      \t\t\t\t</div>
      \t\t\t\t<hr>   
      \t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label required\" for=\"search_area\">Pertinence Area</label> 
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t<select id=\"search_area\"
\t\t\t\t\t\t\tclass=\"span2\" name=\"search[area]\">
\t\t\t\t\t\t\t<option></option>
\t\t\t\t\t\t</select>
      \t\t\t\t\t</div>
      \t\t\t\t</div>  \t
      \t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label required\" for=\"search_context\">Pertinence Context</label> 
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t<select id=\"search_context\"
\t\t\t\t\t\t\tclass=\"span2\" name=\"search[context]\">
\t\t\t\t\t\t\t<option></option>
\t\t\t\t\t\t</select>
      \t\t\t\t\t</div>
      \t\t\t\t</div> 
      \t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label required\" for=\"transcription\">Text</label>  
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t<textarea class=\"span5\"  rows=\"8\" name=\"search[transcription]\" id=\"transcription\"></textarea>
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<button id=\"greekToogle\" type=\"button\" class=\"btn\" data-toggle=\"button\">Click to write in Greek</button>
      \t\t\t\t\t</div>
      \t\t\t\t</div> 
\t\t\t\t\t<br>
      \t\t\t\t<div class=\"control-group\">
\t\t\t\t\t\t<label class=\"control-label required\" for=\"search_thesaurus\">Use Thesaurus</label>  
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t<input type=\"checkbox\" id=\"search_thesaurus\" name=\"search[thesaurus]\">
      \t\t\t\t\t</div>
      \t\t\t\t</div> \t\t\t
\t\t\t\t<hr>
\t\t\t\t";
        // line 76
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
        echo "
    \t\t\t<div class=\"control-group\">
    \t\t\t\t<div class=\"controls\">
\t\t\t\t      <button type=\"submit\" class=\"btn\">Submit</button>
\t\t\t\t    </div>
\t\t\t\t</div>
  \t\t\t\t</fieldset>
\t\t\t</form>
\t\t</div>
\t</div>
\t
";
    }

    // line 89
    public function block_javascripts($context, array $blocks = array())
    {
        // line 90
        echo "\t
\t\t";
        // line 91
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t\t
\t\t <script src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/basic-search.js"), "html", null, true);
        echo "\"></script>
\t\t <script src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/keyboard.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "KddeEdbBundle:Search:basic.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 94,  151 => 91,  61 => 19,  65 => 13,  36 => 7,  100 => 33,  228 => 101,  217 => 95,  203 => 92,  201 => 91,  197 => 90,  183 => 83,  169 => 77,  154 => 71,  150 => 70,  118 => 53,  114 => 51,  662 => 486,  658 => 485,  653 => 483,  650 => 482,  647 => 481,  633 => 470,  584 => 423,  573 => 421,  569 => 420,  423 => 285,  419 => 284,  399 => 266,  384 => 263,  375 => 256,  364 => 254,  360 => 253,  315 => 210,  304 => 208,  300 => 207,  292 => 201,  281 => 199,  277 => 198,  138 => 61,  76 => 31,  68 => 14,  66 => 28,  56 => 24,  45 => 14,  21 => 4,  450 => 215,  446 => 214,  442 => 213,  438 => 212,  434 => 287,  430 => 210,  426 => 209,  422 => 208,  418 => 207,  414 => 206,  410 => 205,  406 => 204,  402 => 203,  398 => 202,  393 => 201,  388 => 264,  385 => 198,  380 => 166,  374 => 24,  370 => 23,  365 => 22,  362 => 21,  356 => 6,  349 => 31,  345 => 30,  341 => 29,  337 => 28,  333 => 27,  329 => 25,  327 => 21,  309 => 6,  303 => 4,  297 => 217,  295 => 198,  271 => 176,  265 => 173,  262 => 172,  260 => 171,  254 => 167,  252 => 166,  220 => 96,  214 => 133,  210 => 131,  208 => 130,  199 => 126,  182 => 114,  170 => 93,  168 => 109,  110 => 49,  98 => 32,  85 => 22,  209 => 84,  205 => 129,  196 => 79,  192 => 78,  189 => 77,  178 => 82,  176 => 81,  165 => 76,  161 => 75,  152 => 58,  148 => 90,  145 => 89,  141 => 55,  134 => 50,  132 => 49,  127 => 57,  123 => 56,  109 => 39,  93 => 40,  90 => 36,  54 => 6,  133 => 44,  124 => 41,  111 => 37,  80 => 31,  60 => 25,  52 => 5,  97 => 34,  95 => 31,  88 => 23,  78 => 33,  71 => 30,  25 => 5,  72 => 30,  64 => 24,  53 => 19,  34 => 9,  92 => 38,  86 => 27,  79 => 60,  19 => 2,  42 => 12,  40 => 10,  29 => 5,  26 => 8,  224 => 96,  215 => 90,  211 => 94,  204 => 84,  200 => 83,  195 => 124,  193 => 88,  190 => 78,  188 => 85,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 104,  156 => 93,  153 => 102,  146 => 55,  142 => 64,  137 => 92,  126 => 84,  120 => 39,  117 => 44,  103 => 34,  74 => 29,  47 => 19,  32 => 6,  24 => 3,  22 => 4,  23 => 3,  17 => 1,  69 => 29,  63 => 26,  58 => 18,  49 => 17,  43 => 45,  37 => 10,  20 => 3,  139 => 26,  131 => 59,  128 => 43,  125 => 42,  121 => 82,  115 => 78,  107 => 36,  99 => 34,  96 => 41,  91 => 66,  82 => 31,  77 => 17,  75 => 24,  57 => 15,  50 => 32,  46 => 20,  44 => 11,  39 => 8,  33 => 7,  30 => 4,  27 => 3,  135 => 50,  129 => 76,  122 => 46,  116 => 42,  113 => 46,  108 => 48,  104 => 43,  102 => 37,  94 => 38,  89 => 28,  87 => 32,  84 => 26,  81 => 25,  73 => 36,  70 => 30,  67 => 29,  62 => 12,  59 => 24,  55 => 17,  51 => 16,  48 => 15,  41 => 12,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
