
function remove(elem) {
  $(elem).parent('div').remove();
};
$('#genPDF').click(function(){
  document.getElementById('forData').value="";
let pasirinkimai = document.getElementsByClassName('dataItem');
let img = document.getElementById('fileToUpload');
for (let index = 0; index < pasirinkimai.length; index++) {
  document.getElementById('forData').value += pasirinkimai[index].value+'<br>';
}
document.getElementById('forImg').innerHTML+=img;
})


 $('.transfer').click(function(){
  let x = $(this).parent();
  let id1 = x.attr('id')
  $('#'+id1+'-list').css({'background-color':'#a7a9aa',
                      'color':'white'});
  
  id2='#'+id1+'-list';
  let lvl1=x.attr('id');
  let lvl2 = $(id2).parent().parent().parent().parent().attr('id');

  lvl1=lvl1.substr(5);
  lvl2=lvl2.substr(5);
data2 = lvl2+' '+lvl1;
console.log(data2);
let data=""
if($('#'+id1+' select').val().length!==0){
data+=' - '+$('#'+id1+' select').val()+'';
}
  if($('#'+id1+' textarea').val().length!==0){
  data+='; '+$('#'+id1+' textarea').val();}

let data1 = '<div><input type="button" class="dataRemove" onclick=remove(this) value="X"><input  class = "dataItem" type="text" name="data[]" value ="'+data2+data+'"></div> '

      $('#cia').append(data1);

 });
