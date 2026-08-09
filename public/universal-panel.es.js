import Le, { forwardRef as Ie, createElement as le, useState as P, useRef as Et, useEffect as Fe } from "react";
var G = { exports: {} }, W = {};
/**
 * @license React
 * react-jsx-runtime.production.min.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */
var $e;
function Rt() {
  if ($e) return W;
  $e = 1;
  var g = Le, p = Symbol.for("react.element"), s = Symbol.for("react.fragment"), v = Object.prototype.hasOwnProperty, N = g.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner, h = { key: !0, ref: !0, __self: !0, __source: !0 };
  function _(u, m, R) {
    var f, j = {}, y = null, $ = null;
    R !== void 0 && (y = "" + R), m.key !== void 0 && (y = "" + m.key), m.ref !== void 0 && ($ = m.ref);
    for (f in m) v.call(m, f) && !h.hasOwnProperty(f) && (j[f] = m[f]);
    if (u && u.defaultProps) for (f in m = u.defaultProps, m) j[f] === void 0 && (j[f] = m[f]);
    return { $$typeof: p, type: u, key: y, ref: $, props: j, _owner: N.current };
  }
  return W.Fragment = s, W.jsx = _, W.jsxs = _, W;
}
var V = {};
/**
 * @license React
 * react-jsx-runtime.development.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */
