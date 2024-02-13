## Инструкция по первому запуску приложения:
1. Перейти в директорию докера, запустить контейнеры и зайти в контейнер с php:
    ```bash
    cd ./docker
    docker-compose up --build -d
    docker-compose exec course.web bash
    ```
2. Выполнить следующие команды внутри контейнера:
    ```bash
    composer install
    php init
    php yii migrate
    ```
3. В файл hosts на хост-машине добавить:
    ```bash
   127.0.1.1       course.ru
    ```
4. По адресу [course.ru](http://course.ru) должно открыться приложение.

## Список задач:
- Задать роли и доступы (RBAC)
- Завершить CRUD для Lesson
  - actionAdd() с валидацией link через regex
  - actionEdit() - форма, содержащая: name, link, description, show, возможность очистить все "Просмотрено" из user_lesson
  - actionDelete() - удаление.
- Пагинация для списка уроков
- CRUD для User
  - реестр пользователей, доступный администратору,
  - "Мой профиль" для пользователей
- Логирование
- Кэш