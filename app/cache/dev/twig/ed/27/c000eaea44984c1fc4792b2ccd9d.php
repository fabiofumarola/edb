<?php

/* KddeEdbBundle:Epigraph:new.html.twig */
class __TwigTemplate_ed27c000eaea44984c1fc4792b2ccd9d extends Twig_Template
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
        // line 15
        echo $this->env->getExtension('form')->setTheme($this->getContext($context, "form"), array("KddeEdbBundle:Form:fields.html.twig", ));
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
\t<!-- Google maps v3 -->
\t<meta name=\"viewport\" content=\"initial-scale=1.0, user-scalable=no\" />
\t<style type=\"text/css\">
  \t\t#map_canvas { width:550px;height: 300px; margin-right: auto ;margin-left: auto ; }
\t</style>
\t<script type=\"text/javascript\" src=\"http://maps.googleapis.com/maps/api/js?sensor=true\" ></script>
";
    }

    // line 17
    public function block_title($context, array $blocks = array())
    {
        // line 18
        echo " EDB new Epigraph
";
    }

    // line 21
    public function block_body($context, array $blocks = array())
    {
        // line 22
        echo "
";
        // line 23
        $this->env->loadTemplate("KddeEdbBundle:Literature:modalLiteratures.html.twig")->display(array_merge($context, array("literatures" => $this->getContext($context, "literatures"))));
        // line 24
        $this->env->loadTemplate("KddeEdbBundle:Literature:modalNewLiterature.html.twig")->display($context);
        // line 25
        $this->env->loadTemplate("KddeEdbBundle:GeoPosition:modalNewGeoPosition.html.twig")->display($context);
        // line 26
        $this->env->loadTemplate("KddeEdbBundle:PertinenceArea:modalNewPertinenceArea.html.twig")->display($context);
        // line 27
        $this->env->loadTemplate("KddeEdbBundle:PertinenceContext:modalNewPertinenceContext.html.twig")->display($context);
        // line 28
        $this->env->loadTemplate("KddeEdbBundle:PertinencePosition:modalNewPertinencePosition.html.twig")->display($context);
        // line 29
        $this->env->loadTemplate("KddeEdbBundle:ConservationLocation:modalNewConservationLocation.html.twig")->display($context);
        // line 30
        $this->env->loadTemplate("KddeEdbBundle:ConservationContext:modalNewConservationContext.html.twig")->display($context);
        // line 31
        $this->env->loadTemplate("KddeEdbBundle:ConservationPosition:modalNewConservationPosition.html.twig")->display($context);
        // line 32
        $this->env->loadTemplate("KddeEdbBundle:Support:modalNewSupport.html.twig")->display($context);
        // line 33
        $this->env->loadTemplate("KddeEdbBundle:Technique:modalNewTechnique.html.twig")->display($context);
        // line 34
        $this->env->loadTemplate("KddeEdbBundle:Paleography:modalNewPaleography.html.twig")->display($context);
        // line 35
        $this->env->loadTemplate("KddeEdbBundle:Function:modalNewFunction.html.twig")->display($context);
        // line 36
        $this->env->loadTemplate("KddeEdbBundle:OnomasticArea:modalNewOnomasticArea.html.twig")->display($context);
        // line 37
        $this->env->loadTemplate("KddeEdbBundle:Signa:modaViewSignas.html.twig")->display($context);
        // line 38
        $this->env->loadTemplate("KddeEdbBundle:Signa:modalNewSigna.html.twig")->display($context);
        // line 39
        echo "
\t<div class=\"marketing\">
\t\t<h2>New Epigraph</h2>
\t\t<br>
\t</div>
\t
\t<div class=\"row\">
\t\t<div class=\"offset1\">
\t\t\t<form class=\"\" action=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("edb_epigraph_new"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderEnctype($this->getContext($context, "form"));
        echo ">
\t\t\t\t";
        // line 48
        echo $this->env->getExtension('form')->renderErrors($this->getContext($context, "form"));
        echo "\t\t\t\t
\t\t\t\t
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h3>Bibliography</h3>
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<!--  visualizzare il numero di record in edb dopo il salvataggio -->
\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Volume ICVR</label>
\t\t\t\t\t\t<select class=\"span2\" id=\"epigraph_icvr\" name=\"epigraph[icvr]\" required=\"required\">
\t\t\t\t\t\t\t";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "icvrs"));
        foreach ($context['_seq'] as $context["_key"] => $context["icvr"]) {
            // line 59
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
        // line 61
        echo "\t\t\t\t\t\t
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Number</label> <input type=\"text\"
\t\t\t\t\t\t\tname=\"epigraph[principalProgNumber]\" class=\"span2\">
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Sub Number</label> <input type=\"text\"
\t\t\t\t\t\t\tname=\"epigraph[subNumeration]\" class=\"span2\">
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span4\" id=\"div_biblio\">
\t\t\t\t\t\t<label>Literature Reference</label>
\t\t\t\t\t\t<textarea name=\"epigraph[literaturesTextArea]\" id=\"literature\" class=\"span3\" rows=\"4\"></textarea>
\t\t\t\t\t\t<a id=\"addLiteratureRef\" class=\"btn\">Add Reference</a> 
\t\t\t\t\t\t<a id=\"newLiterature\" class=\"btn\">New Literature</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h3>Pertinence</h3>
\t\t\t\t</div>

\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Locus Inventionis</label> <input type=\"text\" class=\"span2\"
\t\t\t\t\t\t\tvalue=\"Roma\" disabled=\"disabled\" name=\"epigraph[pertinence][locus]\"> 
";
        // line 93
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<br />
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Area</label> <select id=\"selectPertinenceArea\"
\t\t\t\t\t\t\tclass=\"span2\" name=\"epigraph[pertinence][pertinenceArea]\" required=\"required\">
\t\t\t\t\t\t\t<option></option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Context</label> <select id=\"selectPertinenceContext\"
\t\t\t\t\t\t\tclass=\"span2\" name=\"epigraph[pertinence][context]\" required=\"required\">
\t\t\t\t\t\t\t<option></option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Position</label> <select id=\"selectPertinencePosition\"
\t\t\t\t\t\t\tclass=\"span2\" name=\"epigraph[pertinence][pertinencePosition]\" required=\"required\">
\t\t\t\t\t\t\t<option></option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span1\">
\t\t\t\t\t\t<label for=\"insitu\">In situ</label><input type=\"checkbox\"
\t\t\t\t\t\t\tid=\"insitu\" name=\"epigraph[pertinence][inSitu]\">
\t\t\t\t\t</div>

\t\t\t\t</div>
\t\t\t\t<br />
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t<label>Geographic position <em>(latitude,longitude)</em></label> 
\t\t\t\t\t\t<input type=\"text\" class=\"span4\" value=\"\" id=\"fld_geoPosition\" name=\"epigraph[geoPosition]\" />
\t\t\t\t\t\t<a id=\"newGeoPosition\" class=\"btn\" title=\"Get geographic position from map\" >Show Map</a>\t\t\t\t\t\t
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<hr>
\t\t\t\t
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h3>Conservation</h3>
\t\t\t\t</div>

\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Location</label> <select id=\"selectConservationLocation\"
\t\t\t\t\t\t\tclass=\"span2\" >
\t\t\t\t\t\t\t<option></option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Context</label> <select id=\"selectConservationContext\"
\t\t\t\t\t\t\tclass=\"span2\">
\t\t\t\t\t\t\t<option></option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Position</label> <select id=\"selectConservationPosition\"
\t\t\t\t\t\t\tclass=\"span2\">
\t\t\t\t\t\t\t<option></option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span1\">
\t\t\t\t\t\t<label for=\"perduta\">Lost</label><input type=\"checkbox\"
\t\t\t\t\t\t\tname=\"epigraph[lost]\" id=\"lost\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"span1 offset1\">
\t\t\t\t\t\t<p></p>
\t\t\t\t\t\t<button class=\"btn btn-small btn-warning span1\" type=\"button\"
\t\t\t\t\t\t\tid=\"addConservationToTable\">Add</button>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<br> <br>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"span10\">
\t\t\t\t\t\t<table class=\"table table-condensed table-bordered\"
\t\t\t\t\t\t\tid=\"tableConservations\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<th class=\"span3\">Location</th>
\t\t\t\t\t\t\t\t\t<th class=\"span4\">Context</th>
\t\t\t\t\t\t\t\t\t<th class=\"span3\">Position</th>
\t\t\t\t\t\t\t\t\t<th class=\"span2\">Delete</th>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t</table>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<hr>
\t\t\t\t
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h3>Used Material</h3>
\t\t\t\t</div>

\t\t\t\t<div class=\"row \">
\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Support</label> <select id=\"selectSupport\" class=\"span2\"
\t\t\t\t\t\t\tname=\"epigraph[material][support]\"> 
\t\t\t\t\t\t\t";
        // line 198
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "supports"));
        foreach ($context['_seq'] as $context["_key"] => $context["supp"]) {
            // line 199
            echo "\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "supp"), "id"), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "supp"), "description"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['supp'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 201
        echo "\t\t\t\t\t\t\t\t<option value=\"-1\"> Add New </option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Technique</label> <select id=\"selectTechnique\"
\t\t\t\t\t\t\tclass=\"span2\" name=\"epigraph[material][technique]\">
\t\t\t\t\t\t\t";
        // line 207
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "techniques"));
        foreach ($context['_seq'] as $context["_key"] => $context["tech"]) {
            // line 208
            echo "\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "tech"), "id"), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "tech"), "description"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tech'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 210
        echo "\t\t\t\t\t\t\t\t<option value=\"-1\"> Add New </option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span1 offset1\">
\t\t\t\t\t\t<label>Height</label> <input type=\"text\" name=\"epigraph[material][height]\"
\t\t\t\t\t\t\tclass=\"span1\">
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span1\">
\t\t\t\t\t\t<label>Width</label> <input type=\"text\" name=\"epigraph[material][width]\"
\t\t\t\t\t\t\tclass=\"span1\">
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span1\">
\t\t\t\t\t\t<label>Tickness</label> <input type=\"text\" name=\"epigraph[material][tickness]\"
\t\t\t\t\t\t\tclass=\"span1\">
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<hr>
\t\t\t\t
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h3>Other Characteristics</h3>
\t\t\t\t</div>

\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"span0 offset0\">
\t\t\t\t\t\t<label>Height letters:</label>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span1\">
\t\t\t\t\t\t<label>minimum</label> <input type=\"text\" name=\"epigraph[altMinLetters]\"
\t\t\t\t\t\t\tclass=\"span1\">
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span1\">
\t\t\t\t\t\t<label>maximum</label> <input type=\"text\" name=\"epigraph[altMaxLetters]\"
\t\t\t\t\t\t\tclass=\"span1\">
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span2 offset1\">
\t\t\t\t\t\t<label>Paleography</label> <select
\t\t\t\t\t\t\tid=\"selectPaleography\" class=\"span2\" name=\"epigraph[paleography]\">
\t\t\t\t\t\t\t";
        // line 253
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "paleographies"));
        foreach ($context['_seq'] as $context["_key"] => $context["pal"]) {
            // line 254
            echo "\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "pal"), "id"), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "pal"), "description"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pal'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 256
        echo "\t\t\t\t\t\t\t\t<option value=\"-1\"> Add New </option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span2 offset1\">
\t\t\t\t\t\t<label>Function</label> <select id=\"selectFunction\" class=\"span2\"
\t\t\t\t\t\t\tname=\"epigraph[funzione]\">
\t\t\t\t\t\t\t";
        // line 263
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "functions"));
        foreach ($context['_seq'] as $context["_key"] => $context["fun"]) {
            // line 264
            echo "\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "fun"), "id"), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "fun"), "description"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fun'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 266
        echo "\t\t\t\t\t\t\t\t<option value=\"-1\"> Add New </option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>

\t\t\t\t</div>
\t\t\t\t<hr>
\t\t\t\t
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h3>Text</h3>
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"span6\">
\t\t\t\t\t\t<button id=\"greekToogle\" type=\"button\" class=\"btn\" data-toggle=\"button\">Click to write in Greek</button>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Onomastic Area</label> <select id=\"selectOnomasticArea\"
\t\t\t\t\t\t\tclass=\"span2\" name=\"epigraph[ambitoOnomastico]\">
\t\t\t\t\t\t\t";
        // line 284
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "onomasticAreas"));
        foreach ($context['_seq'] as $context["_key"] => $context["o"]) {
            // line 285
            echo "\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "o"), "id"), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "o"), "description"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['o'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 287
        echo "\t\t\t\t\t\t\t\t<option value=\"-1\"> Add New </option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">

\t\t\t\t\t<div class=\"span6\">
\t\t\t\t\t\t<label>Transcription</label>
\t\t\t\t\t\t<textarea class=\"span6\" rows=\"10\" name=\"epigraph[transcription]\" id=\"transcription\" 
\t\t\t\t\t\tonselect=\"storeCaret(this);\" onclick=\"storeCaret(this);\" 
\t\t\t\t\t\tonchange=\"if (navigator.userAgent.indexOf(&#39;Opera&#39;) &gt; -1) doit();\" required=\"required\"></textarea>
\t\t\t\t\t</div>



\t\t\t\t\t<div class=\"span5\" id=\"divSigna\">
\t\t\t\t\t\t<label>Signum Christi</label> 
\t\t\t\t\t\t<select id=\"selectSigna\"
\t\t\t\t\t\t\tmultiple=\"multiple\" class=\"span3\" name=\"epigraph[signas][]\">
\t\t\t\t\t\t</select>
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<a id=\"addSigna\" class=\"btn\">Add</a> 
\t\t\t\t\t\t<a id=\"newSigna\" class=\"btn\">New</a>
\t\t\t\t\t\t<a id=\"removeSigna\" class=\"btn\">Remove Selected</a>
\t\t\t\t\t</div>

\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#803;');\">&#046;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#818;');\">&#095;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#773;');\">&#175;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#770;');\">&#094;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#769;');\">&#180;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#768;');\">&#096;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#12314;');\">[[</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#12315;');\">]]</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#12296;');\">&#060;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#12297;');\">&#062;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#12298;');\">&#171;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#12299;');\">&#187;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\" span class=\"greco\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#8988;');\">&#8988;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\" span class=\"greco\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#8989;');\">&#8989;</button>
\t\t\t\t\t\t<br>
\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#96;');\">&#96;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#180;');\">&#180;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#123;');\">&#123;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#125;');\">&#125;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#183;');\">&#183;</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#834;');\">
\t\t\t\t\t\t\t<font color=\"red\">&nbsp;&#834;</FONT>
\t\t\t\t\t\t</button>

\t\t\t\t\t\t<button type=\"button\" unselectable=\"on\"
\t\t\t\t\t\t\tonclick=\"replaceSelection (document.getElementById('transcription'), '&#772;');\">
\t\t\t\t\t\t\t<font color=\"red\">&nbsp;&#772;</font>
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<br />
\t\t\t\t<div class=\"row\">

\t\t\t\t\t<div class=\"span1\">
\t\t\t\t\t\t<label>Opistografia</label> <input type=\"checkbox\"
\t\t\t\t\t\t\tname=\"epigraph[reimpiego_opistografia]\" id=\"checkboxOpistografia\">
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span2 offset1\">
\t\t\t\t\t\t<label>Testo metrico</label> <input type=\"checkbox\"
\t\t\t\t\t\t\tname=\"epigraph[metricText]\" id=\"checkboxMetricText\">
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span3\">
\t\t\t\t\t\t<label>presence of elements in greek</label> <input
\t\t\t\t\t\t\ttype=\"checkbox\" name=\"epigraph[greek]\" id=\"checkboxGreek\">
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Presence of latin/greek</label> <input type=\"checkbox\"
\t\t\t\t\t\t\tname=\"epigraph[presenceLG]\" id=\"checkboxPresenceLG\">
\t\t\t\t\t</div>

\t\t\t\t</div>

\t\t\t\t<hr>
\t\t\t\t
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h3>When</h3>
\t\t\t\t</div>

\t\t\t\t<div class=\"row\">

\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Dating</label> <select id=\"selectDating\"
\t\t\t\t\t\t\tclass=\"span3\" name=\"epigraph[dating]\">
\t\t\t\t\t\t\t";
        // line 420
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "datings"));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 421
            echo "\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "d"), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "d"), "description"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 423
        echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span2 offset1\">
