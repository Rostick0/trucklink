<? if ($_SESSION['user']) : ?>
    <div class="header__log">
        <a class="header__log_href" href="/profile?id=<?= $_SESSION['user']['user_id'] ?>">
            <svg width="1.5rem" height="1.37rem" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 18V16.3333C19 15.4493 18.6313 14.6014 17.9749 13.9763C17.3185 13.3512 16.4283 13 15.5 13H8.5C7.57174 13 6.6815 13.3512 6.02513 13.9763C5.36875 14.6014 5 15.4493 5 16.3333V18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12.5 9C14.433 9 16 7.433 16 5.5C16 3.567 14.433 2 12.5 2C10.567 2 9 3.567 9 5.5C9 7.433 10.567 9 12.5 9Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>
                Профиль
            </span>
        </a>
    </div>
<? else : ?>
    <div class="header__log">
        <a class="header__log_href" href="/login">
            <svg width="1.5rem" height="1.37rem" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 18V16.3333C19 15.4493 18.6313 14.6014 17.9749 13.9763C17.3185 13.3512 16.4283 13 15.5 13H8.5C7.57174 13 6.6815 13.3512 6.02513 13.9763C5.36875 14.6014 5 15.4493 5 16.3333V18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12.5 9C14.433 9 16 7.433 16 5.5C16 3.567 14.433 2 12.5 2C10.567 2 9 3.567 9 5.5C9 7.433 10.567 9 12.5 9Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>
                Войти
            </span>
        </a>
        <a class="header__log_href" href="/registration">
            <svg width="1.5rem" height="1.37rem" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 18V16.3333C19 15.4493 18.6313 14.6014 17.9749 13.9763C17.3185 13.3512 16.4283 13 15.5 13H8.5C7.57174 13 6.6815 13.3512 6.02513 13.9763C5.36875 14.6014 5 15.4493 5 16.3333V18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12.5 9C14.433 9 16 7.433 16 5.5C16 3.567 14.433 2 12.5 2C10.567 2 9 3.567 9 5.5C9 7.433 10.567 9 12.5 9Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span>
                Регистрация
            </span>
        </a>
    </div>
<? endif ?>