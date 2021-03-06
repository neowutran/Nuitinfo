/*
 Highcharts JS v3.0.5 (2013-08-23)

 Standalone Highcharts Framework

 License: MIT License
 */
var HighchartsAdapter = function () {
    function n(c) {
        function a(a, b, d) {
            a.removeEventListener(b, d, !1)
        }

        function d(a, b, d) {
            d = a.HCProxiedMethods[d.toString()];
            a.detachEvent("on" + b, d)
        }

        function b(b, c) {
            var g = b.HCEvents, i, h, l, f;
            if (b.removeEventListener)i = a; else if (b.attachEvent)i = d; else return;
            c ? (h = {}, h[c] = !0) : h = g;
            for (f in h)if (g[f])for (l = g[f].length; l--;)i(b, f, g[f][l])
        }

        c.HCExtended || Highcharts.extend(c, {HCExtended: !0, HCEvents: {}, bind: function (b, a) {
            var d = this, c = this.HCEvents, h;
            if (d.addEventListener)d.addEventListener(b,
                a, !1); else if (d.attachEvent) {
                h = function (b) {
                    a.call(d, b)
                };
                if (!d.HCProxiedMethods)d.HCProxiedMethods = {};
                d.HCProxiedMethods[a.toString()] = h;
                d.attachEvent("on" + b, h)
            }
            c[b] === q && (c[b] = []);
            c[b].push(a)
        }, unbind                                       : function (c, k) {
            var g, i;
            c ? (g = this.HCEvents[c] || [], k ? (i = HighchartsAdapter.inArray(k, g), i > -1 && (g.splice(i, 1), this.HCEvents[c] = g), this.removeEventListener ? a(this, c, k) : this.attachEvent && d(this, c, k)) : (b(this, c), this.HCEvents[c] = [])) : (b(this), this.HCEvents = {})
        }, trigger                                      : function (b, a) {
            var d = this.HCEvents[b] ||
                [], c = d.length, h, f;
            for (h = function () {
                a.defaultPrevented = !0
            }; c--;) {
                f = d[c];
                if (a.stopped)break;
                a.preventDefault = h;
                a.target = this;
                f.call(this, a) === !1 && a.preventDefault()
            }
        }});
        return c
    }

    var q, f = document, o = [], j = [], p, m;
    Math.easeInOutSine = function (c, a, d, b) {
        return-d / 2 * (Math.cos(Math.PI * c / b) - 1) + a
    };
    return{init      : function (c) {
        if (!f.defaultView)this._getStyle = function (a, d) {
            var b;
            return a.style[d] ? a.style[d] : (d === "opacity" && (d = "filter"), b = a.currentStyle[d.replace(/\-(\w)/g, function (a, b) {
                return b.toUpperCase()
            })], d === "filter" &&
                (b = b.replace(/alpha\(opacity=([0-9]+)\)/, function (b, a) {
                    return a / 100
                })), b === "" ? 1 : b)
        }, this.adapterRun = function (a, d) {
            var b = {width: "clientWidth", height: "clientHeight"}[d];
            if (b)return a.style.zoom = 1, a[b] - 2 * parseInt(HighchartsAdapter._getStyle(a, "padding"), 10)
        };
        if (!Array.prototype.forEach)this.each = function (a, d) {
            for (var b = 0, c = a.length; b < c; b++)if (d.call(a[b], a[b], b, a) === !1)return b
        };
        if (!Array.prototype.indexOf)this.inArray = function (a, d) {
            var b, c = 0;
            if (d)for (b = d.length; c < b; c++)if (d[c] === a)return c;
            return-1
        };
        if (!Array.prototype.filter)this.grep = function (a, d) {
            for (var b = [], c = 0, f = a.length; c < f; c++)d(a[c], c) && b.push(a[c]);
            return b
        };
        m = function (a, c, b) {
            this.options = c;
            this.elem = a;
            this.prop = b
        };
        m.prototype = {update: function () {
            var a;
            a = this.paths;
            var d = this.elem, b = d.element;
            a && b ? d.attr("d", c.step(a[0], a[1], this.now, this.toD)) : d.attr ? b && d.attr(this.prop, this.now) : (a = {}, a[d] = this.now + this.unit, Highcharts.css(d, a));
            this.options.step && this.options.step.call(this.elem, this.now, this)
        }, custom            : function (a, c, b) {
            var e = this, f =
                function (a) {
                    return e.step(a)
                }, g;
            this.startTime = +new Date;
            this.start = a;
            this.end = c;
            this.unit = b;
            this.now = this.start;
            this.pos = this.state = 0;
            f.elem = this.elem;
            f() && j.push(f) === 1 && (p = setInterval(function () {
                for (g = 0; g < j.length; g++)j[g]() || j.splice(g--, 1);
                j.length || clearInterval(p)
            }, 13))
        }, step              : function (a) {
            var c = +new Date, b;
            b = this.options;
            var e;
            if (this.elem.stopAnimation)b = !1; else if (a || c >= b.duration + this.startTime) {
                this.now = this.end;
                this.pos = this.state = 1;
                this.update();
                a = this.options.curAnim[this.prop] = !0;
                for (e in b.curAnim)b.curAnim[e] !== !0 && (a = !1);
                a && b.complete && b.complete.call(this.elem);
                b = !1
            } else e = c - this.startTime, this.state = e / b.duration, this.pos = b.easing(e, 0, 1, b.duration), this.now = this.start + (this.end - this.start) * this.pos, this.update(), b = !0;
            return b
        }};
        this.animate = function (a, d, b) {
            var e, f = "", g, i, h;
            a.stopAnimation = !1;
            if (typeof b !== "object" || b === null)e = arguments, b = {duration: e[2], easing: e[3], complete: e[4]};
            if (typeof b.duration !== "number")b.duration = 400;
            b.easing = Math[b.easing] || Math.easeInOutSine;
            b.curAnim = Highcharts.extend({}, d);
            for (h in d)i = new m(a, b, h), g = null, h === "d" ? (i.paths = c.init(a, a.d, d.d), i.toD = d.d, e = 0, g = 1) : a.attr ? e = a.attr(h) : (e = parseFloat(this._getStyle(a, h)) || 0, h !== "opacity" && (f = "px")), g || (g = parseFloat(d[h])), i.custom(e, g, f)
        }
    }, _getStyle     : function (c, a) {
        return window.getComputedStyle(c).getPropertyValue(a)
    }, getScript     : function (c, a) {
        var d = f.getElementsByTagName("head")[0], b = f.createElement("script");
        b.type = "text/javascript";
        b.src = c;
        b.onload = a;
        d.appendChild(b)
    }, inArray       : function (c, a) {
        return a.indexOf ? a.indexOf(c) : o.indexOf.call(a,
            c)
    }, adapterRun    : function (c, a) {
        return parseInt(HighchartsAdapter._getStyle(c, a), 10)
    }, grep          : function (c, a) {
        return o.filter.call(c, a)
    }, map           : function (c, a) {
        for (var d = [], b = 0, e = c.length; b < e; b++)d[b] = a.call(c[b], c[b], b, c);
        return d
    }, offset        : function (c) {
        for (var a = 0, d = 0; c;)a += c.offsetLeft, d += c.offsetTop, c = c.offsetParent;
        return{left: a, top: d}
    }, addEvent      : function (c, a, d) {
        n(c).bind(a, d)
    }, removeEvent   : function (c, a, d) {
        n(c).unbind(a, d)
    }, fireEvent     : function (c, a, d, b) {
        var e;
        f.createEvent && (c.dispatchEvent || c.fireEvent) ? (e = f.createEvent("Events"),
            e.initEvent(a, !0, !0), e.target = c, Highcharts.extend(e, d), c.dispatchEvent ? c.dispatchEvent(e) : c.fireEvent(a, e)) : c.HCExtended === !0 && (d = d || {}, c.trigger(a, d));
        d && d.defaultPrevented && (b = null);
        b && b(d)
    }, washMouseEvent: function (c) {
        return c
    }, stop          : function (c) {
        c.stopAnimation = !0
    }, each          : function (c, a) {
        return Array.prototype.forEach.call(c, a)
    }}
}();
