# Проект Laravel

## Описание

Этот проект — веб-приложение, использующее фреймворк Laravel для управления аккаунтами, доменами и правилами страниц. Он использует Laravel Breeze для аутентификации и предоставляет возможность управления данными через веб-интерфейс.

## Установка

### 1. Клонируйте репозиторий

```bash
git clone https://github.com/IlkinQurbanov/laravel-cloudflare-panel
cd ваш-проект

 Создайте ключ приложения
bash
Копировать код
php artisan key:generate
5. Запустите миграции
bash
Копировать код
php artisan migrate
6. Запустите сервер разработки
bash
Копировать код
php artisan serve
Теперь вы можете получить доступ к приложению по адресу http://127.0.0.1:8000.

Аутентификация
Для входа в систему используйте следующие учетные данные:

Логин: ilkinlikus@gmail.com
Пароль: Aslan@5555
Использование
Управление аккаунтами
Вы можете создавать, просматривать, редактировать и удалять аккаунты. Для этого перейдите в раздел "Аккаунты" в меню.

Управление доменами
Для управления доменами необходимо сначала создать аккаунт. После этого вы сможете добавлять, редактировать и удалять домены, связанные с аккаунтом.

Управление правилами страниц
Вы можете создавать и редактировать правила страниц для каждого домена. Правила страниц позволяют настраивать поведение сайта в зависимости от URL-шаблонов.

