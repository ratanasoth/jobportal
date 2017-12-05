/*! tether.js 0.1.3 */
(function(){var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r=[].slice,s=function(a,b){return function(){return a.apply(b,arguments)}};a=jQuery,l=/msie [\w.]+/.test(navigator.userAgent.toLowerCase()),k=function(b){var c,d;return c=b.css("position"),"fixed"===c?b:(d=void 0,d="absolute"===c||l&&("static"===c||"relative"===c)?b.parents().filter(function(){var b;return("relative"===(b=a.css(this,"position"))||"absolute"===b||"fixed"===b)&&/(auto|scroll)/.test(a.css(this,"overflow")+a.css(this,"overflow-y")+a.css(this,"overflow-x"))}).first():b.parents().filter(function(){return/(auto|scroll)/.test(a.css(this,"overflow")+a.css(this,"overflow-y")+a.css(this,"overflow-x"))}).first(),d.length?d:a("html"))},b=16,j=function(a,c){var d;return null==c&&(c=b),d=!1,function(){var b,e=this;if(!d)return b=arguments,d=!0,setTimeout(function(){return d=!1,a.apply(e,b)},c),!0}},q=[],p=function(){var a,b,c;for(b=0,c=q.length;c>b;b++)a=q[b],a.position();return!0},l&&(p=j(p)),a(window).on("resize scroll",p),c={center:"center",left:"right",right:"left"},d={middle:"middle",top:"bottom",bottom:"top"},e={top:"0",left:"0",middle:"50%",center:"50%",bottom:"100%",right:"100%"},i=function(a,b){var e,f;return e=a.left,f=a.top,"auto"===e&&(e=c[b.left]),"auto"===f&&(f=d[b.top]),{left:e,top:f}},h=function(a){var b,c;return{left:null!=(b=e[a.left])?b:a.left,top:null!=(c=e[a.top])?c:a.top}},g=function(){var a,b,c,d,e,f,g;for(b=1<=arguments.length?r.call(arguments,0):[],c={top:0,left:0},e=0,f=b.length;f>e;e++)g=b[e],d=g.top,a=g.left,"string"==typeof d&&(d=parseFloat(d,10)),"string"==typeof a&&(a=parseFloat(a,10)),c.top+=d,c.left+=a;return c},m=function(b,c){return"string"==typeof b.left&&-1!==b.left.indexOf("%")&&(b.left=parseFloat(b.left,10)/100*a(c).outerWidth()),"string"==typeof b.top&&-1!==b.top.indexOf("%")&&(b.top=parseFloat(b.top,10)/100*a(c).outerHeight()),b},n=o=function(a){var b,c,d;return d=a.split(" "),c=d[0],b=d[1],{top:c,left:b}},f=function(){function b(a){this.position=s(this.position,this);var c,d,e,f,g;for(q.push(this),this.history=[],this.setOptions(a,!1),f=b.modules,d=0,e=f.length;e>d;d++)c=f[d],null!=(g=c.initialize)&&g.call(this);this.position()}return b.modules=[],b.prototype.setOptions=function(b,c){var d,e;return this.options=b,null==c&&(c=!0),d={offset:"0 0",targetOffset:"0 0",targetAttachment:"auto auto"},this.options=a.extend(d,this.options),e=this.options,this.element=e.element,this.target=e.target,this.element.jquery&&(this.$element=this.element,this.element=this.element[0]),this.target.jquery&&(this.$target=this.target,this.target=this.target[0]),null==this.$element&&(this.$element=a(this.element)),null==this.$target&&(this.$target=a(this.target)),this.$element.addClass("tether-element"),this.$target.addClass("tether-target"),this.targetAttachment=n(this.options.targetAttachment),this.attachment=n(this.options.attachment),this.offset=o(this.options.offset),this.targetOffset=o(this.options.targetOffset),null!=this.scrollParent&&this.disable(),this.scrollParent=k(a(this.target)),this.options.enabled!==!1?this.enable(c):void 0},b.prototype.enable=function(a){return null==a&&(a=!0),this.addClass("tether-enabled"),this.enabled=!0,this.scrollParent.on("scroll",this.position),a?this.position():void 0},b.prototype.disable=function(){return this.removeClass("tether-enabled"),this.enabled=!1,null!=this.scrollParent?this.scrollParent.off("scroll",this.position):void 0},b.prototype.destroy=function(){var a,b,c,d,e;for(this.disable(),e=[],a=c=0,d=q.length;d>c;a=++c){if(b=q[a],b===this){q.splice(a,1);break}e.push(void 0)}return e},b.prototype.updateAttachClasses=function(a,b){var c,d,e,f,g,h;for(null==a&&(a=this.attachment),null==b&&(b=this.targetAttachment),d=["left","top","bottom","right","middle","center"],e=0,g=d.length;g>e;e++)c=d[e],this.removeClass("tether-element-attached-"+c);for(a.top&&this.addClass("tether-element-attached-"+a.top),a.left&&this.addClass("tether-element-attached-"+a.left),f=0,h=d.length;h>f;f++)c=d[f],this.removeClass("tether-target-attached-"+c);return b.top&&this.addClass("tether-target-attached-"+b.top),b.left?this.addClass("tether-target-attached-"+b.left):void 0},b.prototype.addClass=function(a){return this.$element.addClass(a),this.$target.addClass(a)},b.prototype.removeClass=function(a){return this.$element.removeClass(a),this.$target.removeClass(a)},b.prototype.position=function(){var a,c,d,e,f,j,k,l,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F;if(this.enabled){for(u=i(this.targetAttachment,this.attachment),this.updateAttachClasses(this.attachment,u),n=m(h(this.attachment),this.element),v=m(h(u),this.target),f=m(this.offset,this.element),j=m(this.targetOffset,this.target),n=g(n,f),v=g(v,j),w=this.$target.offset(),c=this.$element.offset(),e=w.left+v.left-n.left,x=w.top+v.top-n.top,D=b.modules,z=0,B=D.length;B>z;z++)if(k=D[z],q=k.position.call(this,{left:e,top:x,targetAttachment:u,targetPos:w,elementPos:c,offset:n,targetOffset:v,manualOffset:f,manualTargetOffset:j}),null!=q&&"object"==typeof q){if(q===!1)return!1;x=q.top,e=q.left}if(y=this.$element.outerWidth(),d=this.$element.outerHeight(),l={page:{top:x,bottom:document.body.scrollHeight-x-d,left:e,right:document.body.scrollWidth-e-y},viewport:{top:x-pageYOffset,bottom:pageYOffset-x-d+innerHeight,left:e-pageXOffset,right:pageXOffset-e-y+innerWidth}},(null!=(E=this.options.optimizations)?E.moveElement:void 0)!==!1){for(a=this.$target.offsetParent(),p=a.offset(),o={},F=["top","left","bottom","right"],A=0,C=F.length;C>A;A++)t=F[A],o[t]=parseFloat(a.css("border-"+t+"-width"));p.left+=o.left,p.top+=o.top,p.right=document.body.scrollWidth-p.left-a.width(),p.bottom=document.body.scrollHeight-p.top-a.height(),l.page.top>=p.top&&l.page.bottom>=p.bottom&&l.page.left>=p.left&&l.page.right>=p.right&&(s=a.scrollTop(),r=a.scrollLeft(),l.offset={top:l.page.top-p.top+s+o.top,left:l.page.left-p.left+r+o.left,right:l.page.right-p.right-r+o.right,bottom:l.page.bottom-p.bottom-s+o.bottom})}return this.move(l),this.history.unshift(l),this.history.length>3&&this.history.pop(),!0}},b.prototype.move=function(b){var c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v;j={};for(m in b){j[m]={};for(f in b[m]){for(e=!1,t=this.history,p=0,r=t.length;r>p;p++)if(i=t[p],(null!=(u=i[m])?u[f]:void 0)!==b[m][f]){e=!0;break}e||(j[m][f]=!0)}}if(d={top:"",left:"",right:"",bottom:""},l=function(a,b){return a.top?d.top=""+b.top+"px":d.bottom=""+b.bottom+"px",a.left?d.left=""+b.left+"px":d.right=""+b.right+"px"},g=!1,(j.page.top||j.page.bottom)&&(j.page.left||j.page.right))d.position="absolute",l(j.page,b.page);else if((j.viewport.top||j.viewport.bottom)&&(j.viewport.left||j.viewport.right))d.position="fixed",l(j.viewport,b.viewport);else if(null!=j.offset&&(j.offset.top||j.offset.bottom)&&(j.offset.left||j.offset.right)){for(d.position="absolute",c=this.$target.offsetParent(),this.$element.offsetParent()[0]!==c[0]&&(this.$element.detach(),c.append(this.$element)),h=a.extend({},b.offset),v=["top","left","bottom","right"],q=0,s=v.length;s>q;q++)k=v[q],h[k]-=parseFloat(c.css("border-"+k+"-width"),10);l(j.offset,h),g=!0}else d.position="absolute",d.top=""+b.page.top+"px",d.left=""+b.page.left+"px";g||this.$element.parent().is("body")||(this.$element.detach(),a(document.body).append(this.$element)),o=!1;for(f in d)if(n=d[f],this.$element.css(f)!==n){o=!0;break}return o?this.$element.css(d):void 0},b}(),window.Tether=f}).call(this),function(){var a,b,c,d,e=[].indexOf||function(a){for(var b=0,c=this.length;c>b;b++)if(b in this&&this[b]===a)return b;return-1};a=jQuery,c={left:"right",right:"left",top:"bottom",bottom:"top",middle:"middle"},b=["left","top","right","bottom"],d=function(c,d){var e,f,g,h,i,j;if("scrollParent"===d?d=c.scrollParent[0]:"window"===d&&(d=[pageXOffset,pageYOffset,innerWidth+pageXOffset,innerHeight+pageYOffset]),null!=d.nodeType)for(e=a(d),g=e.offset(),d=[g.left,g.top,e.width()+g.left,e.height()+g.top],f=i=0,j=b.length;j>i;f=++i)h=b[f],d[f]+=parseFloat(e.css("border-"+h+"-width"),10);return d},Tether.modules.push({position:function(c){var f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T=this;if(C=c.top,n=c.left,y=c.targetAttachment,this.options.constraints){for(u=function(a){var c,d,e,f;for(T.removeClass(a),f=[],d=0,e=b.length;e>d;d++)c=b[d],f.push(T.removeClass(""+a+"-"+c));return f},m=this.$element.outerHeight(),D=this.$element.outerWidth(),z=this.$target.outerHeight(),A=this.$target.outerWidth(),x={},l={},v=["tether-pinned","tether-out-of-bounds"],O=this.options.constraints,E=0,I=O.length;I>E;E++)k=O[E],k.outOfBoundsClass&&v.push(k.outOfBoundsClass),k.pinnedClass&&v.push(k.pinnedClass);for(F=0,J=v.length;J>F;F++)j=v[F],u(j);for(x=a.extend({},y),l=a.extend({},this.attachment),P=this.options.constraints,G=0,K=P.length;K>G;G++){if(k=P[G],B=k.to,f=k.attachment,r=k.pin,null==f&&(f=""),e.call(f," ")>=0?(Q=f.split(" "),i=Q[0],h=Q[1]):h=i=f,g=d(this,B),("target"===i||"both"===i)&&(C<g[1]&&"top"===x.top&&(C+=z,x.top="bottom"),C+m>g[3]&&"bottom"===x.top&&(C-=z,x.top="top")),"together"===i&&(C<g[1]&&"top"===x.top&&("bottom"===l.top?(C+=z,x.top="bottom",C+=m,l.top="top"):"top"===l.top&&(C+=z,x.top="bottom",C-=m,l.top="bottom")),C+m>g[3]&&"bottom"===x.top&&("top"===l.top?(C-=z,x.top="top",C-=m,l.top="bottom"):"bottom"===l.top&&(C-=z,x.top="top",C+=m,l.top="top"))),("target"===h||"both"===h)&&(n<g[0]&&"left"===x.left&&(n+=A,x.left="right"),n+D>g[2]&&"right"===x.left&&(n-=A,x.left="left")),"together"===h&&(n<g[0]&&"left"===x.left?"right"===l.left?(n+=A,x.left="right",n+=D,l.left="left"):"left"===l.left&&(n+=A,x.left="right",n-=D,l.left="right"):n+D>g[2]&&"right"===x.left&&("left"===l.left?(n-=A,x.left="left",n-=D,l.left="right"):"right"===l.left&&(n-=A,x.left="left",n+=D,l.left="left"))),("element"===i||"both"===i)&&(C<g[1]&&"bottom"===l.top&&(C+=m,l.top="top"),C+m>g[3]&&"top"===l.top&&(C-=m,l.top="bottom")),("element"===h||"both"===h)&&(n<g[0]&&"right"===l.left&&(n+=D,l.left="left"),n+D>g[2]&&"left"===l.left&&(n-=D,l.left="right")),"string"==typeof r?r=function(){var a,b,c,d;for(c=r.split(","),d=[],a=0,b=c.length;b>a;a++)q=c[a],d.push(q.trim());return d}():r===!0&&(r=["top","left","right","bottom"]),r||(r=[]),s=[],o=[],C<g[1]&&(e.call(r,"top")>=0?(C=g[1],s.push("top")):o.push("top")),C+m>g[3]&&(e.call(r,"bottom")>=0?(C=g[3]-m,s.push("bottom")):o.push("bottom")),n<g[0]&&(e.call(r,"left")>=0?(n=g[0],s.push("left")):o.push("left")),n+D>g[2]&&(e.call(r,"right")>=0?(n=g[2]-D,s.push("right")):o.push("right")),s.length)for(t=null!=(R=this.options.pinnedClass)?R:"tether-pinned",this.addClass(t),H=0,L=s.length;L>H;H++)w=s[H],this.addClass(""+t+"-"+w);if(o.length)for(p=null!=(S=this.options.outOfBoundsClass)?S:"tether-out-of-bounds",this.addClass(p),N=0,M=o.length;M>N;N++)w=o[N],this.addClass(""+p+"-"+w);(e.call(s,"left")>=0||e.call(s,"right")>=0)&&(l.left=x.left=!1),(e.call(s,"top")>=0||e.call(s,"bottom")>=0)&&(l.top=x.top=!1),(x.top!==y.top||x.left!==y.left||l.top!==this.attachment.top||l.left!==this.attachment.left)&&this.updateAttachClasses(l,x)}return{top:C,left:n}}}})}.call(this),function(){var a;a=jQuery,Tether.modules.push({position:function(a){var b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y;if(l=a.top,e=a.left,d=this.$element.outerHeight(),m=this.$element.outerWidth(),i=this.$target.outerHeight(),k=this.$target.outerWidth(),j=this.$target.offset(),j.bottom=j.top+i,j.right=j.left+k,c=l+d,f=e+m,b=[],l<=j.bottom&&c>=j.top)for(v=["left","right"],n=0,r=v.length;r>n;n++)g=v[n],((w=j[g])===e||w===f)&&b.push(g);if(e<=j.right&&f>=j.left)for(x=["top","bottom"],o=0,s=x.length;s>o;o++)g=x[o],((y=j[g])===l||y===c)&&b.push(g);for(h=["left","top","right","bottom"],this.removeClass("tether-abutted"),p=0,t=h.length;t>p;p++)g=h[p],this.removeClass("tether-abutted-"+g);for(b.length&&this.addClass("tether-abutted"),q=0,u=b.length;u>q;q++)g=b[q],this.addClass("tether-abutted-"+g);return!0}})}.call(this),function(){Tether.modules.push({position:function(a){var b,c,d,e,f,g,h;return g=a.top,b=a.left,this.options.shift?(c=function(a){return"function"==typeof a?a.call(this,{top:g,left:b}):a},d=c(this.options.shift),"string"==typeof d?(d=d.split(" "),d[1]||(d[1]=d[0]),f=d[0],e=d[1],f=parseFloat(f,10),e=parseFloat(e,10)):(h=[d.top,d.left],f=h[0],e=h[1]),g+=f,b+=e,{top:g,left:b}):void 0}})}.call(this);