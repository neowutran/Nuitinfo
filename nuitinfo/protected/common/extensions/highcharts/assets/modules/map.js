/*
 Map plugin v0.1 for Highcharts

 (c) 2011-2013 Torstein Hønsi

 License: www.highcharts.com/license
 */
(function (f) {
    var s = f.Axis, t = f.Chart, k = f.each, q = f.extend, p = f.merge, n = f.pick, u = f.numberFormat, v = f.getOptions(), w = v.plotOptions, x = f.Color, r = function () {
    };
    v.mapNavigation = {enabled: !1, buttonOptions: {align: "right", verticalAlign: "bottom", x: 0, width: 18, height: 18, style: {fontSize: "15px", fontWeight: "bold", textAlign: "center"}}, buttons: {zoomIn: {onclick: function () {
        this.mapZoom(0.5)
    }, text                                                                                                                                                                                                              : "+", y: -32}, zoomOut: {onclick: function () {
        this.mapZoom(2)
    }, text                                                                                                                                                                                                                                               : "-", y: 0}}};
    f.splitPath = function (a) {
        var b, a = a.replace(/([A-Za-z])/g,
            " $1 "), a = a.replace(/^\s*/, "").replace(/\s*$/, ""), a = a.split(/[ ,]+/);
        for (b = 0; b < a.length; b++)/[a-zA-Z]/.test(a[b]) || (a[b] = parseFloat(a[b]));
        return a
    };
    f.maps = {};
    f.wrap(s.prototype, "init", function (a, b, c) {
        b.options.chart.type === "map" && q(this, {getSeriesExtremes: function () {
            var d = this.isXAxis, a = Number.MAX_VALUE, b = Number.MIN_VALUE;
            k(this.series, function (c) {
                a = Math.min(a, c[d ? "minX" : "minY"]);
                b = Math.max(b, c[d ? "maxX" : "maxY"])
            });
            this.dataMin = a;
            this.dataMax = b
        }, setAxisTranslation                                       : function () {
            var a = this.chart, b, c =
                a.plotWidth / a.plotHeight;
            b = this.isXAxis;
            a = a.xAxis[0];
            s.prototype.setAxisTranslation.call(this);
            if (!b && a.transA !== void 0)this.transA = a.transA = Math.min(this.transA, a.transA), b = (a.max - a.min) / (this.max - this.min), b = b > c ? this : a, c = (b.max - b.min) * b.transA, b.minPixelPadding = (b.len - c) / 2
        }});
        return a.call(this, b, c)
    });
    f.wrap(t.prototype, "render", function (a) {
        a.call(this);
        this.renderMapNavigation()
    });
    q(t.prototype, {renderMapNavigation: function () {
        var a = this, b = this.options.mapNavigation, c = b.buttons, d, e, h, i = function () {
            this.handler.call(a)
        };
        if (n(b.enabled, !0))for (d in c)if (c.hasOwnProperty(d))h = p(b.buttonOptions, c[d]), e = a.renderer.button(h.text, 0, 0, i).attr({width: h.width, height: h.height}).css(h.style).add(), e.handler = h.onclick, e.align(q(h, {width: e.width, height: e.height}), null, "spacingBox")
    }, fitToBox                        : function (a, b) {
        k([
            ["x", "width"],
            ["y", "height"]
        ], function (c) {
            var d = c[0], c = c[1];
            a[d] + a[c] > b[d] + b[c] && (a[c] > b[c] ? (a[c] = b[c], a[d] = b[d]) : a[d] = b[d] + b[c] - a[c]);
            a[d] < b[d] && (a[d] = b[d])
        });
        return a
    }, mapZoom                         : function (a) {
        var b = this.xAxis[0], c = b.max - b.min,
            d = c * a, e = this.yAxis[0], h = e.max - e.min;
        a *= h;
        c = this.fitToBox({x: b.min + c / 2 - d / 2, y: e.min + h / 2 - a / 2, width: d, height: a}, {x: b.dataMin, y: e.dataMin, width: b.dataMax - b.dataMin, height: e.dataMax - e.dataMin});
        b.setExtremes(c.x, c.x + c.width, !1);
        e.setExtremes(c.y, c.y + c.height, !1);
        this.redraw()
    }});
    w.map = p(w.scatter, {animation: !1, minOpacity: 0.2, nullColor: "#F8F8F8", borderColor: "silver", borderWidth: 1, marker: null, stickyTracking: !1, dataLabels: {verticalAlign: "middle"}, tooltip: {followPointer: !0, headerFormat: '<span style="font-size:10px">{point.key}</span><br/>',
        pointFormat                                                                                                                                                                                                    : "{series.name}: {point.y}<br/>"}});
    f.seriesTypes.map = f.extendClass(f.seriesTypes.scatter, {type: "map", pointAttrToOptions: {stroke: "borderColor", "stroke-width": "borderWidth", fill: "color"}, colorKey: "y", trackerGroups: ["group", "markerGroup", "dataLabelsGroup"], getSymbol: r, getExtremesFromAll: !0, init: function (a) {
        var b = this, c = a.options.legend.valueDecimals, d = [], e, h, i, j, g, o, l;
        l = a.options.legend.layout === "horizontal";
        f.Series.prototype.init.apply(this, arguments);
        g = b.options.colorRange;
        if (b.options.valueRanges)k(b.options.valueRanges,
            function (a) {
                h = a.from;
                i = a.to;
                e = "";
                h === void 0 ? e = "< " : i === void 0 && (e = "> ");
                h !== void 0 && (e += u(h, c));
                h !== void 0 && i !== void 0 && (e += " - ");
                i !== void 0 && (e += u(i, c));
                d.push(f.extend({chart: b.chart, name: e, options: {}, drawLegendSymbol: f.seriesTypes.area.prototype.drawLegendSymbol, visible: !0, setState: function () {
                }, setVisible         : function () {
                }}, a))
            }), b.legendItems = d; else if (g)h = g.from, i = g.to, j = g.fromLabel, g = g.toLabel, o = l ? [0, 0, 1, 0] : [0, 1, 0, 0], l || (l = j, j = g, g = l), o = {linearGradient: {x1: o[0], y1: o[1], x2: o[2], y2: o[3]}, stops: [
            [0,
                h],
            [1, i]
        ]}, d = [
            {chart       : b.chart, options: {}, fromLabel: j, toLabel: g, color: o, drawLegendSymbol: this.drawLegendSymbol, visible: !0, setState: function () {
            }, setVisible: function () {
            }}
        ], b.legendItems = d
    }, drawLegendSymbol                                           : function (a, b) {
        var c = a.options.symbolPadding, d = n(a.options.padding, 8), e, h, i = this.chart.renderer.fontMetrics(a.options.itemStyle.fontSize).h, j = a.options.layout === "horizontal", g;
        g = n(a.options.rectangleLength, 200);
        j ? (e = -(c / 2), h = 0) : (e = -g + a.baseline - c / 2, h = d + i);
        b.fromText = this.chart.renderer.text(b.fromLabel,
            h, e).attr({zIndex: 2}).add(b.legendGroup);
        h = b.fromText.getBBox();
        b.legendSymbol = this.chart.renderer.rect(j ? h.x + h.width + c : h.x - i - c, h.y, j ? g : i, j ? i : g, 2).attr({zIndex: 1}).add(b.legendGroup);
        g = b.legendSymbol.getBBox();
        b.toText = this.chart.renderer.text(b.toLabel, g.x + g.width + c, j ? e : g.y + g.height - c).attr({zIndex: 2}).add(b.legendGroup);
        e = b.toText.getBBox();
        j ? (a.offsetWidth = h.width + g.width + e.width + c * 2 + d, a.itemY = i + d) : (a.offsetWidth = Math.max(h.width, e.width) + c + g.width + d, a.itemY = g.height + d, a.itemX = c)
    }, getBox                                                     : function (a) {
        var b =
            Number.MIN_VALUE, c = Number.MAX_VALUE, d = Number.MIN_VALUE, e = Number.MAX_VALUE;
        k(a || this.options.data, function (a) {
            for (var i = a.path, j = i.length, g = !1, f = Number.MIN_VALUE, l = Number.MAX_VALUE, m = Number.MIN_VALUE, k = Number.MAX_VALUE; j--;)typeof i[j] === "number" && (g ? (f = Math.max(f, i[j]), l = Math.min(l, i[j])) : (m = Math.max(m, i[j]), k = Math.min(k, i[j])), g = !g);
            a._maxX = f;
            a._minX = l;
            a._maxY = m;
            a._minY = k;
            b = Math.max(b, f);
            c = Math.min(c, l);
            d = Math.max(d, m);
            e = Math.min(e, k)
        });
        this.minY = e;
        this.maxY = d;
        this.minX = c;
        this.maxX = b
    }, translatePath                                              : function (a) {
        var b =
            !1, c = this.xAxis, d = this.yAxis, e, a = [].concat(a);
        for (e = a.length; e--;)typeof a[e] === "number" && (a[e] = b ? Math.round(c.translate(a[e])) : Math.round(d.len - d.translate(a[e])), b = !b);
        return a
    }, setData                                                    : function () {
        f.Series.prototype.setData.apply(this, arguments);
        this.getBox()
    }, translate                                                  : function () {
        var a = this, b = Number.MAX_VALUE, c = Number.MIN_VALUE;
        a.generatePoints();
        k(a.data, function (d) {
            d.shapeType = "path";
            d.shapeArgs = {d: a.translatePath(d.path)};
            if (typeof d.y === "number")if (d.y > c)c = d.y; else if (d.y < b)b = d.y
        });
        a.translateColors(b,
            c)
    }, translateColors                                            : function (a, b) {
        var c = this.options, d = c.valueRanges, e = c.colorRange, h = this.colorKey, i, f;
        e && (i = x(e.from), f = x(e.to));
        k(this.data, function (g) {
            var k = g[h], l = [], m, n;
            if (d)for (m = d.length; m--;) {
                if (l = d[m], i = l.from, f = l.to, (i === void 0 || k >= i) && (f === void 0 || k <= f)) {
                    g.options.color = l.color;
                    break
                }
            } else if (e && k !== void 0) {
                n = (b - k) / (b - a);
                for (m = 4; m--;)l[m] = Math.round(f.rgba[m] + (i.rgba[m] - f.rgba[m]) * n);
                g.options.color = k === null ? c.nullColor : "rgba(" + l.join(",") + ")"
            }
        })
    }, drawGraph                                                  : r, drawDataLabels: r, drawPoints: function () {
        var a =
            this.xAxis, b = this.yAxis, c = this.colorKey;
        k(this.data, function (a) {
            a.plotY = 1;
            if (a[c] === null)a[c] = 0, a.isNull = !0
        });
        f.seriesTypes.column.prototype.drawPoints.apply(this);
        k(this.data, function (d) {
            var e = d.dataLabels, f = a.toPixels(d._minX, !0), i = a.toPixels(d._maxX, !0), j = b.toPixels(d._minY, !0), g = b.toPixels(d._maxY, !0);
            d.plotX = Math.round(f + (i - f) * n(e && e.anchorX, 0.5));
            d.plotY = Math.round(j + (g - j) * n(e && e.anchorY, 0.5));
            d.isNull && (d[c] = null)
        });
        f.Series.prototype.drawDataLabels.call(this)
    }});
    f.Map = function (a, b) {
        var c =
        {endOnTick: !1, gridLineWidth: 0, labels: {enabled: !1}, lineWidth: 0, minPadding: 0, maxPadding: 0, startOnTick: !1, tickWidth: 0, title: null}, d;
        d = a.series;
        a.series = null;
        a = p({chart: {type: "map", panning: "xy"}, xAxis: c, yAxis: p(c, {reversed: !0})}, a, {chart: {inverted: !1}});
        a.series = d;
        return new f.Chart(a, b)
    }
})(Highcharts);
