/* keen-slider 5.0.5 https://cdn.jsdelivr.net/npm/keen-slider@latest/keen-slider.js */
!function (t, n) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = n() : "function" == typeof define && define.amd ? define(n) : (t = t || self).KeenSlider = n()
}(this, (function () {
    "use strict";
    function t(t, n, e) {
        return n in t ? Object.defineProperty(t, n, {
            value: e,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : t[n] = e,
        t
    }
    function n(t, n) {
        var e = Object.keys(t);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(t);
            n && (r = r.filter((function (n) {
                return Object.getOwnPropertyDescriptor(t, n).enumerable
            }))),
            e.push.apply(e, r)
        }
        return e
    }
    function e(e) {
        for (var r = 1; r < arguments.length; r++) {
            var i = null != arguments[r] ? arguments[r] : {};
            r % 2 ? n(Object(i), !0).forEach((function (n) {
                t(e, n, i[n])
            })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(i)) : n(Object(i)).forEach((function (t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(i, t))
            }))
        }
        return e
    }
    function r(t) {
        return function (t) {
            if (Array.isArray(t)) 
                return i(t)
            
        }(t) || function (t) {
            if ("undefined" != typeof Symbol && Symbol.iterator in Object(t)) 
                return Array.from(t)
            
        }(t) || function (t, n) {
            if (! t) 
                return;
            
            if ("string" == typeof t) 
                return i(t, n);
            
            var e = Object.prototype.toString.call(t).slice(8, -1);
            "Object" === e && t.constructor && (e = t.constructor.name);
            if ("Map" === e || "Set" === e) 
                return Array.from(e);
            
            if ("Arguments" === e || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(e)) 
                return i(t, n)
            
        }(t) || function () {
            throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }
    function i(t, n) {
        (null == n || n > t.length) && (n = t.length);
        for (var e = 0, r = new Array(n); e < n; e++) 
            r[e] = t[e];
        
        return r
    }
    function o(t) {
        return Array.prototype.slice.call(t)
    }
    function a(t) {
        var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : document;
        return "function" == typeof t ? o(t()) : "string" == typeof t ? o(n.querySelectorAll(t)) : t instanceof HTMLElement != !1 ? [t] : t instanceof NodeList != !1 ? t : []
    }
    function u(t, n, e) {
        return Math.min(Math.max(t, n), e)
    }
    return Math.sign || (Math.sign = function (t) {
        return(t > 0) - (t < 0) ||+ t
    }),
    function (t) {
        var n,
            i,
            o,
            c,
            f,
            s,
            l,
            d,
            h,
            v,
            p,
            m,
            b,
            g,
            y,
            w,
            M,
            O,
            S,
            j,
            A,
            x,
            k,
            E,
            P,
            T,
            D,
            C,
            L,
            X,
            Y,
            z,
            H = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
            I = "data-keen-slider-moves",
            q = "data-keen-slider-v",
            F = [],
            V = null,
            W = !1,
            _ = !1,
            K = 0,
            N = [];
        function R(t, n, e) {
            var r = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : {};
            t.addEventListener(n, e, r),
            F.push([t, n, e, r])
        }
        function U(t) {
            if (O && S === J(t) && ut()) {
                var e = Z(t).x;
                if (!nt(t) && E) 
                    return B(t);
                
                E && (Ft(), j = e, n.setAttribute(I, !0), E =! 1),
                t.cancelable && t.preventDefault(),
                Ct(k(j - e, Rt), t.timeStamp),
                j = e
            }
        }
        function $(t) {
            O || ! ut() || tt(t.target) || (O =! 0, E =! 0, S = J(t), nt(t), dt(), M = v, j = Z(t).x, Ct(0, t.timeStamp), ot("dragStart"))
        }
        function B(t) {
            O && S === J(t, !0) && ut() && (n.removeAttribute(I), O =! 1, pt(), ot("dragEnd"))
        }
        function G(t) {
            return t.changedTouches
        }
        function J(t) {
            var n = arguments.length > 1 && void 0 !== arguments[1] && arguments[1],
                e = n ? G(t) : Q(t);
            return e ? e[0] ? e[0].identifier : "error" : "default"
        }
        function Q(t) {
            return t.targetTouches
        }
        function Z(t) {
            var n = Q(t);
            return {
                x: st() ? n ? n[0].screenY : t.pageY : n ? n[0].screenX : t.pageX,
                timestamp: t.timeStamp
            }
        }
        function tt(t) {
            return t.hasAttribute(w.preventEvent)
        }
        function nt(t) {
            var n = Q(t);
            if (! n) 
                return !0;
            
            var e = n[0],
                r = st() ? e.clientY : e.clientX,
                i = st() ? e.clientX : e.clientY,
                o = void 0 !== A && void 0 !== x && Math.abs(x - i) <= Math.abs(A - r);
            return A = r,
            x = i,
            o
        }
        function et(t) {
            ut() && O && t.preventDefault()
        }
        function rt() {
            R(window, "orientationchange", kt),
            R(window, "resize", (function () {
                return xt()
            })),
            R(n, "dragstart", (function (t) {
                ut() && t.preventDefault()
            })),
            R(n, "mousedown", $),
            R(n, "mousemove", U),
            R(n, "mouseleave", B),
            R(n, "mouseup", B),
            R(n, "touchstart", $),
            R(n, "touchmove", U),
            R(n, "touchend", B),
            R(n, "touchcancel", B),
            R(window, "wheel", et, {
                passive: !1
            })
        }
        function it() {
            F.forEach((function (t) {
                t[0].removeEventListener(t[1], t[2], t[3])
            })),
            F = []
        }
        function ot(t) {
            w[t] && w[t](Rt)
        }
        function at() {
            return w.centered
        }
        function ut() {
            return void 0 !== i ? i : w.controls
        }
        function ct() {
            return w.loop
        }
        function ft() {
            return ! w.loop && w.rubberband
        }
        function st() {
            return !! w.vertical
        }
        function lt() {
            P = window.requestAnimationFrame(ht)
        }
        function dt() {
            P && (window.cancelAnimationFrame(P), P = null),
            T = null
        }
        function ht(t) {
            T || (T = t);
            var n = t - T,
                e = vt(n);
            if (n >= C) 
                return Ct(D - X, !1),
                z ? z() : void ot("afterChange");
            
            var r = Lt(e);
            if (0 === r || ct() || ft() || Y) {
                if (0 !== r && ft() && ! Y) 
                    return wt();
                
                X += e,
                Ct(e, !1),
                lt()
            } else 
                Ct(e - r, !1)
            
        }
        function vt(t) {
            return D * L(t / C) - X
        }
        function pt() {
            switch (ot("beforeChange"), w.mode) {
                case "free": gt();
                    break;
                case "free-snap": yt();
                    break;
                case "snap":
                default: mt()
            }
        }
        function mt() {
            bt((1 === l && 0 !== p ? M : v) + Math.sign(p))
        }
        function bt(t, n) {
            var e = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : w.duration,
                r = arguments.length > 3 && void 0 !== arguments[3] && arguments[3],
                i = arguments.length > 4 && void 0 !== arguments[4] && arguments[4],
                o = function (t) {
                    return 1 + -- t * t * t * t * t
                };
            Mt(Ht(t = zt(t, r, i)), e, o, n)
        }
        function gt() {
            if (0 === b) 
                return !(!Lt(0) || ct()) && bt(v);
            
            var t = w.friction / Math.pow(Math.abs(b), -.5);
            Mt(Math.pow(b, 2) / t * Math.sign(b), 6 * Math.abs(b / t), (function (t) {
                return 1 - Math.pow(1 - t, 5)
            }))
        }
        function yt() {
            if (0 === b) 
                return bt(v);
            
            var t = w.friction / Math.pow(Math.abs(b), -.5),
                n = Math.pow(b, 2) / t * Math.sign(b),
                e = 6 * Math.abs(b / t),
                r = (K + n) / (s / l);
            Mt((-1 === p ? Math.floor(r) : Math.ceil(r)) * (s / l) - K, e, (function (t) {
                return 1 - Math.pow(1 - t, 5)
            }))
        }
        function wt() {
            if (dt(), 0 === b) 
                return bt(v, !0);
            
            var t = .04 / Math.pow(Math.abs(b), -.5),
                n = Math.pow(b, 2) / t * Math.sign(b),
                e = function (t) {
                    return -- t * t * t + 1
                },
                r = b;
            Mt(n, 3 * Math.abs(r / t), e, !0, (function () {
                Mt(Ht(zt(v)), 500, e, !0)
            }))
        }
        function Mt(t, n, e, r, i) {
            dt(),
            D = t,
            X = 0,
            C = n,
            L = e,
            Y = r,
            z = i,
            T = null,
            lt()
        }
        function Ot(e) {
            var r = a(t);
            r.length && (n = r[0], xt(e), rt(), ot("mounted"))
        }
        function St() {
            var t,
                n = H.breakpoints || [];
            for (var r in n) 
                window.matchMedia(r).matches && (t = r);
            
            if (t === V) 
                return !0;
            
            var i = (V = t) ? n[V] : H;
            i.breakpoints && V && delete i.breakpoints,
            w = e({}, Nt, {}, H, {}, i),
            W = !0,
            h = null,
            At()
        }
        function jt() {
            St(),
            _ = !0,
            ot("created")
        }
        function At(t, n) {
            t && (H = t),
            n && (V = null),
            Et(),
            Ot(n)
        }
        function xt(t) {
            var e = window.innerWidth;
            if (St() && (e !== h || t)) {
                h = e;
                var r = w.slides;
                "number" == typeof r ? (f = null, o = r) : (f = a(r, n), o = f ? f.length : 0);
                var i = w.dragSpeed;
                k = "function" == typeof i ? i : function (t) {
                    return t * i
                },
                s = st() ? n.offsetHeight : n.offsetWidth,
                l = u(w.slidesPerView, 1, Math.max(ct() ? o - 1 : o, 1)),
                d = u(w.spacing, 0, s / (l - 1) - 1),
                s += d,
                c = at() ? (s / 2 - s / l / 2) / s : 0,
                Tt();
                var p = ! _ || W && w.resetSlide ? w.initial : v;
                Kt(ct() ? p : Xt(p)),
                st() && n.setAttribute(q, !0),
                W = !1
            }
        }
        function kt(t) {
            xt(),
            setTimeout(xt, 500),
            setTimeout(xt, 2e3)
        }
        function Et() {
            it(),
            Dt(),
            n && n.hasAttribute(q) && n.removeAttribute(q),
            ot("destroyed")
        }
        function Pt() {
            f && f.forEach((function (t, n) {
                var e = g[n].distance * s - n * (s / l - d / l - d / l * (l - 1)),
                    r = st() ? 0 : e,
                    i = st() ? e : 0,
                    o = "translate3d(".concat(r, "px, ").concat(i, "px, 0)");
                t.style.transform = o,
                t.style["-webkit-transform"] = o
            }))
        }
        function Tt() {
            f && f.forEach((function (t) {
                var n = "calc(".concat(100 / l, "% - ").concat(d / l * (l - 1), "px)");
                st() ? (t.style["min-height"] = n, t.style["max-height"] = n) : (t.style["min-width"] = n, t.style["max-width"] = n)
            }))
        }
        function Dt() {
            if (f) {
                var t = ["transform", "-webkit-transform"];
                t = [].concat(r(t), st ? ["min-height", "max-height"] : ["min-width", "max-width"]),
                f.forEach((function (n) {
                    t.forEach((function (t) {
                        n.style.removeProperty(t)
                    }))
                }))
            }
        }
        function Ct(t) {
            var n = !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1],
                e = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : Date.now();
            qt(t, e),
            n && (t = Wt(t)),
            K += t,
            Vt()
        }
        function Lt(t) {
            var n = s * (o - 1 * (at() ? 1 : l)) / l,
                e = K + t;
            return e > n ? e - n : e < 0 ? e : 0
        }
        function Xt(t) {
            return u(t, 0, o - 1 - (at() ? 0 : l - 1))
        }
        function Yt() {
            var t = Math.abs(y),
                n = K < 0 ? 1 - t : t;
            return {
                direction: p,
                progressTrack: n,
                progressSlides: n * o / (o - 1),
                positions: g,
                position: K,
                speed: b,
                relativeSlide: (v % o + o) % o,
                absoluteSlide: v,
                size: o,
                widthOrHeight: s
            }
        }
        function zt(t) {
            var n = arguments.length > 1 && void 0 !== arguments[1] && arguments[1],
                e = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
            return ct() ? n ? It(t, e) : t : Xt(t)
        }
        function Ht(t) {
            return -(- s / l * t + K)
        }
        function It(t, n) {
            var e = (v % o + o) % o,
                r = e < (t =( t % o + o) % o) ? - e - o + t : -(e - t),
                i = e > t ? o - e + t : t - e,
                a = n ? Math.abs(r) <= i ? r : i : t < e ? r : i;
            return v + a
        }
        function qt(t, n) {
            clearTimeout(m);
            var e = Math.sign(t);
            if (e !== p && Ft(), p = e, N.push({distance: t, time: n}), m = setTimeout((function () {
                N = [],
                b = 0
            }), 50), (N = N.slice(-6)).length <= 1 || 0 === p) 
                return b = 0;
            
            var r = N.slice(0, -1).reduce((function (t, n) {
                    return t + n.distance
                }), 0),
                i = N[N.length - 1].time,
                o = N[0].time;
            b = u(r / (i - o), -10, 10)
        }
        function Ft() {
            N = []
        }
        function Vt() {
            y = ct() ? K % (s * o / l) / (s * o / l) : K / (s * o / l),
            _t();
            for (var t =[], n = 0; n < o; n++) {
                var e = (1 / o * n - (y < 0 && ct() ? y + 1 : y)) * o / l + c;
                ct() && (e += e > (o - 1) / l ? - o / l : e < - o / l + 1 ? o / l : 0);
                var r = 1 / l,
                    i = e + r,
                    a = i < r ? i / r : i > 1 ? 1 - (i - 1) * l / 1 : 1;
                t.push({
                    portion: a < 0 || a > 1 ? 0 : a,
                    distance: e
                })
            }
            g = t,
            Pt(),
            ot("move")
        }
        function Wt(t) {
            if (ct()) 
                return t;
            
            var n = Lt(t);
            if (! ft()) 
                return t - n;
            
            if (0 === n) 
                return t;
            
            var e;
            return t * (e = n / s, (1 - Math.abs(e)) * (1 - Math.abs(e)))
        }
        function _t() {
            var t = Math.round(K / (s / l));
            t !== v && (v = t, ot("slideChanged"))
        }
        function Kt(t) {
            ot("beforeChange"),
            Ct(Ht(t), !1),
            ot("afterChange")
        }
        var Nt = {
                centered: !1,
                breakpoints: null,
                controls: !0,
                dragSpeed: 1,
                friction: .0025,
                loop: !1,
                initial: 0,
                duration: 500,
                preventEvent: "data-keen-slider-pe",
                slides: ".keen-slider__slide",
                vertical: !1,
                resetSlide: !1,
                slidesPerView: 1,
                spacing: 0,
                mode: "snap",
                rubberband: !0
            },
            Rt = {
                controls: function (t) {
                    i = t
                },
                destroy: Et,
                refresh: function (t) {
                    At(t, !0)
                },
                next: function () {
                    bt(v + 1, !0)
                },
                prev: function () {
                    bt(v - 1, !0)
                },
                moveToSlide: function (t, n) {
                    bt(t, !0, n)
                },
                moveToSlideRelative: function (t) {
                    var n = arguments.length > 1 && void 0 !== arguments[1] && arguments[1],
                        e = arguments.length > 2 ? arguments[2] : void 0;
                    bt(t, !0, e, !0, n)
                },
                resize: function () {
                    xt(!0)
                },
                details: function () {
                    return Yt()
                }
            };
        return jt(),
        Rt
    }
}));
