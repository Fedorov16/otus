(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["single"],{

/***/ "./assets/js/jquery.etalage.min.js":
/*!*****************************************!*\
  !*** ./assets/js/jquery.etalage.min.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*
 * Title: jQuery Etalage plugin
 * Author: Berend de Jong, Frique
 * Author URI: http://www.frique.me/
 * Version: 1.3.4 (20130622.1)
 */
(function (a) {
  a.fn.etalage = function (b) {
    var c = a.extend({
      align: "left",
      thumb_image_width: 300,
      thumb_image_height: 400,
      source_image_width: 900,
      source_image_height: 1200,
      zoom_area_width: 600,
      zoom_area_height: "justify",
      zoom_area_distance: 10,
      zoom_easing: true,
      click_to_zoom: false,
      zoom_element: "auto",
      show_descriptions: true,
      description_location: "bottom",
      description_opacity: 0.7,
      small_thumbs: 3,
      smallthumb_inactive_opacity: 0.4,
      smallthumb_hide_single: true,
      smallthumb_select_on_hover: false,
      smallthumbs_position: "bottom",
      show_begin_end_smallthumb: true,
      magnifier_opacity: 0.5,
      magnifier_invert: true,
      show_icon: true,
      icon_offset: 20,
      hide_cursor: false,
      show_hint: false,
      hint_offset: 15,
      speed: 600,
      autoplay: true,
      autoplay_interval: 6000,
      keyboard: true,
      right_to_left: false,
      click_callback: function click_callback() {
        return true;
      },
      change_callback: function change_callback() {
        return true;
      }
    }, b);
    a.each(this, function () {
      var aG = a(this);

      if (aG.is("ul") && aG.children("li").length && aG.find("img.etalage_source_image").length) {
        var aP = function aP(a2) {
          z = z ? z - 1 : 0;
          ai = true;
          var a1 = aG.find(".etalage_smallthumb_first").removeClass("etalage_smallthumb_first");
          var i = aG.find(".etalage_smallthumb_last").removeClass("etalage_smallthumb_last");
          var a3, j, a5, a4;

          if (a2 === "left") {
            a3 = a1.prev().addClass("etalage_smallthumb_first");
            j = i.prev().addClass("etalage_smallthumb_last");
            a5 = a1;
          } else {
            a3 = a1.next().addClass("etalage_smallthumb_first");
            j = i.next().addClass("etalage_smallthumb_last");
            a5 = i;
          }

          if (z) {
            if (a2 === "left") {
              a3.trigger("click");
            } else {
              j.trigger("click");
            }
          } else {
            a4 = aF === "vert" ? a3.position().top : a3.position().left;
            G(a4, a3, j, a5);
          }
        };

        var m = function m(a5) {
          ai = true;
          var a1 = aG.find(".etalage_smallthumb_first").removeClass("etalage_smallthumb_first");
          var i = aG.find(".etalage_smallthumb_last").removeClass("etalage_smallthumb_last");
          var a2, j, a4;

          if (a5 === "end") {
            a2 = aV.eq(y - aj).addClass("etalage_smallthumb_first");
            j = aV.eq(y - 1).addClass("etalage_smallthumb_last");
            a4 = j;

            if (j.hasClass("etalage_smallthumb_navtostart")) {
              a4 = j.prev();
            }
          } else {
            a2 = aV.eq(0).addClass("etalage_smallthumb_first");
            j = aV.eq(aj - 1).addClass("etalage_smallthumb_last");
            a4 = a2;

            if (a2.hasClass("etalage_smallthumb_navtoend")) {
              a4 = a2.next();
            }
          }

          var a3 = aF === "vert" ? a2.position().top : a2.position().left;
          G(a3, a2, j, a4);
        };

        var ac = function ac() {
          m("start");
        };

        var F = function F() {
          m("end");
        };

        var ad,
            ab,
            Q,
            I,
            aq,
            t,
            f,
            aS,
            aL,
            aw,
            aR = aG.attr("id"),
            aZ = Math.floor(c.speed * 0.7),
            aC = Math.round(c.speed / 100),
            ai = false,
            z = 0,
            e = false,
            ao = true,
            A = false,
            x = 0,
            al = 0,
            ak = 0,
            Y = 0,
            X = 0,
            aF = "hori";

        if (typeof aR === "undefined" || !aR) {
          aR = "[no id]";
        }

        if (c.smallthumbs_position === "left" || c.smallthumbs_position === "right") {
          aF = "vert";
        }

        if (_typeof(a.browser) === "object" && a.browser.msie) {
          if (a.browser.version < 9) {
            ao = false;

            if (a.browser.version < 7) {
              e = true;
            }
          }
        }

        aG.addClass("etalage").show();
        var w = aG.children("li").addClass("etalage_thumb");
        w.first().show().addClass("etalage_thumb_active");
        var q = w.length,
            aJ = c.autoplay;

        if (q < 2) {
          aJ = false;
        }

        if (c.align === "right") {
          aG.addClass("etalage_right");
        }

        a.each(w, function (a1) {
          a1 += 1;
          var a4 = a(this),
              j = a4.find(".etalage_thumb_image").removeAttr("alt").show(),
              a3 = a4.find(".etalage_source_image"),
              a2 = a4.find("a");
          a4.data("id", a1).addClass("thumb_" + a1);

          if (!j.length && a3.length) {
            a4.prepend('<img class="etalage_thumb_image" src="' + a3.attr("src") + '" />');
          } else {
            if (!j.length && !a3.length) {
              a4.remove();
            }
          }

          if (a2.length) {
            a4.find(".etalage_thumb_image").data("anchor", a2.attr("href"));
          }
        });
        var av = w.find(".etalage_thumb_image").css({
          width: c.thumb_image_width,
          height: c.thumb_image_height
        }).show();
        a.each(av, function () {
          a(this).data("src", this.src);
        });
        var aO = a('<li class="etalage_magnifier"><div><img /></div></li>').appendTo(aG),
            aa = aO.children("div"),
            h = aa.children("img");
        var E = a('<li class="etalage_icon">&nbsp;</li>').appendTo(aG);

        if (c.show_icon) {
          E.show();
        }

        var r;

        if (c.show_hint) {
          r = a('<li class="etalage_hint">&nbsp;</li>').appendTo(aG).show();
        }

        var K,
            s = c.zoom_element;

        if (s !== "auto" && s && a(s).length) {
          K = a(s).addClass("etalage_zoom_area").html('<div><img class="etalage_zoom_img" /></div>');
        } else {
          s = "auto";
          K = a('<li class="etalage_zoom_area"><div><img class="etalage_zoom_img" /></div></li>').appendTo(aG);
        }

        var W = K.children("div"),
            an;

        if (ao) {
          an = a('<img class="etalage_zoom_preview" />').css({
            width: c.source_image_width,
            height: c.source_image_height,
            opacity: 0.3
          }).prependTo(W).show();
        }

        var aB = W.children(".etalage_zoom_img").css({
          width: c.source_image_width,
          height: c.source_image_height
        });
        var az;

        if (c.show_descriptions) {
          az = a('<div class="etalage_description' + (c.right_to_left ? " rtl" : "") + '"></div>').prependTo(K);
        }

        var aQ,
            l,
            aV,
            u,
            y,
            aj = c.small_thumbs;

        if (q > 1 || !c.smallthumb_hide_single) {
          aQ = a('<li class="etalage_small_thumbs"><ul></ul></li>').appendTo(aG);
          l = aQ.children("ul");
          a.each(av, function () {
            var i = a(this);
            Q = i.data("src");
            I = i.parents(".etalage_thumb").data("id");
            a('<li><img class="etalage_small_thumb" src="' + Q + '" /></li>').data("thumb_id", I).appendTo(l);
          });
          aV = l.children("li").css({
            opacity: c.smallthumb_inactive_opacity
          });

          if (aj < 3) {
            aj = 3;
          }

          if (q > aj) {
            if (c.show_begin_end_smallthumb) {
              Q = av.eq(q - 1).data("src");
              I = w.eq(q - 1).data("id");
              a('<li class="etalage_smallthumb_first etalage_smallthumb_navtoend"><img class="etalage_small_thumb" src="' + Q + '" /></li>').data("src", Q).data("thumb_id", I).css({
                opacity: c.smallthumb_inactive_opacity
              }).prependTo(l);
              Q = av.eq(0).data("src");
              I = w.eq(0).data("id");
              a('<li class="etalage_smallthumb_navtostart"><img class="etalage_small_thumb" src="' + Q + '" /></li>').data("src", Q).data("thumb_id", I).css({
                opacity: c.smallthumb_inactive_opacity
              }).appendTo(l);
              aV = l.children("li");
              aV.eq(1).addClass("etalage_smallthumb_active").css({
                opacity: 1
              });
            } else {
              aV.eq(0).addClass("etalage_smallthumb_first etalage_smallthumb_active").css({
                opacity: 1
              });
            }

            aV.eq(aj - 1).addClass("etalage_smallthumb_last");
          } else {
            aV.eq(0).addClass("etalage_smallthumb_active").css({
              opacity: 1
            });
          }

          a.each(aV, function (j) {
            a(this).data("id", j + 1);
          });
          u = aV.children("img");
          y = aV.length;

          if (aF === "vert") {
            aV.addClass("vertical");
          }
        }

        if (c.magnifier_invert) {
          aq = 1;
        } else {
          aq = c.magnifier_opacity;
        }

        var aN = parseInt(w.css("borderLeftWidth"), 10) + parseInt(w.css("borderRightWidth"), 10) + parseInt(av.css("borderLeftWidth"), 10) + parseInt(av.css("borderRightWidth"), 10),
            Z = parseInt(w.css("marginLeft"), 10) + parseInt(w.css("marginRight"), 10),
            B = parseInt(w.css("paddingLeft"), 10) + parseInt(w.css("paddingRight"), 10) + parseInt(av.css("marginLeft"), 10) + parseInt(av.css("marginRight"), 10) + parseInt(av.css("paddingLeft"), 10) + parseInt(av.css("paddingRight"), 10),
            N = c.thumb_image_width + aN + Z + B,
            O = c.thumb_image_height + aN + Z + B,
            aE = 0,
            P = 0,
            ax = 0,
            ag = 0,
            aD = 0,
            o = 0,
            aH = 0;

        if (q > 1 || !c.smallthumb_hide_single) {
          aE = parseInt(aV.css("borderLeftWidth"), 10) + parseInt(aV.css("borderRightWidth"), 10) + parseInt(u.css("borderLeftWidth"), 10) + parseInt(u.css("borderRightWidth"), 10);
          P = parseInt(aV.css("marginTop"), 10);
          ax = parseInt(aV.css("paddingLeft"), 10) + parseInt(aV.css("paddingRight"), 10) + parseInt(u.css("marginLeft"), 10) + parseInt(u.css("marginRight"), 10) + parseInt(u.css("paddingLeft"), 10) + parseInt(u.css("paddingRight"), 10);

          if (aF === "vert") {
            aD = Math.round((O - (aj - 1) * P) / aj) - (aE + ax);
            ag = Math.round(c.thumb_image_width * aD / c.thumb_image_height);
            o = ag + aE + ax;
            aH = aD + aE + ax;
          } else {
            ag = Math.round((N - (aj - 1) * P) / aj) - (aE + ax);
            aD = Math.round(c.thumb_image_height * ag / c.thumb_image_width);
            o = ag + aE + ax;
            aH = aD + aE + ax;
          }
        }

        var d = parseInt(K.css("borderTopWidth"), 10),
            aA = parseInt(c.zoom_area_distance, 10),
            J = parseInt(K.css("paddingTop"), 10),
            T,
            a0;

        if (c.zoom_area_width - d * 2 - J * 2 > c.source_image_width) {
          T = c.source_image_width;
        } else {
          T = c.zoom_area_width - d * 2 - J * 2;
        }

        if (c.zoom_area_height === "justify") {
          a0 = O + P + aH - d * 2 - J * 2;
        } else {
          a0 = c.zoom_area_height - d * 2 - J * 2;
        }

        if (a0 > c.source_image_height) {
          a0 = c.source_image_height;
        }

        var aX, at, v, ar;

        if (c.show_descriptions) {
          aX = parseInt(az.css("borderLeftWidth"), 10) + parseInt(az.css("borderRightWidth"), 10);
          at = parseInt(az.css("marginLeft"), 10) + parseInt(az.css("marginRight"), 10);
          v = parseInt(az.css("paddingLeft"), 10) + parseInt(az.css("paddingRight"), 10);
          ar = T - aX - at - v;
        }

        var aM;

        if (e) {
          aM = a('<iframe marginwidth="0" marginheight="0" scrolling="no" frameborder="0" src="javascript:\'<html></html>\'"></iframe>').css({
            position: "absolute",
            zIndex: 1
          }).prependTo(K);
        }

        var S = parseInt(aO.css("borderTopWidth"), 10),
            aK = parseInt(w.css("borderTopWidth"), 10) + parseInt(w.css("marginTop"), 10) + parseInt(w.css("paddingTop"), 10) + parseInt(av.css("borderTopWidth"), 10) + parseInt(av.css("marginTop"), 10) - S,
            am = av.offset().left - aG.offset().left - S;

        if (c.smallthumbs_position === "left") {
          am = am + o + P;
        } else {
          if (c.smallthumbs_position === "top") {
            aK = aK + aH + P;
          }
        }

        var V = Math.round(T * (c.thumb_image_width / c.source_image_width)),
            R = Math.round(a0 * (c.thumb_image_height / c.source_image_height)),
            M = aK + c.thumb_image_height - R,
            p = am + c.thumb_image_width - V,
            af = Math.round(V / 2),
            ae = Math.round(R / 2),
            H,
            C;

        if (c.show_hint) {
          H = parseInt(c.hint_offset, 10) + parseInt(r.css("marginTop"), 10);
          C = parseInt(c.hint_offset, 10) + parseInt(r.css("marginRight"), 10);

          if (c.smallthumbs_position === "right") {
            C = C - o - P;
          }
        }

        if (aF === "vert") {
          aS = N + P + o;
          aG.css({
            width: aS,
            height: O
          });
        } else {
          aS = N;
          aG.css({
            width: aS,
            height: O + P + aH
          });
        }

        if (c.show_icon) {
          aw = {
            top: O - E.outerHeight(true) - parseInt(c.icon_offset, 10),
            left: parseInt(c.icon_offset, 10)
          };

          if (c.smallthumbs_position === "left") {
            aw.left = o + P + parseInt(c.icon_offset, 10);
          } else {
            if (c.smallthumbs_position === "top") {
              aw.top += aH + P;
            }
          }

          E.css(aw);
        }

        if (c.show_hint) {
          r.css({
            margin: 0,
            top: -H,
            right: -C
          });
        }

        h.css({
          margin: 0,
          padding: 0,
          width: c.thumb_image_width,
          height: c.thumb_image_height
        });
        aa.css({
          margin: 0,
          padding: 0,
          width: V,
          height: R
        });
        aw = {
          margin: 0,
          padding: 0,
          left: (p - am) / 2,
          top: (M - aK) / 2
        };

        if (c.smallthumbs_position === "left") {
          aw.left = "+=" + o + P;
        } else {
          if (c.smallthumbs_position === "top") {
            aw.top = "+=" + aH + P;
          }
        }

        aO.css(aw).hide();
        W.css({
          width: T,
          height: a0
        });
        aw = {
          margin: 0,
          opacity: 0
        };

        if (c.align === "right" && s === "auto") {
          aw.left = -(T + d * 2 + J * 2 + aA);
        } else {
          if (s === "auto") {
            aw.left = aS + aA;
          }
        }

        K.css(aw).hide();

        if (c.show_descriptions) {
          aw = {
            width: ar,
            bottom: J,
            left: J,
            opacity: c.description_opacity
          };

          if (c.description_location === "top") {
            aw.top = J;
            aw.bottom = "auto";
          }

          az.css(aw).hide();
        }

        if (q > 1 || !c.smallthumb_hide_single) {
          if (aF === "vert") {
            aw = {
              top: 0,
              height: O
            };

            if (c.smallthumbs_position === "left") {
              w.css({
                left: o + P
              });
            } else {
              aw.marginLeft = N + P;
            }

            aQ.css(aw);
            l.css({
              height: aH * y + y * P + 100
            });
            u.css({
              width: ag,
              height: aD
            }).attr("height", aD);
            aV.css({
              margin: 0,
              marginBottom: P
            });
          } else {
            aw = {
              width: N
            };

            if (c.smallthumbs_position === "top") {
              w.css({
                top: aH + P
              });
            } else {
              aw.top = O + P;
            }

            aQ.css(aw);
            l.css({
              width: o * y + y * P + 100
            });
            u.css({
              width: ag,
              height: aD
            }).attr("width", ag);
            aV.css({
              margin: 0,
              marginRight: P
            });
          }

          if (aF === "vert") {
            aL = aH * aj + (aj - 1) * P - O;
          } else {
            aL = o * aj + (aj - 1) * P - N;
          }

          if (aL > 0) {
            for (ad = 1; ad <= y - 1; ad = ad + (aj - 1)) {
              ab = 1;

              for (ab; ab <= aL; ab += 1) {
                if (aF === "vert") {
                  aV.eq(ad + ab - 1).css({
                    marginBottom: P - 1
                  });
                } else {
                  aV.eq(ad + ab - 1).css({
                    marginRight: P - 1
                  });
                }
              }
            }
          } else {
            if (aL < 0) {
              for (ad = 1; ad <= y - 1; ad = ad + (aj - 1)) {
                ab = 1;

                for (ab; ab <= -aL; ab += 1) {
                  if (aF === "vert") {
                    aV.eq(ad + ab - 1).css({
                      marginBottom: P + 1
                    });
                    l.css({
                      height: parseInt(l.css("height"), 10) + 1
                    });
                  } else {
                    aV.eq(ad + ab - 1).css({
                      marginRight: P + 1
                    });
                    l.css({
                      width: parseInt(l.css("width"), 10) + 1
                    });
                  }
                }
              }
            }
          }
        }

        if (c.show_icon && !c.magnifier_invert) {
          aO.css({
            background: aO.css("background-color") + " " + E.css("background-image") + " center no-repeat"
          });
        }

        if (c.hide_cursor) {
          aO.add(E).css({
            cursor: "none"
          });
        }

        if (e) {
          aM.css({
            width: W.css("width"),
            height: W.css("height")
          });
        }

        var ay = w.first().find(".etalage_thumb_image"),
            ap = w.first().find(".etalage_source_image");

        if (c.magnifier_invert) {
          h.attr("src", ay.data("src")).show();
        }

        if (ao) {
          an.attr("src", ay.data("src"));
        }

        aB.attr("src", ap.attr("src"));

        if (c.show_descriptions) {
          f = ap.attr("title");

          if (f) {
            az.html(f).show();
          }
        }

        var D = function D() {
          if (t) {
            clearInterval(t);
            t = false;
          }
        };

        var k = function k() {
          if (t) {
            D();
          }

          t = setInterval(function () {
            au();
          }, c.autoplay_interval);
        };

        var U = function U() {
          aO.stop().fadeTo(aZ, aq);
          E.stop().animate({
            opacity: 0
          }, aZ);
          K.stop().show().animate({
            opacity: 1
          }, aZ);

          if (c.magnifier_invert) {
            ay.stop().animate({
              opacity: c.magnifier_opacity
            }, aZ);
          }

          if (aJ) {
            D();
          }
        };

        var aW = function aW() {
          aO.stop().fadeOut(c.speed);
          E.stop().animate({
            opacity: 1
          }, c.speed);
          K.stop().animate({
            opacity: 0
          }, c.speed, function () {
            a(this).hide();
          });

          if (c.magnifier_invert) {
            ay.stop().animate({
              opacity: 1
            }, c.speed, function () {
              if (c.click_to_zoom) {
                A = false;
              }
            });
          }

          clearTimeout(x);

          if (aJ) {
            k();
          }
        };

        var g = function g(a3, a1) {
          var j,
              a2,
              i = aG.find(".etalage_smallthumb_active").removeClass("etalage_smallthumb_active");
          a3.addClass("etalage_smallthumb_active");
          aO.stop().hide();
          K.stop().hide();

          if (!a1) {
            ai = true;
            i.stop(true, true).animate({
              opacity: c.smallthumb_inactive_opacity
            }, aZ);
            a3.stop(true, true).animate({
              opacity: 1
            }, aZ, function () {
              ai = false;
            });
          }

          aG.find(".etalage_thumb_active").removeClass("etalage_thumb_active").stop().animate({
            opacity: 0
          }, c.speed, function () {
            a(this).hide();
          });
          j = w.filter(".thumb_" + a3.data("thumb_id")).addClass("etalage_thumb_active").show().stop().css({
            opacity: 0
          }).animate({
            opacity: 1
          }, c.speed);
          ay = j.find(".etalage_thumb_image");
          ap = j.find(".etalage_source_image");

          if (c.magnifier_invert) {
            h.attr("src", ay.data("src"));
          }

          if (ao) {
            an.attr("src", ay.data("src"));
          }

          aB.attr("src", ap.attr("src"));

          if (c.show_descriptions) {
            f = ap.attr("title");

            if (f) {
              az.html(f).show();
            } else {
              az.hide();
            }
          }

          if (aJ) {
            D();
            k();
          }

          a2 = a3.data("id");

          if (q >= aj) {
            a2--;
          }

          ah(a2);
        };

        var G = function G(a2, j, i, a1) {
          a.each(aV, function () {
            var a4 = a(this),
                a3 = {
              opacity: c.smallthumb_inactive_opacity
            };

            if (a4.data("id") === a1.data("id")) {
              a3.opacity = 1;
            }

            if (aF === "vert") {
              a3.top = "-=" + a2;
            } else {
              a3.left = "-=" + a2;
            }

            a4.animate(a3, aZ, "swing", function () {
              if (ai) {
                a1.addClass("etalage_smallthumb_active");
                ai = false;
              }
            });
          });
          g(a1, true);
        };

        var aY = function aY() {
          var a2 = Y - al,
              a1 = X - ak,
              j = -a2 / aC,
              i = -a1 / aC;
          al = al - j;
          ak = ak - i;

          if (a2 < 1 && a2 > -1) {
            al = Y;
          }

          if (a1 < 1 && a1 > -1) {
            ak = X;
          }

          aB.css({
            left: al,
            top: ak
          });

          if (ao) {
            an.css({
              left: al,
              top: ak
            });
          }

          if (a2 > 1 || a1 > 1 || a2 < 1 || a1 < 1) {
            x = setTimeout(function () {
              aY();
            }, 25);
          }
        };

        var L = function L() {
          var i;

          if (c.magnifier_invert) {
            aG.find(".etalage_thumb_active").mouseleave();
          }

          if (!c.right_to_left) {
            i = aG.find(".etalage_smallthumb_active").prev();

            if (!i.length) {
              if (q > aj) {
                F();
              } else {
                aV.last().trigger("click");
              }

              return true;
            }
          } else {
            i = aG.find(".etalage_smallthumb_active").next();

            if (!i.length) {
              if (q > aj) {
                ac();
              } else {
                aV.first().trigger("click");
              }

              return true;
            }
          }

          i.trigger("click");
        };

        var au = function au() {
          var i;

          if (c.magnifier_invert) {
            aG.find(".etalage_thumb_active").mouseleave();
          }

          if (!c.right_to_left) {
            i = aG.find(".etalage_smallthumb_active").next();

            if (!i.length) {
              if (q > aj) {
                ac();
              } else {
                aV.first().trigger("click");
              }

              return true;
            }
          } else {
            i = aG.find(".etalage_smallthumb_active").prev();

            if (!i.length) {
              if (q > aj) {
                F();
              } else {
                aV.last().trigger("click");
              }

              return true;
            }
          }

          i.trigger("click");
        };

        var n = function n(a2) {
          if (q <= aj || !c.show_begin_end_smallthumb) {
            a2 = a2 - 1;
          }

          var a6 = aV.eq(a2);

          if (a6.length && !ai) {
            var a5 = aG.find(".etalage_smallthumb_active"),
                a1 = a5.data("id") - 1,
                j;

            if (a1 > a2) {
              z = a1 - a2;
              var a3 = aG.find(".etalage_smallthumb_first"),
                  a7 = a3.data("id");

              if (a2 < a7) {
                j = a1 - a7;
                z = z - j;
                a3.trigger("click");
              } else {
                g(a6, false);
              }
            } else {
              if (a1 < a2) {
                z = a2 - a1;
                var a4 = aG.find(".etalage_smallthumb_last"),
                    i = a4.data("id") - 1;

                if (a2 >= i) {
                  j = i - a1 - 1;
                  z = z - j;
                  a4.trigger("click");
                } else {
                  g(a6, false);
                }
              }
            }
          }
        };

        window[aR + "_previous"] = function () {
          L();
        };

        window[aR + "_next"] = function () {
          au();
        };

        window[aR + "_show"] = function (i) {
          n(i);
        };

        var aI = function aI(i) {
          if (!c.click_callback(i, aR)) {
            return false;
          }

          if (typeof etalage_click_callback === "function") {
            etalage_click_callback(i, aR);
            return false;
          }

          return true;
        };

        var ah = function ah(i) {
          if (c.change_callback(i, aR)) {
            if (typeof etalage_change_callback === "function") {
              etalage_change_callback(i, aR);
            }
          }
        };

        w.add(aO).add(E).mouseenter(function () {
          if (c.show_hint) {
            r.hide();
          }

          if (!c.click_to_zoom || A) {
            U();
          }
        }).mouseleave(function () {
          aW();
        });
        var aU = -(c.source_image_width - T),
            aT = -(c.source_image_height - a0);
        w.add(aO).add(E).mousemove(function (a5) {
          var j = Math.round(a5.pageX - ay.offset().left + am),
              i = Math.round(a5.pageY - ay.offset().top + aK);
          var a4 = j - af,
              a3 = i - ae;

          if (a4 < am) {
            a4 = am;
          }

          if (a4 > p) {
            a4 = p;
          }

          if (a3 < aK) {
            a3 = aK;
          }

          if (a3 > M) {
            a3 = M;
          }

          aO.css({
            left: a4,
            top: a3
          });

          if (c.magnifier_invert) {
            var a2 = a4 - am,
                a1 = a3 - aK;
            h.css({
              left: -a2,
              top: -a1
            });
          }

          Y = -((a4 - am) * (1 / (c.thumb_image_width / c.source_image_width)));
          X = -((a3 - aK) * (1 / (c.thumb_image_height / c.source_image_height)));

          if (Y < aU) {
            Y = aU;
          }

          if (X < aT) {
            X = aT;
          }

          if (c.zoom_easing) {
            clearTimeout(x);
            aY();
          } else {
            if (ao) {
              an.css({
                left: Y,
                top: X
              });
            }

            aB.css({
              left: Y,
              top: X
            });
          }
        });

        if (q > 1 || !c.smallthumb_hide_single) {
          aV.click(function () {
            var a7 = a(this),
                a3,
                j = 0,
                a5 = false,
                a2,
                a8,
                a4,
                a6,
                a1;

            if (!a7.hasClass("etalage_smallthumb_active") && (!ai || z)) {
              if (a7.hasClass("etalage_smallthumb_first") && a7.prev().length) {
                aP("left");
              } else {
                if (a7.hasClass("etalage_smallthumb_navtoend")) {
                  F();
                } else {
                  if (a7.hasClass("etalage_smallthumb_last") && a7.next().length) {
                    aP("right");
                  } else {
                    if (a7.hasClass("etalage_smallthumb_navtostart")) {
                      ac();
                    } else {
                      if (z && !a(this).next().length) {
                        F();
                        return true;
                      } else {
                        if (z && !a(this).prev().length) {
                          ac();
                          return true;
                        }
                      }

                      g(a7, false);
                    }
                  }
                }
              }
            }
          });

          if (c.smallthumb_select_on_hover) {
            aV.mouseenter(function () {
              a(this).trigger("click");
            });
          }
        }

        if (c.click_to_zoom) {
          w.click(function () {
            A = true;
            U();
          });
        } else {
          aO.click(function () {
            var i = ay.data("anchor");

            if (i) {
              if (aI(i)) {
                window.location = i;
              }
            }
          });
        }

        if (q > 1 && c.keyboard) {
          a(document).keydown(function (i) {
            if (i.keyCode === 39 || i.keyCode === "39") {
              if (!c.right_to_left) {
                au();
              } else {
                L();
              }
            }

            if (i.keyCode === 37 || i.keyCode === "37") {
              if (!c.right_to_left) {
                L();
              } else {
                au();
              }
            }
          });
        }

        a(window).bind("load", function () {
          w.css({
            "background-image": "none"
          });
          K.css({
            "background-image": "none"
          });

          if (ao) {
            ao = false;
            an.remove();
          }
        });

        if (aJ) {
          k();
        }
      }
    });
    return this;
  };
})(jQuery);

/***/ }),

