<?php

/* PhenomWafeeeBundle:Default:index.html.twig */
class __TwigTemplate_052c20cd5afefda144e633ea4f1cb82c15a9f59d3208a0a98a33683b52d8d712 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "PhenomWafeeeBundle:Default:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_02e2bc4da7872b32c077dfb481d4c2f87df1ac4ba4c1940c757e62d3c3d15420 = $this->env->getExtension("native_profiler");
        $__internal_02e2bc4da7872b32c077dfb481d4c2f87df1ac4ba4c1940c757e62d3c3d15420->enter($__internal_02e2bc4da7872b32c077dfb481d4c2f87df1ac4ba4c1940c757e62d3c3d15420_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PhenomWafeeeBundle:Default:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_02e2bc4da7872b32c077dfb481d4c2f87df1ac4ba4c1940c757e62d3c3d15420->leave($__internal_02e2bc4da7872b32c077dfb481d4c2f87df1ac4ba4c1940c757e62d3c3d15420_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_e52f896c816ba0174d35ac3665358da9e6df5a288e64c492d81a7e8f34dfc9b6 = $this->env->getExtension("native_profiler");
        $__internal_e52f896c816ba0174d35ac3665358da9e6df5a288e64c492d81a7e8f34dfc9b6->enter($__internal_e52f896c816ba0174d35ac3665358da9e6df5a288e64c492d81a7e8f34dfc9b6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    Homepage. Chích nó đi!
";
        
        $__internal_e52f896c816ba0174d35ac3665358da9e6df5a288e64c492d81a7e8f34dfc9b6->leave($__internal_e52f896c816ba0174d35ac3665358da9e6df5a288e64c492d81a7e8f34dfc9b6_prof);

    }

    public function getTemplateName()
    {
        return "PhenomWafeeeBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 4,  34 => 3,  11 => 1,);
    }
}
