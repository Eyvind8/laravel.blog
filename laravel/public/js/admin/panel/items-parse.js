$(document).ready(function()
{
    $(document).on('click', '.save-item', function(event) {
        event.preventDefault();

        // Получаем ID элемента из атрибута data-item-id
        var itemId = $(this).data('item-id');

        // Находим соответствующий блок элемента по ID
        var itemBlock = $('#item-js-' + itemId);

        // Получаем значения из .content-textarea, .taggable-input, .item-create
        var contentTextareaValue = itemBlock.find('.content-textarea').val();
        var tagsInputValue = itemBlock.find('.taggable-input').val();
        var itemPublicationDate = itemBlock.find('.item-create').val();
        var statusCheckbox = itemBlock.find('input[name="status"]').is(':checked') ? 'active' : 'new';

        // Формируем данные для отправки
        var postData = {
            content: contentTextareaValue,
            tags: tagsInputValue,
            publicationDate: itemPublicationDate,
            status: statusCheckbox
        };

        // Отправляем AJAX-запрос
        $.ajax({
            url: '/admin/items-parse/' + itemId,
            type: 'PUT',
            dataType: 'json',
            data: postData,
            success: function(data) {
                if (data.resultMove === true) {
                    $('#item-js-' + itemId).remove();
                    alertify.success('Success move parse item');
                }

                if (data.resultUpdate === true) {
                    alertify.success('Success activate parse item');
                }
            },
            error: function(xhr, status, error) {
                alertify.error('Error AJAX-request: ' + status + ', ' + error);
            }
        });
    });

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
    $(document).on('click', '.delete-item-parse', function(event) {
        event.preventDefault();
        var itemId = $(this).data('item-id');

        $.ajax({
            url: '/admin/items-parse/' + itemId,
            type: 'DELETE',
            dataType: 'json',
            success: function(data) {
                if (data.result === true) {
                    $('#item-js-' + itemId).remove();
                    alertify.success('Success remove item');
                } else {
                    alertify.warning('Failed to delete item');
                }
            },
            error: function(xhr, status, error) {
                alertify.error('Error AJAX-request: ' + status + ', ' + error);
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

