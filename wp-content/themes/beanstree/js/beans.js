$(function() {
    
    var setElm = $('.ImageSlide__cover--main'),
        slideSpeed = 500,
        slideDelay = 5000,
        slideEasing = 'linear',
        slideMaxWidth = 1200,
        openingFade = 1000;
    
    $(window).on('load', function() {
        
        setElm.each(function() {
            var self        = $(this),
                findUl      = self.find('ul'),
                findLi      = findUl.find('li'),
                findLiCount = findLi.length,
                findImg     = findLi.find('img'),
                slideTimer;
            
            //イメージ画像の変更
            if (findImg.width() > $(window).width()) {
                findImg.width($(window).width());
            } else if (findImg.width() < $(window).width()) {
                findImg.width(slideMaxWidth);
            }
            
            findLi.each(function(i){
                $(this).attr('class', 'viewList' + (i + 1));
            });
            
            if(findLiCount > 1) {
                self.wrapAll('<div class="ImageSlide__cover"/>');
                findUl.wrapAll('<div class="ImageSlide__cover--main--wrap"/>');
                
                var findCover = self.parent('.ImageSlide__cover');
                var findWrap = self.find('.ImageSlide__cover--main--wrap');
                
				findUl.clone().prependTo(findWrap);
				findUl.clone().appendTo(findWrap);
                
                findWrap.find('ul').eq(1).addClass('mainList');
                var mainList = findWrap.find('.mainList').find('li');
                mainList.eq('0').addClass('mainActive');
                
                var allList = findWrap.find('li'),
                allListCount = allList.length;

                var imgWidth  = findImg.width(),
                    imgHeight = findImg.height();
                    
                self.css({height:imgHeight});
                findCover.css({height:imgHeight});
                allList.css({height:imgHeight});
                
                var baseWrapWidth = imgWidth * findLiCount,
                    allWrapWidth  = imgWidth * allListCount;
                
                findWrap.css({left:-(baseWrapWidth), width:allWrapWidth, height:imgHeight});
                findWrap.find('ul').css({width:baseWrapWidth,height:imgHeight});
                
                //page Nation
                var pageNation = $('<div class="ImageSlide__cover--main--pageNation"></div>');
                self.append(pageNation);
                
                findLi.each(function(i){
                    pageNation.append('<a href="javascript:void(0);" class="pn' + (i+1) + '"></a>');
                });
                
                // function setSlideSize() {
                //     var wdWidth = $(window).width();
                    
                //     if (slideMaxWidth >= wdWidth || slideMaxWidth == 0) {
                //     //     allList.css({width:wdWidth});
                //     //     findImg.css({width:wdWidth});
                //     //     baseWrapWidth = wdWidth * findLiCount;
                //     //     allWrapWidth = wdWidth * allListCount;
                //         console.log('slideMaxWidth' + $(window).width());
                //     } else if (slideMaxWidth < wdWidth) {
                //         allList.css({width:slideMaxWidth});
                //         findImg.css({width:slideMaxWidth});
                //         baseWrapWidth = slideMaxWidth * findLiCount;
                //         allWrapWidth = slideMaxWidth * allListCount;
                        
                //         var setSizeWidth = slideMaxWidth;
                //         console.log('wdwidth' + $(window).width());
                //     }
                    
                //     imgWidth = setSizeWidth;
                //     findWrap.css({width:allWrapWidth, height:imgHeight}).find('ul').css({width:setSizeWidth, height:imgHeight});
                //     findWrap.css({left:-(baseWrapWidth)});
                // }
                
                // setSlideSize();
                
                
                var pnPoint = pageNation.find('a'),
                    pnFirst = pageNation.find('a:first'),
                    pnLast  = pageNation.find('a:last'),
                    pnCount = pageNation.find('a').length
                
                pnFirst.addClass('pnActive');  
                
                pnPoint.click(function() {
                    timerStop();
                    var showCont = pnPoint.index(this),
                        moveLeft = (imgWidth * showCont) + baseWrapWidth;
                    
                    findWrap.stop().animate({left:-(moveLeft)}, slideSpeed, slideEasing);
                    
                    pnPoint.removeClass('pnActive');
                    $(this).addClass('pnActive');
                    activePos();
                    timerStart();
                });
                
                function movePnNext() {
                    var setActive = pageNation.find('.pnActive'),
                        pnIndex   = pnPoint.index(setActive),
                        listCount = pnIndex + 1;
                    if (pnCount == listCount) {
                        setActive.removeClass('pnActive');
                        pnFirst.addClass('pnActive');
                    } else {
                        setActive.removeClass('pnActive').next().addClass('pnActive');
                    }
                }
                
                function movePnPrev() {
                    var setActive = pageNation.find('.pnActive'),
                        pnIndex   = pnPoint.index(setActive),
                        listCount = pnIndex + 1;
                    if (1 == listCount) {
                        setActive.removeClass('pnActive');
                        pnLast.addClass('pnActive');
                    } else {
                        setActive.removeClass('pnActive').prev().addClass('pnActive');
                    }
                }
                
                function activePos() {
                    var posActive = pageNation.find('.pnActive'),
                        posIndex = pnPoint.index(posActive);
                        findLi.removeClass('mainActive').eq(posIndex).addClass('mainActive');
                    
                }
                
                self.append('<a href="javascript:void(0);" class="ImageSlide__cover--main--btnPrev"></a><a href="javascript:void(0);" class="ImageSlide__cover--main--btnNext"></a>');
                
                var btnNext         = self.find('.ImageSlide__cover--main--btnNext'),
                    btnPrev        = self.find('.ImageSlide__cover--main--btnPrev'),
                    posResetNext    = -(baseWrapWidth) * 2,
                    posResetPrev     = -(baseWrapWidth) + (imgWidth);
                    
                function slideNavSize() {
                    var slideWidth  = self.width(),
                        btnSize     = ($(window).width() - slideWidth)/2;
                        
                    if($(window).width() > slideWidth) {
                        btnNext.css({right:-btnSize, width:btnSize, height:imgHeight});
                        btnPrev.css({left: -btnSize, width:btnSize, height:imgHeight});
                    }
                }
                
                slideNavSize();
                $(window).on('resize', function() {
                    slideNavSize();
                });
                
                
                function slideNext() {
                    findWrap.not(':animated').each(function() {
                        timerStop();
                        var posLeft = parseInt($(findWrap).css('left')),
                            moveLeft = posLeft-imgWidth;
                            
                        findWrap.stop().animate({left:(moveLeft)}, slideSpeed, slideEasing, function() {
                            var adjustLeft = parseInt($(findWrap).css('left'));
                            
                            if(adjustLeft <= posResetNext) {
                                findWrap.css({left: -(baseWrapWidth)});
                            }
                        });
                        
                        var setActive   = pageNation.find('.pnActive'),
                            pnIndex      = pnPoint.index(setActive),
                            listCount    = pnIndex + 1;
                        
                        if(pnCount == listCount) {
                            setActive.removeClass('pnActive');
                            pnFirst.addClass('pnActive');
                        } else {
                            setActive.removeClass('pnActive').next().addClass('pnActive');
                        }
                        activePos();
                        timerStart();
                    });
                }
                
                function slidePrev() {
                    findWrap.not(':animated').each(function() {
                        timerStop();
                        var posLeft = parseInt($(findWrap).css('left')),
                            moveLeft = posLeft+imgWidth;
                            
                        findWrap.stop().animate({left:(moveLeft)}, slideSpeed, slideEasing, function() {
                            var adjustLeft = parseInt($(findWrap).css('left'));
                            
                            if(adjustLeft >= posResetPrev) {
                                findWrap.css({left: posResetNext + imgWidth});
                            }
                        });
                        
                        var setActive   = pageNation.find('pnActive'),
                          pnIndex      = pnPoint.index(setActive) ,
                          listCount    = pnIndex + 1;
                        
                        if(1 == listCount) {
                            setActive.removeClass('pnActive');
                            pnLast.addClass('pnActive');
                        } else {
                            setActive.removeClass('pnActive').prev().addClass('pnActive');
                        }
                        activePos();
                        timerStart();
                    });
                }
                
                var startPosX;
                var startPosY;
                var touchState = false;
                
                // pageNation.on({
                //     'touchstart': function(e) {
                //         if(findWrap.is(':animated')) {
                //             e.preventDefault();
                //         } else {
                            // timerStop();
                            // startPosX    = e.originalEvent.changeTouches[0].pageX;
                            // startPosY    = e.originalEvent.changeTouches[0].pageY;
                            // startPosLeft = parseInt($(this).css('left'));
                                
                            // console.log('startTouchPosX' + startPosX);
                            // console.log('startTouchPosY' + startPosY);
                            // console.log('startPosLeft' + startPosLeft);
                    //         touchState = true;
                    //     }
                    // },
                    // 'touchmove': function(e) {
                    //     if(!touchState) {
                    //         return false;
                    //     }
                            // startPosX    = e.originalEvent.changeTouches[0].pageX;
                            // startPosY    = e.originalEvent.changeTouches[0].pageY;
                //         e.preventDefault();
                //         var slidePosLeft = startPosLeft - (startPosX - eventChangeTouches[0].pageX);
                //         $(this).css({left:slidePosLeft});
                            // console.log('startTouchPosX' + startPosX);
                            // console.log('startTouchPosY' + startPosY);
                    // },
                    // 'touchend': function(e) {
                    //     if(!touchState) {
                    //       return false;
                    //     }
                    //     touchState = false;
                       
                //       var leftPos = parseInt($(this).css('left'));
                       
                //       if (startPosLeft > leftPos) {
                //           var moveLeft = startPosLeft-imgWidth;
                //           findWrap.stop().animate({left:moveLeft}, slideSpeed, slideEasing, function(){
                //               var adjustLeft = parseInt($(findWrap).css('left'));
                //               if (adjustLeft <= posResetNext) {
                //                   findWrap.css({left: -(baseWrapWidth)});
                //               }
                //           });
                //           movePnNext();   
                //       } else if(startPosLeft < leftPos) {
                //           var moveLeft = startPosLeft + imgWidth;
                //           findWrap.stop().animate({left:moveLeft}, slideSpeed, slideEasing, function(){
                //               var adjustLeft = parseInt($(findWrap).css('left'));
                //               if (adjustLeft >= posResetNext) {
                //                   findWrap.css({left: posResetNext + imgWidth});
                //               }
                //           });
                //           movePnPrev();
                //       }
                //       activePos();
                //       timerStart();
                    // },
                    // 'mousedown': function(e) {
                    //     if(findWrap.is(':animated')) {
                    //         e.preventDefault();
                    //     } else {
                    //         // timerStop();
                    //         startPosX    = e.pageX;
                    //         startPosY    = e.pageY;
                            
                    //         console.log('startPosX' + startPosX);
                    //         console.log('startPosY' + startPosY);
                    //         touchState = true;
                    //     }
                    // },
                    // 'mousemove': function(e) {
                    //     if(!touchState) {
                    //         return false;
                    //     } else {
                    //         // timerStop();
                    //         startPosX    = e.pageX;
                    //         startPosY    = e.pageY;
                            
                    //         console.log('startPosX' + startPosX);
                    //         console.log('startPosY' + startPosY);
                    //     }
                    // },
                    // 'mouseup': function(e) {
                    //     if(!touchState) {
                    //         return false;
                    //     } else {
                            // timerStop();
                //             startPosX    = e.pageX;
                //             startPosY    = e.pageY;
                            
                //             console.log('startPosX' + startPosX);
                //             console.log('startPosY' + startPosY);
                //             touchState = false;
                //         }
                //     }
                // });
                
                btnNext.click(function(){slideNext();});
                btnPrev.click(function(){slidePrev();});
                
                function timerStart() {
                    slideTimer = setInterval(function() {
                        slideNext();
                    }, slideDelay);
                }
                
                timerStart();
                
                function timerStop() {
                    clearInterval(slideTimer);
                }
            }
            
            self.css({visibility:'visible', opacity:'0'}).animate({opacity:'1'}, openingFade);
                
            $(window).on('load resize', function() {
                var reSizeRate = 0;
                //イメージ画像の変更
                if (findImg.width() > $(window).width()) {
                    findImg.width($(window).width());
                    reSizeRate = findImage.width() / $(window).width();
                    
                    console.log('reSizeRate' + reSizeRate);
                } else if (findImg.width() < $(window).width()) {
                    findImg.width(slideMaxWidth);
                }
                
                console.log('AAAAA');
                
                //リサイズ時の再計算
                baseWrapWidth = imgWidth * findLiCount,
                allWrapWidth  = imgWidth * allListCount;
                    
                findWrap.css({left:-(baseWrapWidth), width:allWrapWidth, height:imgHeight});
                findWrap.find('ul').css({width:baseWrapWidth,height:imgHeight});
                //     timerStop();
                //     //setSlideSize();
                    
                //     var posActive = pageNation.find('.pnActive'),
                //         setNum    = pnPoint.index(posActive),
                //         moveLeft  = ((imgWidth) * (setNum)) + baseWrapWidth;
                    
                //     findWrap.css({left: -(moveLeft)});
                    
                //     timerStart();
            });
        });
     });
});