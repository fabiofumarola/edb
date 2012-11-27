<?php

/* KddeEdbBundle:Default:index.html.twig */
class __TwigTemplate_8c787296e212cddc0ca81abbb9c23198 extends Twig_Template
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
        echo " EDB Home Page
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "\t
";
        // line 12
        echo "\t<div class=\"marketing\">
\t<div class=\"row pagination-centered\">
\t\t<img alt=\"EDB Logo\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/imgHP.jpg"), "html", null, true);
        echo "\" class=\"\">
\t</div>
\t<div class=\"row\">
\t\t<div class=\"span4\">
\t\t\t<img class=\"bs-icon\"
\t\t\t\tsrc=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/glyphicons/glyphicons_266_book_open.png"), "html", null, true);
        echo "\">
\t\t\t<h2>La Storia</h2>
\t\t\t<p>Le iscrizioni urbane latine e greche di committenza cristiana sono
\t\t\t\tin gran parte edite nei dieci volumi finora apparsi delle
\t\t\t\t<i>Inscriptiones Christianae Vrbis Romae septimo saeculo antiquiores,
\t\t\t\tnova series</i> (ICVR), promosse dal Pontificio Istituto di Archeologia
\t\t\t\tCristiana. Iniziata nel 1922 da A. Silvagni, l'opera è proseguita
\t\t\t\tper oltre mezzo secolo per l'incessante attività di A. Ferrua S.
\t\t\t\tI., al quale si devono i volumi II, III, IV, V, VI, VII, VIII; i
\t\t\t\tsuccessivi volumi IX e X sono stati curati da D. Mazzoleni (vol. IX
\t\t\t\te X) e C. Carletti (vol. X)...</p>
\t\t\t<p>
\t\t\t\t<a href=\"<?php echo URL; ?>history/index\" class=\"btn\">leggi tutto</a>
\t\t\t</p>
\t\t</div>
\t\t<div class=\"span4\">
\t\t\t<img class=\"bs-icon\"
\t\t\t\tsrc=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/glyphicons/glyphicons_079_podium.png"), "html", null, true);
        echo "\">
\t\t\t<h2>Lo Stato Attuale</h2>
\t\t\t<p>
\t\t\t\tIn EDB attualmente sono presenti <strong>26164</strong> testi
\t\t\t\tepigrafici, in massima parte elaborati sulla base della edizione
\t\t\t\tICVR, <i>nova series</i>: <strong>22265</strong> latini e <strong>3899</strong>
\t\t\t\tgreci (o con compresenza di greco e latino), provenienti
\t\t\t\tessenzialmente dai contesti cimiteriali cristiani del suburbio
\t\t\t\tromano. La trascrizione dal testo-base ICVR nell'<strong>EDB</strong>,
\t\t\t\tlungi dall'essere una mera operazione meccanica di immissione di
\t\t\t\tdati, <i>consiste di fatto in una vera e propria pre-edizione</i>, con
\t\t\t\tsistematico scioglimento delle abbreviazioni, ipotesi di
\t\t\t\tintegrazione...
\t\t\t</p>
\t\t\t<p>
\t\t\t\t<a href=\"<?php echo URL; ?>actualstate/index\" class=\"btn\">leggi tutto</a>
\t\t\t</p>
\t\t</div>
\t\t<div class=\"span4\">
\t\t\t<img class=\"bs-icon\"
\t\t\t\tsrc=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/glyphicons/glyphicons_009_magic.png"), "html", null, true);
        echo "\">
