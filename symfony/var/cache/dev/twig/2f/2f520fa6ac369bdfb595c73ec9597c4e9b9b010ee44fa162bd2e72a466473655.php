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

/* product/singleProduct.html.twig */
class __TwigTemplate_48abc65c8ae76be2367906237825c6d105e4c0a902ade5954648ad19eff4a4ce extends Template
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
            'scripts' => [$this, 'block_scripts'],
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "product/singleProduct.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "product/singleProduct.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "product/singleProduct.html.twig", 1);
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

        echo "product.name";
        
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
        echo "<div class=\"main\">
    <div class=\"shop_top\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-9 single_left\">
                    <div class=\"single_image\">
                        <ul id=\"etalage\">
                            <li>
                                <a href=\"optionallink.html\">
                                    <img class=\"etalage_thumb_image\" src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/3.jpg"), "html", null, true);
        echo "\" />
                                    <img class=\"etalage_source_image\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/3.jpg"), "html", null, true);
        echo "\" />
                                </a>
                            </li>
                            <li>
                                <img class=\"etalage_thumb_image\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/4.jpg"), "html", null, true);
        echo "\" />
                                <img class=\"etalage_source_image\" src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/4.jpg"), "html", null, true);
        echo "\" />
                            </li>
                            <li>
                                <img class=\"etalage_thumb_image\" src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/5.jpg"), "html", null, true);
        echo "\" />
                                <img class=\"etalage_source_image\" src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/5.jpg"), "html", null, true);
        echo "\" />
                            </li>
                            <li>
                                <img class=\"etalage_thumb_image\" src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/6.jpg"), "html", null, true);
        echo "\" />
                                <img class=\"etalage_source_image\" src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/6.jpg"), "html", null, true);
        echo "\" />
                            </li>
                            <li>
                                <img class=\"etalage_thumb_image\" src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/7.jpg"), "html", null, true);
        echo "\" />
                                <img class=\"etalage_source_image\" src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/7.jpg"), "html", null, true);
        echo "\" />
                            </li>
                            <li>
                                <img class=\"etalage_thumb_image\" src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/8.jpg"), "html", null, true);
        echo "\" />
                                <img class=\"etalage_source_image\" src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/8.jpg"), "html", null, true);
        echo "\" />
                            </li>
                            <li>
                                <img class=\"etalage_thumb_image\" src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/9.jpg"), "html", null, true);
        echo "\" />
                                <img class=\"etalage_source_image\" src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/9.jpg"), "html", null, true);
        echo "\" />
                            </li>
                        </ul>
                    </div>
                    <!-- end product_slider -->
                    <div class=\"single_right\">
                        <h3>hendrerit in vulputate velit </h3>
                        <p class=\"m_10\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse</p>
                        <ul class=\"options\">
                            <h4 class=\"m_12\">Select a Size(cm)</h4>
                            <li><a href=\"#\">151</a></li>
                            <li><a href=\"#\">148</a></li>
                            <li><a href=\"#\">156</a></li>
                            <li><a href=\"#\">145</a></li>
                            <li><a href=\"#\">162(w)</a></li>
                            <li><a href=\"#\">163</a></li>
                        </ul>
                        <ul class=\"product-colors\">
                            <h3>available Colors</h3>
                            <li><a class=\"color1\" href=\"#\"><span> </span></a></li>
                            <li><a class=\"color2\" href=\"#\"><span> </span></a></li>
                            <li><a class=\"color3\" href=\"#\"><span> </span></a></li>
                            <li><a class=\"color4\" href=\"#\"><span> </span></a></li>
                            <li><a class=\"color5\" href=\"#\"><span> </span></a></li>
                            <li><a class=\"color6\" href=\"#\"><span> </span></a></li>
                            <div class=\"clear\"> </div>
                        </ul>
                        <div class=\"btn_form\">
                            <form>
                                <input type=\"submit\" value=\"buy now\" title=\"\">
                            </form>
                        </div>
                        <ul class=\"add-to-links\">
                            <li><img src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/wish.png"), "html", null, true);
        echo "\" alt=\"\"><a href=\"#\">Add to wishlist</a></li>
                        </ul>
                    </div>
                    <div class=\"clear\"> </div>
                </div>
                <div class=\"col-md-3\">
                    <div class=\"box-info-product\">
                        <p class=\"price2\">\$130.25</p>
                        <ul class=\"prosuct-qty\">
                            <span>Quantity:</span>
                            <select>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </ul>
                        <button type=\"submit\" name=\"Submit\" class=\"exclusive\">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class=\"desc\">
                <h4>Description</h4>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores</p>
            </div>
            <div class=\"row\">
                <h4 class=\"m_11\">Related Products in the same Category</h4>
                <div class=\"col-md-4 product1\">
                    <img src=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/s1.jpg"), "html", null, true);
        echo "\" class=\"img-responsive\" alt=\"\"/>
                    <div class=\"shop_desc\"><a href=\"single.html\">
                        </a><h3><a href=\"single.html\"></a><a href=\"#\">aliquam volutp</a></h3>
                        <p>Lorem ipsum consectetuer adipiscing </p>
                        <span class=\"reducedfrom\">\$66.00</span>
                        <span class=\"actual\">\$12.00</span><br>
                        <ul class=\"buttons\">
                            <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                            <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                            <div class=\"clear\"> </div>
                        </ul>
                    </div>
                </div>
                <div class=\"col-md-4 product1\">
                    <img src=\"";
        // line 118
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/s2.jpg"), "html", null, true);
        echo "\" class=\"img-responsive\" alt=\"\"/>
                    <div class=\"shop_desc\"><a href=\"single.html\">
                        </a><h3><a href=\"single.html\"></a><a href=\"#\">aliquam volutp</a></h3>
                        <p>Lorem ipsum consectetuer adipiscing </p>
                        <span class=\"reducedfrom\">\$66.00</span>
                        <span class=\"actual\">\$12.00</span><br>
                        <ul class=\"buttons\">
                            <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                            <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                            <div class=\"clear\"> </div>
                        </ul>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <img src=\"";
        // line 132
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/s3.jpg"), "html", null, true);
        echo "\" class=\"img-responsive\" alt=\"\"/>
                    <div class=\"shop_desc\"><a href=\"single.html\">
                        </a><h3><a href=\"single.html\"></a><a href=\"#\">aliquam volutp</a></h3>
                        <p>Lorem ipsum consectetuer adipiscing </p>
                        <span class=\"reducedfrom\">\$66.00</span>
                        <span class=\"actual\">\$12.00</span><br>
                        <ul class=\"buttons\">
                            <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                            <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                            <div class=\"clear\"> </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 150
    public function block_scripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "scripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "scripts"));

        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("single");
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "product/singleProduct.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  298 => 150,  270 => 132,  253 => 118,  236 => 104,  201 => 72,  165 => 39,  161 => 38,  155 => 35,  151 => 34,  145 => 31,  141 => 30,  135 => 27,  131 => 26,  125 => 23,  121 => 22,  115 => 19,  111 => 18,  104 => 14,  100 => 13,  89 => 4,  79 => 3,  60 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}product.name{% endblock %}
{% block body %}
<div class=\"main\">
    <div class=\"shop_top\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-9 single_left\">
                    <div class=\"single_image\">
                        <ul id=\"etalage\">
                            <li>
                                <a href=\"optionallink.html\">
                                    <img class=\"etalage_thumb_image\" src=\"{{ asset('build/images/3.jpg') }}\" />
                                    <img class=\"etalage_source_image\" src=\"{{ asset('build/images/3.jpg') }}\" />
                                </a>
                            </li>
                            <li>
                                <img class=\"etalage_thumb_image\" src=\"{{ asset('build/images/4.jpg') }}\" />
                                <img class=\"etalage_source_image\" src=\"{{ asset('build/images/4.jpg') }}\" />
                            </li>
                            <li>
                                <img class=\"etalage_thumb_image\" src=\"{{ asset('build/images/5.jpg') }}\" />
                                <img class=\"etalage_source_image\" src=\"{{ asset('build/images/5.jpg') }}\" />
                            </li>
                            <li>
                                <img class=\"etalage_thumb_image\" src=\"{{ asset('build/images/6.jpg') }}\" />
                                <img class=\"etalage_source_image\" src=\"{{ asset('build/images/6.jpg') }}\" />
                            </li>
                            <li>
                                <img class=\"etalage_thumb_image\" src=\"{{ asset('build/images/7.jpg') }}\" />
                                <img class=\"etalage_source_image\" src=\"{{ asset('build/images/7.jpg') }}\" />
                            </li>
                            <li>
                                <img class=\"etalage_thumb_image\" src=\"{{ asset('build/images/8.jpg') }}\" />
                                <img class=\"etalage_source_image\" src=\"{{ asset('build/images/8.jpg') }}\" />
                            </li>
                            <li>
                                <img class=\"etalage_thumb_image\" src=\"{{ asset('build/images/9.jpg') }}\" />
                                <img class=\"etalage_source_image\" src=\"{{ asset('build/images/9.jpg') }}\" />
                            </li>
                        </ul>
                    </div>
                    <!-- end product_slider -->
                    <div class=\"single_right\">
                        <h3>hendrerit in vulputate velit </h3>
                        <p class=\"m_10\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse</p>
                        <ul class=\"options\">
                            <h4 class=\"m_12\">Select a Size(cm)</h4>
                            <li><a href=\"#\">151</a></li>
                            <li><a href=\"#\">148</a></li>
                            <li><a href=\"#\">156</a></li>
                            <li><a href=\"#\">145</a></li>
                            <li><a href=\"#\">162(w)</a></li>
                            <li><a href=\"#\">163</a></li>
                        </ul>
                        <ul class=\"product-colors\">
                            <h3>available Colors</h3>
                            <li><a class=\"color1\" href=\"#\"><span> </span></a></li>
                            <li><a class=\"color2\" href=\"#\"><span> </span></a></li>
                            <li><a class=\"color3\" href=\"#\"><span> </span></a></li>
                            <li><a class=\"color4\" href=\"#\"><span> </span></a></li>
                            <li><a class=\"color5\" href=\"#\"><span> </span></a></li>
                            <li><a class=\"color6\" href=\"#\"><span> </span></a></li>
                            <div class=\"clear\"> </div>
                        </ul>
                        <div class=\"btn_form\">
                            <form>
                                <input type=\"submit\" value=\"buy now\" title=\"\">
                            </form>
                        </div>
                        <ul class=\"add-to-links\">
                            <li><img src=\"{{ asset('build/images/wish.png') }}\" alt=\"\"><a href=\"#\">Add to wishlist</a></li>
                        </ul>
                    </div>
                    <div class=\"clear\"> </div>
                </div>
                <div class=\"col-md-3\">
                    <div class=\"box-info-product\">
                        <p class=\"price2\">\$130.25</p>
                        <ul class=\"prosuct-qty\">
                            <span>Quantity:</span>
                            <select>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </ul>
                        <button type=\"submit\" name=\"Submit\" class=\"exclusive\">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class=\"desc\">
                <h4>Description</h4>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores</p>
            </div>
            <div class=\"row\">
                <h4 class=\"m_11\">Related Products in the same Category</h4>
                <div class=\"col-md-4 product1\">
                    <img src=\"{{ asset('build/images/s1.jpg') }}\" class=\"img-responsive\" alt=\"\"/>
                    <div class=\"shop_desc\"><a href=\"single.html\">
                        </a><h3><a href=\"single.html\"></a><a href=\"#\">aliquam volutp</a></h3>
                        <p>Lorem ipsum consectetuer adipiscing </p>
                        <span class=\"reducedfrom\">\$66.00</span>
                        <span class=\"actual\">\$12.00</span><br>
                        <ul class=\"buttons\">
                            <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                            <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                            <div class=\"clear\"> </div>
                        </ul>
                    </div>
                </div>
                <div class=\"col-md-4 product1\">
                    <img src=\"{{ asset('build/images/s2.jpg') }}\" class=\"img-responsive\" alt=\"\"/>
                    <div class=\"shop_desc\"><a href=\"single.html\">
                        </a><h3><a href=\"single.html\"></a><a href=\"#\">aliquam volutp</a></h3>
                        <p>Lorem ipsum consectetuer adipiscing </p>
                        <span class=\"reducedfrom\">\$66.00</span>
                        <span class=\"actual\">\$12.00</span><br>
                        <ul class=\"buttons\">
                            <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                            <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                            <div class=\"clear\"> </div>
                        </ul>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <img src=\"{{ asset('build/images/s3.jpg') }}\" class=\"img-responsive\" alt=\"\"/>
                    <div class=\"shop_desc\"><a href=\"single.html\">
                        </a><h3><a href=\"single.html\"></a><a href=\"#\">aliquam volutp</a></h3>
                        <p>Lorem ipsum consectetuer adipiscing </p>
                        <span class=\"reducedfrom\">\$66.00</span>
                        <span class=\"actual\">\$12.00</span><br>
                        <ul class=\"buttons\">
                            <li class=\"cart\"><a href=\"#\">Add To Cart</a></li>
                            <li class=\"shop_btn\"><a href=\"#\">Read More</a></li>
                            <div class=\"clear\"> </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
{% block scripts %}{{ encore_entry_script_tags('single') }}{% endblock %}", "product/singleProduct.html.twig", "/var/www/symfony/templates/product/singleProduct.html.twig");
    }
}
