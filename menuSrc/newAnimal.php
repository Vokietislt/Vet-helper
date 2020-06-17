<div  id="animals" class="tab-pane fade active show"  role="tabpanel" aria-labelledby="list-profile-list">
<div class="aInfo">
<a class=" new btn btn-primary ml-3" href="#" class="animals" value="'.$vals.'">+ new animal</a>
<a style="display:none" class=" back  btn btn-secondary ml-3" href="#" class="animals" value="'.$vals.'">Back</a>
    <?php
$animal=DB::getInstance()->getAll('animal',' DISTINCT animal');
foreach ($animal as $animals ){
    foreach($animals as $val){    
        foreach ($val as $vals){
            // echo $vals.'<Br>';
         echo '<a style="display:none" class=" animals btn btn-primary ml-3" href="#" class="animals" value="'.$vals.'">'.$vals.'</a>';
            get($vals);
        }
    }
}
function get($what){
    $practises =DB::getInstance()->getAll("animal WHERE animal = '{$what}'" ,'practise');
    // print_r ($practises);
    foreach ($practises as $practise ){
    foreach($practise as $val2){
    foreach($val2 as $key=>$vals2){
    //    echo '<br>'.$key.' '.$vals2;

    echo '<a  style="display:none" class=" '.$what.' practices btn btn-primary ml-3" href="animal.php?animal='.$what.'&practise='.$vals2.'" value="'.$vals2.'">'.$vals2.'</a>';

    }
    }
    }
}

?>
</div>
</div>
<script>
    $('.new').click(function(){
        $(this).css('display','none');
        $('.animals').css('display','inline-block')
        $('.back').css('display','inline-block')
    })
    $('.animals').click(function(){
        $('.animals').css('display','none')
        $('.'+$(this).attr('value')).css('display','inline-block')

    })
    $('.back').click(function(){
        $('.animals').css('display','none')
        $('.back').css('display','none')
        $('.practices').css('display','none')
        $('.new').css('display','inline-block')

    });

</script>