!(function (t) {
  var e = {};
  function n(r) {
    if (e[r]) return e[r].exports;
    var o = (e[r] = { i: r, l: !1, exports: {} });
    return t[r].call(o.exports, o, o.exports, n), (o.l = !0), o.exports;
  }
  (n.m = t),
    (n.c = e),
    (n.d = function (t, e, r) {
      n.o(t, e) || Object.defineProperty(t, e, { enumerable: !0, get: r });
    }),
    (n.r = function (t) {
      "undefined" != typeof Symbol &&
        Symbol.toStringTag &&
        Object.defineProperty(t, Symbol.toStringTag, { value: "Module" }),
        Object.defineProperty(t, "__esModule", { value: !0 });
    }),
    (n.t = function (t, e) {
      if ((1 & e && (t = n(t)), 8 & e)) return t;
      if (4 & e && "object" == typeof t && t && t.__esModule) return t;
      var r = Object.create(null);
      if (
        (n.r(r),
        Object.defineProperty(r, "default", { enumerable: !0, value: t }),
        2 & e && "string" != typeof t)
      )
        for (var o in t)
          n.d(
            r,
            o,
            function (e) {
              return t[e];
            }.bind(null, o)
          );
      return r;
    }),
    (n.n = function (t) {
      var e =
        t && t.__esModule
          ? function () {
              return t.default;
            }
          : function () {
              return t;
            };
      return n.d(e, "a", e), e;
    }),
    (n.o = function (t, e) {
      return Object.prototype.hasOwnProperty.call(t, e);
    }),
    (n.p = "/"),
    n((n.s = 63));
})({
  63: function (t, e, n) {
    t.exports = n(64);
  },
  64: function (t, e) {
    $(function () {
      "use strict";
      $("#wizard1").steps({
        headerTag: "h3",
        bodyTag: "section",
        autoFocus: !0,
        titleTemplate:
          '<span class="number">#index#</span> <span class="title">#title#</span>',
      }),
        $("#wizard3").steps({
          headerTag: "h3",
          bodyTag: "section",
          autoFocus: !0,
          titleTemplate:
            '<span class="number">#index#</span> <span class="title">#title#</span>',
          stepsOrientation: 1,
        });
      var t = {
        mode: "wizard",
        autoButtonsNextClass: "btn btn-primary float-right",
        autoButtonsPrevClass: "btn btn-secondary",
        stepNumberClass: "badge badge-primary mr-1",
        onSubmit: function () {
          return alert("Form submitted!"), !0;
        },
      };
      $("#form").accWizard(t);
    });
  },
});