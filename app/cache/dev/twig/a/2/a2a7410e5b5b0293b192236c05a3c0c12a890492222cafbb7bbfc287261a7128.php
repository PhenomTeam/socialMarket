<?php

/* base.html.twig */
class __TwigTemplate_a2a7410e5b5b0293b192236c05a3c0c12a890492222cafbb7bbfc287261a7128 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_dd2dbd3ff13b27feaf9f32924e9f7028c237278e275d4a0f79c50ec23e7c379e = $this->env->getExtension("native_profiler");
        $__internal_dd2dbd3ff13b27feaf9f32924e9f7028c237278e275d4a0f79c50ec23e7c379e->enter($__internal_dd2dbd3ff13b27feaf9f32924e9f7028c237278e275d4a0f79c50ec23e7c379e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 11
        echo "
        <!-- HTML5 Shim and Respond.js add IE8 support of HTML5 elements and media queries -->
        ";
        // line 13
        $this->loadTemplate("BraincraftedBootstrapBundle::ie8-support.html.twig", "base.html.twig", 13)->display($context);
        // line 14
        echo "
        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 18
        $this->displayBlock('body', $context, $blocks);
        // line 19
        echo "
        ";
        // line 20
        $this->displayBlock('javascripts', $context, $blocks);
        // line 26
        echo "    </body>
</html>
";
        
        $__internal_dd2dbd3ff13b27feaf9f32924e9f7028c237278e275d4a0f79c50ec23e7c379e->leave($__internal_dd2dbd3ff13b27feaf9f32924e9f7028c237278e275d4a0f79c50ec23e7c379e_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_89e2af11dd7196a6d2778506f670690a280eaa3879baaadcaf8221394be8953f = $this->env->getExtension("native_profiler");
        $__internal_89e2af11dd7196a6d2778506f670690a280eaa3879baaadcaf8221394be8953f->enter($__internal_89e2af11dd7196a6d2778506f670690a280eaa3879baaadcaf8221394be8953f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_89e2af11dd7196a6d2778506f670690a280eaa3879baaadcaf8221394be8953f->leave($__internal_89e2af11dd7196a6d2778506f670690a280eaa3879baaadcaf8221394be8953f_prof);

    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_fd3c28ec5b3913bb24cbb0ad78eff13ddce6a37681be2cec51218d16686698dd = $this->env->getExtension("native_profiler");
        $__internal_fd3c28ec5b3913bb24cbb0ad78eff13ddce6a37681be2cec51218d16686698dd->enter($__internal_fd3c28ec5b3913bb24cbb0ad78eff13ddce6a37681be2cec51218d16686698dd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 8
        echo "            <!-- Bootstrap -->
            <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
        ";
        
        $__internal_fd3c28ec5b3913bb24cbb0ad78eff13ddce6a37681be2cec51218d16686698dd->leave($__internal_fd3c28ec5b3913bb24cbb0ad78eff13ddce6a37681be2cec51218d16686698dd_prof);

    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        $__internal_116e0983f2f67abb4f8669dc195c0c2fce80a027258cf5f565f459c899496b41 = $this->env->getExtension("native_profiler");
        $__internal_116e0983f2f67abb4f8669dc195c0c2fce80a027258cf5f565f459c899496b41->enter($__internal_116e0983f2f67abb4f8669dc195c0c2fce80a027258cf5f565f459c899496b41_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_116e0983f2f67abb4f8669dc195c0c2fce80a027258cf5f565f459c899496b41->leave($__internal_116e0983f2f67abb4f8669dc195c0c2fce80a027258cf5f565f459c899496b41_prof);

    }

    // line 20
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_0eb13aef86d4fe7d1fc52b70af071888be2cbf409c5d2831ad3b3ae3a9bec76a = $this->env->getExtension("native_profiler");
        $__internal_0eb13aef86d4fe7d1fc52b70af071888be2cbf409c5d2831ad3b3ae3a9bec76a->enter($__internal_0eb13aef86d4fe7d1fc52b70af071888be2cbf409c5d2831ad3b3ae3a9bec76a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 21
        echo "            <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
            <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
            <!-- Include all JavaScripts, compiled by Assetic -->
            <script src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
        ";
        
        $__internal_0eb13aef86d4fe7d1fc52b70af071888be2cbf409c5d2831ad3b3ae3a9bec76a->leave($__internal_0eb13aef86d4fe7d1fc52b70af071888be2cbf409c5d2831ad3b3ae3a9bec76a_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 24,  120 => 22,  117 => 21,  111 => 20,  100 => 18,  91 => 9,  88 => 8,  82 => 7,  70 => 5,  61 => 26,  59 => 20,  56 => 19,  54 => 18,  48 => 15,  45 => 14,  43 => 13,  39 => 11,  37 => 7,  32 => 5,  26 => 1,);
    }
}
