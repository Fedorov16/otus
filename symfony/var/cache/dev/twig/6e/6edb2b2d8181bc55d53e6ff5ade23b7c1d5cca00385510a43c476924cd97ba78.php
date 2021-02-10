<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* product/product.html.twig */
class __TwigTemplate_524f3f9c88b64902828de47c4fdd7f13b442ee588844e02252c6dda8d87ae1b3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "product/product.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "product/product.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "product/product.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Products";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 4, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 5
            echo "    <h4>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 5), "html", null, true);
            echo "</h4>
    <h4>";
            // line 6
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 6), "html", null, true);
            echo "</h4>
    <h4>";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["product"], "category", [], "any", false, false, false, 7), "html", null, true);
            echo "</h4>

    <div class=\"main\">
        <div class=\"shop_top\">
            <div class=\"container\">
                <div class=\"row shop_box-top\">
                    <div class=\"col-md-3 shop_box\"><a href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("productproduct", ["id" => twig_get_attribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 13)]), "html", null, true);
            echo "\">
                            <img src=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/pic5.jpg"), "html", null, true);
            echo "\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <span class=\"sale-box\">
\t\t\t\t\t\t<span class=\"sale-label\">Sale!</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"reducedfrom\">\$66.00</span>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/pic6.jpg"), "html", null, true);
            echo "\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"";
            // line 50
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/pic7.jpg"), "html", null, true);
            echo "\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <span class=\"sale-box\">
\t\t\t\t\t\t<span class=\"sale-label\">Sale!</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"reducedfrom\">\$66.00</span>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/pic8.jpg"), "html", null, true);
            echo "\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"reducedfrom\">\$66.00</span>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"";
            // line 89
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/pic9.jpg"), "html", null, true);
            echo "\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"";
            // line 105
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/pic10.jpg"), "html", null, true);
            echo "\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <span class=\"sale-box\">
\t\t\t\t\t\t<span class=\"sale-label\">Sale!</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"";
            // line 124
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/pic11.jpg"), "html", null, true);
            echo "\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"reducedfrom\">\$66.00</span>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"";
            // line 141
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/pic12.jpg"), "html", null, true);
            echo "\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <span class=\"sale-box\">
\t\t\t\t\t\t<span class=\"sale-label\">Sale!</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"reducedfrom\">\$66.00</span>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                </div>
            </div>
        </div>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "product/product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  263 => 141,  243 => 124,  221 => 105,  202 => 89,  180 => 70,  157 => 50,  138 => 34,  115 => 14,  111 => 13,  102 => 7,  98 => 6,  93 => 5,  88 => 4,  78 => 3,  59 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}Products{% endblock %}
{% block body %}
    {% for product in products %}
    <h4>{{ product.name }}</h4>
    <h4>{{ product.description }}</h4>
    <h4>{{ product.category }}</h4>

    <div class=\"main\">
        <div class=\"shop_top\">
            <div class=\"container\">
                <div class=\"row shop_box-top\">
                    <div class=\"col-md-3 shop_box\"><a href=\"{{ path('productproduct', {id:product.id}) }}\">
                            <img src=\"{{ asset('build/images/pic5.jpg') }}\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <span class=\"sale-box\">
\t\t\t\t\t\t<span class=\"sale-label\">Sale!</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"reducedfrom\">\$66.00</span>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"{{ asset('build/images/pic6.jpg') }}\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"{{ asset('build/images/pic7.jpg') }}\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <span class=\"sale-box\">
\t\t\t\t\t\t<span class=\"sale-label\">Sale!</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"reducedfrom\">\$66.00</span>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"{{ asset('build/images/pic8.jpg') }}\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"reducedfrom\">\$66.00</span>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                </div>
                <div class=\"row\">
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"{{ asset('build/images/pic9.jpg') }}\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"{{ asset('build/images/pic10.jpg') }}\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <span class=\"sale-box\">
\t\t\t\t\t\t<span class=\"sale-label\">Sale!</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"{{ asset('build/images/pic11.jpg') }}\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"reducedfrom\">\$66.00</span>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                    <div class=\"col-md-3 shop_box\"><a href=\"single.html\">
                            <img src=\"{{ asset('build/images/pic12.jpg') }}\" class=\"img-responsive\" alt=\"\"/>
                            <span class=\"new-box\">
\t\t\t\t\t\t<span class=\"new-label\">New</span>
\t\t\t\t\t</span>
                            <span class=\"sale-box\">
\t\t\t\t\t\t<span class=\"sale-label\">Sale!</span>
\t\t\t\t\t</span>
                            <div class=\"shop_desc\">
                                <h3><a href=\"#\">aliquam volutp</a></h3>
                                <p>Lorem ipsum consectetuer adipiscing </p>
                                <span class=\"reducedfrom\">\$66.00</span>
                                <span class=\"actual\">\$12.00</span><br>
                                <ul class=\"buttons\">
                                    <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                                    <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                                    <div class=\"clear\"> </div>
                                </ul>
                            </div>
                        </a></div>
                </div>
            </div>
        </div>
    </div>
    {% endfor %}
{% endblock %}
", "product/product.html.twig", "/var/www/symfony/templates/product/product.html.twig");
    }
}