\t\t\t<h2>Le Prospettive</h2>
\t\t\t<p>
\t\t\t\tOltre al completamento della informatizzazione del materiale ICVR,
\t\t\t\tle future attivit&agrave; dell'<strong>EDB</strong> prevedono: gli
\t\t\t\taggiornamenti <em>al corpus delle ICVR (come edizioni successive,
\t\t\t\t\tnuove letture e correzioni), condotto in primis sulla base de
\t\t\t\t\tL'Ann&eacute;e Epigraphique e de L'Ann&eacute;e Philologique;
\t\t\t\t\tl'inserimento di iscrizioni cristiane di Roma non comprese nelle
\t\t\t\t\tICVR, d'intesa con gli Enti preposti alla tutela e alla
\t\t\t\t\tconservazione dei documenti; in primo luogo la Pontificia
\t\t\t\t\tCommissione di Archeologia Sacra, con il cui archivio digitale di
\t\t\t\t\timmagini &egrave; in fieri la creazione di un collegamento
\t\t\t\t\tdinamico...</em>
\t\t\t</p>
\t\t\t<p>
\t\t\t\t<a href=\"<?php echo URL; ?>perspectives/index\" class=\"btn\">leggi tutto</a>
\t\t\t</p>
\t\t</div>
\t</div>
\t<!--/row-->
</div>
<!-- /.marketing -->
";
    }

    public function getTemplateName()
    {
        return "KddeEdbBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 14,  21 => 4,  450 => 215,  446 => 214,  442 => 213,  438 => 212,  434 => 211,  430 => 210,  426 => 209,  422 => 208,  418 => 207,  414 => 206,  410 => 205,  406 => 204,  402 => 203,  398 => 202,  393 => 201,  388 => 199,  385 => 198,  380 => 166,  374 => 24,  370 => 23,  365 => 22,  362 => 21,  356 => 6,  349 => 31,  345 => 30,  341 => 29,  337 => 28,  333 => 27,  329 => 25,  327 => 21,  309 => 6,  303 => 4,  297 => 217,  295 => 198,  271 => 176,  265 => 173,  262 => 172,  260 => 171,  254 => 167,  252 => 166,  220 => 136,  214 => 133,  210 => 131,  208 => 130,  199 => 126,  182 => 114,  170 => 110,  168 => 109,  110 => 76,  98 => 70,  85 => 63,  209 => 84,  205 => 129,  196 => 79,  192 => 78,  189 => 77,  178 => 71,  176 => 112,  165 => 108,  161 => 61,  152 => 58,  148 => 57,  145 => 56,  141 => 55,  134 => 50,  132 => 49,  127 => 46,  123 => 44,  109 => 39,  93 => 67,  90 => 32,  54 => 50,  133 => 44,  124 => 41,  111 => 37,  80 => 26,  60 => 16,  52 => 12,  97 => 34,  95 => 21,  88 => 29,  78 => 25,  71 => 14,  25 => 4,  72 => 16,  64 => 54,  53 => 19,  34 => 5,  92 => 20,  86 => 28,  79 => 60,  19 => 2,  42 => 10,  40 => 10,  29 => 33,  26 => 3,  224 => 96,  215 => 90,  211 => 88,  204 => 84,  200 => 83,  195 => 124,  193 => 123,  190 => 78,  188 => 77,  185 => 76,  179 => 72,  177 => 71,  171 => 67,  162 => 63,  158 => 104,  156 => 60,  153 => 102,  146 => 55,  142 => 94,  137 => 92,  126 => 84,  120 => 39,  117 => 44,  103 => 72,  74 => 58,  47 => 19,  32 => 6,  24 => 3,  22 => 1,  23 => 3,  17 => 1,  69 => 56,  63 => 20,  58 => 9,  49 => 48,  43 => 45,  37 => 9,  20 => 2,  139 => 26,  131 => 48,  128 => 43,  125 => 42,  121 => 82,  115 => 78,  107 => 36,  99 => 34,  96 => 56,  91 => 66,  82 => 27,  77 => 25,  75 => 24,  57 => 15,  50 => 32,  46 => 10,  44 => 11,  39 => 9,  33 => 7,  30 => 4,  27 => 3,  135 => 50,  129 => 47,  122 => 46,  116 => 42,  113 => 77,  108 => 40,  104 => 24,  102 => 37,  94 => 33,  89 => 20,  87 => 32,  84 => 28,  81 => 26,  73 => 36,  70 => 26,  67 => 21,  62 => 24,  59 => 52,  55 => 18,  51 => 13,  48 => 10,  41 => 12,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
