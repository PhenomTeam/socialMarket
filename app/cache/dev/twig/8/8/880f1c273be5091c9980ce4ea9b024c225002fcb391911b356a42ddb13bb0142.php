<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_880f1c273be5091c9980ce4ea9b024c225002fcb391911b356a42ddb13bb0142 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_63e6662bf7d845ff99932645183e3674d3506c1f66fc2cf394fe2acb45096930 = $this->env->getExtension("native_profiler");
        $__internal_63e6662bf7d845ff99932645183e3674d3506c1f66fc2cf394fe2acb45096930->enter($__internal_63e6662bf7d845ff99932645183e3674d3506c1f66fc2cf394fe2acb45096930_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_63e6662bf7d845ff99932645183e3674d3506c1f66fc2cf394fe2acb45096930->leave($__internal_63e6662bf7d845ff99932645183e3674d3506c1f66fc2cf394fe2acb45096930_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_470a156d2f21904d9bc8dd6f8942bc9629d343c11bd4e1770abf776b66fa9729 = $this->env->getExtension("native_profiler");
        $__internal_470a156d2f21904d9bc8dd6f8942bc9629d343c11bd4e1770abf776b66fa9729->enter($__internal_470a156d2f21904d9bc8dd6f8942bc9629d343c11bd4e1770abf776b66fa9729_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_470a156d2f21904d9bc8dd6f8942bc9629d343c11bd4e1770abf776b66fa9729->leave($__internal_470a156d2f21904d9bc8dd6f8942bc9629d343c11bd4e1770abf776b66fa9729_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_3d26db8933384dd103cf23dd9bae0cdb1a8e9e2657c3d2b558e02e5ee36f83cb = $this->env->getExtension("native_profiler");
        $__internal_3d26db8933384dd103cf23dd9bae0cdb1a8e9e2657c3d2b558e02e5ee36f83cb->enter($__internal_3d26db8933384dd103cf23dd9bae0cdb1a8e9e2657c3d2b558e02e5ee36f83cb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_3d26db8933384dd103cf23dd9bae0cdb1a8e9e2657c3d2b558e02e5ee36f83cb->leave($__internal_3d26db8933384dd103cf23dd9bae0cdb1a8e9e2657c3d2b558e02e5ee36f83cb_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_0aa0901a697db347848283fd50050f9ff2f2a7ca4bc13d29783fbc5a8418c42a = $this->env->getExtension("native_profiler");
        $__internal_0aa0901a697db347848283fd50050f9ff2f2a7ca4bc13d29783fbc5a8418c42a->enter($__internal_0aa0901a697db347848283fd50050f9ff2f2a7ca4bc13d29783fbc5a8418c42a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_0aa0901a697db347848283fd50050f9ff2f2a7ca4bc13d29783fbc5a8418c42a->leave($__internal_0aa0901a697db347848283fd50050f9ff2f2a7ca4bc13d29783fbc5a8418c42a_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
