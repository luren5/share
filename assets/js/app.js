(function($) { //{{{
    $.cookie = function(key, value, options) {

        // key and at least value given, set cookie...
        if (arguments.length > 1 && (!/Object/.test(Object.prototype.toString.call(value)) || value === null || value === undefined)) {
            options = $.extend({}, options);

            if (value === null || value === undefined) {
                options.expires = -1;
            }

            if (typeof options.expires === 'number') {
                var days = options.expires,
                    t = options.expires = new Date();
                t.setDate(t.getDate() + days);
            }

            value = String(value);

            return (document.cookie = [
                encodeURIComponent(key), '=', options.raw ? value : encodeURIComponent(value), options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
                options.path ? '; path=' + options.path : '', options.domain ? '; domain=' + options.domain : '', options.secure ? '; secure' : ''
            ].join(''));
        }

        // key and possibly options given, get cookie...
        options = value || {};
        var decode = options.raw ? function(s) {
                return s;
            } : decodeURIComponent;

        var pairs = document.cookie.split('; ');
        for (var i = 0, pair; pair = pairs[i] && pairs[i].split('='); i++) {
            if (decode(pair[0]) === key) return decode(pair[1] || ''); // IE saves cookies with empty string as "c; ", e.g. without "=" as opposed to EOMB, thus pair[1] may be undefined
        }
        return null;
    };
})(jQuery); //}}}

(function() {
    var tpls = {
        msg: '<div class="msg-global">${msg}</div>'
    };

    function msg(str, time, callback) {
        var el = $(tpls.msg.replace(/\$\{msg\}/g, str));

        el.appendTo(document.body).css({
            display: 'none',
            top: $(document.body).scrollTop() + 200,
            left: ($(document.body).width() - el.width()) / 2
        }).slideDown();

        setTimeout(function() {
            el.slideUp();
        }, 3000);

        if (time > 0) {
            setTimeout(callback, time);
        }

    }

    window.$msg = msg;

    $('#j-write form').submit(function(evt) {
        if ($.trim($('#j-write form textarea').val()) == '') {
            msg('请输入内容哦 :)');
            return false;
        }

        var mailReg = /^([\!#\$%&'\*\+/\=?\^`\{\|\}~a-zA-Z0-9_-]+[\.]?)+[\!#\$%&'\*\+/\=?\^`\{\|\}~a-zA-Z0-9_-]+@{1}((([0-9A-Za-z_-]+)([\.]{1}[0-9A-Za-z_-]+)*\.{1}([A-Za-z]){1,6})|(([0-9]{1,3}[\.]{1}){3}([0-9]{1,3}){1}))$/;

        if ($.trim($('#j-write form input[name=mail]').val()) && !mailReg.test($('#j-write form input[name=mail]').val())) {
            msg('请输入正确的邮件哦 :)');
            return false;
        }

        $('#j-write input[type=submit]').attr('disabled', true);

        $.ajax(this.action, {
            type: 'post',
            data: $(this).serialize(),
            success: function(d) {
                $('#j-write input[type=submit]').attr('disabled', false);
                if (d.code) {
                    msg(d.msg);
                } else {
                    msg(d.msg)

                    setTimeout(function() {
                        location.href = '/post/' + d.pid;

                        $('#j-write form input.title').val('');
                        $('#j-write form textarea').val('');
                    }, 3000);
                }
            }
        });
        return false;
    });

    $('.content-like a').on('click', function(evt) {
        if (!PAGE_ISLOGIN) {
            location.href = '/u/login?jump=' + encodeURIComponent(location.href);
            return false;
        }

        var el = $(this),
            url = el.attr('data-url').replace(/\d$/, '');

        if (el.hasClass('like')) {
            url = el.hasClass('had') ? url + 0 : url + 1;
            el.children('span').html(parseInt(el.children('span').html(), 10) + (el.hasClass('had') ? -1 : 1));
            el.toggleClass('had');

            if ($('.content-like a.dislike').hasClass('had')) {
                $('.content-like a.dislike').children('span').html($('.content-like a.dislike').children('span').html() - 1);
                $('.content-like a.dislike').removeClass('had');

            }
        }

        if (el.hasClass('dislike')) {
            url = el.hasClass('had') ? url + 0 : url + '-1';
            el.children('span').html(parseInt(el.children('span').html(), 10) + (el.hasClass('had') ? -1 : 1));
            el.toggleClass('had');

            if ($('.content-like a.like').hasClass('had')) {
                $('.content-like a.like').children('span').html($('.content-like a.like').children('span').html() - 1);
                $('.content-like a.like').removeClass('had');

            }
        }


        $.ajax(url, {
            success: function(d) {
                if (d.code) {
                    msg(d.msg);
                }
            }
        });

        return false;
    });

    $('.content-reply form').submit(function(evt) {
        if ($.trim($('.content-reply form textarea').val()) == '') {
            msg('请输入回复内容 :)');
            return false;
        }

        var that = this;

        $.ajax(this.action, {
            type: 'post',
            data: $(this).serialize(),
            success: function(d) {
                if (d.code) {
                    msg(d.msg);
                } else {
                    msg(d.msg);

                    $(d.reply.content).appendTo('.reply-list');
                    $('.content-reply form textarea').val('');
                }
            }
        });
        return false;
    });

    $(function() {
        if (!$.cookie('guide')) {
            $('li.news span.tip-msg').fadeIn().fadeOut().fadeIn();
            $.cookie('guide', 1);
        }
    });

    //	$(function() {
    //        if(location.hash && location.hash.indexOf('access_token') > -1 ) {
    //           var hash = location.hash.split('&');
    //           var access_token = hash[0].split('=')[1]; 
    //           var expires_in = hash[1].split('=')[1]; 
    //		   $.cookie('access_token', access_token, { expires : 90 } );
    //           //setTimeout(function(){
    //           //    window.opener.location.reload();
    //           //    window.close();
    //           //}, 0)
    //        }
    //	});


    $(function() {
        if ($('.control-group textarea[name=content]').length) {
            $('.control-group textarea[name=content]').focus();
        }
    });

    //tag区域的点选 
    $(function() {
        $('.tags-selector span').click(function() {
            var input = $('input[name=tags]')[0],
                arry = input.value.split(/,|，| |　/),
                flag = false,
                that = this;

            $.each(arry, function(i, v) {
                if (v == that.innerHTML) {
                    flag = true;
                }
            });

            if (!flag) input.value = input.value + ' ' + this.innerHTML;
        });
    });

    function focusToPosition(self, position) {
        if (position === undefined) {
            position = self.value.length
        }

        if (self.setSelectionRange) {
            self.focus();
            self.setSelectionRange(self.value.length, position)
        } else {
            if (self.createTextRange) {
                var range = self.createTextRange();
                range.moveStart("character", position);
                range.collapse(true);
                range.select();
                self.focus()
            } else {
                self.focus()
            }
        }
    }


    //回复 
    $(function() {
        $('.comment a').click(function() {
            var html = $(this).parents('.reply-item').find('.floor').html(),
                el = $('textarea[name=content]'),
                oldVal = el.val();

            el.val('@' + html + ' ' + oldVal);

            focusToPosition(el[0], el.val().length);
        });
    });
})();
