Header = {
    mobileNavTrigger: 'header .mobile-menu-trigger',
    mobileMenu: 'header .menu-main-nav-container',
    init: function() {
        jQuery(this.mobileNavTrigger).click(this.toggleMenu.bind(this));
    },
    toggleMenu: function() {
        console.log("click");
        jQuery(this.mobileMenu).toggle();
    }
}

Slider = {
    slideWrap: ".slider ul",
    slide: ".slider ul li",
    prevTrigger: ".slider a.prev",
    nextTrigger: ".slider a.next",
    control: ".slider a.control",
    init: function() {
        jQuery(this.nextTrigger).click(this.moveRight.bind(this));
        jQuery(this.prevTrigger).click(this.moveLeft.bind(this));
    },
    moveRight: function(e) {
        e.preventDefault();
        jQuery(this.slideWrap).removeClass("no-transition");
        jQuery(this.slide).first().clone().appendTo(this.slideWrap);
        jQuery(this.slideWrap).css("marginLeft", "-100vw");
        jQuery(this.control).css("pointer-events", "none");
        setTimeout(function(){
            jQuery(".slider ul").addClass("no-transition");
            jQuery(".slider ul li").first().remove();
            jQuery(".slider ul").css("marginLeft", "0px");
            jQuery("a.control").css("pointer-events", "auto");
        }, 500);
    },
    moveLeft: function(e) {
        e.preventDefault();
        jQuery(this.slideWrap).addClass('no-transition');
        jQuery(this.slide).last().clone().prependTo(this.slideWrap);
        jQuery(this.slideWrap).css("marginLeft", "-100vw");
        jQuery(this.control).css("pointer-events", "none");
        setTimeout(function () {
            jQuery('.slider ul').removeClass("no-transition");
            jQuery('.slider ul').css("marginLeft", "0px");
        }, 10);
        setTimeout(function(){
            jQuery('.slider ul').addClass('no-transition');
            jQuery('.slider ul li').last().remove();
            jQuery('a.control').css('pointer-events', 'auto');
        }, 500);
    }
}

Feed = {
    tweet: '.twitter-feed ul li',
    tweetWrap: '.twitter-feed ul',
    prevTrigger: ".twitter-feed a.prev",
    nextTrigger: ".twitter-feed a.next",
    control: ".twitter-feed a.control",
    init: function() {
        jQuery(this.nextTrigger).click(this.slideRight.bind(this));
        jQuery(this.prevTrigger).click(this.slideLeft.bind(this));
    },
    slideRight: function(e) {
        e.preventDefault();
        jQuery(".twitter-feed ul li.active").removeClass("active").next().addClass("active");
        jQuery(this.tweetWrap).removeClass("no-transition");
        jQuery(this.tweet).first().clone().appendTo(this.tweetWrap);
        jQuery(this.tweetWrap).css("marginLeft", "-100vw");
        jQuery(this.control).css("pointer-events", "none");
        setTimeout(function(){
            jQuery(".twitter-feed ul").addClass("no-transition");
            jQuery(".twitter-feed ul li").first().remove();
            jQuery(".twitter-feed ul").css("marginLeft", "0px");
            jQuery("a.control").css("pointer-events", "auto");
        }, 300);
    },
    slideLeft: function(e) {
        e.preventDefault();
        jQuery(this.tweet).removeClass("active").last().addClass("active");
        jQuery(this.tweetWrap).addClass("no-transition");
        jQuery(this.tweet).last().clone().prependTo(this.tweetWrap);
        jQuery(this.tweetWrap).css("marginLeft", "-100vw");
        jQuery(this.control).css("pointer-events", "none");
        setTimeout(function () {
            jQuery('.twitter-feed ul').removeClass("no-transition");
            jQuery('.twitter-feed ul').css("marginLeft", "0px");
        }, 10);
        setTimeout(function(){
            jQuery('.twitter-feed ul').addClass('no-transition');
            jQuery('.twitter-feed ul li').last().remove();
            jQuery('a.control').css('pointer-events', 'auto');
        }, 300);

    }
}

