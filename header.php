<!-- Meta Pixel + Signals Gateway Pixel Code -->
<script>
  function assign(t){for(var i=1;i<arguments.length;i++){var s=arguments[i];if(s)for(var k in s)if(Object.prototype.hasOwnProperty.call(s,k))t[k]=s[k]}return t;}
  !(function(f,b,e,v,vv,n,nn,t,s,tt,ss){
    if (!f.cbq){nn = f.cbq = function(){nn.initialized ? nn.apply(f.cbq, arguments) : nn.queue.push(arguments);};
    if(!f._cbq) f._cbq = nn;
    nn.push = nn; nn.loaded = !0; nn.version = '2.0'; nn.queue = [];
    tt = b.createElement(e); tt.async = !0; tt.src = vv; ss=b.getElementsByTagName(e)[0]; ss.parentNode.insertBefore(tt,ss);}
    if (f.xbq) return; if (f.fbq) f.xbq=f.fbq;
    n = f.fbq = function()
    { var args = Array.prototype.slice.call(arguments);
      var m = args[0]; var isT = m === 'track' || m === 'trackCustom'; var isS = m === 'trackSingle' || m === 'trackSingleCustom';
      var mId = args[isT?1:2] + "." + Date.now() + Math.random().toString(36);
      if (isT && args.length < 4)
        arguments = args.concat((args.length < 3 ? [{}, { eventID: mId }] : [{ eventID: mId }]));
      else if (isS && arguments.length < 5)
        arguments = args.concat((args.length < 4 ? [{}, { eventID: mId }] : [{ eventID: mId }]));
      if (isT && (!arguments[3] || !arguments[3].eventID)) arguments[3] = assign({}, arguments[3] || {}, { eventID: mId });
      if (isS && (!arguments[4] || !arguments[4].eventID)) arguments[4] = assign({}, arguments[4] || {}, { eventID: mId });
      n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
      if (typeof m === 'string' && m.indexOf('track') === 0) {
        if (isS) arguments[1] = f.fbq.instance.pixelsByID[arguments[1]].cId;
        if (arguments[1]) (f.cbq.initialized ? f.cbq.apply(f.cbq, arguments) : f.cbq.queue.push(arguments));}
    }
    if(!f._fbq) f._fbq = n;
    n.push = n; n.loaded = !0; n.version = '2.0'; n.queue = (f.xbq)?f.xbq.queue:[];
    t = b.createElement(e); t.async = !0; t.src = v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);
  })
  (window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js', 'https://ss.laserman.com.ar/sdk/9074497187722744317/events.js');
  fbq('init', '1274555034862276');fbq('track', 'PageView');
  cbq('setHost', 'https://ss.laserman.com.ar/');
  cbq('init', '9074497187722744317');
  fbq('set', 'cId', '9074497187722744317', '1274555034862276');
  cbq('set', 'integrationMethod', 'forkFromSnippetCode');
</script>
<!-- End Meta Pixel + Signals Gateway Code -->
