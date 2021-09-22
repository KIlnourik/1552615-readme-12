<div class="form__text-inputs-wrapper">
    <div class="form__text-inputs">
        <?=$form_header;?>
        <div class="adding-post__textarea-wrapper form__input-wrapper">
            <label class="adding-post__label form__label" for="post-link">Ссылка
                <span class="form__input-required">*</span>
            </label>
            <div class="form__input-section">
                <input class="adding-post__input form__input" id="post-link" type="text" name="post-link" value="<?php echo(getPostVal('post-link'));?>">
                <button class="form__error-button button" type="button">!
                    <span class="visually-hidden">Информация об ошибке</span>
                </button>
                <div class="form__error-text">
                    <h3 class="form__error-title">Заголовок сообщения</h3>
                    <p class="form__error-desc">Текст сообщения об ошибке, подробно объясняющий, что не так.</p>
                </div>
            </div>
        </div>
        <?=$tag_form;?>
    </div>
    <div class="form__invalid-block">
        <b class="form__invalid-slogan">Пожалуйста, исправьте следующие ошибки:</b>
        <ul class="form__invalid-list">
            <li class="form__invalid-item">Заголовок. Это поле должно быть заполнено.</li>
            <li class="form__invalid-item">Цитата. Она не должна превышать 70 знаков.</li>
        </ul>
    </div>
</div>