JumpLinks = {
    jumpTrigger: '.jump-links nav a',
    init: function() {
        jQuery(this.jumpTrigger).click(this.jumpOpen.bind(this));
    },
    jumpOpen: function(e) {
        e.preventDefault();
        var target = jQuery(e.target),
            targetJump = target.attr("href"),
            matchingAccordion = jQuery(targetJump),
            matchingList = matchingAccordion.next(),
            offset = matchingAccordion.offset().top-20;
        jQuery("html, body").animate({
            scrollTop: offset
        }, 500);
        matchingList.slideDown("fast");
        matchingAccordion.addClass("open");
        matchingAccordion.children("i").addClass("fa-minus-circle");
    }
}

Team = {
    teamList: '.team-list',
    listTrigger: 'a.list-trigger',
    triggerIcon: 'a.list-trigger i',
    init: function() {
        jQuery(this.listTrigger).click(this.showList.bind(this));
    },
    showList: function(e) {
        e.preventDefault();
        jQuery(this.triggerIcon).removeClass("fa-minus-circle");
        var target = jQuery(e.target),
            clickedTrigger = target.closest(this.listTrigger);
            siblingList = clickedTrigger.next();
        if (clickedTrigger.hasClass("open")) {
            siblingList.slideUp("fast");
            clickedTrigger.removeClass("open");
        } else {
            clickedTrigger.addClass("open");
            jQuery(this.listTrigger).not(clickedTrigger).removeClass("open");
            jQuery(this.teamList).not(siblingList).slideUp("fast");
            siblingList.slideDown("fast");
            jQuery("a.list-trigger.open i").addClass("fa-minus-circle");
        }
        var offset = target.offset().top-20;
        jQuery("html, body").animate({
            scrollTop: offset
        }, 500);
    }
}

AjaxPost = {
    postTrigger: '.post-trigger',
    ajaxModal: '#post-modal',
    loader: '<i class="fa fa-spin fa-spinner"></i>',
    overlay: '#full-overlay',
    closeTrigger: '#post-modal .close',
    body: 'body',
    init: function() {
        jQuery(this.postTrigger).click(this.loadPost.bind(this));
        jQuery.ajaxSetup({cache:false});
        jQuery(this.body).on("click", this.closeTrigger, this.closePost.bind(this));
    },
    loadPost: function(e) {
        e.preventDefault();
        var target = jQuery(e.target),
            targetLink = target.closest(this.postTrigger);
            targetID = targetLink.data("id");
        jQuery(this.ajaxModal).addClass("active").append(this.loader);
        jQuery(this.ajaxModal).load("/employee/" + targetID);
        jQuery(this.overlay).fadeIn();
        jQuery(this.ajaxModal).show();
        jQuery(this.body).css("overflow", "hidden");
    },
    closePost: function() {
        jQuery(this.overlay).fadeOut();
        jQuery(this.ajaxModal).hide();
        jQuery(this.ajaxModal).empty();
        jQuery(this.body).css("overflow", "auto");
    }
}

ServicesSlider = {
    servicesTrigger: '.services-links a',
    servicesSlide: '.content-area li',
    servicesTitle: '.title-area h2',
    init: function() {
        jQuery(this.servicesTrigger).click(this.updateSlide);
    },
    updateSlide: function(e) {
        e.preventDefault();
        console.log('click');
    }
}

Accordion = {
    trigger: '.accordion-trigger',
    hiddenContent: '.hidden-content',
    init: function() {
        jQuery(this.trigger).click(this.toggleContent.bind(this));
    },
    toggleContent: function(e) {
        e.preventDefault();
        var target = jQuery(e.target),
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

jQuery(document).ready(function() {
    Header.init();
    Slider.init();
    Feed.init();
    JumpLinks.init();
    Team.init();
    AjaxPost.init();
    ServicesSlider.init();
    Accordion.init();
})

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
twitterFetcher.fetch(configProfile);