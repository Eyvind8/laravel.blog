$(document).ready(function() {
    // по двойному клику добавляется слово в тег
    $(document).on('dblclick', '.content-textarea', function () {
        var selectedWord = getSelectedWord(this);

        if (selectedWord) {
            var tagsInput = $(this).closest('.row-item').find('.taggable-input');
            addWordToTagsInput(selectedWord, tagsInput);
        }
    });

    // Обработчик двойного клика для открытия диалогового окна редактирования
    $(document).on('dblclick', '.bootstrap-tagsinput .tag', function () {
        openEditDialog(this);
    });

    // Удаление элемента
    $(document).on('click', '.delete-item', function(event) {
        event.preventDefault();
        var itemId = $(this).data('item-id');

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this item!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '/admin/items/' + itemId,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        if (data.result === true) {
                            $('#item-js-' + itemId).remove();
                            alertify.success('Success remove item.');
                        } else {
                            alertify.warning('Failed to delete item');
                        }
                    },
                    error: function(xhr, status, error) {
                        alertify.error('Error AJAX-request: ' + status + ', ' + error);
                    }
                });
            }
        });
    });
});

// Определение выбранного слова в текстареа
function getSelectedWord(textarea) {
    var selectedText = textarea.value.substring(textarea.selectionStart, textarea.selectionEnd);
    return selectedText.trim();
}

// Добавление слова в тег
function addWordToTagsInput(word, taggableInput) {
    taggableInput.tagsinput('add', word);
}

function handleKeyPressEditTag(event) {
    if (event.key === 'Enter') {
        saveEditedTag();
    }
}

// Открытие диалогового окна редактирования
function openEditDialog(tagInput) {
    var currentTag = $(tagInput).text().trim();
    var tagParent = $(tagInput).closest('.tags-item-block');  // Находим родительский элемент с классом .tag
    var tagId = tagParent.find('.taggable-input').attr('id');  // Затем находим .taggable-input внутри родительского элемента
    var dialog = $('#editDialog');
    dialog.find('#edit-tag-input').val(currentTag);
    dialog.data('tag-id', tagId);
    dialog.data('current-tag', currentTag); // Добавляем атрибут data-current-tag
    dialog.modal('show');
    dialog.find('#edit-tag-input').focus();
}

// Сохранение отредактированного тега
function saveEditedTag() {
    var newTag = document.getElementById('edit-tag-input').value;
    var currentTag = $('#editDialog').data('current-tag');
    var inputTagId = $('#editDialog').data('tag-id');
    var tagsInput = $('#' + inputTagId);
    tagsInput.tagsinput('remove', currentTag);
    tagsInput.tagsinput('add', newTag);
    closeEditDialog();
}

// Закрытие диалогового окна редактирования
function closeEditDialog() {
    $('#editDialog').modal('hide');
}


