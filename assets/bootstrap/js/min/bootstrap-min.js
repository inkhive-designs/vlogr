if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function($){var t=$.fn.jquery.split(" ")[0].split(".");if(t[0]<2&&t[1]<9||1==t[0]&&9==t[1]&&t[2]<1)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher")}(jQuery),+function($){"use strict";function t(){var t=document.createElement("bootstrap"),e={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var s in e)if(void 0!==t.style[s])return{end:e[s]};return!1}$.fn.emulateTransitionEnd=function(t){var e=!1,s=this;$(this).one("bsTransitionEnd",function(){e=!0});var i=function(){e||$(s).trigger($.support.transition.end)};return setTimeout(i,t),this},$(function(){$.support.transition=t(),$.support.transition&&($.event.special.bsTransitionEnd={bindType:$.support.transition.end,delegateType:$.support.transition.end,handle:function(t){return $(t.target).is(this)?t.handleObj.handler.apply(this,arguments):void 0}})})}(jQuery),+function($){"use strict";function t(t){return this.each(function(){var e=$(this),i=e.data("bs.alert");i||e.data("bs.alert",i=new s(this)),"string"==typeof t&&i[t].call(e)})}var e='[data-dismiss="alert"]',s=function(t){$(t).on("click",e,this.close)};s.VERSION="3.3.1",s.TRANSITION_DURATION=150,s.amora.close=function(t){function e(){n.detach().trigger("closed.bs.alert").remove()}var i=$(this),o=i.attr("data-target");o||(o=i.attr("href"),o=o&&o.replace(/.*(?=#[^\s]*$)/,""));var n=$(o);t&&t.preventDefault(),n.length||(n=i.closest(".alert")),n.trigger(t=$.Event("close.bs.alert")),t.isDefaultPrevented()||(n.removeClass("in"),$.support.transition&&n.hasClass("fade")?n.one("bsTransitionEnd",e).emulateTransitionEnd(s.TRANSITION_DURATION):e())};var i=$.fn.alert;$.fn.alert=t,$.fn.alert.Constructor=s,$.fn.alert.noConflict=function(){return $.fn.alert=i,this},$(document).on("click.bs.alert.data-api",e,s.amora.close)}(jQuery),+function($){"use strict";function t(t){return this.each(function(){var s=$(this),i=s.data("bs.button"),o="object"==typeof t&&t;i||s.data("bs.button",i=new e(this,o)),"toggle"==t?i.toggle():t&&i.setState(t)})}var e=function(t,s){this.$element=$(t),this.options=$.extend({},e.DEFAULTS,s),this.isLoading=!1};e.VERSION="3.3.1",e.DEFAULTS={loadingText:"loading..."},e.amora.setState=function(t){var e="disabled",s=this.$element,i=s.is("input")?"val":"html",o=s.data();t+="Text",null==o.resetText&&s.data("resetText",s[i]()),setTimeout($.proxy(function(){s[i](null==o[t]?this.options[t]:o[t]),"loadingText"==t?(this.isLoading=!0,s.addClass(e).attr(e,e)):this.isLoading&&(this.isLoading=!1,s.removeClass(e).removeAttr(e))},this),0)},e.amora.toggle=function(){var t=!0,e=this.$element.closest('[data-toggle="buttons"]');if(e.length){var s=this.$element.find("input");"radio"==s.prop("type")&&(s.prop("checked")&&this.$element.hasClass("active")?t=!1:e.find(".active").removeClass("active")),t&&s.prop("checked",!this.$element.hasClass("active")).trigger("change")}else this.$element.attr("aria-pressed",!this.$element.hasClass("active"));t&&this.$element.toggleClass("active")};var s=$.fn.button;$.fn.button=t,$.fn.button.Constructor=e,$.fn.button.noConflict=function(){return $.fn.button=s,this},$(document).on("click.bs.button.data-api",'[data-toggle^="button"]',function(e){var s=$(e.target);s.hasClass("btn")||(s=s.closest(".btn")),t.call(s,"toggle"),e.preventDefault()}).on("focus.bs.button.data-api blur.bs.button.data-api",'[data-toggle^="button"]',function(t){$(t.target).closest(".btn").toggleClass("focus",/^focus(in)?$/.test(t.type))})}(jQuery),+function($){"use strict";function t(t){return this.each(function(){var s=$(this),i=s.data("bs.carousel"),o=$.extend({},e.DEFAULTS,s.data(),"object"==typeof t&&t),n="string"==typeof t?t:o.slide;i||s.data("bs.carousel",i=new e(this,o)),"number"==typeof t?i.to(t):n?i[n]():o.interval&&i.pause().cycle()})}var e=function(t,e){this.$element=$(t),this.$indicators=this.$element.find(".carousel-indicators"),this.options=e,this.paused=this.sliding=this.interval=this.$active=this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",$.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",$.proxy(this.pause,this)).on("mouseleave.bs.carousel",$.proxy(this.cycle,this))};e.VERSION="3.3.1",e.TRANSITION_DURATION=600,e.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},e.amora.keydown=function(t){if(!/input|textarea/i.test(t.target.tagName)){switch(t.which){case 37:this.prev();break;case 39:this.next();break;default:return}t.preventDefault()}},e.amora.cycle=function(t){return t||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval($.proxy(this.next,this),this.options.interval)),this},e.amora.getItemIndex=function(t){return this.$items=t.parent().children(".item"),this.$items.index(t||this.$active)},e.amora.getItemForDirection=function(t,e){var s="prev"==t?-1:1,i=this.getItemIndex(e),o=(i+s)%this.$items.length;return this.$items.eq(o)},e.amora.to=function(t){var e=this,s=this.getItemIndex(this.$active=this.$element.find(".item.active"));return t>this.$items.length-1||0>t?void 0:this.sliding?this.$element.one("slid.bs.carousel",function(){e.to(t)}):s==t?this.pause().cycle():this.slide(t>s?"next":"prev",this.$items.eq(t))},e.amora.pause=function(t){return t||(this.paused=!0),this.$element.find(".next, .prev").length&&$.support.transition&&(this.$element.trigger($.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},e.amora.next=function(){return this.sliding?void 0:this.slide("next")},e.amora.prev=function(){return this.sliding?void 0:this.slide("prev")},e.amora.slide=function(t,s){var i=this.$element.find(".item.active"),o=s||this.getItemForDirection(t,i),n=this.interval,r="next"==t?"left":"right",a="next"==t?"first":"last",l=this;if(!o.length){if(!this.options.wrap)return;o=this.$element.find(".item")[a]()}if(o.hasClass("active"))return this.sliding=!1;var h=o[0],d=$.Event("slide.bs.carousel",{relatedTarget:h,direction:r});if(this.$element.trigger(d),!d.isDefaultPrevented()){if(this.sliding=!0,n&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var p=$(this.$indicators.children()[this.getItemIndex(o)]);p&&p.addClass("active")}var c=$.Event("slid.bs.carousel",{relatedTarget:h,direction:r});return $.support.transition&&this.$element.hasClass("slide")?(o.addClass(t),o[0].offsetWidth,i.addClass(r),o.addClass(r),i.one("bsTransitionEnd",function(){o.removeClass([t,r].join(" ")).addClass("active"),i.removeClass(["active",r].join(" ")),l.sliding=!1,setTimeout(function(){l.$element.trigger(c)},0)}).emulateTransitionEnd(e.TRANSITION_DURATION)):(i.removeClass("active"),o.addClass("active"),this.sliding=!1,this.$element.trigger(c)),n&&this.cycle(),this}};var s=$.fn.carousel;$.fn.carousel=t,$.fn.carousel.Constructor=e,$.fn.carousel.noConflict=function(){return $.fn.carousel=s,this};var i=function(e){var s,i=$(this),o=$(i.attr("data-target")||(s=i.attr("href"))&&s.replace(/.*(?=#[^\s]+$)/,""));if(o.hasClass("carousel")){var n=$.extend({},o.data(),i.data()),r=i.attr("data-slide-to");r&&(n.interval=!1),t.call(o,n),r&&o.data("bs.carousel").to(r),e.preventDefault()}};$(document).on("click.bs.carousel.data-api","[data-slide]",i).on("click.bs.carousel.data-api","[data-slide-to]",i),$(window).on("load",function(){$('[data-ride="carousel"]').each(function(){var e=$(this);t.call(e,e.data())})})}(jQuery),+function($){"use strict";function t(t){var e,s=t.attr("data-target")||(e=t.attr("href"))&&e.replace(/.*(?=#[^\s]+$)/,"");return $(s)}function e(t){return this.each(function(){var e=$(this),i=e.data("bs.collapse"),o=$.extend({},s.DEFAULTS,e.data(),"object"==typeof t&&t);!i&&o.toggle&&"show"==t&&(o.toggle=!1),i||e.data("bs.collapse",i=new s(this,o)),"string"==typeof t&&i[t]()})}var s=function(t,e){this.$element=$(t),this.options=$.extend({},s.DEFAULTS,e),this.$trigger=$(this.options.trigger).filter('[href="#'+t.id+'"], [data-target="#'+t.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};s.VERSION="3.3.1",s.TRANSITION_DURATION=350,s.DEFAULTS={toggle:!0,trigger:'[data-toggle="collapse"]'},s.amora.dimension=function(){var t=this.$element.hasClass("width");return t?"width":"height"},s.amora.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var t,i=this.$parent&&this.$parent.find("> .panel").children(".in, .collapsing");if(!(i&&i.length&&(t=i.data("bs.collapse"),t&&t.transitioning))){var o=$.Event("show.bs.collapse");if(this.$element.trigger(o),!o.isDefaultPrevented()){i&&i.length&&(e.call(i,"hide"),t||i.data("bs.collapse",null));var n=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[n](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var r=function(){this.$element.removeClass("collapsing").addClass("collapse in")[n](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!$.support.transition)return r.call(this);var a=$.camelCase(["scroll",n].join("-"));this.$element.one("bsTransitionEnd",$.proxy(r,this)).emulateTransitionEnd(s.TRANSITION_DURATION)[n](this.$element[0][a])}}}},s.amora.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var t=$.Event("hide.bs.collapse");if(this.$element.trigger(t),!t.isDefaultPrevented()){var e=this.dimension();this.$element[e](this.$element[e]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var i=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return $.support.transition?void this.$element[e](0).one("bsTransitionEnd",$.proxy(i,this)).emulateTransitionEnd(s.TRANSITION_DURATION):i.call(this)}}},s.amora.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},s.amora.getParent=function(){return $(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each($.proxy(function(e,s){var i=$(s);this.addAriaAndCollapsedClass(t(i),i)},this)).end()},s.amora.addAriaAndCollapsedClass=function(t,e){var s=t.hasClass("in");t.attr("aria-expanded",s),e.toggleClass("collapsed",!s).attr("aria-expanded",s)};var i=$.fn.collapse;$.fn.collapse=e,$.fn.collapse.Constructor=s,$.fn.collapse.noConflict=function(){return $.fn.collapse=i,this},$(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(s){var i=$(this);i.attr("data-target")||s.preventDefault();var o=t(i),n=o.data("bs.collapse"),r=n?"toggle":$.extend({},i.data(),{trigger:this});e.call(o,r)})}(jQuery),+function($){"use strict";function t(t){t&&3===t.which||($(i).remove(),$(o).each(function(){var s=$(this),i=e(s),o={relatedTarget:this};i.hasClass("open")&&(i.trigger(t=$.Event("hide.bs.dropdown",o)),t.isDefaultPrevented()||(s.attr("aria-expanded","false"),i.removeClass("open").trigger("hidden.bs.dropdown",o)))}))}function e(t){var e=t.attr("data-target");e||(e=t.attr("href"),e=e&&/#[A-Za-z]/.test(e)&&e.replace(/.*(?=#[^\s]*$)/,""));var s=e&&$(e);return s&&s.length?s:t.parent()}function s(t){return this.each(function(){var e=$(this),s=e.data("bs.dropdown");s||e.data("bs.dropdown",s=new n(this)),"string"==typeof t&&s[t].call(e)})}var i=".dropdown-backdrop",o='[data-toggle="dropdown"]',n=function(t){$(t).on("click.bs.dropdown",this.toggle)};n.VERSION="3.3.1",n.amora.toggle=function(s){var i=$(this);if(!i.is(".disabled, :disabled")){var o=e(i),n=o.hasClass("open");if(t(),!n){"ontouchstart"in document.documentElement&&!o.closest(".navbar-nav").length&&$('<div class="dropdown-backdrop"/>').insertAfter($(this)).on("click",t);var r={relatedTarget:this};if(o.trigger(s=$.Event("show.bs.dropdown",r)),s.isDefaultPrevented())return;i.trigger("focus").attr("aria-expanded","true"),o.toggleClass("open").trigger("shown.bs.dropdown",r)}return!1}},n.amora.keydown=function(t){if(/(38|40|27|32)/.test(t.which)&&!/input|textarea/i.test(t.target.tagName)){var s=$(this);if(t.preventDefault(),t.stopPropagation(),!s.is(".disabled, :disabled")){var i=e(s),n=i.hasClass("open");if(!n&&27!=t.which||n&&27==t.which)return 27==t.which&&i.find(o).trigger("focus"),s.trigger("click");var r=" li:not(.divider):visible a",a=i.find('[role="menu"]'+r+', [role="listbox"]'+r);if(a.length){var l=a.index(t.target);38==t.which&&l>0&&l--,40==t.which&&l<a.length-1&&l++,~l||(l=0),a.eq(l).trigger("focus")}}}};var r=$.fn.dropdown;$.fn.dropdown=s,$.fn.dropdown.Constructor=n,$.fn.dropdown.noConflict=function(){return $.fn.dropdown=r,this},$(document).on("click.bs.dropdown.data-api",t).on("click.bs.dropdown.data-api",".dropdown form",function(t){t.stopPropagation()}).on("click.bs.dropdown.data-api",o,n.amora.toggle).on("keydown.bs.dropdown.data-api",o,n.amora.keydown).on("keydown.bs.dropdown.data-api",'[role="menu"]',n.amora.keydown).on("keydown.bs.dropdown.data-api",'[role="listbox"]',n.amora.keydown)}(jQuery),+function($){"use strict";function t(t,s){return this.each(function(){var i=$(this),o=i.data("bs.modal"),n=$.extend({},e.DEFAULTS,i.data(),"object"==typeof t&&t);o||i.data("bs.modal",o=new e(this,n)),"string"==typeof t?o[t](s):n.show&&o.show(s)})}var e=function(t,e){this.options=e,this.$body=$(document.body),this.$element=$(t),this.$backdrop=this.isShown=null,this.scrollbarWidth=0,this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,$.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};e.VERSION="3.3.1",e.TRANSITION_DURATION=300,e.BACKDROP_TRANSITION_DURATION=150,e.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},e.amora.toggle=function(t){return this.isShown?this.hide():this.show(t)},e.amora.show=function(t){var s=this,i=$.Event("show.bs.modal",{relatedTarget:t});this.$element.trigger(i),this.isShown||i.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',$.proxy(this.hide,this)),this.backdrop(function(){var i=$.support.transition&&s.$element.hasClass("fade");s.$element.parent().length||s.$element.appendTo(s.$body),s.$element.show().scrollTop(0),s.options.backdrop&&s.adjustBackdrop(),s.adjustDialog(),i&&s.$element[0].offsetWidth,s.$element.addClass("in").attr("aria-hidden",!1),s.enforceFocus();var o=$.Event("shown.bs.modal",{relatedTarget:t});i?s.$element.find(".modal-dialog").one("bsTransitionEnd",function(){s.$element.trigger("focus").trigger(o)}).emulateTransitionEnd(e.TRANSITION_DURATION):s.$element.trigger("focus").trigger(o)}))},e.amora.hide=function(t){t&&t.preventDefault(),t=$.Event("hide.bs.modal"),this.$element.trigger(t),this.isShown&&!t.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),$(document).off("focusin.bs.modal"),this.$element.removeClass("in").attr("aria-hidden",!0).off("click.dismiss.bs.modal"),$.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",$.proxy(this.hideModal,this)).emulateTransitionEnd(e.TRANSITION_DURATION):this.hideModal())},e.amora.enforceFocus=function(){$(document).off("focusin.bs.modal").on("focusin.bs.modal",$.proxy(function(t){this.$element[0]===t.target||this.$element.has(t.target).length||this.$element.trigger("focus")},this))},e.amora.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",$.proxy(function(t){27==t.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},e.amora.resize=function(){this.isShown?$(window).on("resize.bs.modal",$.proxy(this.handleUpdate,this)):$(window).off("resize.bs.modal")},e.amora.hideModal=function(){var t=this;this.$element.hide(),this.backdrop(function(){t.$body.removeClass("modal-open"),t.resetAdjustments(),t.resetScrollbar(),t.$element.trigger("hidden.bs.modal")})},e.amora.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},e.amora.backdrop=function(t){var s=this,i=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var o=$.support.transition&&i;if(this.$backdrop=$('<div class="modal-backdrop '+i+'" />').prependTo(this.$element).on("click.dismiss.bs.modal",$.proxy(function(t){t.target===t.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus.call(this.$element[0]):this.hide.call(this))},this)),o&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!t)return;o?this.$backdrop.one("bsTransitionEnd",t).emulateTransitionEnd(e.BACKDROP_TRANSITION_DURATION):t()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var n=function(){s.removeBackdrop(),t&&t()};$.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",n).emulateTransitionEnd(e.BACKDROP_TRANSITION_DURATION):n()}else t&&t()},e.amora.handleUpdate=function(){this.options.backdrop&&this.adjustBackdrop(),this.adjustDialog()},e.amora.adjustBackdrop=function(){this.$backdrop.css("height",0).css("height",this.$element[0].scrollHeight)},e.amora.adjustDialog=function(){var t=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&t?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!t?this.scrollbarWidth:""})},e.amora.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},e.amora.checkScrollbar=function(){this.bodyIsOverflowing=document.body.scrollHeight>document.documentElement.clientHeight,this.scrollbarWidth=this.measureScrollbar()},e.amora.setScrollbar=function(){var t=parseInt(this.$body.css("padding-right")||0,10);this.bodyIsOverflowing&&this.$body.css("padding-right",t+this.scrollbarWidth)},e.amora.resetScrollbar=function(){this.$body.css("padding-right","")},e.amora.measureScrollbar=function(){var t=document.createElement("div");t.className="modal-scrollbar-measure",this.$body.append(t);var e=t.offsetWidth-t.clientWidth;return this.$body[0].removeChild(t),e};var s=$.fn.modal;$.fn.modal=t,$.fn.modal.Constructor=e,$.fn.modal.noConflict=function(){return $.fn.modal=s,this},$(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(e){var s=$(this),i=s.attr("href"),o=$(s.attr("data-target")||i&&i.replace(/.*(?=#[^\s]+$)/,"")),n=o.data("bs.modal")?"toggle":$.extend({remote:!/#/.test(i)&&i},o.data(),s.data());s.is("a")&&e.preventDefault(),o.one("show.bs.modal",function(t){t.isDefaultPrevented()||o.one("hidden.bs.modal",function(){s.is(":visible")&&s.trigger("focus")})}),t.call(o,n,this)})}(jQuery),+function($){"use strict";function t(t){return this.each(function(){var s=$(this),i=s.data("bs.tooltip"),o="object"==typeof t&&t,n=o&&o.selector;(i||"destroy"!=t)&&(n?(i||s.data("bs.tooltip",i={}),i[n]||(i[n]=new e(this,o))):i||s.data("bs.tooltip",i=new e(this,o)),"string"==typeof t&&i[t]())})}var e=function(t,e){this.type=this.options=this.enabled=this.timeout=this.hoverState=this.$element=null,this.init("tooltip",t,e)};e.VERSION="3.3.1",e.TRANSITION_DURATION=150,e.DEFAULTS={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1,viewport:{selector:"body",padding:0}},e.amora.init=function(t,e,s){this.enabled=!0,this.type=t,this.$element=$(e),this.options=this.getOptions(s),this.$viewport=this.options.viewport&&$(this.options.viewport.selector||this.options.viewport);for(var i=this.options.trigger.split(" "),o=i.length;o--;){var n=i[o];if("click"==n)this.$element.on("click."+this.type,this.options.selector,$.proxy(this.toggle,this));else if("manual"!=n){var r="hover"==n?"mouseenter":"focusin",a="hover"==n?"mouseleave":"focusout";this.$element.on(r+"."+this.type,this.options.selector,$.proxy(this.enter,this)),this.$element.on(a+"."+this.type,this.options.selector,$.proxy(this.leave,this))}}this.options.selector?this._options=$.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},e.amora.getDefaults=function(){return e.DEFAULTS},e.amora.getOptions=function(t){return t=$.extend({},this.getDefaults(),this.$element.data(),t),t.delay&&"number"==typeof t.delay&&(t.delay={show:t.delay,hide:t.delay}),t},e.amora.getDelegateOptions=function(){var t={},e=this.getDefaults();return this._options&&$.each(this._options,function(s,i){e[s]!=i&&(t[s]=i)}),t},e.amora.enter=function(t){var e=t instanceof this.constructor?t:$(t.currentTarget).data("bs."+this.type);return e&&e.$tip&&e.$tip.is(":visible")?void(e.hoverState="in"):(e||(e=new this.constructor(t.currentTarget,this.getDelegateOptions()),$(t.currentTarget).data("bs."+this.type,e)),clearTimeout(e.timeout),e.hoverState="in",e.options.delay&&e.options.delay.show?void(e.timeout=setTimeout(function(){"in"==e.hoverState&&e.show()},e.options.delay.show)):e.show())},e.amora.leave=function(t){var e=t instanceof this.constructor?t:$(t.currentTarget).data("bs."+this.type);return e||(e=new this.constructor(t.currentTarget,this.getDelegateOptions()),$(t.currentTarget).data("bs."+this.type,e)),clearTimeout(e.timeout),e.hoverState="out",e.options.delay&&e.options.delay.hide?void(e.timeout=setTimeout(function(){"out"==e.hoverState&&e.hide()},e.options.delay.hide)):e.hide()},e.amora.show=function(){var t=$.Event("show.bs."+this.type);if(this.hasContent()&&this.enabled){this.$element.trigger(t);var s=$.contains(this.$element[0].ownerDocument.documentElement,this.$element[0]);if(t.isDefaultPrevented()||!s)return;var i=this,o=this.tip(),n=this.getUID(this.type);this.setContent(),o.attr("id",n),this.$element.attr("aria-describedby",n),this.options.animation&&o.addClass("fade");var r="function"==typeof this.options.placement?this.options.placement.call(this,o[0],this.$element[0]):this.options.placement,a=/\s?auto?\s?/i,l=a.test(r);l&&(r=r.replace(a,"")||"top"),o.detach().css({top:0,left:0,display:"block"}).addClass(r).data("bs."+this.type,this),this.options.container?o.appendTo(this.options.container):o.insertAfter(this.$element);var h=this.getPosition(),d=o[0].offsetWidth,p=o[0].offsetHeight;if(l){var c=r,f=this.options.container?$(this.options.container):this.$element.parent(),u=this.getPosition(f);r="bottom"==r&&h.bottom+p>u.bottom?"top":"top"==r&&h.top-p<u.top?"bottom":"right"==r&&h.right+d>u.width?"left":"left"==r&&h.left-d<u.left?"right":r,o.removeClass(c).addClass(r)}var g=this.getCalculatedOffset(r,h,d,p);this.applyPlacement(g,r);var v=function(){var t=i.hoverState;i.$element.trigger("shown.bs."+i.type),i.hoverState=null,"out"==t&&i.leave(i)};$.support.transition&&this.$tip.hasClass("fade")?o.one("bsTransitionEnd",v).emulateTransitionEnd(e.TRANSITION_DURATION):v()}},e.amora.applyPlacement=function(t,e){var s=this.tip(),i=s[0].offsetWidth,o=s[0].offsetHeight,n=parseInt(s.css("margin-top"),10),r=parseInt(s.css("margin-left"),10);isNaN(n)&&(n=0),isNaN(r)&&(r=0),t.top=t.top+n,t.left=t.left+r,$.offset.setOffset(s[0],$.extend({using:function(t){s.css({top:Math.round(t.top),left:Math.round(t.left)})}},t),0),s.addClass("in");var a=s[0].offsetWidth,l=s[0].offsetHeight;"top"==e&&l!=o&&(t.top=t.top+o-l);var h=this.getViewportAdjustedDelta(e,t,a,l);h.left?t.left+=h.left:t.top+=h.top;var d=/top|bottom/.test(e),p=d?2*h.left-i+a:2*h.top-o+l,c=d?"offsetWidth":"offsetHeight";s.offset(t),this.replaceArrow(p,s[0][c],d)},e.amora.replaceArrow=function(t,e,s){this.arrow().css(s?"left":"top",50*(1-t/e)+"%").css(s?"top":"left","")},e.amora.setContent=function(){var t=this.tip(),e=this.getTitle();t.find(".tooltip-inner")[this.options.html?"html":"text"](e),t.removeClass("fade in top bottom left right")},e.amora.hide=function(t){function s(){"in"!=i.hoverState&&o.detach(),i.$element.removeAttr("aria-describedby").trigger("hidden.bs."+i.type),t&&t()}var i=this,o=this.tip(),n=$.Event("hide.bs."+this.type);return this.$element.trigger(n),n.isDefaultPrevented()?void 0:(o.removeClass("in"),$.support.transition&&this.$tip.hasClass("fade")?o.one("bsTransitionEnd",s).emulateTransitionEnd(e.TRANSITION_DURATION):s(),this.hoverState=null,this)},e.amora.fixTitle=function(){var t=this.$element;(t.attr("title")||"string"!=typeof t.attr("data-original-title"))&&t.attr("data-original-title",t.attr("title")||"").attr("title","")},e.amora.hasContent=function(){return this.getTitle()},e.amora.getPosition=function(t){t=t||this.$element;var e=t[0],s="BODY"==e.tagName,i=e.getBoundingClientRect();null==i.width&&(i=$.extend({},i,{width:i.right-i.left,height:i.bottom-i.top}));var o=s?{top:0,left:0}:t.offset(),n={scroll:s?document.documentElement.scrollTop||document.body.scrollTop:t.scrollTop()},r=s?{width:$(window).width(),height:$(window).height()}:null;return $.extend({},i,n,r,o)},e.amora.getCalculatedOffset=function(t,e,s,i){return"bottom"==t?{top:e.top+e.height,left:e.left+e.width/2-s/2}:"top"==t?{top:e.top-i,left:e.left+e.width/2-s/2}:"left"==t?{top:e.top+e.height/2-i/2,left:e.left-s}:{top:e.top+e.height/2-i/2,left:e.left+e.width}},e.amora.getViewportAdjustedDelta=function(t,e,s,i){var o={top:0,left:0};if(!this.$viewport)return o;var n=this.options.viewport&&this.options.viewport.padding||0,r=this.getPosition(this.$viewport);if(/right|left/.test(t)){var a=e.top-n-r.scroll,l=e.top+n-r.scroll+i;a<r.top?o.top=r.top-a:l>r.top+r.height&&(o.top=r.top+r.height-l)}else{var h=e.left-n,d=e.left+n+s;h<r.left?o.left=r.left-h:d>r.width&&(o.left=r.left+r.width-d)}return o},e.amora.getTitle=function(){var t,e=this.$element,s=this.options;return t=e.attr("data-original-title")||("function"==typeof s.title?s.title.call(e[0]):s.title)},e.amora.getUID=function(t){do t+=~~(1e6*Math.random());while(document.getElementById(t));return t},e.amora.tip=function(){return this.$tip=this.$tip||$(this.options.template)},e.amora.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},e.amora.enable=function(){this.enabled=!0},e.amora.disable=function(){this.enabled=!1},e.amora.toggleEnabled=function(){this.enabled=!this.enabled},e.amora.toggle=function(t){var e=this;t&&(e=$(t.currentTarget).data("bs."+this.type),e||(e=new this.constructor(t.currentTarget,this.getDelegateOptions()),$(t.currentTarget).data("bs."+this.type,e))),e.tip().hasClass("in")?e.leave(e):e.enter(e)},e.amora.destroy=function(){var t=this;clearTimeout(this.timeout),this.hide(function(){t.$element.off("."+t.type).removeData("bs."+t.type)})};var s=$.fn.tooltip;$.fn.tooltip=t,$.fn.tooltip.Constructor=e,$.fn.tooltip.noConflict=function(){return $.fn.tooltip=s,this}}(jQuery),+function($){"use strict";function t(t){return this.each(function(){var s=$(this),i=s.data("bs.popover"),o="object"==typeof t&&t,n=o&&o.selector;(i||"destroy"!=t)&&(n?(i||s.data("bs.popover",i={}),i[n]||(i[n]=new e(this,o))):i||s.data("bs.popover",i=new e(this,o)),"string"==typeof t&&i[t]())})}var e=function(t,e){this.init("popover",t,e)};if(!$.fn.tooltip)throw new Error("Popover requires tooltip.js");e.VERSION="3.3.1",e.DEFAULTS=$.extend({},$.fn.tooltip.Constructor.DEFAULTS,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),e.amora=$.extend({},$.fn.tooltip.Constructor.amora),e.amora.constructor=e,e.amora.getDefaults=function(){return e.DEFAULTS},e.amora.setContent=function(){var t=this.tip(),e=this.getTitle(),s=this.getContent();t.find(".popover-title")[this.options.html?"html":"text"](e),t.find(".popover-content").children().detach().end()[this.options.html?"string"==typeof s?"html":"append":"text"](s),t.removeClass("fade top bottom left right in"),t.find(".popover-title").html()||t.find(".popover-title").hide()},e.amora.hasContent=function(){return this.getTitle()||this.getContent()},e.amora.getContent=function(){var t=this.$element,e=this.options;return t.attr("data-content")||("function"==typeof e.content?e.content.call(t[0]):e.content)},e.amora.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".arrow")},e.amora.tip=function(){return this.$tip||(this.$tip=$(this.options.template)),this.$tip};var s=$.fn.popover;$.fn.popover=t,$.fn.popover.Constructor=e,$.fn.popover.noConflict=function(){return $.fn.popover=s,this}}(jQuery),+function($){"use strict";function t(e,s){var i=$.proxy(this.process,this);this.$body=$("body"),this.$scrollElement=$($(e).is("body")?window:e),this.options=$.extend({},t.DEFAULTS,s),this.selector=(this.options.target||"")+" .nav li > a",this.offsets=[],this.targets=[],this.activeTarget=null,this.scrollHeight=0,this.$scrollElement.on("scroll.bs.scrollspy",i),this.refresh(),this.process()}function e(e){return this.each(function(){var s=$(this),i=s.data("bs.scrollspy"),o="object"==typeof e&&e;i||s.data("bs.scrollspy",i=new t(this,o)),"string"==typeof e&&i[e]()})}t.VERSION="3.3.1",t.DEFAULTS={offset:10},t.amora.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)},t.amora.refresh=function(){var t="offset",e=0;$.isWindow(this.$scrollElement[0])||(t="position",e=this.$scrollElement.scrollTop()),this.offsets=[],this.targets=[],this.scrollHeight=this.getScrollHeight();var s=this;this.$body.find(this.selector).map(function(){var s=$(this),i=s.data("target")||s.attr("href"),o=/^#./.test(i)&&$(i);return o&&o.length&&o.is(":visible")&&[[o[t]().top+e,i]]||null}).sort(function(t,e){return t[0]-e[0]}).each(function(){s.offsets.push(this[0]),s.targets.push(this[1])})},t.amora.process=function(){var t=this.$scrollElement.scrollTop()+this.options.offset,e=this.getScrollHeight(),s=this.options.offset+e-this.$scrollElement.height(),i=this.offsets,o=this.targets,n=this.activeTarget,r;if(this.scrollHeight!=e&&this.refresh(),t>=s)return n!=(r=o[o.length-1])&&this.activate(r);if(n&&t<i[0])return this.activeTarget=null,this.clear();for(r=i.length;r--;)n!=o[r]&&t>=i[r]&&(!i[r+1]||t<=i[r+1])&&this.activate(o[r])},t.amora.activate=function(t){this.activeTarget=t,this.clear();var e=this.selector+'[data-target="'+t+'"],'+this.selector+'[href="'+t+'"]',s=$(e).parents("li").addClass("active");s.parent(".dropdown-menu").length&&(s=s.closest("li.dropdown").addClass("active")),s.trigger("activate.bs.scrollspy")},t.amora.clear=function(){$(this.selector).parentsUntil(this.options.target,".active").removeClass("active")};var s=$.fn.scrollspy;$.fn.scrollspy=e,$.fn.scrollspy.Constructor=t,$.fn.scrollspy.noConflict=function(){return $.fn.scrollspy=s,this},$(window).on("load.bs.scrollspy.data-api",function(){$('[data-spy="scroll"]').each(function(){var t=$(this);e.call(t,t.data())})})}(jQuery),+function($){"use strict";function t(t){return this.each(function(){var s=$(this),i=s.data("bs.tab");i||s.data("bs.tab",i=new e(this)),"string"==typeof t&&i[t]()})}var e=function(t){this.element=$(t)};e.VERSION="3.3.1",e.TRANSITION_DURATION=150,e.amora.show=function(){var t=this.element,e=t.closest("ul:not(.dropdown-menu)"),s=t.data("target");if(s||(s=t.attr("href"),s=s&&s.replace(/.*(?=#[^\s]*$)/,"")),!t.parent("li").hasClass("active")){var i=e.find(".active:last a"),o=$.Event("hide.bs.tab",{relatedTarget:t[0]}),n=$.Event("show.bs.tab",{relatedTarget:i[0]});if(i.trigger(o),t.trigger(n),!n.isDefaultPrevented()&&!o.isDefaultPrevented()){var r=$(s);this.activate(t.closest("li"),e),this.activate(r,r.parent(),function(){i.trigger({type:"hidden.bs.tab",relatedTarget:t[0]}),t.trigger({type:"shown.bs.tab",relatedTarget:i[0]})
})}}},e.amora.activate=function(t,s,i){function o(){n.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),t.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),r?(t[0].offsetWidth,t.addClass("in")):t.removeClass("fade"),t.parent(".dropdown-menu")&&t.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),i&&i()}var n=s.find("> .active"),r=i&&$.support.transition&&(n.length&&n.hasClass("fade")||!!s.find("> .fade").length);n.length&&r?n.one("bsTransitionEnd",o).emulateTransitionEnd(e.TRANSITION_DURATION):o(),n.removeClass("in")};var s=$.fn.tab;$.fn.tab=t,$.fn.tab.Constructor=e,$.fn.tab.noConflict=function(){return $.fn.tab=s,this};var i=function(e){e.preventDefault(),t.call($(this),"show")};$(document).on("click.bs.tab.data-api",'[data-toggle="tab"]',i).on("click.bs.tab.data-api",'[data-toggle="pill"]',i)}(jQuery),+function($){"use strict";function t(t){return this.each(function(){var s=$(this),i=s.data("bs.affix"),o="object"==typeof t&&t;i||s.data("bs.affix",i=new e(this,o)),"string"==typeof t&&i[t]()})}var e=function(t,s){this.options=$.extend({},e.DEFAULTS,s),this.$target=$(this.options.target).on("scroll.bs.affix.data-api",$.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",$.proxy(this.checkPositionWithEventLoop,this)),this.$element=$(t),this.affixed=this.unpin=this.pinnedOffset=null,this.checkPosition()};e.VERSION="3.3.1",e.RESET="affix affix-top affix-bottom",e.DEFAULTS={offset:0,target:window},e.amora.getState=function(t,e,s,i){var o=this.$target.scrollTop(),n=this.$element.offset(),r=this.$target.height();if(null!=s&&"top"==this.affixed)return s>o?"top":!1;if("bottom"==this.affixed)return null!=s?o+this.unpin<=n.top?!1:"bottom":t-i>=o+r?!1:"bottom";var a=null==this.affixed,l=a?o:n.top,h=a?r:e;return null!=s&&s>=l?"top":null!=i&&l+h>=t-i?"bottom":!1},e.amora.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset;this.$element.removeClass(e.RESET).addClass("affix");var t=this.$target.scrollTop(),s=this.$element.offset();return this.pinnedOffset=s.top-t},e.amora.checkPositionWithEventLoop=function(){setTimeout($.proxy(this.checkPosition,this),1)},e.amora.checkPosition=function(){if(this.$element.is(":visible")){var t=this.$element.height(),s=this.options.offset,i=s.top,o=s.bottom,n=$("body").height();"object"!=typeof s&&(o=i=s),"function"==typeof i&&(i=s.top(this.$element)),"function"==typeof o&&(o=s.bottom(this.$element));var r=this.getState(n,t,i,o);if(this.affixed!=r){null!=this.unpin&&this.$element.css("top","");var a="affix"+(r?"-"+r:""),l=$.Event(a+".bs.affix");if(this.$element.trigger(l),l.isDefaultPrevented())return;this.affixed=r,this.unpin="bottom"==r?this.getPinnedOffset():null,this.$element.removeClass(e.RESET).addClass(a).trigger(a.replace("affix","affixed")+".bs.affix")}"bottom"==r&&this.$element.offset({top:n-t-o})}};var s=$.fn.affix;$.fn.affix=t,$.fn.affix.Constructor=e,$.fn.affix.noConflict=function(){return $.fn.affix=s,this},$(window).on("load",function(){$('[data-spy="affix"]').each(function(){var e=$(this),s=e.data();s.offset=s.offset||{},null!=s.offsetBottom&&(s.offset.bottom=s.offsetBottom),null!=s.offsetTop&&(s.offset.top=s.offsetTop),t.call(e,s)})})}(jQuery);
