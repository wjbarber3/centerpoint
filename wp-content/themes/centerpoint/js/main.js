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

jQuery(document).ready(function() {
    Slider.init();
    Feed.init();
})