\t\t\t\t\t\t<label>Precise Year</label> <input type=\"checkbox\"
\t\t\t\t\t\t\tid=\"checkPreciseYear\" name=\"epigraph[adAnnum]\">
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>From</label> <input id=\"inputAnnumFrom\" name=\"epigraph[from]\" type=\"text\"
\t\t\t\t\t\t\tclass=\"span2\" disabled=\"disabled\">
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"span2 offset1\">
\t\t\t\t\t\t<label>To</label> <input id=\"inputAnnumTo\" name=\"epigraph[to]\" type=\"text\"
\t\t\t\t\t\t\tclass=\"span2\" disabled=\"disabled\">
\t\t\t\t\t</div>

\t\t\t\t</div>

\t\t\t\t<hr>

\t\t\t\t<div class=\"row\">
\t\t\t\t\t<h3>Comments</h3>
\t\t\t\t</div>

\t\t\t\t<div class=\"row\">

\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t<label>Critical Apparatus</label>
\t\t\t\t\t\t<textarea rows=\"3\" name=\"epigraph[criticalApparatus]\" class=\"span4\"></textarea>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span2\">
\t\t\t\t\t\t<label>Divergent Text</label> <input type=\"checkbox\"
\t\t\t\t\t\t\tname=\"epigraph[divergentText]\" id=\"inputDivergentText\">
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"span4\">
\t\t\t\t\t\t<label>Notes</label>
\t\t\t\t\t\t<textarea rows=\"3\" name=\"epigraph[comment]\" class=\"span4\"></textarea>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<hr>
\t\t\t\t
    \t\t\t";
        // line 470
        echo $this->env->getExtension('form')->renderRest($this->getContext($context, "form"));
        echo "
    \t\t\t
    \t\t\t\t<div class=\"\">
