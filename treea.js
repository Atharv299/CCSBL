
// demo of JS if - else if - else

var grade = "";
var score = 0;
var frade="";
var bed="";

// this listens for the button click
document.getElementById("grade").onclick = assignGrade;

function assignGrade() {
  var b=0;
  var a = document.forms.chk1;
  for(i=0;i<a.length;i++)
  {
    if(a[i].checked==true)
      b=i;
  }
  var k=0;
  var a = document.forms.cat;
  for(i=0;i<a.length;i++)
  {
    if(a[i].checked==true)
      k=i;
  }

  
  
  // grab what was typed
  score = document.getElementById("scoreInput").value;

  // make sure they typed a number. If not, end the function.
  // if score is "not a number," isNaN() returns false 
  if (isNaN(score)) {
    document.getElementById("result").innerHTML = "You must type a NUMBER.";
    return;
  }
  // test the number and determine letter grade
  if ((score > 380 && b==1) || (score >280 && b==0)) {
    bed="A";
    if(k==0)
    grade = ", Congratulations! your envoirnmental health is very good, No more trees need to plant Your area contains oxygen rich trees";
    else
    frade = ", Congratulations! your envoirnmental health is very good, No more trees need to plant Your area contains low oxygen rich trees,so planting trees from category1 is recommended";
document.getElementById("result").style.backgroundColor = "green";
    score=0;
  } else if ((score > 280 && score<=380 && b==1)||(score>200 && b==0)) {
    bed="B";
    if(k==0)
    grade = ", Your envoirmental health is good ,but planting more trees will be required Your area contains oxygen rich trees .You can plant the trees from either of the above category";
    else
    frade = ", Your envoirmental health is good ,but planting more trees will be required.Your area contains low oxygen rich trees,so planting trees from category1 is recommended";
    document.getElementById("result").style.backgroundColor = "lightgreen";
    score=0;
  } else if ((score > 180 && score<=280 && b==1)||(score>120 && b==0)) {
    bed="C";
    if(k==0)
    grade = ", Your envoirmental health is not good but planting more trees will be required. Your area contains oxygen rich trees ,planting maximum trees from category1 is recommended although you can plant from category2";
    else
    frade = ", Your envoirmental health is not good but planting more trees will be required. Your area contains low oxygen rich trees ,planting maximum trees from category1 is recommended";
    score=280-score;
    document.getElementById("result").style.backgroundColor = "yellow";
  } else if ((score > 50 && score<=180 && b==1)||(score>50 && b==0)) {
    bed="D";
    if(k==0)
    grade = ", you are in danger,you have to grow more trees.Your area contains oxygen rich trees ,planting maximum trees from category1 is recommended.";
    else
    frade = ", you are in danger,you have to grow more trees.Your area contains low oxygen rich trees ,planting maximum trees from category1 is recommended.";
    score=280-score;
    document.getElementById("result").style.backgroundColor = "red";
  } else {
    bed="F";
    if(k==0)
    grade = ", you are in danger,you have to grow more trees.Your area contains oxygen rich trees ,planting maximum trees from category1 is recommended.";
    else
    frade = ", you are in danger,you have to grow more trees.Your area contains low oxygen rich trees ,planting maximum trees from category1 is recommended.";
    score=280-score;
    document.getElementById("result").style.backgroundColor = "red";
  }
  // this writes into the yellow box
  document.getElementById("result").innerHTML = "Your Envoirnment Health grade" + " is " + bed + grade + "."+frade+"( around " + score+ " or more)";
} // end of the function
