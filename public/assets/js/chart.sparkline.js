!(function (e) {
  var r = {};
  function t(i) {
    if (r[i]) return r[i].exports;
    var l = (r[i] = { i: i, l: !1, exports: {} });
    return e[i].call(l.exports, l, l.exports, t), (l.l = !0), l.exports;
  }
  (t.m = e),
    (t.c = r),
    (t.d = function (e, r, i) {
      t.o(e, r) || Object.defineProperty(e, r, { enumerable: !0, get: i });
    }),
    (t.r = function (e) {
      "undefined" != typeof Symbol &&
        Symbol.toStringTag &&
        Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }),
        Object.defineProperty(e, "__esModule", { value: !0 });
    }),
    (t.t = function (e, r) {
      if ((1 & r && (e = t(e)), 8 & r)) return e;
      if (4 & r && "object" == typeof e && e && e.__esModule) return e;
      var i = Object.create(null);
      if (
        (t.r(i),
        Object.defineProperty(i, "default", { enumerable: !0, value: e }),
        2 & r && "string" != typeof e)
      )
        for (var l in e)
          t.d(
            i,
            l,
            function (r) {
              return e[r];
            }.bind(null, l)
          );
      return i;
    }),
    (t.n = function (e) {
      var r =
        e && e.__esModule
          ? function () {
              return e.default;
            }
          : function () {
              return e;
            };
      return t.d(r, "a", r), r;
    }),
    (t.o = function (e, r) {
      return Object.prototype.hasOwnProperty.call(e, r);
    }),
    (t.p = "/"),
    t((t.s = 26));
})({
  26: function (e, r, t) {
    e.exports = t(27);
  },
  27: function (e, r) {
    $(function () {
      "use strict";
      $("#sparkline1").sparkline("html", {
        width: 100,
        height: 50,
        lineColor: "#6259ca ",
        fillColor: !1,
        tooltipContainer: $(".main-content"),
      }),
        $("#sparkline2").sparkline("html", {
          width: 100,
          height: 50,
          lineColor: "#f3ca56",
          fillColor: !1,
        }),
        $("#sparkline19").sparkline("html", {
          width: 100,
          height: 50,
          lineColor: "#f26eaf ",
          fillColor: !1,
          tooltipContainer: $(".main-content"),
        }),
        $("#sparkline20").sparkline("html", {
          width: 100,
          height: 50,
          lineColor: "#70e8a5",
          fillColor: !1,
        }),
        $("#sparkline3").sparkline("html", {
          width: 120,
          height: 50,
          lineColor: "#6259ca",
          fillColor: "rgba(113, 76, 190,0.2)",
        }),
        $("#sparkline4").sparkline("html", {
          width: 120,
          height: 50,
          lineColor: "#53caed",
          fillColor: "rgba(235, 111, 51,0.2)",
        }),
        $("#sparkline5").sparkline("html", {
          type: "bar",
          barWidth: 10,
          height: 50,
          barColor: "#6259ca",
          chartRangeMax: 12,
        }),
        $("#sparkline6").sparkline("html", {
          type: "bar",
          barWidth: 10,
          height: 50,
          barColor: "#53caed",
          chartRangeMax: 12,
        }),
        $("#sparkline7").sparkline("html", {
          type: "bar",
          barWidth: 10,
          height: 50,
          barColor: "#6259ca",
          chartRangeMax: 12,
        }),
        $("#sparkline7").sparkline(
          [4, 5, 6, 7, 4, 5, 8, 7, 6, 6, 4, 7, 6, 4, 7],
          {
            composite: !0,
            type: "bar",
            barWidth: 10,
            height: 50,
            barColor: "#53caed",
            chartRangeMax: 12,
          }
        ),
        $("#sparkline8").sparkline("html", {
          type: "bar",
          barWidth: 10,
          height: 50,
          barColor: "#01b8ff",
          chartRangeMax: 12,
        }),
        $("#sparkline8").sparkline(
          [4, 5, 6, 7, 4, 5, 8, 7, 6, 6, 4, 7, 6, 4, 7],
          {
            composite: !0,
            type: "bar",
            barWidth: 10,
            height: 50,
            barColor: "#f16d75",
            chartRangeMax: 12,
          }
        ),
        $("#sparkline9").sparkline("html", {
          type: "pie",
          width: 70,
          height: 50,
          sliceColors: ["#6259ca", "#53caed", "#01b8ff"],
        }),
        $("#sparkline10").sparkline("html", {
          type: "pie",
          width: 70,
          height: 50,
          sliceColors: [
            "#6259ca",
            "#53caed",
            "#01b8ff",
            "#f16d75",
            "#29ccbb",
            "#f3ca56",
          ],
        });
    });
  },
});