\t\t\t\t      <button type=\"submit\" class=\"btn\">Submit</button>
\t\t\t\t    </div>
\t\t\t</form>
\t\t</div>
\t</div>
\t
";
    }

    // line 481
    public function block_javascripts($context, array $blocks = array())
    {
        // line 482
        echo "\t
\t\t";
        // line 483
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
\t\t
\t\t <script src=\"";
        // line 485
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/create.js"), "html", null, true);
        echo "\"></script>
\t\t <script src=\"";
        // line 486
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/keyboard.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "KddeEdbBundle:Epigraph:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  662 => 486,  658 => 485,  653 => 483,  650 => 482,  647 => 481,  633 => 470,  584 => 423,  573 => 421,  569 => 420,  434 => 287,  423 => 285,  419 => 284,  399 => 266,  388 => 264,  384 => 263,  375 => 256,  364 => 254,  360 => 253,  315 => 210,  304 => 208,  300 => 207,  292 => 201,  281 => 199,  277 => 198,  170 => 93,  138 => 61,  127 => 59,  123 => 58,  110 => 48,  104 => 47,  94 => 39,  92 => 38,  90 => 37,  88 => 36,  86 => 35,  84 => 34,  82 => 33,  80 => 32,  78 => 31,  76 => 30,  74 => 29,  72 => 28,  70 => 27,  68 => 26,  66 => 25,  64 => 24,  62 => 23,  59 => 22,  56 => 21,  51 => 18,  48 => 17,  34 => 4,  31 => 3,  26 => 15,);
    }
}
