;!function(e,i,t,n)
{var a=function(i,t)
    {

        this.$element=i,this.defaults={width:"200px",height:"200px",backgroundSize:"cover",fontSize:"16px",borderRadius:"5px",border:"0",lang:"zh-cn"}
        ,this.options=e.extend({},this.defaults,t)}
    ;a.prototype={preview:function()
        {
            return o({$element:this.$element,width:this.options.width,height:this.options.height,backgroundSize:this.options.backgroundSize,fontSize:this.options.fontSize,borderRadius:this.options.borderRadius,border:this.options.border,lang:this.options.lang})
            ,r(this.$element,this.$element.children("input")),this.$element}};var o=function(i){switch(i.lang){case"zh-cn":i.$element.append('<span>点击选择图片</span><div class="up_again">点击重新<br>选择图片</div>');break;case"en":i.$element.append('<span>click to choose a pic</span><div class="up_again">click again<br>to choose another</div>');break;default:i.$element.append('<span>click here to choose pic</span><div class="up_again">click again<br>choose pic</div>')}var t=i.$element.attr("class").trim(),n=t.indexOf(" ");-1!==n&&(t=t.substr(0,n)),e("head").append("<style>."+t+" { font-size: "+i.fontSize+"; width: "+i.width+"; height: "+i.height+"; border-radius: "+i.borderRadius+";border: "+i.border+"; position: relative; overflow: hidden; background-color: #eee; background-size: "+i.backgroundSize+"; background-repeat: no-repeat; background-position: center; -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC);}."+t+" span { display: block; padding: 0; line-height: "+i.height+"; text-align: center; }."+t+' input { position: absolute; font-size: 2000px; z-index: 200; top: 0; right: 0; opacity: 0; -ms-filter: "alpha(opacity=0)"; cursor: pointer; }.'+t+" .up_again { display: table-cell; vertical-align: middle; text-align: center; width: "+i.width+"; height: "+i.height+"; opacity: 0; color: #fff; transition: 0.3s ease-in-out; -moz-transition: 0.3s ease-in-out; -webkit-transition: 0.3s ease-in-out; -o-transition: 0.3s ease-in-out; line-height: 1.6; }."+t+":hover .up_again { opacity: 1; background: rgba(0, 0, 0, 0.5); }</style>")},s=function(i,t){if(t.files&&t.files[0]){var n=new FileReader;
                        
                        n.onload=function(e){
                            var myClass = $(i).attr("class");
                            var classes = myClass.split(' ')[0]  
                           // alert(classes)
                            $('#'+classes).hide();
                            $('#'+classes+'_delete').click();
                            i.css("background-image","url("+e.target.result+")")},n.readAsDataURL(t.files[0]),e(t).next("span").hide()}},r=function(e,i){i.change(function(){s(e,this)})};e.fn.uploadPreview=
                        function(e){
                    var i=new a(this,e);return i.preview()}}(jQuery,window,document);
