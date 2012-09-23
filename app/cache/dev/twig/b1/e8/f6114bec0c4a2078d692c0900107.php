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
        return array (  160 => 94,  156 => 93,  151 => 91,  148 => 90,  145 => 89,  129 => 76,  82 => 31,  71 => 30,  67 => 29,  48 => 15,  39 => 8,  36 => 7,  31 => 4,  28 => 3,);
    }
}
