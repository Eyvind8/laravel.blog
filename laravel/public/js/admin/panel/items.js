var currentTagVar;

$(document).ready(function()
{
    // begin двойной клик по слову в текстареа добавлет слово в тег
    var textarea = document.getElementById('contentTextarea');
    var tagsInput = $('#tags-input');

    textarea.addEventListener('dblclick', function () {
        var selectedWord = getSelectedWord();
        if (selectedWord) {
            addWordToTagsInput(selectedWord);
        }
    });

    function getSelectedWord() {
        var selectedText = textarea.value.substring(textarea.selectionStart, textarea.selectionEnd);
        return selectedText.trim();
    }

    function addWordToTagsInput(word) {
        tagsInput.tagsinput('add', word);
    }
    // end

    // по двойному клику на теге открівается диалоговое окно для редактирования
    $(document).on('dblclick', '.bootstrap-tagsinput .tag', function () {
        var currentTag = $(this).text().trim();
        openEditDialog(currentTag);
    });

    // удаление єлемента
    $('.delete-item').on('click', function(event) {
        event.preventDefault();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this item!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var itemId = $(this).data('item-id');

                $.ajax({
                    url: '/admin/items/' + itemId,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        if (data.result === true) {
                            $('#item-js-' + itemId).remove();
                            alertify.set('notifier','position', 'top-right');
                            alertify.success('Success remove item.', 'custom', 3, function(){}).dismissOthers();
                        } else {
                            alertify.set('notifier','position', 'top-right');
                            alertify.warning('Failed to delete item', 'custom', 3, function(){}).dismissOthers();
                        }
                    },
                    error: function(xhr, status, error) {
                        alertify.set('notifier','position', 'top-right');
                        alertify.error('Error AJAX-request: ' + status + ', ' + error, 'custom', 3, function(){}).dismissOthers();
                    }
                });
            }
        });
    });
});


/* ===================  EDIT TAG ================= */
function handleKeyPressEditTag(event) {
    if (event.key === 'Enter') {
        saveEditedTag();
    }
}

function openEditDialog(currentTag) {
    currentTagVar = currentTag;
    document.getElementById('editTagInput').value = currentTag;
    document.getElementById('editDialog').style.display = 'block';
    document.getElementById('editTagInput').focus();
}

function saveEditedTag() {
    var newTag = document.getElementById('editTagInput').value;
    $('#tags-input').tagsinput('remove', currentTagVar);
    $('#tags-input').tagsinput('add', newTag);
    closeEditDialog();
}

function closeEditDialog() {
    document.getElementById('editDialog').style.display = 'none';
}

/* ===================  EDIT TAG END ================= */


