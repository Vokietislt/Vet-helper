<nav class="navbar navbar-expand-lg navbar-dark " >
<!-- Headeris --><div class="banner"><a class="col- logo"href="index.php"> <img  src="img/logo.svg" alt=""></a> 
</div>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#animal">Animal information</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Animal stasis</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="#your">Your information </a>
      </li>
    </ul>
    
  </div>
</nav>
<script>
window.onload= function(){
    $('.invis').css('display','none');
 $('.invis').eq(0).css('display','block');
 $('.nav-item ').eq(0).css({'background-color':'#d5d6d552',
})
};


$('.nav-item').click(function(){
    $('.nav-item ').css({'background-color':'#218838',
})
    $(this).css({'background-color':'#d5d6d552',
})
$('.invis').css('display','none');
index = $(this).index();
l = $('.invis');
l.eq(index).css('display','block');

});
</script>