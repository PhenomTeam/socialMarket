<?php

/* BraincraftedBootstrapBundle::ie8-support.html.twig */
class __TwigTemplate_9ede150818b7b62ce6752254b0e1036b6f3987a8e711536fb67879d61a528c47 extends Twig_Template
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
        $__internal_106cea02d78796d31171ba07ee1b61481d2a15ef97b605ab08bfa3344362994c = $this->env->getExtension("native_profiler");
        $__internal_106cea02d78796d31171ba07ee1b61481d2a15ef97b605ab08bfa3344362994c->enter($__internal_106cea02d78796d31171ba07ee1b61481d2a15ef97b605ab08bfa3344362994c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "BraincraftedBootstrapBundle::ie8-support.html.twig"));

        // line 1
        echo "<!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv-printshiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js\"></script>
<![endif]-->
";
        
        $__internal_106cea02d78796d31171ba07ee1b61481d2a15ef97b605ab08bfa3344362994c->leave($__internal_106cea02d78796d31171ba07ee1b61481d2a15ef97b605ab08bfa3344362994c_prof);

    }

    public function getTemplateName()
    {
        return "BraincraftedBootstrapBundle::ie8-support.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
