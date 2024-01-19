(function()
{
        // tool tips
            $('.tooltips').tooltip();

        // popovers
            $('.popovers').popover();
        $('<i id="back-to-top"></i>').appendTo($('body'));

        $(window).scroll(function() {

            if($(this).scrollTop() != 0) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }

        });

        $('#back-to-top').click(function() {
            $('body,html').animate({scrollTop:0},600);
        });

        $("#submitComment").on("click", function () {
            var formData = $("#commentForm").serialize();

            $.ajax({
                type: "POST",
                url: "/comments/store",
                data: formData,
                success: function (data) {
                    $('#commentTextarea').val('');
                    showModal(data.message);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        $(".copyButton").click(function () {
            var $textToCopy = $(this).closest('div').find('.textToCopy');
            var textToCopy = $textToCopy.text();
            copyTextToClipboard(textToCopy);
        });
})();

function showModal(message) {
    $('#myModal').find('.modal-body').text(message);
    $('#myModal').modal('show');
}

function handleSearchKeyPress(event, input) {
    if (event.key === 'Enter') {
        event.preventDefault();

        if (validateSearch(input)) {
            input.closest('.search-form').submit();
        }
    }
}

function validateSearch(input) {
    var searchTerm = input.value.trim();

    if (searchTerm.length < 4) {
        $('#myModal').find('.modal-body').text('Введіть не менше 4 символів для пошуку');
        $('#myModal').modal('show');

        $('#myModal').on('hidden.bs.modal', function () {
            input.focus();
        });

        return false;
    }

    return true;
}

function copyTextToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
    }).catch(function(err) {
        alert('Unable to copy text to clipboard', err);
    });
}
