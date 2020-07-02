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

/* @PrestaShop/Admin/Improve/Design/Theme/Blocks/rtl_configuration.html.twig */
class __TwigTemplate_16971d3218f5fbbcb360fc21f54e31d8e48b3ab0cfb5b3dec3e6ce69e045bbe4 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 26
        $context["ps"] = $this->loadTemplate("@PrestaShop/Admin/macros.html.twig", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/rtl_configuration.html.twig", 26);
        // line 27
        echo "
";
        // line 28
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["adaptThemeToRtlLanguagesForm"] ?? null), 'form_start', ["action" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_themes_adapt_to_rtl_languages")]);
        echo "
<div class=\"card\">
  <h3 class=\"card-header\">
    ";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Adaptation to Right-to-Left languages", [], "Admin.Design.Feature"), "html", null, true);
        echo "
  </h3>
  <div class=\"card-block row\">
    <div class=\"card-text\">
      <div class=\"alert alert-info\">
        <p class=\"alert-text\">
          ";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Be careful! Please check your theme in an RTL language before generating the RTL stylesheet: your theme could be already adapted to RTL.
Once you click on \"Adapt to RTL\", any RTL-specific file that you might have added to your theme might be deleted by the created stylesheet.", [], "Admin.Design.Help"), "html", null, true);
        echo "
        </p>
      </div>

      ";
        // line 41
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["adaptThemeToRtlLanguagesForm"] ?? null), "theme_to_adapt", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Theme to adapt", [], "Admin.Design.Feature")]);
        // line 43
        echo "

      ";
        // line 45
        echo $context["ps"]->getform_group_row($this->getAttribute(($context["adaptThemeToRtlLanguagesForm"] ?? null), "generate_rtl_css", []), [], ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Generate RTL stylesheet", [], "Admin.Design.Feature")]);
        // line 47
        echo "
    </div>
  </div>

  ";
        // line 51
        if ((($context["isMultiShopFeatureUsed"] ?? null) && ($context["isSingleShopContext"] ?? null))) {
            // line 52
            echo "    <hr>
    <div class=\"card-block row\">
      <div class=\"card-text\">
        ";
            // line 55
            echo $context["ps"]->getmultistore_switch($this->getAttribute(($context["shopLogosForm"] ?? null), "shop_logos", []), ["label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Multistore", [], "Admin.Global")]);
            // line 57
            echo "
      </div>
    </div>
  ";
        }
        // line 61
        echo "  <div class=\"card-footer\">
    <div class=\"d-flex justify-content-end\">
      <button class=\"btn btn-primary\">
        ";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions"), "html", null, true);
        echo "
      </button>
    </div>
  </div>
</div>
";
        // line 69
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["adaptThemeToRtlLanguagesForm"] ?? null), 'rest');
        echo "
";
        // line 70
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["adaptThemeToRtlLanguagesForm"] ?? null), 'form_end');
        echo "
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Improve/Design/Theme/Blocks/rtl_configuration.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 70,  103 => 69,  95 => 64,  90 => 61,  84 => 57,  82 => 55,  77 => 52,  75 => 51,  69 => 47,  67 => 45,  63 => 43,  61 => 41,  53 => 37,  44 => 31,  38 => 28,  35 => 27,  33 => 26,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Improve/Design/Theme/Blocks/rtl_configuration.html.twig", "C:\\wamp64\\www\\prestashop\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Improve\\Design\\Theme\\Blocks\\rtl_configuration.html.twig");
    }
}
