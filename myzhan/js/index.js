$(document).ready( function() {
    var slider = $.fn.fsvs({
        speed : 2000,
        bodyID : 'fsvs-body',
        selector : '> .slide',
        mouseSwipeDisance : 40,
        afterSlide : function(){},
        beforeSlide : function(){},
        endSlide : function(){},
        mouseWheelEvents : true,
        mouseWheelDelay : false,
        scrollabelArea : 'scrollable',
        mouseDragEvents : true,
        touchEvents : true,
        arrowKeyEvents : true,
        pagination : true,
        nthClasses : false,
        detectHash : true
    });
    $('.circleMagic').circleMagic({
        elem: '.circleMagic',
        radius: 35,
        densety: .3,
        color: 'random',
        clearOffset: .3
    });  
    //slider.slideUp();
    //slider.slideDown();
    //slider.slideToIndex( index );
    //slider.unbind();
    //slider.rebind();
    $('html').addClass('js');
    var oUl = $('html.fsvs #fsvs-pagination'); 
    var aLi = $('html.fsvs #fsvs-pagination li'); 
    var oSlide = $('.slide.nth-class-2');
    var aSkill = $('.skill-bar');
    var flag = false;
    $(aLi[0]).html('<a>首页</a>');
    $(aLi[1]).html('<a>关于我</a>');
    $(aLi[2]).html('<a>技能掌握</a>');
    $(aLi[3]).html('<a>我的作品</a>');
    $(aLi[4]).html('<a>踩一踩</a>');
    $(oUl).hide();
    $('.top-bar').on('click',function(){
       
        flag = !flag;
        if(flag == false){
            $(oUl).slideUp('slow');
            $('.icon').removeClass('open').addClass('close');
        }else{
            $(oUl).slideDown('slow');
            $('.icon').removeClass('close').addClass('open');
    }
      
    })
    $(aLi).on('click',function(){
        flag = false;
        $(oUl).hide('slow');
        $('.icon').removeClass('open').addClass('close');
       
    })
    $('.btn').on('click',function(){
        $('body').removeClass();
        $('body').addClass('active-slide-2 active-nth-slide-2');
        $(oSlide).addClass('active-slide');
        $('#fsvs-body').css({
            '-webkit-transform' : 'translate3d(0, -100%, 0)',
            '-moz-transform' : 'translate3d(0, -100%, 0)',
            '-ms-transform' : 'translate3d(0, -100%, 0)',
            'transform' : 'translate3d(0, -100%, 0)'
        });
        $(aLi[1]).addClass('active').siblings().removeClass('active');
    })
    $('.photo-box').on('mouseover',function(){
        $(this).removeClass('npuff').addClass('puff');
    })

    $('.photo-box').on('mouseout',function(){
        $(this).removeClass('puff').addClass('npuff');
    })
    // $(aLi[2]).on('click',function(){
    //     // $(aSkill[0]).addClass('skill-bar1');
    //     // $(aSkill[1]).addClass('skill-bar2');
    //     // $(aSkill[2]).addClass('skill-bar3');
    //     // $(aSkill[3]).addClass('skill-bar4');
    //     // $(aSkill[4]).addClass('skill-bar5');
    //     for(i=0;i<aSkill.length;i++){
    //         $(aSkill[i]).addClass('skill-bar'+(i+1));
    //     }
       
    // })
    // $(aLi[0]).on('click',function(){
    //     $(aSkill[0]).removeClass('skill-bar1');
    //     $(aSkill[1]).removeClass('skill-bar2');
    //     $(aSkill[2]).removeClass('skill-bar3');
    //     $(aSkill[3]).removeClass('skill-bar4');
    //     $(aSkill[4]).removeClass('skill-bar5');
       
    // })
    // $(aLi[1]).on('click',function(){
    //     $(aSkill[0]).removeClass('skill-bar1');
    //     $(aSkill[1]).removeClass('skill-bar2');
    //     $(aSkill[2]).removeClass('skill-bar3');
    //     $(aSkill[3]).removeClass('skill-bar4');
    //     $(aSkill[4]).removeClass('skill-bar5');
       
    // })
    // $(aLi[3]).on('click',function(){
    //     $(aSkill[0]).removeClass('skill-bar1');
    //     $(aSkill[1]).removeClass('skill-bar2');
    //     $(aSkill[2]).removeClass('skill-bar3');
    //     $(aSkill[3]).removeClass('skill-bar4');
    //     $(aSkill[4]).removeClass('skill-bar5');
       
    // })
    // $(aLi[4]).on('click',function(){
    //     $(aSkill[0]).removeClass('skill-bar1');
    //     $(aSkill[1]).removeClass('skill-bar2');
    //     $(aSkill[2]).removeClass('skill-bar3');
    //     $(aSkill[3]).removeClass('skill-bar4');
    //     $(aSkill[4]).removeClass('skill-bar5');
       
    // })
    for(i=0;i<aLi.length;i++){
        if(i==2){
            $(aLi[i]).on('click',function(){
                for(j=0;j<aSkill.length;j++){
                    $(aSkill[j]).addClass('skill-bar'+(j+1));
                }
            })
        }else{
            $(aLi[i]).on('click',function(){
                for(k=0;k<aSkill.length;k++){
                    $(aSkill[k]).removeClass('skill-bar'+(k+1));
                }
            })
        }
    }
});