/***/ "./assets/js/single.js":
/*!*****************************!*\
  !*** ./assets/js/single.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(".dropdown img.flag").addClass("flagvisibility");
$(".dropdown dt a").click(function () {
  $(".dropdown dd ul").toggle();
});
$(".dropdown dd ul li a").click(function () {
  var text = $(this).html();
  $(".dropdown dt a span").html(text);
  $(".dropdown dd ul").hide();
  $("#result").html("Selected value is: " + getSelectedValue("sample"));
});

function getSelectedValue(id) {
  return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function (e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});
$("#flagSwitcher").click(function () {
  $(".dropdown img.flag").toggleClass("flagvisibility");
});
$('#etalage').etalage({
  thumb_image_width: 300,
  thumb_image_height: 400,
  show_hint: true,
  click_callback: function click_callback(image_anchor, instance_id) {
    alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
  }
}); // This is for the dropdown list example:

$('.dropdownlist').change(function () {
  etalage_show($(this).find('option:selected').attr('class'));
});

/***/ }),

/***/ "./assets/singlePage.js":
/*!******************************!*\
  !*** ./assets/singlePage.js ***!
  \******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _js_jquery_etalage_min__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./js/jquery.etalage.min */ "./assets/js/jquery.etalage.min.js");
/* harmony import */ var _js_jquery_etalage_min__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_js_jquery_etalage_min__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _js_single__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js/single */ "./assets/js/single.js");
/* harmony import */ var _js_single__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_js_single__WEBPACK_IMPORTED_MODULE_1__);