var Me;
function Ct() {
  return Me || (Me = 1, process.env.NODE_ENV !== "production" && (function() {
    var g = Le, p = Symbol.for("react.element"), s = Symbol.for("react.portal"), v = Symbol.for("react.fragment"), N = Symbol.for("react.strict_mode"), h = Symbol.for("react.profiler"), _ = Symbol.for("react.provider"), u = Symbol.for("react.context"), m = Symbol.for("react.forward_ref"), R = Symbol.for("react.suspense"), f = Symbol.for("react.suspense_list"), j = Symbol.for("react.memo"), y = Symbol.for("react.lazy"), $ = Symbol.for("react.offscreen"), S = Symbol.iterator, L = "@@iterator";
    function I(e) {
      if (e === null || typeof e != "object")
        return null;
      var a = S && e[S] || e[L];
      return typeof a == "function" ? a : null;
    }
    var T = g.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED;
    function i(e) {
      {
        for (var a = arguments.length, r = new Array(a > 1 ? a - 1 : 0), l = 1; l < a; l++)
          r[l - 1] = arguments[l];
        A("error", e, r);
      }
    }
    function A(e, a, r) {
      {
        var l = T.ReactDebugCurrentFrame, d = l.getStackAddendum();
        d !== "" && (a += "%s", r = r.concat([d]));
        var x = r.map(function(c) {
          return String(c);
        });
        x.unshift("Warning: " + a), Function.prototype.apply.call(console[e], console, x);
      }
    }
    var B = !1, He = !1, Ke = !1, Je = !1, Ge = !1, ne;
    ne = Symbol.for("react.module.reference");
    function Xe(e) {
      return !!(typeof e == "string" || typeof e == "function" || e === v || e === h || Ge || e === N || e === R || e === f || Je || e === $ || B || He || Ke || typeof e == "object" && e !== null && (e.$$typeof === y || e.$$typeof === j || e.$$typeof === _ || e.$$typeof === u || e.$$typeof === m || // This needs to include all possible module reference object
      // types supported by any Flight configuration anywhere since
      // we don't know which Flight build this will end up being used
      // with.
      e.$$typeof === ne || e.getModuleId !== void 0));
    }
    function Ze(e, a, r) {
      var l = e.displayName;
      if (l)
        return l;
      var d = a.displayName || a.name || "";
      return d !== "" ? r + "(" + d + ")" : r;
    }
    function oe(e) {
      return e.displayName || "Context";
    }
    function M(e) {
      if (e == null)
        return null;
      if (typeof e.tag == "number" && i("Received an unexpected object in getComponentNameFromType(). This is likely a bug in React. Please file an issue."), typeof e == "function")
        return e.displayName || e.name || null;
      if (typeof e == "string")
        return e;
      switch (e) {
        case v:
          return "Fragment";
        case s:
          return "Portal";
        case h:
          return "Profiler";
        case N:
          return "StrictMode";
        case R:
          return "Suspense";
        case f:
          return "SuspenseList";
      }
      if (typeof e == "object")
        switch (e.$$typeof) {
          case u:
            var a = e;
            return oe(a) + ".Consumer";
          case _:
            var r = e;
            return oe(r._context) + ".Provider";
          case m:
            return Ze(e, e.render, "ForwardRef");
          case j:
            var l = e.displayName || null;
            return l !== null ? l : M(e.type) || "Memo";
          case y: {
            var d = e, x = d._payload, c = d._init;
            try {
              return M(c(x));
            } catch {
              return null;
            }
          }
        }
      return null;
    }
    var O = Object.assign, U = 0, ie, ce, de, ue, he, xe, me;
    function fe() {
    }
    fe.__reactDisabledLog = !0;
    function Qe() {
      {
        if (U === 0) {
          ie = console.log, ce = console.info, de = console.warn, ue = console.error, he = console.group, xe = console.groupCollapsed, me = console.groupEnd;
          var e = {
            configurable: !0,
            enumerable: !0,
            value: fe,
            writable: !0
          };
          Object.defineProperties(console, {
            info: e,
            log: e,
            warn: e,
            error: e,
            group: e,
            groupCollapsed: e,
            groupEnd: e
          });
        }
        U++;
      }
    }
    function et() {
      {
        if (U--, U === 0) {
          var e = {
            configurable: !0,
            enumerable: !0,
            writable: !0
          };
          Object.defineProperties(console, {
            log: O({}, e, {
              value: ie
            }),
            info: O({}, e, {
              value: ce
            }),
            warn: O({}, e, {
              value: de
            }),
            error: O({}, e, {
              value: ue
            }),
            group: O({}, e, {
              value: he
            }),
            groupCollapsed: O({}, e, {
              value: xe
            }),
            groupEnd: O({}, e, {
              value: me
            })
          });
        }
        U < 0 && i("disabledDepth fell below zero. This is a bug in React. Please file an issue.");
      }
    }
    var X = T.ReactCurrentDispatcher, Z;
    function Y(e, a, r) {
      {
        if (Z === void 0)
          try {
            throw Error();
          } catch (d) {
            var l = d.stack.trim().match(/\n( *(at )?)/);
            Z = l && l[1] || "";
          }
        return `
` + Z + e;
      }
    }
    var Q = !1, H;
    {
      var tt = typeof WeakMap == "function" ? WeakMap : Map;
      H = new tt();
    }
    function pe(e, a) {
      if (!e || Q)
        return "";
      {
        var r = H.get(e);
        if (r !== void 0)
          return r;
      }
      var l;
      Q = !0;
      var d = Error.prepareStackTrace;
      Error.prepareStackTrace = void 0;
      var x;
      x = X.current, X.current = null, Qe();
      try {
        if (a) {
          var c = function() {
            throw Error();
          };
          if (Object.defineProperty(c.prototype, "props", {
            set: function() {
              throw Error();
            }
          }), typeof Reflect == "object" && Reflect.construct) {
            try {
              Reflect.construct(c, []);
            } catch (E) {
              l = E;
            }
            Reflect.construct(e, [], c);
          } else {
            try {
              c.call();
            } catch (E) {
              l = E;
            }
            e.call(c.prototype);
          }
        } else {
          try {
            throw Error();
          } catch (E) {
            l = E;
          }
          e();
        }
      } catch (E) {
        if (E && l && typeof E.stack == "string") {
          for (var o = E.stack.split(`
`), w = l.stack.split(`
`), b = o.length - 1, k = w.length - 1; b >= 1 && k >= 0 && o[b] !== w[k]; )
            k--;
          for (; b >= 1 && k >= 0; b--, k--)
            if (o[b] !== w[k]) {
              if (b !== 1 || k !== 1)
                do
                  if (b--, k--, k < 0 || o[b] !== w[k]) {
                    var C = `
` + o[b].replace(" at new ", " at ");
                    return e.displayName && C.includes("<anonymous>") && (C = C.replace("<anonymous>", e.displayName)), typeof e == "function" && H.set(e, C), C;
                  }
                while (b >= 1 && k >= 0);
              break;
            }
        }
      } finally {
        Q = !1, X.current = x, et(), Error.prepareStackTrace = d;
      }
      var z = e ? e.displayName || e.name : "", D = z ? Y(z) : "";
      return typeof e == "function" && H.set(e, D), D;
    }
    function at(e, a, r) {
      return pe(e, !1);
    }
    function rt(e) {
      var a = e.prototype;
      return !!(a && a.isReactComponent);
    }
    function K(e, a, r) {
      if (e == null)
        return "";
      if (typeof e == "function")
        return pe(e, rt(e));
      if (typeof e == "string")
        return Y(e);
      switch (e) {
        case R:
          return Y("Suspense");
        case f:
          return Y("SuspenseList");
      }
      if (typeof e == "object")
        switch (e.$$typeof) {
          case m:
            return at(e.render);
          case j:
            return K(e.type, a, r);
          case y: {
            var l = e, d = l._payload, x = l._init;
            try {
              return K(x(d), a, r);
            } catch {
            }
          }
        }
      return "";
    }
    var q = Object.prototype.hasOwnProperty, ve = {}, be = T.ReactDebugCurrentFrame;
    function J(e) {
      if (e) {
        var a = e._owner, r = K(e.type, e._source, a ? a.type : null);
        be.setExtraStackFrame(r);
      } else
        be.setExtraStackFrame(null);
    }
    function st(e, a, r, l, d) {
      {
        var x = Function.call.bind(q);
        for (var c in e)
          if (x(e, c)) {
            var o = void 0;
            try {
              if (typeof e[c] != "function") {
                var w = Error((l || "React class") + ": " + r + " type `" + c + "` is invalid; it must be a function, usually from the `prop-types` package, but received `" + typeof e[c] + "`.This often happens because of typos such as `PropTypes.function` instead of `PropTypes.func`.");
                throw w.name = "Invariant Violation", w;
              }
              o = e[c](a, c, l, r, null, "SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED");
            } catch (b) {
              o = b;
            }
            o && !(o instanceof Error) && (J(d), i("%s: type specification of %s `%s` is invalid; the type checker function must return `null` or an `Error` but returned a %s. You may have forgotten to pass an argument to the type checker creator (arrayOf, instanceOf, objectOf, oneOf, oneOfType, and shape all require an argument).", l || "React class", r, c, typeof o), J(null)), o instanceof Error && !(o.message in ve) && (ve[o.message] = !0, J(d), i("Failed %s type: %s", r, o.message), J(null));
          }
      }
    }
    var lt = Array.isArray;
    function ee(e) {
      return lt(e);
    }
    function nt(e) {
      {
        var a = typeof Symbol == "function" && Symbol.toStringTag, r = a && e[Symbol.toStringTag] || e.constructor.name || "Object";
        return r;
      }
    }
    function ot(e) {
      try {
        return ge(e), !1;
      } catch {
        return !0;
      }
    }
    function ge(e) {
      return "" + e;
    }
    function ye(e) {
      if (ot(e))
        return i("The provided key is an unsupported type %s. This value must be coerced to a string before before using it here.", nt(e)), ge(e);
    }
    var ke = T.ReactCurrentOwner, it = {
      key: !0,
      ref: !0,
      __self: !0,
      __source: !0
    }, je, Ne;
    function ct(e) {
      if (q.call(e, "ref")) {
        var a = Object.getOwnPropertyDescriptor(e, "ref").get;
        if (a && a.isReactWarning)
          return !1;
      }
      return e.ref !== void 0;
    }
    function dt(e) {
      if (q.call(e, "key")) {
        var a = Object.getOwnPropertyDescriptor(e, "key").get;
        if (a && a.isReactWarning)
          return !1;
      }
      return e.key !== void 0;
    }
    function ut(e, a) {
      typeof e.ref == "string" && ke.current;
    }
    function ht(e, a) {
      {
        var r = function() {
          je || (je = !0, i("%s: `key` is not a prop. Trying to access it will result in `undefined` being returned. If you need to access the same value within the child component, you should pass it as a different prop. (https://reactjs.org/link/special-props)", a));
        };
        r.isReactWarning = !0, Object.defineProperty(e, "key", {
          get: r,
          configurable: !0
        });
      }
    }
    function xt(e, a) {
      {
        var r = function() {
          Ne || (Ne = !0, i("%s: `ref` is not a prop. Trying to access it will result in `undefined` being returned. If you need to access the same value within the child component, you should pass it as a different prop. (https://reactjs.org/link/special-props)", a));
        };
        r.isReactWarning = !0, Object.defineProperty(e, "ref", {
          get: r,
          configurable: !0
        });
      }
    }
    var mt = function(e, a, r, l, d, x, c) {
      var o = {
        // This tag allows us to uniquely identify this as a React Element
        $$typeof: p,
        // Built-in properties that belong on the element
        type: e,
        key: a,
        ref: r,
        props: c,
        // Record the component responsible for creating this element.
        _owner: x
      };
      return o._store = {}, Object.defineProperty(o._store, "validated", {
        configurable: !1,
        enumerable: !1,
        writable: !0,
        value: !1
      }), Object.defineProperty(o, "_self", {
        configurable: !1,
        enumerable: !1,
        writable: !1,
        value: l
      }), Object.defineProperty(o, "_source", {
        configurable: !1,
        enumerable: !1,
        writable: !1,
        value: d
      }), Object.freeze && (Object.freeze(o.props), Object.freeze(o)), o;
    };
    function ft(e, a, r, l, d) {
      {
        var x, c = {}, o = null, w = null;
        r !== void 0 && (ye(r), o = "" + r), dt(a) && (ye(a.key), o = "" + a.key), ct(a) && (w = a.ref, ut(a, d));
        for (x in a)
          q.call(a, x) && !it.hasOwnProperty(x) && (c[x] = a[x]);
        if (e && e.defaultProps) {
          var b = e.defaultProps;
          for (x in b)
            c[x] === void 0 && (c[x] = b[x]);
        }
        if (o || w) {
          var k = typeof e == "function" ? e.displayName || e.name || "Unknown" : e;
          o && ht(c, k), w && xt(c, k);
        }
        return mt(e, o, w, d, l, ke.current, c);
      }
    }
    var te = T.ReactCurrentOwner, we = T.ReactDebugCurrentFrame;
    function F(e) {
      if (e) {
        var a = e._owner, r = K(e.type, e._source, a ? a.type : null);
        we.setExtraStackFrame(r);
      } else
        we.setExtraStackFrame(null);
    }
    var ae;
    ae = !1;
    function re(e) {
      return typeof e == "object" && e !== null && e.$$typeof === p;
    }
    function _e() {
      {
        if (te.current) {
          var e = M(te.current.type);
          if (e)
            return `

Check the render method of \`` + e + "`.";
        }
        return "";
      }
    }
    function pt(e) {
      return "";
    }
    var Ee = {};
    function vt(e) {
      {
        var a = _e();
        if (!a) {
          var r = typeof e == "string" ? e : e.displayName || e.name;
          r && (a = `

Check the top-level render call using <` + r + ">.");
        }
        return a;
      }
    }
    function Re(e, a) {
      {
        if (!e._store || e._store.validated || e.key != null)
          return;
        e._store.validated = !0;
        var r = vt(a);
        if (Ee[r])
          return;
        Ee[r] = !0;
        var l = "";
        e && e._owner && e._owner !== te.current && (l = " It was passed a child from " + M(e._owner.type) + "."), F(e), i('Each child in a list should have a unique "key" prop.%s%s See https://reactjs.org/link/warning-keys for more information.', r, l), F(null);
      }
    }
    function Ce(e, a) {
      {
        if (typeof e != "object")
          return;
        if (ee(e))
          for (var r = 0; r < e.length; r++) {
            var l = e[r];
            re(l) && Re(l, a);
          }
        else if (re(e))
          e._store && (e._store.validated = !0);
        else if (e) {
          var d = I(e);
          if (typeof d == "function" && d !== e.entries)
            for (var x = d.call(e), c; !(c = x.next()).done; )
              re(c.value) && Re(c.value, a);
        }
      }
    }
    function bt(e) {
      {
        var a = e.type;
        if (a == null || typeof a == "string")
          return;
        var r;
        if (typeof a == "function")
          r = a.propTypes;
        else if (typeof a == "object" && (a.$$typeof === m || // Note: Memo only checks outer props here.
        // Inner props are checked in the reconciler.
        a.$$typeof === j))
          r = a.propTypes;
        else
          return;
        if (r) {
          var l = M(a);
          st(r, e.props, "prop", l, e);
        } else if (a.PropTypes !== void 0 && !ae) {
          ae = !0;
          var d = M(a);
          i("Component %s declared `PropTypes` instead of `propTypes`. Did you misspell the property assignment?", d || "Unknown");
        }
        typeof a.getDefaultProps == "function" && !a.getDefaultProps.isReactClassApproved && i("getDefaultProps is only used on classic React.createClass definitions. Use a static property named `defaultProps` instead.");
      }
    }
    function gt(e) {
      {
        for (var a = Object.keys(e.props), r = 0; r < a.length; r++) {
          var l = a[r];
          if (l !== "children" && l !== "key") {
            F(e), i("Invalid prop `%s` supplied to `React.Fragment`. React.Fragment can only have `key` and `children` props.", l), F(null);
            break;
          }
        }
        e.ref !== null && (F(e), i("Invalid attribute `ref` supplied to `React.Fragment`."), F(null));
      }
    }
    var Se = {};
    function Te(e, a, r, l, d, x) {
      {
        var c = Xe(e);
        if (!c) {
          var o = "";
          (e === void 0 || typeof e == "object" && e !== null && Object.keys(e).length === 0) && (o += " You likely forgot to export your component from the file it's defined in, or you might have mixed up default and named imports.");
          var w = pt();
          w ? o += w : o += _e();
          var b;
          e === null ? b = "null" : ee(e) ? b = "array" : e !== void 0 && e.$$typeof === p ? (b = "<" + (M(e.type) || "Unknown") + " />", o = " Did you accidentally export a JSX literal instead of a component?") : b = typeof e, i("React.jsx: type is invalid -- expected a string (for built-in components) or a class/function (for composite components) but got: %s.%s", b, o);
        }
        var k = ft(e, a, r, d, x);
        if (k == null)
          return k;
        if (c) {
          var C = a.children;
          if (C !== void 0)
            if (l)
              if (ee(C)) {
                for (var z = 0; z < C.length; z++)
                  Ce(C[z], e);
                Object.freeze && Object.freeze(C);
              } else
                i("React.jsx: Static children should always be an array. You are likely explicitly calling React.jsxs or React.jsxDEV. Use the Babel transform instead.");
            else
              Ce(C, e);
        }
        if (q.call(a, "key")) {
          var D = M(e), E = Object.keys(a).filter(function(_t) {
            return _t !== "key";
          }), se = E.length > 0 ? "{key: someKey, " + E.join(": ..., ") + ": ...}" : "{key: someKey}";
          if (!Se[D + se]) {
            var wt = E.length > 0 ? "{" + E.join(": ..., ") + ": ...}" : "{}";
            i(`A props object containing a "key" prop is being spread into JSX:
  let props = %s;
  <%s {...props} />
React keys must be passed directly to JSX without using spread:
  let props = %s;
  <%s key={someKey} {...props} />`, se, D, wt, D), Se[D + se] = !0;
          }
        }
        return e === v ? gt(k) : bt(k), k;
      }
    }
    function yt(e, a, r) {
      return Te(e, a, r, !0);
    }
    function kt(e, a, r) {
      return Te(e, a, r, !1);
    }
    var jt = kt, Nt = yt;
    V.Fragment = v, V.jsx = jt, V.jsxs = Nt;
  })()), V;
}
var Pe;
function St() {
  return Pe || (Pe = 1, process.env.NODE_ENV === "production" ? G.exports = Rt() : G.exports = Ct()), G.exports;
}
var t = St();
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Tt = (g) => g.replace(/([a-z0-9])([A-Z])/g, "$1-$2").toLowerCase(), ze = (...g) => g.filter((p, s, v) => !!p && p.trim() !== "" && v.indexOf(p) === s).join(" ").trim();
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
var $t = {
  xmlns: "http://www.w3.org/2000/svg",
  width: 24,
  height: 24,
  viewBox: "0 0 24 24",
  fill: "none",
  stroke: "currentColor",
  strokeWidth: 2,
  strokeLinecap: "round",
  strokeLinejoin: "round"
};
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Mt = Ie(
  ({
    color: g = "currentColor",
    size: p = 24,
    strokeWidth: s = 2,
    absoluteStrokeWidth: v,
    className: N = "",
    children: h,
    iconNode: _,
    ...u
  }, m) => le(
    "svg",
    {
      ref: m,
      ...$t,
      width: p,
      height: p,
      stroke: g,
      strokeWidth: v ? Number(s) * 24 / Number(p) : s,
      className: ze("lucide", N),
      ...u
    },
    [
      ..._.map(([R, f]) => le(R, f)),
      ...Array.isArray(h) ? h : [h]
    ]
  )
);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const n = (g, p) => {
  const s = Ie(
    ({ className: v, ...N }, h) => le(Mt, {
      ref: h,
      iconNode: p,
      className: ze(`lucide-${Tt(g)}`, v),
      ...N
    })
  );
  return s.displayName = `${g}`, s;
};
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Pt = [
  ["path", { d: "M10.268 21a2 2 0 0 0 3.464 0", key: "vwvbt9" }],
  [
    "path",
    {
      d: "M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326",
      key: "11g9vi"
    }
  ]
], At = n("Bell", Pt);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Ot = [
  ["path", { d: "M3 3v16a2 2 0 0 0 2 2h16", key: "c24i48" }],
  ["path", { d: "M18 17V9", key: "2bz60n" }],
  ["path", { d: "M13 17V5", key: "1frdt8" }],
  ["path", { d: "M8 17v-3", key: "17ska0" }]
], Dt = n("ChartColumn", Ot);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Lt = [["path", { d: "m6 9 6 6 6-6", key: "qrunsl" }]], Ue = n("ChevronDown", Lt);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const It = [["path", { d: "m15 18-6-6 6-6", key: "1wnfg3" }]], qe = n("ChevronLeft", It);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Ft = [["path", { d: "m9 18 6-6-6-6", key: "mthhwq" }]], We = n("ChevronRight", Ft);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const zt = [["path", { d: "m18 15-6-6-6 6", key: "153udz" }]], Ut = n("ChevronUp", zt);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const qt = [
  ["path", { d: "M21.801 10A10 10 0 1 1 17 3.335", key: "yps3ct" }],
  ["path", { d: "m9 11 3 3L22 4", key: "1pflzl" }]
], Wt = n("CircleCheckBig", qt);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Vt = [
  ["line", { x1: "12", x2: "12", y1: "2", y2: "22", key: "7eqyqh" }],
  ["path", { d: "M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6", key: "1b0p4s" }]
], Bt = n("DollarSign", Vt);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Yt = [
  ["path", { d: "M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4", key: "ih7n3h" }],
  ["polyline", { points: "7 10 12 15 17 10", key: "2ggqvy" }],
  ["line", { x1: "12", x2: "12", y1: "15", y2: "3", key: "1vk2je" }]
], Ht = n("Download", Yt);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Kt = [
  [
    "path",
    {
      d: "M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0",
      key: "1nclc0"
    }
  ],
  ["circle", { cx: "12", cy: "12", r: "3", key: "1v7zrd" }]
], Jt = n("Eye", Kt);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Gt = [
  ["path", { d: "M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z", key: "1rqfz7" }],
  ["path", { d: "M14 2v4a2 2 0 0 0 2 2h4", key: "tnqrlb" }],
  ["path", { d: "M10 9H8", key: "b1mrlr" }],
  ["path", { d: "M16 13H8", key: "t4e002" }],
  ["path", { d: "M16 17H8", key: "z1uh3a" }]
], Ae = n("FileText", Gt);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Xt = [
  ["polygon", { points: "22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3", key: "1yg77f" }]
], Zt = n("Filter", Xt);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Qt = [
  ["rect", { width: "18", height: "18", x: "3", y: "3", rx: "2", ry: "2", key: "1m3agn" }],
  ["circle", { cx: "9", cy: "9", r: "2", key: "af1f0g" }],
  ["path", { d: "m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21", key: "1xmnt7" }]
], ea = n("Image", Qt);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const ta = [
  ["circle", { cx: "12", cy: "12", r: "10", key: "1mglay" }],
  ["path", { d: "M12 16v-4", key: "1dtifu" }],
  ["path", { d: "M12 8h.01", key: "e9boi3" }]
], aa = n("Info", ta);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const ra = [
  [
    "path",
    {
      d: "M12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83z",
      key: "zw3jo"
    }
  ],
  [
    "path",
    {
      d: "M2 12a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 12",
      key: "1wduqc"
    }
  ],
  [
    "path",
    {
      d: "M2 17a1 1 0 0 0 .58.91l8.6 3.91a2 2 0 0 0 1.65 0l8.58-3.9A1 1 0 0 0 22 17",
      key: "kqbvx6"
    }
  ]
], sa = n("Layers", ra);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const la = [
  ["rect", { width: "7", height: "9", x: "3", y: "3", rx: "1", key: "10lvy0" }],
  ["rect", { width: "7", height: "5", x: "14", y: "3", rx: "1", key: "16une8" }],
  ["rect", { width: "7", height: "9", x: "14", y: "12", rx: "1", key: "1hutg5" }],
  ["rect", { width: "7", height: "5", x: "3", y: "16", rx: "1", key: "ldoo1y" }]
], na = n("LayoutDashboard", la);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const oa = [
  ["path", { d: "M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4", key: "1uf3rs" }],
  ["polyline", { points: "16 17 21 12 16 7", key: "1gabdz" }],
  ["line", { x1: "21", x2: "9", y1: "12", y2: "12", key: "1uyos4" }]
], ia = n("LogOut", oa);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const ca = [
  ["line", { x1: "4", x2: "20", y1: "12", y2: "12", key: "1e0a9i" }],
  ["line", { x1: "4", x2: "20", y1: "6", y2: "6", key: "1owob3" }],
  ["line", { x1: "4", x2: "20", y1: "18", y2: "18", key: "yk5zj1" }]
], da = n("Menu", ca);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const ua = [
  ["path", { d: "M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z", key: "1lielz" }]
], ha = n("MessageSquare", ua);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const xa = [
  ["path", { d: "M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z", key: "a7tn18" }]
], ma = n("Moon", xa);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const fa = [
  ["circle", { cx: "13.5", cy: "6.5", r: ".5", fill: "currentColor", key: "1okk4w" }],
  ["circle", { cx: "17.5", cy: "10.5", r: ".5", fill: "currentColor", key: "f64h9f" }],
  ["circle", { cx: "8.5", cy: "7.5", r: ".5", fill: "currentColor", key: "fotxhn" }],
  ["circle", { cx: "6.5", cy: "12.5", r: ".5", fill: "currentColor", key: "qy21gx" }],
  [
    "path",
    {
      d: "M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z",
      key: "12rzf8"
    }
  ]
], pa = n("Palette", fa);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const va = [
  ["path", { d: "M5 12h14", key: "1ays0h" }],
  ["path", { d: "M12 5v14", key: "s699le" }]
], ba = n("Plus", va);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const ga = [
  [
    "path",
    {
      d: "M15.39 4.39a1 1 0 0 0 1.68-.474 2.5 2.5 0 1 1 3.014 3.015 1 1 0 0 0-.474 1.68l1.683 1.682a2.414 2.414 0 0 1 0 3.414L19.61 15.39a1 1 0 0 1-1.68-.474 2.5 2.5 0 1 0-3.014 3.015 1 1 0 0 1 .474 1.68l-1.683 1.682a2.414 2.414 0 0 1-3.414 0L8.61 19.61a1 1 0 0 0-1.68.474 2.5 2.5 0 1 1-3.014-3.015 1 1 0 0 0 .474-1.68l-1.683-1.682a2.414 2.414 0 0 1 0-3.414L4.39 8.61a1 1 0 0 1 1.68.474 2.5 2.5 0 1 0 3.014-3.015 1 1 0 0 1-.474-1.68l1.683-1.682a2.414 2.414 0 0 1 3.414 0z",
      key: "w46dr5"
    }
  ]
], ya = n("Puzzle", ga);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const ka = [
  ["path", { d: "M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8", key: "v9h5vc" }],
  ["path", { d: "M21 3v5h-5", key: "1q7to0" }],
  ["path", { d: "M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16", key: "3uifl3" }],
  ["path", { d: "M8 16H3v5", key: "1cv678" }]
], ja = n("RefreshCw", ka);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Na = [
  ["circle", { cx: "11", cy: "11", r: "8", key: "4ej97u" }],
  ["path", { d: "m21 21-4.3-4.3", key: "1qie3q" }]
], wa = n("Search", Na);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const _a = [
  [
    "path",
    {
      d: "M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z",
      key: "1qme2f"
    }
  ],
  ["circle", { cx: "12", cy: "12", r: "3", key: "1v7zrd" }]
], Ve = n("Settings", _a);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Ea = [
  [
    "path",
    {
      d: "M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z",
      key: "oel41y"
    }
  ],
  ["path", { d: "M12 8v4", key: "1got3b" }],
  ["path", { d: "M12 16h.01", key: "1drbdi" }]
], Ra = n("ShieldAlert", Ea);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Ca = [
  [
    "path",
    {
      d: "M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z",
      key: "oel41y"
    }
  ],
  ["path", { d: "m9 12 2 2 4-4", key: "dzmm74" }]
], Be = n("ShieldCheck", Ca);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Sa = [
  ["path", { d: "M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z", key: "hou9p0" }],
  ["path", { d: "M3 6h18", key: "d0wm0j" }],
  ["path", { d: "M16 10a4 4 0 0 1-8 0", key: "1ltviw" }]
], Ta = n("ShoppingBag", Sa);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const $a = [
  ["path", { d: "M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7", key: "1m0v6g" }],
  [
    "path",
    {
      d: "M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z",
      key: "ohrbg2"
    }
  ]
], Ma = n("SquarePen", $a);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Pa = [
  ["circle", { cx: "12", cy: "12", r: "4", key: "4exip2" }],
  ["path", { d: "M12 2v2", key: "tus03m" }],
  ["path", { d: "M12 20v2", key: "1lh1kg" }],
  ["path", { d: "m4.93 4.93 1.41 1.41", key: "149t6j" }],
  ["path", { d: "m17.66 17.66 1.41 1.41", key: "ptbguv" }],
  ["path", { d: "M2 12h2", key: "1t8f8n" }],
  ["path", { d: "M20 12h2", key: "1q8mjw" }],
  ["path", { d: "m6.34 17.66-1.41 1.41", key: "1m8zz5" }],
  ["path", { d: "m19.07 4.93-1.41 1.41", key: "1shlcs" }]
], Aa = n("Sun", Pa);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Oa = [
  ["path", { d: "M3 6h18", key: "d0wm0j" }],
  ["path", { d: "M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6", key: "4alrt4" }],
  ["path", { d: "M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2", key: "v07s0e" }],
  ["line", { x1: "10", x2: "10", y1: "11", y2: "17", key: "1uufr5" }],
  ["line", { x1: "14", x2: "14", y1: "11", y2: "17", key: "xtxkd" }]
], Da = n("Trash2", Oa);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const La = [
  ["polyline", { points: "22 17 13.5 8.5 8.5 13.5 2 7", key: "1r2t7k" }],
  ["polyline", { points: "16 17 22 17 22 11", key: "11uiuu" }]
], Ia = n("TrendingDown", La);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Fa = [
  ["polyline", { points: "22 7 13.5 15.5 8.5 10.5 2 17", key: "126l90" }],
  ["polyline", { points: "16 7 22 7 22 13", key: "kwv8wd" }]
], Oe = n("TrendingUp", Fa);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const za = [
  [
    "path",
    {
      d: "m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3",
      key: "wmoenq"
    }
  ],
  ["path", { d: "M12 9v4", key: "juzpu7" }],
  ["path", { d: "M12 17h.01", key: "p32p05" }]
], Ua = n("TriangleAlert", za);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const qa = [
  ["path", { d: "M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2", key: "975kel" }],
  ["circle", { cx: "12", cy: "7", r: "4", key: "17ys0d" }]
], De = n("User", qa);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Wa = [
  ["path", { d: "M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2", key: "1yyitq" }],
  ["circle", { cx: "9", cy: "7", r: "4", key: "nufk8" }],
  ["path", { d: "M22 21v-2a4 4 0 0 0-3-3.87", key: "kshegd" }],
  ["path", { d: "M16 3.13a4 4 0 0 1 0 7.75", key: "1da9ce" }]
], Ye = n("Users", Wa);
/**
 * @license lucide-react v0.475.0 - ISC
 *
 * This source code is licensed under the ISC license.
 * See the LICENSE file in the root directory of this source tree.
 */
