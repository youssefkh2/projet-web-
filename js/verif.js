function verif()
{
  var nomjob=document.getElementById("job").value; 
  var verif=/(?=.[a-z])(?=.[A-Z])$/;
  if (!nomjob.match(verif)) {alert ("veuillez verifier le nom du metier");};
}