/***/ })

},[["./assets/singlePage.js","runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvanF1ZXJ5LmV0YWxhZ2UubWluLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9zaW5nbGUuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3NpbmdsZVBhZ2UuanMiXSwibmFtZXMiOlsiYSIsImZuIiwiZXRhbGFnZSIsImIiLCJjIiwiZXh0ZW5kIiwiYWxpZ24iLCJ0aHVtYl9pbWFnZV93aWR0aCIsInRodW1iX2ltYWdlX2hlaWdodCIsInNvdXJjZV9pbWFnZV93aWR0aCIsInNvdXJjZV9pbWFnZV9oZWlnaHQiLCJ6b29tX2FyZWFfd2lkdGgiLCJ6b29tX2FyZWFfaGVpZ2h0Iiwiem9vbV9hcmVhX2Rpc3RhbmNlIiwiem9vbV9lYXNpbmciLCJjbGlja190b196b29tIiwiem9vbV9lbGVtZW50Iiwic2hvd19kZXNjcmlwdGlvbnMiLCJkZXNjcmlwdGlvbl9sb2NhdGlvbiIsImRlc2NyaXB0aW9uX29wYWNpdHkiLCJzbWFsbF90aHVtYnMiLCJzbWFsbHRodW1iX2luYWN0aXZlX29wYWNpdHkiLCJzbWFsbHRodW1iX2hpZGVfc2luZ2xlIiwic21hbGx0aHVtYl9zZWxlY3Rfb25faG92ZXIiLCJzbWFsbHRodW1ic19wb3NpdGlvbiIsInNob3dfYmVnaW5fZW5kX3NtYWxsdGh1bWIiLCJtYWduaWZpZXJfb3BhY2l0eSIsIm1hZ25pZmllcl9pbnZlcnQiLCJzaG93X2ljb24iLCJpY29uX29mZnNldCIsImhpZGVfY3Vyc29yIiwic2hvd19oaW50IiwiaGludF9vZmZzZXQiLCJzcGVlZCIsImF1dG9wbGF5IiwiYXV0b3BsYXlfaW50ZXJ2YWwiLCJrZXlib2FyZCIsInJpZ2h0X3RvX2xlZnQiLCJjbGlja19jYWxsYmFjayIsImNoYW5nZV9jYWxsYmFjayIsImVhY2giLCJhRyIsImlzIiwiY2hpbGRyZW4iLCJsZW5ndGgiLCJmaW5kIiwiYVAiLCJhMiIsInoiLCJhaSIsImExIiwicmVtb3ZlQ2xhc3MiLCJpIiwiYTMiLCJqIiwiYTUiLCJhNCIsInByZXYiLCJhZGRDbGFzcyIsIm5leHQiLCJ0cmlnZ2VyIiwiYUYiLCJwb3NpdGlvbiIsInRvcCIsImxlZnQiLCJHIiwibSIsImFWIiwiZXEiLCJ5IiwiYWoiLCJoYXNDbGFzcyIsImFjIiwiRiIsImFkIiwiYWIiLCJRIiwiSSIsImFxIiwidCIsImYiLCJhUyIsImFMIiwiYXciLCJhUiIsImF0dHIiLCJhWiIsIk1hdGgiLCJmbG9vciIsImFDIiwicm91bmQiLCJlIiwiYW8iLCJBIiwieCIsImFsIiwiYWsiLCJZIiwiWCIsImJyb3dzZXIiLCJtc2llIiwidmVyc2lvbiIsInNob3ciLCJ3IiwiZmlyc3QiLCJxIiwiYUoiLCJyZW1vdmVBdHRyIiwiZGF0YSIsInByZXBlbmQiLCJyZW1vdmUiLCJhdiIsImNzcyIsIndpZHRoIiwiaGVpZ2h0Iiwic3JjIiwiYU8iLCJhcHBlbmRUbyIsImFhIiwiaCIsIkUiLCJyIiwiSyIsInMiLCJodG1sIiwiVyIsImFuIiwib3BhY2l0eSIsInByZXBlbmRUbyIsImFCIiwiYXoiLCJhUSIsImwiLCJ1IiwicGFyZW50cyIsImFOIiwicGFyc2VJbnQiLCJaIiwiQiIsIk4iLCJPIiwiYUUiLCJQIiwiYXgiLCJhZyIsImFEIiwibyIsImFIIiwiZCIsImFBIiwiSiIsIlQiLCJhMCIsImFYIiwiYXQiLCJ2IiwiYXIiLCJhTSIsInpJbmRleCIsIlMiLCJhSyIsImFtIiwib2Zmc2V0IiwiViIsIlIiLCJNIiwicCIsImFmIiwiYWUiLCJIIiwiQyIsIm91dGVySGVpZ2h0IiwibWFyZ2luIiwicmlnaHQiLCJwYWRkaW5nIiwiaGlkZSIsImJvdHRvbSIsIm1hcmdpbkxlZnQiLCJtYXJnaW5Cb3R0b20iLCJtYXJnaW5SaWdodCIsImJhY2tncm91bmQiLCJhZGQiLCJjdXJzb3IiLCJheSIsImFwIiwiRCIsImNsZWFySW50ZXJ2YWwiLCJrIiwic2V0SW50ZXJ2YWwiLCJhdSIsIlUiLCJzdG9wIiwiZmFkZVRvIiwiYW5pbWF0ZSIsImFXIiwiZmFkZU91dCIsImNsZWFyVGltZW91dCIsImciLCJmaWx0ZXIiLCJhaCIsImFZIiwic2V0VGltZW91dCIsIkwiLCJtb3VzZWxlYXZlIiwibGFzdCIsIm4iLCJhNiIsImE3Iiwid2luZG93IiwiYUkiLCJldGFsYWdlX2NsaWNrX2NhbGxiYWNrIiwiZXRhbGFnZV9jaGFuZ2VfY2FsbGJhY2siLCJtb3VzZWVudGVyIiwiYVUiLCJhVCIsIm1vdXNlbW92ZSIsInBhZ2VYIiwicGFnZVkiLCJjbGljayIsImE4IiwibG9jYXRpb24iLCJkb2N1bWVudCIsImtleWRvd24iLCJrZXlDb2RlIiwiYmluZCIsImpRdWVyeSIsIiQiLCJ0b2dnbGUiLCJ0ZXh0IiwiZ2V0U2VsZWN0ZWRWYWx1ZSIsImlkIiwiJGNsaWNrZWQiLCJ0YXJnZXQiLCJ0b2dnbGVDbGFzcyIsImltYWdlX2FuY2hvciIsImluc3RhbmNlX2lkIiwiYWxlcnQiLCJjaGFuZ2UiLCJldGFsYWdlX3Nob3ciXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7O0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUEsQ0FBQyxVQUFTQSxDQUFULEVBQVc7QUFBQ0EsR0FBQyxDQUFDQyxFQUFGLENBQUtDLE9BQUwsR0FBYSxVQUFTQyxDQUFULEVBQVc7QUFBQyxRQUFJQyxDQUFDLEdBQUNKLENBQUMsQ0FBQ0ssTUFBRixDQUFTO0FBQUNDLFdBQUssRUFBQyxNQUFQO0FBQWNDLHVCQUFpQixFQUFDLEdBQWhDO0FBQW9DQyx3QkFBa0IsRUFBQyxHQUF2RDtBQUEyREMsd0JBQWtCLEVBQUMsR0FBOUU7QUFBa0ZDLHlCQUFtQixFQUFDLElBQXRHO0FBQTJHQyxxQkFBZSxFQUFDLEdBQTNIO0FBQStIQyxzQkFBZ0IsRUFBQyxTQUFoSjtBQUEwSkMsd0JBQWtCLEVBQUMsRUFBN0s7QUFBZ0xDLGlCQUFXLEVBQUMsSUFBNUw7QUFBaU1DLG1CQUFhLEVBQUMsS0FBL007QUFBcU5DLGtCQUFZLEVBQUMsTUFBbE87QUFBeU9DLHVCQUFpQixFQUFDLElBQTNQO0FBQWdRQywwQkFBb0IsRUFBQyxRQUFyUjtBQUE4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LE1BQW5CLENBQTBCLFlBQVk7QUFDbENDLGNBQVksQ0FBQ1osQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRckwsSUFBUixDQUFhLGlCQUFiLEVBQWdDd0MsSUFBaEMsQ0FBcUMsT0FBckMsQ0FBRCxDQUFaO0FBQ0gsQ0FGRCxFOzs7Ozs7Ozs7Ozs7QUN0Q0E7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBIiwiZmlsZSI6InNpbmdsZS5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8qXG4gKiBUaXRsZTogalF1ZXJ5IEV0YWxhZ2UgcGx1Z2luXG4gKiBBdXRob3I6IEJlcmVuZCBkZSBKb25nLCBGcmlxdWVcbiAqIEF1dGhvciBVUkk6IGh0dHA6Ly93d3cuZnJpcXVlLm1lL1xuICogVmVyc2lvbjogMS4zLjQgKDIwMTMwNjIyLjEpXG4gKi9cblxuKGZ1bmN0aW9uKGEpe2EuZm4uZXRhbGFnZT1mdW5jdGlvbihiKXt2YXIgYz1hLmV4dGVuZCh7YWxpZ246XCJsZWZ0XCIsdGh1bWJfaW1hZ2Vfd2lkdGg6MzAwLHRodW1iX2ltYWdlX2hlaWdodDo0MDAsc291cmNlX2ltYWdlX3dpZHRoOjkwMCxzb3VyY2VfaW1hZ2VfaGVpZ2h0OjEyMDAsem9vbV9hcmVhX3dpZHRoOjYwMCx6b29tX2FyZWFfaGVpZ2h0OlwianVzdGlmeVwiLHpvb21fYXJlYV9kaXN0YW5jZToxMCx6b29tX2Vhc2luZzp0cnVlLGNsaWNrX3RvX3pvb206ZmFsc2Usem9vbV9lbGVtZW50OlwiYXV0b1wiLHNob3dfZGVzY3JpcHRpb25zOnRydWUsZGVzY3JpcHRpb25fbG9jYXRpb246XCJib3R0b21cIixkZXNjcmlwdGlvbl9vcGFjaXR5OjAuNyxzbWFsbF90aHVtYnM6MyxzbWFsbHRodW1iX2luYWN0aXZlX29wYWNpdHk6MC40LHNtYWxsdGh1bWJfaGlkZV9zaW5nbGU6dHJ1ZSxzbWFsbHRodW1iX3NlbGVjdF9vbl9ob3ZlcjpmYWxzZSxzbWFsbHRodW1ic19wb3NpdGlvbjpcImJvdHRvbVwiLHNob3dfYmVnaW5fZW5kX3NtYWxsdGh1bWI6dHJ1ZSxtYWduaWZpZXJfb3BhY2l0eTowLjUsbWFnbmlmaWVyX2ludmVydDp0cnVlLHNob3dfaWNvbjp0cnVlLGljb25fb2Zmc2V0OjIwLGhpZGVfY3Vyc29yOmZhbHNlLHNob3dfaGludDpmYWxzZSxoaW50X29mZnNldDoxNSxzcGVlZDo2MDAsYXV0b3BsYXk6dHJ1ZSxhdXRvcGxheV9pbnRlcnZhbDo2MDAwLGtleWJvYXJkOnRydWUscmlnaHRfdG9fbGVmdDpmYWxzZSxjbGlja19jYWxsYmFjazpmdW5jdGlvbigpe3JldHVybiB0cnVlXG59LGNoYW5nZV9jYWxsYmFjazpmdW5jdGlvbigpe3JldHVybiB0cnVlfX0sYik7YS5lYWNoKHRoaXMsZnVuY3Rpb24oKXt2YXIgYUc9YSh0aGlzKTtpZihhRy5pcyhcInVsXCIpJiZhRy5jaGlsZHJlbihcImxpXCIpLmxlbmd0aCYmYUcuZmluZChcImltZy5ldGFsYWdlX3NvdXJjZV9pbWFnZVwiKS5sZW5ndGgpe3ZhciBhZCxhYixRLEksYXEsdCxmLGFTLGFMLGF3LGFSPWFHLmF0dHIoXCJpZFwiKSxhWj1NYXRoLmZsb29yKGMuc3BlZWQqMC43KSxhQz1NYXRoLnJvdW5kKGMuc3BlZWQvMTAwKSxhaT1mYWxzZSx6PTAsZT1mYWxzZSxhbz10cnVlLEE9ZmFsc2UseD0wLGFsPTAsYWs9MCxZPTAsWD0wLGFGPVwiaG9yaVwiO2lmKHR5cGVvZiBhUj09PVwidW5kZWZpbmVkXCJ8fCFhUil7YVI9XCJbbm8gaWRdXCJ9aWYoYy5zbWFsbHRodW1ic19wb3NpdGlvbj09PVwibGVmdFwifHxjLnNtYWxsdGh1bWJzX3Bvc2l0aW9uPT09XCJyaWdodFwiKXthRj1cInZlcnRcIn1pZih0eXBlb2YgYS5icm93c2VyPT09XCJvYmplY3RcIiYmYS5icm93c2VyLm1zaWUpe2lmKGEuYnJvd3Nlci52ZXJzaW9uPDkpe2FvPWZhbHNlO1xuaWYoYS5icm93c2VyLnZlcnNpb248Nyl7ZT10cnVlfX19YUcuYWRkQ2xhc3MoXCJldGFsYWdlXCIpLnNob3coKTt2YXIgdz1hRy5jaGlsZHJlbihcImxpXCIpLmFkZENsYXNzKFwiZXRhbGFnZV90aHVtYlwiKTt3LmZpcnN0KCkuc2hvdygpLmFkZENsYXNzKFwiZXRhbGFnZV90aHVtYl9hY3RpdmVcIik7dmFyIHE9dy5sZW5ndGgsYUo9Yy5hdXRvcGxheTtpZihxPDIpe2FKPWZhbHNlfWlmKGMuYWxpZ249PT1cInJpZ2h0XCIpe2FHLmFkZENsYXNzKFwiZXRhbGFnZV9yaWdodFwiKX1hLmVhY2godyxmdW5jdGlvbihhMSl7YTErPTE7dmFyIGE0PWEodGhpcyksaj1hNC5maW5kKFwiLmV0YWxhZ2VfdGh1bWJfaW1hZ2VcIikucmVtb3ZlQXR0cihcImFsdFwiKS5zaG93KCksYTM9YTQuZmluZChcIi5ldGFsYWdlX3NvdXJjZV9pbWFnZVwiKSxhMj1hNC5maW5kKFwiYVwiKTthNC5kYXRhKFwiaWRcIixhMSkuYWRkQ2xhc3MoXCJ0aHVtYl9cIithMSk7aWYoIWoubGVuZ3RoJiZhMy5sZW5ndGgpe2E0LnByZXBlbmQoJzxpbWcgY2xhc3M9XCJldGFsYWdlX3RodW1iX2ltYWdlXCIgc3JjPVwiJythMy5hdHRyKFwic3JjXCIpKydcIiAvPicpXG59ZWxzZXtpZighai5sZW5ndGgmJiFhMy5sZW5ndGgpe2E0LnJlbW92ZSgpfX1pZihhMi5sZW5ndGgpe2E0LmZpbmQoXCIuZXRhbGFnZV90aHVtYl9pbWFnZVwiKS5kYXRhKFwiYW5jaG9yXCIsYTIuYXR0cihcImhyZWZcIikpfX0pO3ZhciBhdj13LmZpbmQoXCIuZXRhbGFnZV90aHVtYl9pbWFnZVwiKS5jc3Moe3dpZHRoOmMudGh1bWJfaW1hZ2Vfd2lkdGgsaGVpZ2h0OmMudGh1bWJfaW1hZ2VfaGVpZ2h0fSkuc2hvdygpO2EuZWFjaChhdixmdW5jdGlvbigpe2EodGhpcykuZGF0YShcInNyY1wiLHRoaXMuc3JjKX0pO3ZhciBhTz1hKCc8bGkgY2xhc3M9XCJldGFsYWdlX21hZ25pZmllclwiPjxkaXY+PGltZyAvPjwvZGl2PjwvbGk+JykuYXBwZW5kVG8oYUcpLGFhPWFPLmNoaWxkcmVuKFwiZGl2XCIpLGg9YWEuY2hpbGRyZW4oXCJpbWdcIik7dmFyIEU9YSgnPGxpIGNsYXNzPVwiZXRhbGFnZV9pY29uXCI+Jm5ic3A7PC9saT4nKS5hcHBlbmRUbyhhRyk7aWYoYy5zaG93X2ljb24pe0Uuc2hvdygpfXZhciByO2lmKGMuc2hvd19oaW50KXtyPWEoJzxsaSBjbGFzcz1cImV0YWxhZ2VfaGludFwiPiZuYnNwOzwvbGk+JykuYXBwZW5kVG8oYUcpLnNob3coKVxufXZhciBLLHM9Yy56b29tX2VsZW1lbnQ7aWYocyE9PVwiYXV0b1wiJiZzJiZhKHMpLmxlbmd0aCl7Sz1hKHMpLmFkZENsYXNzKFwiZXRhbGFnZV96b29tX2FyZWFcIikuaHRtbCgnPGRpdj48aW1nIGNsYXNzPVwiZXRhbGFnZV96b29tX2ltZ1wiIC8+PC9kaXY+Jyl9ZWxzZXtzPVwiYXV0b1wiO0s9YSgnPGxpIGNsYXNzPVwiZXRhbGFnZV96b29tX2FyZWFcIj48ZGl2PjxpbWcgY2xhc3M9XCJldGFsYWdlX3pvb21faW1nXCIgLz48L2Rpdj48L2xpPicpLmFwcGVuZFRvKGFHKX12YXIgVz1LLmNoaWxkcmVuKFwiZGl2XCIpLGFuO2lmKGFvKXthbj1hKCc8aW1nIGNsYXNzPVwiZXRhbGFnZV96b29tX3ByZXZpZXdcIiAvPicpLmNzcyh7d2lkdGg6Yy5zb3VyY2VfaW1hZ2Vfd2lkdGgsaGVpZ2h0OmMuc291cmNlX2ltYWdlX2hlaWdodCxvcGFjaXR5OjAuM30pLnByZXBlbmRUbyhXKS5zaG93KCl9dmFyIGFCPVcuY2hpbGRyZW4oXCIuZXRhbGFnZV96b29tX2ltZ1wiKS5jc3Moe3dpZHRoOmMuc291cmNlX2ltYWdlX3dpZHRoLGhlaWdodDpjLnNvdXJjZV9pbWFnZV9oZWlnaHR9KTtcbnZhciBhejtpZihjLnNob3dfZGVzY3JpcHRpb25zKXthej1hKCc8ZGl2IGNsYXNzPVwiZXRhbGFnZV9kZXNjcmlwdGlvbicrKChjLnJpZ2h0X3RvX2xlZnQpP1wiIHJ0bFwiOlwiXCIpKydcIj48L2Rpdj4nKS5wcmVwZW5kVG8oSyl9dmFyIGFRLGwsYVYsdSx5LGFqPWMuc21hbGxfdGh1bWJzO2lmKHE+MXx8IWMuc21hbGx0aHVtYl9oaWRlX3NpbmdsZSl7YVE9YSgnPGxpIGNsYXNzPVwiZXRhbGFnZV9zbWFsbF90aHVtYnNcIj48dWw+PC91bD48L2xpPicpLmFwcGVuZFRvKGFHKTtsPWFRLmNoaWxkcmVuKFwidWxcIik7YS5lYWNoKGF2LGZ1bmN0aW9uKCl7dmFyIGk9YSh0aGlzKTtRPWkuZGF0YShcInNyY1wiKTtJPWkucGFyZW50cyhcIi5ldGFsYWdlX3RodW1iXCIpLmRhdGEoXCJpZFwiKTthKCc8bGk+PGltZyBjbGFzcz1cImV0YWxhZ2Vfc21hbGxfdGh1bWJcIiBzcmM9XCInK1ErJ1wiIC8+PC9saT4nKS5kYXRhKFwidGh1bWJfaWRcIixJKS5hcHBlbmRUbyhsKX0pO2FWPWwuY2hpbGRyZW4oXCJsaVwiKS5jc3Moe29wYWNpdHk6Yy5zbWFsbHRodW1iX2luYWN0aXZlX29wYWNpdHl9KTtcbmlmKGFqPDMpe2FqPTN9aWYocT5hail7aWYoYy5zaG93X2JlZ2luX2VuZF9zbWFsbHRodW1iKXtRPWF2LmVxKHEtMSkuZGF0YShcInNyY1wiKTtJPXcuZXEocS0xKS5kYXRhKFwiaWRcIik7YSgnPGxpIGNsYXNzPVwiZXRhbGFnZV9zbWFsbHRodW1iX2ZpcnN0IGV0YWxhZ2Vfc21hbGx0aHVtYl9uYXZ0b2VuZFwiPjxpbWcgY2xhc3M9XCJldGFsYWdlX3NtYWxsX3RodW1iXCIgc3JjPVwiJytRKydcIiAvPjwvbGk+JykuZGF0YShcInNyY1wiLFEpLmRhdGEoXCJ0aHVtYl9pZFwiLEkpLmNzcyh7b3BhY2l0eTpjLnNtYWxsdGh1bWJfaW5hY3RpdmVfb3BhY2l0eX0pLnByZXBlbmRUbyhsKTtRPWF2LmVxKDApLmRhdGEoXCJzcmNcIik7ST13LmVxKDApLmRhdGEoXCJpZFwiKTthKCc8bGkgY2xhc3M9XCJldGFsYWdlX3NtYWxsdGh1bWJfbmF2dG9zdGFydFwiPjxpbWcgY2xhc3M9XCJldGFsYWdlX3NtYWxsX3RodW1iXCIgc3JjPVwiJytRKydcIiAvPjwvbGk+JykuZGF0YShcInNyY1wiLFEpLmRhdGEoXCJ0aHVtYl9pZFwiLEkpLmNzcyh7b3BhY2l0eTpjLnNtYWxsdGh1bWJfaW5hY3RpdmVfb3BhY2l0eX0pLmFwcGVuZFRvKGwpO1xuYVY9bC5jaGlsZHJlbihcImxpXCIpO2FWLmVxKDEpLmFkZENsYXNzKFwiZXRhbGFnZV9zbWFsbHRodW1iX2FjdGl2ZVwiKS5jc3Moe29wYWNpdHk6MX0pfWVsc2V7YVYuZXEoMCkuYWRkQ2xhc3MoXCJldGFsYWdlX3NtYWxsdGh1bWJfZmlyc3QgZXRhbGFnZV9zbWFsbHRodW1iX2FjdGl2ZVwiKS5jc3Moe29wYWNpdHk6MX0pfWFWLmVxKGFqLTEpLmFkZENsYXNzKFwiZXRhbGFnZV9zbWFsbHRodW1iX2xhc3RcIil9ZWxzZXthVi5lcSgwKS5hZGRDbGFzcyhcImV0YWxhZ2Vfc21hbGx0aHVtYl9hY3RpdmVcIikuY3NzKHtvcGFjaXR5OjF9KX1hLmVhY2goYVYsZnVuY3Rpb24oail7YSh0aGlzKS5kYXRhKFwiaWRcIiwoaisxKSl9KTt1PWFWLmNoaWxkcmVuKFwiaW1nXCIpO3k9YVYubGVuZ3RoO2lmKGFGPT09XCJ2ZXJ0XCIpe2FWLmFkZENsYXNzKFwidmVydGljYWxcIil9fWlmKGMubWFnbmlmaWVyX2ludmVydCl7YXE9MX1lbHNle2FxPWMubWFnbmlmaWVyX29wYWNpdHl9dmFyIGFOPXBhcnNlSW50KHcuY3NzKFwiYm9yZGVyTGVmdFdpZHRoXCIpLDEwKStwYXJzZUludCh3LmNzcyhcImJvcmRlclJpZ2h0V2lkdGhcIiksMTApK3BhcnNlSW50KGF2LmNzcyhcImJvcmRlckxlZnRXaWR0aFwiKSwxMCkrcGFyc2VJbnQoYXYuY3NzKFwiYm9yZGVyUmlnaHRXaWR0aFwiKSwxMCksWj1wYXJzZUludCh3LmNzcyhcIm1hcmdpbkxlZnRcIiksMTApK3BhcnNlSW50KHcuY3NzKFwibWFyZ2luUmlnaHRcIiksMTApLEI9cGFyc2VJbnQody5jc3MoXCJwYWRkaW5nTGVmdFwiKSwxMCkrcGFyc2VJbnQody5jc3MoXCJwYWRkaW5nUmlnaHRcIiksMTApK3BhcnNlSW50KGF2LmNzcyhcIm1hcmdpbkxlZnRcIiksMTApK3BhcnNlSW50KGF2LmNzcyhcIm1hcmdpblJpZ2h0XCIpLDEwKStwYXJzZUludChhdi5jc3MoXCJwYWRkaW5nTGVmdFwiKSwxMCkrcGFyc2VJbnQoYXYuY3NzKFwicGFkZGluZ1JpZ2h0XCIpLDEwKSxOPWMudGh1bWJfaW1hZ2Vfd2lkdGgrYU4rWitCLE89Yy50aHVtYl9pbWFnZV9oZWlnaHQrYU4rWitCLGFFPTAsUD0wLGF4PTAsYWc9MCxhRD0wLG89MCxhSD0wO1xuaWYocT4xfHwhYy5zbWFsbHRodW1iX2hpZGVfc2luZ2xlKXthRT1wYXJzZUludChhVi5jc3MoXCJib3JkZXJMZWZ0V2lkdGhcIiksMTApK3BhcnNlSW50KGFWLmNzcyhcImJvcmRlclJpZ2h0V2lkdGhcIiksMTApK3BhcnNlSW50KHUuY3NzKFwiYm9yZGVyTGVmdFdpZHRoXCIpLDEwKStwYXJzZUludCh1LmNzcyhcImJvcmRlclJpZ2h0V2lkdGhcIiksMTApO1A9cGFyc2VJbnQoYVYuY3NzKFwibWFyZ2luVG9wXCIpLDEwKTtheD1wYXJzZUludChhVi5jc3MoXCJwYWRkaW5nTGVmdFwiKSwxMCkrcGFyc2VJbnQoYVYuY3NzKFwicGFkZGluZ1JpZ2h0XCIpLDEwKStwYXJzZUludCh1LmNzcyhcIm1hcmdpbkxlZnRcIiksMTApK3BhcnNlSW50KHUuY3NzKFwibWFyZ2luUmlnaHRcIiksMTApK3BhcnNlSW50KHUuY3NzKFwicGFkZGluZ0xlZnRcIiksMTApK3BhcnNlSW50KHUuY3NzKFwicGFkZGluZ1JpZ2h0XCIpLDEwKTtpZihhRj09PVwidmVydFwiKXthRD1NYXRoLnJvdW5kKChPLSgoYWotMSkqUCkpL2FqKS0oYUUrYXgpO2FnPU1hdGgucm91bmQoKGMudGh1bWJfaW1hZ2Vfd2lkdGgqYUQpL2MudGh1bWJfaW1hZ2VfaGVpZ2h0KTtcbm89YWcrYUUrYXg7YUg9YUQrYUUrYXh9ZWxzZXthZz1NYXRoLnJvdW5kKChOLSgoYWotMSkqUCkpL2FqKS0oYUUrYXgpO2FEPU1hdGgucm91bmQoKGMudGh1bWJfaW1hZ2VfaGVpZ2h0KmFnKS9jLnRodW1iX2ltYWdlX3dpZHRoKTtvPWFnK2FFK2F4O2FIPWFEK2FFK2F4fX12YXIgZD1wYXJzZUludChLLmNzcyhcImJvcmRlclRvcFdpZHRoXCIpLDEwKSxhQT1wYXJzZUludChjLnpvb21fYXJlYV9kaXN0YW5jZSwxMCksSj1wYXJzZUludChLLmNzcyhcInBhZGRpbmdUb3BcIiksMTApLFQsYTA7aWYoKGMuem9vbV9hcmVhX3dpZHRoLShkKjIpLShKKjIpKT5jLnNvdXJjZV9pbWFnZV93aWR0aCl7VD1jLnNvdXJjZV9pbWFnZV93aWR0aH1lbHNle1Q9Yy56b29tX2FyZWFfd2lkdGgtKGQqMiktKEoqMil9aWYoYy56b29tX2FyZWFfaGVpZ2h0PT09XCJqdXN0aWZ5XCIpe2EwPShPK1ArYUgpLShkKjIpLShKKjIpfWVsc2V7YTA9Yy56b29tX2FyZWFfaGVpZ2h0LShkKjIpLShKKjIpfWlmKGEwPmMuc291cmNlX2ltYWdlX2hlaWdodCl7YTA9Yy5zb3VyY2VfaW1hZ2VfaGVpZ2h0XG59dmFyIGFYLGF0LHYsYXI7aWYoYy5zaG93X2Rlc2NyaXB0aW9ucyl7YVg9cGFyc2VJbnQoYXouY3NzKFwiYm9yZGVyTGVmdFdpZHRoXCIpLDEwKStwYXJzZUludChhei5jc3MoXCJib3JkZXJSaWdodFdpZHRoXCIpLDEwKTthdD1wYXJzZUludChhei5jc3MoXCJtYXJnaW5MZWZ0XCIpLDEwKStwYXJzZUludChhei5jc3MoXCJtYXJnaW5SaWdodFwiKSwxMCk7dj1wYXJzZUludChhei5jc3MoXCJwYWRkaW5nTGVmdFwiKSwxMCkrcGFyc2VJbnQoYXouY3NzKFwicGFkZGluZ1JpZ2h0XCIpLDEwKTthcj1ULWFYLWF0LXZ9dmFyIGFNO2lmKGUpe2FNPWEoJzxpZnJhbWUgbWFyZ2lud2lkdGg9XCIwXCIgbWFyZ2luaGVpZ2h0PVwiMFwiIHNjcm9sbGluZz1cIm5vXCIgZnJhbWVib3JkZXI9XCIwXCIgc3JjPVwiamF2YXNjcmlwdDpcXCc8aHRtbD48L2h0bWw+XFwnXCI+PC9pZnJhbWU+JykuY3NzKHtwb3NpdGlvbjpcImFic29sdXRlXCIsekluZGV4OjF9KS5wcmVwZW5kVG8oSyl9dmFyIFM9cGFyc2VJbnQoYU8uY3NzKFwiYm9yZGVyVG9wV2lkdGhcIiksMTApLGFLPXBhcnNlSW50KHcuY3NzKFwiYm9yZGVyVG9wV2lkdGhcIiksMTApK3BhcnNlSW50KHcuY3NzKFwibWFyZ2luVG9wXCIpLDEwKStwYXJzZUludCh3LmNzcyhcInBhZGRpbmdUb3BcIiksMTApK3BhcnNlSW50KGF2LmNzcyhcImJvcmRlclRvcFdpZHRoXCIpLDEwKStwYXJzZUludChhdi5jc3MoXCJtYXJnaW5Ub3BcIiksMTApLVMsYW09YXYub2Zmc2V0KCkubGVmdC1hRy5vZmZzZXQoKS5sZWZ0LVM7XG5pZihjLnNtYWxsdGh1bWJzX3Bvc2l0aW9uPT09XCJsZWZ0XCIpe2FtPWFtK28rUH1lbHNle2lmKGMuc21hbGx0aHVtYnNfcG9zaXRpb249PT1cInRvcFwiKXthSz1hSythSCtQfX12YXIgVj1NYXRoLnJvdW5kKFQqKGMudGh1bWJfaW1hZ2Vfd2lkdGgvYy5zb3VyY2VfaW1hZ2Vfd2lkdGgpKSxSPU1hdGgucm91bmQoYTAqKGMudGh1bWJfaW1hZ2VfaGVpZ2h0L2Muc291cmNlX2ltYWdlX2hlaWdodCkpLE09YUsrYy50aHVtYl9pbWFnZV9oZWlnaHQtUixwPWFtK2MudGh1bWJfaW1hZ2Vfd2lkdGgtVixhZj1NYXRoLnJvdW5kKFYvMiksYWU9TWF0aC5yb3VuZChSLzIpLEgsQztpZihjLnNob3dfaGludCl7SD1wYXJzZUludChjLmhpbnRfb2Zmc2V0LDEwKStwYXJzZUludChyLmNzcyhcIm1hcmdpblRvcFwiKSwxMCk7Qz1wYXJzZUludChjLmhpbnRfb2Zmc2V0LDEwKStwYXJzZUludChyLmNzcyhcIm1hcmdpblJpZ2h0XCIpLDEwKTtpZihjLnNtYWxsdGh1bWJzX3Bvc2l0aW9uPT09XCJyaWdodFwiKXtDPUMtby1QXG59fWlmKGFGPT09XCJ2ZXJ0XCIpe2FTPU4rUCtvO2FHLmNzcyh7d2lkdGg6YVMsaGVpZ2h0Ok99KX1lbHNle2FTPU47YUcuY3NzKHt3aWR0aDphUyxoZWlnaHQ6TytQK2FIfSl9aWYoYy5zaG93X2ljb24pe2F3PXt0b3A6Ty1FLm91dGVySGVpZ2h0KHRydWUpLXBhcnNlSW50KGMuaWNvbl9vZmZzZXQsMTApLGxlZnQ6cGFyc2VJbnQoYy5pY29uX29mZnNldCwxMCl9O2lmKGMuc21hbGx0aHVtYnNfcG9zaXRpb249PT1cImxlZnRcIil7YXcubGVmdD1vK1ArcGFyc2VJbnQoYy5pY29uX29mZnNldCwxMCl9ZWxzZXtpZihjLnNtYWxsdGh1bWJzX3Bvc2l0aW9uPT09XCJ0b3BcIil7YXcudG9wKz1hSCtQfX1FLmNzcyhhdyl9aWYoYy5zaG93X2hpbnQpe3IuY3NzKHttYXJnaW46MCx0b3A6LUgscmlnaHQ6LUN9KX1oLmNzcyh7bWFyZ2luOjAscGFkZGluZzowLHdpZHRoOmMudGh1bWJfaW1hZ2Vfd2lkdGgsaGVpZ2h0OmMudGh1bWJfaW1hZ2VfaGVpZ2h0fSk7YWEuY3NzKHttYXJnaW46MCxwYWRkaW5nOjAsd2lkdGg6VixoZWlnaHQ6Un0pO1xuYXc9e21hcmdpbjowLHBhZGRpbmc6MCxsZWZ0OihwLWFtKS8yLHRvcDooTS1hSykvMn07aWYoYy5zbWFsbHRodW1ic19wb3NpdGlvbj09PVwibGVmdFwiKXthdy5sZWZ0PVwiKz1cIitvK1B9ZWxzZXtpZihjLnNtYWxsdGh1bWJzX3Bvc2l0aW9uPT09XCJ0b3BcIil7YXcudG9wPVwiKz1cIithSCtQfX1hTy5jc3MoYXcpLmhpZGUoKTtXLmNzcyh7d2lkdGg6VCxoZWlnaHQ6YTB9KTthdz17bWFyZ2luOjAsb3BhY2l0eTowfTtpZihjLmFsaWduPT09XCJyaWdodFwiJiZzPT09XCJhdXRvXCIpe2F3LmxlZnQ9LShUKyhkKjIpKyhKKjIpK2FBKX1lbHNle2lmKHM9PT1cImF1dG9cIil7YXcubGVmdD1hUythQX19Sy5jc3MoYXcpLmhpZGUoKTtpZihjLnNob3dfZGVzY3JpcHRpb25zKXthdz17d2lkdGg6YXIsYm90dG9tOkosbGVmdDpKLG9wYWNpdHk6Yy5kZXNjcmlwdGlvbl9vcGFjaXR5fTtpZihjLmRlc2NyaXB0aW9uX2xvY2F0aW9uPT09XCJ0b3BcIil7YXcudG9wPUo7YXcuYm90dG9tPVwiYXV0b1wifWF6LmNzcyhhdykuaGlkZSgpXG59aWYocT4xfHwhYy5zbWFsbHRodW1iX2hpZGVfc2luZ2xlKXtpZihhRj09PVwidmVydFwiKXthdz17dG9wOjAsaGVpZ2h0Ok99O2lmKGMuc21hbGx0aHVtYnNfcG9zaXRpb249PT1cImxlZnRcIil7dy5jc3Moe2xlZnQ6bytQfSl9ZWxzZXthdy5tYXJnaW5MZWZ0PU4rUH1hUS5jc3MoYXcpO2wuY3NzKHtoZWlnaHQ6KGFIKnkpKyh5KlApKzEwMH0pO3UuY3NzKHt3aWR0aDphZyxoZWlnaHQ6YUR9KS5hdHRyKFwiaGVpZ2h0XCIsYUQpO2FWLmNzcyh7bWFyZ2luOjAsbWFyZ2luQm90dG9tOlB9KX1lbHNle2F3PXt3aWR0aDpOfTtpZihjLnNtYWxsdGh1bWJzX3Bvc2l0aW9uPT09XCJ0b3BcIil7dy5jc3Moe3RvcDphSCtQfSl9ZWxzZXthdy50b3A9TytQfWFRLmNzcyhhdyk7bC5jc3Moe3dpZHRoOihvKnkpKyh5KlApKzEwMH0pO3UuY3NzKHt3aWR0aDphZyxoZWlnaHQ6YUR9KS5hdHRyKFwid2lkdGhcIixhZyk7YVYuY3NzKHttYXJnaW46MCxtYXJnaW5SaWdodDpQfSl9aWYoYUY9PT1cInZlcnRcIil7YUw9KChhSCphaikrKChhai0xKSpQKSktT1xufWVsc2V7YUw9KChvKmFqKSsoKGFqLTEpKlApKS1OfWlmKGFMPjApe2ZvcihhZD0xO2FkPD0oeS0xKTthZD1hZCsoYWotMSkpe2FiPTE7Zm9yKGFiO2FiPD1hTDthYis9MSl7aWYoYUY9PT1cInZlcnRcIil7YVYuZXEoYWQrYWItMSkuY3NzKHttYXJnaW5Cb3R0b206KFAtMSl9KX1lbHNle2FWLmVxKGFkK2FiLTEpLmNzcyh7bWFyZ2luUmlnaHQ6KFAtMSl9KX19fX1lbHNle2lmKGFMPDApe2ZvcihhZD0xO2FkPD0oeS0xKTthZD1hZCsoYWotMSkpe2FiPTE7Zm9yKGFiO2FiPD0oLWFMKTthYis9MSl7aWYoYUY9PT1cInZlcnRcIil7YVYuZXEoYWQrYWItMSkuY3NzKHttYXJnaW5Cb3R0b206KFArMSl9KTtsLmNzcyh7aGVpZ2h0OnBhcnNlSW50KGwuY3NzKFwiaGVpZ2h0XCIpLDEwKSsxfSl9ZWxzZXthVi5lcShhZCthYi0xKS5jc3Moe21hcmdpblJpZ2h0OihQKzEpfSk7bC5jc3Moe3dpZHRoOnBhcnNlSW50KGwuY3NzKFwid2lkdGhcIiksMTApKzF9KX19fX19fWlmKGMuc2hvd19pY29uJiYhYy5tYWduaWZpZXJfaW52ZXJ0KXthTy5jc3Moe2JhY2tncm91bmQ6YU8uY3NzKFwiYmFja2dyb3VuZC1jb2xvclwiKStcIiBcIitFLmNzcyhcImJhY2tncm91bmQtaW1hZ2VcIikrXCIgY2VudGVyIG5vLXJlcGVhdFwifSlcbn1pZihjLmhpZGVfY3Vyc29yKXthTy5hZGQoRSkuY3NzKHtjdXJzb3I6XCJub25lXCJ9KX1pZihlKXthTS5jc3Moe3dpZHRoOlcuY3NzKFwid2lkdGhcIiksaGVpZ2h0OlcuY3NzKFwiaGVpZ2h0XCIpfSl9dmFyIGF5PXcuZmlyc3QoKS5maW5kKFwiLmV0YWxhZ2VfdGh1bWJfaW1hZ2VcIiksYXA9dy5maXJzdCgpLmZpbmQoXCIuZXRhbGFnZV9zb3VyY2VfaW1hZ2VcIik7aWYoYy5tYWduaWZpZXJfaW52ZXJ0KXtoLmF0dHIoXCJzcmNcIixheS5kYXRhKFwic3JjXCIpKS5zaG93KCl9aWYoYW8pe2FuLmF0dHIoXCJzcmNcIixheS5kYXRhKFwic3JjXCIpKX1hQi5hdHRyKFwic3JjXCIsYXAuYXR0cihcInNyY1wiKSk7aWYoYy5zaG93X2Rlc2NyaXB0aW9ucyl7Zj1hcC5hdHRyKFwidGl0bGVcIik7aWYoZil7YXouaHRtbChmKS5zaG93KCl9fXZhciBEPWZ1bmN0aW9uKCl7aWYodCl7Y2xlYXJJbnRlcnZhbCh0KTt0PWZhbHNlfX07dmFyIGs9ZnVuY3Rpb24oKXtpZih0KXtEKCl9dD1zZXRJbnRlcnZhbChmdW5jdGlvbigpe2F1KCl9LGMuYXV0b3BsYXlfaW50ZXJ2YWwpXG59O3ZhciBVPWZ1bmN0aW9uKCl7YU8uc3RvcCgpLmZhZGVUbyhhWixhcSk7RS5zdG9wKCkuYW5pbWF0ZSh7b3BhY2l0eTowfSxhWik7Sy5zdG9wKCkuc2hvdygpLmFuaW1hdGUoe29wYWNpdHk6MX0sYVopO2lmKGMubWFnbmlmaWVyX2ludmVydCl7YXkuc3RvcCgpLmFuaW1hdGUoe29wYWNpdHk6Yy5tYWduaWZpZXJfb3BhY2l0eX0sYVopfWlmKGFKKXtEKCl9fTt2YXIgYVc9ZnVuY3Rpb24oKXthTy5zdG9wKCkuZmFkZU91dChjLnNwZWVkKTtFLnN0b3AoKS5hbmltYXRlKHtvcGFjaXR5OjF9LGMuc3BlZWQpO0suc3RvcCgpLmFuaW1hdGUoe29wYWNpdHk6MH0sYy5zcGVlZCxmdW5jdGlvbigpe2EodGhpcykuaGlkZSgpfSk7aWYoYy5tYWduaWZpZXJfaW52ZXJ0KXtheS5zdG9wKCkuYW5pbWF0ZSh7b3BhY2l0eToxfSxjLnNwZWVkLGZ1bmN0aW9uKCl7aWYoYy5jbGlja190b196b29tKXtBPWZhbHNlfX0pfWNsZWFyVGltZW91dCh4KTtpZihhSil7aygpfX07dmFyIGc9ZnVuY3Rpb24oYTMsYTEpe3ZhciBqLGEyLGk9YUcuZmluZChcIi5ldGFsYWdlX3NtYWxsdGh1bWJfYWN0aXZlXCIpLnJlbW92ZUNsYXNzKFwiZXRhbGFnZV9zbWFsbHRodW1iX2FjdGl2ZVwiKTtcbmEzLmFkZENsYXNzKFwiZXRhbGFnZV9zbWFsbHRodW1iX2FjdGl2ZVwiKTthTy5zdG9wKCkuaGlkZSgpO0suc3RvcCgpLmhpZGUoKTtpZighYTEpe2FpPXRydWU7aS5zdG9wKHRydWUsdHJ1ZSkuYW5pbWF0ZSh7b3BhY2l0eTpjLnNtYWxsdGh1bWJfaW5hY3RpdmVfb3BhY2l0eX0sYVopO2EzLnN0b3AodHJ1ZSx0cnVlKS5hbmltYXRlKHtvcGFjaXR5OjF9LGFaLGZ1bmN0aW9uKCl7YWk9ZmFsc2V9KX1hRy5maW5kKFwiLmV0YWxhZ2VfdGh1bWJfYWN0aXZlXCIpLnJlbW92ZUNsYXNzKFwiZXRhbGFnZV90aHVtYl9hY3RpdmVcIikuc3RvcCgpLmFuaW1hdGUoe29wYWNpdHk6MH0sYy5zcGVlZCxmdW5jdGlvbigpe2EodGhpcykuaGlkZSgpfSk7aj13LmZpbHRlcihcIi50aHVtYl9cIithMy5kYXRhKFwidGh1bWJfaWRcIikpLmFkZENsYXNzKFwiZXRhbGFnZV90aHVtYl9hY3RpdmVcIikuc2hvdygpLnN0b3AoKS5jc3Moe29wYWNpdHk6MH0pLmFuaW1hdGUoe29wYWNpdHk6MX0sYy5zcGVlZCk7YXk9ai5maW5kKFwiLmV0YWxhZ2VfdGh1bWJfaW1hZ2VcIik7XG5hcD1qLmZpbmQoXCIuZXRhbGFnZV9zb3VyY2VfaW1hZ2VcIik7aWYoYy5tYWduaWZpZXJfaW52ZXJ0KXtoLmF0dHIoXCJzcmNcIixheS5kYXRhKFwic3JjXCIpKX1pZihhbyl7YW4uYXR0cihcInNyY1wiLGF5LmRhdGEoXCJzcmNcIikpfWFCLmF0dHIoXCJzcmNcIixhcC5hdHRyKFwic3JjXCIpKTtpZihjLnNob3dfZGVzY3JpcHRpb25zKXtmPWFwLmF0dHIoXCJ0aXRsZVwiKTtpZihmKXthei5odG1sKGYpLnNob3coKX1lbHNle2F6LmhpZGUoKX19aWYoYUope0QoKTtrKCl9YTI9YTMuZGF0YShcImlkXCIpO2lmKHE+PWFqKXthMi0tfWFoKGEyKX07dmFyIEc9ZnVuY3Rpb24oYTIsaixpLGExKXthLmVhY2goYVYsZnVuY3Rpb24oKXt2YXIgYTQ9YSh0aGlzKSxhMz17b3BhY2l0eTpjLnNtYWxsdGh1bWJfaW5hY3RpdmVfb3BhY2l0eX07aWYoYTQuZGF0YShcImlkXCIpPT09YTEuZGF0YShcImlkXCIpKXthMy5vcGFjaXR5PTF9aWYoYUY9PT1cInZlcnRcIil7YTMudG9wPVwiLT1cIithMn1lbHNle2EzLmxlZnQ9XCItPVwiK2EyfWE0LmFuaW1hdGUoYTMsYVosXCJzd2luZ1wiLGZ1bmN0aW9uKCl7aWYoYWkpe2ExLmFkZENsYXNzKFwiZXRhbGFnZV9zbWFsbHRodW1iX2FjdGl2ZVwiKTtcbmFpPWZhbHNlfX0pfSk7ZyhhMSx0cnVlKX07dmFyIGFZPWZ1bmN0aW9uKCl7dmFyIGEyPVktYWwsYTE9WC1hayxqPS1hMi9hQyxpPS1hMS9hQzthbD1hbC1qO2FrPWFrLWk7aWYoYTI8MSYmYTI+LTEpe2FsPVl9aWYoYTE8MSYmYTE+LTEpe2FrPVh9YUIuY3NzKHtsZWZ0OmFsLHRvcDpha30pO2lmKGFvKXthbi5jc3Moe2xlZnQ6YWwsdG9wOmFrfSl9aWYoYTI+MXx8YTE+MXx8YTI8MXx8YTE8MSl7eD1zZXRUaW1lb3V0KGZ1bmN0aW9uKCl7YVkoKX0sMjUpfX07dmFyIEw9ZnVuY3Rpb24oKXt2YXIgaTtpZihjLm1hZ25pZmllcl9pbnZlcnQpe2FHLmZpbmQoXCIuZXRhbGFnZV90aHVtYl9hY3RpdmVcIikubW91c2VsZWF2ZSgpfWlmKCFjLnJpZ2h0X3RvX2xlZnQpe2k9YUcuZmluZChcIi5ldGFsYWdlX3NtYWxsdGh1bWJfYWN0aXZlXCIpLnByZXYoKTtpZighaS5sZW5ndGgpe2lmKHE+YWope0YoKX1lbHNle2FWLmxhc3QoKS50cmlnZ2VyKFwiY2xpY2tcIil9cmV0dXJuIHRydWV9fWVsc2V7aT1hRy5maW5kKFwiLmV0YWxhZ2Vfc21hbGx0aHVtYl9hY3RpdmVcIikubmV4dCgpO1xuaWYoIWkubGVuZ3RoKXtpZihxPmFqKXthYygpfWVsc2V7YVYuZmlyc3QoKS50cmlnZ2VyKFwiY2xpY2tcIil9cmV0dXJuIHRydWV9fWkudHJpZ2dlcihcImNsaWNrXCIpfTt2YXIgYXU9ZnVuY3Rpb24oKXt2YXIgaTtpZihjLm1hZ25pZmllcl9pbnZlcnQpe2FHLmZpbmQoXCIuZXRhbGFnZV90aHVtYl9hY3RpdmVcIikubW91c2VsZWF2ZSgpfWlmKCFjLnJpZ2h0X3RvX2xlZnQpe2k9YUcuZmluZChcIi5ldGFsYWdlX3NtYWxsdGh1bWJfYWN0aXZlXCIpLm5leHQoKTtpZighaS5sZW5ndGgpe2lmKHE+YWope2FjKCl9ZWxzZXthVi5maXJzdCgpLnRyaWdnZXIoXCJjbGlja1wiKX1yZXR1cm4gdHJ1ZX19ZWxzZXtpPWFHLmZpbmQoXCIuZXRhbGFnZV9zbWFsbHRodW1iX2FjdGl2ZVwiKS5wcmV2KCk7aWYoIWkubGVuZ3RoKXtpZihxPmFqKXtGKCl9ZWxzZXthVi5sYXN0KCkudHJpZ2dlcihcImNsaWNrXCIpfXJldHVybiB0cnVlfX1pLnRyaWdnZXIoXCJjbGlja1wiKX07dmFyIG49ZnVuY3Rpb24oYTIpe2lmKHE8PWFqfHwhYy5zaG93X2JlZ2luX2VuZF9zbWFsbHRodW1iKXthMj1hMi0xXG59dmFyIGE2PWFWLmVxKGEyKTtpZihhNi5sZW5ndGgmJiFhaSl7dmFyIGE1PWFHLmZpbmQoXCIuZXRhbGFnZV9zbWFsbHRodW1iX2FjdGl2ZVwiKSxhMT1hNS5kYXRhKFwiaWRcIiktMSxqO2lmKGExPmEyKXt6PWExLWEyO3ZhciBhMz1hRy5maW5kKFwiLmV0YWxhZ2Vfc21hbGx0aHVtYl9maXJzdFwiKSxhNz1hMy5kYXRhKFwiaWRcIik7aWYoYTI8YTcpe2o9YTEtYTc7ej16LWo7YTMudHJpZ2dlcihcImNsaWNrXCIpfWVsc2V7ZyhhNixmYWxzZSl9fWVsc2V7aWYoYTE8YTIpe3o9YTItYTE7dmFyIGE0PWFHLmZpbmQoXCIuZXRhbGFnZV9zbWFsbHRodW1iX2xhc3RcIiksaT1hNC5kYXRhKFwiaWRcIiktMTtpZihhMj49aSl7aj1pLWExLTE7ej16LWo7YTQudHJpZ2dlcihcImNsaWNrXCIpfWVsc2V7ZyhhNixmYWxzZSl9fX19fTt3aW5kb3dbYVIrXCJfcHJldmlvdXNcIl09ZnVuY3Rpb24oKXtMKCl9O3dpbmRvd1thUitcIl9uZXh0XCJdPWZ1bmN0aW9uKCl7YXUoKX07d2luZG93W2FSK1wiX3Nob3dcIl09ZnVuY3Rpb24oaSl7bihpKVxufTt2YXIgYUk9ZnVuY3Rpb24oaSl7aWYoIWMuY2xpY2tfY2FsbGJhY2soaSxhUikpe3JldHVybiBmYWxzZX1pZih0eXBlb2YgZXRhbGFnZV9jbGlja19jYWxsYmFjaz09PVwiZnVuY3Rpb25cIil7ZXRhbGFnZV9jbGlja19jYWxsYmFjayhpLGFSKTtyZXR1cm4gZmFsc2V9cmV0dXJuIHRydWV9O3ZhciBhaD1mdW5jdGlvbihpKXtpZihjLmNoYW5nZV9jYWxsYmFjayhpLGFSKSl7aWYodHlwZW9mIGV0YWxhZ2VfY2hhbmdlX2NhbGxiYWNrPT09XCJmdW5jdGlvblwiKXtldGFsYWdlX2NoYW5nZV9jYWxsYmFjayhpLGFSKX19fTt3LmFkZChhTykuYWRkKEUpLm1vdXNlZW50ZXIoZnVuY3Rpb24oKXtpZihjLnNob3dfaGludCl7ci5oaWRlKCl9aWYoIWMuY2xpY2tfdG9fem9vbXx8QSl7VSgpfX0pLm1vdXNlbGVhdmUoZnVuY3Rpb24oKXthVygpfSk7dmFyIGFVPS0oYy5zb3VyY2VfaW1hZ2Vfd2lkdGgtVCksYVQ9LShjLnNvdXJjZV9pbWFnZV9oZWlnaHQtYTApO3cuYWRkKGFPKS5hZGQoRSkubW91c2Vtb3ZlKGZ1bmN0aW9uKGE1KXt2YXIgaj1NYXRoLnJvdW5kKGE1LnBhZ2VYLWF5Lm9mZnNldCgpLmxlZnQrYW0pLGk9TWF0aC5yb3VuZChhNS5wYWdlWS1heS5vZmZzZXQoKS50b3ArYUspO1xudmFyIGE0PShqLWFmKSxhMz0oaS1hZSk7aWYoYTQ8YW0pe2E0PWFtfWlmKGE0PnApe2E0PXB9aWYoYTM8YUspe2EzPWFLfWlmKGEzPk0pe2EzPU19YU8uY3NzKHtsZWZ0OmE0LHRvcDphM30pO2lmKGMubWFnbmlmaWVyX2ludmVydCl7dmFyIGEyPWE0LWFtLGExPWEzLWFLO2guY3NzKHtsZWZ0Oi1hMix0b3A6LWExfSl9WT0tKChhNC1hbSkqKDEvKGMudGh1bWJfaW1hZ2Vfd2lkdGgvYy5zb3VyY2VfaW1hZ2Vfd2lkdGgpKSk7WD0tKChhMy1hSykqKDEvKGMudGh1bWJfaW1hZ2VfaGVpZ2h0L2Muc291cmNlX2ltYWdlX2hlaWdodCkpKTtpZihZPGFVKXtZPWFVfWlmKFg8YVQpe1g9YVR9aWYoYy56b29tX2Vhc2luZyl7Y2xlYXJUaW1lb3V0KHgpO2FZKCl9ZWxzZXtpZihhbyl7YW4uY3NzKHtsZWZ0OlksdG9wOlh9KX1hQi5jc3Moe2xlZnQ6WSx0b3A6WH0pfX0pO2Z1bmN0aW9uIGFQKGEyKXt6PSh6KT96LTE6MDthaT10cnVlO3ZhciBhMT1hRy5maW5kKFwiLmV0YWxhZ2Vfc21hbGx0aHVtYl9maXJzdFwiKS5yZW1vdmVDbGFzcyhcImV0YWxhZ2Vfc21hbGx0aHVtYl9maXJzdFwiKTtcbnZhciBpPWFHLmZpbmQoXCIuZXRhbGFnZV9zbWFsbHRodW1iX2xhc3RcIikucmVtb3ZlQ2xhc3MoXCJldGFsYWdlX3NtYWxsdGh1bWJfbGFzdFwiKTt2YXIgYTMsaixhNSxhNDtpZihhMj09PVwibGVmdFwiKXthMz1hMS5wcmV2KCkuYWRkQ2xhc3MoXCJldGFsYWdlX3NtYWxsdGh1bWJfZmlyc3RcIik7aj1pLnByZXYoKS5hZGRDbGFzcyhcImV0YWxhZ2Vfc21hbGx0aHVtYl9sYXN0XCIpO2E1PWExfWVsc2V7YTM9YTEubmV4dCgpLmFkZENsYXNzKFwiZXRhbGFnZV9zbWFsbHRodW1iX2ZpcnN0XCIpO2o9aS5uZXh0KCkuYWRkQ2xhc3MoXCJldGFsYWdlX3NtYWxsdGh1bWJfbGFzdFwiKTthNT1pfWlmKHope2lmKGEyPT09XCJsZWZ0XCIpe2EzLnRyaWdnZXIoXCJjbGlja1wiKX1lbHNle2oudHJpZ2dlcihcImNsaWNrXCIpfX1lbHNle2E0PShhRj09PVwidmVydFwiKT9hMy5wb3NpdGlvbigpLnRvcDphMy5wb3NpdGlvbigpLmxlZnQ7RyhhNCxhMyxqLGE1KX19ZnVuY3Rpb24gbShhNSl7YWk9dHJ1ZTt2YXIgYTE9YUcuZmluZChcIi5ldGFsYWdlX3NtYWxsdGh1bWJfZmlyc3RcIikucmVtb3ZlQ2xhc3MoXCJldGFsYWdlX3NtYWxsdGh1bWJfZmlyc3RcIik7XG52YXIgaT1hRy5maW5kKFwiLmV0YWxhZ2Vfc21hbGx0aHVtYl9sYXN0XCIpLnJlbW92ZUNsYXNzKFwiZXRhbGFnZV9zbWFsbHRodW1iX2xhc3RcIik7dmFyIGEyLGosYTQ7aWYoYTU9PT1cImVuZFwiKXthMj1hVi5lcSh5LWFqKS5hZGRDbGFzcyhcImV0YWxhZ2Vfc21hbGx0aHVtYl9maXJzdFwiKTtqPWFWLmVxKHktMSkuYWRkQ2xhc3MoXCJldGFsYWdlX3NtYWxsdGh1bWJfbGFzdFwiKTthND1qO2lmKGouaGFzQ2xhc3MoXCJldGFsYWdlX3NtYWxsdGh1bWJfbmF2dG9zdGFydFwiKSl7YTQ9ai5wcmV2KCl9fWVsc2V7YTI9YVYuZXEoMCkuYWRkQ2xhc3MoXCJldGFsYWdlX3NtYWxsdGh1bWJfZmlyc3RcIik7aj1hVi5lcShhai0xKS5hZGRDbGFzcyhcImV0YWxhZ2Vfc21hbGx0aHVtYl9sYXN0XCIpO2E0PWEyO2lmKGEyLmhhc0NsYXNzKFwiZXRhbGFnZV9zbWFsbHRodW1iX25hdnRvZW5kXCIpKXthND1hMi5uZXh0KCl9fXZhciBhMz0oYUY9PT1cInZlcnRcIik/YTIucG9zaXRpb24oKS50b3A6YTIucG9zaXRpb24oKS5sZWZ0O1xuRyhhMyxhMixqLGE0KX1mdW5jdGlvbiBhYygpe20oXCJzdGFydFwiKX1mdW5jdGlvbiBGKCl7bShcImVuZFwiKX1pZihxPjF8fCFjLnNtYWxsdGh1bWJfaGlkZV9zaW5nbGUpe2FWLmNsaWNrKGZ1bmN0aW9uKCl7dmFyIGE3PWEodGhpcyksYTMsaj0wLGE1PWZhbHNlLGEyLGE4LGE0LGE2LGExO2lmKCFhNy5oYXNDbGFzcyhcImV0YWxhZ2Vfc21hbGx0aHVtYl9hY3RpdmVcIikmJighYWl8fHopKXtpZihhNy5oYXNDbGFzcyhcImV0YWxhZ2Vfc21hbGx0aHVtYl9maXJzdFwiKSYmYTcucHJldigpLmxlbmd0aCl7YVAoXCJsZWZ0XCIpfWVsc2V7aWYoYTcuaGFzQ2xhc3MoXCJldGFsYWdlX3NtYWxsdGh1bWJfbmF2dG9lbmRcIikpe0YoKX1lbHNle2lmKGE3Lmhhc0NsYXNzKFwiZXRhbGFnZV9zbWFsbHRodW1iX2xhc3RcIikmJmE3Lm5leHQoKS5sZW5ndGgpe2FQKFwicmlnaHRcIil9ZWxzZXtpZihhNy5oYXNDbGFzcyhcImV0YWxhZ2Vfc21hbGx0aHVtYl9uYXZ0b3N0YXJ0XCIpKXthYygpfWVsc2V7aWYoeiYmIWEodGhpcykubmV4dCgpLmxlbmd0aCl7RigpO1xucmV0dXJuIHRydWV9ZWxzZXtpZih6JiYhYSh0aGlzKS5wcmV2KCkubGVuZ3RoKXthYygpO3JldHVybiB0cnVlfX1nKGE3LGZhbHNlKX19fX19fSk7aWYoYy5zbWFsbHRodW1iX3NlbGVjdF9vbl9ob3Zlcil7YVYubW91c2VlbnRlcihmdW5jdGlvbigpe2EodGhpcykudHJpZ2dlcihcImNsaWNrXCIpfSl9fWlmKGMuY2xpY2tfdG9fem9vbSl7dy5jbGljayhmdW5jdGlvbigpe0E9dHJ1ZTtVKCl9KX1lbHNle2FPLmNsaWNrKGZ1bmN0aW9uKCl7dmFyIGk9YXkuZGF0YShcImFuY2hvclwiKTtpZihpKXtpZihhSShpKSl7d2luZG93LmxvY2F0aW9uPWl9fX0pfWlmKHE+MSYmYy5rZXlib2FyZCl7YShkb2N1bWVudCkua2V5ZG93bihmdW5jdGlvbihpKXtpZihpLmtleUNvZGU9PT0zOXx8aS5rZXlDb2RlPT09XCIzOVwiKXtpZighYy5yaWdodF90b19sZWZ0KXthdSgpfWVsc2V7TCgpfX1pZihpLmtleUNvZGU9PT0zN3x8aS5rZXlDb2RlPT09XCIzN1wiKXtpZighYy5yaWdodF90b19sZWZ0KXtMKCl9ZWxzZXthdSgpXG59fX0pfWEod2luZG93KS5iaW5kKFwibG9hZFwiLGZ1bmN0aW9uKCl7dy5jc3Moe1wiYmFja2dyb3VuZC1pbWFnZVwiOlwibm9uZVwifSk7Sy5jc3Moe1wiYmFja2dyb3VuZC1pbWFnZVwiOlwibm9uZVwifSk7aWYoYW8pe2FvPWZhbHNlO2FuLnJlbW92ZSgpfX0pO2lmKGFKKXtrKCl9fX0pO3JldHVybiB0aGlzfX0pKGpRdWVyeSk7IiwiJChcIi5kcm9wZG93biBpbWcuZmxhZ1wiKS5hZGRDbGFzcyhcImZsYWd2aXNpYmlsaXR5XCIpO1xuXG4kKFwiLmRyb3Bkb3duIGR0IGFcIikuY2xpY2soZnVuY3Rpb24gKCkge1xuICAgICQoXCIuZHJvcGRvd24gZGQgdWxcIikudG9nZ2xlKCk7XG59KTtcblxuJChcIi5kcm9wZG93biBkZCB1bCBsaSBhXCIpLmNsaWNrKGZ1bmN0aW9uICgpIHtcbiAgICB2YXIgdGV4dCA9ICQodGhpcykuaHRtbCgpO1xuICAgICQoXCIuZHJvcGRvd24gZHQgYSBzcGFuXCIpLmh0bWwodGV4dCk7XG4gICAgJChcIi5kcm9wZG93biBkZCB1bFwiKS5oaWRlKCk7XG4gICAgJChcIiNyZXN1bHRcIikuaHRtbChcIlNlbGVjdGVkIHZhbHVlIGlzOiBcIiArIGdldFNlbGVjdGVkVmFsdWUoXCJzYW1wbGVcIikpO1xufSk7XG5cbmZ1bmN0aW9uIGdldFNlbGVjdGVkVmFsdWUoaWQpIHtcbiAgICByZXR1cm4gJChcIiNcIiArIGlkKS5maW5kKFwiZHQgYSBzcGFuLnZhbHVlXCIpLmh0bWwoKTtcbn1cblxuJChkb2N1bWVudCkuYmluZCgnY2xpY2snLCBmdW5jdGlvbiAoZSkge1xuICAgIHZhciAkY2xpY2tlZCA9ICQoZS50YXJnZXQpO1xuICAgIGlmICghJGNsaWNrZWQucGFyZW50cygpLmhhc0NsYXNzKFwiZHJvcGRvd25cIikpXG4gICAgICAgICQoXCIuZHJvcGRvd24gZGQgdWxcIikuaGlkZSgpO1xufSk7XG5cblxuJChcIiNmbGFnU3dpdGNoZXJcIikuY2xpY2soZnVuY3Rpb24gKCkge1xuICAgICQoXCIuZHJvcGRvd24gaW1nLmZsYWdcIikudG9nZ2xlQ2xhc3MoXCJmbGFndmlzaWJpbGl0eVwiKTtcbn0pO1xuXG4kKCcjZXRhbGFnZScpLmV0YWxhZ2Uoe1xuICAgIHRodW1iX2ltYWdlX3dpZHRoOiAzMDAsXG4gICAgdGh1bWJfaW1hZ2VfaGVpZ2h0OiA0MDAsXG5cbiAgICBzaG93X2hpbnQ6IHRydWUsXG4gICAgY2xpY2tfY2FsbGJhY2s6IGZ1bmN0aW9uIChpbWFnZV9hbmNob3IsIGluc3RhbmNlX2lkKSB7XG4gICAgICAgIGFsZXJ0KCdDYWxsYmFjayBleGFtcGxlOlxcbllvdSBjbGlja2VkIG9uIGFuIGltYWdlIHdpdGggdGhlIGFuY2hvcjogXCInICsgaW1hZ2VfYW5jaG9yICsgJ1wiXFxuKGluIEV0YWxhZ2UgaW5zdGFuY2U6IFwiJyArIGluc3RhbmNlX2lkICsgJ1wiKScpO1xuICAgIH1cbn0pO1xuLy8gVGhpcyBpcyBmb3IgdGhlIGRyb3Bkb3duIGxpc3QgZXhhbXBsZTpcbiQoJy5kcm9wZG93bmxpc3QnKS5jaGFuZ2UoZnVuY3Rpb24gKCkge1xuICAgIGV0YWxhZ2Vfc2hvdygkKHRoaXMpLmZpbmQoJ29wdGlvbjpzZWxlY3RlZCcpLmF0dHIoJ2NsYXNzJykpO1xufSk7XG4iLCJpbXBvcnQgJy4vanMvanF1ZXJ5LmV0YWxhZ2UubWluJ1xuaW1wb3J0ICcuL2pzL3NpbmdsZSciXSwic291cmNlUm9vdCI6IiJ9