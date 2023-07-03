var question = document.getElementById("question");
var x = 1;
let y = 0;

function addquestion(){

const quest = document.querySelectorAll(".divquestion");
for (let i_q = 0; i_q<= quest; i_q ++){
y=i_q;

}
y++;
var creation = document.getElementById("creation").innerHTML;
creation += '<div class="divquestion"><br><label>Question '+y+'</label><br><input type="texte" name="qustion'+y+'" placeholder ="entrer la question" required=""><br><label>Reponse </label><br><input type="texte" name="good'+y+'" placeholder ="bonne reponse" required=""><br><input type="texte" name="badrep'+y+'-1" placeholder ="mauvaises reponses" required=""><br><input type="texte" name="badrep'+y+'-2" placeholder ="mauvaises reponses" required=""><br></div>'
document.getElementById("creation").innerHTML = creation;

}
function deletequestion(){
var supp = document.querySelector('.divquestion:last-of-type');
supp.remove();

}