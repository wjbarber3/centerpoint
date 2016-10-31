(function($){

    /*
    |--------------------------------------------------------------------------
    | Header Functionality
    |--------------------------------------------------------------------------
    | This object houses any functionality associated with the header
    |
    */
    Header = {
        mobileNavTrigger: 'header .mobile-menu-trigger',
        mobileMenu: 'header .menu-main-nav-container',
        init: function() {
            $(this.mobileNavTrigger).click(this.toggleMenu.bind(this));
        },
        toggleMenu: function() {
            console.log("click");
            $(this.mobileMenu).toggle();
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Slider Module
    |--------------------------------------------------------------------------
    | This object houses functionality for the main slider module
    |
    */
    Slider = {
        slideWrap: ".slider ul",
        slide: ".slider ul li",
        prevTrigger: ".slider a.prev",
        nextTrigger: ".slider a.next",
        control: ".slider a.control",
        init: function() {
            $(this.nextTrigger).click(this.moveRight.bind(this));
            $(this.prevTrigger).click(this.moveLeft.bind(this));
        },
        moveRight: function(e) {
            e.preventDefault();
            $(this.slideWrap).removeClass("no-transition");
            $(this.slide).first().clone().appendTo(this.slideWrap);
            $(this.slideWrap).css("marginLeft", "-100vw");
            $(this.control).css("pointer-events", "none");
            setTimeout(function(){
                $(".slider ul").addClass("no-transition");
                $(".slider ul li").first().remove();
                $(".slider ul").css("marginLeft", "0px");
                $("a.control").css("pointer-events", "auto");
            }, 500);
        },
        moveLeft: function(e) {
            e.preventDefault();
            $(this.slideWrap).addClass('no-transition');
            $(this.slide).last().clone().prependTo(this.slideWrap);
            $(this.slideWrap).css("marginLeft", "-100vw");
            $(this.control).css("pointer-events", "none");
            setTimeout(function () {
                $('.slider ul').removeClass("no-transition");
                $('.slider ul').css("marginLeft", "0px");
            }, 10);
            setTimeout(function(){
                $('.slider ul').addClass('no-transition');
                $('.slider ul li').last().remove();
                $('a.control').css('pointer-events', 'auto');
            }, 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Twitter Feed
    |--------------------------------------------------------------------------
    | This object houses functionality for Twitter Feed Slider
    |
    */
    Feed = {
        tweet: '#twitter-feed ul li',
        tweetWrap: '#twitter-feed ul',
        prevTrigger: "#twitter-feed a.prev",
        nextTrigger: "#twitter-feed a.next",
        control: "#twitter-feed a.control",
        init: function() {
            $(this.nextTrigger).click(this.slideRight.bind(this));
            $(this.prevTrigger).click(this.slideLeft.bind(this));
        },
        slideRight: function(e) {
            e.preventDefault();
            $("#twitter-feed ul li.active").removeClass("active").next().addClass("active");
            $(this.tweetWrap).removeClass("no-transition");
            $(this.tweet).first().clone().appendTo(this.tweetWrap);
            $(this.tweetWrap).css("marginLeft", "-100vw");
            $(this.control).css("pointer-events", "none");
            setTimeout(function(){
                $("#twitter-feed ul").addClass("no-transition");
                $("#twitter-feed ul li").first().remove();
                $("#twitter-feed ul").css("marginLeft", "0px");
                $("a.control").css("pointer-events", "auto");
            }, 300);
        },
        slideLeft: function(e) {
            e.preventDefault();
            $(this.tweet).removeClass("active").last().addClass("active");
            $(this.tweetWrap).addClass("no-transition");
            $(this.tweet).last().clone().prependTo(this.tweetWrap);
            $(this.tweetWrap).css("marginLeft", "-100vw");
            $(this.control).css("pointer-events", "none");
            setTimeout(function () {
                $('#twitter-feed ul').removeClass("no-transition");
                $('#twitter-feed ul').css("marginLeft", "0px");
            }, 10);
            setTimeout(function(){
                $('#twitter-feed ul').addClass('no-transition');
                $('#twitter-feed ul li').last().remove();
                $('a.control').css('pointer-events', 'auto');
            }, 300);

        }
    }

    /*
    |--------------------------------------------------------------------------
    | JumpLinks
    |--------------------------------------------------------------------------
    | This object contains functionality for JumpLinks across the site
    |
    */
    JumpLinks = {
        jumpTrigger: '.jump-links nav a',
        init: function() {
            $(this.jumpTrigger).click(this.jumpOpen.bind(this));
        },
        jumpOpen: function(e) {
            e.preventDefault();
            var target = $(e.target);
            $(this.jumpTrigger).removeClass("current");
            target.addClass("current");
            var target = $(e.target),
                targetJump = target.attr("href"),
                matchingAccordion = $(targetJump),
                matchingList = matchingAccordion.next(),
                offset = matchingAccordion.offset().top-20;
            $("html, body").animate({
                scrollTop: offset
            }, 500);
            matchingList.slideDown("fast");
            matchingAccordion.addClass("open");
            matchingAccordion.children("i").addClass("fa-minus-circle");
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Team List
    |--------------------------------------------------------------------------
    | This object houses any functionality the accordions encapsulating team
    | members and bios
    |
    */
    Team = {
        teamList: '.team-list',
        listTrigger: 'a.list-trigger',
        triggerIcon: 'a.list-trigger i',
        init: function() {
            $(this.listTrigger).click(this.showList.bind(this));
        },
        showList: function(e) {
            e.preventDefault();
            $(this.triggerIcon).removeClass("fa-minus-circle");
            var target = $(e.target),
                clickedTrigger = target.closest(this.listTrigger);
                siblingList = clickedTrigger.next();
            if (clickedTrigger.hasClass("open")) {
                siblingList.slideUp("fast");
                clickedTrigger.removeClass("open");
            } else {
                clickedTrigger.addClass("open");
                $(this.listTrigger).not(clickedTrigger).removeClass("open");
                $(this.teamList).not(siblingList).slideUp("fast");
                siblingList.slideDown("fast");
                $("a.list-trigger.open i").addClass("fa-minus-circle");
            }
            var offset = target.offset().top-20;
            $("html, body").animate({
                scrollTop: offset
            }, 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Ajax Bios
    |--------------------------------------------------------------------------
    | This object contains all functionality for showing single post team
    | member bios in an Ajax modal
    |
    */
    AjaxPost = {
        postTrigger: '.post-trigger',
        ajaxModal: '#post-modal',
        loader: '<i class="fa fa-spin fa-spinner"></i>',
        overlay: '#full-overlay',
        closeTrigger: '#post-modal .close',
        body: 'body',
        init: function() {
            $(this.postTrigger).click(this.loadPost.bind(this));
            $.ajaxSetup({cache:false});
            $(this.body).on("click", this.closeTrigger, this.closePost.bind(this));
        },
        loadPost: function(e) {
            e.preventDefault();
            var target = $(e.target),
                targetLink = target.closest(this.postTrigger);
                targetID = targetLink.data("id");
            $(this.ajaxModal).addClass("active").append(this.loader);
            $(this.ajaxModal).load("/employee/" + targetID);
            $(this.overlay).fadeIn();
            $(this.ajaxModal).show();
            $(this.body).css("overflow", "hidden");
        },
        closePost: function() {
            $(this.overlay).fadeOut();
            $(this.ajaxModal).hide();
            $(this.ajaxModal).empty();
            $(this.body).css("overflow", "auto");
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Web Assessment Services
    |--------------------------------------------------------------------------
    | This object holds functionality for the web assessment services page
    |
    */
    ServicesSlider = {
        servicesTrigger: '.services-links a',
        serviceLinks: '.services-links li',
        servicesSlide: '.content-area li',
        prevArrow: '.service-arrow.prev',
        nextArrow: '.service-arrow.next',
        slideTitle: '.title-area h2.title',
        init: function() {
            $(this.servicesTrigger).click(this.updateSlide.bind(this));
            $(this.prevArrow).click(this.prevSlide.bind(this));
            $(this.nextArrow).click(this.nextSlide.bind(this));
        },
        updateSlide: function(e) {
            e.preventDefault();
            var target = $(e.target),
                targetParent = target.parent(),
                targetIndex = targetParent.index(this.serviceLinks),
                neededIndex = targetIndex + 1,
                targetText = target.text(),
                triggerCount = $(this.servicesTrigger).length;
            $(this.servicesTrigger).removeClass("current");
            target.addClass("current");
            $(this.slideTitle).text(targetText);
            $(this.servicesSlide).removeClass("active");
            $(this.servicesSlide).eq(targetIndex).addClass("active");
            if ( neededIndex == triggerCount ) {
                $(this.nextArrow).css({
                    "opacity":".2",
                    "pointer-events":"none"
                });
            } else {
                $(this.nextArrow).css({
                    "opacity":"1",
                    "pointer-events":"auto"
                });
            }
            if ( neededIndex > 1 ) {
                $(this.prevArrow).css({
                    "opacity":"1",
                    "pointer-events":"auto"
                });
            } else {
                $(this.prevArrow).css({
                    "opacity":".2",
                    "pointer-events":"none"
                });
            }
        },
        prevSlide: function(e) {
            e.preventDefault();
            var currentLink = $('.services-links a.current'),
                currentSlide = $('.content-area li.active'),
                currentParent = currentLink.parent(),
                nextParent = currentParent.prev(),
                nextParentIndex = nextParent.index(this.serviceLinks),
                neededIndex = nextParentIndex + 1,
                nextTrigger = currentParent.prev().find('a'),
                nextSlide = currentSlide.prev(),
                activeTitle = nextTrigger.text(),
                triggerCount = $(this.servicesTrigger).length;
            currentLink.removeClass("current");
            nextTrigger.addClass("current");
            $(this.servicesSlide).removeClass("active");
            nextSlide.addClass("active");
            $(this.slideTitle).text(activeTitle);
            if ( neededIndex > 1 ) {
                $(this.prevArrow).css({
                    "opacity":"1",
                    "pointer-events":"auto"
                });
            } else {
                $(this.prevArrow).css({
                    "opacity":".2",
                    "pointer-events":"none"
                });
            };
            if ( neededIndex != triggerCount ) {
                $(this.nextArrow).css({
                    "opacity":"1",
                    "pointer-events":"auto"
                });
            }
        },
        nextSlide: function(e) {
            e.preventDefault();
            var currentLink = $('.services-links a.current'),
                currentSlide = $('.content-area li.active'),
                currentParent = currentLink.parent(),
                nextParent = currentParent.next(),
                nextParentIndex = nextParent.index(this.serviceLinks),
                neededIndex = nextParentIndex + 1,
                firstItem = $(this.serviceLinks).first(),
                nextTrigger = currentParent.next().find('a'),
                nextSlide = currentSlide.next(),
                activeTitle = nextTrigger.text(),
                triggerCount = $(this.servicesTrigger).length;
            currentLink.removeClass("current");
            nextTrigger.addClass("current");
            $(this.servicesSlide).removeClass("active");
            nextSlide.addClass("active");
            $(this.slideTitle).text(activeTitle);
            if ( currentParent != firstItem ) {
                $(this.prevArrow).css({
                    "opacity":"1",
                    "pointer-events":"auto"
                });
            } else {
                $(this.prevArrow).css({
                    "opacity":".2",
                    "pointer-events":"none"
                });
            };
            if ( neededIndex == triggerCount ) {
                $(this.nextArrow).css({
                    "opacity":".2",
                    "pointer-events":"none"
                });
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Accordions
    |--------------------------------------------------------------------------
    | Basic accordion functionality throughout the site
    |
    */
    Accordion = {
        trigger: '.accordion-trigger',
        hiddenContent: '.hidden-content',
        init: function() {
            $(this.trigger).click(this.toggleContent.bind(this));
        },
        toggleContent: function(e) {
            e.preventDefault();
            var target = $(e.target),
                targetContent = target.siblings(this.hiddenContent);
            target.toggleClass('toggled');
            targetContent.slideToggle("fast");
            if ( target.hasClass('toggled') ) {
                target.html("Less<i class='fa fa-minus'></i>");
            } else {
                target.html("More<i class='fa fa-plus'></i>")
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | What We DO
    |--------------------------------------------------------------------------
    | This object houses funcationality on the 'what we do' page
    |
    */
    WhatWeDo = {
        trigger: '.slide-triggers li',
        slide: '.what-we-do-content .slide',
        mobileTrigger: '.mobile-menu-trigger',
        mobileMenu: '.what-we-do-content .slide-triggers',
        menuArrow: '.mobile-menu-trigger i',
        init: function() {
            $(this.trigger).click(this.showSlide.bind(this));
            $(this.mobileTrigger).click(this.toggleMenu.bind(this));
        },
        showSlide: function(e) {
            var target = $(e.target),
                targetIndex = target.index(this.trigger);
            $(this.trigger).removeClass("active");
            target.addClass("active");
            $(this.slide).hide();
            $(this.slide).eq(targetIndex).fadeIn();
        },
        toggleMenu: function() {
            $(this.mobileMenu).slideToggle();
            $(this.menuArrow).toggleClass("flipped");
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Twitter Fetcher
    |--------------------------------------------------------------------------
    | Customizations to the Twitter Feed pulled in with twitterFetcher.js
    |
    */
    var configProfile = {
      "profile": {"screenName": 'PARCCPlace'},
      "domId": 'twitter-feed-list',
      "maxTweets": 5,
      "enableLinks": true, 
      "showUser": false,
      "showTime": false,
      "showImages": false,
      "lang": 'en',
      "showRetweet": false,
      "showInteraction": false
    };

    $(document).ready(function() {
        Header.init();
        Slider.init();
        JumpLinks.init();
        Team.init();
        AjaxPost.init();
        ServicesSlider.init();
        Accordion.init();
        WhatWeDo.init();
        if($('#twitter-feed').length) {
            twitterFetcher.fetch(configProfile);
            Feed.init();
        }
    })

})(jQuery);