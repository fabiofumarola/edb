<?php

/* WebProfilerBundle:Profiler:toolbar_js.html.twig */
class __TwigTemplate_66a8894ca9e5f5855070dcecc6047480 extends Twig_Template
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
        echo "<div id=\"sfwdt";
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "\" style=\"display: none\"></div>
<script type=\"text/javascript\">/*<![CDATA[*/
    (function () {
        var wdt, xhr;
        wdt = document.getElementById('sfwdt";
        // line 5
        echo twig_escape_filter($this->env, $this->getContext($context, "token"), "html", null, true);
        echo "');
        if (window.XMLHttpRequest) {
            xhr = new XMLHttpRequest();
        } else {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xhr.open('GET', '";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_wdt", array("token" => $this->getContext($context, "token"))), "html", null, true);
        echo "', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function(state) {
            if (4 === xhr.readyState && 200 === xhr.status && -1 !== xhr.responseText.indexOf('sf-toolbarreset')) {
                wdt.innerHTML = xhr.responseText;
                wdt.style.display = 'block';
            }
        };
        xhr.send('');
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 16,  55 => 14,  53 => 13,  42 => 10,  34 => 11,  23 => 4,  104 => 24,  95 => 21,  88 => 19,  82 => 19,  78 => 17,  75 => 16,  71 => 14,  40 => 7,  38 => 6,  31 => 4,  25 => 5,  20 => 2,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  188 => 77,  185 => 76,  179 => 72,  171 => 67,  162 => 63,  146 => 55,  135 => 50,  131 => 48,  129 => 47,  120 => 45,  117 => 44,  99 => 34,  94 => 31,  70 => 26,  47 => 19,  39 => 9,  92 => 20,  86 => 6,  77 => 28,  37 => 8,  33 => 7,  24 => 3,  19 => 2,  44 => 11,  41 => 7,  30 => 4,  17 => 1,  450 => 215,  446 => 214,  442 => 213,  438 => 212,  434 => 211,  430 => 210,  426 => 209,  422 => 208,  418 => 207,  414 => 206,  410 => 205,  406 => 204,  402 => 203,  398 => 202,  393 => 201,  388 => 199,  385 => 198,  380 => 166,  374 => 24,  370 => 23,  365 => 22,  362 => 21,  356 => 6,  349 => 31,  345 => 30,  341 => 29,  337 => 28,  333 => 27,  327 => 21,  297 => 217,  295 => 198,  271 => 176,  265 => 173,  254 => 167,  214 => 133,  210 => 131,  208 => 130,  205 => 129,  199 => 126,  195 => 80,  193 => 79,  176 => 112,  170 => 110,  168 => 109,  165 => 108,  158 => 61,  153 => 59,  142 => 54,  137 => 51,  126 => 46,  121 => 82,  115 => 78,  113 => 43,  110 => 76,  103 => 36,  98 => 70,  93 => 67,  91 => 66,  74 => 27,  69 => 56,  64 => 15,  59 => 23,  43 => 45,  27 => 3,  22 => 3,  334 => 155,  329 => 25,  326 => 152,  323 => 151,  313 => 145,  309 => 6,  303 => 4,  287 => 128,  279 => 123,  276 => 122,  270 => 121,  262 => 172,  260 => 171,  256 => 117,  252 => 166,  247 => 112,  242 => 110,  237 => 109,  235 => 108,  228 => 104,  224 => 96,  220 => 136,  213 => 98,  209 => 97,  201 => 91,  190 => 78,  186 => 84,  182 => 114,  177 => 71,  173 => 78,  169 => 76,  167 => 75,  156 => 60,  150 => 66,  144 => 62,  140 => 60,  136 => 58,  134 => 57,  128 => 54,  124 => 53,  112 => 44,  105 => 40,  101 => 39,  97 => 22,  89 => 20,  85 => 63,  83 => 30,  79 => 40,  67 => 12,  62 => 24,  60 => 20,  57 => 9,  54 => 50,  49 => 12,  46 => 14,  32 => 11,  29 => 5,);
    }
}
