/**
 * @author David Pyle
 */

/*
 * This section is attributed to the tooltip.  It will apear when you
 * call the onmouseover="tooltip.show('Testing , 200);"
               onmouseout="tooltip.hide();">
 */


//Content for tooltip box
var tooltip=function(){
 var id = 'tt';
 var top = 3;
 var left = 3;
 var maxw = 300;
 var speed = 10;
 var timer = 20;
 var endalpha = 95;
 var alpha = 0;
 var tt,t,c,b,h;
 var ie = document.all ? true : false;
 return{
  show:function(v,w){
   if(tt == null){
    tt = document.createElement('div');
    tt.setAttribute('id',id);
    t = document.createElement('div');
    t.setAttribute('id',id + 'top');
    c = document.createElement('div');
    c.setAttribute('id',id + 'cont');
    b = document.createElement('div');
    b.setAttribute('id',id + 'bot');
    tt.appendChild(t);
    tt.appendChild(c);
    tt.appendChild(b);
    document.body.appendChild(tt);
    tt.style.opacity = 0;
    tt.style.filter = 'alpha(opacity=0)';
    document.onmousemove = this.pos;
   }
   tt.style.display = 'block';
   c.innerHTML = v;
   tt.style.width = w ? w + 'px' : 'auto';
   if(!w && ie){
    t.style.display = 'none';
    b.style.display = 'none';
    tt.style.width = tt.offsetWidth;
    t.style.display = 'block';
    b.style.display = 'block';
   }
  if(tt.offsetWidth > maxw){tt.style.width = maxw + 'px'}
  h = parseInt(tt.offsetHeight) + top;
  clearInterval(tt.timer);
  tt.timer = setInterval(function(){tooltip.fade(1)},timer);
  },
  pos:function(e){
   var u = ie ? event.clientY + document.documentElement.scrollTop : e.pageY;
   var l = ie ? event.clientX + document.documentElement.scrollLeft : e.pageX;
   tt.style.top = (u - h) + 'px';
   tt.style.left = (l + left) + 'px';
  },
  fade:function(d){
   var a = alpha;
   if((a != endalpha && d == 1) || (a != 0 && d == -1)){
    var i = speed;
   if(endalpha - a < speed && d == 1){
    i = endalpha - a;
   }else if(alpha < speed && d == -1){
     i = a;
   }
   alpha = a + (i * d);
   tt.style.opacity = alpha * .01;
   tt.style.filter = 'alpha(opacity=' + alpha + ')';
  }else{
    clearInterval(tt.timer);
     if(d == -1){tt.style.display = 'none'}
  }
 },
 hide:function(){
  clearInterval(tt.timer);
   tt.timer = setInterval(function(){tooltip.fade(-1)},timer);
  }
 };
}();


//Funciton for managing grey text in box when user enters
function changeTextInBox(currentText,oldValue)
{
	if(currentText == oldValue)
	{
		return "";
	}
	else
	{
		return currentText;
	}
}

//Funciton for managing grey text in box when user exits
function textBoxExit(curentText,newText)
{
	
	if(curentText == "")
	{
 		return newText;
 	}
 	else
 	{
 		return curentText;
 	}
}

//Funciton for managing color of text when user enters box
function changeColorInBox(currentValue,DefaultValue)
{
	if(currentValue == DefaultValue)
	{
		return "grey";
	}
	else
	{
		return "black";
	}

}

//Funciton for managing text color when user exits box
function textBoxExitColor(curentValue,DefaultValue)
{
	
	if(curentValue == DefaultValue)
	{
 		return "Grey";
 	}
 	else
 	{
 		return "Black";
 	}
}

//Test popup box
function popupVariable(Variable)
{
	alert(Variable);
}

