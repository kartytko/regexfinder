function getFromTextarea(event){
	event.preventDefault();
	var pattern = document.getElementById('twoj_regex').value;
	var text = document.getElementById('textarea_input').value; 
	
    document.getElementById("textarea_input_highlights").innerHTML = text;
	//var reg = new RegExp('/'+pattern'/g');

 	//var my_array = reg.exec(text);
	//var output =    text.search(reg);	
    
    //var pattern2 = /kot/g;
    var reg = new RegExp(pattern, "g");
    //document.getElementById("matches").innerHTML = text + pattern;


    var substring1;
    var substring2;
    var output = text;
    var counter = 0;
    var przechwycone="<div style='letter-spacing:1px'>Przechwycone grupy</div>";
    while((match=reg.exec(text)) != null){
    	if(pattern==""){break;}
    	/*substring1 = output.substring(0, match.index-1+6*counter);
    	substring2 = output.substring(match.index+6*counter, text.length);
    	output=substring1+"<mark>"+substring2;
    	*/
    //	alert("match at" + match.index+ output);
    	substring1=output.substring(0, match.index+counter*13);
    	if(counter>=0){
    //		alert(substring1);
    	}
    	substring2=output.substring(match.index+counter*13, match.index+RegExp.lastMatch.length+counter*13);
    	if(counter>=0){
  //  		alert(substring2);
    	}
    	substring3=output.substring(match.index+RegExp.lastMatch.length+counter*13, output.length);
    	if(counter>=0){
    //		alert(substring3);
    	}
    	output=substring1+"<mark>"+substring2+"</mark>"+substring3;

    	counter=counter+1;
    //	alert("match at" + match.index + substring1+"<mark>"+substring2+"</mark>"+substring3);
    	substring1="";
    	substring2="";
    	substring3="";
    	if(pattern!=""){
    		//przechwycone=przechwycone+'<div class="numergrupy"> Numer grupy '+counter+" </div><div class='dopasowanie'>"+RegExp.lastMatch+'</div>'+"<div style='clear:both;'>"+'</div><br/>';
    		//przechwycone=przechwycone+"grupa "+counter+": "+RegExp.lastMatch+" "+match.index+"-"+(match.index+RegExp.lastMatch.length)+"<br/>";
			przechwycone = przechwycone + "<div class='helptile'>"
										+	"<div class='numergrupy'>grupa: "+counter+"</div>"
										+	"<div class='indeksy'>" + match.index+"-"+(match.index+RegExp.lastMatch.length) +"</div>"
										+	"<div class='dopasowanie'>"+RegExp.lastMatch +"</div>"
										+	"<div style='clear: both;'></div>"
										+ "</div>";
			/*
			<div class="helptile">
					<div class="helppattern">*</div>
					<div class="helpdes">zero lub więcej wystąpień</div>
					<div class="helpflag" style="background-color: #827d00">.</div>
					<div style="clear: both;"></div>	
			</div>
			*/
		}
    }
	document.getElementById("textarea_input_highlights").innerHTML = output;
	document.getElementById("matches").innerHTML = przechwycone;
 	
 	/*var re = /kot/g,
    str = "foobarfoobar";
	while ((match = re.exec(text.toString())) != null) {
    alert("match found at " + match.index);
	}*/

}

function Clear(event){
	event.preventDefault();
	document.getElementById("textarea_input_highlights").innerHTML = "";	
}