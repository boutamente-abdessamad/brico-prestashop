<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @Modules/ps_mbo/views/templates/admin/error.html.twig */
class __TwigTemplate_b73cd018d87bd1eb9fac9a935138936de1304ba4f4a335c69fa0e124de9bb05d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 20
        return $this->loadTemplate((($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", []), "isxmlhttprequest", [])) ? ("@Modules/ps_mbo/views/templates/admin/layout-ajax.html.twig") : ("@PrestaShop/Admin/layout.html.twig")), "@Modules/ps_mbo/views/templates/admin/error.html.twig", 20);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 22
    public function block_content($context, array $blocks = [])
    {
        // line 23
        echo "  <div class=\"row\">
    <div class=\"col\">
      <div class=\"card\">
        <div class=\"card-body text-center\">
          <img class=\"img-responsive\"
               src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("../modules/ps_mbo/views/img/error.svg"), "html", null, true);
        echo "\"
               alt=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("It looks like we have trouble connecting to Addons. Please refresh the page or check your firewall configuration.", [], "Admin.Notifications.Error"), "html", null, true);
        echo "\"
          >
          <p class=\"mt-3 error-header\">
            ";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("It looks like we have trouble connecting to Addons. Please refresh the page or check your firewall configuration.", [], "Admin.Notifications.Error"), "html", null, true);
        echo "
          </p>
        </div>
      </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "@Modules/ps_mbo/views/templates/admin/error.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 32,  52 => 29,  48 => 28,  41 => 23,  38 => 22,  29 => 20,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@Modules/ps_mbo/views/templates/admin/error.html.twig", "C:\\wamp64\\www\\prestashop\\modules\\ps_mbo\\views\\templates\\admin\\error.html.twig");
    }
}
