Slider = {
    slideWrap: "#slider ul",
    slide: "#slider ul li",
    prevTrigger: "#slider a.prev",
    nextTrigger: "#slider a.next",
    control: "#slider a.control",
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
            jQuery("#slider ul").addClass("no-transition");
            jQuery("#slider ul li").first().remove();
            jQuery("#slider ul").css("marginLeft", "0px");
            jQuery("a.control").css("pointer-events", "auto");
        }, 500);
    },
    moveLeft: function(e) {
        e.preventDefault();
        jQuery(this.slideWrap).removeClass("no-transition");
        jQuery(this.slide).last().clone().prependTo(this.slideWrap);
        jQuery(this.slideWrap).css("marginLeft", "100vw");
        setTimeout(function(){
            jQuery('#slider ul').addClass('no-transition');
            jQuery('#slider ul li').last().remove();
            jQuery('#slider ul').css("marginLeft", "0px");
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
            siblingList.slideDown("fast");
            jQuery("a.list-trigger.open i").addClass("fa-minus-circle");
        }
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
        return false;
    },
    closePost: function() {

        jQuery(this.overlay).fadeOut();
        jQuery(this.ajaxModal).hide();
        jQuery(this.ajaxModal).empty();
    }
}

jQuery(document).ready(function() {
    Slider.init();
    Feed.init();
    Team.init();
    AjaxPost.init();
})