function showChildNames()
{                                             
var count = document.getElementById("children").value;
var childNames = document.getElementById("child-names");
childNames.innerHTML = "";
for (var i = 1; i <= count; i++){
 var label = document.createElement("label");
 label.innerHTML = "اسم المادة" + i ;
 var input = document.createElement("input");
 input.type = "text";
 input.id = "child-name-" + i;
 input.name = "gradeis"+i;
 childNames.appendChild(label);
 childNames.appendChild(input);
 childNames.appendChild(document.createElement("br"));
}
 if (count > 0) {
 childNames.style.display = "block";
 } else {
 childNames.style.display = "none";
}
 }

 