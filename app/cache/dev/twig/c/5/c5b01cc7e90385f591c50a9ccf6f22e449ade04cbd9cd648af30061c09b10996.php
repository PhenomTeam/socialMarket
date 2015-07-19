<?php

/* TwigBundle:Exception:traces.txt.twig */
class __TwigTemplate_c5b01cc7e90385f591c50a9ccf6f22e449ade04cbd9cd648af30061c09b10996 extends Twig_Template
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
        $__internal_cb3d5e2e852f38a64f73d1dc59de7584ea95b9253f32d1060acdec1e88e7680c = $this->env->getExtension("native_profiler");
        $__internal_cb3d5e2e852f38a64f73d1dc59de7584ea95b9253f32d1060acdec1e88e7680c->enter($__internal_cb3d5e2e852f38a64f73d1dc59de7584ea95b9253f32d1060acdec1e88e7680c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:traces.txt.twig"));

        // line 1
        if (twig_length_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()))) {
            // line 2
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "trace", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
                // line 3
                $this->loadTemplate("TwigBundle:Exception:trace.txt.twig", "TwigBundle:Exception:traces.txt.twig", 3)->display(array("trace" => $context["trace"]));
                // line 4
                echo "
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_cb3d5e2e852f38a64f73d1dc59de7584ea95b9253f32d1060acdec1e88e7680c->leave($__internal_cb3d5e2e852f38a64f73d1dc59de7584ea95b9253f32d1060acdec1e88e7680c_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:traces.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 4,  28 => 3,  24 => 2,  22 => 1,);
    }
}
