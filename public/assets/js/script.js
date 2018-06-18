(function($, undefined){
$(function(){

var imgHead = [
            'assets/img/home-bg.jpg',
            'assets/img/img1.jpg',
            'assets/img/img2.jpg',
            'assets/img/img3.jpg'
        ], i=1;
    function csaHead(){
        if(i > (imgHead.length-1)){
            $('.csa-head').animate({'opacity':'0.5'},500,function(){
                i=1;
                $('.csa-head').css({'background':'-webkit-linear-gradient(45deg,rgba(152,152,152,0.5),rgba(152,152,152,0.3)),url('+imgHead[0]+')','background-size':'cover', 'background-position':'center 25%', 'background-repeat':'no-repeat'});
            });
            $('.csa-head').animate({'opacity':'1'},500);
        }else{
            $('.csa-head').animate({'opacity':'0.5'},500,function(){
                $('.csa-head').css({'background':'-webkit-linear-gradient(45deg,rgba(152,152,152,0.5),rgba(152,152,152,0.3)),url('+imgHead[i]+')','background-size':'cover', 'background-position':'center 25%', 'background-repeat':'no-repeat'});
                i++;
            });
            $('.csa-head').animate({'opacity':'1'},500);
        }
    }
setInterval(csaHead,5000);




$( ".add" ).click(function() {
  $( '.fas' ).css('visibility', 'visible');
});

//добавление в корзину

// $('.add').click()
// css('background', 'blue');

// $( '.checkout' ).click(function() {
//   $( '.formorder' ).css('display', 'block');
// });

// $(document).on('click', '.checkout', function() {
//   $( ".formorder" ).show( "fold", 2000 );
// });
  

})
})(jQuery)