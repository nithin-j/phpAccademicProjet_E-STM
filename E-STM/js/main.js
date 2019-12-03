
 $ = function(data) {
       return document.querySelector(data);
 }

 var checkResult = {
     right: false,
     tip: ''
}

var inputEles=[$('#name'), $('#address'),$('#city'),$('#province'),$('#pc'),$('#phone'),$('#email'),$('#Birthday')];
var originTip=['Require,Example:Tom or Tom Cruise','Example: 123 rue St. Antoine','Example: Montreal or Las Vegas','Example:QC or Quebec or Las Vegas','Example: A9A-9A9 or A9A 9A9 or A9A9A9','Example: 000-000-0000  ','example@123.com','dd-mm-yyyy'];

function checkValue(ele){
	var str = ele.value.trim();

	if(str.length==0){
		checkResult.right=false;
		checkResult.tip='Required';
		return;
	}

	if(ele===inputEles[0]){
	 	var regName=new RegExp(/^([A-Z][a-z]{2,})((\s[A-Z][a-z]{1,}){0,1})$/);

		if(str.match(regName)){
			checkResult.right=true;
			checkResult.tip='';
		}else{
			checkResult.right =false;
			checkResult.tip='try again';
		}
	}
	if(ele===inputEles[1]){
		var regAddress=new RegExp(/^([0-9]{1,5})(\s[A-Z][a-z]+(\.)?)*((\s[A-Z][a-z]+)*)$/);
			if(str.match(regAddress)){
			checkResult.right=true;
			checkResult.tip='';
		}else{
			checkResult.right =false;
			checkResult.tip='try again';
		}
	}
    if(ele===inputEles[2]){
        var regcity=new RegExp(/^([A-Z][a-z]{2,})((\s[A-Z][a-z]{1,})?)$/);
            if(str.match(regcity)){
            checkResult.right=true;
            checkResult.tip='';
        }else{
            checkResult.right =false;
            checkResult.tip='try again';
        }
    }
        if(ele===inputEles[3]){
        var regpro=new RegExp(/^([A-Z]{2}|[A-Z][a-z]{2,})((\s[A-Z][a-z]{1,})?)$/);
            if(str.match(regpro)){
            checkResult.right=true;
            checkResult.tip='';
        }else{
            checkResult.right =false;
            checkResult.tip='try again';
        }
    }
        if(ele===inputEles[4]){
        var regpc=new RegExp(/^([A-Z][0-9][A-Z])(\s|-)?([0-9][A-Z][0-9])$/);
            if(str.match(regpc)){
            checkResult.right=true;
            checkResult.tip='';
        }else{
            checkResult.right =false;
            checkResult.tip='try again';
        }
    }
        if(ele===inputEles[5]){
        var regph=new RegExp(/(([\d]{3}-[\d]{3}-[\d]{4})|([\d]{3}\.[\d]{3}\.[\d]{4})|([\d]{3}\s[\d]{3}\s[\d]{4})|([\d]{10}))/);
            if(str.match(regph)){
            checkResult.right=true;
            checkResult.tip='';
        }else{
            checkResult.right =false;
            checkResult.tip='try again';
        }
    }
	 if(ele===inputEles[6]){
        var regemail=new RegExp('^([a-zA-Z0-9_\.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$', 'i');
            if(str.match(regemail)){
            checkResult.right=true;
            checkResult.tip='can use';
        }else{
            checkResult.right =false;
            checkResult.tip='try again';
        }
    }
        if(ele===inputEles[7]){
        var regebd=new RegExp(/^([0-9]{2})(\-[0-9]{2})(\-[0-9]{4})/);
            if(str.match(regebd)){
            checkResult.right=true;
            checkResult.tip='can use';
        }else{
            checkResult.right =false;
            checkResult.tip='try again';
        }
    }

     


}
   for (var i = 0; i < inputEles.length; i++) {
        inputEles[i].addEventListener('blur', function(e) {
            checkValue(e.target);
            var span = e.target.parentElement.getElementsByTagName('span')[0];
            span.innerHTML = checkResult.tip;
            if (checkResult.right) {
                e.target.style.border = '2px solid green';
                
                span.style.color = 'green';
            } else {
                e.target.style.border = '2px solid red';
                span.style.color = 'red';
            }
        })
        inputEles[i].addEventListener('focus', function(e) {
            var index = inputEles.indexOf(e.target);
            var span = e.target.parentElement.getElementsByTagName('span')[0];
            span.innerHTML = originTip[index];
            span.style.visibility = 'visible';
            span.style.color = 'gray';
        })
    }
    $('#check').addEventListener('click', function(e) {
        var right = true;
        for (var i = 0; i < inputEles.length; i++) {
            var input = inputEles[i];
            checkValue(input);
            var span = input.parentElement.getElementsByTagName('span')[0];
            span.style.visibility = 'visible';
            span.innerHTML = checkResult.tip;
            if (checkResult.right) {
                input.style.border = '2px solid green';
                span.style.color = 'green';
            } else {
                input.style.border = '2px solid red';
                span.style.color = 'red';
                right = false;
            }
        }
        if (right) {
            alert('Form Submitted');
        } else {
            alert('There was some error,try again');
        }
    })