const Va = [
  [
    "path",
    {
      d: "M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z",
      key: "cbrjhi"
    }
  ]
], Ba = n("Wrench", Va), Ya = (g) => {
  switch (g) {
    case "dashboard":
      return /* @__PURE__ */ t.jsx(na, { className: "w-4 h-4" });
    case "analytics":
      return /* @__PURE__ */ t.jsx(Dt, { className: "w-4 h-4" });
    case "posts":
      return /* @__PURE__ */ t.jsx(Ae, { className: "w-4 h-4" });
    case "media":
      return /* @__PURE__ */ t.jsx(ea, { className: "w-4 h-4" });
    case "pages":
      return /* @__PURE__ */ t.jsx(sa, { className: "w-4 h-4" });
    case "comments":
      return /* @__PURE__ */ t.jsx(ha, { className: "w-4 h-4" });
    case "users":
      return /* @__PURE__ */ t.jsx(Ye, { className: "w-4 h-4" });
    case "roles":
      return /* @__PURE__ */ t.jsx(Be, { className: "w-4 h-4" });
    case "appearance":
      return /* @__PURE__ */ t.jsx(pa, { className: "w-4 h-4" });
    case "plugins":
      return /* @__PURE__ */ t.jsx(ya, { className: "w-4 h-4" });
    case "security":
      return /* @__PURE__ */ t.jsx(Ra, { className: "w-4 h-4" });
    case "tools":
      return /* @__PURE__ */ t.jsx(Ba, { className: "w-4 h-4" });
    case "settings":
      return /* @__PURE__ */ t.jsx(Ve, { className: "w-4 h-4" });
    default:
      return /* @__PURE__ */ t.jsx(Ae, { className: "w-4 h-4" });
  }
}, Ha = ({
  menuGroups: g = [
    {
      groupLabel: "MAIN",
      items: [
        { id: "dashboard", label: "Dashboard", url: "/admin", active: !0 },
        { id: "analytics", label: "Analytics", url: "/admin/analytics" }
      ]
    },
    {
      groupLabel: "CONTENT",
      items: [
        {
          id: "posts",
          label: "Posts",
          url: "/admin/posts",
          children: [
            { label: "All Posts", url: "/admin/posts" },
            { label: "Add New", url: "/admin/posts/create" },
            { label: "Categories", url: "/admin/posts/categories" },
            { label: "Tags", url: "/admin/posts/tags" }
          ]
        },
        {
          id: "pages",
          label: "Pages",
          url: "/admin/pages",
          children: [
            { label: "All Pages", url: "/admin/pages" },
            { label: "Add New Page", url: "/admin/pages/create" },
            { label: "Page Templates", url: "/admin/pages/templates" }
          ]
        },
        {
          id: "media",
          label: "Media",
          url: "/admin/media",
          children: [
            { label: "Media Library", url: "/admin/media" },
            { label: "Add New File", url: "/admin/media/upload" }
          ]
        },
        { id: "comments", label: "Comments", url: "/admin/comments" }
      ]
    },
    {
      groupLabel: "USER MANAGEMENT",
      items: [
        {
          id: "users",
          label: "Users",
          url: "/admin/users",
          children: [
            { label: "All Users", url: "/admin/users" },
            { label: "Add New User", url: "/admin/users/create" },
            { label: "My Profile", url: "/admin/profile" }
          ]
        },
        {
          id: "roles",
          label: "Roles & Perms",
          url: "/admin/roles",
          children: [
            { label: "All Roles", url: "/admin/roles" },
            { label: "Permissions Matrix", url: "/admin/roles/permissions" }
          ]
        }
      ]
    },
    {
      groupLabel: "SYSTEM",
      items: [
        {
          id: "appearance",
          label: "Appearance",
          url: "/admin/appearance",
          children: [
            { label: "Themes", url: "/admin/appearance/themes" },
            { label: "Theme Customize", url: "/admin/appearance/customize" },
            { label: "Widgets", url: "/admin/appearance/widgets" },
            { label: "Menus", url: "/admin/appearance/menus" }
          ]
        },
        { id: "plugins", label: "Plugins", url: "/admin/plugins" },
        {
          id: "security",
          label: "Sentinel WAF",
          url: "/admin/security",
          children: [
            { label: "Threat Logs", url: "/admin/security/logs" },
            { label: "Blocked IPs", url: "/admin/security/blacklist" },
            { label: "Scanner Settings", url: "/admin/security/config" }
          ]
        },
        {
          id: "settings",
          label: "Settings",
          url: "/admin/settings",
          children: [
            { label: "General", url: "/admin/settings/general" },
            { label: "Writing & Reading", url: "/admin/settings/reading" },
            { label: "API Keys", url: "/admin/settings/api" }
          ]
        }
      ]
    }
  ],
  collapsed: p,
  onToggleCollapse: s
}) => {
  const [v, N] = P(!1), h = p !== void 0 ? p : v, _ = () => {
    s ? s() : N(!v);
  }, [u, m] = P({
    posts: !0,
    users: !1,
    appearance: !1,
    security: !1,
    settings: !1
  }), R = (f) => {
    h || m((j) => ({ ...j, [f]: !j[f] }));
  };
  return /* @__PURE__ */ t.jsxs(
    "aside",
    {
      className: `bg-[#1d2327] dark:bg-[#1d2327] light:bg-white text-slate-300 dark:text-slate-300 light:text-slate-700 flex flex-col transition-all duration-200 select-none ${h ? "w-[52px]" : "w-[160px]"} border-r border-[#2c3338] dark:border-[#2c3338] light:border-slate-200 h-[calc(100vh-2.75rem)] sticky top-11 text-xs shrink-0`,
      children: [
        /* @__PURE__ */ t.jsx("nav", { className: "flex-1 py-1 space-y-2 overflow-y-auto no-scrollbar", children: g.map((f, j) => /* @__PURE__ */ t.jsxs("div", { className: "space-y-0.5", children: [
          f.groupLabel && /* @__PURE__ */ t.jsx("div", { className: "px-3 pt-2 pb-1", children: h ? /* @__PURE__ */ t.jsx("div", { className: "border-t border-[#2c3338] dark:border-[#2c3338] light:border-slate-200 my-1" }) : /* @__PURE__ */ t.jsx("span", { className: "text-[9px] font-extrabold uppercase tracking-wider text-slate-500 dark:text-slate-500 light:text-slate-400 block truncate", children: f.groupLabel }) }),
          f.items.map((y) => {
            var I;
            const $ = y.active, S = y.children && y.children.length > 0, L = u[y.id];
            return /* @__PURE__ */ t.jsxs("div", { className: "relative group", children: [
              /* @__PURE__ */ t.jsxs(
                "div",
                {
                  onClick: () => S && R(y.id),
                  title: h ? y.label : void 0,
                  className: `flex items-center ${h ? "justify-center px-0 py-2.5" : "justify-between px-3 py-1.5"} cursor-pointer transition-colors ${$ ? `bg-[#2271b1] text-white font-semibold relative ${h ? "after:absolute after:right-0 after:top-1/2 after:-translate-y-1/2 after:border-y-4 after:border-y-transparent after:border-r-4 after:border-r-slate-50 dark:after:border-r-slate-950" : "after:absolute after:right-0 after:top-1/2 after:-translate-y-1/2 after:border-y-8 after:border-y-transparent after:border-r-8 after:border-r-slate-50 dark:after:border-r-slate-950"}` : "hover:bg-[#2c3338] dark:hover:bg-[#2c3338] light:hover:bg-slate-100 hover:text-sky-400 text-slate-300 dark:text-slate-300 light:text-slate-700"}`,
                  children: [
                    /* @__PURE__ */ t.jsxs("div", { className: `flex items-center ${h ? "justify-center w-full" : "gap-2 truncate"}`, children: [
                      /* @__PURE__ */ t.jsx("span", { className: "shrink-0 group-hover:text-sky-400", children: Ya(y.id) }),
                      !h && /* @__PURE__ */ t.jsx("span", { className: "truncate", children: y.label })
                    ] }),
                    !h && S && /* @__PURE__ */ t.jsx("span", { className: "text-slate-400 shrink-0 ml-1", children: L ? /* @__PURE__ */ t.jsx(Ut, { className: "w-3 h-3" }) : /* @__PURE__ */ t.jsx(Ue, { className: "w-3 h-3" }) })
                  ]
                }
              ),
              !h && S && L && /* @__PURE__ */ t.jsx("div", { className: "bg-[#101517] dark:bg-[#101517] light:bg-slate-50 py-1", children: (I = y.children) == null ? void 0 : I.map((T, i) => /* @__PURE__ */ t.jsx(
                "a",
                {
                  href: T.url,
                  className: "block pl-9 pr-3 py-1 text-[11px] text-slate-400 hover:text-sky-400 transition-colors",
                  children: T.label
                },
                i
              )) })
            ] }, y.id);
          })
        ] }, j)) }),
        /* @__PURE__ */ t.jsx(
          "button",
          {
            onClick: _,
            className: `h-10 border-t border-[#2c3338] dark:border-[#2c3338] light:border-slate-200 flex items-center ${h ? "justify-center px-0" : "px-3 gap-2"} hover:bg-[#2c3338] dark:hover:bg-[#2c3338] light:hover:bg-slate-100 text-slate-400 hover:text-white dark:hover:text-white light:hover:text-slate-900 text-xs transition-colors`,
            children: h ? /* @__PURE__ */ t.jsx(We, { className: "w-4 h-4" }) : /* @__PURE__ */ t.jsxs(t.Fragment, { children: [
              /* @__PURE__ */ t.jsx(qe, { className: "w-4 h-4 shrink-0" }),
              /* @__PURE__ */ t.jsx("span", { className: "truncate", children: "Collapse menu" })
            ] })
          }
        )
      ]
    }
  );
}, Ka = ({
  panelName: g = "Universal Panel",
  userName: p = "Ilham Hatta",
  userRole: s = "Super Admin",
  onToggleSidebar: v,
  isDarkTheme: N,
  onToggleTheme: h
}) => {
  const _ = Et(null), [u, m] = P(!0), R = N !== void 0 ? N : u, [f, j] = P(!1), [y, $] = P(!1), [S, L] = P([
    { id: 1, title: "Sentinel WAF Alert", desc: "1 SQLi attack blocked from 192.168.1.5", time: "5m ago", type: "warning" },
    { id: 2, title: "New User Registered", desc: "User Sarah Johnson created an account", time: "1h ago", type: "info" },
    { id: 3, title: "System Backup Complete", desc: "Database backup stored successfully", time: "2h ago", type: "success" }
  ]);
  Fe(() => {
    const i = (A) => {
      var B;
      (A.metaKey || A.ctrlKey) && (A.key === "k" || A.key === "K") && (A.preventDefault(), (B = _.current) == null || B.focus());
    };
    return window.addEventListener("keydown", i), () => window.removeEventListener("keydown", i);
  }, []);
  const I = () => {
    if (h)
      h();
    else {
      const i = !u;
      m(i), i ? (document.documentElement.classList.add("dark"), localStorage.setItem("universal_panel_theme", "dark")) : (document.documentElement.classList.remove("dark"), localStorage.setItem("universal_panel_theme", "light"));
    }
  }, T = () => {
    L([]);
  };
  return /* @__PURE__ */ t.jsxs("header", { className: "h-11 bg-white dark:bg-[#1d2327] border-b border-slate-200 dark:border-[#2c3338] text-slate-800 dark:text-slate-200 px-4 flex items-center justify-between text-xs select-none relative z-30 transition-colors", children: [
    /* @__PURE__ */ t.jsxs("div", { className: "flex items-center gap-4 shrink-0 min-w-max", children: [
      /* @__PURE__ */ t.jsx("a", { href: "/admin", className: "font-bold text-slate-800 dark:text-slate-100 text-sm tracking-tight hover:text-sky-500 whitespace-nowrap", children: g }),
      /* @__PURE__ */ t.jsx(
        "button",
        {
          onClick: v,
          className: "p-1 rounded text-slate-400 hover:text-slate-800 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-[#2c3338] transition-colors focus:outline-none",
          title: "Toggle Sidebar",
          children: /* @__PURE__ */ t.jsx(da, { className: "w-4 h-4" })
        }
      )
    ] }),
    /* @__PURE__ */ t.jsx("div", { className: "flex-1 flex justify-center max-w-md mx-4", children: /* @__PURE__ */ t.jsxs("div", { className: "relative flex items-center w-full max-w-sm", children: [
      /* @__PURE__ */ t.jsx(wa, { className: "w-3.5 h-3.5 text-slate-400 absolute left-2.5" }),
      /* @__PURE__ */ t.jsx(
        "input",
        {
          ref: _,
          type: "text",
          placeholder: "Search resources (Cmd+K)...",
          className: "bg-slate-100 dark:bg-[#101517] text-slate-800 dark:text-slate-200 text-xs pl-8 pr-3 py-1 rounded border border-slate-300 dark:border-[#2c3338] focus:outline-none focus:border-sky-500 w-full transition-all"
        }
      )
    ] }) }),
    /* @__PURE__ */ t.jsxs("div", { className: "flex items-center gap-3 shrink-0", children: [
      /* @__PURE__ */ t.jsxs("div", { className: "relative", children: [
        /* @__PURE__ */ t.jsxs(
          "button",
          {
            onClick: () => {
              $((i) => !i), j(!1);
            },
            className: "p-1.5 rounded text-slate-400 hover:text-slate-800 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-[#2c3338] transition-colors relative focus:outline-none",
            title: "Notifications",
            children: [
              /* @__PURE__ */ t.jsx(At, { className: "w-4 h-4" }),
              S.length > 0 && /* @__PURE__ */ t.jsx("span", { className: "absolute top-1 right-1 w-2 h-2 bg-sky-500 rounded-full ring-2 ring-white dark:ring-[#1d2327]" })
            ]
          }
        ),
        y && /* @__PURE__ */ t.jsxs("div", { className: "absolute right-0 mt-2 w-72 bg-white dark:bg-[#1d2327] border border-slate-200 dark:border-[#2c3338] rounded-md shadow-xl py-1 z-50 text-xs text-slate-800 dark:text-slate-200 divide-y divide-slate-100 dark:divide-[#2c3338]", children: [
          /* @__PURE__ */ t.jsxs("div", { className: "px-3 py-2 flex items-center justify-between", children: [
            /* @__PURE__ */ t.jsx("span", { className: "font-semibold text-slate-800 dark:text-slate-100", children: "Notifications" }),
            S.length > 0 && /* @__PURE__ */ t.jsx("button", { onClick: T, className: "text-[10px] text-sky-500 hover:underline", children: "Mark all read" })
          ] }),
          /* @__PURE__ */ t.jsx("div", { className: "max-h-64 overflow-y-auto divide-y divide-slate-100 dark:divide-[#2c3338]", children: S.length === 0 ? /* @__PURE__ */ t.jsx("div", { className: "p-4 text-center text-slate-400 text-xs", children: "No unread notifications" }) : S.map((i) => /* @__PURE__ */ t.jsxs("div", { className: "p-2.5 hover:bg-slate-50 dark:hover:bg-[#2c3338] transition-colors flex gap-2.5", children: [
            i.type === "warning" && /* @__PURE__ */ t.jsx(Ua, { className: "w-4 h-4 text-amber-500 shrink-0 mt-0.5" }),
            i.type === "info" && /* @__PURE__ */ t.jsx(aa, { className: "w-4 h-4 text-sky-500 shrink-0 mt-0.5" }),
            i.type === "success" && /* @__PURE__ */ t.jsx(Wt, { className: "w-4 h-4 text-emerald-500 shrink-0 mt-0.5" }),
            /* @__PURE__ */ t.jsxs("div", { className: "flex-1 min-w-0", children: [
              /* @__PURE__ */ t.jsx("p", { className: "font-semibold text-slate-800 dark:text-slate-100 truncate", children: i.title }),
              /* @__PURE__ */ t.jsx("p", { className: "text-[11px] text-slate-500 dark:text-slate-400 leading-tight mt-0.5", children: i.desc }),
              /* @__PURE__ */ t.jsx("p", { className: "text-[9px] text-slate-400 mt-1", children: i.time })
            ] })
          ] }, i.id)) })
        ] })
      ] }),
      /* @__PURE__ */ t.jsx(
        "button",
        {
          onClick: I,
          className: "p-1.5 rounded text-slate-400 hover:text-slate-800 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-[#2c3338] transition-colors focus:outline-none cursor-pointer",
          title: R ? "Switch to Light Mode" : "Switch to Dark Mode",
          children: R ? /* @__PURE__ */ t.jsx(Aa, { className: "w-4 h-4 text-amber-400" }) : /* @__PURE__ */ t.jsx(ma, { className: "w-4 h-4 text-indigo-400" })
        }
      ),
      /* @__PURE__ */ t.jsx("div", { className: "h-4 w-px bg-slate-200 dark:bg-[#2c3338] mx-1" }),
      /* @__PURE__ */ t.jsxs("div", { className: "relative", children: [
        /* @__PURE__ */ t.jsxs(
          "button",
          {
            onClick: () => {
              j((i) => !i), $(!1);
            },
            className: "flex items-center gap-2 px-2 py-1 rounded hover:bg-slate-100 dark:hover:bg-[#2c3338] transition-colors focus:outline-none text-left",
            children: [
              /* @__PURE__ */ t.jsx("div", { className: "w-7 h-7 rounded-full bg-sky-600 text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm", children: /* @__PURE__ */ t.jsx(De, { className: "w-4 h-4" }) }),
              /* @__PURE__ */ t.jsxs("div", { className: "flex flex-col leading-tight", children: [
                /* @__PURE__ */ t.jsx("span", { className: "text-slate-800 dark:text-slate-100 font-semibold text-xs truncate max-w-[120px]", children: p }),
                /* @__PURE__ */ t.jsx("span", { className: "text-[10px] text-slate-500 dark:text-slate-400 font-normal truncate max-w-[120px]", children: s })
              ] }),
              /* @__PURE__ */ t.jsx(Ue, { className: "w-3.5 h-3.5 text-slate-400 ml-0.5 shrink-0" })
            ]
          }
        ),
        f && /* @__PURE__ */ t.jsxs("div", { className: "absolute right-0 mt-2 w-48 bg-white dark:bg-[#1d2327] border border-slate-200 dark:border-[#2c3338] rounded-md shadow-xl py-1 z-50 text-xs text-slate-800 dark:text-slate-200 divide-y divide-slate-100 dark:divide-[#2c3338]", children: [
          /* @__PURE__ */ t.jsxs("div", { className: "px-3 py-2", children: [
            /* @__PURE__ */ t.jsx("p", { className: "font-semibold text-slate-800 dark:text-slate-100", children: p }),
            /* @__PURE__ */ t.jsx("p", { className: "text-[10px] text-slate-500 dark:text-slate-400", children: s })
          ] }),
          /* @__PURE__ */ t.jsxs("div", { className: "py-1", children: [
            /* @__PURE__ */ t.jsxs("a", { href: "/admin/profile", className: "flex items-center gap-2 px-3 py-1.5 hover:bg-slate-50 dark:hover:bg-[#2c3338] hover:text-sky-500", children: [
              /* @__PURE__ */ t.jsx(De, { className: "w-3.5 h-3.5" }),
              " My Profile"
            ] }),
            /* @__PURE__ */ t.jsxs("a", { href: "/admin/settings", className: "flex items-center gap-2 px-3 py-1.5 hover:bg-slate-50 dark:hover:bg-[#2c3338] hover:text-sky-500", children: [
              /* @__PURE__ */ t.jsx(Ve, { className: "w-3.5 h-3.5" }),
              " Settings"
            ] })
          ] }),
          /* @__PURE__ */ t.jsx("div", { className: "py-1", children: /* @__PURE__ */ t.jsxs("button", { className: "w-full text-left flex items-center gap-2 px-3 py-1.5 text-rose-500 hover:bg-slate-50 dark:hover:bg-[#2c3338]", children: [
            /* @__PURE__ */ t.jsx(ia, { className: "w-3.5 h-3.5" }),
            " Sign Out"
          ] }) })
        ] })
      ] })
    ] })
  ] });
}, Ga = () => {
  const [g, p] = P(!1), [s, v] = P(!0);
  Fe(() => {
    localStorage.getItem("universal_panel_theme") === "light" ? (v(!1), document.documentElement.classList.remove("dark")) : (v(!0), document.documentElement.classList.add("dark"));
  }, []);
  const N = () => {
    p((u) => !u);
  }, h = () => {
    v((u) => {
      const m = !u;
      return m ? (document.documentElement.classList.add("dark"), localStorage.setItem("universal_panel_theme", "dark")) : (document.documentElement.classList.remove("dark"), localStorage.setItem("universal_panel_theme", "light")), m;
    });
  }, _ = [
    { id: 1, name: "Alex Morgan", email: "alex.m@example.com", role: "Super Admin", status: "Active", registered: "2026-08-01" },
    { id: 2, name: "Sarah Connor", email: "sarah.c@example.com", role: "Editor", status: "Active", registered: "2026-08-03" },
    { id: 3, name: "David Miller", email: "david.m@example.com", role: "Author", status: "Pending", registered: "2026-08-05" },
    { id: 4, name: "Emily Watson", email: "emily.w@example.com", role: "Subscriber", status: "Active", registered: "2026-08-07" },
    { id: 5, name: "Robert Chen", email: "robert.c@example.com", role: "Contributor", status: "Blocked", registered: "2026-08-08" }
  ];
  return /* @__PURE__ */ t.jsxs("div", { className: `min-h-screen ${s ? "bg-slate-950 text-slate-100" : "bg-slate-100 text-slate-900"} flex flex-col font-sans transition-colors duration-200`, children: [
    /* @__PURE__ */ t.jsx(Ka, { onToggleSidebar: N, isDarkTheme: s, onToggleTheme: h }),
    /* @__PURE__ */ t.jsxs("div", { className: "flex flex-1", children: [
      /* @__PURE__ */ t.jsx(Ha, { collapsed: g, onToggleCollapse: N }),
      /* @__PURE__ */ t.jsxs("main", { className: `flex-1 p-6 space-y-6 max-w-full overflow-x-auto ${s ? "bg-slate-950" : "bg-slate-50"}`, children: [
        /* @__PURE__ */ t.jsxs("header", { className: "flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-800 pb-4", children: [
          /* @__PURE__ */ t.jsxs("div", { children: [
            /* @__PURE__ */ t.jsxs("div", { className: "flex items-center gap-2 text-xs text-slate-400 mb-1", children: [
              /* @__PURE__ */ t.jsx("span", { children: "Admin" }),
              /* @__PURE__ */ t.jsx("span", { children: "/" }),
              /* @__PURE__ */ t.jsx("span", { className: "text-sky-400 font-medium", children: "Dashboard Overview" })
            ] }),
            /* @__PURE__ */ t.jsx("h1", { className: `text-2xl font-bold ${s ? "text-slate-100" : "text-slate-900"}`, children: "Dashboard Overview" })
          ] }),
          /* @__PURE__ */ t.jsxs("div", { className: "flex items-center gap-2", children: [
            /* @__PURE__ */ t.jsxs("button", { className: `px-3 py-1.5 rounded-md border text-xs font-medium flex items-center gap-1.5 transition-colors ${s ? "bg-slate-900 border-slate-800 text-slate-300 hover:bg-slate-800" : "bg-white border-slate-300 text-slate-700 hover:bg-slate-100"}`, children: [
              /* @__PURE__ */ t.jsx(ja, { className: "w-3.5 h-3.5 text-slate-400" }),
              "Refresh Data"
            ] }),
            /* @__PURE__ */ t.jsxs("button", { className: "px-3.5 py-1.5 rounded-md bg-[#2271b1] hover:bg-sky-600 text-white text-xs font-semibold flex items-center gap-1.5 transition-colors shadow-sm", children: [
              /* @__PURE__ */ t.jsx(ba, { className: "w-3.5 h-3.5" }),
              "New Resource"
            ] })
          ] })
        ] }),
        /* @__PURE__ */ t.jsxs("div", { className: "grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4", children: [
          /* @__PURE__ */ t.jsxs("div", { className: `${s ? "bg-slate-900 border-slate-800" : "bg-white border-slate-200 shadow-sm"} border rounded-xl p-5 relative overflow-hidden`, children: [
            /* @__PURE__ */ t.jsxs("div", { className: "flex items-center justify-between", children: [
              /* @__PURE__ */ t.jsx("span", { className: `text-xs font-medium ${s ? "text-slate-400" : "text-slate-500"}`, children: "Total Revenue" }),
              /* @__PURE__ */ t.jsx("div", { className: "w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-500 flex items-center justify-center", children: /* @__PURE__ */ t.jsx(Bt, { className: "w-4 h-4" }) })
            ] }),
            /* @__PURE__ */ t.jsx("div", { className: `text-2xl font-bold ${s ? "text-slate-100" : "text-slate-900"} mt-2`, children: "$128,450.00" }),
            /* @__PURE__ */ t.jsxs("div", { className: "flex items-center gap-1.5 mt-2 text-xs font-medium text-emerald-400", children: [
              /* @__PURE__ */ t.jsx(Oe, { className: "w-3.5 h-3.5" }),
              /* @__PURE__ */ t.jsx("span", { children: "+14.2%" }),
              /* @__PURE__ */ t.jsx("span", { className: `text-[11px] ${s ? "text-slate-500" : "text-slate-400"} font-normal ml-1`, children: "vs last month" })
            ] })
          ] }),
          /* @__PURE__ */ t.jsxs("div", { className: `${s ? "bg-slate-900 border-slate-800" : "bg-white border-slate-200 shadow-sm"} border rounded-xl p-5 relative overflow-hidden`, children: [
            /* @__PURE__ */ t.jsxs("div", { className: "flex items-center justify-between", children: [
              /* @__PURE__ */ t.jsx("span", { className: `text-xs font-medium ${s ? "text-slate-400" : "text-slate-500"}`, children: "Active Users" }),
              /* @__PURE__ */ t.jsx("div", { className: "w-8 h-8 rounded-lg bg-sky-500/10 text-sky-500 flex items-center justify-center", children: /* @__PURE__ */ t.jsx(Ye, { className: "w-4 h-4" }) })
            ] }),
            /* @__PURE__ */ t.jsx("div", { className: `text-2xl font-bold ${s ? "text-slate-100" : "text-slate-900"} mt-2`, children: "2,845" }),
            /* @__PURE__ */ t.jsxs("div", { className: "flex items-center gap-1.5 mt-2 text-xs font-medium text-sky-400", children: [
              /* @__PURE__ */ t.jsx(Oe, { className: "w-3.5 h-3.5" }),
              /* @__PURE__ */ t.jsx("span", { children: "+8.1%" }),
              /* @__PURE__ */ t.jsx("span", { className: `text-[11px] ${s ? "text-slate-500" : "text-slate-400"} font-normal ml-1`, children: "vs last week" })
            ] })
          ] }),
          /* @__PURE__ */ t.jsxs("div", { className: `${s ? "bg-slate-900 border-slate-800" : "bg-white border-slate-200 shadow-sm"} border rounded-xl p-5 relative overflow-hidden`, children: [
            /* @__PURE__ */ t.jsxs("div", { className: "flex items-center justify-between", children: [
              /* @__PURE__ */ t.jsx("span", { className: `text-xs font-medium ${s ? "text-slate-400" : "text-slate-500"}`, children: "Sentinel Threats Blocked" }),
              /* @__PURE__ */ t.jsx("div", { className: "w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-400 flex items-center justify-center", children: /* @__PURE__ */ t.jsx(Be, { className: "w-4 h-4" }) })
            ] }),
            /* @__PURE__ */ t.jsx("div", { className: `text-2xl font-bold ${s ? "text-slate-100" : "text-slate-900"} mt-2`, children: "142 Attacks" }),
            /* @__PURE__ */ t.jsxs("div", { className: "flex items-center gap-1.5 mt-2 text-xs font-medium text-emerald-400", children: [
              /* @__PURE__ */ t.jsx(Ia, { className: "w-3.5 h-3.5" }),
              /* @__PURE__ */ t.jsx("span", { children: "-24.5%" }),
              /* @__PURE__ */ t.jsx("span", { className: `text-[11px] ${s ? "text-slate-500" : "text-slate-400"} font-normal ml-1`, children: "threat reduction" })
            ] })
          ] }),
          /* @__PURE__ */ t.jsxs("div", { className: `${s ? "bg-slate-900 border-slate-800" : "bg-white border-slate-200 shadow-sm"} border rounded-xl p-5 relative overflow-hidden`, children: [
            /* @__PURE__ */ t.jsxs("div", { className: "flex items-center justify-between", children: [
              /* @__PURE__ */ t.jsx("span", { className: `text-xs font-medium ${s ? "text-slate-400" : "text-slate-500"}`, children: "Pending Requests" }),
              /* @__PURE__ */ t.jsx("div", { className: "w-8 h-8 rounded-lg bg-amber-500/10 text-amber-400 flex items-center justify-center", children: /* @__PURE__ */ t.jsx(Ta, { className: "w-4 h-4" }) })
            ] }),
            /* @__PURE__ */ t.jsx("div", { className: `text-2xl font-bold ${s ? "text-slate-100" : "text-slate-900"} mt-2`, children: "18 Orders" }),
            /* @__PURE__ */ t.jsx("div", { className: "flex items-center gap-1.5 mt-2 text-xs font-medium text-amber-400", children: /* @__PURE__ */ t.jsx("span", { children: "Action Required" }) })
          ] })
        ] }),
        /* @__PURE__ */ t.jsxs("div", { className: `${s ? "bg-slate-900 border-slate-800" : "bg-white border-slate-200 shadow-sm"} border rounded-xl overflow-hidden`, children: [
          /* @__PURE__ */ t.jsxs("div", { className: "p-4 border-b border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-3", children: [
            /* @__PURE__ */ t.jsxs("div", { children: [
              /* @__PURE__ */ t.jsx("h2", { className: `text-base font-bold ${s ? "text-slate-100" : "text-slate-900"}`, children: "User Management Resource" }),
              /* @__PURE__ */ t.jsx("p", { className: `text-xs ${s ? "text-slate-400" : "text-slate-500"}`, children: "Registered accounts and access permission levels" })
            ] }),
            /* @__PURE__ */ t.jsxs("div", { className: "flex items-center gap-2", children: [
              /* @__PURE__ */ t.jsxs("button", { className: `px-3 py-1.5 rounded-md border text-xs font-medium flex items-center gap-1.5 ${s ? "bg-slate-950 border-slate-800 text-slate-300 hover:bg-slate-800" : "bg-slate-50 border-slate-300 text-slate-700"}`, children: [
                /* @__PURE__ */ t.jsx(Zt, { className: "w-3.5 h-3.5" }),
                " Filter"
              ] }),
              /* @__PURE__ */ t.jsxs("button", { className: `px-3 py-1.5 rounded-md border text-xs font-medium flex items-center gap-1.5 ${s ? "bg-slate-950 border-slate-800 text-slate-300 hover:bg-slate-800" : "bg-slate-50 border-slate-300 text-slate-700"}`, children: [
                /* @__PURE__ */ t.jsx(Ht, { className: "w-3.5 h-3.5" }),
                " Export"
              ] })
            ] })
          ] }),
          /* @__PURE__ */ t.jsx("div", { className: "overflow-x-auto", children: /* @__PURE__ */ t.jsxs("table", { className: "w-full text-left text-xs", children: [
            /* @__PURE__ */ t.jsx("thead", { className: `${s ? "bg-slate-950 text-slate-400 border-slate-800" : "bg-slate-100 text-slate-600 border-slate-200"} border-b uppercase font-semibold text-[10px] tracking-wider`, children: /* @__PURE__ */ t.jsxs("tr", { children: [
              /* @__PURE__ */ t.jsx("th", { className: "py-3 px-4", children: "User" }),
              /* @__PURE__ */ t.jsx("th", { className: "py-3 px-4", children: "Role" }),
              /* @__PURE__ */ t.jsx("th", { className: "py-3 px-4", children: "Status" }),
              /* @__PURE__ */ t.jsx("th", { className: "py-3 px-4", children: "Registered Date" }),
              /* @__PURE__ */ t.jsx("th", { className: "py-3 px-4 text-right", children: "Actions" })
            ] }) }),
            /* @__PURE__ */ t.jsx("tbody", { className: `divide-y ${s ? "divide-slate-800/60 text-slate-200" : "divide-slate-200 text-slate-700"}`, children: _.map((u) => /* @__PURE__ */ t.jsxs("tr", { className: `${s ? "hover:bg-slate-800/40" : "hover:bg-slate-50"} transition-colors`, children: [
              /* @__PURE__ */ t.jsx("td", { className: "py-3 px-4 font-medium", children: /* @__PURE__ */ t.jsxs("div", { className: "flex items-center gap-3", children: [
                /* @__PURE__ */ t.jsx("div", { className: "w-7 h-7 rounded-full bg-sky-600/20 text-sky-400 flex items-center justify-center font-bold text-xs shrink-0", children: u.name.charAt(0) }),
                /* @__PURE__ */ t.jsxs("div", { children: [
                  /* @__PURE__ */ t.jsx("div", { className: `font-semibold ${s ? "text-slate-100" : "text-slate-900"}`, children: u.name }),
                  /* @__PURE__ */ t.jsx("div", { className: "text-[11px] text-slate-400 font-normal", children: u.email })
                ] })
              ] }) }),
              /* @__PURE__ */ t.jsx("td", { className: "py-3 px-4 font-medium text-slate-300", children: u.role }),
              /* @__PURE__ */ t.jsxs("td", { className: "py-3 px-4", children: [
                u.status === "Active" && /* @__PURE__ */ t.jsx("span", { className: "px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20", children: "Active" }),
                u.status === "Pending" && /* @__PURE__ */ t.jsx("span", { className: "px-2 py-0.5 rounded-full text-[10px] font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20", children: "Pending" }),
                u.status === "Blocked" && /* @__PURE__ */ t.jsx("span", { className: "px-2 py-0.5 rounded-full text-[10px] font-semibold bg-rose-500/10 text-rose-400 border border-rose-500/20", children: "Blocked" })
              ] }),
              /* @__PURE__ */ t.jsx("td", { className: "py-3 px-4 text-slate-400", children: u.registered }),
              /* @__PURE__ */ t.jsx("td", { className: "py-3 px-4 text-right", children: /* @__PURE__ */ t.jsxs("div", { className: "flex items-center justify-end gap-1.5", children: [
                /* @__PURE__ */ t.jsx("button", { className: "p-1 rounded text-slate-400 hover:text-sky-400 hover:bg-slate-800 transition-colors", title: "View", children: /* @__PURE__ */ t.jsx(Jt, { className: "w-3.5 h-3.5" }) }),
                /* @__PURE__ */ t.jsx("button", { className: "p-1 rounded text-slate-400 hover:text-amber-400 hover:bg-slate-800 transition-colors", title: "Edit", children: /* @__PURE__ */ t.jsx(Ma, { className: "w-3.5 h-3.5" }) }),
                /* @__PURE__ */ t.jsx("button", { className: "p-1 rounded text-slate-400 hover:text-rose-400 hover:bg-slate-800 transition-colors", title: "Delete", children: /* @__PURE__ */ t.jsx(Da, { className: "w-3.5 h-3.5" }) })
              ] }) })
            ] }, u.id)) })
          ] }) }),
          /* @__PURE__ */ t.jsxs("div", { className: `p-4 border-t ${s ? "border-slate-800 text-slate-400" : "border-slate-200 text-slate-500"} flex items-center justify-between text-xs`, children: [
            /* @__PURE__ */ t.jsxs("span", { children: [
              "Showing ",
              /* @__PURE__ */ t.jsx("strong", { className: "font-semibold text-slate-200", children: "1" }),
              " to ",
              /* @__PURE__ */ t.jsx("strong", { className: "font-semibold text-slate-200", children: "5" }),
              " of ",
              /* @__PURE__ */ t.jsx("strong", { className: "font-semibold text-slate-200", children: "128" }),
              " results"
            ] }),
            /* @__PURE__ */ t.jsxs("div", { className: "flex items-center gap-1", children: [
              /* @__PURE__ */ t.jsx("button", { className: `p-1.5 rounded border ${s ? "border-slate-800 hover:bg-slate-800" : "border-slate-300 hover:bg-slate-100"} disabled:opacity-50`, children: /* @__PURE__ */ t.jsx(qe, { className: "w-3.5 h-3.5" }) }),
              /* @__PURE__ */ t.jsx("button", { className: `p-1.5 rounded border ${s ? "border-slate-800 hover:bg-slate-800" : "border-slate-300 hover:bg-slate-100"}`, children: /* @__PURE__ */ t.jsx(We, { className: "w-3.5 h-3.5" }) })
            ] })
          ] })
        ] })
      ] })
    ] })
  ] });
};
export {
  Ga as Dashboard,
  Ka as TopAdminBar,
  Ha as WordPressSidebar
};
